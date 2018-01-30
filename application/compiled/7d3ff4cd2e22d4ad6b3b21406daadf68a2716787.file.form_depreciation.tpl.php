<?php /* Smarty version Smarty-3.1.7, created on 2018-01-23 09:08:45
         compiled from "C:\wamp64\www\fixed_asset\application\views\form_depreciation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:321875a66fb9dd32b89-84408042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d3ff4cd2e22d4ad6b3b21406daadf68a2716787' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\form_depreciation.tpl',
      1 => 1516683068,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '321875a66fb9dd32b89-84408042',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'direction' => 0,
    'record_id' => 0,
    'errors' => 0,
    'depreciation_fields' => 0,
    'depreciation_data' => 0,
    'related_asset' => 0,
    'rel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a66fb9df21f5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a66fb9df21f5')) {function content_5a66fb9df21f5($_smarty_tpl) {?><div class="panel panel-default">           
                <div class="panel-body">
                 <a href="depreciation" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
                        <a class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?> btn btn-sm btn-success" href="depreciation/create/"> <i class="fa fa-plus" aria-hidden="true"></i> New record</a>
                        <?php if ($_smarty_tpl->tpl_vars['action_mode']->value!='create'){?>
                        <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>" href="depreciation/navigate/right/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>" href="depreciation/navigate/left/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
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
                        <form class="form" method='post' action='depreciation/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label class="col-md-4 control-label" for="dep_date"><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_date'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_date'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['depreciation_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['depreciation_data']->value['dep_date'];?>
<?php }?>" name="dep_date" id="dep_date" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="dep_amount"><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_amount'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_amount'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['depreciation_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['depreciation_data']->value['dep_amount'];?>
<?php }?>" name="dep_amount" id="dep_amount" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="dep_status"><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_status'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_status'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['depreciation_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['depreciation_data']->value['dep_status'];?>
<?php }?>" name="dep_status" id="dep_status" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="dep_description"><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_description'];?>
</label>
    		<div class="col-md-6">
        		<textarea placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_description'];?>
" class="form-control" rows="5" cols="50" class="text_area" name="dep_description" id="dep_description"><?php if (isset($_smarty_tpl->tpl_vars['depreciation_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['depreciation_data']->value['dep_description'];?>
<?php }?></textarea>
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="dep_commnet"><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_commnet'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_commnet'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['depreciation_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['depreciation_data']->value['dep_commnet'];?>
<?php }?>" name="dep_commnet" id="dep_commnet" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="asset_ass_id"><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['asset_ass_id'];?>
<span class="error">*</span></label>
            <div class="col-md-6">
    		<select class="form-control field select addr" name="asset_ass_id" id="asset_ass_id"  required="required" >
                <option value="">Select One</option>
                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_asset']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['asset_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['depreciation_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['depreciation_data']->value['asset_ass_id']==$_smarty_tpl->tpl_vars['rel']->value['asset_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['asset_name'];?>
</option>
                <?php } ?>
        	</select>
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