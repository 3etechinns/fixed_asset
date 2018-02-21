<div class="panel panel-default">
    <div class="panel-body">
        <a href="asset_category" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i>
            Listing</a>
        <a class="{if $action_mode == 'create'}active{/if} btn btn-sm btn-primary" href="asset_category/create/"> <i
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


            <div class="col-sm-6">

                {*<div class="form-group">*}
                {*<label class="col-md-4 control-label">{$ass_track_fields.payment_status}</label>*}
                {*<div class="col-md-6">*}
                {*<label class="form-control">*}
                {*<input type="checkbox" value="1" name="payment_status"*}
                {*id="payment_status" {if isset($ass_track_data)}{if $ass_track_data.payment_status == 1} checked="checked" {/if}{/if} /></label>*}

                {*</div>*}
                {*</div>*}
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cat_status">{$asset_category_fields.cat_status}</label>
                    <div class="col-md-6">
                        {*<input placeholder="Enter {$asset_category_fields.cat_status}" class="form-control" type="text"*}
                        {*maxlength="50"*}
                        {*value="{if isset($asset_category_data)}{$asset_category_data.cat_status}{/if}"*}
                        {*name="cat_status" id="cat_status"/>*}

                        <input type="checkbox" value="1" name="cat_status"
                               id="cat_status" {if isset($ass_track_data)}{if $ass_track_data.cat_status == 1} checked="checked" {/if}{/if} /></label>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cat_code">{$asset_category_fields.cat_code}<span
                                class="error">*</span></label>
                    <div class="col-md-6">
                        <input placeholder="Enter {$asset_category_fields.cat_code}" class="form-control" type="text"
                               maxlength="50"
                               value="{if isset($asset_category_data)}{$asset_category_data.cat_code}{/if}"
                               name="cat_code" id="cat_code"/>
                    </div>

                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="cat_name">{$asset_category_fields.cat_name}<span
                                class="error">*</span></label>
                    <div class="col-md-6">
                        <input placeholder="Enter {$asset_category_fields.cat_name}" class="form-control" type="text"
                               maxlength="50"
                               value="{if isset($asset_category_data)}{$asset_category_data.cat_name}{/if}"
                               name="cat_name" id="cat_name"/>
                    </div>

                </div>
                {*<div class="form-group">*}
                {*<label class="col-md-4 control-label" for="cat_name">{$asset_category_fields.sub_category}<span*}
                {*class="error">*</span></label>*}
                {*<div class="col-md-6">*}
                {*<input placeholder="Enter {$asset_category_fields.sub_category}" class="form-control" type="text"*}
                {*maxlength="50"*}
                {*value="{if isset($asset_category_data)}{$asset_category_data.sub_category}{/if}"*}
                {*name="sub_category"*}
                {*id="sub_category"/>*}
                {*</div>*}

                {*</div>*}

            </div>
            <div class="col-sm-6">

                <div class="form-group">
                    <label class="col-md-4 control-label" for="cat_description">{$asset_category_fields.cat_description}
                        {*<span class="error">*</span>*}
                    </label>
                    <div class="col-md-6">
                    <textarea placeholder="Enter {$asset_category_fields.cat_description}"
                              class="form-control" rows="5"
                              cols="50"
                              class="text_area"
                              name="cat_description"
                              id="cat_description">{if isset($asset_category_data)}{$asset_category_data.cat_description}{/if}</textarea>
                    </div>

                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label"
                           for="depriciation_life">{$asset_category_fields.depriciation_life}
                        <span class="error">*</span></label>
                    <div class="col-md-6">
                        <input placeholder="Enter {$asset_category_fields.depriciation_life}"
                               class="form-control"
                               id="depLife"
                               type="number"
                               maxlength="50"
                               value="{if isset($asset_category_data)}{$asset_category_data.depriciation_life}{/if}"
                               name="depriciation_life" id="depriciation_life"/>
                    </div>
                    <br>
                    <div class="col-lg-push-3 col-md-12">
                        <span id="lifeTimError" class="error">Life time must be greater or equal than one</span>

                    </div>

                </div>

            </div>

            <br>
            <div class="form-group button-actions box-footer">
                <div class="col-md-offset-4 col-md-4">
                    <button id="save" class="btn btn-primary" type="submit">Save</button>
                    <span class="text_button_padding">or</span>
                    <a class="btn btn-default" href="javascript:window.history.back();">Cancel</a>
                </div>
        </form>
    </div><!-- .content -->
</div><!-- .block -->

<script>
    $("#lifeTimError").hide();
    $("#depLife").on("change keyup paste click", function () {
        var liftime = $("#depLife").val();
//        var status = $("#cat_status").val();
//        if (status)
        if (liftime < 1) {
            $("#lifeTimError").show();
        }
        else {
            $("#lifeTimError").hide();
        }
    });
</script>