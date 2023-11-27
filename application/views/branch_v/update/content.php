<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Şube Düzenleme İşlemi</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4"><span class="span-color-blue "> <?php echo $item->name; ?></span> İsimli Şubenin Bilgilerini Düzenliyorsunuz</h5>

                    <form action="<?php echo base_url("admin/branch/update/$item->id"); ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong>Şube Görseli Seçiniz</strong></label>

                            <div class="col-sm-6">
                                <input type="file" class="form-control " name="image_url">
                                <small class="form-text text-muted">Şubeniz için kapak resmi seçiniz. jpg | jpeg | png formatları desteklenmektedir.</small>
                            </div>
                            <div class="col-sm-4">
                               <img width="240px"  src="<?php echo base_url("uploads/$viewFolder/$item->image_url") ?>" alt="<?php echo $item->image_url; ?>" class="img-responsive">
                            </div>

                        </div>

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong> Şube İsmi</strong></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control " name="name"                                 
                                value="<?php echo isset($formError) ? set_value("name") : $item->name; ?>"
                                placeholder="Hizmet İsmini Yazınız.">
                                <small class="form-text text-muted">Şirketinizde randevu alınmasını istediğiniz şubelerinizin, müşteriler tarafından görülecek ismini giriniz.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("name") ?></small>
                                <?php } ?>
                            </div>

                        </div>



                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong> Şube Adresi</strong></label>

                            <div class="col-sm-10">

                                <textarea class="form-control" rows="5" name="adress" placeholder="Şube Adresini Yazınız."><?php echo isset($formError) ? set_value("adress") : $item->adress; ?></textarea>
                                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek adresini giriniz.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("adress") ?></small>
                                <?php } ?>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><strong> İl</strong></label>
                                <input type="text" class="form-control onlychar" name="province" 
                                value="<?php echo isset($formError) ? set_value("province") : $item->province; ?>"
                                placeholder="İl Yazınız.">
                                <small class="form-text text-muted">Şubelerinizin bulunduğu ili yazınız.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("province") ?></small>
                                <?php } ?>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label><strong> İlçe</strong></label>
                                <input type="text" class="form-control onlychar" name="district"  
                                value="<?php echo isset($formError) ? set_value("district") : $item->district; ?>"
                                placeholder="İlçe Yazınız.">
                                <small class="form-text text-muted">Şubelerinizin bulunduğu ilçeyi yazınız.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("district") ?></small>
                                <?php } ?>

                            </div>

                        </div>



                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><strong> Sabit Telefon-1</strong></label>
                                <input type="text" class="form-control phone " name="phone1" 
                                value="<?php echo isset($formError) ? set_value("phone1") : $item->phone1; ?>"
                                placeholder="Sabit Telefon Yazınız.">
                                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek sabit telefon numarasını giriniz.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("phone1") ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label><strong> Sabit Telefon-2</strong></label>
                                <input type="text" class="form-control phone" name="phone2" 
                                value="<?php echo isset($formError) ? set_value("phone2") : $item->phone2; ?>"
                                placeholder="Sabit Telefon Yazınız(Zorunlu Değildir).">
                                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek sabit telefon numarasını giriniz.</small>

                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><strong>GSM-1</strong></label>
                                <input type="text" class="form-control phone" name="gsm1" 
                                value="<?php echo isset($formError) ? set_value("gsm1") : $item->gsm1; ?>" placeholder="Cep Telefon Yazınız(Zorunlu Değildir).">
                                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek cep telefon numarasını giriniz.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label><strong>GSM-2</strong></label>
                                <input type="text" class="form-control phone" name="gsm2" 
                                value="<?php echo isset($formError) ? set_value("gsm2") : $item->gsm2; ?>"
                                placeholder="Cep Telefon Yazınız(Zorunlu Değildir).">
                                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek cep telefon numarasını giriniz.</small>
                            </div>

                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><strong>Facebook</strong></label>
                                <input type="text" class="form-control" name="facebook" 
                                value="<?php echo isset($formError) ? set_value("facebook") : $item->facebook; ?>"
                                placeholder="Facebook Sayfası Linki(Zorunlu Değildir).">
                                <small class="form-text text-muted">Müşterilerinizin şubenizi sosyal medyada takip edebilmesi için belirtebilirsiniz.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label><strong>İnstagram</strong></label>
                                <input type="text" class="form-control" name="instagram" 
                                value="<?php echo isset($formError) ? set_value("instagram") : $item->instagram; ?>"
                                placeholder="İnstagram Sayfası Linki(Zorunlu Değildir).">
                                <small class="form-text text-muted">Müşterilerinizin şubenizi sosyal medyada takip edebilmesi için belirtebilirsiniz.</small>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><strong>Linkedin</strong></label>
                                <input type="text" class="form-control" name="linkedin" 
                                value="<?php echo isset($formError) ? set_value("linkedin") : $item->linkedin; ?>"
                                placeholder="Linkedin Sayfası Linki(Zorunlu Değildir).">
                                <small class="form-text text-muted">Müşterilerinizin şubenizi sosyal medyada takip edebilmesi için belirtebilirsiniz.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label><strong>Pinterest</strong></label>
                                <input type="text" class="form-control" name="pinterest" 
                                value="<?php echo isset($formError) ? set_value("pinterest") : $item->pinterest; ?>"
                                placeholder="Pinterest Sayfası Linki(Zorunlu Değildir).">
                                <small class="form-text text-muted">Müşterilerinizin şubenizi sosyal medyada takip edebilmesi için belirtebilirsiniz.</small>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><strong>Twitter</strong></label>
                                <input type="text" class="form-control" name="twitter" 
                                value="<?php echo isset($formError) ? set_value("twitter") : $item->twitter; ?>"
                                placeholder="Twitter Sayfası Linki(Zorunlu Değildir).">
                                <small class="form-text text-muted">Müşterilerinizin şubenizi sosyal medyada takip edebilmesi için belirtebilirsiniz.</small>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong> Şube Email</strong></label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control " name="email" 
                                value="<?php echo isset($formError) ? set_value("email") : $item->email; ?>" 
                                placeholder="Şube'ye ait email adresi yazınız(Zorunlu Değildir).">
                                <small class="form-text text-muted">Şube için alınmış bir mail adresi varsa belirtebilirsiniz.</small>
                            </div>

                        </div>

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong>Google Konum</strong></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control " name="mapCode" 
                                value="<?php echo isset($formError) ? set_value("mapCode") : $item->mapCode; ?>" 
                                placeholder="Şube'ye ait konum bilgisini yazınız.">
                                <small class="form-text text-muted">Şube adresinizin Google üzerindeki konumunu yazınız.</small>
                            </div>

                        </div>

                        <div class="form-group row " align="center">

                            <input type="submit" style="position: absolute;  right: 25px;" class="btn btn-outline-success  default  " value="Güncelle">

                            <a href="<?php echo base_url("admin/branch") ?>" style="position: absolute;  right: 120px;" class="btn btn-outline-danger  default  "> İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>