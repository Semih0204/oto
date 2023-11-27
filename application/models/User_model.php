<?php

class User_model extends CI_Model
{

    public $tableName = "users";

    public function __construct()
    {
        parent::__construct();
    }

    //Tüm kayıtları getirecek olan metot.
    public function get_all($where = array(),$order = "id ASC")
    {
        return $this->db->where($where)->get($this->tableName)->result();
    }

    public function get_all_selected_col($colname,$where = array(),$order = "id ASC")
    {
        return $this->db->select($colname)->where($where)->get($this->tableName)->result();
    }




    //Tüm sadece bir kayıt getirecek olan metot.
    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    //Veri tabanına kayıt ekleme işlemi için veriyi dizi olarak gönderip tablo adını ve veriyi belirterek insert metoduyla eklenir.
    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    //Veri güncelleme
    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }


    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }
}
