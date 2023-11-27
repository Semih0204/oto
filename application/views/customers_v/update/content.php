<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Müşteri Düzenleme İşlemi</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4"><span class="span-color-blue "> <?php echo $item->name . " " . $item->surname; ?></span> İsimli Personelin Bilgilerini Düzenliyorsunuz</h5>

                    <form action="<?php echo base_url("admin/customers/update/$item->id"); ?>" method="POST" enctype="multipart/form-data">

                        <small class="form-text  alert alert-info"> <strong> Müşteriler sistem üzerinden bir defa randevu aldıklarında otomatik olarak veritabanına eklenmektedir. Bir GSM-1 numarası ile sadece bir müşteri kayıt olabilir. Müşteri ilk randevusunu başarıyla tamamladığında veritabanına şifresi GSM-1 olarak atanır. Sonrasında kendi panelinden veya güncelleme alanından değiştirilebilir.</strong></small>

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong>Müşteri Resmi</strong></label>

                            <div class="col-sm-6">
                                <input type="file" class="form-control " name="image_url">
                                <small class="form-text text-muted">Müşteri için resim seçiniz. jpg | jpeg | png formatları desteklenmektedir.</small>
                            </div>
                            <div class="col-sm-4">
                                <img width="240px" src="<?php echo base_url("uploads/$viewFolder/$item->image_url") ?>" alt="<?php echo $item->image_url; ?>" class="img-responsive">
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label><strong>Müşteri İsmi</strong></label>
                                <input type="text" class="form-control onlychar" value="<?php echo isset($formError) ? set_value("name") : $item->name; ?>" name="name" placeholder="Müşterinin İsmi...">
                                <small class="form-text text-muted">Personelin adını yazınız.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("name") ?></small>
                                <?php } ?>

                            </div>

                            <div class="form-group col-md-6">
                                <label><strong> Müşteri Soyismi</strong></label>
                                <input type="text" class="form-control onlychar" 
                                value="<?php echo isset($formError) ? set_value("surname") : $item->surname; ?>" name="surname" placeholder="Müşterinin Soyismi...">
                                <small class="form-text text-muted">Müşterinin soyismini yazınız.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("surname") ?></small>
                                <?php } ?>

                            </div>

                        </div>



                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label><strong> Doğum Tarihi</strong></label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="birthday" 
                                    value="<?php echo isset($formError) ? set_value("birthday") : $item->birthday; ?>" placeholder="Doğum tarihini seçiniz.">
                                </div>
                                <small class="form-text text-muted">Doğum tarihini seçiniz.</small>

                            </div>

                            <div class="form-group col-md-6">
                                <label><strong>Cinsiyet</strong></label>
                                <select name="gender" class="form-control">
                                    <option value="0" <?php echo ($item->gender == 0) ? "selected" : " "; ?>> Kadın</option>
                                    <option value="1" <?php echo ($item->gender == 1) ? "selected" : " "; ?>> Erkek </option>
                                </select>
                                <small class="form-text text-muted">Cinsiyet seçiniz.</small>
                            </div>

                        </div>

                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><strong>Müşterinin Mesleği</strong></label>

                                <select name="jobID" class="form-control">
                                    <option value php echo $item->jobID; ?>"></?php echo getJobName($item->jobID) ?></option>

                                    </?php
                                    foreach (getJob()->result() as $data) { ?>
                                        <option value="</?php echo $data->id; ?>" </?php echo (isset($formError) ? set_select("jobID", $data->id) : " ") ?>>
                                            </?php echo $data->name ?>
                                        </option>";
                                    </?php } ?>

                                </select>

                                <small class="form-text text-muted">Müşterilerinize meslek bazlı bildirimler gönderebilmek için önemlidir.</small>

                                </?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"></?php echo form_error("jobID") ?></small>
                                </?php } ?>
                            </div> -->

                            <div class="form-group col-md-6">
                                <label><strong>E-mail</strong></label>
                                <input type="email" class="form-control" name="email" 
                                value="<?php echo isset($formError) ? set_value("email") : $item->email; ?>" placeholder="Personelin e-mail adresini Yazınız(Zorunlu Değildir).">
                                <small class="form-text text-muted">Personelin e-mail adresini yazınız(Zorunlu Değildir).</small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("email") ?></small>
                                <?php } ?>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><strong>GSM-1</strong></label>
                                <input type="text" class="form-control phone" name="gsm1" value="<?php echo isset($formError) ? set_value("gsm1") : $item->gsm1; ?>" placeholder="Cep Telefon Yazınız.">
                                <small class="form-text text-muted">Müşterinin cep telefon numarasını giriniz.</small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("gsm1") ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label><strong>GSM-2</strong></label>
                                <input type="text" class="form-control phone" name="gsm2" value="<?php echo isset($formError) ? set_value("gsm2") : $item->gsm2; ?>" placeholder="Cep Telefon Yazınız(Zorunlu Değildir).">
                                <small class="form-text text-muted">Müşterinin cep telefon numarasını giriniz.</small>
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label><strong>Müşteri Açıklaması</strong></label>
                                <div>
                                    <textarea class="form-control" rows="5" name="description"><?php echo isset($formError) ? set_value("description") : $item->description; ?></textarea>
                                    <small class="form-text text-muted">Müşteri ile ilgili açıklama girebilirsiniz. Özel durumları, rahatsızlıkları, sevdikleri, sevmedikleri, tercihleri vb.</small>
                                    <?php if (isset($formError)) { ?>
                                        <small class="input-form-error pull-right"><?php echo form_error("description") ?></small>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label success"> <strong> Müşteri Şifresi</strong></label>

                            <div class="col-sm-10">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">6 Karakter(Harf veya Rakam Olabilir.)</span>
                                    </div>
                                    <input type="password" class="form-control password" name="password" value="<?php echo isset($formError) ? set_value("password") : $item->password; ?>" placeholder="Müşteri Şifresini Yazınız.">
                                </div>
                                <small class="form-text  alert alert-danger"> <strong>Müşterinin giriş yapabilmesi için gerekli olan şifreyi tanımlayınız.</strong></small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("password") ?></small>
                                <?php } ?>
                            </div>

                        </div>


                        <div class="form-group row " align="center">

                            <input type="submit" style="position: absolute;  right: 25px;" class="btn btn-outline-success  default  " value="Kaydet">

                            <a href="<?php echo base_url("customers") ?>" style="position: absolute;  right: 120px;" class="btn btn-outline-danger  default  "> İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>