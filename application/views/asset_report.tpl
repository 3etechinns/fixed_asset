<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Asset Report</h3>
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
                <div class="col-md-6">
                    <label>Total Asset By Item</label>
                    <table class="table table-bordered  table-hover">
                        <thead>
                        <tr>
                            <th>
                                No

                            </th>
                            <th>Item</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>

                        <tbody>{$i=1}
                        {foreach $totalData as $row}
                            <tr>
                                <td>{$i++}</td>
                                <td>{$row.cat_name}</td>
                                <td>{$row.quantity}</td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <label>Total Asset on Store</label>
                    <table class="table table-bordered  table-hover">
                        <thead>
                        <tr>
                            <th>
                                No

                            </th>
                            <th>Item</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>

                        <tbody>{$i=1}
                        {foreach $assetInStore as $row}
                            <tr>
                                <td>{$i++}</td>
                                <td>{$row.cat_name}</td>
                                <td>{$row.quantity}</td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- ./box-body -->
</div>