<?php /* Smarty version Smarty-3.1.7, created on 2018-02-21 21:23:48
         compiled from "C:\wamp64\www\fixed_asset\application\views\form_asset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188805a8c240bc0b795-33205204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1ea2160d266c963a5c83b728245da0c6900aa30' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\form_asset.tpl',
      1 => 1519248192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188805a8c240bc0b795-33205204',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a8c240be940a',
  'variables' => 
  array (
    'action_mode' => 0,
    'direction' => 0,
    'record_id' => 0,
    'errors' => 0,
    'asset_fields' => 0,
    'asset_data' => 0,
    'asset_category' => 0,
    'cat' => 0,
    'asset_sub_category' => 0,
    'related_status' => 0,
    'rel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8c240be940a')) {function content_5a8c240be940a($_smarty_tpl) {?><div class="panel panel-default">
    <div class="panel-body">


        <a href="asset" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
        <a class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?> btn btn-sm btn-primary" href="asset/create/"> <i
                    class="fa fa-plus" aria-hidden="true"></i> New record</a>
        <?php if ($_smarty_tpl->tpl_vars['action_mode']->value!='create'){?>
            <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='right'){?>disabled<?php }?><?php }?>"
               href="asset/navigate/right/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
"><i class="fa fa-arrow-right"></i></a>
            <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)){?><?php if ($_smarty_tpl->tpl_vars['direction']->value=='left'){?>disabled<?php }?><?php }?>"
               href="asset/navigate/left/<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
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
        <form class="form" method='post' action='asset/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>'
              enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="ass_purchase_price"><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_name'];?>

                            <span class="error">*</span></label>
                        </label>

                        <div class="col-md-6">
                            <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_name'];?>
"
                                   class="form-control"
                                   type="text"
                                   required="required"
                                   maxlength="50"
                                   value="<?php if (isset($_smarty_tpl->tpl_vars['asset_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_name'];?>
<?php }?>"
                                   name="ass_name"
                                   id="ass_purchase_price"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="ass_model"><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_model'];?>

                            <span class="error">*</span></label>
                        </label>
                        <div class="col-md-6">
                            <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_model'];?>
"
                                   class="form-control"
                                   type="text"
                                   maxlength="50"
                                   required="required"
                                   value="<?php if (isset($_smarty_tpl->tpl_vars['asset_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_model'];?>
<?php }?>"
                                   name="ass_model"
                                   id="ass_model"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="ass_serial_number"><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_serial_number'];?>

                            <span class="error">*</span>
                        </label>
                        </label>
                        <div class="col-md-6">
                            <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_serial_number'];?>
"
                                   class="form-control"
                                   type="number"
                                   required="required"
                                   maxlength="50"
                                   value="<?php if (isset($_smarty_tpl->tpl_vars['asset_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_serial_number'];?>
<?php }?>"
                                   name="ass_serial_number"
                                   id="ass_serial_number"/>
                        </div>

                    </div>

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    

                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="ass_date_acquired"><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_date_acquired'];?>

                            <span class="error">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_date_acquired'];?>
"
                                       class="form-control date-picker"
                                       type="text"
                                       required
                                       readonly
                                       maxlength="50"
                                       value="<?php if (isset($_smarty_tpl->tpl_vars['asset_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_date_acquired'];?>
<?php }?>"
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
                               for="ass_purchase_price"><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_purchase_price'];?>


                        </label>
                        <div class="col-md-6">
                            <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_purchase_price'];?>
"
                                   class="form-control"
                                   type="number"
                                   maxlength="50"
                                   value="<?php if (isset($_smarty_tpl->tpl_vars['asset_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_purchase_price'];?>
<?php }?>"
                                   name="ass_purchase_price"
                                   id="ass_purchase_price"/>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    
                    

                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="model_number"><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['model_number'];?>

                            <span class="error">*</span>

                        </label>
                        <div class="col-md-6">

                            <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['model_number'];?>
"
                                   class="form-control"
                                   required="required"
                                   type="text"
                                   maxlength="50"
                                   value="<?php if (isset($_smarty_tpl->tpl_vars['asset_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['model_number'];?>
<?php }?>"
                                   name="model_number"
                                   id="model_number"/>
                        </div>
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ass_cat_id"><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_cat_id'];?>

                            <span class="error">*</span>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control field select" name="ass_cat_id" id="ass_cat_id"
                                    required="required">
                                <option value="">Select One</option>
                                <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asset_category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_id'];?>
"
                                            <?php if (isset($_smarty_tpl->tpl_vars['asset_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['asset_data']->value['ass_cat_id']==$_smarty_tpl->tpl_vars['cat']->value['cat_id']){?>
                                        selected="selected"<?php }?><?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['cat']->value['category'];?>

                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ass_cat_id"><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['sub_category'];?>

                            <span class="error">*</span>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control field select" name="sub_category" id="sub_category"
                                    required="required">
                                <option value="">Select One</option>
                                <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asset_sub_category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_id'];?>
"
                                            <?php if (isset($_smarty_tpl->tpl_vars['asset_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['asset_data']->value['ass_cat_id']==$_smarty_tpl->tpl_vars['cat']->value['cat_id']){?>
                                        selected="selected"<?php }?><?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['cat']->value['category'];?>

                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ass_comment"><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_comment'];?>
</label>
                        <div class="col-md-6">
                            <textarea placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_comment'];?>
" class="form-control" rows="5"
                                      cols="50" class="text_area" name="ass_comment"
                                      id="ass_comment"><?php if (isset($_smarty_tpl->tpl_vars['asset_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_comment'];?>
<?php }?></textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="ass_description"><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_description'];?>
</label>
                        <div class="col-md-6">
                            <textarea placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_description'];?>
" class="form-control" rows="5"
                                      cols="50" class="text_area" name="ass_description"
                                      id="ass_description"><?php if (isset($_smarty_tpl->tpl_vars['asset_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['asset_data']->value['ass_description'];?>
<?php }?></textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="status_status_id"><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['status_status_id'];?>

                            <span class="error">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control field select addr" name="status_status_id" id="status_status_id"
                                    required="required">
                                <option value="">Select One</option>
                                <?php  $_smarty_tpl->tpl_vars['rel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rel']->key => $_smarty_tpl->tpl_vars['rel']->value){
$_smarty_tpl->tpl_vars['rel']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['rel']->value['status_id'];?>
"
                                            <?php if (isset($_smarty_tpl->tpl_vars['asset_data']->value)){?><?php if ($_smarty_tpl->tpl_vars['asset_data']->value['status_status_id']==$_smarty_tpl->tpl_vars['rel']->value['status_id']){?>
                                        selected="selected"<?php }?><?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['rel']->value['status_name'];?>

                                    </option>
                                <?php } ?>
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

</style><?php }} ?>