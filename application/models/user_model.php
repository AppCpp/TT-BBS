<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/24
 * Time: 15:55
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class user_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * 判断登陆的用户名和密码是否正确，登陆成功将用户信息发送到session中
     */
    public function getUserAndPsd($password,$loginname){
        $sql='SELECT `user_id`,`name`,`loginname`,`email` FROM `tt_user` WHERE `password`=? AND `loginname`=?';
        $user=$this->db->query($sql,array($password,$loginname));



        $user=$user->result_array();
        if($user!=NULL){
            date_default_timezone_set('PRC');
            $time=date('Y-m-d H:i:s');
            $this->db->set('logintime',$time,true);
            $this->db->where('user_id',$user['0']['user_id']);
            $this->db->update('user');
            $this->session->set_userdata('user',$user);
            return TRUE;
        }else{
            return FALSE;
        }
    }
    /*
     * 更新当前用户信息
     */
    public function updateuser($data){
        $this->db->replace('user', $data);
    }
    /*
     * 判断用户名是否存在（注册）
     * 存在返回false
     * 不存在返回true
     */
    public function loginname_is_exist($loginname){
        $this->db->where('loginname',$loginname);
        $result=$this->db->get('user');
        $result=$result->result();
        return empty($result);
    }


    /*
     *  插入到用户表中
     * 将用户权限赋予这个新的用户
     */
    public function register($data){
        $this->db->insert('user',$data);

        $this->db->select('*');
        $this->db->from('role');
        $this->db->where('role','user');
        $role=$this->db->get();
        $role=$role->result_array();
        $role_id=$role['0']['role_id'];
        $userdata=array(
          'userrole_id'=>md5(uniqid(mt_rand(), true)),
          'user_id'=>$data['user_id'],
          'role_id'=>$role_id
        );

        $this->db->insert('userrole',$userdata);
    }
    /*
     * 获取所有的用户（后台）
     */
    public function get_all_user(){
        $user_array=$this->db->get('user');
        return $user_array->result();
    }

    /*
     * 删除用户（后台）
     */
    public function del_user($uid){
        $this->db->where('user_id',$uid);
        $this->delete('user');
    }

    /*
     * 根据id获取用户
     */
    public function get_user_by_userid($uid){
        $this->db->where('user_id',$uid);
        return $this->db->get('user')->result();

    }
}