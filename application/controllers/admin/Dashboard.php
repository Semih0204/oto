<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();

		$this->viewFolder = "dashboard_v";

		$this->load->model("dashboard_model");

		/* Kullanıcı Giriş Yapmış mı_? */
		if (!getActiveUser()) {
			redirect(base_url("admin/login"));
		}
	}



	public function index()
	{

		$item = $this->dashboard_model->get(
			array(
				"id"	=> 1
			)
		);

	


		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;

		$viewData->item = $item;


		$this->load->view("{$viewData->viewFolder}/index", $viewData);
	}
}
