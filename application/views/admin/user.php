<?php

/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/26
 * Time: 23:54
 */

function isAdmin($uid,$admin_array){
    foreach ($admin_array as $role){
        if($role->user_id===$uid){
            return true;
        }
    }
    return false;
}
?>

<!DOCTYPE html>
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
            <div class="row">
                <div class="col-lg-6 col-md-6" style="width: 100%">
                    <h5><strong>用户列表</strong></h5>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>昵称</th>
                            <th>用户名</th>
                            <th>邮箱</th>
                            <th>查看</th>
                            <th>管理员</th>
                            <th>删除</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $index=1;
                            foreach ($users as $user){?>
                        <tr>
                            <td style="width: auto"><?php echo $index++;?></td>
                            <td style="width: auto"><?php echo $user->name;?></td>
                            <td style="width: auto"><?php echo $user->loginname;?></td>
                            <td style="width: auto"><?php echo $user->email;?></td>
                            <td style="width: auto">
                                <a href="<?php echo site_url('admin_controller/article').'?user_id='.$user->user_id;?>"class="btn btn-xs btn-info">帖子</a>
                                &nbsp;&nbsp;
                                <a href="<?php echo site_url('admin_controller/content').'?user_id='.$user->user_id;?>" class="btn btn-xs btn-warning">评论</a>
                            </td>
                            <?php if(isAdmin($user->user_id,$admin_array)===true){ ?>
                            <td style="width: auto"><a href="<?php echo site_url('admin_controller/change_admin').'?user_id='.$user->user_id;?>" class="btn btn-xs btn-success">√</a></td>
                            <?php }else{ ?>
                                <td style="width: auto"><a href="<?php echo site_url('admin_controller/change_admin').'?user_id='.$user->user_id;?>" class="btn btn-xs btn-warning">×</a></td>
                            <?php } ?>
                            <td style="width: auto"><a href="<?php echo site_url('admin_controller/del_user').'?user_id='.$user->user_id;?>" class="btn btn-xs btn-danger">删除</a></td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6" style="width: 100%">
                    <h5>他的帖子</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>题目</th>
                                <th>类别</th>
                                <th>内容提要</th>
                                <th>发布时间</th>
                                <th>审核状态</th>
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
                                        if($art->shenhe==='1'){
                                            echo '<a class="btn btn-xs btn-success">√</a>';
                                        }else{
                                            echo '<a class="btn btn-xs btn-danger">×</a>';
                                        } ?>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /. ROW  -->
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

