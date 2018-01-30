<?php /* Smarty version Smarty-3.1.7, created on 2018-01-24 17:32:06
         compiled from "C:\wamp64\www\fixed_asset\application\views\list_asset_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:249695a66f2df7908b3-74111331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9731d3d30bb4a2a467b203c7233d7d607a89cb6' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\list_asset_category.tpl',
      1 => 1516814867,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '249695a66f2df7908b3-74111331',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a66f2df8d94b',
  'variables' => 
  array (
    'search_form' => 0,
    'table_name' => 0,
    'asset_category_data' => 0,
    'asset_category_fields' => 0,
    'row' => 0,
    'showall' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a66f2df8d94b')) {function content_5a66f2df8d94b($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp64\\www\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><!-- CUSTOM -->
<div class="panel panel-default">
    <div class="panel-body">
        <form action="asset_category/search" method="post" id="search_form">
            <a href="asset_category/create/" class="btn btn-success btn-sm">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <?php if (isset($_smarty_tpl->tpl_vars['search_form']->value)){?><?php echo $_smarty_tpl->tpl_vars['search_form']->value;?>
<?php }?>
        </form>
        <h3 class="page-title">List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>
        <?php if (!empty($_smarty_tpl->tpl_vars['asset_category_data']->value)){?>
        <form action="asset_category/delete" method="post" id="listing_form">
            <div class="table-responsive">
                <table class="table exportable" id="asset_category" name="asset_category">
                    <thead>
                    <th></th>
                    <th><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_code'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_name'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_description'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['asset_category_fields']->value['cat_status'];?>
</th>

                    <th style="width:180;">Actions</th>
                    </thead>
                    <tbody>
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asset_category_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['cat_id'];?>
"/></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_code'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_description'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_status'];?>
</td>

                            <td style="float:right">
                                <div class="row-actions">
                                    <a href="asset_category/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['cat_id'];?>
" class="btn btn-info btn-xs"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="asset_category/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['cat_id'];?>
" class="btn btn-primary btn-xs"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="javascript:chk('asset_category/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['cat_id'];?>
')"
                                       class="btn btn-danger btn-xs"><i class="fa fa-close" aria-hidden="true"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="actions-bar wat-cf">
                    <div class="actions">
                        <button class="btn btn-danger btn-xs" type="submit">
                            <i class="fa fa-close" aria-hidden="true"></i> Delete Selected
                        </button>
                        <?php if ($_smarty_tpl->tpl_vars['showall']->value==0){?>
                            <a href="asset_category/index/0/all" class="btn btn-xs btn-success show-all"><i
                                        lass="fa fa-eye"></i> Show All</a>
                        <?php }?>
                        <div class="pagination-wrapper pull-right">
                            <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

                        </div>
                    </div>

                </div>
        </form>
        <div class="col-sm-12" id="chartArea" name="chartArea">
        </div>
    </div>
    <?php }else{ ?>
    No records found.
    <?php }?>
</div>
</div><?php }} ?>