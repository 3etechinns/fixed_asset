<?php /* Smarty version Smarty-3.1.7, created on 2018-02-06 09:34:55
         compiled from "C:\wamp64\www\fixed_asset\application\views\show_depreciation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186155a7976bfa3fe50-14955119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ad88696a374577da794a07faed13732e6516370' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\show_depreciation.tpl',
      1 => 1517587759,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186155a7976bfa3fe50-14955119',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'direction' => 0,
    'table_name' => 0,
    'depreciation_fields' => 0,
    'depreciation_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a7976bfc0056',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7976bfc0056')) {function content_5a7976bfc0056($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp64\\www\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
                <div class="panel-body">
               <a href="depreciation/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>
               <a href="depreciation"> <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button></a>
               <a href="depreciation/create/"> <button class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a>

               <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>" href="depreciation/navigate/right/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/show"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>" href="depreciation/navigate/left/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
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
					<div class="col-sm-6">
                        <table class="table table-bordered table-responsive" width="50%">
                            <thead>
                            <th width="50%">Field</th>
                            <th>Value</th>
                            </thead>
                            <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_id'];?>
:</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_data']->value['dep_id'];?>
</td>
                            </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_date'];?>
:</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_data']->value['dep_date'];?>
</td>
                            </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_amount'];?>
:</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_data']->value['dep_amount'];?>
</td>
                            </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_status'];?>
:</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_data']->value['dep_status'];?>
</td>
                            </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_description'];?>
:</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_data']->value['dep_description'];?>
</td>
                            </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_commnet'];?>
:</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_data']->value['dep_commnet'];?>
</td>
                            </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['asset_ass_id'];?>
:</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['depreciation_data']->value['asset_ass_id'];?>
</td>
                            </tr>
                        </table>
                    </div>
                    </div><!-- .inner -->
                </div><!-- .content --><?php }} ?>