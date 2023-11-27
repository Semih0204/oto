<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Yeni Kullanıcı Ekleme İşlemi</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Yeni Kullanıcı Bilgileri</h5>

                    <form action="<?php echo base_url("admin/users/save"); ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong>Kullanıcı Resmi</strong></label>

                            <div class="col-sm-10">
                                <input type="file" class="form-control " name="image_url">
                                <small class="form-text text-muted">Kullanıcı için resim seçiniz. jpg | jpeg | png formatları desteklenmektedir.</small>
                           
                            </div>

                        </div>

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label success"> <strong> Mail Adresi (Kullanıcı Adı)</strong></label>

                            <div class="col-sm-10">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Örn: isimsoyisim@firma.com</span>
                                    </div>
                                    <input type="email" class="form-control" name="email" 
                                    value="<?php echo isset($formError)? set_value("email") : " ";?>" 

                                    placeholder="Kullanıcı Email Adresini Yazınız.">
                                </div>
                                <small class="form-text  alert alert-danger"> <strong> Kullanıcının email adresini yazınız, email adresi sisteme giriş için gerekli kullanıcı adıdır. </strong></small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("email") ?></small>
                                <?php } ?>
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label><strong>Adı</strong></label>
                                <input type="text" class="form-control onlychar" name="name"  
                                value="<?php echo isset($formError)? set_value("name") : " ";?>" 
                                placeholder="Adını Giriniz...">
                                <small class="form-text text-muted">Kullanıcının adını yazınız.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("name") ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group col-md-6">
                                <label><strong>Soyadı</strong></label>
                                <input type="text" class="form-control onlychar" name="surname"  
                                value="<?php echo isset($formError)? set_value("surname") : " ";?>" 
                                placeholder="Soyadını Giriniz...">
                                <small class="form-text text-muted">Kullanıcının soyadını yazınız.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("surname") ?></small>
                                <?php } ?>
                            </div>

                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><strong>GSM-1</strong></label>
                                <input type="text" class="form-control phone" name="gsm1"  
                                value="<?php echo isset($formError)? set_value("gsm1") : " ";?>" 
                                placeholder="Cep Telefon Yazınız(Zorunlu Değildir).">
                                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek cep telefon numarasını giriniz.</small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("gsm1") ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label><strong>GSM-2</strong></label>
                                <input type="text" class="form-control phone" name="gsm2" 
                                value="<?php echo isset($formError)? set_value("gsm2") : " ";?>" 
                                placeholder="Cep Telefon Yazınız(Zorunlu Değildir).">
                                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek cep telefon numarasını giriniz.</small>
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label><strong> Şifre </strong></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" placeholder="Şifrenizi giriniz.">
                                </div>
                                <small class="form-text  alert alert-danger"> <strong> Kullanıcının sisteme giriş için kullanacağı şifreyi tanımlayınız(Minimum 6 - Maxsimum 10 karakter). </strong></small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("password") ?></small>
                                <?php } ?>

                            </div>

                            <div class="form-group col-md-6">
                                <label><strong> Şifre Tekrarı</strong></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="re_password" placeholder="Şifrenizi giriniz.">
                                </div>
                                <small class="form-text  alert alert-danger"> <strong> Kullanıcının sisteme giriş için kullanacağı şifreyi tekrar yazınız(Minimum 6 - Maxsimum 10 karakter). </strong></small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("re_password") ?></small>
                                <?php } ?>
                            </div>

                        </div>



                        <div class="form-group row " align="center">

                            <input type="submit" style="position: absolute;  right: 25px;" class="btn btn-outline-success  default  " value="Kaydet">

                            <a href="<?php echo base_url("admin/users") ?>" style="position: absolute;  right: 120px;" class="btn btn-outline-danger  default  "> İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>