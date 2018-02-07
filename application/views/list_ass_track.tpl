<!-- CUSTOM -->
<div class="panel panel-default">
    <div  id="download" class="col-md-1 col-lg-push-11">
        <a class="btn btn-file" id="exportToExcell">
            <i  class="fa fa-download"></i></a>
    </div>
    <div class="panel-body">
        <form action="ass_track/search" method="post" id="search_form">
            <a href="ass_track/create/" class="btn btn-primary btn-sm">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            {if isset($search_form)}{$search_form}{/if}
        </form>
        <h3 class="page-title">List of {$table_name}</h3>
        {if !empty( $ass_track_data )}
        <form action="ass_track/delete" method="post" id="listing_form">
            <div class="table-responsive">
                <table class="table table-bordered table-hover exportable" id="ass_track" name="ass_track">
                    <thead>
                    <th>No</th>
                    <th></th>
                    <th>{$ass_track_fields.date_trasferred}</th>
                    <th>{$ass_track_fields.date_returned}</th>
                    <th>{$ass_track_fields.penality_amount}</th>
                    <th>{$ass_track_fields.status}</th>
                    <th>{$ass_track_fields.payment_status}</th>
                    <th>{$ass_track_fields.payment_date}</th>
                    <th>{$ass_track_fields.Asset_ass_id}</th>
                    <th>{$ass_track_fields.ass_emp_id}</th>
                    <th>{$ass_track_fields.receiving_employee_id}</th>

                    <th style="width:180px;">Actions</th>
                    </thead>
                    <tbody>
                    {$i=1}
                    {foreach $ass_track_data as $row}
                        <tr class="{cycle values='odd,even'}">
                            <td>{$i++}</td>
                            <td><input type="checkbox" class="checkbox" name="delete_ids[]"
                                       value="{$row.ass_track_id}"/></td>
                            <td>{$row.date_trasferred}</td>
                            <td>{$row.date_returned}</td>
                            <td>{$row.penality_amount}</td>
                            <td>{$row.status}</td>
                            <td>{if $row.payment_status eq 1}

                                    payed

                                    {else}
                                    Null

                                {/if}
                            </td>
                            <td>{$row.payment_date}</td>
                            <td>{$row.Asset_ass_id}</td>
                            <td>{$row.ass_emp_id}</td>
                            <td>{$row.receiving_employee_id}</td>

                            <td>
                                <div class="row-actions">
                                    <a href="ass_track/show/{$row.ass_track_id}" class="btn btn-info btn-xs"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="ass_track/edit/{$row.ass_track_id}" class="btn btn-primary btn-xs"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="javascript:chk('ass_track/delete/{$row.ass_track_id}')"
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
                            <a href="ass_track/index/0/all" class="btn btn-xs btn-primary show-all"><i
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

<script>
    $(document).ready(function () {
        $('.table').DataTable();
    });
</script>

