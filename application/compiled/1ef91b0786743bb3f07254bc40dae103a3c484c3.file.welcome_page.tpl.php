<?php /* Smarty version Smarty-3.1.7, created on 2018-02-13 12:12:53
         compiled from "C:\wamp64\www\fixed_asset\application\views\welcome_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86005a82d645b59998-28270080%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ef91b0786743bb3f07254bc40dae103a3c484c3' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\welcome_page.tpl',
      1 => 1518388103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86005a82d645b59998-28270080',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total_asset' => 0,
    'config' => 0,
    'total_disposed' => 0,
    'total_depreciated' => 0,
    'currentlyAsset' => 0,
    'i' => 0,
    'row' => 0,
    'quantity' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a82d645c5487',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a82d645c5487')) {function content_5a82d645c5487($_smarty_tpl) {?><div class="row">
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3><?php echo $_smarty_tpl->tpl_vars['total_asset']->value;?>
</h3>
                    <p>Total assets</p>
                </div>
                <div class="icon">
                    <i class="fa fa-barcode"></i>
                </div>
                <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
asset" class="small-box-footer">More Info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-maroon">
                <div class="inner">
                    <h3><?php echo $_smarty_tpl->tpl_vars['total_disposed']->value;?>
</h3>
                    <p>Total Disposed</p>
                </div>
                <div class="icon">
                    <i class="fa fa-floppy-o"></i>
                </div>
                <a href="#" class="small-box-footer">More Info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3> <?php echo $_smarty_tpl->tpl_vars['total_depreciated']->value;?>
</h3>
                    <p>Total Depreciated</p>
                </div>
                <div class="icon">
                    <i class="fa fa-keyboard-o"></i>
                </div>
                <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
depreciation" class="small-box-footer">More Info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Asset Track</h3>
                <div class="box-tools pull-right">
                    <a class="btn btn-file" id="exportToExcell">
                        <i class="fa fa-download"></i></a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">

                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body" style="display: block;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="bootstrap-table">
                                <div class="fixed-table-toolbar"></div>

                                <div class="fixed-table-container table-no-bordered"
                                     style="height: 400px; padding-bottom: 40px;">

                                    <div class="fixed-table-body">

                                        <table class="table table-bordered exportable table-hover"
                                               name="activityReport" id="table" data-height="400" data-sort-order="desc"
                                        >
                                            <thead>
                                            <tr>
                                                <th style="width: 20px !important;">
                                                    <div>No</div>

                                                </th>
                                                <th class="col-sm-3" style="" data-field="created_at">
                                                    <div class="th-inner ">Date</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th class="col-sm-2" style="" data-field="admin">
                                                    <div class="th-inner ">Asset Name</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th class="col-sm-2" style="" data-field="action_type">
                                                    <div class="th-inner "><i
                                                                class="fa fa-user text-blue"></i> Employee</a></div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th class="col-sm-3" style="" data-field="item">
                                                    <div class="th-inner ">Serial Number</div>
                                                    <div class="fht-cell"></div>
                                                </th>

                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currentlyAsset']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                                <tr data-index="0">
                                                    <td style="width: 20px !important;"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                                    <td class="col-sm-3" style=""><?php echo $_smarty_tpl->tpl_vars['row']->value['recentDate'];?>
</td>
                                                    <td class="col-sm-2" style=""><?php echo $_smarty_tpl->tpl_vars['row']->value['ass_name'];?>
</td>
                                                    <td class="col-sm-2" style=""><?php echo $_smarty_tpl->tpl_vars['row']->value['reciver_full_name'];?>
</td>
                                                    <td class="col-sm-3" style="">
                                                        <nobr><i class="fa fa-barcode text-blue"></i>

                                                            <?php echo $_smarty_tpl->tpl_vars['row']->value['ass_serial_number'];?>

                                                        </nobr>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="fixed-table-footer" style="display: none;">
                                        <table>
                                            <tbody>
                                            <tr></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="fixed-table-pagination" style="display: none;"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                        </div><!-- /.responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-12 text-center" style="padding-top: 10px;">
                        <a href="https://demo.snipeitapp.com/reports/activity" class="btn btn-primary btn-sm"
                           style="width: 100%">View All</a>
                    </div>
                </div><!-- /.row -->
            </div><!-- ./box-body -->
        </div><!-- /.box -->
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Assets by Status</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="min-height: 400px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="chart" class="chart-responsive">

                                </div> <!-- ./chart-responsive -->
                            </div> <!-- /.col -->
                        </div> <!-- /.row -->
                    </div><!-- /.box-body -->
                </div> <!-- /.box -->
            </div>
            <div class="col-md-6">

                <!-- Categories -->
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Asset Categories</h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-file" id="exportToExcell">
                                <i class="fa fa-download"></i></a>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bootstrap-table">
                                    <div class="fixed-table-toolbar"></div>
                                    <div class="fixed-table-pagination" style="clear: both; display: none;"></div>
                                    <div class="fixed-table-container table-no-bordered"
                                         style="height: 440px; padding-bottom: 40px;">
                                        <div class="fixed-table-header" style="margin-right: 0px;">

                                        </div>
                                        <div class="fixed-table-body">

                                            <table class="table table-hover snipe-table exportable table-responsive table-bordered"
                                                   name="categorySummary" id="table" data-height="440">
                                                <thead>
                                                <tr>

                                                    <th class="col-sm-1">
                                                        <div>No</div>
                                                    </th>
                                                    <th class="col-sm-2">
                                                        <div>Cat Code</div>
                                                    </th>
                                                    <th class="col-sm-3">
                                                        <div>Category Name</div>
                                                    </th>
                                                    <th class="col-sm-2" style="">
                                                        <div>Total</div>

                                                    </th>
                                                    <th class="col-sm-2" style="">
                                                        <div>Life Time</div>

                                                    </th>


                                                </thead>

                                                <tbody>
                                                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['quantity']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                                    <tr>
                                                        <td class="col-sm-1"><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_id'];?>
</td>
                                                        <td class="col-sm-1"><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_code'];?>
</td>
                                                        <td class="col-sm-3"><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_name'];?>
</td>
                                                        <td class="col-sm-1"><span
                                                                    class="badge-quantity badge"><?php echo $_smarty_tpl->tpl_vars['row']->value['quantity'];?>
</span>
                                                        </td>
                                                        <td class="col-sm-1"><?php echo $_smarty_tpl->tpl_vars['row']->value['depriciation_life'];?>
</td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>

                                            </table>
                                        </div>
                                        <div class="fixed-table-footer" style="display: none;">
                                            <table>
                                                <tbody>
                                                <tr></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="fixed-table-pagination" style="display: none;"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- /.col -->
                            <div class="col-md-12 text-center" style="padding-top: 10px;">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
asset_category" class="btn btn-primary btn-sm"
                                   style="width: 100%">View All</a>
                            </div>
                        </div> <!-- /.row -->

                    </div><!-- /.box-body -->
                </div> <!-- /.box -->
            </div>
        </div>
    </div>

</div>

<!-- Plotly.js -->

<!-- Numeric JS -->
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

<script>


    function plotPieCart(label, total) {
        var data = [{
            values: total,
            labels: label,
            type: 'pie'
        }];
        Plotly.newPlot('chart', data);
    }


    $(document).ready(function () {
        var total = [];
        var status = [];
        $.ajax({
            type: "GET",
            url: 'http://localhost/fixed_asset/asset/assetCounterBasedOnCategory',
            dataType: 'json',
            success: function (response) {
                for (var i = 0; i < response.length; i++) {

                    total.push(response[i].total);
                    status.push(response[i].status);
                    //  console.log(response[i].total)
                }

                plotPieCart(status, total)


            }
        });
    })

</script><?php }} ?>