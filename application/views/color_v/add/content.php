<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Yeni Renk Ekleme İşlemi</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Yeni Renk Bilgileri</h5>

                    <form action="<?php echo base_url("admin/color/save"); ?>" method="POST">


                        <div class="form-group row ">

                            <label class="col-sm-2 col-form-label"> <strong> Renk Adı</strong></label>

                            <div class="col-sm-10">

                                <input type="text" class="form-control " name="color" placeholder="Renk Adınız Yazınız."
                                    value="<?php echo isset($formError) ? set_value("color") : " " ?>">

                                <small class="form-text text-muted">Renk adını yazınız.</small>

                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right">
                                        <?php echo form_error("color") ?>
                                    </small>
                                <?php } ?>
                            </div>

                        </div>

                        <div class="form-group row " align="center">

                            <input type="submit" style="position: absolute;  right: 25px;"
                                class="btn btn-outline-success  default  " value="Kaydet">

                            <a href="<?php echo base_url("admin/color") ?>" style="position: absolute;  right: 120px;"
                                class="btn btn-outline-danger  default  "> İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>