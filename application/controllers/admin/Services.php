<?php
class Services extends CI_Controller
{

	public $viewFolder = "";


	public function __construct()
	{
		parent::__construct();

		$this->viewFolder = "services_v";

		$this->load->model("services_model");

		/* Kullanıcı Giriş Yapmış mı_? */
		if (!getActiveUser()) {
			redirect(base_url("admin/login"));
		}
	}

	public function index()
	{
		//Tablodan verilerin getirilmesi
		$items = $this->services_model->get_all();


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
		$this->form_validation->set_rules("name", "Başlık", "required|trim");
		$this->form_validation->set_rules("time", "Süre", "required|trim");
		$this->form_validation->set_rules("primPuan", "Prim Puanı", "required|trim");
		$this->form_validation->set_rules("description", "Hizmet Açıklaması", "required|trim");
		$this->form_validation->set_rules("price", "Hizmet Fiyatı", "required|trim");

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
					"time"			=>	$this->input->post("time"),
					"primPuan"		=>	$this->input->post("primPuan"),
					"price"			=>	$this->input->post("price"),
					"description" 	=> 	$this->input->post("description"),
					"rank"			=> 	0,
					"isActive"		=>	1,
					"createdAt"		=> 	date("Y-m-d H:i:s")
				);
			} else {
				$alert = array(
					"title" => "İşlem Başarısız",
					"text" => "Kayıt Ekleme sırasında bir problem oluştu",
					"type"  => "error"
				);

				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("admin/branch/new_form"));
			}

			$insert = $this->services_model->add($data);

			if ($insert) {

				$alert = array(
					"title" => "İşlem Başarılı",
					"text" => "Kayıt başarılı bir şekilde eklendi",
					"type"  => "success"
				);
			} else {

				$alert = array(
					"title" => "İşlem Başarılı",
					"text" => "Kayıt Ekleme sırasında bir problem oluştu",
					"type"  => "error"
				);
			}

			// İşlemin Sonucunu Session'a yazma işlemi...
			$this->session->set_flashdata("alert", $alert);

			redirect(base_url("admin/services"));
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
		$item = $this->services_model->get(
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

		//Kurallar
		$this->form_validation->set_rules("name", "Başlık", "required|trim");
		$this->form_validation->set_rules("time", "Süre", "required|trim");
		$this->form_validation->set_rules("primPuan", "Prim Puanı", "required|trim");
		$this->form_validation->set_rules("description", "Hizmet Açıklaması", "required|trim");
		$this->form_validation->set_rules("price", "Hizmet Fiyatı", "required|trim");

		$this->form_validation->set_message(
			array(
				"required" => "<b><u>{field}</u></b> alanı doldurulmalıdır."
			)
		);

		$validate = $this->form_validation->run();

		if ($validate) {

			/* Resim Seçilmişse Upload */
			if ($_FILES["image_url"]["name"] !== "") {
				$file_name = converToSeo(pathinfo($_FILES["image_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["image_url"]["name"], PATHINFO_EXTENSION);

				$config["allowed_types"] 	= 	"jpg|jpeg|png";
				$config["upload_path"]   	= 	"uploads/$this->viewFolder/";
				$config["file_name"]		=	$file_name;

				$this->load->library("upload", $config);
				$upload = $this->upload->do_upload("image_url");

				if ($upload) {
					$uploaded_file = $this->upload->data("file_name");
					$data = array(
						"image_url"	=> 	$uploaded_file,
						"name"			=>	$this->input->post("name"),
						"time"			=>	$this->input->post("time"),
						"primPuan"		=>	$this->input->post("primPuan"),
						"price"			=>	$this->input->post("price"),
						"description" 	=> 	$this->input->post("description")
					);
				} else {
					$alert = array(
						"title" => "İşlem Başarısız",
						"text" => "Kayıt Ekleme sırasında bir problem oluştu",
						"type"  => "error"
					);

					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("admin/branch/updateForm/$id"));
				}
			} else {
				/* Resim Upload Edilmeden Update */
				$data = array(
					"name"			=>	$this->input->post("name"),
					"time"			=>	$this->input->post("time"),
					"primPuan"		=>	$this->input->post("primPuan"),
					"price"			=>	$this->input->post("price"),
					"description" 	=> 	$this->input->post("description")
				);
			}
			$update = $this->services_model->update(array("id" => $id), $data);

			if ($update) {
				$alert = array(
					"title" => "İşlem Başarılı",
					"text" => "Kayıt başarılı bir şekilde güncellendi",
					"type"  => "success"
				);
			} else {
				$alert = array(
					"title" => "İşlem Başarısız",
					"text" => "Kayıt güncellenemedi",
					"type"  => "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("admin/services"));
		} else {
			//Validate işlemi başarısız ise hata ekrana gönderilir.
			//Formun tekrar yüklenmesi sağlanır Validation değerleri form üzerinde gösterilmesi için gerekli.
			//Şarta göre verinin çekilmesi
			$item = $this->services_model->get(
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

		/* Hizmeti veren personelleri göster */
		$this->load->model("personel_model");
		$id = (int)$id;
		$personels = $this->personel_model->whereInColumn($id, "serviceID");
		$personelNames = [];
		foreach ($personels as $personel) {
			array_push($personelNames, $personel->name);
		}

		$personelNames = (implode(",", $personelNames));

		/* Hizmeti veren personel varsa hizmetin silinememesi  */
		if ($personelNames) {

			//echo $personelNames;
			$alert = array(
				"title" => "Personeller Tarafından Verilen Hizmet Silinemez.",
				"text" => "Personeller: $personelNames.",
				"type"  => "error"
			);
		} else {
			$delete = $this->services_model->delete(
				array(
					"id" => $id
				)
			);
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
		}
		$this->session->set_flashdata("alert", $alert);
		redirect(base_url("admin/services"));
	}

	public function isActiveSetter($id)
	{
		if ($id) {
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->services_model->update(
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
