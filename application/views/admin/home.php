<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/26
 * Time: 15:11
 */
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>后台管理</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('static/common/css/bootstrap.min.css')?>" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('static/common/css/font-awesome.css')?>" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('static/common/css/custom.css')?>" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php $this->load->view('admin/admin_header'); ?>

    <!-- /. NAV SIDE  -->
    <div class="copyrights"></div>
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <h2>TT论坛-后台</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="alert alert-info">
                        <strong>提提论坛欢迎您 </strong>
                    </div>

                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
            <div class="row text-center pad-top">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="<?php echo site_url('home_controller/index')?>" >
                            <i class="fa fa-circle-o-notch fa-5x"></i>
                            <h4>论坛首页</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="<?php echo site_url('admin_controller/index').'?user_id='.$this->session->userdata('user')['0']['user_id'];?>" >
                            <i class="fa fa-gear fa-5x"></i>
                            <h4>系统管理</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="<?php echo site_url('admin_controller/article')?>" >
                            <i class="fa fa-table fa-5x"></i>
                            <h4>帖子管理</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="<?php echo site_url('admin_controller/user_list')?>" >
                            <i class="fa fa-users fa-5x"></i>
                            <h4>用户管理</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="<?php echo site_url('admin_controller/role_list')?>" >
                            <i class="fa fa-key fa-5x"></i>
                            <h4>角色管理</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="<?php echo site_url('admin_controller/del_article_record')?>" >
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h4>删帖记录</h4>
                        </a>
                    </div>
                </div>
            </div>
            </div>
            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
<div class="footer">


    <div class="row">
        <div class="col-lg-12" >
            &copy; Clan
        </div>
    </div>
</div>


<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="<?php echo base_url('static/common/js/jquery-1.10.2.min.js')?>"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo base_url('static/common/js/bootstrap.min.js')?>"></script>
<!-- CUSTOM SCRIPTS -->
<script src="<?php echo base_url('static/common/js/custom.js')?>"></script>


</body>
</html>
