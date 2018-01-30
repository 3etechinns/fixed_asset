<?php /* Smarty version Smarty-3.1.7, created on 2018-01-23 06:16:05
         compiled from "C:\wamp\www\research\iScaffoldnov6\output\fixed_asset\application\views\form_status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108135a66c515b7b9e7-35853064%%*/
if (!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array(
    'file_dependency' =>
        array(
            '1e5e0cb6dc407b062ba649e118ac95fe33c7e03b' =>
                array(
                    0 => 'C:\\wamp\\www\\research\\iScaffoldnov6\\output\\fixed_asset\\application\\views\\form_status.tpl',
                    1 => 1516683066,
                    2 => 'file',
                ),
        ),
    'nocache_hash' => '108135a66c515b7b9e7-35853064',
    'function' =>
        array(),
    'variables' =>
        array(
            'action_mode' => 0,
            'direction' => 0,
            'record_id' => 0,
            'errors' => 0,
            'status_fields' => 0,
            'status_data' => 0,
        ),
    'has_nocache_code' => false,
    'version' => 'Smarty-3.1.7',
    'unifunc' => 'content_5a66c515c98ca',
), false); /*/%%SmartyHeaderCode%%*/ ?>
<?php if ($_valid && !is_callable('content_5a66c515c98ca')) {
    function content_5a66c515c98ca($_smarty_tpl)
    { ?>
        <div class="panel panel-default">
        <div class="panel-body">
            <a href="status" class="btn btn-warning btn-sm"> <i class="fa fa-list" aria-hidden="true"></i> Listing</a>
            <a class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value == 'create') { ?>active<?php } ?> btn btn-sm btn-success"
               href="status/create/"> <i class="fa fa-plus" aria-hidden="true"></i> New record</a>
            <?php if ($_smarty_tpl->tpl_vars['action_mode']->value != 'create') { ?>
                <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)) { ?><?php if ($_smarty_tpl->tpl_vars['direction']->value == 'right') { ?>disabled<?php } ?><?php } ?>"
                   href="status/navigate/right/<?php echo $_smarty_tpl->tpl_vars['record_id']->value; ?>
"><i class="fa fa-arrow-right"></i></a>
                <a class="btn-default btn btn-sm pull-right <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)) { ?><?php if ($_smarty_tpl->tpl_vars['direction']->value == 'left') { ?>disabled<?php } ?><?php } ?>"
                   href="status/navigate/left/<?php echo $_smarty_tpl->tpl_vars['record_id']->value; ?>
"><i class="fa fa-arrow-left"></i></a>
            <?php } ?>
            <?php if ($_smarty_tpl->tpl_vars['action_mode']->value == 'create') { ?>
                <h3 class="page-title">Add new record</h3>
            <?php } else { ?>
                <h3 class="page-title">Edit record: #<?php echo $_smarty_tpl->tpl_vars['record_id']->value; ?>
                </h3>
            <?php } ?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)) { ?>
                <div class="flash">
                    <div class="alert alert-danger">
                        <p><?php echo $_smarty_tpl->tpl_vars['errors']->value; ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
            <?php if (isset($_smarty_tpl->tpl_vars['direction']->value)) { ?>
                <div class="flash">
                    <div class="alert alert-info">
                        <p>You have reached end of navigation</p>
                    </div>
                </div>
            <?php } ?>
            <form class="form" method='post' action='status/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value; ?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)) { ?><?php echo $_smarty_tpl->tpl_vars['record_id']->value; ?>
<?php } ?>' enctype="multipart/form-data">


                <div class="form-group">
                    <label class="col-md-4 control-label"
                           for="status"><?php echo $_smarty_tpl->tpl_vars['status_fields']->value['status']; ?>
                    </label>
                    <div class="col-md-6">
                        <input placeholder="Enter <?php echo $_smarty_tpl->tpl_vars['status_fields']->value['status']; ?>
" class="form-control" type="text" maxlength="50"
                               value="<?php if (isset($_smarty_tpl->tpl_vars['status_data']->value)) { ?><?php echo $_smarty_tpl->tpl_vars['status_data']->value['status']; ?>
<?php } ?>" name="status" id="status"/>
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
    <?php }
} ?>