<!-- CUSTOM -->
<div class="panel panel-default">
    <div class="panel-body">
        <form action="tbl_users/search" method="post" id="search_form">
            <a href="tbl_users/create/" class="btn btn-primary btn-sm">
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
        {if !empty( $tbl_users_data )}
        <form action="tbl_users/delete" method="post" id="listing_form">
            <div class="table-responsive">
                <table class="table table-bordered exportable" id="tbl_users" name="tbl_users">
                    <thead>
                    <th>No</th>
                    <th></th>
                    <th>{$tbl_users_fields.email}</th>
                    <th>{$tbl_users_fields.name}</th>
                    <th>{$tbl_users_fields.mobile}</th>
                    <th>{$tbl_users_fields.roleId}</th>
                    <th>{$tbl_users_fields.isDeleted}</th>
                    <th>{$tbl_users_fields.createdBy}</th>
                    <th>{$tbl_users_fields.createdDtm}</th>
                    <th>{$tbl_users_fields.updatedBy}</th>
                    <th>{$tbl_users_fields.updatedDtm}</th>

                    <th style="width:180px;">Actions</th>
                    </thead>
                    <tbody>
                    {$i=1}
                    {foreach $tbl_users_data as $row}
                        <tr class="{cycle values='odd,even'}">
                            <td>{$i++}</td>
                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.userId}"/></td>
                            <td>{$row.email}</td>
                            <td>{$row.name}</td>
                            <td>{$row.mobile}</td>
                            <td>{$row.roleId}</td>
                            <td>{$row.isDeleted}</td>
                            <td>{$row.createdBy}</td>
                            <td>{$row.createdDtm}</td>
                            <td>{$row.updatedBy}</td>
                            <td>{$row.updatedDtm}</td>

                            <td>
                                <div class="row-actions">
                                    <a href="tbl_users/show/{$row.userId}" class="btn btn-info btn-xs"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="tbl_users/edit/{$row.userId}" class="btn btn-primary btn-xs"><i
                                                class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="javascript:chk('tbl_users/delete/{$row.userId}')"
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
                            <a href="tbl_users/index/0/all" class="btn btn-xs btn-primary show-all"><i
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