<div class="panel panel-default">
    <div class="panel-body">


        <a href="asset" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
        <a class="{if $action_mode == 'create'}active{/if} btn btn-sm btn-primary" href="asset/create/"> <i
                    class="fa fa-plus" aria-hidden="true"></i> New record</a>
        {if $action_mode != 'create'}
            <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}"
               href="asset/navigate/right/{$record_id}"><i class="fa fa-arrow-right"></i></a>
            <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}"
               href="asset/navigate/left/{$record_id}"><i class="fa fa-arrow-left"></i></a>
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
        <form class="form" method='post' action='asset/{$action_mode}/{if isset($record_id)}{$record_id}{/if}'
              enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="ass_purchase_price">{$asset_fields.ass_name}
                            <span class="error">*</span></label>
                        </label>

                        <div class="col-md-6">
                            <input placeholder="Enter {$asset_fields.ass_name}"
                                   class="form-control"
                                   type="text"
                                   required="required"
                                   maxlength="50"
                                   value="{if isset($asset_data)}{$asset_data.ass_name}{/if}"
                                   name="ass_name"
                                   id="ass_purchase_price"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="ass_model">{$asset_fields.ass_model}
                            <span class="error">*</span></label>
                        </label>
                        <div class="col-md-6">
                            <input placeholder="Enter {$asset_fields.ass_model}"
                                   class="form-control"
                                   type="text"
                                   maxlength="50"
                                   required="required"
                                   value="{if isset($asset_data)}{$asset_data.ass_model}{/if}"
                                   name="ass_model"
                                   id="ass_model"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="ass_serial_number">{$asset_fields.ass_serial_number}
                            <span class="error">*</span>
                        </label>
                        </label>
                        <div class="col-md-6">
                            <input placeholder="Enter {$asset_fields.ass_serial_number}"
                                   class="form-control"
                                   type="number"
                                   required="required"
                                   maxlength="50"
                                   value="{if isset($asset_data)}{$asset_data.ass_serial_number}{/if}"
                                   name="ass_serial_number"
                                   id="ass_serial_number"/>
                        </div>

                    </div>

                    {*<div class="form-group">*}
                    {*<label class="col-md-4 control-label"*}
                    {*for="ass_barcode_number">{$asset_fields.ass_barcode_number}*}
                    {*</label>*}
                    {*<div class="col-md-6">*}
                    {*<input placeholder="Enter {$asset_fields.ass_barcode_number}" class="form-control"*}
                    {*type="number" maxlength="50"*}
                    {*value="{if isset($asset_data)}{$asset_data.ass_barcode_number}{/if}"*}
                    {*name="ass_barcode_number" id="ass_barcode_number"/>*}
                    {*</div>*}

                    {*</div>*}

                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="ass_date_acquired">{$asset_fields.ass_date_acquired}
                            <span class="error">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input placeholder="Enter {$asset_fields.ass_date_acquired}"
                                       class="form-control date-picker"
                                       type="text"
                                       required
                                       readonly
                                       maxlength="50"
                                       value="{if isset($asset_data)}{$asset_data.ass_date_acquired}{/if}"
                                       name="ass_date_acquired"
                                       id="ass_date_acquired"/>
                                <label for="ass_date_acquired"
                                       class="input-group-addon date-picker btn group-white">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="ass_purchase_price">{$asset_fields.ass_purchase_price}

                        </label>
                        <div class="col-md-6">
                            <input placeholder="Enter {$asset_fields.ass_purchase_price}"
                                   class="form-control"
                                   type="number"
                                   maxlength="50"
                                   value="{if isset($asset_data)}{$asset_data.ass_purchase_price}{/if}"
                                   name="ass_purchase_price"
                                   id="ass_purchase_price"/>
                        </div>
                    </div>
                    {*<div class="form-group">*}
                    {*<label class="col-md-4 control-label">{$asset_fields.ass_dep_method}</label>*}
                    {*<div class="col-md-6">*}
                    {*<select name="ass_dep_method" name="ass_dep_method" required="required" class="form-control">*}
                    {*<option value="0">Select One</option>*}
                    {*{foreach $metadata.ass_dep_method.enum_values as $k => $e}*}
                    {*<option value="{$e}"{if isset($asset_data.ass_dep_method)}{if $asset_data.ass_dep_method == $metadata.ass_dep_method.enum_values[$k]} selected="selected"{/if}{/if}>{$metadata.ass_dep_method.enum_values[$k]}</option>*}
                    {*{/foreach}*}
                    {*</select>*}

                    {*</div>*}
                    {*</div>*}

                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="model_number">{$asset_fields.model_number}
                            <span class="error">*</span>

                        </label>
                        <div class="col-md-6">

                            <input placeholder="Enter {$asset_fields.model_number}"
                                   class="form-control"
                                   required="required"
                                   type="text"
                                   maxlength="50"
                                   value="{if isset($asset_data)}{$asset_data.model_number}{/if}"
                                   name="model_number"
                                   id="model_number"/>
                        </div>
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ass_cat_id">{$asset_fields.ass_cat_id}
                            <span class="error">*</span>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control field select" name="ass_cat_id" id="ass_cat_id"
                                    required="required">
                                <option value="">Select One</option>
                                {foreach $asset_category as $cat}
                                    <option value="{$cat.cat_id}"
                                            {if isset($asset_data)}{if $asset_data.ass_cat_id == $cat.cat_id}
                                        selected="selected"{/if}{/if}>
                                        {$cat.category}
                                    </option>
                                {/foreach}
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ass_cat_id">{$asset_fields.sub_category}
                            <span class="error">*</span>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control field select" name="sub_category" id="sub_category"
                                    required="required">
                                <option value="">Select One</option>
                                {foreach $asset_sub_category as $cat}
                                    <option value="{$cat.cat_id}"
                                            {if isset($asset_data)}{if $asset_data.ass_cat_id == $cat.cat_id}
                                        selected="selected"{/if}{/if}>
                                        {$cat.category}
                                    </option>
                                {/foreach}
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ass_comment">{$asset_fields.ass_comment}</label>
                        <div class="col-md-6">
                            <textarea placeholder="Enter {$asset_fields.ass_comment}" class="form-control" rows="5"
                                      cols="50" class="text_area" name="ass_comment"
                                      id="ass_comment">{if isset($asset_data)}{$asset_data.ass_comment}{/if}</textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="ass_description">{$asset_fields.ass_description}</label>
                        <div class="col-md-6">
                            <textarea placeholder="Enter {$asset_fields.ass_description}" class="form-control" rows="5"
                                      cols="50" class="text_area" name="ass_description"
                                      id="ass_description">{if isset($asset_data)}{$asset_data.ass_description}{/if}</textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="status_status_id">{$asset_fields.status_status_id}
                            <span class="error">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control field select addr" name="status_status_id" id="status_status_id"
                                    required="required">
                                <option value="">Select One</option>
                                {foreach $related_status as $rel}
                                    <option value="{$rel.status_id}"
                                            {if isset($asset_data)}{if $asset_data.status_status_id == $rel.status_id}
                                        selected="selected"{/if}{/if}>
                                        {$rel.status_name}
                                    </option>
                                {/foreach}
                            </select>
                        </div>

                    </div>


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


<!-- Include Date Range Picker -->

<script>
    $(document).ready(function () {
        $(function () {
            $(".date-picker").datepicker({
                dateFormat: "yy-mm-dd"

            });
        });


    })


</script>
<style>

    .control-label {
        text-align: left !important;
        font-size: 16px !important;
        font-family: "Source Sans Pro";
        color: rgb(45, 45, 45);
        -moz-transform: matrix(1, 0, 0, 1.0005138426147, 0, 0);
        -webkit-transform: matrix(1, 0, 0, 1.0005138426147, 0, 0);
        -ms-transform: matrix(1, 0, 0, 1.0005138426147, 0, 0);

    }

</style>