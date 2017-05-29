<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/26
 * Time: 0:10
 */?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>个人中心</title>
    <?php $this->load->view('common/header-meta');?>

</head>
<body style="align-content: center">

<?php $this->load->view('common/header');?>
<div style="height: 100%;">
    <center>
        <form class="bs-example bs-example-form" role="form" id="regform" method="post" action="<?php echo site_url('user_controller/update')?>" style="margin-top: 0;">
            <img src="<?php echo base_url('static/images/touxiang.jpg');?>" style="width: 150px;height: 150px;margin-bottom: 30px;background-color: #9399a2">

            <div class="input-group">
                <span id="namesp" style="color:red"></span><br>
                <input type="hidden" class="form-control" name="name" id="name" value="<?php echo $this->session->userdata('user')['0']['user_id'];?>" placeholder="昵称" style="width: 250px;height: 40px">
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $this->session->userdata('user')['0']['name'];?>" placeholder="昵称" style="width: 250px;height: 40px">

            </div>
            <div class="input-group" >
                <span id="loginnamesp" style="color:red"></span><br>
                <input type="text"  class="form-control" name="loginname" id="loginname" value="<?php echo $this->session->userdata('user')['0']['loginname'];?>" placeholder="用户名" style="width: 250px;height: 40px">

            </div>
            <div class="input-group">
                <span id="emailsp" style="color:red"></span><br>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $this->session->userdata('user')['0']['email'];?>" placeholder="邮箱" style="width: 250px;height: 40px">

            </div>
            <div class="input-group">
                <span id="pwdsp" style="color:red"></span><br>
                <input type="password" class="form-control" name="pwd" id="pwd" value="" placeholder="密码" style="width: 250px;height: 40px">

            </div>
            <div class="input-group">
                <span id="pwd2sp" style="color:red"></span><br>
                <input type="password" class="form-control" name="pwd2" id="pwd2" value="" placeholder="密码" style="width: 250px;height: 40px">

            </div>
            <br>
            <div class="button">
                <input type="button" onclick="register();" value="保存修改" style="width: 250px;height: 40px;background-color: #ff972c;border-radius: 5px;border: 3px">

            </div>
        </form></center>
</div>
<script>
    function register() {
        if($("#name").val()==""){
            document.getElementById('namesp').innerHTML = '昵称不能为空';
            $("name").focus();
            return false;
        }
        if($("#loginname").val()==""){
            document.getElementById('loginnamesp').innerHTML = '用户名不能为空';
            $("#loginname").focus();
            return false;
        }
        if($("#email").val()==""){
            document.getElementById('emailsp').innerHTML = '邮箱不能为空';
            $("#email").focus();
            return false;
        }
        if($("#pwd").val()==""){
            document.getElementById('pwdsp').innerHTML = '密码不能为空';
            $("#pwd").focus();
            return false;
        }
        if($("#pwd2").val()==""){
            document.getElementById('pwd2sp').innerHTML = '密码不能为空';
            $("#pwd2").focus();
            return false;
        }
        if($("#pwd2").val()!=$("#pwd").val()){
            document.getElementById('pwd2sp').innerHTML = '密码不同';
            $("#pwd2").focus();
            return false;
        }
        $("#regform").submit();
    }


</script>

</body>
</html>
