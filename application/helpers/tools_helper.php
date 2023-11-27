<?php
function converToSeo($text)
{
    $turkce             =    array("ç", "Ç", "ğ", "Ğ", "ı", "İ", "ö", "Ö", "ş", "Ş", "ü", "Ü");
    $convert            =    array("c", "c", "g", "g", "i", "i", "o", "o", "s", "s", "u", "u");
    $seoText            =    trim($text); //Baştaki sondaki boşlukları silelim.
    $seoText            =    mb_strtolower(str_replace($turkce, $convert, $seoText), "UTF-8");
    $seoText            =    preg_replace("/[^a-z0-9]/", "-", $seoText); //a-z 0-9 hariç hepsini -'ye çevir.
    $seoText            =    preg_replace("/-+/", "-", $seoText); //Bir veya daha fazla tekrar eden tireleri siler.
    $seoText            =    trim($seoText, "-"); //Başında veya sonundaki -'leri temizler.
    return $seoText;
}

/* Veri tabanından gelen sadece tarih verisini Gün-Ay-Yıl olarak geri döndürür. */
function dateDMY($date)
{
    $date = explode("-", $date);

    return ($date[2] . "." . $date[1] . "." . $date[0]);
}



function timeFormat($time)
{
    return date('H:i', strtotime($time));
}


/* Veri tabanından gelen zaman damgasını daha okunulabilir tarihe çevirme işlemi yapar. */
function dateTimeStamp($dateTime)
{
    $dateTime = explode(" ", $dateTime);
    $date = explode("-", $dateTime[0]);
    $time = $dateTime[1];
    $date = $date[2] . "." . $date[1] . "." . $date[0];
    $dateTime = $date . " - " . $time;
    return ($dateTime);
}


//Tüm şubeleri çekme işlemi
function getBranch()
{

    $ci = &get_instance();
    $ci->load->database();
    return  $ci->db->where("isActive=1")->get("branches")->result();

    /* eski yöntem    
    $ci = &get_instance();
    $ci->load->database();
    $sql = "SELECT * FROM `branches` ORDER BY `id` ASC ";
    $q = $ci->db->query($sql);
    return $q; 
    */
}




//Şubelerin id sinden ismini çeken helper
function getBranchName($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $branches = $ci->db->where(array("id" => $id))->get("branches")->row();
    return $branches->name;
}

/* Müşteri kayıt bölümdünde araç türünün id lerinden isimlerini getirmek için kullanılmaktadır */
function getCarTypeName($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $type = $ci->db->where(array("id" => $id))->get("type")->row();
    return $type->name;
}

function getCarBrandName($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $brand = $ci->db->where(array("id" => $id))->get("brands")->row();
    return $brand->name;
}

/* Müşterilere Mesleklerine Göre Sms Gönderme İşleminde Kullanılmaktadır. */
function getCustomerCategory()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "SELECT * FROM `customer_jobs` ORDER BY `id` ASC ";
    $q = $ci->db->query($sql);
    return $q;
}



//Personellerin id sinden ismini çeken helper
function getPersonelName($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $personel = $ci->db->where(array("id" => $id))->get("personels")->row();
    return $personel->name . " " . $personel->surname;
}

function getService()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "SELECT * FROM `services` ORDER BY `id` ASC ";
    $q = $ci->db->query($sql);
    return $q;
}

//Servislerin id sinden ismini çeken helper
function getServiceName($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $service = $ci->db->where(array("id" => $id))->get("services")->row();
    return $service->name;
}



/* Veri tabanından sirket ismi çekilerek Yönetim Paneli title üzerinde kullanılmıştır. */
function getSettings()
{
    $t = &get_instance();
    $t->load->model("setting_model");
    $settings = $t->setting_model->get();

    return $settings;
}


function getActiveUser()
{
    $t = &get_instance();

    $user = $t->session->userdata("user");
    if ($user) {
        return $user;
    } else {
        return false;
    }
}


function gsmFormat($gsm)
{
    $gsmText = preg_replace("/[()-]/", " ", $gsm);
    $gsmText = str_replace(" ", "", $gsmText);
    return $gsmText;
}

