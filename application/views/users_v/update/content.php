<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Kullanıcı Düzenleme İşlemi</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4"><span class="span-color-blue "> <?php echo $item->name . " " . $item->surname; ?></span> İsimli Kullanıcının Bilgilerini Düzenliyorsunuz</h5>

                    <form action="<?php echo base_url("admin/users/update/$item->id"); ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong>Kullanıcı Resmi</strong></label>

                            <div class="col-sm-6">
                                <input type="file" class="form-control " name="image_url">
                                <small class="form-text text-muted">Kullanıcı için resim seçiniz. jpg | jpeg | png formatları desteklenmektedir.</small>
                            </div>
                            <div class="col-sm-4">
                                <img width="240px" src="<?php echo base_url("uploads/$viewFolder/$item->image_url") ?>" alt="<?php echo converToSeo($item->name . " " . $item->surname); ?>" class="img-responsive">
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
                                    value="<?php echo isset($formError) ? set_value("email") : $item->email; ?>" 
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
                                value="<?php echo isset($formError) ? set_value("name") : $item->name; ?>" 
                                placeholder="Adını Giriniz...">
                                <small class="form-text text-muted">Kullanıcının adını yazınız.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("name") ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group col-md-6">
                                <label><strong>Soyadı</strong></label>
                                <input type="text" class="form-control onlychar" name="surname" 
                                value="<?php echo isset($formError) ? set_value("surname") : $item->surname; ?>" 
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
                                value="<?php echo isset($formError) ? set_value("gsm1") : $item->gsm1; ?>" 
                                placeholder="Cep Telefon Yazınız(Zorunlu Değildir).">
                                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek cep telefon numarasını giriniz.</small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("gsm1") ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label><strong>GSM-2</strong></label>
                                <input type="text" class="form-control phone" name="gsm2" 
                                value="<?php echo isset($formError) ? set_value("gsm2") : $item->gsm2; ?>" 
                                placeholder="Cep Telefon Yazınız(Zorunlu Değildir).">
                                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek cep telefon numarasını giriniz.</small>
                            </div>

                        </div>

                        <div class="form-group row " align="center">

                            <input type="submit" style="position: absolute;  right: 25px;" class="btn btn-outline-success  default  " value="Güncelle">

                            <a href="<?php echo base_url("admin/users") ?>" style="position: absolute;  right: 120px;" class="btn btn-outline-danger  default  "> İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>