<!-- CUSTOM -->
<div class="panel panel-default hidden">
                    <div class="panel-body">
                        <form action="tbl_permission/search" method="post" id="search_form">
                        <a href="tbl_permission/create/" class="btn btn-success btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <div class="input-group" style="width:300px;float:right">
                            <input type="text" required="true" class="form-control" name="search" id="search" onkeyup="myFunction()" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            <span class="input-group-btn">
                                <a class="btn btn-default" type="submit" id="exportToExcell" name="exportToExcell">
                                    <i class="fa fa-download"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                         <span id="searchResult" name="searchResult" class="label-info">{if !empty($search_result)} {$search_result}{/if}</span>
                       <h3 class="page-title">List of {$table_name}</h3>
                        {if !empty( $tbl_permission_data )}
                        <form action="tbl_permission/delete" method="post" id="listing_form">
                          <div class="table-responsive">
                            <table class="table table-bordered table-hover exportable" id="tbl_permission" name="tbl_permission">
                                <thead>
                                    <th> </th>
                                    			<th>{$tbl_permission_fields.pm_pg_id}</th>
			<th>{$tbl_permission_fields.pm_enabled}</th>
			<th>{$tbl_permission_fields.pm_edit}</th>
			<th>{$tbl_permission_fields.pm_insert}</th>
			<th>{$tbl_permission_fields.pm_view}</th>
			<th>{$tbl_permission_fields.pm_delete}</th>
			<th>{$tbl_permission_fields.pm_show}</th>
			<th>{$tbl_permission_fields.pm_role}</th>

                                    <th style="width: 180px;">Actions</th>
                                </thead>
                                <tbody>
                                    {foreach $tbl_permission_data as $row}
                                        <tr class="{cycle values='odd,even'}">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.pm_id}" /></td>
                                            				<td>{$row.pm_pg_id}</td>
				<td>{$row.pm_enabled}</td>
				<td>{$row.pm_edit}</td>
				<td>{$row.pm_insert}</td>
				<td>{$row.pm_view}</td>
				<td>{$row.pm_delete}</td>
				<td>{$row.pm_show}</td>
				<td>{$row.pm_role}</td>

                                            <td style="float:right">
                                            <div class="row-actions">
                                            <a href="tbl_permission/show/{$row.pm_id}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="tbl_permission/edit/{$row.pm_id}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                             <a href="javascript:chk('tbl_permission/delete/{$row.pm_id}')" class="btn btn-danger btn-xs"><i class="fa fa-close" aria-hidden="true"></i></a>
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
                                    <a href="tbl_permission/index/0/all" class="btn btn-xs btn-success show-all"><i lass="fa fa-eye"></i> Show All</a>
                                    {/if}
                                    <div class="pagination-wrapper pull-right">
                                    {$pager}
                                </div>
                                </div>

                            </div>
                        </form>

                        </div>
                        {else}
                            No records found.
                        {/if}
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
     <h3 class="page-title">List of {$table_name}</h3>
    <div id="jsGrid"></div>
</div>
</div>
    <script>
        $(function() {
            $("#jsGrid").jsGrid({
                width: "100%",
                filtering: true,
                editing: true,
                inserting: true,
                sorting: true,
                paging: true,
                autoload: true,
                pageSize: 15,
                pageButtonCount: 5,
                insertedRowLocation: "top",
                deleteConfirm: "Do you really want to delete ?",
                controller: {
                    loadData: function() {
                        var d = $.Deferred();
                        $.ajax({
                           url: "tbl_permission/listGrid",
                            dataType: "json"
                        }).done(function(response) {
                            d.resolve(response.value);
                        });

                        return d.promise();
                    },
                    updateItem: function(item) {
                         var d = $.Deferred();
                         $.ajax({
                           type: "POST",
                            url: "tbl_permission/updateGrid",
                            data: item
                        }).done(function(response) {
                            //alert(response[0]);
                            //console.log(response["id"]);
                            //d.resolve(response.value);
                        });
                         //return d.promise();
                    },
                    deleteItem: function(item) {
                         var d = $.Deferred();
                         $.ajax({
                           type: "POST",
                            url: "tbl_permission/deleteGrid",
                            data: item
                        }).done(function(response) {
                            d.resolve(response.value);
                        });
                         return d.promise();
                    },
                    insertItem: function(item) {
                         var d = $.Deferred();
                         $.ajax({
                           type: "POST",
                            url: "tbl_permission/insertGrid",
                            data: item
                        }).done(function(response) {
                            d.resolve(response.value);
                        });
                         return d.promise();
                    }
                },
                fields: [
                    { name: 'pm_pg_id', type: 'text', title: 'Pm Pg Id', css: 'hidden'  },
                    { name: 'pg_name', type: 'text', title: 'Page', validate: 'required'  },
{ name: 'pm_enabled', type: 'select', title: 'Pm Enabled', validate: 'required', items: [ "No", "Yes" ]},
{ name: 'pm_edit', type: 'select', title: 'Pm Edit', validate: 'required', items: [ "No", "Own", "All", "Team" ]},
{ name: 'pm_insert', type: 'select', title: 'Pm Insert', validate: 'required', items: [ "No", "Yes" ]  },
{ name: 'pm_view', type: 'select', title: 'Pm View', validate: 'required', items: [ "No", "Own", "All", "Team" ]  },
{ name: 'pm_delete', type: 'select', title: 'Pm Delete', validate: 'required',items: [ "No", "Own", "All", "Team" ]  },
{ name: 'pm_show', type: 'select', title: 'Pm Show', validate: 'required',items: [ "No", "Own", "All", "Team" ]  },
{ name: 'pm_role', type: 'text', title: 'Pm Role', validate: 'required'  },
{ name: 'pm_description', type: 'text', title: 'Pm Description'},
					{ type: 'control' , width:70}

                ]
            });
        });
    </script>
