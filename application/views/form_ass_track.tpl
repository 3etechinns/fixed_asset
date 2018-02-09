<div class="panel panel-default">
    <div class="panel-body">
        <a href="ass_track" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
        <a class="{if $action_mode == 'create'}active{/if} btn btn-sm btn-success" href="ass_track/create/"> <i
                    class="fa fa-plus" aria-hidden="true"></i> New record</a>
        {if $action_mode != 'create'}
            <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'right'}disabled{/if}{/if}"
               href="ass_track/navigate/right/{$record_id}"><i class="fa fa-arrow-right"></i></a>
            <a class="btn-default btn btn-sm pull-right {if isset($direction)}{if $direction == 'left'}disabled{/if}{/if}"
               href="ass_track/navigate/left/{$record_id}"><i class="fa fa-arrow-left"></i></a>
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
        <form class="form" method='post' action='ass_track/{$action_mode}/{if isset($record_id)}{$record_id}{/if}'
              enctype="multipart/form-data">

            <div class="col-sm-12">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="actionType">Select type<span
                                    class="error">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control field select " name="status" id="status"
                                    required="required">
                                <option value="">Select One</option>
                                <option value="transfer">Asset Transfer</option>
                                <option value="return">Asset Return</option>

                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div id="formContainer" class="col-sm-12">
                <div class="col-sm-6">

                    <div id="dateTransferred" class="form-group">
                        <label class="col-md-4 control-label"
                               for="date_trasferred">{$ass_track_fields.date_trasferred}
                            <span class="error">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input placeholder="Enter {$ass_track_fields.date_trasferred}"
                                       class="date-picker form-control"
                                       type="text"

                                       maxlength="50"
                                       value="{if isset($ass_track_data)}{$ass_track_data.date_trasferred}{/if}"
                                       name="date_trasferred"
                                       id="date_trasferred"/>
                                <label for="date"
                                       class="input-group-addon btn group-white">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                            </div>
                        </div>

                    </div>

                    <div id="dateReturned" class="form-group">
                        <label class="col-md-4 control-label"
                               for="date_returned">{$ass_track_fields.date_returned}
                            <span class="error">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input placeholder="Enter {$ass_track_fields.date_returned}"
                                       class="form-control date-picker"
                                       type="text"
                                       maxlength="50"
                                       value="{if isset($ass_track_data)}{$ass_track_data.date_returned}{/if}"
                                       name="date_returned" id="date_returned"/>
                                <label for="date_returned"
                                       class="input-group-addon btn group-white">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="Asset_ass_id">{$ass_track_fields.receiving_employee_id}
                            <span
                                    class="error">*</span></label>
                        <div class="col-md-6">
                            <input placeholder="Enter {$ass_track_fields.receiving_employee_id}" class="form-control"
                                   type="text"
                                   required="required"
                                   maxlength="50"
                                   value="{if isset($ass_track_data)}{$ass_track_data.receiving_employee_id}{/if}"
                                   name="receiving_employee_id"
                                   id="receiving_employee_id"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Asset_ass_id">{$ass_track_fields.ass_emp_id}<span
                                    class="error">*</span></label>
                        <div class="col-md-6">
                            <input placeholder="Enter {$ass_track_fields.ass_emp_id}"
                                   required="required"
                                   class="form-control" type="text"
                                   maxlength="50" value="{if isset($ass_track_data)}{$ass_track_data.ass_emp_id}{/if}"
                                   name="ass_emp_id"
                                   id="ass_emp_id"/>
                        </div>

                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">{$ass_track_fields.payment_status}</label>
                        <div class="col-md-6">
                            <label class="form-control">
                                <input type="checkbox" value="1" name="payment_status"
                                       id="payment_status" {if isset($ass_track_data)}{if $ass_track_data.payment_status == 1} checked="checked" {/if}{/if} /></label>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="payment_date">{$ass_track_fields.payment_date}
                            {*<span class="error">*</span>*}
                        </label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input placeholder="Enter {$ass_track_fields.payment_date}"
                                       class="form-control date-picker"
                                       type="text"
                                       maxlength="50"
                                       value="{if isset($ass_track_data)}{$ass_track_data.payment_date}{/if}"
                                       name="payment_date" id="payment_date"/>
                                <label for="payment_date"
                                       class="input-group-addon btn group-white">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                            </div>
                        </div>

                    </div>
                    <input type="text" name="reciverHiddenId" id="reciverHiddenId" style="display: none;">
                    <input type="text" name="employeHiddenId" id="employeHiddenId" style="display: none;">

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Asset_ass_id">{$ass_track_fields.Asset_ass_id}<span
                                    class="error">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control field select addr" name="Asset_ass_id" id="Asset_ass_id"
                                    required="required">
                                <option value="">Select One</option>
                                {foreach $related_asset as $rel}
                                    <option value="{$rel.asset_id}"{if isset($ass_track_data)}{if $ass_track_data.Asset_ass_id == $rel.asset_id} selected="selected"{/if}{/if}>{$rel.asset_name}</option>
                                {/foreach}
                            </select>
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
    </div>
</div><!-- .content -->
</div><!-- .block -->



<script type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>




</body>
<script>
    $(function () {
        $('#formContainer').hide();

        $('#status').change(function () {
            var type = $('#status').val();
            if (type == 'transfer') {
                $('#formContainer').show();
                $('#dateReturned').hide();
                $('#dateReturned').val() == '';
                $('#dateTransferred').show();
                $('#save').prop('disabled', false);

            }
            else if (type == 'return') {
                $('#formContainer').show();
                $('#dateReturned').show();
                $('#dateTransferred').hide();
                $('#dateTransferred').val() == "";
                $('#save').prop('disabled', false);
            }
            else {
                $('#formContainer').hide();
                $('#save').prop('disabled', true);


            }

        });


    });

    $(function () {
        $(".date-picker").datepicker({
            format: "yyyy-mm-dd",

        });
    });


    var fullName = [];
    $.ajax({
        type: 'GET',
        url: "http://localhost/fixed_asset/ass_track/searchEmployeeForAutocomplete",
//        data: data,
        dataType: 'json',
        success: function (result) {
//            for (i = 0; i < result.length; i++) {
//                //req[i] = result[i].firstName + "  " + result[i].lastName;
//            }
            console.log(result);
            $("#ass_emp_id").autocomplete({
                //   source: url,
                source: result,
                select: function (event, ui) {
                    //  $("#txtAllowSearch").val(ui.item.value); // display the selected text
                    $("#employeHiddenId").val(ui.item.id); // save selected id to hidden input
                }
            });
            $("#receiving_employee_id").autocomplete({
                source: result,
                select: function (event, ui) {
                    // $("#txtAllowSearch").val(ui.item.value); // display the selected text
                    $("#reciverHiddenId").val(ui.item.id); // save selected id to hidden input
                }
            });
            console.log(fullName);
//            return;
        },
        error: function (jqXHR, textStatus, errorThrown) {

            error({
                jqXHR: jqXHR,
                textStatus: textStatus,
                errorThrown: errorThrown
            });
        }
    });


    {*var e = [][{"label":"PHP","value":"1"},{"label":"Java","value":"2"}]*}

    {*$(".receiving_employee_id").autocomplete({*}
    {*source: e,select: function( event, ui ) {*}
    {*event.preventDefault();*}
    {*$('.jquery-autocomplete').val(ui.item.label);*}
    {*console.log(ui.item.label);*}
    {*console.log(ui.item.value);*}
    {*}*}
    //    });
</script>


