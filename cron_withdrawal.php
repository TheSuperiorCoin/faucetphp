<?php
error_reporting(E_ALL & ~ E_NOTICE); ini_set('display_errors', true);

require_once "maincore.php";
require_once "includes/dbconnector.class.php";


echo "----- ChangetoMili ------ </br>";
function ChangetoMili($amount,&$currency) {
	switch ($currency)
	{		
	    case "BTC" : $amount = $amount * 1000;$currency="mBTC";return $amount;
	    case "mBTC" :return $amount;
	    case "Satoshi" : $amount = $amount / 100000;$currency="mBTC";return $amount;
	}
}

echo "------- DbConnector ------ </br>";

$db=new DbConnector;
$db->queryres("select * from tbl_config where header='currency'");
$faucetcurrency=$db->res['value'];
$db->queryres("select * from tbl_config where header='pusername'");
$pusername=$db->res['value'];
$db->queryres("select * from tbl_config where header='papiname'");
$papiname=$db->res['value'];
$db->queryres("select * from tbl_config where header='ppassword'");
$ppassword=$db->res['value'];
$db->queryres("select * from tbl_config where header='requestcount'");
$requestcount=$db->res['value'];
	

//Change to mili bitcoin because asmoney get currencies based on milicoin
$db->query("select * from tbl_withdrawal where status=0");

$btcaddresses = array();
$btcamounts = array();
$withdrawalid = array();

while($res=$db->fetchArray()){

    $currency = $faucetcurrency;

    //print_r($res);
	//echo "</br>---- Res ----- </br>";
			
	$db2->queryres("select * from tbl_user where user_id='".$res['user_id']."'");
	$address=$db2->res['address'];
	$amount = ChangetoMili($res['amount'],$currency);

	
	$btcaddresses[count($btcaddresses)] = $address;
	$btcamounts[count($btcamounts)] = $amount;
	$withdrawalid[count($withdrawalid)] = $res['withdrawal_id'];
	//print_r($btcaddresses);
	//echo "</br>---- IF currency ----- </br>";		
		

}
echo "</br>Array with adresses</br>";
print_r($btcaddresses);
echo "</br>Array with ammounts</br>";
print_r($btcamounts);


if (count($btcamounts) > $requestcount)
{	
	echo "</br><h1>There's ". count($btcamounts)." records </br> We must have more than/or ". $requestcount." records to run Superior Transfer cronjob.</br>";
	echo "RUnning cronjob </h1>";
	
	/*
	$r = $api->TransferToManyBTC($btcaddresses,$btcamounts,'mBTC','Withdrawal');
	if ($r['result'] == APIerror::OK){
			$batchno = $r['value'];
			for ($i=0;$i<count($withdrawalid);$i++) {
			$wid = $withdrawalid[$i];
			$db2->query("update tbl_withdrawal set status=1,reccode='$batchno' where withdrawal_id='".$wid."'");
			}	
            echo count($withdrawalid). " Withdrawals has been proceessed with bactch number " .$batchno. "<br>" ;
		} else {
		    if ($r['result'] == APIerror::InvalidUser )
		    {		echo "Invalid User";		}
		}
	*/
		
}
else {
	echo "</br><h1>There's only ". count($btcamounts)." records </br> We must have more than/or ". $requestcount." records to run Superior Transfer Cronjob.</h1>";


	for ($i=0;$i<count($withdrawalid);$i++) {
		$wid = $withdrawalid[$i];
		print_r($wid);
		echo"<br>";
		echo "update tbl_withdrawal set status=1,reccode= -batchno where withdrawal_id= ".$wid.".</br>";
	}
	

    echo count($withdrawalid). " Withdrawals has been proceessed with hash number  -$batchno. <br>" ;

    $db2->query("update tbl_withdrawal set status=1,reccode=010101 where withdrawal_id= 3");
				


}


?>