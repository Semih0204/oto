<?php

class UserOperations extends CI_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users_v";
        $this->load->model("user_model");
    }

    public function login()
    {
        /* Kullanıcı giriş yaptıysa tekrar login sayfasına giriş yapamasın. */
        if (getActiveUser()) {
            redirect(base_url("admin"));
        }

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function doLogin()
    {
        /* Kullanıcı giriş yaptıysa tekrar login sayfasına giriş yapamasın. */
        if (getActiveUser()) {
            redirect(base_url('admin'));
        }

        $this->load->library("form_validation");

        //Kurallar Yazılır
        $this->form_validation->set_rules("password", "Şifre", "required|trim");
        $this->form_validation->set_rules("email", "Email Adresi (Kullanıcı Adı)", "required|valid_email|trim");


        $this->form_validation->set_message(
            array(
                "required"       => "<b><u>{field}</u></b> alanı doldurulmalıdır.",
                "valid_email"    => "<b><u>Lütfen geçerli bir email adresi giriniz.</u></b>.",
            )
        );

        //Form Validation Çalıştırılır. true false gelir.
        if ($this->form_validation->run() == FALSE) {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->formError = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {


            $user = $this->user_model->get(array(
                "email"     => $this->input->post("email"),
                "password"  => md5($this->input->post("password")),
                "isActive"  => 1
            ));

            if ($user) {

                //Kullanıcı girişi yapıldı.

                $alert = array(
                    "title" =>  "Giriş İşlemi Başarılı",
                    "text"  =>  "$user->name  $user->surname TrendAsist Yönetim Paneline Hoşgeldiniz",
                    "type"  =>  "success"
                );

                $this->session->set_flashdata("alert", $alert);
                $this->session->set_userdata("user", $user);

                redirect(base_url("admin"));
            } else {
                //Kullanıcı veri tabanında yok.
                $alert = array(
                    "title" =>  "Giriş İşlemi Başarısız",
                    "text"  =>  "Lütfen bilgilerinizi kontrol ediniz.",
                    "type"  =>  "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("admin/login"));
            }
        }
    }

    public function logout()
    {
        /* Session icerisindeki değerin silinmesi. */
        $this->session->unset_userdata("user");
        redirect(base_url("admin/login"));
    }

    public function forgetPass()
    {
        /* Kullanıcı giriş yaptıysa tekrar login sayfasına giriş yapamasın. */
        if (getActiveUser()) {
            redirect(base_url('admin'));
        }

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "forgetPass";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function resetPass()
    {
        $this->load->library("form_validation");

        //Kurallar Yazılır
        $this->form_validation->set_rules("email", "Email Adresi (Kullanıcı Adı)", "required|valid_email|trim");

        $this->form_validation->set_message(
            array(
                "required"       => "<b><u>{field}</u></b> alanı doldurulmalıdır.",
                "valid_email"    => "<b><u>Lütfen geçerli bir email adresi giriniz.</u></b>.",
            )
        );

        /* Doğru e-posta girilmiş mi_? */
        if ($this->form_validation->run() === FALSE) {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "forgetPass";
            $viewData->formError = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {
            $user = $this->user_model->get(
                array(
                    "isActive"   => 1,
                    "email"      => $this->input->post("email")
                )
            );

            /* Kullanıcı Varsa */
            if ($user) {

                $this->load->helper("string");
                $tempPass = random_string();

                $subject = "TrendAsist Kullanıcı Şifresi Sıfırlama";

                $message = "TrendAsist Yönetim Paneline giriş için geçici şifreniz aşağıda belirtilmiştir.<br><br><br> Geçici Şifreniz: <b>$tempPass</b>";

                $send = sendEmail($user->email, $subject, $message);



                if ($send) {
                    /* Mail gönderildikten sonra kullanıcının şifresinin üretilen gecici şifreyle değiştirilmesi */
                    $this->user_model->update(
                        array("id" => $user->id),
                        array("password" => md5($tempPass))
                    );

                    $alert = array(
                        "title" =>  "İşlem Başarılı.",
                        "text"  =>  "Şifreniz başarıyla değiştirildi, Lütfen email'lerinizi kontrol ediniz.",
                        "type"  =>  "succes"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("admin/login"));
                    die();
                } else {
                    /*echo $this->email->print_debugger(); */
                    $alert = array(
                        "title" =>  "İşlem Başarısız",
                        "text"  =>  "E-Mail gönderilirken bir hata oluştu lütfen sistem yöneticisi ile görüşünüz.",
                        "type"  =>  "error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("admin/sifremi-sifirla"));
                    die();
                }
            } else {
                $alert = array(
                    "title" =>  "İşlem Başarısız",
                    "text"  =>  "Lütfen bilgilerinizi kontrol ediniz.",
                    "type"  =>  "warning"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("admin/sifremi-sifirla"));
            }
        }
    }
}
