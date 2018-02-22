<?php /* Smarty version Smarty-3.1.7, created on 2018-02-22 07:40:11
         compiled from "C:\wamp64\www\fixed_asset\application\views\asset_report.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19995a8dc4fc4498b7-12218009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5632bd7c265620f7289f1651e35740af0ccb4c3e' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\asset_report.tpl',
      1 => 1519285206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19995a8dc4fc4498b7-12218009',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a8dc4fc4dd36',
  'variables' => 
  array (
    'totalData' => 0,
    'i' => 0,
    'row' => 0,
    'assetInStore' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8dc4fc4dd36')) {function content_5a8dc4fc4dd36($_smarty_tpl) {?><div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Asset Report</h3>
        <div class="box-tools pull-right">
            <a class="btn btn-file" id="exportToExcell">
                <i class="fa fa-download"></i></a>
            <button type="button" class="btn btn-box-tool" data-widget="collapse">

                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body" style="display: block;">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <label>Total Asset By Item</label>
                    <table class="table table-bordered  table-hover">
                        <thead>
                        <tr>
                            <th>
                                No

                            </th>
                            <th>Item</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>

                        <tbody><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['totalData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_name'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['quantity'];?>
</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <label>Total Asset on Store</label>
                    <table class="table table-bordered  table-hover">
                        <thead>
                        <tr>
                            <th>
                                No

                            </th>
                            <th>Item</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>

                        <tbody><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['assetInStore']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_name'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['quantity'];?>
</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- ./box-body -->
</div><?php }} ?>