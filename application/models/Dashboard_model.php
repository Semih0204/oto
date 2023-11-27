<?php

class Dashboard_model extends CI_Model
{

    public $tableName = "report_dashboard";

    public function __construct()
    {
        parent::__construct();
    }


    //Tüm sadece bir kayıt getirecek olan metot.
    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }
    
}
