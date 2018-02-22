<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{$total_asset}</h3>
                    <p>Total assets</p>
                </div>
                <div class="icon">
                    <i class="fa fa-barcode"></i>
                </div>
                <a href="{$config.base_url}asset" class="small-box-footer">More Info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-maroon">
                <div class="inner">
                    <h3>{$total_disposed}</h3>
                    <p>Total Asset In Store</p>
                </div>
                <div class="icon">
                    <i class="fa fa-floppy-o"></i>
                </div>
                <a href="#" class="small-box-footer"><i
                            class="fa "></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3> {$total_depreciated}</h3>
                    <p>Total Depreciated</p>
                </div>
                <div class="icon">
                    <i class="fa fa-keyboard-o"></i>
                </div>
                <a href="{$config.base_url}depreciation" class="small-box-footer">More Info <i
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
                                            {$i=1}
                                            {foreach $currentlyAsset as $row}
                                                <tr data-index="0">
                                                    <td style="width: 20px !important;">{$i++}</td>
                                                    <td class="col-sm-3" style="">{$row.recentDate}</td>
                                                    <td class="col-sm-2" style="">{$row.ass_name}</td>
                                                    <td class="col-sm-2" style="">{$row.reciver_full_name}</td>
                                                    <td class="col-sm-3" style="">
                                                        <nobr><i class="fa fa-barcode text-blue"></i>

                                                            {$row.ass_serial_number}
                                                        </nobr>
                                                    </td>

                                                </tr>
                                            {/foreach}
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
                        <h3 class="box-title">Asset  Sub Categories</h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-file" id="exportToExcell2">
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

                                            <table class="table table-hover  exportable2 table-responsive table-bordered"
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
                                                    {*<th class="col-sm-2" style="">*}
                                                        {*<div>Life Time</div>*}

                                                    {*</th>*}


                                                </thead>

                                                <tbody class="scrollable">
                                                {foreach $quantity as $row}
                                                    <tr>
                                                        <td class="col-sm-1">{$row.cat_id}</td>
                                                        <td class="col-sm-1">{$row.cat_code}</td>
                                                        <td class="col-sm-3">{$row.cat_name}</td>
                                                        <td class="col-sm-1"><span
                                                                    class="badge-quantity badge">{$row.quantity}</span>
                                                        </td>
                                                        {*<td class="col-sm-1">{$row.depriciation_life}</td>*}
                                                    </tr>
                                                {/foreach}
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
                                <a href="{$config.base_url}asset_category" class="btn btn-primary btn-sm"
                                   style="width: 100%">View All</a>
                            </div>
                        </div> <!-- /.row -->

                    </div><!-- /.box-body -->
                </div> <!-- /.box -->
            </div>
        </div>
    </div>

</div>

<style>

    tbody {
        display:block;
        height:100px;
        overflow:auto;
    }
    thead, tbody tr {
        display:table;
        width:100%;
        table-layout:fixed;/* even columns width , fix width of table too*/
    }

</style>

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
            url: 'http://localhost:8080/fixed_asset/asset/assetCounterBasedOnCategory',
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

</script>