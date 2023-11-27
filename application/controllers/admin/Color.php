<?php
class Color extends CI_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "color_v";

        $this->load->model("color_model");

        if (!getActiveUser()) {
            redirect(base_url("admin/login"));
        }

    }


    public function index()
    {
        $items = $this->color_model->get_all();

        //print_r($items);

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
        $this->form_validation->set_rules("color", "Renk Adı", "required|trim");

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
                "color" => $this->input->post("color"),
                "isActive" => 1,
            );

            $insert = $this->color_model->add($data);

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
            redirect(base_url("admin/color"));
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
        //Şarta göre verinin çekilmesi
        $item = $this->color_model->get(
            array(
                "id" => $id
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
        $this->form_validation->set_rules("color", "Renk Adı", "required|trim");

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
                "color" => $this->input->post("color"),
            );


            $update = $this->color_model->update(array("id" => $id), $data);

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
            redirect(base_url("admin/color"));
        } else {
            //Validate işlemi başarısız ise hata ekrana gönderilir.
            //Formun tekrar yüklenmesi sağlanır Validation değerleri form üzerinde gösterilmesi için gerekli.
            //Şarta göre verinin çekilmesi
            $item = $this->color_model->get(
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
        $delete = $this->color_model->delete(
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
        redirect(base_url("admin/color"));
    }

    public function isActiveSetter($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->color_model->update(
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