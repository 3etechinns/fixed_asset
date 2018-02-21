<!-- CUSTOM -->
<div class="panel panel-default">
    <div class="panel-body">

        <div class="col-md-12">
            <div class="col-md-2">


                <a href="asset/create/" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>

            </div>
            <div class="col-md-6 col-md-4">
                <form class="form" method='post' action="asset/search" id="searchForm" enctype="multipart/form-data">

                    <div class="input-group">
                        <input type="text"
                               class="form-control"
                               placeholder="Enter name of asset"
                               id="search"
                               name="search"/>
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-1 col-md-push-5">
                <a class="btn btn-file" id="exportToExcell">
                    <i class="fa fa-download"></i></a>
            </div>
        </div>
        <div class="col-md-12">

            <h3 class="page-title box-title">List of {$table_name}</h3>

            {if !empty( $asset_data )}
            <form action="asset/delete" method="post" id="listing_form">
                <div class="table-responsive">
                    <table id="asset" class="table table-bordered  table-hover exportable" name="asset">
                        <thead>
                        <th>No</th>
                        <th><input type="checkbox" class="checkbox"/></th>
                        <th>{$asset_fields.ass_name}</th>
                        <th>{$asset_fields.ass_model}</th>
                        <th>{$asset_fields.ass_serial_number}</th>
                        <th>{$asset_fields.isAvailable}</th>
                        <th>{$asset_fields.ass_date_acquired}</th>
                        <th>{$asset_fields.ass_purchase_price}</th>
                        <th>{$asset_fields.model_number}</th>
                        <th>{$asset_fields.ass_cat_id}</th>
                        <th>{$asset_fields.sub_category}</th>
                        <th>{$asset_fields.status_status_id}</th>

                        <th style="width:18px;">Actions</th>
                        </thead>
                        <tbody>
                        {$i=1}
                        {foreach $asset_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td>{$i++}</td>
                                <td>
                                    <input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.ass_id}"/>
                                </td>

                                <td>{$row.ass_name}</td>
                                <td>{$row.ass_model}</td>
                                <td>{$row.ass_serial_number}</td>
                                <td>{$row.isAvailable}</td>
                                <td>{$row.ass_date_acquired}</td>
                                <td id="price">{$row.ass_purchase_price}</td>
                                <td>{$row.model_number}</td>

                                <td>{$row.ass_cat_id}</td>
                                <td>{$row.sub_category}</td>
                                <td>{$row.status_status_id}</td>

                                <td>
                                    <div class="row-actions">
                                        <a href="asset/show/{$row.ass_id}" class="btn btn-info btn-xs"><i
                                                    class="fa fa-eye"
                                                    aria-hidden="true"></i></a>
                                        <a href="asset/edit/{$row.ass_id}" class="btn btn-primary btn-xs"><i
                                                    class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="javascript:chk('asset/delete/{$row.ass_id}')"
                                           class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                    <div class="actions-bar wat-cf">
                        <div class="actions">
                            <button class="btn btn-danger btn-xs" type="submit">
                                <i class="fa fa-trash" aria-hidden="true"></i> Delete Selected
                            </button>
                            {if $showall==0}
                                <a href="asset/index/0/all" class="btn btn-xs btn-primary show-all"><i
                                            lass="fa fa-eye"></i>
                                    Show All</a>
                            {/if}
                            <div class="pagination-wrapper pull-right">
                                {$pager}
                            </div>
                        </div>

                    </div>
            </form>
            <div class="col-sm-12" id="chartArea" name="chartArea">
            </div>
        </div>
    </div>
    {else}
    No records found.
    {/if}
</div>
</div>


<script>
    $(document).ready(function () {
        $('.table').DataTable();
        $('#asset tr').each(function () {
            var price = $(this).find("#price").text();
            var nf = new Intl.NumberFormat();
            var priceFormatted = nf.format(price);
            $(this).find("#price").html(priceFormatted);

        });



    });

    $.ajax({
        type: 'GET',
        url: "http://localhost:8080/fixed_asset/asset/allAssetBySerialNumber",
//        data: data,
        dataType: 'json',
        success: function (result) {
            console.log(result);


            $("#search").autocomplete({
                source: result,
                select: function (event, ui) {
                    console.log(result);

                }


            });

//            return;
        }
    });
</script>

