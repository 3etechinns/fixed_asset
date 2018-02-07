<?php /* Smarty version Smarty-3.1.7, created on 2018-02-06 19:33:52
         compiled from "C:\wamp64\www\fixed_asset\application\views\form_tbl_pages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:321205a7a0320126a92-09364908%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bafac5bd567d5e4d3d86333324914b3a357cd4bb' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\form_tbl_pages.tpl',
      1 => 1517550194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '321205a7a0320126a92-09364908',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'direction' => 0,
    'record_id' => 0,
    'errors' => 0,
    'tbl_pages_fields' => 0,
    'tbl_pages_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a7a032024200',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7a032024200')) {function content_5a7a032024200($_smarty_tpl) {?><div class="panel panel-default">           
                <div class="panel-body">
                 <a href="tbl_pages" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
                        <a class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?> btn btn-sm btn-primary" href="tbl_pages/create/"> <i class="fa fa-plus" aria-hidden="true"></i> New record</a>
                        <?php if ($_smarty_tpl->tpl_vars['action_mode']->value!='create'){?>
                        <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>" href="tbl_pages/navigate/right/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>" href="tbl_pages/navigate/left/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
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
                        <form class="form" method='post' action='tbl_pages/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label class="col-md-4 control-label" for="pg_name"><?php echo $_smarty_tpl->tpl_vars['tbl_pages_fields']->value['pg_name'];?>
<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['tbl_pages_fields']->value['pg_name'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['tbl_pages_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['tbl_pages_data']->value['pg_name'];?>
<?php }?>" name="pg_name" id="pg_name" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="pg_description"><?php echo $_smarty_tpl->tpl_vars['tbl_pages_fields']->value['pg_description'];?>
 name="pg_description" id="pg_description"><?php if (isset($_smarty_tpl->tpl_vars['tbl_pages_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['tbl_pages_data']->value['pg_description'];?>
<?php }?></textarea>
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="pg_controller"><?php echo $_smarty_tpl->tpl_vars['tbl_pages_fields']->value['pg_controller'];?>
<span class="error">*</span></label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['tbl_pages_fields']->value['pg_controller'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['tbl_pages_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['tbl_pages_data']->value['pg_controller'];?>
<?php }?>" name="pg_controller" id="pg_controller" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="pg_status"><?php echo $_smarty_tpl->tpl_vars['tbl_pages_fields']->value['pg_status'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['tbl_pages_fields']->value['pg_status'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['tbl_pages_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['tbl_pages_data']->value['pg_status'];?>
<?php }?>" name="pg_status" id="pg_status" />
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