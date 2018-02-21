<?php /* Smarty version Smarty-3.1.7, created on 2018-02-20 19:14:09
         compiled from "C:\wamp64\www\fixed_asset\application\views\list_employee.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196155a8c73812df3e9-68512419%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45e43b4d5e15acbf423d28bb246ccc7f07f36cc8' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\list_employee.tpl',
      1 => 1518200527,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196155a8c73812df3e9-68512419',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search_form' => 0,
    'table_name' => 0,
    'employee_data' => 0,
    'employee_fields' => 0,
    'i' => 0,
    'row' => 0,
    'showall' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a8c7381428c8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8c7381428c8')) {function content_5a8c7381428c8($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp64\\www\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><!-- CUSTOM -->
<div class="panel panel-default">
    <div  id="download" class="col-md-1 col-lg-push-11">
        <a class="btn btn-file" id="exportToExcell">
            <i  class="fa fa-download"></i></a>
    </div>
    <div class="panel-body">
        <form action="employee/search" method="post" id="search_form">
            <a href="employee/create/" class="btn btn-primary btn-sm">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <?php if (isset($_smarty_tpl->tpl_vars['search_form']->value)){?><?php echo $_smarty_tpl->tpl_vars['search_form']->value;?>
<?php }?>
        </form>
        <h3 class="page-title">List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>
        <?php if (!empty($_smarty_tpl->tpl_vars['employee_data']->value)){?>
        <form action="employee/delete" method="post" id="listing_form">
            <div class="table-responsive">
                <table class="table table-bordered table-hover exportable" id="employee" name="employee">
                    <thead>
                    <th>No</th>
                    <th></th>
                    <th><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['idEmployee'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['firstName'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['lastName'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['title'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['telephone'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['employee_fields']->value['location'];?>
</th>

                    <th style="width:180;">Actions</th>
                    </thead>
                    <tbody>
                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['employee_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmployee'];?>
"/>
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['idEmployee'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['firstName'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['lastName'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['telephone'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['location'];?>
</td>

                            <td>
                                <div class="row-actions">
                                    <a href="employee/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmployee'];?>
" class="btn btn-info btn-xs"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="employee/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmployee'];?>
" class="btn btn-primary btn-xs"><i
                                                class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="javascript:chk('employee/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmployee'];?>
')"
                                       class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="actions-bar wat-cf">
                    <div class="actions">
                        <button class="btn btn-danger btn-xs" type="submit">
                            <i class="fa fa-trash" aria-hidden="true"></i> Delete Selected
                        </button>
                        <?php if ($_smarty_tpl->tpl_vars['showall']->value==0){?>
                            <a href="employee/index/0/all" class="btn btn-xs btn-primary show-all"><i
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
</div>


<script>
    $(document).ready(function () {
        $('.table').DataTable();
    });
</script>

<?php }} ?>