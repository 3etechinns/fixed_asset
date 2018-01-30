<?php /* Smarty version Smarty-3.1.7, created on 2018-01-23 06:16:12
         compiled from "C:\wamp\www\research\iScaffoldnov6\output\fixed_asset\application\views\list_depreciation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158335a66c51cbaff79-10321105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36c3a075063fce8692fd5fec4af81b8fb4ca8e98' => 
    array (
      0 => 'C:\\wamp\\www\\research\\iScaffoldnov6\\output\\fixed_asset\\application\\views\\list_depreciation.tpl',
      1 => 1516683066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158335a66c51cbaff79-10321105',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search_form' => 0,
    'table_name' => 0,
    'depreciation_data' => 0,
    'depreciation_fields' => 0,
    'row' => 0,
    'showall' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a66c51cd175c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a66c51cd175c')) {function content_5a66c51cd175c($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp\\www\\research\\iScaffoldnov6\\output\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><!-- CUSTOM -->
<div class="panel panel-default">                    
                    <div class="panel-body">
                        <form action="depreciation/search" method="post" id="search_form">                     
                        <a href="depreciation/create/" class="btn btn-success btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>                   
                        <?php if (isset($_smarty_tpl->tpl_vars['search_form']->value)){?><?php echo $_smarty_tpl->tpl_vars['search_form']->value;?>
<?php }?>
                    </form>                        
                       <h3 class="page-title">List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>                  
                        <?php if (!empty($_smarty_tpl->tpl_vars['depreciation_data']->value)){?>
                        <form action="depreciation/delete" method="post" id="listing_form">
                          <div class="table-responsive">
                            <table class="table exportable" id="depreciation" name="depreciation">
                                <thead>
                                    <th> </th>
                                    			<th><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_date'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_amount'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_status'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_description'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_commnet'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['asset_ass_id'];?>
</th>

                                    <th style="width:180;">Actions</th>
                                </thead>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['depreciation_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['dep_id'];?>
" /></td>
                                            				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_date'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_amount'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_status'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_description'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_commnet'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['asset_ass_id'];?>
</td>

                                            <td style="float:right">
                                            <div class="row-actions">
                                            <a href="depreciation/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['dep_id'];?>
" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="depreciation/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['dep_id'];?>
" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                             <a href="javascript:chk('depreciation/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['dep_id'];?>
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
                                    <a href="depreciation/index/0/all" class="btn btn-xs btn-success show-all"><i lass="fa fa-eye"></i> Show All</a>
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