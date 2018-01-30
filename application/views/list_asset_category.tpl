<!-- CUSTOM -->
<div class="panel panel-default">
    <div class="panel-body">
        <form action="asset_category/search" method="post" id="search_form">
            <a href="asset_category/create/" class="btn btn-success btn-sm">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            {if isset($search_form)}{$search_form}{/if}
        </form>
        <h3 class="page-title">List of {$table_name}</h3>
        {if !empty( $asset_category_data )}
        <form action="asset_category/delete" method="post" id="listing_form">
            <div class="table-responsive">
                <table class="table exportable" id="asset_category" name="asset_category">
                    <thead>
                    <th></th>
                    <th>{$asset_category_fields.cat_code}</th>
                    <th>{$asset_category_fields.cat_name}</th>
                    <th>{$asset_category_fields.cat_description}</th>
                    <th>{$asset_category_fields.cat_status}</th>

                    <th style="width:180;">Actions</th>
                    </thead>
                    <tbody>
                    {foreach $asset_category_data as $row}
                        <tr class="{cycle values='odd,even'}">
                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.cat_id}"/></td>
                            <td>{$row.cat_code}</td>
                            <td>{$row.cat_name}</td>
                            <td>{$row.cat_description}</td>
                            <td>{$row.cat_status}</td>

                            <td style="float:right">
                                <div class="row-actions">
                                    <a href="asset_category/show/{$row.cat_id}" class="btn btn-info btn-xs"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="asset_category/edit/{$row.cat_id}" class="btn btn-primary btn-xs"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="javascript:chk('asset_category/delete/{$row.cat_id}')"
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
                            <a href="asset_category/index/0/all" class="btn btn-xs btn-success show-all"><i
                                        lass="fa fa-eye"></i> Show All</a>
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