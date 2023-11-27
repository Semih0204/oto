<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Site Ayarları</h1>

            <!-- Sağ taraftaki butonlar Yeni Ekle - Export -->
            <div class="top-right-button-container">
                <a class="btn btn-outline-success btn-md " aria-haspopup="true" aria-expanded="false" href="<?php echo base_url("settings/new_form"); ?>">
                    <i class="simple-icon-plus"> </i> YENİ EKLE
                </a>
            </div>

            <div class="separator"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4 data-table-rows data-tables-hide-filter">
            <?php
            if (empty($items)) { ?>

                <div class="alert alert-info text-center" role="alert">
                    <br>
                    <h4><b>Kayıt Bulunamadı ! </b></h4>
                    <p> Bu bölümde herhangi bir veri bulunmamaktadır. Yetkiniz dahilinde ekleme işlemi için <strong> Yeni Ekle </strong> butonunu kullanabilirsiniz yada <strong> Birim Sorumlunuz </strong> ile görüşebilirsiniz.</p>
                </div>

            <?php }  ?>


        </div>
    </div>
</div>