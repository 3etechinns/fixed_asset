<?php /* Smarty version Smarty-3.1.7, created on 2018-01-23 05:57:05
         compiled from "C:\wamp64\www\fixed_asset\application\views\list_ass_track.tpl" */ ?>
<?php /*%%SmartyHeaderCode:304795a66ceb10e1478-21478594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '499b2212818ddc78dcc7a85d0ba10fc3dfb4a5be' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\list_ass_track.tpl',
      1 => 1516683068,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '304795a66ceb10e1478-21478594',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search_form' => 0,
    'table_name' => 0,
    'ass_track_data' => 0,
    'ass_track_fields' => 0,
    'row' => 0,
    'showall' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a66ceb11d23d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a66ceb11d23d')) {function content_5a66ceb11d23d($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp64\\www\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><!-- CUSTOM -->
<div class="panel panel-default">                    
                    <div class="panel-body">
                        <form action="ass_track/search" method="post" id="search_form">                     
                        <a href="ass_track/create/" class="btn btn-success btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>                   
                        <?php if (isset($_smarty_tpl->tpl_vars['search_form']->value)){?><?php echo $_smarty_tpl->tpl_vars['search_form']->value;?>
<?php }?>
                    </form>                        
                       <h3 class="page-title">List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>                  
                        <?php if (!empty($_smarty_tpl->tpl_vars['ass_track_data']->value)){?>
                        <form action="ass_track/delete" method="post" id="listing_form">
                          <div class="table-responsive">
                            <table class="table exportable" id="ass_track" name="ass_track">
                                <thead>
                                    <th> </th>
                                    			<th><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_trasferred'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_returned'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['penality_amount'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['current_value'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['payment_status'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['payment_date'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['Asset_ass_id'];?>
</th>

                                    <th style="width:180;">Actions</th>
                                </thead>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ass_track_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ass_track_id'];?>
" /></td>
                                            				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['date_trasferred'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['date_returned'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['penality_amount'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['current_value'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['payment_status'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['payment_date'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['Asset_ass_id'];?>
</td>

                                            <td style="float:right">
                                            <div class="row-actions">
                                            <a href="ass_track/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['ass_track_id'];?>
" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="ass_track/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['ass_track_id'];?>
" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                             <a href="javascript:chk('ass_track/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['ass_track_id'];?>
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
                                    <a href="ass_track/index/0/all" class="btn btn-xs btn-success show-all"><i lass="fa fa-eye"></i> Show All</a>
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