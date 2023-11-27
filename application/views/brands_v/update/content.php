<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Marka Düzenleme İşlemi</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4"><span class="span-color-blue "> <?php echo $item->name; ?></span> İsimli Aracın Bilgilerini Düzenliyorsunuz</h5>

                    <form action="<?php echo base_url("admin/brands/update/$item->id"); ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong>Araç Görseli Seçiniz</strong></label>

                            <div class="col-sm-6">
                                <input type="file" class="form-control " name="image_url">
                                <small class="form-text text-muted">Aracınız için kapak resmi seçiniz. jpg | jpeg | png formatları desteklenmektedir.</small>
                            </div>
                            <!-- <div class="col-sm-4">
                               <img width="240px"  src="<?php echo base_url("uploads/$viewFolder/$item->image_url") ?>" alt="<?php echo $item->image_url; ?>" class="img-responsive">
                            </div> -->

                        </div>

                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong> Araç Markası</strong></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control " name="name"                                 
                                value="<?php echo isset($formError) ? set_value("name") : $item->name; ?>"
                                placeholder="Hizmet İsmini Yazınız.">
                                <small class="form-text text-muted">Araç Markasının Adını Giriniz</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("name") ?></small>
                                <?php } ?>
                            </div>

                        </div>

                        <div class="form-group row " align="center">

                            <input type="submit" style="position: absolute;  right: 25px;" class="btn btn-outline-success  default  " value="Güncelle">

                            <a href="<?php echo base_url("admin/brands") ?>" style="position: absolute;  right: 120px;" class="btn btn-outline-danger  default  "> İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>