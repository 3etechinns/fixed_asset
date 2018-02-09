<!-- CUSTOM -->
<div class="panel panel-default">
    <div  id="download" class="col-md-1 col-lg-push-11">
        <a class="btn btn-file" id="exportToExcell">
            <i  class="fa fa-download"></i></a>
    </div>
    <div class="panel-body">
        <form action="employee/search" method="post" id="search_form">
            <a href="employee/create/" class="btn btn-primary btn-sm">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            {if isset($search_form)}{$search_form}{/if}
        </form>
        <h3 class="page-title">List of {$table_name}</h3>
        {if !empty( $employee_data )}
        <form action="employee/delete" method="post" id="listing_form">
            <div class="table-responsive">
                <table class="table table-bordered table-hover exportable" id="employee" name="employee">
                    <thead>
                    <th>No</th>
                    <th></th>
                    <th>{$employee_fields.idEmployee}</th>
                    <th>{$employee_fields.firstName}</th>
                    <th>{$employee_fields.lastName}</th>
                    <th>{$employee_fields.title}</th>
                    <th>{$employee_fields.telephone}</th>
                    <th>{$employee_fields.location}</th>

                    <th style="width:180;">Actions</th>
                    </thead>
                    <tbody>
                    {$i=1}
                    {foreach $employee_data as $row}
                        <tr class="{cycle values='odd,even'}">
                            <td>{$i++}</td>
                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.idEmployee}"/>
                            </td>
                            <td>{$row.idEmployee}</td>
                            <td>{$row.firstName}</td>
                            <td>{$row.lastName}</td>
                            <td>{$row.title}</td>
                            <td>{$row.telephone}</td>
                            <td>{$row.location}</td>

                            <td>
                                <div class="row-actions">
                                    <a href="employee/show/{$row.idEmployee}" class="btn btn-info btn-xs"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="employee/edit/{$row.idEmployee}" class="btn btn-primary btn-xs"><i
                                                class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="javascript:chk('employee/delete/{$row.idEmployee}')"
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
                            <a href="employee/index/0/all" class="btn btn-xs btn-primary show-all"><i
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

