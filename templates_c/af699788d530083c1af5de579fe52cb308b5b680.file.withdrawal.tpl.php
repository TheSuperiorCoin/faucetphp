<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-03 11:29:29
         compiled from "template/withdrawal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8496928185aea3e91734441-91888442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af699788d530083c1af5de579fe52cb308b5b680' => 
    array (
      0 => 'template/withdrawal.tpl',
      1 => 1525368400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8496928185aea3e91734441-91888442',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5aea3e918d1a71_14797868',
  'variables' => 
  array (
    'credit' => 0,
    'curency' => 0,
    'with' => 0,
    'foo' => 0,
    'over' => 0,
    'less' => 0,
    'as_min' => 0,
    'cur_min' => 0,
    'asmoneyexist' => 0,
    'cryptoexist' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aea3e918d1a71_14797868')) {function content_5aea3e918d1a71_14797868($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('template/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- ///// Start Banner Section Gradient //// -->
  <div class="container-fluid py-5">
        <div class="row gradient-bg">
          
          <div class="col-lg-8 text-center text-light mx-auto ">

            <img src="template/assets/images/SuperiorCoinLogo300.png" width="200" alt="">
                <h1 class="text-light">
                  Withdrawal!
              </h1>
                <p>
                  Ask for Withdraw              
                </p>
                <!--
                <p>
                  <a class="btn btn-lg btn-outline-light" href="#" role="button">
                  Learn more
                  </a>
                </p>
              -->
          </div> <!-- col-lg-8 -->
          
        </div><!-- row -->
      </div><!-- container -->
  <!-- ///// End Banner Section Gradient //// -->




      <div class="row">
        <div class="col-lg-9 mx-auto">


          <h3 class="panel-title">Withdrawal
            <span class="pull-right">
            <?php echo $_smarty_tpl->tpl_vars['credit']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['curency']->value;?>

            </span>
          </h3>

          <table class="table table-striped">
            <thead>
              <tr>
                <th>Amount</th>
                <th>Date</th>
                <th>Type</th>
                <th>Status</th>
              </tr>
              </thead>
            <tbody>  
              
              <?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['with']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->_loop = true;
?>
              
              
              <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['foo']->value['amount'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['foo']->value['date'];?>
</td>
                <td><?php if ($_smarty_tpl->tpl_vars['foo']->value['type']==0) {?>Asmoney<?php } else { ?>Currency<?php }?></td>
                <td>
                <?php if ($_smarty_tpl->tpl_vars['foo']->value['status']==0) {?>
                
                  <div class="label label-warning">Pending</div>
                
                
                
                <?php } elseif ($_smarty_tpl->tpl_vars['foo']->value['status']==1) {?>
                
                  <div class="label label-success">Paid</div>
                
                
                <?php }?>
                
                
                
                </td>
              </tr>
              <?php } ?>
              
              
              
              
            </tbody>
          </table>


          <?php if ($_smarty_tpl->tpl_vars['over']->value) {?>
            <div class="alert alert-danger">
              You have asked more than in your account
            </div>
          <?php }?>


          <?php if ($_smarty_tpl->tpl_vars['less']->value) {?>
            <div class="alert alert-danger">
              You are trying to withdrawal below the minimum amount.
            </div>
          <?php }?>


    </div>
  </div>





  <div class="row ">
        
            <!--

            <div class="col-lg-9 mx-auto " style="border:1px solid #ccc;" >
                <h3>Withdraw to AsMoney</h3>

                AsMoney is a bitcoin payment processor that allow us to send micropayments
                <br>
  
                <br>
  
                Withdrawal any amount without minimum<br> Payment will be proceed instantly 
                <br>
                You can transfer your money to any cryptocoin from AsMoney
                <br> 
                If you don't have AsMoney account, create a 
                <a href="https://www.asmoney.com/default.aspx" target="a_blank">
                  new one
                </a>
                <br><br><br><br>
  
                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#asmoney">
                  Request a AsMoney withdrawal, minimum is (<?php echo $_smarty_tpl->tpl_vars['as_min']->value;?>
)
                </button>

              </div>

            -->
    



          <div class="col-lg-9 mx-auto" style="border:1px solid #ccc;">
            <h3>Withdraw to coin</h3>
            You can withdraw balance directly to your crypto address but you need<br><br>
            your balance should higher than <?php echo $_smarty_tpl->tpl_vars['cur_min']->value;?>
<br>
             Payment will be proceed with delay
             <br><br><br><br><br><br>
            
            <button type="button" class="btn btn-success " data-toggle="modal" data-target="#myModal">
              Request a coin withdrawal, minimum is (<?php echo $_smarty_tpl->tpl_vars['cur_min']->value;?>
)
            </button>

          </div>

</div><!-- row -->



  
      <?php echo '<script'; ?>
 type="text/javascript">
       function checkasmoney() {
       
      var amount = document.asmoney.amount.value;
      var wallet = document.asmoney.wallet.value;

      if (amount <= 0) {
      alert('Amount is incorrect');
      return false;

      }

      if (wallet.length <= 1 ) {
          alert('Please Enter your AsMoney username'); 
          return false;
      }

      return true;

      }

      <?php echo '</script'; ?>
>





<div class="modal fade" id="asmoney" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  
  <div class="modal-dialog">
  
    <form action="" method="post" name="asmoney" onsubmit="return checkasmoney()">
        
        <div class="modal-content">
          
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">
                &times;
              </span>
            </button>

            <h4 class="modal-title" id="myModalLabel">
              Request a withdrawal
            </h4>

          </div><!-- modal-header -->
          
          <div class="modal-body">
       
            <div class="form-group">
              <label for="exampleInputEmail1">Amount</label>
              <input type="text" class="form-control" name="amount" placeholder="Amount to withdrawal">
            </div>

            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['asmoneyexist']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1) {?>
            Your Asmoney account : <?php echo $_smarty_tpl->tpl_vars['asmoneyexist']->value;?>

            <?php } else { ?>
              <div class="form-group">
                <label for="exampleInputEmail1">Wallet</label>
                <input type="text" class="form-control" name="wallet" placeholder="Asmoney username">
              </div>
             <?php }?>

          </div><!-- modal-body -->

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" value="1" name="asmoney">Submit</button>
          </div>

        </div><!-- modal-content -->
    
    </form>
    
  </div> <!-- modal-dialog -->
</div> <!-- modal fade -->




       
      



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  
  <form action="" method="post" name="coin" onsubmit="return checkcoin()">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Request a withdrawal</h4>
      </div>
      <div class="modal-body">
       
       
        
       
    <div class="form-group">
    <label for="exampleInputEmail1">Amount</label>
    <input type="text" class="form-control" name="amount" placeholder="Amount to withdrawal">
    </div>

    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['cryptoexist']->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2) {?>
    Your Crypto address : <?php echo $_smarty_tpl->tpl_vars['cryptoexist']->value;?>

    <?php } else { ?>
      <div class="form-group">
        <label for="exampleInputEmail1">Wallet</label>
        <input type="text" class="form-control" name="address" placeholder="crypto address">
      </div>
     <?php }?>


       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" value="1" name="currency">Submit</button>
      </div>
    </div>
    
    </form>




    <?php echo '<script'; ?>
 type="text/javascript">
      function checkcoin() {
       
      var address = document.coin.address.value;
      var amount = document.coin.amount.value;


      if (amount <= 0) {
      alert('Amount is incorrect');
      return false;

      }

       if (address.length <= 15 )
      {
          alert('Crypto address is not correct ');
      return false;
      }

      if(/^[a-zA-Z0-9- ]*$/.test(address) == false) {
          alert('Crypto address is not correct ');
      return false;
      } 

      return true;
      }
      <?php echo '</script'; ?>
>
    
  </div>
</div>




<?php echo $_smarty_tpl->getSubTemplate ('template/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
