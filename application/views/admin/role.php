
<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/26
 * Time: 15:11
 */

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

<!--头部和左部 -->
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
                    <h5><strong>角色列表</strong></h5>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>名称</th>
                            <th>权限代号</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $index=1;
                            foreach ($roles as $role){?>
                        <tr>
                            <td style="width: auto"><?php echo $index++;?></td>
                            <td style="width: auto"><?php echo $role->name;?></td>
                            <td style="width: auto"><?php echo $role->role;?></td>
                            <td style="width: auto">
                                <a class="btn btn-xs btn-danger" href="<?php echo site_url('admin_controller/del_role')?>?role_id=<?php echo $role->role_id; ?>">删除</a>
                            </td>

                        <?php }?>
                        </tbody>

                    </table>
                    <!--分页-->
                    <div class="page-header position-relative">
                        <ul class="pagination" style="float: right;padding: 15px;margin-top: 0px;">
                            <li><a >&laquo;</a></li>
                            <li class="active"><a>1</a></li>
                            <li><a>&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr style="background-color:#4e4d47;height: 5px">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <a target="_blank" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal">添加角色</a>
                </div>
            </div>

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

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel" style="font-size: 13px;">
                    <strong style="color: #00CC00">添加角色</strong>
                </h4>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 col-md-6" style="width: 95%">
                    <form class="form-horizontal" role="form" id="form" name="form" method="post" action="<?php echo site_url('admin_controller/add_role')?>">
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">角色名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  id="name" name="name" placeholder="请输入角色名称">
                                <span id="namesp" style="color:red"></span><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">权限代号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  id="role" name="role" placeholder="请输入权限代号">
                                <span id="rolesp" style="color:red"></span><br>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" onclick="addrole();">提交</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="<?php echo base_url('static/common/js/jquery-1.10.2.min.js')?>"></script>
<script src="<?php echo base_url('static/common/js/jquery-3.2.1.min.js')?>"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo base_url('static/common/js/bootstrap.min.js')?>"></script>
<!-- CUSTOM SCRIPTS -->
<script src="<?php echo base_url('static/common/js/custom.js')?>"></script>

<script type="text/javascript">
    function addrole() {
        if($("#name").val()==""){
            document.getElementById('namesp').innerHTML = '权限名称不能为空';
            $("name").focus();
            return false;
        }
        if($("#role").val()==""){
            document.getElementById('rolesp').innerHTML = '权限代号不能为空';
            $("role").focus();
            return false;
        }
        $("#form").submit();

    }

    function page(pageNum) {
        $.ajax({
            type:"GET",
            url:<?php echo site_url("admin_controller/role_list"); ?>
            data:{}
            success:function () {

                
            }
        })

    }
</script>

</body>
</html>

