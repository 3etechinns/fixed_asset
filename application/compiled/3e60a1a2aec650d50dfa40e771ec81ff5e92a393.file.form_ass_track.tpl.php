<?php /* Smarty version Smarty-3.1.7, created on 2018-02-21 21:11:58
         compiled from "C:\wamp64\www\fixed_asset\application\views\form_ass_track.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58815a8c654831b7e3-19366463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e60a1a2aec650d50dfa40e771ec81ff5e92a393' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\form_ass_track.tpl',
      1 => 1519247515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58815a8c654831b7e3-19366463',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a8c654853886',
  'variables' => 
  array (
    'action_mode' => 0,
    'direction' => 0,
    'record_id' => 0,
    'errors' => 0,
    'ass_track_data' => 0,
    'ass_track_fields' => 0,
    'related_asset' => 0,
    'rel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8c654853886')) {function content_5a8c654853886($_smarty_tpl) {?><div class="panel panel-default">
    <div class="panel-body">
        <a href="ass_track" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
        <a class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?> btn btn-sm btn-success" href="ass_track/create/"> <i
                    class="fa fa-plus" aria-hidden="true"></i> New record</a>
        <?php if ($_smarty_tpl->tpl_vars['action_mode']->value!='create'){?>
            <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>"
               href="ass_track/navigate/right/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
"><i class="fa fa-arrow-right"></i></a>
            <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>"
               href="ass_track/navigate/left/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
"><i class="fa fa-arrow-left"></i></a>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>
            <h3 class="page-title">Add new record</h3>
        <?php }else{ ?>
            <h3 class="page-title">Edit record: #<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
</h3>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)){?>
            <div class="flash">
                <div class="alert alert-danger">
                    <p><?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
</p>
                </div>
            </div>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?>
            <div class="flash">
                <div class="alert alert-info">
                    <p>You have reached end of navigation</p>
                </div>
            </div>
        <?php }?>
        <form class="form" method='post' action='ass_track/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>'
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
                                <?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?>
                                    <?php if ($_smarty_tpl->tpl_vars['ass_track_data']->value['status']=='transfer'){?>
                                        <option value="transfer">Asset Transfer</option>
                                        <option value="return">Asset Return</option>
                                    <?php }else{ ?>
                                        <option value="return">Asset Return</option>
                                        <option value="transfer">Asset Transfer</option>
                                    <?php }?>
                                <?php }else{ ?>
                                    <option value="">Select One</option>
                                    <option value="return">Asset Return</option>
                                    <option value="transfer">Asset Transfer</option>
                                <?php }?>


                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div id="formContainer" class="col-sm-12">


                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="track_model_number"><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['track_model_number'];?>

                            <span
                                    class="error">*</span></label>
                        <div class="col-md-6">
                            <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['track_model_number'];?>
" class="form-control"
                                   type="text"
                                   required="required"
                                   maxlength="50"
                                   value="<?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['track_model_number'];?>
<?php }?>"
                                   name="track_model_number"
                                   id="track_model_number"/>
                        </div>

                    </div>

                    <div id="dateTransferred" class="form-group">
                        <label class="col-md-4 control-label"
                               for="date_trasferred"><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_trasferred'];?>

                            <span class="error">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_trasferred'];?>
"
                                       class="date-picker form-control"
                                       type="text"
                                       readonly
                                       maxlength="50"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['date_trasferred'];?>
<?php }?>"
                                       name="date_trasferred"
                                       id="date_trasferred"/>
                                <label for="date"
                                       class="date-picker  input-group-addon btn group-white">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                            </div>
                        </div>

                    </div>

                    <div id="dateReturned" class="form-group">
                        <label class="col-md-4 control-label"
                               for="date_returned"><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_returned'];?>

                            <span class="error">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['date_returned'];?>
"
                                       class="form-control date-picker"
                                       type="text"
                                       readonly
                                       maxlength="50"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['date_returned'];?>
<?php }?>"
                                       name="date_returned" id="date_returned"/>
                                <label for="date_returned"
                                       class="input-group-addon date-picker btn group-white">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Asset_ass_id"><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['ass_emp_id'];?>
<span
                                    class="error">*</span></label>
                        <div class="col-md-6">
                            <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['ass_emp_id'];?>
"
                                   required="required"
                                   class="form-control" type="text"
                                   maxlength="50"
                                   value="<?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['employee_full_name'];?>
<?php }?>"
                                   name="ass_emp_id"
                                   id="ass_emp_id"/>
                        </div>

                    </div>

                </div>

                <div class="col-sm-6">
                    
                    
                    
                    
                    
                    

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    

                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="Asset_ass_id"><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['receiving_employee_id'];?>

                            <span
                                    class="error">*</span></label>
                        <div class="col-md-6">
                            <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['receiving_employee_id'];?>
" class="form-control"
                                   type="text"
                                   required="required"
                                   maxlength="50"
                                   value="<?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['ass_track_data']->value['reciver_full_name'];?>
<?php }?>"
                                   name="receiving_employee_id"
                                   id="receiving_employee_id"/>
                        </div>

                    </div>
                    <input type="text" name="reciverHiddenId" id="reciverHiddenId" style="display: none;">
                    <input type="text" name="employeHiddenId" id="employeHiddenId" style="display: none;">

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Asset_ass_id"><?php echo $_smarty_tpl->tpl_vars['ass_track_fields']->value['Asset_ass_id'];?>
<span
                                    class="error">*</span></label>
                        <div class="col-md-6">
                            <select data-live-search="true" class="selectpicker form-control field select addr"
                                    name="Asset_ass_id" id="Asset_ass_id"
                                    required="required">
                                <option value="">Select One</option>
                                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_asset']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['asset_id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['ass_track_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['ass_track_data']->value['Asset_ass_id']==$_smarty_tpl->tpl_vars['rel']->value['asset_id']){?> selected="selected"<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['rel']->value['asset_name'];?>
</option>
                                <?php } ?>
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








</body>
<script>


    $(function () {
//        $('#formContainer').hide();

        $('#status').change(function () {
            var type = $('#status').val();
            if (type == 'transfer') {
                $('#formContainer').show();
                $('#dateReturned').val() == '';
                $('#dateReturned').hide();

                $('#dateTransferred').show();
                $('#save').prop('disabled', false);

            }
            else if (type == 'return') {
                $('#formContainer').show();
                $('#dateReturned').show();
                $('#dateTransferred').val() == "";
                $('#dateTransferred').hide();

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
            dateFormat: "yy-mm-dd"

        });
    });


    var fullName = [];
    $.ajax({
        type: 'GET',
        url: "http://localhost:8080/fixed_asset/ass_track/searchEmployeeForAutocomplete",
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


    

    
    
    
    
    
    
    
    //    });
</script>


<?php }} ?>