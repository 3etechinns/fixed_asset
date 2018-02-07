<?php /* Smarty version Smarty-3.1.7, created on 2018-02-05 09:09:35
         compiled from "C:\wamp64\www\fixed_asset\application\views\list_tbl_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:228875a781f4fab9e25-87971168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c42fde4821e45027e7a7ff96f881e88dc66d1fa' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\list_tbl_users.tpl',
      1 => 1517770713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '228875a781f4fab9e25-87971168',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search_result' => 0,
    'table_name' => 0,
    'tbl_users_data' => 0,
    'tbl_users_fields' => 0,
    'i' => 0,
    'row' => 0,
    'showall' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a781f4fd13cf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a781f4fd13cf')) {function content_5a781f4fd13cf($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp64\\www\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><!-- CUSTOM -->
<div class="panel panel-default">
    <div class="panel-body">
        <form action="tbl_users/search" method="post" id="search_form">
            <a href="tbl_users/create/" class="btn btn-primary btn-sm">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <div class="input-group" style="width:300px;float:right">
                <input type="text" required="true" class="form-control" name="search" id="search" onkeyup="myFunction()"
                       placeholder="Search...">
                <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                <span class="input-group-btn">
                                <a class="btn btn-default" type="submit" id="exportToExcell" name="exportToExcell">
                                    <i class="fa fa-download"></i>
                                </a>
                            </span>
            </div>
        </form>
        <span id="searchResult" name="searchResult"
              class="label-info"><?php if (!empty($_smarty_tpl->tpl_vars['search_result']->value)){?> <?php echo $_smarty_tpl->tpl_vars['search_result']->value;?>
<?php }?></span>
        <h3 class="page-title">List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>
        <?php if (!empty($_smarty_tpl->tpl_vars['tbl_users_data']->value)){?>
        <form action="tbl_users/delete" method="post" id="listing_form">
            <div class="table-responsive">
                <table class="table table-bordered exportable" id="tbl_users" name="tbl_users">
                    <thead>
                    <th>No</th>
                    <th></th>
                    <th><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['email'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['name'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['mobile'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['roleId'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['isDeleted'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['createdBy'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['createdDtm'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['updatedBy'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['tbl_users_fields']->value['updatedDtm'];?>
</th>

                    <th style="width:180px;">Actions</th>
                    </thead>
                    <tbody>
                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tbl_users_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['userId'];?>
"/></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['mobile'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['roleId'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['isDeleted'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['createdBy'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['createdDtm'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['updatedBy'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['updatedDtm'];?>
</td>

                            <td>
                                <div class="row-actions">
                                    <a href="tbl_users/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['userId'];?>
" class="btn btn-info btn-xs"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="tbl_users/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['userId'];?>
" class="btn btn-primary btn-xs"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="javascript:chk('tbl_users/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['userId'];?>
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
                            <a href="tbl_users/index/0/all" class="btn btn-xs btn-primary show-all"><i
                                        lass="fa fa-eye"></i> Show All</a>
                        <?php }?>
                        <div class="pagination-wrapper pull-right">
                            <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

                        </div>
                    </div>

                </div>
        </form>

    </div>
    <?php }else{ ?>
    No records found.
    <?php }?>
</div>
</div><?php }} ?>