<?php /* Smarty version Smarty-3.1.7, created on 2019-03-26 18:55:55
         compiled from "C:\wamp64\www\fixed_asset\application\views\show_asset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49375a6764c92e7fd6-77101798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0115e9a3413784a080971dde9e80eb9c5e1fdced' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\show_asset.tpl',
      1 => 1553626550,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49375a6764c92e7fd6-77101798',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a6764c948239',
  'variables' => 
  array (
    'id' => 0,
    'direction' => 0,
    'table_name' => 0,
    'asset_fields' => 0,
    'asset_data' => 0,
    'depreciation_fields' => 0,
    'deep_data' => 0,
    'row' => 0,
    'ass_track_data' => 0,
    'ass_track_fields' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6764c948239')) {function content_5a6764c948239($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp64\\www\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><div class="panel panel-default">
    <div class="panel-body">
        <a href="asset/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
        </a>
        <a href="asset">
            <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button>
        </a>
        <a href="asset/create/">
            <button class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
        </a>

        <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>"
           href="asset/navigate/right/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/show"><i class="fa fa-arrow-right"></i></a>
        <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>"
           href="asset/navigate/left/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
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
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered" width="50%">
                    <thead>
                    <th width="50%">Field</th>
                    <th>Value</th>
                    </thead>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_id'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_id'];?>
</td>
                    </tr>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_status'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_status'];?>
</td>
                    </tr>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_model'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_model'];?>
</td>
                    </tr>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_serial_number'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_serial_number'];?>
</td>
                    </tr>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_barcode_number'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_barcode_number'];?>
</td>
                    </tr>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_date_acquired'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_date_acquired'];?>
</td>
                    </tr>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_date_sold'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_date_sold'];?>
</td>
                    </tr>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_purchase_price'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_purchase_price'];?>
</td>
                    </tr>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_dep_method'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_dep_method'];?>
</td>
                    </tr>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_dep_life'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_dep_life'];?>
</td>
                    </tr>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_cat_id'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_cat_id'];?>
</td>
                    </tr>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_comment'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_comment'];?>
</td>
                    </tr>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_description'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_description'];?>
</td>
                    </tr>
                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['status_status_id'];?>
:</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['status_status_id'];?>
</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Depreciation Detai
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">

                            <thead>

                            <th>    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_id'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
  </th>
                            <th> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_date'];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
  </th>
                            <th> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_amount'];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
 </th>
                            <th>  <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_status'];?>
<?php $_tmp4=ob_get_clean();?><?php echo $_tmp4;?>
  </th>
                            <th>    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_description'];?>
<?php $_tmp5=ob_get_clean();?><?php echo $_tmp5;?>
</th>
                            <th>  <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_commnet'];?>
<?php $_tmp6=ob_get_clean();?><?php echo $_tmp6;?>
 </th>
                            <th>  <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['asset_ass_id'];?>
<?php $_tmp7=ob_get_clean();?><?php echo $_tmp7;?>
</th>
                            <th> Book Value</th>
                            <th>Accumulative Value</th>

                            </thead>
                            <tbody>
                            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deep_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                <tr>
                                    <td>   <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_id'];?>
<?php $_tmp8=ob_get_clean();?><?php echo $_tmp8;?>
</td>
                                    <td>   <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_date'];?>
<?php $_tmp9=ob_get_clean();?><?php echo $_tmp9;?>
 </td>
                                    <td>    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_amount'];?>
<?php $_tmp10=ob_get_clean();?><?php echo $_tmp10;?>
  </td>
                                    <td>    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_status'];?>
<?php $_tmp11=ob_get_clean();?><?php echo $_tmp11;?>
    </td>
                                    <td>    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_description'];?>
<?php $_tmp12=ob_get_clean();?><?php echo $_tmp12;?>
     </td>
                                    <td>    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_commnet'];?>
<?php $_tmp13=ob_get_clean();?><?php echo $_tmp13;?>
      </td>
                                    <td>    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['asset_ass_id'];?>
<?php $_tmp14=ob_get_clean();?><?php echo $_tmp14;?>
    </td>
                                    <td> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['book_value'];?>
<?php $_tmp15=ob_get_clean();?><?php echo $_tmp15;?>
   </td>
                                    <td> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['accumulative_value'];?>
<?php $_tmp16=ob_get_clean();?><?php echo $_tmp16;?>
  </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">Asset Track</div>
                    <div class="panel-body">


                        <?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?>
                            <table class="table">
                                <thead>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['ass_track_id'];?>
<?php $_tmp17=ob_get_clean();?><?php echo $_tmp17;?>
</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_trasferred'];?>
<?php $_tmp18=ob_get_clean();?><?php echo $_tmp18;?>
</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_returned'];?>
<?php $_tmp19=ob_get_clean();?><?php echo $_tmp19;?>
</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['penality_amount'];?>
<?php $_tmp20=ob_get_clean();?><?php echo $_tmp20;?>
</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['current_value'];?>
<?php $_tmp21=ob_get_clean();?><?php echo $_tmp21;?>
</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['payment_status'];?>
<?php $_tmp22=ob_get_clean();?><?php echo $_tmp22;?>
</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['payment_date'];?>
<?php $_tmp23=ob_get_clean();?><?php echo $_tmp23;?>
</th>

                                </thead>
                                <tbody>
                                <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                    <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['ass_track_id'];?>
<?php $_tmp24=ob_get_clean();?><?php echo $_tmp24;?>
</td>
                                    <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['date_trasferred'];?>
<?php $_tmp25=ob_get_clean();?><?php echo $_tmp25;?>
</td>
                                    <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['date_returned'];?>
<?php $_tmp26=ob_get_clean();?><?php echo $_tmp26;?>
</td>
                                    <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['penality_amount'];?>
<?php $_tmp27=ob_get_clean();?><?php echo $_tmp27;?>
</td>
                                    <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['current_value'];?>
<?php $_tmp28=ob_get_clean();?><?php echo $_tmp28;?>
</td>
                                    <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['payment_status'];?>
<?php $_tmp29=ob_get_clean();?><?php echo $_tmp29;?>
</td>
                                    <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['payment_date'];?>
<?php $_tmp30=ob_get_clean();?><?php echo $_tmp30;?>
</td>
                                </tr>


                                </tbody>
                            </table>

                        <?php }?>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- .inner -->
</div><!-- .content -->
<style>
    .table > thead > tr > th {
        padding: 4px;

    }
</style><?php }} ?>