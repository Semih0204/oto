<?php

class Branch_model extends CI_Model
{

    public $tableName = "branches";

    public function __construct()
    {
        parent::__construct();
    }

    //Tüm kayıtları getirecek olan metot.
    public function get_all($where = array(),$order = 'id DESC')
    {
        return $this->db->order_by($order)->where($where)->get($this->tableName)->result();
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
