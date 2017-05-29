<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_name?> - <?php echo $site_name;?></title>
    <meta name="keywords" content="<?php echo $site_home;?>" />
    <meta name="description" content="<?php echo $site_home;?>" />
    <?php $this->load->view('common/header-meta');?>

    <style>
        body{
            position: absolute;
        }
        .art1{
            position:relative; top:5px;left: 26%;right: 0; bottom:0;
            height:100%;
            width: 60%;
        }
        .art2{

        }
        .cont{
            height: 150px;
        }
        .tiezi{
            height: 100%;font-size:large;width: 100%;color: black;text-align: center;
        }

    </style>
</head>
<body>
<?php $this->load->view('common/header');?>
<div style="position: fixed;bottom: 50%;right: 0%;height: 10%;width: 14%">
    <b>
        <!--<a class="btn btn-success btn-lg tiezi" href="<?php /*echo site_url('article_controller/add_comment'); */?>?article+id=<?php /*echo $article_datail['0']->article_id; */?>">发表评论</a>-->
        <a class="btn btn-success btn-lg tiezi" target="_blank" data-toggle="modal" data-target="#myModal">发表评论</a>
    </b>
</div>

<div style="position: fixed;bottom: 20%;right: 0%;height: 10%;width: 10%">
    <b>
        <a class="btn btn-info btn-lg tiezi" target="_blank" data-toggle="modal" data-target="#articleModal">发帖</a>
    </b>
</div>



<div class="art1">
<div class="row" style="margin-bottom: 3px">
    <div class="col-lg-4 col-md-4" style="float: left; width: 20%;margin-right: -3%">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                版主
            </div>
            <div class="panel-body">
                <p>
                    <p>作者：<?php echo $article_datail['0']->createuser;?></p>
                    <p>时间：<br><?php echo $article_datail['0']->createtime;?></p>
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4" style="width: 70%;">
        <div class="panel panel-primary"  style="margin-bottom: 3px">
            <div class="panel-heading">
                <?php echo $article_datail['0']->title;?>
            </div>
            <div class="panel-body">
                <p><?php echo $article_datail['0']->content;?></p>
            </div>
        </div>
    </div>
</div>
    <!--楼层-->
    <?php
    $floor=1;
    foreach ($article_comment as $art){?>
<div class="row" style="margin-top: -3%">
    <div class="col-lg-4 col-md-4" style="float: left;width: 20%;margin-right: -3%;">
        <div class="panel panel-primary cont" style="margin-bottom: 3px">
            <div class="panel-heading">
                <?php echo $art->floor;;?>楼
            </div>
            <div class="panel-body">
                <p><br><?php echo $art->user_name; ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4" style="width: 70%; margin-bottom: 0">
        <div class="panel panel-primary" style="margin-bottom: 3px">
            <!--<div class="panel-heading" >
                <?php /*echo $floor++;*/?>楼
            </div>-->
            <div class="panel-body cont" style="text-align: left">
                <p><?php echo $art->comment_text;?></p>
            </div>
        </div>
    </div>
</div>
<?php } ?>
</div>
<?php $this->load->view('common/add_comment');?>
<?php $this->load->view('common/add_article');?>
<script type="text/javascript">
    function add() {
        if($("#comment").val()==""){
            document.getElementById('commentsp').innerHTML = '内容不能为空';
            $("#commtent").focus();
            return false;
        }
        $("#form").submit();
        //window.location.reload();
    }
    function addarticle() {
        if($("#title").val()==""){
            document.getElementById('titlesp').innerHTML = '标题不能为空';
            $("#commtent").focus();
            return false;
        }
        if($("#kind").val()==""){
            document.getElementById('kindsp').innerHTML = '主题不能为空';
            $("#kind").focus();
            return false;
        }
        if($("#content").val()==""){
            document.getElementById('contentsp').innerHTML = '内容不能为空';
            $("#content").focus();
            return false;
        }

        $("#articleform").submit();

    }
</script>

</body>

</html>