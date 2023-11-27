<?php
class Customer_model extends CI_Model
{

    public $tableName = "customer";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        return $this->db->get($this->tableName)->result();
    }
    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }
    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }


}