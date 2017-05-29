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
            position: relative;
        }
        .article{

            position:relative; z-index:999; top:5px;left: 20%;right: 20%; bottom:0;
            border-bottom-color: #0a3551;
            border:3px solid #8ba8af;
            background: #ffffff;
            height:300px;
            border-radius: 20px;
            width: 60%;
            margin-bottom: 5px;

        }

    </style>
</head>
<body>
<?php $this->load->view('common/header');?>
<?php foreach ($result->result() as $row)
{?>
<div class="article">
    <div class="articletitle">
        <h1 style="font-size: 20px">
            <?php echo $row->title.'<br>';?>
        </h1>
        <hr style="background-color: #8ba8af">
        <h2>
                <?php echo $row->createtime.'<br>';?>
        </h2>
    </div>
    <div class="articlecontent">
        <?php echo $row->content.'<br>';?>
    </div>
</div>
    <div style=""></div>
<?php }?>

<?php /*$this->load->view('common/footer');*/?>
</body>

</html>