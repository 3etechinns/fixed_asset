<?php /* Smarty version Smarty-3.1.7, created on 2018-01-23 06:10:58
         compiled from "C:\wamp\www\research\iScaffoldnov6\output\fixed_asset\application\views\list_employee.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115045a66c3e277d398-94846891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7452ee0253c1d014f3d0baa09e867fb5421f44f3' => 
    array (
      0 => 'C:\\wamp\\www\\research\\iScaffoldnov6\\output\\fixed_asset\\application\\views\\list_employee.tpl',
      1 => 1516683066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115045a66c3e277d398-94846891',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search_form' => 0,
    'table_name' => 0,
    'employee_data' => 0,
    'employee_fields' => 0,
    'row' => 0,
    'showall' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a66c3e28e0b6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a66c3e28e0b6')) {function content_5a66c3e28e0b6($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp\\www\\research\\iScaffoldnov6\\output\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><!-- CUSTOM -->
<div class="panel panel-default">                    
                    <div class="panel-body">
                        <form action="employee/search" method="post" id="search_form">                     
                        <a href="employee/create/" class="btn btn-success btn-sm">
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
                            <table class="table exportable" id="employee" name="employee">
                                <thead>
                                    <th> </th>
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
                                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['employee_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmployee'];?>
" /></td>
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

                                            <td style="float:right">
                                            <div class="row-actions">
                                            <a href="employee/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmployee'];?>
" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="employee/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmployee'];?>
" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                             <a href="javascript:chk('employee/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmployee'];?>
')" class="btn btn-danger btn-xs"><i class="fa fa-close" aria-hidden="true"></i></a>
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
                                    <a href="employee/index/0/all" class="btn btn-xs btn-success show-all"><i lass="fa fa-eye"></i> Show All</a>
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