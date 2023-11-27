<?php
class Customers extends CI_Controller
{

	public $viewFolder = "";


	public function __construct()
	{
		parent::__construct();

		$this->viewFolder = "customers_v";

		$this->load->model("customers_model");

		/* Kullanıcı Giriş Yapmış mı_? */
		if (!getActiveUser()) {
			redirect(base_url("admin/login"));
		}
	}

	public function index()
	{
		//Tablodan verilerin getirilmesi
		$items = $this->customers_model->get_all();


		//View'e gönderilecek değişkenlerin set edilmesi.
		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}


	public function new_form()
	{
		$viewData = new stdClass();

		//View'e gönderilecek değişkenlerin set edilmesi.
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}


	public function save()
	{

		$this->load->library("form_validation");

		//Kurallar Yazılır
		$this->form_validation->set_rules("name", "Müşteri İsmi", "required|trim");
		$this->form_validation->set_rules("surname", "Müşteri Soyismi", "required|trim");
		$this->form_validation->set_rules("gsm1", "Müşteri Telefonu", "required|trim");
		$this->form_validation->set_rules("email", "Müşteri Email Adresi", "required|trim");
		$this->form_validation->set_rules("password", "Müşteri Şifre ", "required|trim");

		$this->form_validation->set_message(
			array(
				"required" => "<b><u>{field}</u></b> alanı doldurulmalıdır."
			)
		);

		//Form Validation Çalıştırılır. true false gelir.
		$validate = $this->form_validation->run();

		//Başarılı ise Kayıt işlemi başlar
		if ($validate) {

			$uploaded_file = "";

			if ($_FILES["image_url"]["name"] == "") {
				$uploaded_file = "default.jpg";
				$upload = true;

			} else {
				
				//Resim Upload Süreci
				/* Dosya isminin düzenlenmesi */
				$file_name = converToSeo(pathinfo($_FILES["image_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["image_url"]["name"], PATHINFO_EXTENSION);

				$config["allowed_types"] 	= 	"jpg|jpeg|png";
				$config["upload_path"]   	= 	"uploads/$this->viewFolder/";
				$config["file_name"]		=	$file_name;

				$this->load->library("upload", $config);
				$upload = $this->upload->do_upload("image_url");
				$uploaded_file = $this->upload->data("file_name");
			}

			if ($upload) {
				$data = array(
					"image_url"		=> 	$uploaded_file,
					"name"			=>	$this->input->post("name"),
					"surname"		=>	$this->input->post("surname"),
					"birthday"		=>	$this->input->post("birthday"),
					"gender"		=>	$this->input->post("gender"),
					"description" 	=> 	$this->input->post("description"),
					"gsm1" 			=> 	$this->input->post("gsm1"),
					"gsm2" 			=> 	$this->input->post("gsm2"),
					"jobID" 		=> 	$this->input->post("jobID"),
					"email" 		=> 	$this->input->post("email"),
					"password" 		=> 	$this->input->post("password"),
					"isActive"	=>	1,
					"createdAt"	=> 	date("Y-m-d H:i:s")
				);
			} else {
				$alert = array(
					"title" => "İşlem Başarısız",
					"text" => "Kayıt Ekleme sırasında bir problem oluştu",
					"type"  => "error"
				);

				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("admin/customers/new_form"));
			}

			$insert = $this->customers_model->add($data);

			if ($insert) {

				$alert = array(
					"title" => "İşlem Başarılı",
					"text" => "Kayıt başarılı bir şekilde eklendi",
					"type"  => "success"
				);
			} else {

				$alert = array(
					"title" => "İşlem Başarısız",
					"text" => "Kayıt Ekleme sırasında bir problem oluştu",
					"type"  => "error"
				);
			}

			// İşlemin Sonucunu Session'a yazma işlemi...
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("admin/customers"));
		} else {
			//Validate işlemi başarısız ise hata ekrana gönderilir.
			//Formun tekrar yüklenmesi sağlanır Validation değerleri form üzerinde gösterilmesi için gerekli.
			$viewData = new stdClass();
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->formError = true;

			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
	}

	public function updateForm($id)
	{
		//Şarta göre verinin çekilmesi
		$item = $this->customers_model->get(
			array(
				"id"	=> $id
			)
		);

		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

	public function update($id)
	{
		$this->load->library("form_validation");

		//Kurallar Yazılır
		$this->form_validation->set_rules("name", "Personel İsmi", "required|trim");
		$this->form_validation->set_rules("surname", "Personel Soyismi", "required|trim");
		$this->form_validation->set_rules("gsm1", "Personel Telefonu", "required|trim");
		$this->form_validation->set_rules("email", "Personel Email Adresi", "required|trim");
		$this->form_validation->set_rules("password", "Personel Şifre ", "required|trim");

		$this->form_validation->set_message(
			array(
				"required" => "<b><u>{field}</u></b> alanı doldurulmalıdır."
			)
		);

		//Form Validation Çalıştırılır. true false gelir.
		$validate = $this->form_validation->run();

		//Başarılı ise Kayıt işlemi başlar
		if ($validate) {

			/* Resim Seçilmişse Upload */
			if ($_FILES["image_url"]["name"] !== "") {
				//Resim Upload Süreci
				/* Dosya isminin düzenlenmesi */
				$file_name = converToSeo(pathinfo($_FILES["image_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["image_url"]["name"], PATHINFO_EXTENSION);

				$config["allowed_types"] 	= 	"jpg|jpeg|png";
				$config["upload_path"]   	= 	"uploads/$this->viewFolder/";
				$config["file_name"]		=	$file_name;

				$this->load->library("upload", $config);
				$upload = $this->upload->do_upload("image_url");

				if ($upload) {
					$uploaded_file = $this->upload->data("file_name");
					$data = array(
						"image_url"		=> 	$uploaded_file,
						"name"			=>	$this->input->post("name"),
						"surname"		=>	$this->input->post("surname"),
						"birthday"		=>	$this->input->post("birthday"),
						"gender"		=>	$this->input->post("gender"),
						"description" 	=> 	$this->input->post("description"),
						"gsm1" 			=> 	$this->input->post("gsm1"),
						"gsm2" 			=> 	$this->input->post("gsm2"),
						"jobID" 		=> 	$this->input->post("jobID"),
						"email" 		=> 	$this->input->post("email"),
						"password" 		=> 	$this->input->post("password")
					);
				} else {
					$alert = array(
						"title" => "İşlem Başarısız",
						"text" => "Kayıt Ekleme sırasında bir problem oluştu",
						"type"  => "error"
					);

					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("admin/customers/updateForm/$id"));
				}
			} else {
				$data = array(
					"name"			=>	$this->input->post("name"),
					"surname"		=>	$this->input->post("surname"),
					"birthday"		=>	$this->input->post("birthday"),
					"gender"		=>	$this->input->post("gender"),
					"description" 	=> 	$this->input->post("description"),
					"gsm1" 			=> 	$this->input->post("gsm1"),
					"gsm2" 			=> 	$this->input->post("gsm2"),
					"jobID" 		=> 	$this->input->post("jobID"),
					"email" 		=> 	$this->input->post("email"),
					"password" 		=> 	$this->input->post("password")
				);
			}


			$update = $this->customers_model->update(array("id" => $id), $data);

			if ($update) {

				$alert = array(
					"title" => "İşlem Başarılı",
					"text" => "Kayıt başarılı bir şekilde güncellendi",
					"type"  => "success"
				);
			} else {

				$alert = array(
					"title" => "İşlem Başarısız",
					"text" => "Kayıt güncelleme sırasında bir problem oluştu",
					"type"  => "error"
				);
			}

			// İşlemin Sonucunu Session'a yazma işlemi...
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("admin/customers"));
		} else {
			//Validate işlemi başarısız ise hata ekrana gönderilir.
			//Formun tekrar yüklenmesi sağlanır Validation değerleri form üzerinde gösterilmesi için gerekli.
			//Şarta göre verinin çekilmesi
			$item = $this->customers_model->get(
				array(
					"id"	=> $id
				)
			);
			$viewData = new stdClass();
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->formError = true;
			$viewData->item = $item;


			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
	}

	public function delete($id)
	{
		$delete = $this->customers_model->delete(
			array(
				"id" => $id
			)
		);

		//TODO Alert sistemi eklenecek...
		if ($delete) {
			$alert = array(
				"title" => "İşlem Başarılı",
				"text" => "Kayıt Silme işlemi başarıyla gerçekleşti.",
				"type"  => "success"
			);
		} else {
			$alert = array(
				"title" => "İşlem Başarılı",
				"text" => "Kayıt Silme sırasında bir problem oluştu.",
				"type"  => "error"
			);
		}
		$this->session->set_flashdata("alert", $alert);
		redirect(base_url("admin/customers"));
	}


	public function isActiveSetter($id)
	{
		if ($id) {
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->customers_model->update(
				array(
					"id" => $id
				),
				array(
					"isActive" => $isActive
				)
			);
		}
	}
}
