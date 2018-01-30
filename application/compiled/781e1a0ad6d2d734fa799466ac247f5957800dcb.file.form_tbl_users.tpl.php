<?php /* Smarty version Smarty-3.1.7, created on 2018-01-23 06:26:37
         compiled from "C:\wamp\www\research\iScaffoldnov6\output\fixed_asset\application\views\form_tbl_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206965a66c78dae73d1-95909435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '781e1a0ad6d2d734fa799466ac247f5957800dcb' => 
    array (
      0 => 'C:\\wamp\\www\\research\\iScaffoldnov6\\output\\fixed_asset\\application\\views\\form_tbl_users.tpl',
      1 => 1509686890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206965a66c78dae73d1-95909435',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'direction' => 0,
    'record_id' => 0,
    'errors' => 0,
    'tbl_users_fields' => 0,
    'tbl_users_data' => 0,
    'related_tbl_roles' => 0,
    'rel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a66c78deb3f3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a66c78deb3f3')) {function content_5a66c78deb3f3($_smarty_tpl) {?><div class="panel panel-default">           
                <div class="panel-body">
                 <a href="tbl_users" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
                        <a class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?> btn btn-sm btn-success" href="tbl_users/create/"> <i class="fa fa-plus" aria-hidden="true"></i> New record</a>
                        <?php if ($_smarty_tpl->tpl_vars['action_mode']->value!='create'){?>
                        <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>" href="tbl_users/navigate/right/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>" href="tbl_users/navigate/left/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
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
                        <form class="form" method='post' action='tbl_users/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label class="col-md-4 control-label" for="email"><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['email'];?>
<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['email'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['tbl_users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['tbl_users_data']->value['email'];?>
<?php }?>" name="email" id="email" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="password"><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['password'];?>
<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['password'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['tbl_users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['tbl_users_data']->value['password'];?>
<?php }?>" name="password" id="password" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="name"><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['name'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['name'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['tbl_users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['tbl_users_data']->value['name'];?>
<?php }?>" name="name" id="name" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="mobile"><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['mobile'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['mobile'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['tbl_users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['tbl_users_data']->value['mobile'];?>
<?php }?>" name="mobile" id="mobile" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="roleId"><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['roleId'];?>
<span class="error">*</span></label>
            <div class="col-md-6">
    		<select class="form-control field select addr" name="roleId" id="roleId"  required="required" >
                <option value="">Select One</option>
                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_tbl_roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['tbl_roles_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['tbl_users_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['tbl_users_data']->value['roleId']==$_smarty_tpl->tpl_vars['rel']->value['tbl_roles_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['tbl_roles_name'];?>
</option>
                <?php } ?>
        	</select>
            </div>
    		
        </div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="isDeleted"><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['isDeleted'];?>
<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['isDeleted'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['tbl_users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['tbl_users_data']->value['isDeleted'];?>
<?php }?>" name="isDeleted" id="isDeleted" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="createdBy"><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['createdBy'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['createdBy'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['tbl_users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['tbl_users_data']->value['createdBy'];?>
<?php }?>" name="createdBy" id="createdBy" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="createdDtm"><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['createdDtm'];?>
<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['createdDtm'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['tbl_users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['tbl_users_data']->value['createdDtm'];?>
<?php }?>" name="createdDtm" id="createdDtm" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="updatedBy"><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['updatedBy'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['updatedBy'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['tbl_users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['tbl_users_data']->value['updatedBy'];?>
<?php }?>" name="updatedBy" id="updatedBy" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="updatedDtm"><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['updatedDtm'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['updatedDtm'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['tbl_users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['tbl_users_data']->value['updatedDtm'];?>
<?php }?>" name="updatedDtm" id="updatedDtm" />
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