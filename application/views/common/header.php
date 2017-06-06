
<div style="align-content: center;width: 80%;margin-left: 10%;border-radius:15px ">
    <ul class="nav nav-pills nav-justified" style="background-color:#91baff;border-radius:5px">
        <li class="active"><a href="<?php echo site_url('home_controller/index')?>"><?php echo $site_name;?></a></li>
        <li><a href="<?php echo site_url('home_controller/index')?>">主页</a></li>
        <li><a href="<?php echo site_url('article_controller/myarticle').'?user_id='.$this->session->userdata('user')['0']['user_id'];?>">我的帖子</a></li>
        <li><a href="<?php echo site_url('user_controller/info').'?user_id='.$this->session->userdata('user')['0']['user_id'];?>">个人中心</a></li>
        <?php
        if($this->session->userdata('user')!=NULL){?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('user')['0']['name'];?>
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" style="float: left">
                    <?php if(isAdmin()===true) {?>
                    <li><a href="<?php echo site_url('admin_controller/index');?>?user_id=<?php echo $this->session->userdata('user')['0']['user_id'];?>">后台管理</a></li>
                    <?php } ?>
                    <li>
                        <a href="<?php echo site_url('user_controller/info').'?user_id='.$this->session->userdata('user')['0']['user_id'];?>">个人信息</a></li>
                    <li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo site_url('user_controller/loginout');?>">退出</a></li>
                </ul>
            </li>

        <?php }else{ ?>
            <li><a href="<?php echo site_url('user_controller/index');?>">登陆</a></li>
            <?php }?>
    </ul>
</div>
<?php
    /*
    *判断是否为管理员
    */
     function isAdmin(){
        $role=$_SESSION['role'];
        foreach ($role as $row){
            if($row['role']==='admin'){
                return true;
            }
        }
        return false;
    }

?>