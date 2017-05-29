<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/24
 * Time: 16:23
 */

?>
<!DOCTYPE html>
<html class="login-alone">
<head style="border-top:0;">
    <title>登陆</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/common/css/base.css?v=3.9');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/common/css/login.css?v=3.9');?>">
    <link href="<?php echo base_url('static/common/css/screen.css?v=3.9');?>" media="screen, projection" rel="stylesheet" type="text/css" >
    <?php $this->load->view('common/header-meta');?>
    <!--[if lt IE 9]>
    <script>
        window.location="homepage/support";
    </script>
    <![endif]-->
</head>
<body>
<?php $this->load->view('common/header');?>
<div class="logina-logo" style="height: 55px">
</div>
<div class="logina-main main clearfix">
    <div class="tab-con">
        <form id="form-login" method="post" action="<?php echo site_url('user_controller/login');?>">
            <div id='login-error' class="error-tip"></div>
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <th>账户</th>
                    <td width="245">
                        <input id="email" type="text" name="email" placeholder="用户名" autocomplete="off" value=""></td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <th>密码</th>
                    <td width="245">
                        <input id="password" type="password" name="password" placeholder="请输入密码" autocomplete="off">
                    </td>
                    <td>
                    </td>
                </tr>

                <tr class="find">
                    <th></th>
                    <td>
                       <!-- <div>
                            <label class="checkbox" for="chk11"><input style="height: auto;" id="chk11" type="checkbox" name="remember_me" >记住我</label>
                            <a href="passport/forget-pwd">忘记密码？</a>
                        </div>-->
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th></th>
                    <td width="245"><input class="confirm" type="submit" value="登  录"></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            <input type="hidden" name="refer" value="site/">
        </form>
    </div>
    <div class="reg">
        <p>还没有账号？<br>赶快注册一个吧！</p>
        <a class="reg-btn" href="<?php echo site_url('user_controller/go_register');?>">立即免费注册</a>
    </div>
</div>
<?php $this->load->view('common/footer');?>
<script>
    <?php
    if(isset($msg)&&$msg=='error'){
        echo 'alert("账号或密码错误");';
    }
    ?>
</script>

</body>
</html>

