<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Kullanıcı Düzenleme İşlemi</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4"><span class="span-color-blue "> <?php echo $item->name . " " . $item->surname; ?></span> İsimli Kullanıcının Şifresini Düzenliyorsunuz</h5>

                    <form action="<?php echo base_url("admin/users/updatePassword/$item->id"); ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label><strong> Şifre </strong></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" placeholder="Şifrenizi giriniz.">
                                </div>
                                <small class="form-text  alert alert-danger"> <strong> Kullanıcının sisteme giriş için kullanacağı şifreyi tanımlayınız(Minimum 6 - Maxsimum 10 karakter). </strong></small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("password") ?></small>
                                <?php } ?>

                            </div>

                            <div class="form-group col-md-6">
                                <label><strong> Şifre Tekrarı</strong></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="re_password" placeholder="Şifrenizi giriniz.">
                                </div>
                                <small class="form-text  alert alert-danger"> <strong> Kullanıcının sisteme giriş için kullanacağı şifreyi tekrar yazınız(Minimum 6 - Maxsimum 10 karakter). </strong></small>
                                <?php if (isset($formError)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("re_password") ?></small>
                                <?php } ?>
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