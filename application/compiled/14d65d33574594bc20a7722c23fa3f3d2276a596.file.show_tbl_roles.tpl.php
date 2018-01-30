<?php /* Smarty version Smarty-3.1.7, created on 2018-01-26 19:10:25
         compiled from "C:\wamp64\www\fixed_asset\application\views\show_tbl_roles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191905a6b7d219bfe33-58759643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14d65d33574594bc20a7722c23fa3f3d2276a596' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\show_tbl_roles.tpl',
      1 => 1509686892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191905a6b7d219bfe33-58759643',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'direction' => 0,
    'table_name' => 0,
    'tbl_roles_fields' => 0,
    'tbl_roles_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a6b7d21ad076',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6b7d21ad076')) {function content_5a6b7d21ad076($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp64\\www\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
                <div class="panel-body">
               <a href="tbl_roles/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>
               <a href="tbl_roles"> <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button></a>
               <a href="tbl_roles/create/"> <button class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a>

               <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>" href="tbl_roles/navigate/right/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/show"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>" href="tbl_roles/navigate/left/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl_roles_fields']->value['roleId'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl_roles_data']->value['roleId'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl_roles_fields']->value['role'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl_roles_data']->value['role'];?>
</td>
                        </tr>
						</table>                       
                    </div><!-- .inner -->
                </div><!-- .content --><?php }} ?>