<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Müşteri Kayıt Düzenleme İşlemi</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4"><span class="span-color-blue "> <?php echo $item->name; ?></span> İsimli Müşterinin Bilgilerini Düzenliyorsunuz</h5>

                    <form action="<?php echo base_url("admin/customer/update/$item->id"); ?>" method="POST" enctype="multipart/form-data">

                    

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong> Müşteri İsmi</strong></label>

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control " name="name"                                 
                                value="<?php echo isset($formError) ? set_value("name") : $item->name; ?>"
                                placeholder="Hizmet İsmini Yazınız.">
                                <small class="form-text text-muted">Araç Markasının Adını Giriniz</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("name") ?></small>
                                <?php } ?>
                            </div>

                        </div>

                        <hr>
                        <br>

                         <div class="form-group row">

                            <label class="col-sm-2 col-form-label"><strong> Müşteri Soyismi</strong></label>

                             <div class="form-group col-md-6">
                                
                                <input type="text" class="form-control onlychar" name="surname" value="<?php echo isset($formError) ? set_value("surname") : $item->surname; ?>" placeholder="Müşterinin Soyismi...">
                                <small class="form-text text-muted">Müşterinin soyismini yazınız.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("surname") ?></small>
                                <?php } ?>

                            </div>
                        </div>

                        <hr>
                        <br>

                        <div class="form-group row">

                            <label class="col-sm-2 col-form-label"><strong>E-mail</strong></label>
                            <div class="form-group col-md-6">
                                
                                <input type="email" class="form-control" name="email"  value="<?php echo isset($formError) ? set_value("email") : $item->email; ?>" >
                                <small class="form-text text-muted">Müşterinin e-mail adresini yazınız.</small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("email") ?></small>
                                <?php } ?>
                            </div>

                        </div>

                        <hr>
                        <br>
                        
                          <div class="form-group row">

                            <label class="col-sm-2 col-form-label"><strong>Adress</strong></label>
                            <div class="form-group col-md-6">
                                
                                <input type="adress" class="form-control" name="adress"  value="<?php echo isset($formError) ? set_value("adress") : $item->adress; ?>" >
                                <small class="form-text text-muted">Müşterinin adresini adresini yazınız.</small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("adress") ?></small>
                                <?php } ?>
                            </div>

                        </div>
                        
                        <hr>
                        <br>

                        <div class="form-row">

                            <label class="col-sm-2 col-form-label"><strong>Telefon Numarası</strong></label>

                            <div class="form-group col-md-6">
                                
                                <input type="text" class="form-control phone" name="phone" value="<?php echo isset($formError) ? set_value("phone") : $item->phone; ?>"  placeholder="Cep Telefon Yazınız.">
                                <small class="form-text text-muted">Müşterinin cep telefon numarasını giriniz.</small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("phone") ?></small>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row " align="center">

                            <input type="submit" style="position: absolute;  right: 25px;" class="btn btn-outline-success  default  " value="Güncelle">

                            <a href="<?php echo base_url("admin/customer") ?>" style="position: absolute;  right: 120px;" class="btn btn-outline-danger  default  "> İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>