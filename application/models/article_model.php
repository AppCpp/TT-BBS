<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/24
 * Time: 19:07
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class article_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();

    }

    /*
     * 获取所有的帖子 包括已审核 未审核的帖子（后台）
     */
    public function get_all_article(){
        $this->db->order_by('createtime','desc');
        return $this->db->get('article')->result();
    }

    /**根据帖子的审核 和 未审核的状态获取相对于的帖子
     * @param $status
     * @param $page
     * @param $prePage
     * @return mixed
     */
    public function article_by_status($status,$page,$prePage){
        $page=$page-1;
        $page=$page*$prePage;
        $this->db->where('shenhe',$status);
        $this->db->limit($prePage,$page);
        return $this->db->get('article')->result();
    }

    /*
     * 获取审核的帖子的数量
     */
    public function get_page_count(){
        $this->db->where('shenhe','1');
        return $this->db->count_all_results('article');
    }

    /*
     * 根据用户Id查询文章
     */
    public function getarticlebyuserid($uid){
        $this->db->where('user_id',$uid);
        $this->db->order_by('createtime','desc');
        return $this->db->get('article')->result();
    }

    /*
     * 根据帖子的id获取帖子内容
     */
    public function get_article_byid($articleid){

        $this->db->where('article_id',$articleid);
        $atr=$this->db->get('article')->result();
        return $atr;
    }

    /*
     * 删除帖子，在删除帖子之前
     * 添加帖子删除记录
     */
    public function del_article($article_id){
        $article=$this->get_article_byid($article_id);

        $title=$article['0']->title;

        date_default_timezone_set('PRC');
        $time=date('Y-m-d H:i:s');
        $data=array(
            'id'=>md5(uniqid(mt_rand(), true)),
            'title'=>$title,
            'deluser'=>$_SESSION['user']['0']['name'],
            'deltime'=>$time
        );
        $this->db->insert('del',$data);

        $this->db->where('article_id',$article_id);
        $this->db->delete('article');
    }

    /*
     * 新增帖子
     */
    public function add_article($data){
        $this->db->insert('article',$data);
    }
    /*
     * 更改帖子的审核状态
     */
    public function change_status($status,$id){
        $this->db->where('article_id',$id);
        $this->db->update('article',array('shenhe'=>$status));
    }

}
?>