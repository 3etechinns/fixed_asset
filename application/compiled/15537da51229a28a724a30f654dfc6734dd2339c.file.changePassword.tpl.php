<?php /* Smarty version Smarty-3.1.7, created on 2018-01-23 06:25:45
         compiled from "C:\wamp\www\research\iScaffoldnov6\output\fixed_asset\application\views\changePassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:226025a66c759b49007-91109081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15537da51229a28a724a30f654dfc6734dd2339c' => 
    array (
      0 => 'C:\\wamp\\www\\research\\iScaffoldnov6\\output\\fixed_asset\\application\\views\\changePassword.tpl',
      1 => 1516683066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226025a66c759b49007-91109081',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a66c759bc21a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a66c759bc21a')) {function content_5a66c759bc21a($_smarty_tpl) {?><div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
        <small>Set new password for your account</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
changePassword" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputPassword1">Old Password</label>
                                        <input type="password" class="form-control" id="inputOldPassword" placeholder="Old password" name="oldPassword" maxlength="10" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputPassword1">New Password</label>
                                        <input type="password" class="form-control" id="inputPassword1" placeholder="New password" name="newPassword" maxlength="10" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputPassword2">Confirm New Password</label>
                                        <input type="password" class="form-control" id="inputPassword2" placeholder="Confirm new password" name="cNewPassword" maxlength="10" required>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <<?php ?>?php
                    $this->load->helper( 'url' );
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?<?php ?>>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <<?php ?>?php echo $this->session->flashdata('error'); ?<?php ?>>                    
                </div>
                <<?php ?>?php } ?<?php ?>>
                <<?php ?>?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?<?php ?>>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <<?php ?>?php echo $this->session->flashdata('success'); ?<?php ?>>
                </div>
                <<?php ?>?php } ?<?php ?>>
                
                <<?php ?>?php  
                    $noMatch = $this->session->flashdata('nomatch');
                    if($noMatch)
                    {
                ?<?php ?>>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <<?php ?>?php echo $this->session->flashdata('nomatch'); ?<?php ?>>
                </div>
                <<?php ?>?php } ?<?php ?>>
                
                <div class="row">
                    <div class="col-md-12">
                        <<?php ?>?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?<?php ?>>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><?php }} ?>