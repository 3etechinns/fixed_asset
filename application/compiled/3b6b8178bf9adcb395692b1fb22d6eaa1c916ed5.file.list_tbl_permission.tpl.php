<?php /* Smarty version Smarty-3.1.7, created on 2018-01-23 05:59:24
         compiled from "C:\wamp64\www\fixed_asset\application\views\list_tbl_permission.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39305a66cf3c40d662-16803364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b6b8178bf9adcb395692b1fb22d6eaa1c916ed5' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\list_tbl_permission.tpl',
      1 => 1509860908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39305a66cf3c40d662-16803364',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search_result' => 0,
    'table_name' => 0,
    'tbl_permission_data' => 0,
    'tbl_permission_fields' => 0,
    'row' => 0,
    'showall' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a66cf3c53d00',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a66cf3c53d00')) {function content_5a66cf3c53d00($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\wamp64\\www\\fixed_asset\\application\\libraries\\smarty\\plugins\\function.cycle.php';
?><!-- CUSTOM -->
<div class="panel panel-default hidden">                    
                    <div class="panel-body">
                        <form action="tbl_permission/search" method="post" id="search_form">                     
                        <a href="tbl_permission/create/" class="btn btn-success btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>                        
                        <div class="input-group" style="width:300px;float:right">
                            <input type="text" required="true" class="form-control" name="search" id="search" onkeyup="myFunction()" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            <span class="input-group-btn">
                                <a class="btn btn-default" type="submit" id="exportToExcell" name="exportToExcell">
                                    <i class="fa fa-download"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                         <span id="searchResult" name="searchResult" class="label-info"><?php if (!empty($_smarty_tpl->tpl_vars['search_result']->value)){?> <?php echo $_smarty_tpl->tpl_vars['search_result']->value;?>
<?php }?></span>
                       <h3 class="page-title">List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>                  
                        <?php if (!empty($_smarty_tpl->tpl_vars['tbl_permission_data']->value)){?>
                        <form action="tbl_permission/delete" method="post" id="listing_form">
                          <div class="table-responsive">
                            <table class="table exportable" id="tbl_permission" name="tbl_permission">
                                <thead>
                                    <th> </th>
                                    			<th><?php echo $_smarty_tpl->tpl_vars['tbl_permission_fields']->value['pm_pg_id'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['tbl_permission_fields']->value['pm_enabled'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['tbl_permission_fields']->value['pm_edit'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['tbl_permission_fields']->value['pm_insert'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['tbl_permission_fields']->value['pm_view'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['tbl_permission_fields']->value['pm_delete'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['tbl_permission_fields']->value['pm_show'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['tbl_permission_fields']->value['pm_role'];?>
</th>

                                    <th style="width:180;">Actions</th>
                                </thead>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tbl_permission_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['pm_id'];?>
" /></td>
                                            				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['pm_pg_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['pm_enabled'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['pm_edit'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['pm_insert'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['pm_view'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['pm_delete'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['pm_show'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['pm_role'];?>
</td>

                                            <td style="float:right">
                                            <div class="row-actions">
                                            <a href="tbl_permission/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['pm_id'];?>
" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="tbl_permission/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['pm_id'];?>
" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                             <a href="javascript:chk('tbl_permission/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['pm_id'];?>
')" class="btn btn-danger btn-xs"><i class="fa fa-close" aria-hidden="true"></i></a>
                                             </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="actions-bar wat-cf">
                                <div class="actions">
                                    <button class="btn btn-danger btn-xs" type="submit">
                                       <i class="fa fa-close" aria-hidden="true"></i> Delete Selected
                                    </button>
                                    <?php if ($_smarty_tpl->tpl_vars['showall']->value==0){?>
                                    <a href="tbl_permission/index/0/all" class="btn btn-xs btn-success show-all"><i lass="fa fa-eye"></i> Show All</a>
                                    <?php }?>
                                    <div class="pagination-wrapper pull-right">
                                    <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

                                </div>
                                </div>
                                
                            </div>
                        </form>
                     
                        </div>
                        <?php }else{ ?>
                            No records found.
                        <?php }?>
                    </div>
                </div> 
                <div class="panel panel-default">                    
                    <div class="panel-body">       
     <h3 class="page-title">List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>
    <div id="jsGrid"></div>
</div>
</div>
    <script>
        $(function() {
            $("#jsGrid").jsGrid({
                width: "100%",
                filtering: true,
                editing: true,
                inserting: true,
                sorting: true,
                paging: true,
                autoload: true,
                pageSize: 15,
                pageButtonCount: 5,
                insertedRowLocation: "top",
                deleteConfirm: "Do you really want to delete ?",
                controller: {
                    loadData: function() {
                        var d = $.Deferred();
                        $.ajax({
                           url: "tbl_permission/listGrid",
                            dataType: "json"
                        }).done(function(response) {
                            d.resolve(response.value);
                        });

                        return d.promise();
                    },
                    updateItem: function(item) {
                         var d = $.Deferred();
                         $.ajax({
                           type: "POST",
                            url: "tbl_permission/updateGrid",
                            data: item
                        }).done(function(response) {
                            //alert(response[0]);
                            //console.log(response["id"]);
                            //d.resolve(response.value);
                        });
                         //return d.promise();
                    },
                    deleteItem: function(item) {
                         var d = $.Deferred();
                         $.ajax({
                           type: "POST",
                            url: "tbl_permission/deleteGrid",
                            data: item
                        }).done(function(response) {
                            d.resolve(response.value);
                        });
                         return d.promise();
                    },
                    insertItem: function(item) {
                         var d = $.Deferred();
                         $.ajax({
                           type: "POST",
                            url: "tbl_permission/insertGrid",
                            data: item
                        }).done(function(response) {
                            d.resolve(response.value);
                        });
                         return d.promise();
                    }
                },                
                fields: [
                    { name: 'pm_pg_id', type: 'text', title: 'Pm Pg Id', css: 'hidden'  },
                    { name: 'pg_name', type: 'text', title: 'Page', validate: 'required'  },
{ name: 'pm_enabled', type: 'select', title: 'Pm Enabled', validate: 'required', items: [ "No", "Yes" ]},
{ name: 'pm_edit', type: 'select', title: 'Pm Edit', validate: 'required', items: [ "No", "Own", "All", "Team" ]},
{ name: 'pm_insert', type: 'select', title: 'Pm Insert', validate: 'required', items: [ "No", "Yes" ]  },
{ name: 'pm_view', type: 'select', title: 'Pm View', validate: 'required', items: [ "No", "Own", "All", "Team" ]  },
{ name: 'pm_delete', type: 'select', title: 'Pm Delete', validate: 'required',items: [ "No", "Own", "All", "Team" ]  },
{ name: 'pm_show', type: 'select', title: 'Pm Show', validate: 'required',items: [ "No", "Own", "All", "Team" ]  },
{ name: 'pm_role', type: 'text', title: 'Pm Role', validate: 'required'  },
{ name: 'pm_description', type: 'text', title: 'Pm Description'},
					{ type: 'control' , width:70}

                ]
            });
        });
    </script>
<?php }} ?>