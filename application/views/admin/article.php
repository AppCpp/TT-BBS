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
                    <h5><strong>帖子列表</strong></h5>
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
                                        <a class="btn btn-xs btn-success" id="shenhe<?php echo $i++;?>" href="<?php echo site_url('admin_controller/cancel_shenhe')?>?article_id=<?php echo $art->article_id; ?>" >√</a>
                                    <?php }else{ ?>
                                        <a class="btn btn-xs btn-danger" id="shenhe<?php echo $i++;?>" href="<?php echo site_url('admin_controller/shenhe')?>?article_id=<?php echo $art->article_id; ?>">×</a>
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
<div class="footer">
    <div class="row">
        <div class="col-lg-12" >
            &copy Clan
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

<script>
    function check(id,type,aid) {
        var u;
        var val=$("shenhe"+aid).val();
        if(val=="√"){
            type=1;
        }else{
            type=0;
        }
        if(type==1){
            u="<?php echo site_url('admin_controller/cancel_shenhe')?>";
        }else{
            u="<?php echo site_url('admin_controller/shenhe')?>";
        }
        $.ajax(function () {
                type:"GET",
                url:u,
                data:{"article_id":id},
                datatype:"json",
                success:function (data) {
                    if(type==1){
                        $("shenhe"+aid).attr("class","btn btn-xs btn-danger");
                        $("shenhe"+aid).val("×");
                    }else{
                        $("shenhe"+aid).attr("class","btn btn-xs btn-success");
                        $("shenhe"+aid).val("√");
                    }
            }
        });

    }

</script>

</body>
</html>

