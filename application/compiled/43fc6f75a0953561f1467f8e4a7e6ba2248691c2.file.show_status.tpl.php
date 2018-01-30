<?php /* Smarty version Smarty-3.1.7, created on 2018-01-23 06:17:13
         compiled from "C:\wamp\www\research\iScaffoldnov6\output\fixed_asset\application\views\show_status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169465a66c559266d56-08270370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43fc6f75a0953561f1467f8e4a7e6ba2248691c2' => 
    array (
      0 => 'C:\\wamp\\www\\research\\iScaffoldnov6\\output\\fixed_asset\\application\\views\\show_status.tpl',
      1 => 1516683066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169465a66c559266d56-08270370',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'direction' => 0,
    'table_name' => 0,
    'status_fields' => 0,
    'status_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a66c5593ab12',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a66c5593ab12')) {function content_5a66c5593ab12($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp\\www\\research\\iScaffoldnov6\\output\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
                <div class="panel-body">
               <a href="status/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>
               <a href="status"> <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button></a>
               <a href="status/create/"> <button class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a>

               <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>" href="status/navigate/right/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/show"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>" href="status/navigate/left/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
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
						<table class="table" width="50%">
                        	<thead>
                                <th width="20%">Field</th>
                                <th>Value</th>
                        	</thead>
						    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['status_fields']->value['status_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['status_data']->value['status_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['status_fields']->value['status'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['status_data']->value['status'];?>
</td>
                        </tr>
						</table>                       
                    </div><!-- .inner -->
                </div><!-- .content --><?php }} ?>