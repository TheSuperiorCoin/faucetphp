<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-01 10:27:04
         compiled from "template/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6790511835ae89558b7a504-72713147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7564e746cc0ff5595279a61981fab5f32b041419' => 
    array (
      0 => 'template/header.tpl',
      1 => 1524556878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6790511835ae89558b7a504-72713147',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logged' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ae89558bd1491_36187504',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ae89558bd1491_36187504')) {function content_5ae89558bd1491_36187504($_smarty_tpl) {?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="template/assets/images/favicon.ico">

    <title>The Superior Coin Faucet</title>

    <!-- Bootstrap core CSS -->
    <link href="template/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="template/assets/css/carousel.css" rel="stylesheet">
    <link href="template/assets/css/custom.css" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <?php echo '<script'; ?>
 async src="https://www.googletagmanager.com/gtag/js?id=UA-116736799-1"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="template/assets/js/custom.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="template/assets/js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js"><?php echo '</script'; ?>
>


  </head>
  <body>
    <div id="loader-wrapper">
      <div id="loader">
        <img src="template/assets/images/superiorcoin-animation.gif" alt="">
      </div>

      <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

    </div>

    <header>
      <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">

        <a class="navbar-brand" href="#">
          <img src="template/assets/images/SuperiorCoinLogoMenu.png" width="200" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">


          		<li class="nav-item"><a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a></li>                                    
			 	<?php if (!$_smarty_tpl->tpl_vars['logged']->value) {?>            
			 	<li class="nav-item"><a class="nav-link"  href="login.php">Login</a></li>            
			 	<li class="nav-item"><a class="nav-link"  href="register.php">Register</a></li>			
			 	<li class="nav-item"><a class="nav-link"  href="howto.php">How It works?</a></li>            <?php } else { ?>                        
			 	<li class="nav-item"><a  class="nav-link" href="withdrawal.php">Withdrawal</a></li>

			 	<li class="nav-item"><a class="nav-link"  href="donate.php">Donate</a></li>                        
			 	<li><a  class="nav-link" href="referral.php">Referral</a></li>                        
			 	<li class="nav-item">
			 		<a  class="nav-link" href="pass.php">Change Password</a>
			 	</li>                                      
			 	<li class="nav-item">
			 		<a  class="nav-link" href="logout.php">Logout</a>
			 	</li>                                                                                    
			 	<?php }?>   
            


			<!--
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>

	          <li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	              Dropdown link
	            </a>
	            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	              <a class="dropdown-item" href="#">Action</a>
	              <a class="dropdown-item" href="#">Another action</a>
	              <a class="dropdown-item" href="#">Something else here</a>
	            </div>
	          </li>
	      	-->


          </ul>
          
        </div>
      </nav>
    </header>

    <main role="main">






<?php }} ?>
