<div class="container">
    <div class="row h-100">
        <div class="col-12 col-md-10 mx-auto my-auto">
            <div class="card auth-card">
                <div class="position-relative image-side ">

                    <p class=" text-white h2">İŞLETMELERİN YENİ NESİL ASİSTANI</p>
                    <br><br>
                    <p class="white mb-0">
                        Tüm plan ve programlarınız
                        <br>TrendAsist ile kontrol altında.
                        <br>
                        <a href="https://parskod.com" class="white">ParsKOD</a>.
                    </p>
                </div>
                <div class="form-side">
                    <a href="Dashboard.Default.html">
                        <span class="logo-single"></span>
                    </a>
                    <h6 class="mb-4">Giriş Yapınız</h6>
                    <form action="<?php echo base_url("giris-yap") ?>" method="POST">
                        <label class="form-group has-float-label mb-4">
                            <input type="text" name="email" class="form-control" />
                            <span>E-mail</span>
                            <?php if (isset($formError)) { ?>
                                <small class="input-form-error pull-right"><?php echo form_error("email") ?></small>
                            <?php } ?>
                        </label>

                        <label class="form-group has-float-label mb-4">
                            <input class="form-control" type="password" name="password" />
                            <span>Şifre</span>
                            <?php if (isset($formError)) { ?>
                                <small class="input-form-error pull-right"><?php echo form_error("password") ?></small>
                            <?php } ?>
                        </label>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?php echo base_url("admin/sifremi-unuttum")?>">Şifremi unuttum!</a>
                            <button class="btn btn-primary btn-lg btn-shadow" type="submit">Giriş Yap</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>