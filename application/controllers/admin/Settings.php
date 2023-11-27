<?php
class Settings extends CI_Controller
{

	public $viewFolder = "";


	public function __construct()
	{
		parent::__construct();

		$this->viewFolder = "settings_v";

		$this->load->model("setting_model");
		
		/* Kullanıcı Giriş Yapmış mı_? */
		if (!getActiveUser()) {
			redirect(base_url("admin/login"));
		}
	}

	public function index()
	{
		//Tablodan verilerin getirilmesi
		$item = $this->setting_model->get();
		//View'e gönderilecek değişkenlerin set edilmesi.

		$viewData = new stdClass();

		if ($item) {
			$viewData->subViewFolder = "update";
		} else {
			$viewData->subViewFolder = "no_content";
		}

		$viewData->viewFolder = $this->viewFolder;
		$viewData->item = $item;

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
		if ($_FILES["logo_url"]["name"] == "") {
			$alert = array(
				"title" => "İşlem Başarısız",
				"text" => "Lütfen bir resim seçiniz.",
				"type"  => "error"
			);

			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("admin/settings/new_form"));
		}

		$this->load->library("form_validation");

		//Kurallar Yazılır
		$this->form_validation->set_rules("companyName", "Şirket Adı", "required|trim");
		$this->form_validation->set_rules("phone1", "Telefon-1", "required|trim");
		$this->form_validation->set_rules("adress", "Adres", "required|trim");
		$this->form_validation->set_rules("email", "E-posta", "required|trim");
		$this->form_validation->set_rules("phone1", "Sabit Telefon-1", "required|trim");

		$this->form_validation->set_message(
			array(
				"required" 		=> "<b><u>{field}</u></b> alanı doldurulmalıdır.",
			)
		);

		//Form Validation Çalıştırılır. true false gelir.
		$validate = $this->form_validation->run();

		//Başarılı ise Kayıt işlemi başlar
		if ($validate) {

			//Resim Upload Süreci
			/* Dosya isminin düzenlenmesi */
			$file_name = converToSeo(pathinfo($_FILES["logo_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["logo_url"]["name"], PATHINFO_EXTENSION);

			$config["allowed_types"] 	= 	"jpg|jpeg|png";
			$config["upload_path"]   	= 	"uploads/$this->viewFolder/";
			$config["file_name"]		=	$file_name;

			$this->load->library("upload", $config);
			$upload = $this->upload->do_upload("logo_url");

			if ($upload) {
				$uploaded_file = $this->upload->data("file_name");
				$data = array(
					"companyName"	=>	$this->input->post("companyName"),
					"logo_url"		=> 	$uploaded_file,
					"email"			=>	$this->input->post("email"),
					"slogan"		=>	$this->input->post("slogan"),
					"mission"		=>	$this->input->post("mission"),
					"vision"		=>	$this->input->post("vision"),
					"phone1"		=>	$this->input->post("phone1"),
					"phone2" 		=> 	$this->input->post("phone2"),
					"fax1"			=>	$this->input->post("fax1"),
					"fax2" 			=> 	$this->input->post("fax2"),
					"gsm1" 			=> 	$this->input->post("gsm1"),
					"gsm2" 			=> 	$this->input->post("gsm2"),
					"adress"		=>	$this->input->post("adress"),
					"province" 		=> 	$this->input->post("province"),
					"district" 		=> 	$this->input->post("district"),
					"workingHours" 	=> 	$this->input->post("workingHours"),
					"instagram"		=> 	$this->input->post("instagram"),
					"facebook" 		=> 	$this->input->post("facebook"),
					"twitter" 		=> 	$this->input->post("twitter"),
					"pinterest"		=> 	$this->input->post("pinterest"),
					"linkedin"		=> 	$this->input->post("linkedin"),
					"title"			=> 	$this->input->post("title"),
					"url"			=> 	$this->input->post("url"),
					"description"	=> 	$this->input->post("description"),
					"keywords"		=> 	$this->input->post("keywords"),
					"author"		=> 	$this->input->post("author"),
					"googleMap"		=> 	$this->input->post("googleMap"),
					"googleAnalystic"	=> 	$this->input->post("googleAnalystic"),
					"createdAt"		=> 	date("Y-m-d H:i:s")
				);
			} else {
				$alert = array(
					"title" => "İşlem Başarısız",
					"text" => "Kayıt Ekleme sırasında bir problem oluştu",
					"type"  => "error"
				);

				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("admin/settings/new_form"));
			}

			$insert = $this->setting_model->add($data);

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
			redirect(base_url("admin/settings"));
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
		$item = $this->setting_model->get(
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
		$this->form_validation->set_rules("companyName", "Şirket Adı", "required|trim");
		$this->form_validation->set_rules("phone1", "Telefon-1", "required|trim");
		$this->form_validation->set_rules("adress", "Adres", "required|trim");
		$this->form_validation->set_rules("email", "E-posta", "required|trim");
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
			if ($_FILES["logo_url"]["name"] !== "") {
				//Resim Upload Süreci
				/* Dosya isminin düzenlenmesi */
				$file_name = converToSeo(pathinfo($_FILES["logo_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["logo_url"]["name"], PATHINFO_EXTENSION);

				$config["allowed_types"] 	= 	"jpg|jpeg|png";
				$config["upload_path"]   	= 	"uploads/$this->viewFolder/";
				$config["file_name"]		=	$file_name;

				$this->load->library("upload", $config);
				$upload = $this->upload->do_upload("logo_url");

				if ($upload) {
					$uploaded_file = $this->upload->data("file_name");
					$data = array(
						"logo_url"		=> 	$uploaded_file,
						"companyName"	=>	$this->input->post("companyName"),
						"email"			=>	$this->input->post("email"),
						"slogan"		=>	$this->input->post("slogan"),
						"mission"		=>	$this->input->post("mission"),
						"vision"		=>	$this->input->post("vision"),
						"phone1"		=>	$this->input->post("phone1"),
						"phone2" 		=> 	$this->input->post("phone2"),
						"fax1"			=>	$this->input->post("fax1"),
						"fax2" 			=> 	$this->input->post("fax2"),
						"gsm1" 			=> 	$this->input->post("gsm1"),
						"gsm2" 			=> 	$this->input->post("gsm2"),
						"adress"		=>	$this->input->post("adress"),
						"province" 		=> 	$this->input->post("province"),
						"district" 		=> 	$this->input->post("district"),
						"workingHours" 	=> 	$this->input->post("workingHours"),
						"instagram"		=> 	$this->input->post("instagram"),
						"facebook" 		=> 	$this->input->post("facebook"),
						"twitter" 		=> 	$this->input->post("twitter"),
						"pinterest"		=> 	$this->input->post("pinterest"),
						"linkedin"		=> 	$this->input->post("linkedin"),
						"title"			=> 	$this->input->post("title"),
						"url"			=> 	$this->input->post("url"),
						"description"	=> 	$this->input->post("description"),
						"keywords"		=> 	$this->input->post("keywords"),
						"author"		=> 	$this->input->post("author"),
						"googleMap"		=> 	$this->input->post("googleMap"),
						"googleAnalystic"	=> 	$this->input->post("googleAnalystic")
					);
				} else {
					$alert = array(
						"title" => "İşlem Başarısız",
						"text" => "Kayıt Ekleme sırasında bir problem oluştu",
						"type"  => "error"
					);

					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("admin/settings/updateForm/$id"));
				}
			} else {
				$data = array(
					"companyName"	=>	$this->input->post("companyName"),
					"email"			=>	$this->input->post("email"),
					"slogan"		=>	$this->input->post("slogan"),
					"mission"		=>	$this->input->post("mission"),
					"vision"		=>	$this->input->post("vision"),
					"phone1"		=>	$this->input->post("phone1"),
					"phone2" 		=> 	$this->input->post("phone2"),
					"fax1"			=>	$this->input->post("fax1"),
					"fax2" 			=> 	$this->input->post("fax2"),
					"gsm1" 			=> 	$this->input->post("gsm1"),
					"gsm2" 			=> 	$this->input->post("gsm2"),
					"adress"		=>	$this->input->post("adress"),
					"province" 		=> 	$this->input->post("province"),
					"district" 		=> 	$this->input->post("district"),
					"workingHours" 	=> 	$this->input->post("workingHours"),
					"instagram"		=> 	$this->input->post("instagram"),
					"facebook" 		=> 	$this->input->post("facebook"),
					"twitter" 		=> 	$this->input->post("twitter"),
					"pinterest"		=> 	$this->input->post("pinterest"),
					"linkedin"		=> 	$this->input->post("linkedin"),
					"title"			=> 	$this->input->post("title"),
					"url"			=> 	$this->input->post("url"),
					"description"	=> 	$this->input->post("description"),
					"keywords"		=> 	$this->input->post("keywords"),
					"author"		=> 	$this->input->post("author"),
					"googleMap"		=> 	$this->input->post("googleMap"),
					"googleAnalystic"	=> 	$this->input->post("googleAnalystic")
				);
			}




			$update = $this->setting_model->update(array("id" => $id), $data);

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
			redirect(base_url("admin/settings"));
		} else {
			//Validate işlemi başarısız ise hata ekrana gönderilir.
			//Formun tekrar yüklenmesi sağlanır Validation değerleri form üzerinde gösterilmesi için gerekli.
			//Şarta göre verinin çekilmesi
			$item = $this->setting_model->get(
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
}
