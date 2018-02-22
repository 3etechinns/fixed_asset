<?php /* Smarty version Smarty-3.1.7, created on 2018-02-21 13:41:52
         compiled from "C:\wamp64\www\fixed_asset\application\views\show_asset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191235a8d68f65dd037-82467748%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0115e9a3413784a080971dde9e80eb9c5e1fdced' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\show_asset.tpl',
      1 => 1519220450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191235a8d68f65dd037-82467748',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a8d68f67c0bc',
  'variables' => 
  array (
    'id' => 0,
    'direction' => 0,
    'table_name' => 0,
    'asset_fields' => 0,
    'asset_data' => 0,
    'deep_data' => 0,
    'depreciation_fields' => 0,
    'i' => 0,
    'row' => 0,
    'checkAssetAvailability' => 0,
    'ass_track_data' => 0,
    'ass_track_fields' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8d68f67c0bc')) {function content_5a8d68f67c0bc($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp64\\www\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
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
            <button class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
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
            <div class="col-md-12">
                <div class="col-md-6">

                    <table class="table table-bordered" width="50%">
                        <thead>
                        <th width="50%">Field</th>
                        <th>Value</th>
                        </thead>

                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_name'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_name'];?>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['isAvailable'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['isAvailable'];?>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_purchase_price'];?>
:</td>
                            <td id="price"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_purchase_price'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
</td>
                        </tr>

                    </table>

                </div>
                <div class="col-md-6">

                    <table class="table table-bordered" width="50%">
                        <thead>
                        <th width="50%">Field</th>
                        <th>Value</th>
                        </thead>
                        
                            
                            
                        

                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_cat_id'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_cat_id'];?>
</td>
                        </tr>
                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['sub_category'];?>
:</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['sub_category'];?>
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
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Depreciation Detail
                    </div>
                    <div class="panel-body">
                        <?php if (!empty($_smarty_tpl->tpl_vars['deep_data']->value)){?>
                            <table id="dep" class="table table-bordered table-hover">

                                <thead>

                                <th> No</th>
                                <th> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_date'];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
  </th>
                                <th> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_amount'];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
 </th>
                                <th>  <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_status'];?>
<?php $_tmp4=ob_get_clean();?><?php echo $_tmp4;?>
  </th>
                                <th>  <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_description'];?>
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
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deep_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                    <tr>
                                        <td>   <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
<?php $_tmp8=ob_get_clean();?><?php echo $_tmp8;?>
</td>
                                        <td>   <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_date'];?>
<?php $_tmp9=ob_get_clean();?><?php echo $_tmp9;?>
 </td>
                                        <td id="Amount">    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_amount'];?>
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
                                        <td id="bookValue"> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['book_value'];?>
<?php $_tmp15=ob_get_clean();?><?php echo $_tmp15;?>
   </td>
                                        <td id="accumulativeValue"> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['accumulative_value'];?>
<?php $_tmp16=ob_get_clean();?><?php echo $_tmp16;?>
  </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        <?php }?>
                    </div>
                </div>

            </div>
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <label for=""> Asset Track</label>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['checkAssetAvailability']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>

                            <?php if ($_smarty_tpl->tpl_vars['row']->value['status']=='return'){?>
                                <button type="button" style="float: right;color: white" class="btn btn-success" for="">
                                    Available
                                </button>
                            <?php }?>

                        <?php } ?>
                    </div>
                    <div id="track" class="panel-body">


                        <?php if (!empty($_smarty_tpl->tpl_vars['ass_track_data']->value)){?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                
                                <th>No</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_trasferred'];?>
<?php $_tmp17=ob_get_clean();?><?php echo $_tmp17;?>
</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_returned'];?>
<?php $_tmp18=ob_get_clean();?><?php echo $_tmp18;?>
</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['penality_amount'];?>
<?php $_tmp19=ob_get_clean();?><?php echo $_tmp19;?>
</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['status'];?>
<?php $_tmp20=ob_get_clean();?><?php echo $_tmp20;?>
</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['payment_status'];?>
<?php $_tmp21=ob_get_clean();?><?php echo $_tmp21;?>
</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['payment_date'];?>
<?php $_tmp22=ob_get_clean();?><?php echo $_tmp22;?>
</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['ass_emp_id'];?>
<?php $_tmp23=ob_get_clean();?><?php echo $_tmp23;?>
</th>
                                <th><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['receiving_employee_id'];?>
<?php $_tmp24=ob_get_clean();?><?php echo $_tmp24;?>
</th>

                                </thead>
                                <tbody>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ass_track_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                    <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                        <td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                        
                                        <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['date_trasferred'];?>
<?php $_tmp25=ob_get_clean();?><?php echo $_tmp25;?>
</td>
                                        <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['date_returned'];?>
<?php $_tmp26=ob_get_clean();?><?php echo $_tmp26;?>
</td>
                                        <td id="penalityAmount"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['penality_amount'];?>
<?php $_tmp27=ob_get_clean();?><?php echo $_tmp27;?>
</td>
                                        <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['status'];?>
<?php $_tmp28=ob_get_clean();?><?php echo $_tmp28;?>
</td>
                                        <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['payment_status'];?>
<?php $_tmp29=ob_get_clean();?><?php echo $_tmp29;?>
</td>
                                        <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['payment_date'];?>
<?php $_tmp30=ob_get_clean();?><?php echo $_tmp30;?>
</td>
                                        <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['ass_emp_id'];?>
<?php $_tmp31=ob_get_clean();?><?php echo $_tmp31;?>
</td>
                                        <td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['receiving_employee_id'];?>
<?php $_tmp32=ob_get_clean();?><?php echo $_tmp32;?>
</td>
                                    </tr>
                                <?php } ?>

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


</style>

<script>
    $(document).ready(function () {
//        $('.table').DataTable();

        var nf = new Intl.NumberFormat();
        var PurchasePrice = $(this).find("#price").text();
        var PurchasePriceFormatted = nf.format(PurchasePrice);
        $(this).find("#price").html(PurchasePriceFormatted);

        $('#dep tr').each(function () {

            var amount = $(this).find("#Amount").text();
            var bookvalue = $(this).find("#bookValue").text();
            var accumulativeValue = $(this).find("#accumulativeValue").text();






            var amountFormatted = nf.format(amount);
            var bookvalueFormatted = nf.format(bookvalue);
            var accumulativeValueFormatted = nf.format(accumulativeValue);



            $(this).find("#bookValue").html(bookvalueFormatted);
            $(this).find("#accumulativeValue").html(accumulativeValueFormatted);
            $(this).find("#Amount").html(amountFormatted);



        });
    });


</script>
<?php }} ?>