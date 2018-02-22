<!-- CUSTOM -->
<div class="panel panel-default">
    <div class="panel-body">
        <form action="tbl_reset_password/search" method="post" id="search_form">
            <a href="tbl_reset_password/create/" class="btn btn-primary btn-sm">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <div class="input-group" style="width:300px;float:right">
                <input type="text" required="true" class="form-control" name="search" id="search" onkeyup="myFunction()"
                       placeholder="Search...">
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
        <span id="searchResult" name="searchResult"
              class="label-info">{if !empty($search_result)} {$search_result}{/if}</span>
        <h3 class="page-title">List of {$table_name}</h3>
        {if !empty( $tbl_reset_password_data )}
        <form action="tbl_reset_password/delete" method="post" id="listing_form">
            <div class="table-responsive">
                <table class="table exportable" id="tbl_reset_password" name="tbl_reset_password">
                    <thead>
                    <th></th>
                    <th>{$tbl_reset_password_fields.id}</th>
                    <th>{$tbl_reset_password_fields.email}</th>
                    <th>{$tbl_reset_password_fields.activation_id}</th>
                    <th>{$tbl_reset_password_fields.agent}</th>
                    <th>{$tbl_reset_password_fields.client_ip}</th>
                    <th>{$tbl_reset_password_fields.isDeleted}</th>
                    <th>{$tbl_reset_password_fields.createdBy}</th>
                    <th>{$tbl_reset_password_fields.createdDtm}</th>
                    <th>{$tbl_reset_password_fields.updatedBy}</th>
                    <th>{$tbl_reset_password_fields.updatedDtm}</th>

                    <th style="width:180;">Actions</th>
                    </thead>
                    <tbody>
                    {foreach $tbl_reset_password_data as $row}
                        <tr class="{cycle values='odd,even'}">
                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.id}"/></td>
                            <td>{$row.id}</td>
                            <td>{$row.email}</td>
                            <td>{$row.activation_id}</td>
                            <td>{$row.agent}</td>
                            <td>{$row.client_ip}</td>
                            <td>{$row.isDeleted}</td>
                            <td>{$row.createdBy}</td>
                            <td>{$row.createdDtm}</td>
                            <td>{$row.updatedBy}</td>
                            <td>{$row.updatedDtm}</td>

                            <td style="float:right">
                                <div class="row-actions">
                                    <a href="tbl_reset_password/show/{$row.id}" class="btn btn-info btn-xs"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="tbl_reset_password/edit/{$row.id}" class="btn btn-primary btn-xs"><i
                                                class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="javascript:chk('tbl_reset_password/delete/{$row.id}')"
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
                            <a href="tbl_reset_password/index/0/all" class="btn btn-xs btn-primary show-all"><i
                                        lass="fa fa-eye"></i> Show All</a>
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
<h3 class="page-title">List of {$table_name}</h3>
<div id="jsGrid"></div>
<script>
    $(function () {
        $("#jsGrid").jsGrid({
            width: "100%",
            filtering: true,
            editing: true,
            inserting: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 6,
            pageButtonCount: 5,
            insertedRowLocation: "top",
            deleteConfirm: "Do you really want to delete ?",
            controller: {
                loadData: function () {
                    var d = $.Deferred();
                    $.ajax({
                        url: "tbl_reset_password/listGrid",
                        dataType: "json"
                    }).done(function (response) {
                        d.resolve(response.value);
                    });

                    return d.promise();
                },
                updateItem: function (item) {
                    var d = $.Deferred();
                    $.ajax({
                        type: "POST",
                        url: "tbl_reset_password/updateGrid",
                        data: item
                    }).done(function (response) {
                        //alert(response[0]);
                        //console.log(response["id"]);
                        //d.resolve(response.value);
                    });
                    //return d.promise();
                },
                deleteItem: function (item) {
                    var d = $.Deferred();
                    $.ajax({
                        type: "POST",
                        url: "tbl_reset_password/deleteGrid",
                        data: item
                    }).done(function (response) {
                        d.resolve(response.value);
                    });
                    return d.promise();
                },
                insertItem: function (item) {
                    var d = $.Deferred();
                    $.ajax({
                        type: "POST",
                        url: "tbl_reset_password/insertGrid",
                        data: item
                    }).done(function (response) {
                        d.resolve(response.value);
                    });
                    return d.promise();
                }
            },
            fields: [
                {name: 'email', type: 'text', title: 'Email', validate: 'required'},
                {name: 'activation_id', type: 'text', title: 'Activation Id', validate: 'required'},
                {name: 'agent', type: 'text', title: 'Agent', validate: 'required'},
                {name: 'client_ip', type: 'text', title: 'Client Ip', validate: 'required'},
                {name: 'isDeleted', type: 'text', title: 'IsDeleted', validate: 'required'},
                {name: 'createdBy', type: 'text', title: 'CreatedBy', validate: 'required'},
                {name: 'createdDtm', type: 'text', title: 'CreatedDtm', validate: 'required'},
                {name: 'updatedBy', type: 'text', title: 'UpdatedBy', validate: 'required'},
                {name: 'updatedDtm', type: 'text', title: 'UpdatedDtm', validate: 'required'},
                {type: 'control', width: 50}

            ]
        });
    });
</script>
