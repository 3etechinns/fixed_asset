<?php /* Smarty version Smarty-3.1.7, created on 2018-01-23 06:11:00
         compiled from "C:\wamp\www\research\iScaffoldnov6\output\fixed_asset\application\views\form_employee.tpl" */ ?>
<?php /*%%SmartyHeaderCode:292895a66c3e40d28a8-35471554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8716a61b3464e38b9e3ff15da625ce594be30cc4' => 
    array (
      0 => 'C:\\wamp\\www\\research\\iScaffoldnov6\\output\\fixed_asset\\application\\views\\form_employee.tpl',
      1 => 1516683066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '292895a66c3e40d28a8-35471554',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'direction' => 0,
    'record_id' => 0,
    'errors' => 0,
    'employee_fields' => 0,
    'employee_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a66c3e42bec2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a66c3e42bec2')) {function content_5a66c3e42bec2($_smarty_tpl) {?><div class="panel panel-default">           
                <div class="panel-body">
                 <a href="employee" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
                        <a class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?> btn btn-sm btn-success" href="employee/create/"> <i class="fa fa-plus" aria-hidden="true"></i> New record</a>
                        <?php if ($_smarty_tpl->tpl_vars['action_mode']->value!='create'){?>
                        <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>" href="employee/navigate/right/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>" href="employee/navigate/left/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
"><i class="fa fa-arrow-left"></i></a>
                          <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>
                            <h3 class="page-title">Add new record</h3>
                        <?php }else{ ?>
                            <h3 class="page-title">Edit record: #<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
</h3>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)){?>
                            <div class="flash">
                                <div class="alert alert-danger">
                                    <p><?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
</p>
                                </div>
                            </div>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?>
                            <div class="flash">
                                <div class="alert alert-info">
                                    <p>You have reached end of navigation</p>
                                </div>
                            </div>
                        <?php }?>
                        <form class="form" method='post' action='employee/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label class="col-md-4 control-label" for="firstName"><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['firstName'];?>
<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['firstName'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['firstName'];?>
<?php }?>" name="firstName" id="firstName" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="lastName"><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['lastName'];?>
<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['lastName'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['lastName'];?>
<?php }?>" name="lastName" id="lastName" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="title"><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['title'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['title'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['title'];?>
<?php }?>" name="title" id="title" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="telephone"><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['telephone'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['telephone'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['telephone'];?>
<?php }?>" name="telephone" id="telephone" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="location"><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['location'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['location'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['employee_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['employee_data']->value['location'];?>
<?php }?>" name="location" id="location" />
    		</div>
    		
    	</div>
    
<br>
                           <div class="form-group button-actions box-footer">
                           <div class="col-md-offset-4 col-md-4">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <span class="text_button_padding">or</span>
                                    <a class="btn btn-default" href="javascript:window.history.back();">Cancel</a>
                            </div>
                        </form>
                </div><!-- .content -->
            </div><!-- .block -->
<?php }} ?>