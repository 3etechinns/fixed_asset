<?php /* Smarty version Smarty-3.1.7, created on 2018-01-24 17:31:17
         compiled from "C:\wamp64\www\fixed_asset\application\views\form_asset_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:300945a66f2e2742809-57074028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '266475ebba13955f66f8559041e16dbf21a056c9' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\form_asset_category.tpl',
      1 => 1516815073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '300945a66f2e2742809-57074028',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a66f2e293bc5',
  'variables' => 
  array (
    'action_mode' => 0,
    'direction' => 0,
    'record_id' => 0,
    'errors' => 0,
    'asset_category_fields' => 0,
    'asset_category_data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a66f2e293bc5')) {function content_5a66f2e293bc5($_smarty_tpl) {?><div class="panel panel-default">
    <div class="panel-body">
        <a href="asset_category" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i>
            Listing</a>
        <a class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?> btn btn-sm btn-success" href="asset_category/create/"> <i
                    class="fa fa-plus" aria-hidden="true"></i> New record</a>
        <?php if ($_smarty_tpl->tpl_vars['action_mode']->value!='create'){?>
            <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>"
               href="asset_category/navigate/right/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
"><i class="fa fa-arrow-right"></i></a>
            <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>"
               href="asset_category/navigate/left/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
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
        <form class="form" method='post' action='asset_category/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>'
              enctype="multipart/form-data">


            <div class="form-group">
                <label class="col-md-4 control-label" for="cat_code"><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_code'];?>
<span
                            class="error">*</span></label>
                <div class="col-md-6">
                    <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_code'];?>
" class="form-control" type="text"
                           maxlength="50" value="<?php if (isset($_smarty_tpl->tpl_vars['asset_category_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['asset_category_data']->value['cat_code'];?>
<?php }?>"
                           name="cat_code" id="cat_code"/>
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="cat_name"><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_name'];?>
<span
                            class="error">*</span></label>
                <div class="col-md-6">
                    <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_name'];?>
" class="form-control" type="text"
                           maxlength="50" value="<?php if (isset($_smarty_tpl->tpl_vars['asset_category_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['asset_category_data']->value['cat_name'];?>
<?php }?>"
                           name="cat_name" id="cat_name"/>
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="cat_description"><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_description'];?>

                    <span class="error">*</span></label>
                <div class="col-md-6">
                    <textarea placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_description'];?>
" class="form-control" rows="5"
                              cols="50" class="text_area" name="cat_description"
                              id="cat_description"><?php if (isset($_smarty_tpl->tpl_vars['asset_category_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['asset_category_data']->value['cat_description'];?>
<?php }?></textarea>
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="cat_status"><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_status'];?>
</label>
                <div class="col-md-6">
                    <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_status'];?>
" class="form-control" type="text"
                           maxlength="50" value="<?php if (isset($_smarty_tpl->tpl_vars['asset_category_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['asset_category_data']->value['cat_status'];?>
<?php }?>"
                           name="cat_status" id="cat_status"/>
                </div>

            </div>

            
                
                
                    
                           
                           
                           
                

            
            <div class="form-group">
                <label class="col-md-4 control-label"
                       for="depriciation_life"><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['depriciation_life'];?>
</label>
                <div class="col-md-6">
                    <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['depriciation_life'];?>
" class="form-control"
                           type="text" maxlength="50"
                           value="<?php if (isset($_smarty_tpl->tpl_vars['asset_category_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['asset_category_data']->value['depriciation_life'];?>
<?php }?>"
                           name="depriciation_life" id="depriciation_life"/>
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