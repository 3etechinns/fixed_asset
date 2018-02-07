<div class="panel panel-default">
    <div class="panel-body">
        <a href="tbl_roles/edit/{$id}">
            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
        </a>
        <a href="tbl_roles">
            <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button>
        </a>
        <a href="tbl_roles/create/">
            <button class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
        </a>

        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}"
           href="tbl_roles/navigate/right/{$id}/show"><i class="fa fa-arrow-right"></i></a>
        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}"
           href="tbl_roles/navigate/left/{$id}/show"><i class="fa fa-arrow-left"></i></a>

        <h3 class="page-title">Details of {$table_name}, record #{$id}</h3>
        {if isset($direction)}
            <div class="flash">
                <div class="alert alert-info">
                    <p>You have reached end of navigation</p>
                </div>
            </div>
        {/if}
       <div class="col-sm-6">
           <table class="table table-bordered table-responsive" width="50%">
               <thead>
               <th width="20%">Field</th>
               <th>Value</th>
               </thead>
               <tr class="{cycle values='odd,even'}">
                   <td>{$tbl_roles_fields.roleId}:</td>
                   <td>{$tbl_roles_data.roleId}</td>
               </tr>
               <tr class="{cycle values='odd,even'}">
                   <td>{$tbl_roles_fields.role}:</td>
                   <td>{$tbl_roles_data.role}</td>
               </tr>
           </table>
       </div>
    </div><!-- .inner -->
</div><!-- .content -->