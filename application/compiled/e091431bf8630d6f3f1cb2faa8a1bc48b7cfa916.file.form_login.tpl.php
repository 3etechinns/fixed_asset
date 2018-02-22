<?php /* Smarty version Smarty-3.1.7, created on 2018-02-20 17:40:26
         compiled from "C:\wamp64\www\fixed_asset\application\views\form_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12285a8c5d8a2e0a23-72222972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e091431bf8630d6f3f1cb2faa8a1bc48b7cfa916' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\form_login.tpl',
      1 => 1516683068,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12285a8c5d8a2e0a23-72222972',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a8c5d8a3ceea',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8c5d8a3ceea')) {function content_5a8c5d8a3ceea($_smarty_tpl) {?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CodeInsect | Admin System Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>CodeInsect</b><br>Admin System</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
loginMe" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" id="email" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <!-- <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>  -->                       
            </div><!-- /.col -->
            <div class="col-xs-12">
            <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
addNew" class="btn btn-success btn-flat pull-left" value="Sign Up" >Sign Up</a>
              <input type="submit" class="btn btn-primary pull-right btn-flat" value="Sign In" />

            </div><!-- /.col -->
          </div>
        </form>
        <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
forgotPassword">Forgot Password</a><br>        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  </body>
</html><?php }} ?>