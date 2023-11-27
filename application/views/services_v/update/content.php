<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Hizmet Güncelleme İşlemi</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4"> <span class="span-color-blue "> <?php echo $item->name; ?></span> İsimli Hizmetin Bilgileri:</h5>

                    <form action="<?php echo base_url("admin/services/update/$item->id"); ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong>Şube Görseli Seçiniz</strong></label>

                            <div class="col-sm-6">
                                <input type="file" class="form-control " name="image_url">
                                <small class="form-text text-muted">Şubeniz için kapak resmi seçiniz. jpg | jpeg | png formatları desteklenmektedir.</small>
                            </div>
                            <div class="col-sm-4">
                                <img width="240px" src="<?php echo base_url("uploads/$viewFolder/$item->image_url") ?>" alt="<?php echo $item->image_url; ?>" class="img-responsive">
                            </div>

                        </div>

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong> Hizmet İsmi</strong></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control " name="name" value="<?php echo isset($formError) ? set_value("name") : $item->name; ?>" placeholder="Hizmet İsmini Yazınız.">
                                <small class="form-text text-muted">Şirketinizde randevu alınmasını istediğiniz hizmetin, müşteriler tarafından görülecek ismini giriniz.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("name") ?></small>
                                <?php } ?>
                            </div>

                        </div>

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"><strong> Hizmet Süresi</strong></label>

                            <div class="col-sm-10">

                                <select name="time" class="form-control">
                                    <option value="<?php echo $item->time; ?>"><?php echo $item->time; ?></option>
                                    <?php for ($i = 15; $i <= 300; $i += 15) {
                                        echo "<option value=$i> $i 'dk </option>";
                                    } ?>
                                </select>

                                <small class="form-text text-muted">Hizmetin süresini belirtiniz. Belirtmiş olduğunuz süreye göre randevu işlemleri dikkate alınmaktadır.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("time") ?></small>
                                <?php } ?>

                            </div>

                        </div>

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"><strong> Hizmet Prim Puanı</strong></label>

                            <div class="col-sm-10">

                                <select name="primPuan" class="form-control">
                                    <option value="<?php echo $item->primPuan; ?>"><?php echo $item->primPuan; ?></option>

                                    <?php for ($i = 50; $i <= 1000; $i += 50) {
                                        echo "<option value=$i> $i - puan </option>";
                                    } ?>

                                </select>

                                <small class="form-text text-muted">Personelin vermiş olduğu hizmet karşılığında prim vermek için lütfen prim puanı seçiniz.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("primPuan") ?></small>
                                <?php } ?>

                            </div>

                        </div>

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"><strong> Hizmet Açıklaması</strong></label>

                            <div class="col-sm-10">

                                <textarea class="form-control" rows="5" name="description"><?php echo isset($formError) ? set_value("description") :  $item->description; ?></textarea>

                                <small class="form-text text-muted">Hizmet ile ilgili açıklama giriniz.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("description") ?></small>
                                <?php } ?>
                            </div>

                        </div>

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label success"> <strong> Hizmet Fiyatı</strong></label>

                            <div class="col-sm-10">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Örn: 18,50</span>
                                    </div>
                                    <input type="text" class="form-control money" name="price" value="<?php echo isset($formError) ? set_value("price") :  $item->price; ?>" placeholder="Hizmet Fiyatını Yazınız.">
                                    <span class="input-group-text">TL</span>
                                </div>
                                <small class="form-text  alert alert-danger"> <strong> Hizmetin fiyatı yazılırken nokta(.) ve virgül(,) otomatik yazılmaktadır. Binlik ayracı nokta(.) - Kuruş ayracı virgül(,) olarak tanımlanmıştır. (Örn: 18,50)</strong></small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("price") ?></small>
                                <?php } ?>
                            </div>

                        </div>

                        <div class="form-group row " align="center">

                            <input type="submit" style="position: absolute;  right: 25px;" class="btn btn-outline-success  default  " value="Güncelle">

                            <a href="<?php echo base_url("admin/services") ?>" style="position: absolute;  right: 120px;" class="btn btn-outline-danger  default  "> İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>