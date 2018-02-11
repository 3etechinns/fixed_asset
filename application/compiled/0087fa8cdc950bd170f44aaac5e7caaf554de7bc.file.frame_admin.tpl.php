<?php /* Smarty version Smarty-3.1.7, created on 2018-02-11 22:45:28
         compiled from "C:\wamp64\www\fixed_asset\application\views\frame_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:269555a80c788c6b854-22077257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0087fa8cdc950bd170f44aaac5e7caaf554de7bc' => 
    array (
      0 => 'C:\\wamp64\\www\\fixed_asset\\application\\views\\frame_admin.tpl',
      1 => 1518203008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269555a80c788c6b854-22077257',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'logged_in' => 0,
    'name' => 0,
    'table_name' => 0,
    'page_title' => 0,
    'msg_type' => 0,
    'msg' => 0,
    'chart_data' => 0,
    'chart_title' => 0,
    'chart_sub_title' => 0,
    'chart_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a80c78900270',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a80c78900270')) {function content_5a80c78900270($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Fixed Asset Managment</title>
    <base href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
"/>
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/image/fix_icon.png" type="image/x-icon"/>


    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/on-server/css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/on-server/css/fontawesome-all.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/dist/css/skins/skin-blue.css" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="assets/js/jQuery-2.1.4.min.js"></script>

    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script src="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/jQueryUI/jquery-ui.js"></script>

    
    <script type="text/javascript" src="assets/dist/js/app.js"></script>
    <script type="text/javascript" src="iscaffold/js/main.js"></script>
    
    
    <script src="assets/js/xls.core.js" type="text/javascript"></script>
    <script src="assets/js/FileSaver.min.js" type="text/javascript"></script>
    <script src="assets/js/tableexport.js" type="text/javascript"></script>

    <script src="assets/src/jsgrid.core.js"></script>
    <script src="assets/src/jsgrid.load-indicator.js"></script>
    <script src="assets/src/jsgrid.load-strategies.js"></script>
    <script src="assets/src/jsgrid.sort-strategies.js"></script>
    <script src="assets/src/jsgrid.field.js"></script>
    <script src="assets/src/fields/jsgrid.field.text.js"></script>
    <script src="assets/src/fields/jsgrid.field.number.js"></script>
    <script src="assets/src/fields/jsgrid.field.select.js"></script>
    <script src="assets/src/fields/jsgrid.field.checkbox.js"></script>
    <script src="assets/src/fields/jsgrid.field.control.js"></script>
    <script src="assets/src/jsgrid.validation.js"></script>


    
    
          

    <!-- Include Date Range Picker -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script type="application/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/js/angular.min.js"></script>
    <script type="application/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/js/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
    <script type="application/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="application/javascript"
            src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>



    <script type="text/javascript">
        function myFunction() {
            // Declare variables
            var $rows = $('table tbody tr');
            $('#search').keyup(function () {
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                $rows.show().filter(function () {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });
        }

        $(document).ready(function () {
            /*$("form").submit(function(){
            $(this).find('button[type="submit"]').prop("disabled", true);
            });*/

            $(".alert").delay(7000).fadeOut(3000);

        });


    </script>
</head>
<?php if ($_smarty_tpl->tpl_vars['logged_in']->value==true){?>
    <body class="skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b> Dashboard</b></span>
                <!-- logo for regular state and mobile devices -->

                <span class="logo-lg"><b>Dashboard</b></span>
            </a>
            <!-- Header Navbar: css can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <?php if ($_smarty_tpl->tpl_vars['logged_in']->value==true){?>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: css can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    
                                    
                                    <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="http://127.0.0.1/research/crudadmin/assets/dist/img/avatar.png"
                                             class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

                                            <small>Employee</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
loadChangePass" class="btn btn-default btn-flat"><i
                                                        class="fa fa-key"></i> Change Password</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['base_url'];?>
logout"><i class="fa fa-sign-out"></i> Sign
                                                out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                <?php }?>
            </nav>
        </header>
        <aside class="main-sidebar">
            <!-- sidebar: css can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : css can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Asset'){?> class='active'<?php }?><?php }?>><a href='asset'><i
                                    class='fa fa-archive'></i><span>Asset</span></a></li>
                    <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Asset Category'){?> class='active'<?php }?><?php }?>><a
                                href='asset_category'><i class='fa fa-arrow-circle-right'></i><span>Fixed Asset Category</span></a>
                    </li>
                    <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Depreciation'){?> class='active'<?php }?><?php }?>>
                        <a href='depreciation'><i class='fa fa-briefcase'></i><span>Depreciation</span></a>
                    </li>
                    <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Fixed Asset Track'){?> class='active'<?php }?><?php }?>><a
                                href='ass_track'><i class='fa fa-file-archive'></i><span>Fixed Asset Track</span></a></li>

                    
                        
                    
                    <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Employee'){?> class='active'<?php }?><?php }?>><a
                                href='employee'><i class='fa fa-user-circle'></i><span>Employee</span></a></li>
                    <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Status'){?> class='active'<?php }?><?php }?>><a href='status'><i
                                    class='fa fa-tags'></i><span>Status</span></a></li>


                    <li class="treeview ">

                        <a href="#">
                            <i class="fa fa-gear"></i>
                            <span>Settings</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>

                        <ul class="treeview-menu menu-open" style="display: block;">
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Tbl_pages'){?> class='active'<?php }?><?php }?>><a
                                        href='tbl_pages'><i class='fa fa-adjust'></i><span>Pages</span></a></li>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Tbl_permission'){?> class='active'<?php }?><?php }?>><a
                                        href='tbl_permission'><i class='fa fa-life-ring'></i><span>Permission</span></a></li>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Tbl_reset_password'){?> class='active'<?php }?><?php }?>>
                                <a
                                        href='tbl_reset_password'><i class='fa fa-edit'></i><span>Reset Password</span></a>
                            </li>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Tbl_roles'){?> class='active'<?php }?><?php }?>><a
                                        href='tbl_roles'><i class='fa fa-transgender-alt'></i><span>Roles</span></a></li>
                            <li<?php if (isset($_smarty_tpl->tpl_vars['table_name']->value)){?><?php if ($_smarty_tpl->tpl_vars['table_name']->value=='Tbl_users'){?> class='active'<?php }?><?php }?>><a
                                        href='tbl_users'><i class='fa fa-users'></i><span>Users</span></a></li>

                        </ul>

                    </li>

                    <li class="treeview">
                        <a  href="#" >
                            <i class="fa fa-bar-chart"></i>
                            <span>Reports</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>

                        <ul class="treeview-menu menu-open" style="display: block;">
                            <li>
                                <a href="#">
                                    Activity Report
                                </a>
                            </li>

                            <li><a href="#">
                                    Audit Log</a>
                            </li>
                            <li>
                                <a href="#">
                                    Depreciation Report
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    Asset Maintenance Report
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Unaccepted Assets
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Custom Asset Report
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>

        <!-- START MAIN CONTENT -->
        <div class="content-wrapper" style="min-height: 836px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <i class="fa fa-tachometer" aria-hidden="true"></i><?php if (isset($_smarty_tpl->tpl_vars['page_title']->value)){?> <?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
<?php }?>
                    <small>Control panel</small>
                </h1>
            </section>

            <section class="content">
                <div class="">
                    <?php if ($_smarty_tpl->tpl_vars['logged_in']->value==true){?>
                        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['template']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php }?>
                </div>
            </section>
        </div>
        </li>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <strong style="color: #3c8dbc;">Fixed Asset Management</strong>
            </div>
            <strong>
                Copyright © 2017 <a href="#">BusinessTYC</a>.</strong> All rights
            reserved.
        </footer>
        <!-- END MAIN CONTENT -->


    </div><!-- container -->

    </body>
<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ("form_login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['msg_type']->value)){?>
    <?php if ($_smarty_tpl->tpl_vars['msg_type']->value=='error'){?>
        <div class="alert alert-danger alert-position">
            <button type="button" class="close msgbtn" data-dismiss="alert">×</button>
            <span id="msg">  <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)){?><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<?php }?></span>
        </div>
    <?php }else{ ?>
        <div class="alert alert-success alert-position">
            <button type="button" class="close msgbtn" data-dismiss="alert">×</button>
            <span id="msg">  <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)){?><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<?php }?></span>
        </div>
    <?php }?><?php }?>
</html>
<script type="text/javascript">

    $(document).ready(function () {
        $('.table').DataTable();
    });

    $(function () {


        //var obj={}
        var chart;
        var msg =<?php echo $_smarty_tpl->tpl_vars['chart_data']->value;?>
;
        //var obj = $.parseJSON(msg);
        obj = msg;
        var name = Array();
        var data = Array();
        var dataArrayFinal = Array();
        for (i = 0; i < obj.length; i++) {
            name[i] = obj[i].group_param;
            data[i] = obj[i].param_value;
        }
        for (j = 0; j < data.length; j++) {
            var temp = new Array(name[j], data[j]);
            dataArrayFinal[j] = temp;
        }
        //alert(dataArrayFinal);
//alert('main data: '+ dataArrayFinal);    
        $(document).ready(function () {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'chartArea',
                    type: 'pie'
                },
                title: {
                    text: '<?php echo $_smarty_tpl->tpl_vars['chart_title']->value;?>
'
                },
                subtitle: {
                    text: "<?php echo $_smarty_tpl->tpl_vars['chart_sub_title']->value;?>
"
                },
                xAxis: {
                    categories: name,
                    labels: {
                        formatter: function () {
                            return this.value.name;
                        }
                    },

                },
                yAxis: {

                    labels: {
                        formatter: function () {
                            return this.value;
                        }
                    },
                },
                tooltip: {
                    formatter: function () {
                        return '<p><b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) + ' % ' + '</p><p>, Count : ' + Highcharts.numberFormat(this.point.y, 0) + '</p>';
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true
                        },
                        showInLegend: false
                    }
                },
                series: [{
                    type: '<?php echo $_smarty_tpl->tpl_vars['chart_type']->value;?>
',
                    name: '<?php echo $_smarty_tpl->tpl_vars['chart_title']->value;?>
',
                    data: dataArrayFinal
                }]
            });
        });
    });<?php }} ?>