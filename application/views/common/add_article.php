<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/28
 * Time: 11:25
 */?>
<!-- 模态框（Modal） -->
<div class="modal fade" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel" style="font-size: 13px;">
                    <strong style="color: #00CC00">帖子</strong>
                </h4>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 col-md-6" style="width: 95%">
                    <form class="form-horizontal" role="form" id="articleform" name="articleform" method="post" action="<?php echo site_url('article_controller/add_article')?>">
                        <div class="form-group">

                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">标题</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  id="title" name="title" placeholder="请输入标题">
                                    <span id="titlesp" style="color:red"></span><br>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">主题</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  id="kind" name="kind" placeholder="请输入主题">
                                    <span id="kindsp" style="color:red"></span><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">内容</label>
                                <div class="col-lg-10">
                                    <textarea class="well well-lg" style="width: 100%;height:300px;padding: 3px" id="content" name="content">
                                    </textarea>
                                        <span id="contentsp" style="color:red"></span><br>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" onclick="addarticle();">发表</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>


