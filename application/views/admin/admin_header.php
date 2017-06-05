<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/6/5
 * Time: 14:45
 */
?>
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
                <li <?php if($page==='index') echo 'class="active-link"'; ?>>
                    <a href="<?php echo site_url('admin_controller/index').'?user_id='.$this->session->userdata('user')['0']['user_id'];?>" ><i class="fa fa-gear fa-2x"></i>系统管理 <span class="badge">网站</span></a>
                </li>
                <li <?php if($page==='article') echo 'class="active-link"'; ?>>
                    <a href="<?php echo site_url('admin_controller/article')?>"><i class="fa fa-table fa-2x "></i>帖子管理  <span class="badge">论坛</span></a>
                </li>
                <li <?php if($page==='user') echo 'class="active-link"'; ?>>
                    <a href="<?php echo site_url('admin_controller/user_list')?>"><i class="fa fa-users fa-2x"></i>用户管理  <span class="badge">权限</span></a>
                </li>
                <li <?php if($page==='role') echo 'class="active-link"'; ?>>
                    <a href="<?php echo site_url('admin_controller/role_list')?>"><i class="fa fa-key fa-2x"></i>角色管理  <span class="badge"></span></a>
                </li>
                <li <?php if($page==='record') echo 'class="active-link"'; ?>>
                    <a href="<?php echo site_url('admin_controller/del_article_record')?>"><i class="fa fa-bar-chart-o fa-2x"></i>删帖记录  <span class="badge"></span></a>
                </li>
            </ul>
        </div>

    </nav>
