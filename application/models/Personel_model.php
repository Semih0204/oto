<?php

class Personel_model extends CI_Model
{

    public $tableName = "personels";

    public function __construct()
    {
        parent::__construct();
    }

    //Tüm kayıtları getirecek olan metot.
    public function get_all($where = array(), $order = "id DESC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }

    public function get_allGsm($where = array(), $colName, $order = "id DESC")
    {
        return $this->db->select($colName)->where($where)->order_by($order)->get($this->tableName)->result();
    }


    public function get_dashboard($colName)
    {
        return $this->db->select($colName)->get($this->tableName)->result();
    }

    //id'ye göre seçili olanları getirecek metot.
    public function where_in($ids)
    {
        return $this->db->where_in('id', $ids)->get($this->tableName)->result();
    }

    //id'ye göre seçili olanları getirecek metot. Metot alt kısımdaki ile güncellendi.
    //public function whereInBranch($branchID)
    //{
    //    return $this->db->where_in('branchID', $branchID)->get($this->tableName)->result();
    //}

    //id'ye göre seçili olanları getirecek metot. id interger gelirse dizi içinde arayabilir. Belirtilen kolonda gelen id değerini arar ve sonucu bir object olarak geri döndürür.
    public function whereInColumn($serviceID, $columnName)
    {
        return $this->db->where_in($columnName, array($serviceID))->get($this->tableName)->result();
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
