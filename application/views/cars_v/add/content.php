<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Araç Markası</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Araç Marka Bilgileri</h5>
                    
                    <form action="<?php echo base_url("admin/cars/save"); ?>" method="POST" enctype="multipart/form-data">


                        <div class="row">
                                <div class="col-md-6">
                                    <label for="id_type" class="form-label">Araç Türü Seçimi (Zorunlu)</label>
                                    <label class="w-100">

                                        <select name="id_type" required class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <?php
                                            foreach ($types as $type) {
                                                if($type->isActive == 1 ) {
                                            ?>
                                                <option <?php echo (!empty($formError) && set_value("id_type") == $type->id) ? "selected" : "" ?> value="<?= $type->id ?>"><?php echo "$type->name " ?></option>

                                            <?php } }?>
                                        </select>
                                    </label>
                                    <small class="text-muted">Araç Türünü Seçiniz</small>
                                    <div class="invalid-feedback">
                                        Tür seçimi alanı boş bırakılamaz!
                                    </div>
                                    <?php if (isset($formError)) { ?>
                                        <small class="text-danger"><?= form_error("id_type") ?></small>
                                    <?php } ?>
                                </div>
                        </div>  

                        <br><br>
                        
                        <div class="row">
                                <div class="col-md-6">
                                    <label for="id_brand" class="form-label">Araç Markası Seçimi (Zorunlu)</label>
                                    <label class="w-100">

                                        <select name="id_brand" required class="form-control select2-single"  data-width="100%">
                                            <option value=""></option>
                                            <?php
                                            foreach ($brands as $brand) {
                                            ?>
                                                <option <?php echo (!empty($formError) && set_value("id_brands") == $brand->id) ? "selected" : "" ?> value="<?= $brand->id ?>"><?php echo "$brand->name " ?></option>
                                            <?php } ?>
                                        </select>
                                    </label>
                                    <small class="text-muted">Araç Markasını yapınız.</small>
                                    <div class="invalid-feedback">
                                        Paket seçimi alanı boş bırakılamaz!
                                    </div>
                                    <?php if (isset($formError)) { ?>
                                        <small class="text-danger"><?= form_error("id_brand") ?></small>
                                    <?php } ?>
                                </div>
                        </div>

                        <br><br>

                        <div class="form-group  ">

                            <label class="col-sm-2 col-form-label"> <strong> Araç Model Adı</strong></label>

                            <div class="col-sm-10">

                                <input type="text" class="form-control " name="name" placeholder="Hizmet İsmini Yazınız." value="<?php echo isset($formError) ? set_value("name") : " " ?>">

                                <small class="form-text text-muted">Araç Model Adını Giriniz.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("name") ?></small>
                                <?php } ?>
                            </div>

                        </div>

                        
                                           
                        <div class="form-group row " align="center">

                            <input type="submit" style="position: absolute;  right: 25px;" class="btn btn-outline-success  default  " value="Kaydet">

                            <a href="<?php echo base_url("admin/cars") ?>" style="position: absolute;  right: 120px;" class="btn btn-outline-danger  default  "> İptal</a>
                        </div>
                    </form>

                    <br><br>
                   


                </div>
            </div>
        </div>
    </div>
</div>