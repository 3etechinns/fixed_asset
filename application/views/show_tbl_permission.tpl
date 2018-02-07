<div class="panel panel-default">
    <div class="panel-body">
        <a href="tbl_permission/edit/{$id}">
            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
        </a>
        <a href="tbl_permission">
            <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button>
        </a>
        <a href="tbl_permission/create/">
            <button class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
        </a>

        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}"
           href="tbl_permission/navigate/right/{$id}/show"><i class="fa fa-arrow-right"></i></a>
        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}"
           href="tbl_permission/navigate/left/{$id}/show"><i class="fa fa-arrow-left"></i></a>

        <h3 class="page-title">Details of {$table_name}, record #{$id}</h3>
        {if isset($direction)}
            <div class="flash">
                <div class="alert alert-info">
                    <p>You have reached end of navigation</p>
                </div>
            </div>
        {/if}
        <table class="table" width="50%">
            <thead>
            <th width="20%">Field</th>
            <th>Value</th>
            </thead>
            <tr class="{cycle values='odd,even'}">
                <td>{$tbl_permission_fields.pm_id}:</td>
                <td>{$tbl_permission_data.pm_id}</td>
            </tr>
            <tr class="{cycle values='odd,even'}">
                <td>{$tbl_permission_fields.pm_pg_id}:</td>
                <td>{$tbl_permission_data.pm_pg_id}</td>
            </tr>
            <tr class="{cycle values='odd,even'}">
                <td>{$tbl_permission_fields.pm_enabled}:</td>
                <td>{$tbl_permission_data.pm_enabled}</td>
            </tr>
            <tr class="{cycle values='odd,even'}">
                <td>{$tbl_permission_fields.pm_edit}:</td>
                <td>{$tbl_permission_data.pm_edit}</td>
            </tr>
            <tr class="{cycle values='odd,even'}">
                <td>{$tbl_permission_fields.pm_insert}:</td>
                <td>{$tbl_permission_data.pm_insert}</td>
            </tr>
            <tr class="{cycle values='odd,even'}">
                <td>{$tbl_permission_fields.pm_view}:</td>
                <td>{$tbl_permission_data.pm_view}</td>
            </tr>
            <tr class="{cycle values='odd,even'}">
                <td>{$tbl_permission_fields.pm_delete}:</td>
                <td>{$tbl_permission_data.pm_delete}</td>
            </tr>
            <tr class="{cycle values='odd,even'}">
                <td>{$tbl_permission_fields.pm_show}:</td>
                <td>{$tbl_permission_data.pm_show}</td>
            </tr>
            <tr class="{cycle values='odd,even'}">
                <td>{$tbl_permission_fields.pm_role}:</td>
                <td>{$tbl_permission_data.pm_role}</td>
            </tr>
            <tr class="{cycle values='odd,even'}">
                <td>{$tbl_permission_fields.pm_description}:</td>
                <td>{$tbl_permission_data.pm_description}</td>
            </tr>
        </table>
    </div><!-- .inner -->
</div><!-- .content -->