<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/26
 * Time: 13:42
 */
class role_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    /*
     * 根据用户的id获取用户的角色
     */
    public function getrolebyuserid($user_id){
        $sql='SELECT tt_role.role_id, tt_role.role,tt_role.`name` FROM `tt_role` INNER JOIN `tt_userrole` ON tt_userrole.role_id=tt_role.role_id AND tt_userrole.user_id=?';

        $result=$this->db->query($sql,array($user_id));
        $result=$result->result_array();
        return $result;
    }

    public function get_all_role(){
       $role_array= $this->db->get('role');
       return $role_array->result();
    }

    public function add_role($data){
        $this->db->insert('role',$data);
    }

    public function del_role($role_id){
        $this->db->where('role_id',$role_id);
        $this->db->delete('role');
    }

    public function add_userrole($data){
        $this->db->insert('userrole',$data);
    }

    /*
     * 根据权限代号，获取id
     */
    public function get_role_by_rolename($role){
        $this->db->where('role',$role);
        return $this->db->get('role')->result();
    }

    public function get_all_admin($admin){

        $role_id=$this->get_role_by_rolename($admin)['0']->role_id;

        $this->db->where('role_id',$role_id);
        return $this->db->get('userrole')->result();
    }

    public function del_userrole($role_id,$user_id){
        $this->db->where('role_id',$role_id);
        $this->db->where('user_id',$user_id);
        $this->db->delete('userrole');
    }

}