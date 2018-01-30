<?php /* Smarty version Smarty-3.1.7, created on 2018-01-23 22:04:40
         compiled from "C:\wamp64\www\fixed_asset\application\views\show_ass_track.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136155a67b178cfa125-69765260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '275131f86ab6d4114a9622dc39b9f3818c960d08' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\show_ass_track.tpl',
      1 => 1516683068,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136155a67b178cfa125-69765260',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'direction' => 0,
    'table_name' => 0,
    'ass_track_fields' => 0,
    'ass_track_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a67b178e4509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a67b178e4509')) {function content_5a67b178e4509($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp64\\www\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
                <div class="panel-body">
               <a href="ass_track/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>
               <a href="ass_track"> <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button></a>
               <a href="ass_track/create/"> <button class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a>

               <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>" href="ass_track/navigate/right/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/show"><i class="fa fa-arrow-right"></i></a>
                         <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>" href="ass_track/navigate/left/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['ass_track_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['ass_track_id'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_trasferred'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['date_trasferred'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_returned'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['date_returned'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['penality_amount'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['penality_amount'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['current_value'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['current_value'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['payment_status'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['payment_status'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['payment_date'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['payment_date'];?>
</td>
                        </tr><tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['Asset_ass_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['Asset_ass_id'];?>
</td>
                        </tr>
						</table>                       
                    </div><!-- .inner -->
                </div><!-- .content --><?php }} ?>