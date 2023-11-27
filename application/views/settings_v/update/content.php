<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Sistem Ayarları</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row">

        <div class="col-12 mb-4">
            <h5 class="mb-4"><span class="span-color-blue "> <?php echo $item->companyName; ?></span> Şirketine Ait Bilgileri Düzenliyorsunuz </h5>

            <form action="<?php echo base_url("admin/settings/update/$item->id"); ?>" method="POST" enctype="multipart/form-data">

                <div class="card mb-4">
                    <div id="smartWizardClickable">
                        <ul class="card-header">
                            <li><a href="#tab1">Genel Bilgiler<br /><small>Şirket ile ilgili genel bilgiler</small></a></li>
                            <li><a href="#tab6">Logo<br /><small>Logo ve Favicon bilgileri</small></a></li>
                            <li><a href="#tab2">İletişim Bilgileri<br /><small>Şirket merkezinin iletişim bilgileri</small></a></li>
                            <li><a href="#tab3">Misyon Vizyon Bilgileri<br /><small>Misyon Vizyon Slogan </small></a></li>
                            <li><a href="#tab4">Sosyal Medya<br /><small>Şirketin genel sosyal medya hesapları</small></a></li>
                            <li><a href="#tab5">Seo<br /><small>Arama motoru optimizasyon bilgileri</small></a></li>

                        </ul>


                        <div class="card-body">

                            <?php $this->load->view("$viewFolder/$subViewFolder/tabs/tab1.php") ?>

                            <?php $this->load->view("$viewFolder/$subViewFolder/tabs/tab2.php") ?>

                            <?php $this->load->view("$viewFolder/$subViewFolder/tabs/tab3.php") ?>

                            <?php $this->load->view("$viewFolder/$subViewFolder/tabs/tab4.php") ?>

                            <?php $this->load->view("$viewFolder/$subViewFolder/tabs/tab5.php") ?>

                            <?php $this->load->view("$viewFolder/$subViewFolder/tabs/tab6.php") ?>

                        </div>
                    </div>
                    <div class="btn-toolbar justify-content-end">

                        <div class="col-12 mb-4">
                            <div class="form-group row " align="center">

                                <input type="submit" style="position: absolute;  right: 25px;" class="btn btn-outline-success  default " value="Güncelle">

                                <a href="<?php echo base_url("admin/settings") ?>" style="position: absolute;  right: 120px;" class="btn btn-outline-danger  default"> İptal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>