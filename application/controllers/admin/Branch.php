<?php
class Branch extends CI_Controller
{

	public $viewFolder = "";


	public function __construct()
	{
		parent::__construct();

		$this->viewFolder = "branch_v";

		$this->load->model("branch_model");

		/* Kullanıcı Giriş Yapmış mı_? */
		if (!getActiveUser()) {
			redirect(base_url("admin/login"));
		}
	}

	public function index()
	{
		//Tablodan verilerin getirilmesi
		$items = $this->branch_model->get_all();


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
		$this->form_validation->set_rules("name", "Şube İsmi", "required|trim");
		$this->form_validation->set_rules("adress", "Adres", "required|trim");
		$this->form_validation->set_rules("province", "İl", "required|trim");
		$this->form_validation->set_rules("district", "İlçe", "required|trim");
		$this->form_validation->set_rules("phone1", "Sabit Telefon-1", "required|trim");

		$this->form_validation->set_message(
			array(
				"required" => "<b><u>{field}</u></b> alanı doldurulmalıdır."
			)
		);

		//Form Validation Çalıştırılır. true false gelir.
		$validate = $this->form_validation->run();

		//Başarılı ise Kayıt işlemi başlar
		if ($validate) {

			//Resim Upload Süreci
			/* Dosya isminin düzenlenmesi */
			$uploaded_file = "";

			if ($_FILES["image_url"]["name"] == "") {
				$uploaded_file = "default.jpg";
				$upload=true;

			} else {
				
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
					"image_url"	=> 	$uploaded_file,
					"name"		=>	$this->input->post("name"),
					"email"		=>	$this->input->post("email"),
					"adress"	=>	$this->input->post("adress"),
					"phone1"	=>	$this->input->post("phone1"),
					"phone2" 	=> 	$this->input->post("phone2"),
					"gsm1" 		=> 	$this->input->post("gsm1"),
					"gsm2" 		=> 	$this->input->post("gsm2"),
					"province" 	=> 	$this->input->post("province"),
					"district" 	=> 	$this->input->post("district"),
					"instagram"	=> 	$this->input->post("instagram"),
					"facebook" 	=> 	$this->input->post("facebook"),
					"twitter" 	=> 	$this->input->post("twitter"),
					"pinterest"	=> 	$this->input->post("pinterest"),
					"linkedin"	=> 	$this->input->post("linkedin"),
					"mapCode"	=> 	$this->input->post("mapCode"),
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
				redirect(base_url("admin/branch/new_form"));
			}

			$insert = $this->branch_model->add($data);

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
			redirect(base_url("admin/branch"));
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
		$item = $this->branch_model->get(
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
		$this->form_validation->set_rules("name", "Şube İsmi", "required|trim");
		$this->form_validation->set_rules("adress", "Adres", "required|trim");
		$this->form_validation->set_rules("province", "İl", "required|trim");
		$this->form_validation->set_rules("district", "İlçe", "required|trim");
		$this->form_validation->set_rules("phone1", "Sabit Telefon-1", "required|trim");

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
						"name"		=>	$this->input->post("name"),
						"email"		=>	$this->input->post("email"),
						"adress"	=>	$this->input->post("adress"),
						"phone1"	=>	$this->input->post("phone1"),
						"phone2" 	=> 	$this->input->post("phone2"),
						"gsm1" 		=> 	$this->input->post("gsm1"),
						"gsm2" 		=> 	$this->input->post("gsm2"),
						"province" 	=> 	$this->input->post("province"),
						"district" 	=> 	$this->input->post("district"),
						"instagram"	=> 	$this->input->post("instagram"),
						"facebook" 	=> 	$this->input->post("facebook"),
						"twitter" 	=> 	$this->input->post("twitter"),
						"pinterest"	=> 	$this->input->post("pinterest"),
						"linkedin"	=> 	$this->input->post("linkedin"),
						"mapCode"	=> 	$this->input->post("mapCode")
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
					"name"		=>	$this->input->post("name"),
					"email"		=>	$this->input->post("email"),
					"adress"	=>	$this->input->post("adress"),
					"phone1"	=>	$this->input->post("phone1"),
					"phone2" 	=> 	$this->input->post("phone2"),
					"gsm1" 		=> 	$this->input->post("gsm1"),
					"gsm2" 		=> 	$this->input->post("gsm2"),
					"province" 	=> 	$this->input->post("province"),
					"district" 	=> 	$this->input->post("district"),
					"instagram"	=> 	$this->input->post("instagram"),
					"facebook" 	=> 	$this->input->post("facebook"),
					"twitter" 	=> 	$this->input->post("twitter"),
					"pinterest"	=> 	$this->input->post("pinterest"),
					"linkedin"	=> 	$this->input->post("linkedin"),
					"mapCode"	=> 	$this->input->post("mapCode")
				);
			}




			$update = $this->branch_model->update(array("id" => $id), $data);

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
			redirect(base_url("admin/branch"));
		} else {
			//Validate işlemi başarısız ise hata ekrana gönderilir.
			//Formun tekrar yüklenmesi sağlanır Validation değerleri form üzerinde gösterilmesi için gerekli.
			$viewData = new stdClass();
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->formError = true;
			$viewData->item = $this->branch_model->get(
				array(
					"id"    => $id,
				)
			);

			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
	}

	public function delete($id)
	{

		/* Şubede çalışan personelleri göster */
		$this->load->model("personel_model");
		$personels = $this->personel_model->whereInColumn($id, "branchID");
		$personelNames = [];
		foreach ($personels as $personel) {
			array_push($personelNames, $personel->name);
		}

		$personelNames = (implode(",", $personelNames));


		/* Çalışanlar varsa şubenin silinmemesi  */
		if ($personelNames) {
			$alert = array(
				"title" => "Personeli Bulunan Şube Silinemez.",
				"text" => "Çalışan Personeller: $personelNames.",
				"type"  => "error"
			);
		} else {
			$delete = $this->branch_model->delete(
				array(
					"id" => $id
				)
			);
			if ($delete) {
				$alert = array(
					"title" => "İşlem Başarılı",
					"text" => "Şube başarıyla silindi.",
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
		redirect(base_url("admin/branch"));
	}


	public function isActiveSetter($id)
	{
		if ($id) {
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->branch_model->update(
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
