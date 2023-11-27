<?php
class Cars extends CI_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "cars_v";

        $this->load->model("cars_model");
        $this->load->model("type_model");
        $this->load->model("brands_model");
        
        

        if (!getActiveUser()) {
            redirect(base_url("admin/login"));
        }

    }


    public function index()
    {
        $items = $this->cars_model->get_all();

        //print_r($items);

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function new_form()
    {
        $types = $this->type_model->get_all();
        $brands = $this->brands_model->get_all();

        // var_dump($brands);
        // die();

        $viewData = new stdClass();

        //View'e gönderilecek değişkenlerin set edilmesi.
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $viewData->types = $types;
        $viewData->brands = $brands;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
    }


    public function save()
    {
        $this->load->library("form_validation");

        //Kurallar Yazılır
        $this->form_validation->set_rules("id_type", "Tür Adı", "required|trim");
        $this->form_validation->set_rules("id_brand", "Marka Adı", "required|trim");
        $this->form_validation->set_rules("name", "Model Adı", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b><u>{field}</u></b> alanı doldurulmalıdır."
            )
        );

        //Form Validation Çalıştırılır. true false gelir.
        $validate = $this->form_validation->run();

        //Başarılı ise Kayıt işlemi başlar
        if ($validate) {
            $data = array(
                "name" => $this->input->post("name"),
                "id_type" => $this->input->post("id_type"),
                "id_brands" => $this->input->post("id_brand"),
                "isActive" => 1,
            );

            $insert = $this->cars_model->add($data);

            if ($insert) {
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type" => "error"
                );
            }
            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("admin/cars"));
        } else {
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
        $types = $this->type_model->get_all();
        $brands = $this->brands_model->get_all();

        //Şarta göre verinin çekilmesi
        $item = $this->cars_model->get(
            array(
                "id" => $id
            )
        );

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $viewData->types = $types;
        $viewData->brands = $brands;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $this->load->library("form_validation");

        //Kurallar Yazılır
        $this->form_validation->set_rules("id_type", "Tür Adı", "required|trim");
        $this->form_validation->set_rules("id_brand", "Marka Adı", "required|trim");
        $this->form_validation->set_rules("name", "Model Adı", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b><u>{field}</u></b> alanı doldurulmalıdır."
            )
        );

        //Form Validation Çalıştırılır. true false gelir.
        $validate = $this->form_validation->run();

        //Başarılı ise Kayıt işlemi başlar
        if ($validate) {


            $data = array(
                "name" => $this->input->post("name"),
                "id_type" => $this->input->post("id_type"),
                "id_brands" => $this->input->post("id_brand"),
                
            );


            $update = $this->cars_model->update(array("id" => $id), $data);

            if ($update) {

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type" => "success"
                );
            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt güncelleme sırasında bir problem oluştu",
                    "type" => "error"
                );
            }

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("admin/cars"));
        } else {
            //Validate işlemi başarısız ise hata ekrana gönderilir.
            //Formun tekrar yüklenmesi sağlanır Validation değerleri form üzerinde gösterilmesi için gerekli.
            //Şarta göre verinin çekilmesi
            $item = $this->cars_model->get(
                array(
                    "id" => $id
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
        $delete = $this->cars_model->delete(
            array(
                "id" => $id
            )
        );
        if ($delete) {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt Silme işlemi başarıyla gerçekleşti.",
                "type" => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt Silme sırasında bir problem oluştu.",
                "type" => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("admin/cars"));
    }

    public function isActiveSetter($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->cars_model->update(
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