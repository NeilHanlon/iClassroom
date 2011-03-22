<?php
//
//HEADER FOR MEMBERS PAGES
//
if(!isset($title) || empty($title)) {
    $title="iClassroom | Development";
}
else {
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title; ?></title>

        <!-- CSS -->
        <link href="<?php echo base_url(); ?>style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
        <!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>style/css/ie6.css" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>style/css/ie7.css" /><![endif]-->

        <!-- JavaScripts-->
        <script type="text/javascript" src="<?php echo base_url(); ?>style/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>style/js/jNice.js"></script>
    </head>

    <body>
        <div id="wrapper">
            <!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
            <h1><a href="#"><span><?php echo $title; ?></span></a></h1>

            <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
            <ul id="mainNav">
                <li><?php echo anchor('members','DASHBOARD'); ?></li>
                <li><?php echo anchor('members/messages','MESSAGES'); ?></li>
                <?php if($this->session->userdata('userlevel') == 1) {
                    echo '<li class="logout">' . anchor('control','Teacher Control Panel') . '</li>';
                }
                else {

                }
                ?>
                <li class="logout"><?php echo anchor('members/logout','LOGOUT'); ?></li>
            </ul>
            <!-- // #end mainNav -->

            <div id="containerHolder">
                <div id="container">
                    <div id="sidebar">
                        <ul class="sideNav">
                            <li><?php //echo anchor('register','Register'); ?></li>
                        </ul>
                        <!-- // .sideNav -->
                    </div>
                    <!-- // #sidebar -->

                    <!-- h2 stays for breadcrumbs -->
                    <h2><a href="#"><?php echo $title; ?></a> &raquo;</h2>

                    <div id="main">

