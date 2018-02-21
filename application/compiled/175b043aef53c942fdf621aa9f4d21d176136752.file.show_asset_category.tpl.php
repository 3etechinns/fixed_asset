<?php /* Smarty version Smarty-3.1.7, created on 2018-02-21 07:09:01
         compiled from "C:\wamp64\www\fixed_asset\application\views\show_asset_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40075a8c231799fc92-05841048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '175b043aef53c942fdf621aa9f4d21d176136752' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\show_asset_category.tpl',
      1 => 1519196937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40075a8c231799fc92-05841048',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a8c2317aebd2',
  'variables' => 
  array (
    'id' => 0,
    'direction' => 0,
    'table_name' => 0,
    'asset_category_fields' => 0,
    'asset_category_data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8c2317aebd2')) {function content_5a8c2317aebd2($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp64\\www\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <a href="asset_category/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
        </a>
        <a href="asset_category">
            <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button>
        </a>
        <a href="asset_category/create/">
            <button class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
        </a>

        <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>"
           href="asset_category/navigate/right/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/show"><i class="fa fa-arrow-right"></i></a>
        <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>"
           href="asset_category/navigate/left/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/show"><i class="fa fa-arrow-left"></i></a>

        <h3 class="page-title">Details of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
, record #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</h3>
        <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?>
            <div class="flash">
                <div class="alert alert-info">
                    <p>You have reached end of navigation</p>
                </div>
            </div>
        <?php }?>
        <div class="col-sm-4 col-md-offset-1">
            <table class="table table-bordered table-responsive">
                <thead>
                <th width="50%">Field</th>
                <th>Value</th>
                </thead>
                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_id'];?>
:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['asset_category_data']->value['cat_id'];?>
</td>
                </tr>
                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_code'];?>
:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['asset_category_data']->value['cat_code'];?>
</td>
                </tr>
                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_name'];?>
:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['asset_category_data']->value['cat_name'];?>
</td>
                </tr>

                
                
                
                
                
                
                
                
                
                
                
                
            </table>
        </div>
        <div class="col-md-offset-1 col-sm-4">
            <table class="table table-bordered table-responsive">
                <thead>
                <th width="50%">Field</th>
                <th>Value</th>
                </thead>
                
                
                
                
                
                
                
                
                
                
                
                
                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_description'];?>
:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['asset_category_data']->value['cat_description'];?>
</td>
                </tr>
                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                    <td>type:</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['asset_category_data']->value['cat_status']==1){?>
                            Category
                        <?php }else{ ?>
                            Subcategory
                        <?php }?></td>
                </tr>
                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['depriciation_life'];?>
:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['asset_category_data']->value['depriciation_life'];?>
</td>
                </tr>
            </table>
        </div>
    </div><!-- .inner -->
</div><!-- .content --><?php }} ?>