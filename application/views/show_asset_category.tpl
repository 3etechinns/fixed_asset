<div class="panel panel-default">
    <div class="panel-body">
        <a href="asset_category/edit/{$id}">
            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
        </a>
        <a href="asset_category">
            <button class="btn btn-warning btn-xs"><i class="fa fa-list" aria-hidden="true"></i> Listing</button>
        </a>
        <a href="asset_category/create/">
            <button class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
        </a>

        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}"
           href="asset_category/navigate/right/{$id}/show"><i class="fa fa-arrow-right"></i></a>
        <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}"
           href="asset_category/navigate/left/{$id}/show"><i class="fa fa-arrow-left"></i></a>

        <h3 class="page-title">Details of {$table_name}, record #{$id}</h3>
        {if isset($direction)}
            <div class="flash">
                <div class="alert alert-info">
                    <p>You have reached end of navigation</p>
                </div>
            </div>
        {/if}
        <div class="col-sm-4 col-md-offset-1">
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                <th width="50%">Field</th>
                <th>Value</th>
                </thead>
                <tr class="{cycle values='odd,even'}">
                    <td>{$asset_category_fields.cat_id}:</td>
                    <td>{$asset_category_data.cat_id}</td>
                </tr>
                <tr class="{cycle values='odd,even'}">
                    <td>{$asset_category_fields.cat_code}:</td>
                    <td>{$asset_category_data.cat_code}</td>
                </tr>
                <tr class="{cycle values='odd,even'}">
                    <td>{$asset_category_fields.cat_name}:</td>
                    <td>{$asset_category_data.cat_name}</td>
                </tr>
                {*<tr class="{cycle values='odd,even'}">*}
                    {*<td>{$asset_category_fields.cat_description}:</td>*}
                    {*<td>{$asset_category_data.cat_description}</td>*}
                {*</tr>*}
                {*<tr class="{cycle values='odd,even'}">*}
                    {*<td>{$asset_category_fields.cat_status}:</td>*}
                    {*<td>{$asset_category_data.cat_status}</td>*}
                {*</tr>*}
                {*<tr class="{cycle values='odd,even'}">*}
                    {*<td>{$asset_category_fields.depriciation_life}:</td>*}
                    {*<td>{$asset_category_data.depriciation_life}</td>*}
                {*</tr>*}
            </table>
        </div>
        <div class="col-md-offset-1 col-sm-4">
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                <th width="50%">Field</th>
                <th>Value</th>
                </thead>
                {*<tr class="{cycle values='odd,even'}">*}
                    {*<td>{$asset_category_fields.cat_id}:</td>*}
                    {*<td>{$asset_category_data.cat_id}</td>*}
                {*</tr>*}
                {*<tr class="{cycle values='odd,even'}">*}
                    {*<td>{$asset_category_fields.cat_code}:</td>*}
                    {*<td>{$asset_category_data.cat_code}</td>*}
                {*</tr>*}
                {*<tr class="{cycle values='odd,even'}">*}
                    {*<td>{$asset_category_fields.cat_name}:</td>*}
                    {*<td>{$asset_category_data.cat_name}</td>*}
                {*</tr>*}
                <tr class="{cycle values='odd,even'}">
                    <td>{$asset_category_fields.cat_description}:</td>
                    <td>{$asset_category_data.cat_description}</td>
                </tr>
                <tr class="{cycle values='odd,even'}">
                    <td>{$asset_category_fields.cat_status}:</td>
                    <td>{$asset_category_data.cat_status}</td>
                </tr>
                <tr class="{cycle values='odd,even'}">
                    <td>{$asset_category_fields.depriciation_life}:</td>
                    <td>{$asset_category_data.depriciation_life}</td>
                </tr>
            </table>
        </div>
    </div><!-- .inner -->
</div><!-- .content -->