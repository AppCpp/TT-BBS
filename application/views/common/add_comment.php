<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/28
 * Time: 11:25
 */?>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel" style="font-size: 13px;">
                    <strong style="color: #00CC00">发表评论</strong>
                </h4>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 col-md-6" style="width: 95%">
                    <form class="form-horizontal" role="form" id="form" name="form" method="post" action="<?php echo site_url('article_controller/add_comment')?>">
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">评论:</label>
                            <div class="col-lg-10">
                                <input id="article_id" name="article_id" type="hidden" value="<?php echo $article_datail['0']->article_id;?>" >
                                <textarea class="well well-lg" style="width: 100%;height:100px;padding: 3px" id="comment" name="comment">
                                </textarea>
                                    <span id="commentsp" style="color:red"></span><br>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" onclick="add();">发表</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>


