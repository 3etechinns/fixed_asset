<?php /* Smarty version Smarty-3.1.7, created on 2018-02-20 13:34:40
         compiled from "C:\wamp64\www\fixed_asset\application\views\list_depreciation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:307175a8c23f0eb0180-71913230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89a717fa9b03606cc78dfae80205fc470892e8c8' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\list_depreciation.tpl',
      1 => 1518388826,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '307175a8c23f0eb0180-71913230',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search_form' => 0,
    'table_name' => 0,
    'depreciation_data' => 0,
    'depreciation_fields' => 0,
    'i' => 0,
    'row' => 0,
    'showall' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a8c23f10c625',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8c23f10c625')) {function content_5a8c23f10c625($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp64\\www\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><!-- CUSTOM -->
<div class="panel panel-default">
    <div  id="download" class="col-md-1 col-lg-push-11">
        <a class="btn btn-file" id="exportToExcell">
            <i  class="fa fa-download"></i></a>
    </div>
    <div class="panel-body">

        <form action="depreciation/search" method="post" id="search_form">

            <?php if (isset($_smarty_tpl->tpl_vars['search_form']->value)){?><?php echo $_smarty_tpl->tpl_vars['search_form']->value;?>
<?php }?>
        </form>
        <h3 class="page-title">List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>
        <?php if (!empty($_smarty_tpl->tpl_vars['depreciation_data']->value)){?>
        <form action="depreciation/delete" method="post" id="listing_form">
            <div class="table-responsive">
                <table class="table table-bordered table-hover exportable" id="dep" name="depreciation">
                    <thead>
                    <th>No</th>
                    
                    <th><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_date'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_amount'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_status'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_description'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['dep_commnet'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['asset_ass_id'];?>
</th>
                    <th> <?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['book_value'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['depreciation_fields']->value['accumulative_value'];?>
</th>

                    <th style="width:180px;">Actions</th>
                    </thead>
                    <tbody>
                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['depreciation_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                            
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_date'];?>
</td>
                            <td id="amount"><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_amount'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_status'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_description'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['dep_commnet'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['asset_ass_id'];?>
</td>
                            <td id="bookValue"> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['book_value'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
   </td>
                            <td id="accumulativeValue"> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['row']->value['accumulative_value'];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
  </td>
                            <td>
                                <div class="row-actions">
                                    <a href="depreciation/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['dep_id'];?>
" class="btn btn-info btn-xs"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                    
                                    
                                    
                                    
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="actions-bar wat-cf">
                    <div class="actions">
                        
                        
                        
                        <?php if ($_smarty_tpl->tpl_vars['showall']->value==0){?>
                            <a href="depreciation/index/0/all" class="btn btn-xs btn-primary show-all"><i
                                        lass="fa fa-eye"></i> Show All</a>
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
    <?php }else{ ?>
    No records found.
    <?php }?>
</div>
</div>


<script>
    $(document).ready(function () {
//

        $('#dep tr').each(function () {

            var amount = $(this).find("#amount").text();
            var bookvalue = $(this).find("#bookValue").text();
            var accumulativeValue = $(this).find("#accumulativeValue").text();


            var nf = new Intl.NumberFormat();

            var amountFormatted = nf.format(amount);
            var bookvalueFormatted = nf.format(bookvalue);
            var accumulativeValueFormatted = nf.format(accumulativeValue);

            $(this).find("#amount").html(amountFormatted);
            $(this).find("#bookValue").html(bookvalueFormatted);
            $(this).find("#accumulativeValue").html(accumulativeValueFormatted);

        });
        $('.table').DataTable();
    });


</script>

<?php }} ?>