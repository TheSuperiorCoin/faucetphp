<?php
error_reporting(E_ALL & ~ E_NOTICE); ini_set('display_errors', true);

require_once "maincore.php";
require_once "includes/dbconnector.class.php";

//Adding Lib for SuperiorCoin Functions


require "../vendor/autoload.php";
use Superior\Wallet;
$walletFaucet = new Superior\Wallet();




$now = new DateTime();
//echo $now->format('Y-m-d H:i:s');    // MySQL datetime format
$run_date= $now->getTimestamp();
	


function ChangetoMili($amount,&$currency) {
	switch ($currency)
	{		
	    case "BTC" : $amount = $amount * 1000;$currency="mBTC";return $amount;
	    case "mBTC" :return $amount;
	    case "Satoshi" : $amount = $amount / 100000;$currency="mBTC";return $amount;
	}
}


$db=new DbConnector;
$db->queryres("select * from tbl_config where header='currency'");
$faucetcurrency=$db->res['value'];
$db->queryres("select * from tbl_config where header='requestcount'");
$requestcount=$db->res['value']; 
	

//Change to mili bitcoin because asmoney get currencies based on milicoin
$db->query("select * from tbl_withdrawal where status=0");

$btcaddresses = array();
$btcamounts = array();
$withdrawalid = array();
$destinations = array();

while($res=$db->fetchArray()){

    $currency = $faucetcurrency;

    //print_r($res);		
	$db2->queryres("select * from tbl_user where user_id='".$res['user_id']."'");
	$address=$db2->res['address'];
	$amount = ChangetoMili($res['amount'],$currency);

	$btcaddresses[count($btcaddresses)] = $address;
	$btcamounts[count($btcamounts)] = $amount;
	$withdrawalid[count($withdrawalid)] = $res['withdrawal_id'];

	$destinations[count($destinations)] = 
	(object) array('amount' => $amount, 'address' => $address);
	
}


if (count($btcamounts) >= $requestcount)
{	
		
	echo "</br><h3>There are ". count($btcamounts)." no processed withdrawals in our database . </br> 
	We will processing in group/lot of ". $requestcount." to run Superior Transfer cronjob.</br>";
	echo "Running cronjob... </h3>";

	$btcamounts = array_slice($btcamounts, 0, $requestcount);
	$destinations = array_slice($destinations, 0, $requestcount);
    $total_amount = array_sum($btcamounts);
     
    
	$options2 = [
	    'destinations' => $destinations
	];
	

	$sup_transfer = $walletFaucet->transfer($options2);
	$transfer_result = json_decode($sup_transfer);
	
	 

	//if "fee" exists in transfer response means that transfe was successfull
	if (isset($transfer_result->{'fee'})) {
		echo "</br> <h1>Success Transfer!</h1> </br>";
		$transfer_fee = $transfer_result->{'fee'};
		$transfer_hash = $transfer_result->{'tx_hash'};
		echo 
		"Transfer Fee: ".$transfer_fee. 
		"</br>Transfer Hash: ".$transfer_hash.
		"</br>Total Number of Transfers: ".$requestcount.
		"</br>Total Amount Transfered: ".$total_amount.
		"</br>------------------------------------------</br>";



		$hash_transfer=$transfer_hash;

		for ($i=0;$i<$requestcount;$i++) {
			$wid = $withdrawalid[$i];
			echo "</br>--> Running transfer number: " .$i. "/ with amount of:" .$btcamounts[$i];
			/*
			echo "- update tbl_withdrawal set status=1,reccode=".$hash_transfer." where withdrawal_id= ".$wid.".</br>";
			*/
			
			$db2->query("update tbl_withdrawal set status=1,reccode='".$hash_transfer."',fee=".$transfer_fee." where withdrawal_id=".$wid."");
			
		}

		$db->query("insert into tbl_cronjob_history 
			(  run_date, success,total_amount,total_transfers, fee, hash_transfers, error_transfer ) 
	 values (".$run_date.",1 ,".$total_amount.", ".$requestcount.",".$transfer_fee.
	 ", '$hash_transfer' , ''  ) ");


	    echo "</br><h3>".$requestcount. " Withdrawal Transfers has been proceessed with hash number:".$hash_transfer."</h3>" ;

	    
	//if "fee" not exists in transfer response means that error exists
	} else {
		$transfer_errorcode = $transfer_result->{'code'};
		$transfer_errormessage = $transfer_result->{'message'};
		echo "<h1>The Transfer has not been processed</br> Error Transfer!</h1> </br> ";
		echo 
		"Error Code: ".$transfer_errorcode. 
		"</br>Error Message: ".$transfer_errormessage;

		$db->query("insert into tbl_cronjob_history 
			(  run_date, success,total_amount,total_transfers, fee, hash_transfers, error_transfer ) 
	 values (".$run_date.",1 ,".$total_amount.", ".$requestcount.",".$transfer_errorcode.
	 ", '' , '$transfer_errormessage'  ) ");



	}
		
}
else {
	echo "</br><h3>There are only ". count($btcamounts)." withdrawals in our database </br> We must have  ". $requestcount." withdrawals or more to run Superior Transfer Cronjob.</h3>";
				
}

?>