<?php /* Smarty version Smarty-3.1.7, created on 2018-02-09 18:22:11
         compiled from "C:\wamp64\www\fixed_asset\application\views\list_asset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85385a7768c2098c32-06302943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c349e23ccbbc1ec487c1e756df9a7502db20bc29' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\list_asset.tpl',
      1 => 1518200528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85385a7768c2098c32-06302943',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a7768c21f2d7',
  'variables' => 
  array (
    'table_name' => 0,
    'asset_data' => 0,
    'asset_fields' => 0,
    'i' => 0,
    'row' => 0,
    'showall' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7768c21f2d7')) {function content_5a7768c21f2d7($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp64\\www\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><!-- CUSTOM -->
<div class="panel panel-default">
    <div class="panel-body">

        <div class="col-md-12">
            <div class="col-md-2">


                <a href="asset/create/" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>

            </div>
            <div class="col-md-6 col-md-4">
                <form class="form" method='post' action="asset/search" id="search" enctype="multipart/form-data">

                    <div class="input-group">
                        <input type="text"
                               class="form-control"
                               placeholder="Enter name of asset"
                               id="search"
                               name="search"/>
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div  class="col-md-1 col-md-push-5">
                <a class="btn btn-file" id="exportToExcell">
                    <i  class="fa fa-download"></i></a>
            </div>
        </div>
        <div class="col-md-12">

                <h3 class="page-title box-title">List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>

            <?php if (!empty($_smarty_tpl->tpl_vars['asset_data']->value)){?>
            <form action="asset/delete" method="post" id="listing_form">
                <div class="table-responsive">
                    <table id="asset" class="table table-bordered  table-hover exportable" name="asset">
                        <thead>
                        <th>No</th>
                        <th><input type="checkbox" class="checkbox"/></th>
                        <th><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_name'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_model'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_serial_number'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_barcode_number'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_date_acquired'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_purchase_price'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_dep_method'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['ass_cat_id'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['asset_fields']->value['status_status_id'];?>
</th>

                        <th style="width:18px;">Actions</th>
                        </thead>
                        <tbody>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asset_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                            <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                <td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                <td>
                                    <input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ass_id'];?>
"/>
                                </td>

                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ass_name'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ass_model'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ass_serial_number'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ass_barcode_number'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ass_date_acquired'];?>
</td>
                                <td id="price"><?php echo $_smarty_tpl->tpl_vars['row']->value['ass_purchase_price'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ass_dep_method'];?>
</td>

                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ass_cat_id'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['status_status_id'];?>
</td>

                                <td>
                                    <div class="row-actions">
                                        <a href="asset/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['ass_id'];?>
" class="btn btn-info btn-xs"><i
                                                    class="fa fa-eye"
                                                    aria-hidden="true"></i></a>
                                        <a href="asset/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['ass_id'];?>
" class="btn btn-primary btn-xs"><i
                                                    class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="javascript:chk('asset/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['ass_id'];?>
')"
                                           class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <div class="actions-bar wat-cf">
                        <div class="actions">
                            <button class="btn btn-danger btn-xs" type="submit">
                                <i class="fa fa-trash" aria-hidden="true"></i> Delete Selected
                            </button>
                            <?php if ($_smarty_tpl->tpl_vars['showall']->value==0){?>
                                <a href="asset/index/0/all" class="btn btn-xs btn-primary show-all"><i
                                            lass="fa fa-eye"></i>
                                    Show All</a>
                            <?php }?>
                            <div class="pagination-wrapper pull-right">
                                <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

                            </div>
                        </div>

                    </div>
            </form>
            <div class="col-sm-12" id="chartArea" name="chartArea">
            </div>
        </div>
    </div>
    <?php }else{ ?>
    No records found.
    <?php }?>
</div>
</div>


<script>
    $(document).ready(function () {
        $('.table').DataTable();
        $('#asset tr').each(function () {
            var price = $(this).find("#price").text();
            var nf = new Intl.NumberFormat();
            var priceFormatted = nf.format(price);
            $(this).find("#price").html(priceFormatted);

        });
    });


</script>

<?php }} ?>