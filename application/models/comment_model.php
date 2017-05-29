<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/25
 * Time: 1:04
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class comment_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * 根据帖子id获取帖子评论
     */
    public function get_comment_by_articleid($articleid){
        $this->db->where('article_id',$articleid);
        $this->db->order_by('floor');
        return $this->db->get('comment')->result();
    }
    /*
     * 添加帖子评论
     */
    public function add_comment($data){
        $this->db->insert('comment',$data);
    }
    /*
     * 删除帖子评论
     */
    public function del_comment($comment_id){
        $this->db->where('comment_id',$comment_id);
        $this->db->delete('comment');
    }

    /*
     * 获取最高的楼层
     */
    public function get_top_floor($art_id){
        $this->db->where('article_id',$art_id);
        $this->db->order_by('floor','desc');
        $result=$this->db->get('comment')->result();

        return $result['0']->floor;

    }
}

?>

