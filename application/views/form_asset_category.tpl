<div class="panel panel-default">
    <div class="panel-body">
        <a href="asset_category" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i>
            Listing</a>
        <a class="{if $action_mode == 'create'}active{/if} btn btn-sm btn-success" href="asset_category/create/"> <i
                    class="fa fa-plus" aria-hidden="true"></i> New record</a>
        {if $action_mode != 'create'}
            <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}"
               href="asset_category/navigate/right/{$record_id}"><i class="fa fa-arrow-right"></i></a>
            <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}"
               href="asset_category/navigate/left/{$record_id}"><i class="fa fa-arrow-left"></i></a>
        {/if}
        {if $action_mode == 'create'}
            <h3 class="page-title">Add new record</h3>
        {else}
            <h3 class="page-title">Edit record: #{$record_id}</h3>
        {/if}
        {if isset($errors)}
            <div class="flash">
                <div class="alert alert-danger">
                    <p>{$errors}</p>
                </div>
            </div>
        {/if}
        {if isset($direction)}
            <div class="flash">
                <div class="alert alert-info">
                    <p>You have reached end of navigation</p>
                </div>
            </div>
        {/if}
        <form class="form" method='post' action='asset_category/{$action_mode}/{if isset($record_id)}{$record_id}{/if}'
              enctype="multipart/form-data">


            <div class="form-group">
                <label class="col-md-4 control-label" for="cat_code">{$asset_category_fields.cat_code}<span
                            class="error">*</span></label>
                <div class="col-md-6">
                    <input placeholder="Enter {$asset_category_fields.cat_code}" class="form-control" type="text"
                           maxlength="50" value="{if isset($asset_category_data)}{$asset_category_data.cat_code}{/if}"
                           name="cat_code" id="cat_code"/>
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="cat_name">{$asset_category_fields.cat_name}<span
                            class="error">*</span></label>
                <div class="col-md-6">
                    <input placeholder="Enter {$asset_category_fields.cat_name}" class="form-control" type="text"
                           maxlength="50" value="{if isset($asset_category_data)}{$asset_category_data.cat_name}{/if}"
                           name="cat_name" id="cat_name"/>
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="cat_description">{$asset_category_fields.cat_description}
                    <span class="error">*</span></label>
                <div class="col-md-6">
                    <textarea placeholder="Enter {$asset_category_fields.cat_description}" class="form-control" rows="5"
                              cols="50" class="text_area" name="cat_description"
                              id="cat_description">{if isset($asset_category_data)}{$asset_category_data.cat_description}{/if}</textarea>
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="cat_status">{$asset_category_fields.cat_status}</label>
                <div class="col-md-6">
                    <input placeholder="Enter {$asset_category_fields.cat_status}" class="form-control" type="text"
                           maxlength="50" value="{if isset($asset_category_data)}{$asset_category_data.cat_status}{/if}"
                           name="cat_status" id="cat_status"/>
                </div>

            </div>

            {*<div class="form-group">*}
                {*<label class="col-md-4 control-label" for="Asset_ass_id">{$asset_category_fields.Asset_ass_id}</label>*}
                {*<div class="col-md-6">*}
                    {*<input placeholder="Enter {$asset_category_fields.Asset_ass_id}" class="form-control" type="text"*}
                           {*maxlength="50"*}
                           {*value="{if isset($asset_category_data)}{$asset_category_data.Asset_ass_id}{/if}"*}
                           {*name="Asset_ass_id" id="Asset_ass_id"/>*}
                {*</div>*}

            {*</div>*}
            <div class="form-group">
                <label class="col-md-4 control-label"
                       for="depriciation_life">{$asset_category_fields.depriciation_life}</label>
                <div class="col-md-6">
                    <input placeholder="Enter {$asset_category_fields.depriciation_life}" class="form-control"
                           type="text" maxlength="50"
                           value="{if isset($asset_category_data)}{$asset_category_data.depriciation_life}{/if}"
                           name="depriciation_life" id="depriciation_life"/>
                </div>

            </div>


            <br>
            <div class="form-group button-actions box-footer">
                <div class="col-md-offset-4 col-md-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <span class="text_button_padding">or</span>
                    <a class="btn btn-default" href="javascript:window.history.back();">Cancel</a>
                </div>
        </form>
    </div><!-- .content -->
</div><!-- .block -->
