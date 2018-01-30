<?php /* Smarty version Smarty-3.1.7, created on 2018-01-23 06:10:42
         compiled from "C:\wamp\www\research\iScaffoldnov6\output\fixed_asset\application\views\form_ass_track.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125955a66c3d29f27f3-23859810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccfa6a6a6a8f4178157210a336e2e33c632cb9fa' => 
    array (
      0 => 'C:\\wamp\\www\\research\\iScaffoldnov6\\output\\fixed_asset\\application\\views\\form_ass_track.tpl',
      1 => 1516683066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125955a66c3d29f27f3-23859810',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'direction' => 0,
    'record_id' => 0,
    'errors' => 0,
    'ass_track_fields' => 0,
    'ass_track_data' => 0,
    'related_asset' => 0,
    'rel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a66c3d2c8e81',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a66c3d2c8e81')) {function content_5a66c3d2c8e81($_smarty_tpl) {?><div class="panel panel-default">           
                <div class="panel-body">
                 <a href="ass_track" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
                        <a class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?> btn btn-sm btn-success" href="ass_track/create/"> <i class="fa fa-plus" aria-hidden="true"></i> New record</a>
                        <?php if ($_smarty_tpl->tpl_vars['action_mode']->value!='create'){?>
                        <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>" href="ass_track/navigate/right/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>" href="ass_track/navigate/left/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
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
                        <form class="form" method='post' action='ass_track/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="form-group">
            <label class="col-md-4 control-label" for="date_trasferred"><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_trasferred'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_trasferred'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['date_trasferred'];?>
<?php }?>" name="date_trasferred" id="date_trasferred" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="date_returned"><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_returned'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_returned'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['date_returned'];?>
<?php }?>" name="date_returned" id="date_returned" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="penality_amount"><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['penality_amount'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['penality_amount'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['penality_amount'];?>
<?php }?>" name="penality_amount" id="penality_amount" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="current_value"><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['current_value'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['current_value'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['current_value'];?>
<?php }?>" name="current_value" id="current_value" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label"><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['payment_status'];?>
</label>
            <div class="col-md-6">
            <label class="form-control">
            <input type="checkbox" value="1" name="payment_status" id="payment_status" <?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['ass_track_data']->value['payment_status']==1){?> checked="checked" <?php }?><?php }?> /></label>
    		
            </div>
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="payment_date"><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['payment_date'];?>
</label>
    		<div class="col-md-6">
    	       <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['payment_date'];?>
"  class="form-control" type="text" maxlength="50"  value="<?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['payment_date'];?>
<?php }?>" name="payment_date" id="payment_date" />
    		</div>
    		
    	</div>
    
    	<div class="form-group">
            <label class="col-md-4 control-label" for="Asset_ass_id"><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['Asset_ass_id'];?>
<span class="error">*</span></label>
            <div class="col-md-6">
    		<select class="form-control field select addr" name="Asset_ass_id" id="Asset_ass_id"  required="required" >
                <option value="">Select One</option>
                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_asset']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['asset_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['ass_track_data']->value['Asset_ass_id']==$_smarty_tpl->tpl_vars['rel']->value['asset_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['asset_name'];?>
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