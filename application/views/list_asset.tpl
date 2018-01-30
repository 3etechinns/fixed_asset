<!-- CUSTOM -->
<div class="panel panel-default">
    <div class="panel-body">
        <form action="asset/search" method="post" id="search_form">
            <a href="asset/create/" class="btn btn-success btn-sm">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            {if isset($search_form)}{$search_form}{/if}
        </form>
        <h3 class="page-title">List of {$table_name}</h3>
        {if !empty( $asset_data )}
        <form action="asset/delete" method="post" id="listing_form">
            <div class="table-responsive">
                <table class="table exportable" id="asset" name="asset">
                    <thead>
                    <th></th>
                    <th>{$asset_fields.ass_status}</th>
                    <th>{$asset_fields.ass_model}</th>
                    <th>{$asset_fields.ass_serial_number}</th>
                    <th>{$asset_fields.ass_barcode_number}</th>
                    <th>{$asset_fields.ass_date_acquired}</th>
                    <th>{$asset_fields.ass_date_sold}</th>
                    <th>{$asset_fields.ass_purchase_price}</th>
                    <th>{$asset_fields.ass_dep_method}</th>
                    <th>{$asset_fields.ass_dep_life}</th>
                    <th>{$asset_fields.ass_cat_id}</th>
                    <th>{$asset_fields.status_status_id}</th>

                    <th style="width:18px;">Actions</th>
                    </thead>
                    <tbody>
                    {foreach $asset_data as $row}
                        <tr class="{cycle values='odd,even'}">
                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.ass_id}"/></td>
                            <td>{$row.ass_status}</td>
                            <td>{$row.ass_model}</td>
                            <td>{$row.ass_serial_number}</td>
                            <td>{$row.ass_barcode_number}</td>
                            <td>{$row.ass_date_acquired}</td>
                            <td>{$row.ass_date_sold}</td>
                            <td>{$row.ass_purchase_price}</td>
                            <td>{$row.ass_dep_method}</td>
                            <td>{$row.ass_dep_life}</td>
                            <td>{$row.ass_cat_id}</td>
                            <td>{$row.status_status_id}</td>

                            <td style="float:right">
                                <div class="row-actions">
                                    <a href="asset/show/{$row.ass_id}" class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                                                                      aria-hidden="true"></i></a>
                                    <a href="asset/edit/{$row.ass_id}" class="btn btn-primary btn-xs"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="javascript:chk('asset/delete/{$row.ass_id}')"
                                       class="btn btn-danger btn-xs"><i class="fa fa-close" aria-hidden="true"></i></a>
                                </div>
                            </td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
                <div class="actions-bar wat-cf">
                    <div class="actions">
                        <button class="btn btn-danger btn-xs" type="submit">
                            <i class="fa fa-close" aria-hidden="true"></i> Delete Selected
                        </button>
                        {if $showall==0}
                            <a href="asset/index/0/all" class="btn btn-xs btn-success show-all"><i lass="fa fa-eye"></i>
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
    {else}
    No records found.
    {/if}
</div>
</div>