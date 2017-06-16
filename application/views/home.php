<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_name ?></title>
    <meta name="keywords" content="<?php echo $site_home; ?>"/>
    <meta name="description" content="<?php echo $site_home; ?>"/>
    <?php $this->load->view('common/header-meta'); ?>

    <style>
        body {
            position: relative;
        }

        .article {
            position: relative;
            z-index: 999;
            top: 5px;
            left: 20%;
            right: 20%;
            bottom: 0;
            border-bottom-color: #0a3551;
            border: 3px solid #8ba8af;
            background: #ffffff;
            height: 200px;
            border-radius: 20px;
            width: 60%;
            margin-bottom: 5px;

        }

    </style>
</head>
<body>

<div style="position: fixed;bottom: 20%;right: 0%;height: 10%;width: 10%">
    <b>
        <?php
        if ($this->session->userdata('user') === null) { ?>

            <a class="btn btn-info btn-lg tiezi" href="<?php echo site_url('user_controller/index'); ?>">发帖</a>
        <?php } else { ?>
            <a class="btn btn-info btn-lg tiezi" target="_blank" data-toggle="modal" data-target="#articleModal">发帖</a>
        <?php } ?>
    </b>
</div>


<?php $this->load->view('common/header'); ?>
<?php foreach ($result as $row) {
    ?>
    <div class="article" href="<?php echo site_url('article_controller/detail') ?>">
        <div class="articletitle">
            <h1 style="font-size: 20px">
                <?php echo $row->title; ?>
                <a style="font-size: 15px"
                   href="<?php echo site_url('article_controller/detail') . '?article_id=' . $row->article_id; ?>">[详情]</a>
            </h1>
            <h2><p style="font-size: 13px;position: absolute;right: 30%;top: 45px">
                    作者：<?php echo $row->createuser; ?></p>
                <p style="font-size: 13px;position: absolute;right: 2%;top: 45px">
                    时间：<?php echo $row->createtime . '<br>'; ?></p></h2>
            <hr style="background-color: #8ba8af">
        </div>

        <div class="articlecontent" style="font-size: 15px;text-align:left;">
            <?php echo mb_substr($row->content, 0, 200); ?>
            <a style="font-size: 15px"
               href="<?php echo site_url('article_controller/detail') . '?article_id=' . $row->article_id; ?>">......查看更多</a>
        </div>
    </div>
<?php } ?>

<!--分页-->
<div class="page-header position-relative">
    <ul class="pagination" style="padding: 15px;margin-top: 0px;position:absolute;left: 40%">
        <li <?php if($currentPage==='1') echo 'class="active"';?>><a  href="<?php echo site_url('home_controller/index');?>?page=1">&laquo;</a></li>
        <?php for($index=1;$index<$pageCount+1;$index++){?>
        <li <?php if($currentPage===strval($index)) echo 'class="active"';?>><a href="<?php echo site_url('home_controller/index');?>?page=<?php echo $index;?>"><?php echo $index;?></a></li>
        <?php } ?>
        <li <?php if($currentPage===strval($pageCount)) echo 'class="active"';?>><a href="<?php echo site_url('home_controller/index');?>?page=<?php echo $pageCount;?>">&raquo;</a></li>
    </ul>
</div>


<?php $this->load->view('common/add_article'); ?>
<?php /*$this->load->view('common/footer');*/ ?>
<script>
    function addarticle() {
        if ($("#title").val() == "")
        {
            document.getElementById('titlesp').innerHTML = '标题不能为空';
            $("#commtent").focus();
            return false;
        }
        if ($("#kind").val() == "") {
            document.getElementById('kindsp').innerHTML = '主题不能为空';
            $("#kind").focus();
            return false;
        }
        if ($("#content").val() == "") {
            document.getElementById('contentsp').innerHTML = '内容不能为空';
            $("#content").focus();
            return false;
        }

        $("#articleform").submit();

    }

</script>

</body>


</html>