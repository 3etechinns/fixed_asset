<!-- CUSTOM -->
<div class="panel panel-default">

    <div  id="download" class="col-md-1 col-lg-push-11">
        <a class="btn btn-file" id="exportToExcell">
            <i  class="fa fa-download"></i></a>
    </div>
    <div class="panel-body">
        <form action="status/search" method="post" id="search_form">
            <a href="status/create/" class="btn btn-primary btn-sm">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>

        <form action="status/search" method="post" id="search_form">
            {if isset($search_form)}{$search_form}{/if}
        </form>

        <h3 class="page-title">List of {$table_name}</h3>
        {if !empty( $status_data )}
        <form action="status/delete" method="post" id="listing_form">
            <div class="table-responsive">
                <div class="col-sm-6">
                    <table class="table table-bordered table-hover exportable" id="status" name="status">
                        <thead>
                        <th>No</th>
                        <th></th>
                        <th>{$status_fields.status}</th>

                        <th style="width:180px;">Actions</th>
                        </thead>
                        <tbody>
                        {$i=1}
                        {foreach $status_data as $row}
                            <tr class="{cycle values='odd,even'}">
                                <td>{$i++}</td>
                                <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                           value="{$row.status_id}"/>
                                </td>
                                <td>{$row.status}</td>

                                <td>
                                    <div class="row-actions">
                                        <a href="status/show/{$row.status_id}" class="btn btn-info btn-xs"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="status/edit/{$row.status_id}" class="btn btn-primary btn-xs"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="javascript:chk('status/delete/{$row.status_id}')"
                                           class="btn btn-danger btn-xs"><i class="fa fa-close" aria-hidden="true"></i></a>
                                    </div>
                                </td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12">
                    <div class="actions-bar wat-cf">
                        <div class="actions">
                            <button class="btn btn-danger btn-xs" type="submit">
                                <i class="fa fa-close" aria-hidden="true"></i> Delete Selected
                            </button>
                            {if $showall==0}
                                <a href="status/index/0/all" class="btn btn-xs btn-primary show-all"><i
                                            lass="fa fa-eye"></i> Show All</a>
                            {/if}
                            <div class="pagination-wrapper pull-right">
                                {$pager}
                            </div>
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