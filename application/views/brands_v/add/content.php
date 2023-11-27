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

                    <form action="<?php echo base_url("admin/brands/save"); ?>" method="POST" enctype="multipart/form-data">


                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong> Aracın Markası</strong></label>

                            <div class="col-sm-10">

                                <input type="text" class="form-control " name="name" placeholder="Hizmet İsmini Yazınız." value="<?php echo isset($formError) ? set_value("name") : " " ?>">

                                <small class="form-text text-muted">Araç Markasını Giriniz.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("name") ?></small>
                                <?php } ?>
                            </div>

                        </div>
                                           
                        <div class="form-group row " align="center">

                            <input type="submit" style="position: absolute;  right: 25px;" class="btn btn-outline-success  default  " value="Kaydet">

                            <a href="<?php echo base_url("admin/brands") ?>" style="position: absolute;  right: 120px;" class="btn btn-outline-danger  default  "> İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>