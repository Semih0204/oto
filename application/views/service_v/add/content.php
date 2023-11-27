<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Yeni Kayıt Oluşturma</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Servis Kayıt Bilgileri</h5>
                    
                    <form action="<?php echo base_url("admin/service/save"); ?>" method="POST" enctype="multipart/form-data">
                    
                

                    <div class="row">
                        <div class="col-md-6">
                            <label for="id_cars">araç tür deneme</label>
                            <label for="id_cars">
                                <?php foreach ($cars as $type): ?>
                                   <p>Type: <?php echo $type->id_type; ?></p>
                                    <!-- <p>Brands: <?php echo $cars->brands; ?></p>
                                    <p>Model: <?php echo $cars->model; ?></p> -->
                                    
                                <?php endforeach; ?>

                                <!-- <?php foreach ($cars as $type) {
                                        if($cars->isActive == 1) {
                                ?>
                                    <p>Type: <?php echo $type->id_type; ?></p>
                                <?php } } ?>     -->
                            </label>
                        </div>
                    </div>



                    <div class="row">
                                <div class="col-md-6">
                                    <label for="id_type" class="form-label">Araç Türü Seçimi (Zorunlu)</label>
                                    <label class="w-100">

                                        <select name="id_type" required class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <?php
                                            foreach ($cars as $type) {
                                                if($type->isActive == 1 ) {
                                            ?>
                                                    <option <?php echo (!empty($formError) && set_value("id_type") == $type->id) ? "selected" : "" ?> value="<?= $type->id ?>"><?php echo "$type->name " ?></option>
                                                    <option <?php echo (!empty($formError) && set_value("id_type") == $type->id) ? "selected" : "" ?>
                                            <?php } }?>
                                        </select> 
                                    </label>
                                    <!-- <small class="text-muted">Araç Türünü Seçiniz</small>
                                    <div class="invalid-feedback">
                                        Tür seçimi alanı boş bırakılamaz!
                                    </div> -->
                                    <?php if (isset($formError)) { ?>
                                        <small class="text-danger"><?= form_error("id_type") ?></small>
                                    <?php } ?>
                                </div>
                    </div> 



                

                    <br><br><br>

                        <div class="row">
                                <div class="col-md-6">
                                    <label for="id_cars" class="form-label">Araç Türü Seçimi (Zorunlu)</label>
                                    <label class="w-100">

                                        <select name="id_cars" required class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <?php
                                            foreach ($cars as $type) {
                                                if($type->isActive == 1 ) {
                                            ?>
                                                <!-- <option <?php echo (!empty($formError) && set_value("id_type") == $type->id_type) ? "selected" : "" ?> value="<?= $type->id_type ?>"><?php echo "$type->id_type " ?></option> -->

                                            <?php } }?>
                                        </select>
                                    </label>
                                    <small class="text-muted">Araç Türünü Seçiniz</small>
                                    <div class="invalid-feedback">
                                        Tür seçimi alanı boş bırakılamaz!
                                    </div>
                                    <?php if (isset($formError)) { ?>
                                        <small class="text-danger"><?= form_error("cars") ?></small>
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
                                            foreach ($cars as $car) {
                                            ?>
                                                <option <?php echo (!empty($formError) && set_value("id_cars/brands") == $brand->id) ? "selected" : "" ?> value="<?= $brand->id ?>"><?php echo "$brand->name " ?></option>
                                            <?php } ?>
                                        </select>
                                    </label>
                                    <small class="text-muted">Araç Markasını yapınız.</small>
                                    <div class="invalid-feedback">
                                        Paket seçimi alanı boş bırakılamaz!
                                    </div>
                                    <?php if (isset($formError)) { ?>
                                        <small class="text-danger"><?= form_error("id_cars/brand") ?></small>
                                    <?php } ?>
                                </div>
                        </div>

                        <br><br>

                        <div class="row">
                                <div class="col-md-6">
                                    <label for="id_brand" class="form-label">Araç Modeli Seçimi (Zorunlu)</label>
                                    <label class="w-100">

                                        <select name="id_brand" required class="form-control select2-single"  data-width="100%">
                                            <option value=""></option>
                                            <?php
                                            foreach ($cars as $car) {
                                            ?>
                                                <option <?php echo (!empty($formError) && set_value("id_cars") == $car->id) ? "selected" : "" ?> value="<?= $car->id ?>"><?php echo "$car->name " ?></option>
                                            <?php } ?>
                                        </select>
                                    </label>
                                    <small class="text-muted">Araç Markasını yapınız.</small>
                                    <div class="invalid-feedback">
                                        Paket seçimi alanı boş bırakılamaz!
                                    </div>
                                    <?php if (isset($formError)) { ?>
                                        <small class="text-danger"><?= form_error("id_cars") ?></small>
                                    <?php } ?>
                                </div>
                        </div>


                        <!-- <div class="form-group  ">

                            <label class="col-sm-2 col-form-label"> <strong> Araç Model Adı</strong></label>

                            <div class="col-sm-10">

                                <input type="text" class="form-control " name="name" placeholder="Hizmet İsmini Yazınız." value="<?php echo isset($formError) ? set_value("name") : " " ?>">

                                <small class="form-text text-muted">Araç Model Adını Giriniz.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("name") ?></small>
                                <?php } ?>
                            </div>

                        </div> -->

                        
                                           
                        <div class="form-group row " align="center">

                            <input type="submit" style="position: absolute;  right: 25px;" class="btn btn-outline-success  default  " value="Kaydet">

                            <a href="<?php echo base_url("admin/service") ?>" style="position: absolute;  right: 120px;" class="btn btn-outline-danger  default  "> İptal</a>
                        </div>
                    </form>

                    <br><br>
                   


                </div>
            </div>
        </div>
    </div>
</div>