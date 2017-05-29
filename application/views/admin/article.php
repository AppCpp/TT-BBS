role.php<?php

/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/26
 * Time: 23:54
 */
?>
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
    <style>
        .table th, .table td {
            text-align: center;
            vertical-align: middle!important;
        }
    </style>
</head>
<body>

<div id="wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="div-square" style="background-color: white;width: 95px;height:80px;align-content: center">
                    <a href="<?php echo site_url('home_controller/index')?>" >
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <i class="fa fa-circle-o-notch fa-2x"></i>
                        <h4 style="margin: 3px;">论坛首页</h4>
                    </a>
                </div>

            </div>

            <span class="logout-spn" >
                  <div class="dropdown">
                    <button type="button" class="btn btn-lg dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" style="width: 150px;height:70px;background-color: #00a0e9;">
                        <?php echo $this->session->userdata('user')['0']['name']; ?>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="width: 150px">
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="<?php echo site_url('user_controller/info').'?user_id='.$this->session->userdata('user')['0']['user_id'];?>">个人信息</a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="<?php echo site_url('home_controller/index');?>">前台首页</a>
                        </li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="<?php echo site_url('user_controller/loginout');?>">退出登陆</a>
                        </li>
                    </ul>
                </div>
            </span>
        </div>
    </div>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <a href="<?php echo site_url('admin_controller/index').'?user_id='.$this->session->userdata('user')['0']['user_id'];?>" ><i class="fa fa-gear fa-2x"></i>系统管理 <span class="badge">网站</span></a>
                </li>
                <li class="active-link">
                    <a href="<?php echo site_url('admin_controller/article')?>"><i class="fa fa-table fa-2x "></i>帖子管理  <span class="badge">论坛</span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin_controller/user_list')?>"><i class="fa fa-users fa-2x"></i>用户管理  <span class="badge">权限</span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin_controller/role_list')?>"><i class="fa fa-key fa-2x"></i>角色管理  <span class="badge"></span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin_controller/del_article_record')?>"><i class="fa fa-bar-chart-o fa-2x"></i>删帖记录  <span class="badge"></span></a>
                </li>
            </ul>
        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div class="copyrights"></div>
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <h2>TT论坛-后台</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6" style="width: 100%">
                    <h5><strong>角色列表</strong></h5>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>题目</th>
                            <th>类别</th>
                            <th>内容提要</th>
                            <th>发布时间</th>
                            <th>审核状态</th>
                            <th>查看</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        foreach ($arts as $art){?>
                            <tr class="<?php if($art->shenhe==='1'){ echo 'success';}else{echo 'danger'; } ?>">
                                <td style="width: auto"><?php echo $i++;?></td>
                                <td style="width: auto"><?php echo mb_substr($art->title,0,15);?></td>
                                <td style="width: auto"><?php echo $art->kind;?></td>
                                <td style="width: auto"><?php echo mb_substr($art->content,0,20);?>...</td>
                                <td style="width: auto"><?php echo $art->createtime;?></td>
                                <td style="width: auto">
                                    <?php
                                    if($art->shenhe==='1'){?>
                                        <a class="btn btn-xs btn-success" href="<?php echo site_url('admin_controller/cancel_shenhe')?>?article_id=<?php echo $art->article_id; ?>" >√</a>
                                    <?php }else{ ?>
                                        <a class="btn btn-xs btn-danger" href="<?php echo site_url('admin_controller/shenhe')?>?article_id=<?php echo $art->article_id; ?>">×</a>
                                 <?php   } ?>
                                </td>
                                <td style="width: auto">
                                    <a class="btn btn-xs btn-info" href="<?php echo site_url('article_controller/detail')?>?article_id=<?php echo $art->article_id; ?>">查看</a>
                                    <a class="btn btn-xs btn-danger" href="<?php echo site_url('admin_controller/del_article')?>?article_id=<?php echo $art->article_id; ?>">删除</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
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

