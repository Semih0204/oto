<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Şube Bilgileri</h1>

            <!-- Sağ taraftaki butonlar Yeni Ekle - Export -->
            <div class="top-right-button-container">
                <a class="btn btn-outline-success btn-md " aria-haspopup="true" aria-expanded="false" href="<?php echo base_url("admin/branch/new_form"); ?>">
                    <i class="simple-icon-plus"> </i> YENİ EKLE
                </a>
                <div class="btn-group">
                    <button class="btn btn-outline-primary btn-md dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        EXPORT
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" id="dataTablesCopy" href="#">Copy</a>
                        <a class="dropdown-item" id="dataTablesExcel" href="#">Excel</a>
                        <a class="dropdown-item" id="dataTablesCsv" href="#">Csv</a>
                        <a class="dropdown-item" id="dataTablesPdf" href="#">Pdf</a>
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions" role="button" aria-expanded="true" aria-controls="displayOptions">
                    Display Options
                    <i class="simple-icon-arrow-down align-middle"></i>
                </a>
                <div class="collapse dont-collapse-sm" id="displayOptions">
                    <div class="d-block d-md-inline-block">
                        <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                            <input class="form-control" placeholder="Search Table" id="searchDatatable">
                        </div>
                    </div>
                    <div class="float-md-right dropdown-as-select" id="pageCountDatatable">
                        <span class="text-muted text-small">Displaying 1-10 of 40 items </span>
                        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            10
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">5</a>
                            <a class="dropdown-item active" href="#">10</a>
                            <a class="dropdown-item" href="#">20</a>
                        </div>
                    </div>
                </div>
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

            <?php } else {  ?>


                <table id="datatableRows" class="data-table responsive nowrap">
                    <thead>
                        <tr class="pull-center-trend">

                            <?php /* DataTable Kolonları dore.script.js 2882. satırda. */ ?>
                            <th class="dataTable-w20">#ID</th>
                            <th class="w100">Resim</th>
                            <th>İsim</th>
                            <th>Adres</th>
                            <th>Telefon</th>
                            <th>Gsm</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody class="sortable">
                        <?php
                        foreach ($items as $item) { ?>
                            <tr class="pull-center-trend" id="ord-<?php echo $item->id; ?>">
                                <td><i class="glyph-icon simple-icon-menu"></i> <?php echo $item->id; ?></td>
                                <td>
                                <img width="90px" src="<?php echo base_url("uploads/{$viewFolder}/$item->image_url"); ?>" alt="<?php echo $item->image_url; ?>" class="img-responsive">
                                </td>
                                <td><?php echo $item->name ?></td>
                                <td><?php echo $item->adress . "<br>" . $item->province ."/" . $item->district; ?></td>
                                <td><?php echo $item->phone1 . "<br>" . $item->phone2; ?></td>
                                <td><?php echo $item->gsm1   . "<br>" .  $item->gsm2; ?></td>
                                <td>

                                    <div class="custom-switch custom-switch-secondary mb-2 custom-switch-small">
                                        
                                        <input class=" isActive custom-switch-input" 
                                        id="switchS<?php echo $item->id ?>" 
                                        type="checkbox" 
                                        data-url="<?php echo base_url("admin/branch/isActiveSetter/$item->id"); ?> " 
                                        <?php echo ($item->isActive) ? "checked" : ""; ?> 
                                        />

                                        <label class="custom-switch-btn" for="switchS<?php echo $item->id ?>"></label>
                                    </div>

                                </td>

                                <td>
                                    <button data-url="<?php echo base_url("admin/branch/delete/$item->id"); ?>" class="btn btn-xs btn-outline-danger mb-1 remove-btn-sweet">
                                        <i class="glyph-icon simple-icon-trash"></i> Sil
                                    </button>

                                    <!-- Düzenleme için id'yi göndermek gereklidir. -->
                                    <a href="<?php echo base_url("admin/branch/updateForm/$item->id") ?>" class="btn btn-xs btn-outline-secondary mb-1"><i class="simple-icon-note"></i> Düzenle</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>

        </div>
    </div>
</div>