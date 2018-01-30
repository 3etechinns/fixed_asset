<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Fixed Asset Managment</title>
    <base href="{$config.base_url}"/>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{$config.base_url}assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{$config.base_url}assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <link href="{$config.base_url}assets/dist/css/skins/skin-blue.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        input[class="form-control"] {
            border-radius: 3px !important;
        }

        .page-title {
            background-color: #ddd;
            padding: 10px;
        }

        .pagination-wrapper > a, .jsgrid-pager-page > a, .jsgrid-pager-nav-button > a {
            padding-left: 9px;
            padding-right: 9px;
            margin-right: 3px;
            background-color: #3c8dbc;
            color: #fff !important;
            text-align: center;
            vertical-align: top;
            border-radius: 2px;
            padding-top: 3px;
            padding-bottom: 2px;
        }

        .jsgrid-pager-current-page {
            background-color: #fff;
            color: #000 !important;
            padding-right: 5px;
        }

        .pagination-wrapper {
            /*margin-top:14px;*/
        }

        span[class="current"] {
            padding-left: 2px;
            padding-right: 3px;
        }

        a.btn.btn-xs {
            width: 32px;
        }

        .button-actions {
            padding-top: 18px;
            width: 100%;
            display: block;
            float: left;
        }

        .form-group {
            float: left;
            width: 100%;
            padding-top: 10px;
        }

        span[class="error"] {
            color: red;
            padding-left: 3px;
        }

        .row-actions {
            width: 110px;
        }

        .control-label {
            text-align: right;
        }

        td > input {
            width: 100%;
            padding-left: 3px;
            padding-right: 3px;
        }

        td[class="td-width"] {
            width: 15%;
        }

        .table > tbody > tr > td {
            padding: 0;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        @media print {
            @page {
                size: landscape;   /* auto, portrait, landscape or length... */
                margin: 5mm;
                margin-bottom: 2mm;
                width: 297mm;
                height: 210mm;
            }

            td > input {
                border: 1px solid #fff;
            }
        }

        .datagrid-body-inner {
            margin-top: 40px;
        }

        tr.datagrid-row:hover {
            background: #00bbee;
            color: #fff;
        }

        .datagrid-toolbar > a {
            width: 50px !important;
            margin-bottom: 10px;
        }

        .datagrid-pager {
            display: none;
        }

        .datagrid-view .validatebox-invalid {
            border-color: #ffa8a8 !important;
        }

        .datagrid-view .datagrid-editable-input {
            margin: 0;
            padding: 2px 4px;
            border: 1px solid #ddd;
            font-size: 12px;
            outline-style: none;
            -moz-border-radius: 0 0 0 0;
            -webkit-border-radius: 0 0 0 0;
            border-radius: 0 0 0 0;
        }

        .validatebox-invalid {
            border-color: #ffa8a8;
            background-color: #fff;
            color: #404040;
        }

        .datagrid-btable {
            font-size: 13px;
        }

        .datagrid-header {
            margin-bottom: -16px;
        }

        .datagrid-row-selected {
            background: #00bbee;
            color: #fff;
        }

        .datagrid-editable-input {
            color: #5f5050;
        }

        .datagrid-row:focus {
            background-color: red;
        }

        .panel.window.panel-htop.messager-window, .window {
            width: 35%;
            position: absolute;
            bottom: 0;
            right: 0;
            border: 1px solid #ddd;
            padding: 0 0 0 10px;
            z-index: 99999;
            height: 120px;
        }

        .dialog-button > a {
            margin-right: 10px;
        }

        .datagrid-header-row {
            font-weight: 600;
        }

        .datagrid-editable > table {
            width: 90%;
        }

        .alert-position {
            position: fixed;
            height: 53px;
            width: 30%;
            bottom: 0;
            right: 5px;
            margin-bottom: 6px;
            z-index: 9999;
        }

        .show-all {
            width: 80px !important;
        }

        /*START JS GRID*/
        #jsGrid {
            width: 100%;
            background-color: #fff;
        }

        td.jsgrid-cell.jsgrid-invalid {
            border: 1px solid red;
        }

        .jsgrid-button {
            margin-left: 5px;
        }

        .jsgrid-header-row {
            background: #ddd;
            font-size: 17px;
        }

        .jsgrid-insert-mode-button {

        }

        table {
            width: 100%;
        }

        .jsgrid-grid-body, .jsgrid-grid-header {
            /* padding:5px;*/
        }

        .jsgrid-insert-row {
            background-color: #bde6bd;
            display: flex;
        }

        .jsgrid-grid-body > table {
            margin-bottom: 0 !important;
        }

        .jsgrid-cell > select, .jsgrid-cell > input[type='number'] {
            height: 100%;
        }

        .jsgrid-pager-container {
            background: #fff;
            display: block;
            width: 100%;
            padding-bottom: 7px;
            padding-top: 15px;
        }

        .jsgrid-edit-row {
            background-color: #ddd;
        }

        .jsgrid-cell > input {
            width: 90%;
        }

        /*END JS GRID*/
        #searchResult {
            background-color: #748488;
            color: #fff;
        }
    </style>
    <script type="text/javascript" src="assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="iscaffold/jquery-ui/js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="assets/dist/js/app.js"></script>
    <script type="text/javascript" src="iscaffold/js/main.js"></script>
    <!-- <script type="text/javascript" src="assets/js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.edatagrid.js"></script> -->
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
{if $logged_in == true}
    <body class="skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{$config.base_url}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>Fixed Asset Managment</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Fixed Asset Managment</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                {if $logged_in == true}
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="http://127.0.0.1/research/crudadmin/assets/dist/img/avatar.png"
                                         class="user-image" alt="User Image">
                                    <span class="hidden-xs">{$name}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="http://127.0.0.1/research/crudadmin/assets/dist/img/avatar.png"
                                             class="img-circle" alt="User Image">
                                        <p>
                                            {$name}
                                            <small>Employee</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="{$config.base_url}loadChangePass" class="btn btn-default btn-flat"><i
                                                        class="fa fa-key"></i> Change Password</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{$config.base_url}logout"><i class="fa fa-sign-out"></i> Sign
                                                out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                {/if}
            </nav>
        </header>
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li{if isset($table_name)}{if $table_name == 'Ass_track'} class='active'{/if}{/if}><a
                                href='ass_track'><i class='fa fa-list'></i><span>Fixed Asset Track</span></a></li>
                    <li{if isset($table_name)}{if $table_name == 'Asset'} class='active'{/if}{/if}><a href='asset'><i
                                    class='fa fa-list'></i><span>Asset</span></a></li>
                    <li{if isset($table_name)}{if $table_name == 'Asset_category'} class='active'{/if}{/if}><a
                                href='asset_category'><i class='fa fa-list'></i><span>Fixed Asset Category</span></a>
                    </li>
                    <li{if isset($table_name)}{if $table_name == 'Depreciation'} class='active'{/if}{/if}>
                        <a href='depreciation'><i class='fa fa-list'></i><span>Depreciation</span></a>
                    </li>
                    <li{if isset($table_name)}{if $table_name == 'Depreciation'} class='active'{/if}{/if}>
                        <a href='depreciation'><i class='fa fa-list'></i><span>Fixed Asset Return</span></a>
                    </li>

                    <li{if isset($table_name)}{if $table_name == 'Depreciation'} class='active'{/if}{/if}>
                        <a href='depreciation'><i class='fa fa-list'></i><span>Fixed Asset Transfer</span></a>
                    </li>
                    <li{if isset($table_name)}{if $table_name == 'Depreciation'} class='active'{/if}{/if}>
                        <a href='depreciation'><i class='fa fa-list'></i><span>Disposal Collection</span></a>
                    </li>
                    <li{if isset($table_name)}{if $table_name == 'Depreciation'} class='active'{/if}{/if}>
                        <a href='depreciation'><i class='fa fa-list'></i><span>Disposed  Asset</span></a>
                    </li>
                    <li{if isset($table_name)}{if $table_name == 'Employee'} class='active'{/if}{/if}><a
                                href='employee'><i class='fa fa-list'></i><span>Employee</span></a></li>
                    <li{if isset($table_name)}{if $table_name == 'Status'} class='active'{/if}{/if}><a href='status'><i
                                    class='fa fa-list'></i><span>Status</span></a></li>
                    <li{if isset($table_name)}{if $table_name == 'Tbl_pages'} class='active'{/if}{/if}><a
                                href='tbl_pages'><i class='fa fa-list'></i><span>Pages</span></a></li>
                    <li{if isset($table_name)}{if $table_name == 'Tbl_permission'} class='active'{/if}{/if}><a
                                href='tbl_permission'><i class='fa fa-list'></i><span>Permission</span></a></li>
                    <li{if isset($table_name)}{if $table_name == 'Tbl_reset_password'} class='active'{/if}{/if}><a
                                href='tbl_reset_password'><i class='fa fa-list'></i><span>Reset Password</span></a></li>
                    <li{if isset($table_name)}{if $table_name == 'Tbl_roles'} class='active'{/if}{/if}><a
                                href='tbl_roles'><i class='fa fa-list'></i><span>Roles</span></a></li>
                    <li{if isset($table_name)}{if $table_name == 'Tbl_users'} class='active'{/if}{/if}><a
                                href='tbl_users'><i class='fa fa-list'></i><span>Users</span></a></li>
                </ul>
            </section>
        </aside>

        <!-- START MAIN CONTENT -->
        <div class="content-wrapper" style="min-height: 836px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <i class="fa fa-tachometer" aria-hidden="true"></i>{if isset($page_title)} {$page_title}{/if}
                    <small>Control panel</small>
                </h1>
            </section>

            <section class="content">
                <div class="">
                    {if $logged_in == true}
                        {include file="$template.tpl"}
                    {/if}
                </div>
            </section>
        </div>
        </li>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Leul</b> Admin System | Version 1.0
            </div>
            <strong>Copyright © 2017 <a href="http://127.0.0.1/crudadmin/crudadmin/">MyAcc</a>.</strong> All rights
            reserved.
        </footer>
        <!-- END MAIN CONTENT -->


    </div><!-- container -->

    </body>
{else}
    {include file="form_login.tpl"}
{/if}
{if isset($msg_type)}
    {if $msg_type=='error'}
        <div class="alert alert-danger alert-position">
            <button type="button" class="close msgbtn" data-dismiss="alert">×</button>
            <span id="msg">  {if isset($msg)}{$msg}{/if}</span>
        </div>
    {else}
        <div class="alert alert-success alert-position">
            <button type="button" class="close msgbtn" data-dismiss="alert">×</button>
            <span id="msg">  {if isset($msg)}{$msg}{/if}</span>
        </div>
    {/if}{/if}
</html>
<script type="text/javascript">
    $(function () {
        //var obj={}
        var chart;
        var msg ={$chart_data};
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
                    text: '{$chart_title}'
                },
                subtitle: {
                    text: "{$chart_sub_title}"
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
                    type: '{$chart_type}',
                    name: '{$chart_title}',
                    data: dataArrayFinal
                }]
            });
        });
    });
</script>