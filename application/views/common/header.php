<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Recruitment Agency</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo $base_url ?>public/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $base_url ?>public/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo $base_url ?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo $base_url ?>public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo $base_url ?>public/css/owl.carousel.css" type="text/css">


        <!--dynamic table-->
        <link href="<?php echo $base_url ?>public/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
        <link href="<?php echo $base_url ?>public/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo $base_url ?>public/assets/data-tables/DT_bootstrap.css" />


        <!--right slidebar-->
        <link href="<?php echo $base_url ?>public/css/slidebars.css" rel="stylesheet">
        <!--datetime picker-->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>public/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
        <!--date picker-->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>public/assets/bootstrap-datepicker/css/datepicker.css" />
        <!--toastr-->
        <link href="<?php echo $base_url ?>public/assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />


        <!-- Custom styles for this template -->
        <link href="<?php echo $base_url ?>public/css/style.css" rel="stylesheet">
        <link href="<?php echo $base_url ?>public/css/style-responsive.css" rel="stylesheet" />

        <!-- search datatable  -->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>public/assets/search_datatable/jquery.css">
        <style type="text/css" class="init">

            tfoot input {
                width: 100%;
                padding: 6px;
                box-sizing: border-box;
            }

        </style>

        <style type="text/css">
            .hide_coloum{
                display: none;
            }

        </style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

    <section id="container" >
        <!--header start-->
        <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="<?php echo site_url('home');  ?>" class="logo"><!--<img width=60px;height=auto; src="<?php //echo $base_url ?>public/img/pizzalogo.png"/>--><span style="color:#009246">Recruitment   </span><span style="color:#CE2B37">Agency</span></a>
            <!--logo end-->

            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!--<li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>-->
                    <li> <a  href="<?php echo site_url('dashboard');  ?>">
                            Dashboard
                        </a>
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           <!-- <img alt="" src="img/avatar1_small.jpg">-->
                            <span class="username"><?=$this->session->userdata('user_name');?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <?php


                            ?>


<!--  <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
 <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>-->
                            <li><a href="<?php echo site_url('home/logout'); ?>"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>

                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">

                    <?php
                    $role_id= $this->session->userdata('role_id');
                    $queryPermission = $this->db->query("SELECT * FROM permission WHERE role_id='$role_id' GROUP BY menu_id");

                    foreach ($queryPermission->result() as $rowPermission) {
                        $menu_id=$rowPermission->menu_id;
                        $queryMenu = $this->db->query("SELECT * FROM menu WHERE menu_id='$menu_id'");
                        foreach ($queryMenu->result() as $rowMenu) {
                            $menu_name=$rowMenu->menu_name;
                            $menu_icon=$rowMenu->menu_icon;
                        }
                        ?>

                    <li class="sub-menu">
                        <a href="javascript:;" <?php if($active_menu=="$menu_name") {
                                echo 'class="active"';
                               }  ?>>
                            <i class="<?php echo $menu_icon; ?>"></i>

                            <span><?php echo $menu_name; ?></span>
                        </a>

                        <ul class="sub">
                                <?php

                                $queryPermissionSubMenu = $this->db->query("SELECT * FROM permission WHERE role_id='$role_id' AND menu_id='$menu_id'");
                                foreach ($queryPermissionSubMenu->result() as $row) {
                                    $sub_menu_id=$row->sub_menu_id;
                                    $querySubMenu = $this->db->query("SELECT * FROM subs_menu WHERE sub_menu_id='$sub_menu_id'");
                                    foreach ($querySubMenu->result() as $row) {
                                        $url=$row->url;
                                        $sub_menu_name=$row->sub_menu_name;

                                        ?>
                            <li <?php if($active_sub_menu=="$sub_menu_name") {
                                            echo 'class="active"';
                                            }  ?>><a href="<?php echo site_url($url); ?>"><?php echo $sub_menu_name; ?></a></li>
                                            <?php
                                        }
                                    }
                                    ?>
                        </ul>

                    </li>

                        <?php
                    }
                    ?>
                </ul>
                <div id="google_translate_element"></div>

                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                    }
                </script>
                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->