<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>SM Oto Servis Yönetim | <strong><?php echo $item->company_name; ?> </strong></h1>

            <div class="separator mb-5"></div>
        </div>
        <div class="col-lg-12 col-xl-12">
            <div class="icon-cards-row">
                <div class="glide dashboard-numbers">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">

                            <li class="glide__slide">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-check"></i>
                                        <p class="card-text mb-0">Tamamlanmış Randevular</p>
                                        <p class="lead text-center"><?php echo $item->completed_bookings; ?></p>
                                    </div>
                                </a>
                            </li>

                            <?php if ($item->be_confirm_bookings > 0) {  ?>
                                <li class="glide__slide">
                                    <a href="#" class="card">
                                        <div class="card-body text-center">
                                            <i class="iconsminds-sand-watch-2"></i>
                                            <p class="card-text mb-0">Onay Bekleyen Randevular</p>
                                            <p class="lead text-center"><?php echo $item->be_confirm_bookings; ?></p>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if ($item->be_completed_bookings > 0) {  ?>

                                <li class="glide__slide">
                                    <a href="#" class="card">
                                        <div class="card-body text-center">
                                            <i class="iconsminds-clock"></i>
                                            <p class="card-text mb-0">Tamamlanacak Randevular</p>
                                            <p class="lead text-center"><?php echo $item->be_completed_bookings; ?></p>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>

                            <li class="glide__slide">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-24-hour"></i>
                                        <p class="card-text mb-0">Bugünün Randevuları</p>
                                        <p class="lead text-center"><?php echo $item->today_bookings; ?></p>
                                    </div>
                                </a>
                            </li>
                            <li class="glide__slide">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-clock-forward"></i>
                                        <p class="card-text mb-0">Yarının Randevuları</p>
                                        <p class="lead text-center"><?php echo $item->tomorrow_bookings; ?></p>
                                    </div>
                                </a>
                            </li>
                            <li class="glide__slide">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-over-time-2"></i>
                                        <p class="card-text mb-0">Bu Haftanın Randevuları</p>
                                        <p class="lead text-center"><?php echo $item->this_week_bookings; ?></p>
                                    </div>
                                </a>
                            </li>
                            <li class="glide__slide">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="simple-icon-event "></i>
                                        <p class="card-text mb-0">Bu Ayın Randevuları</p>
                                        <p class="lead text-center"><?php echo $item->this_month_bookings; ?></p>
                                    </div>
                                </a>
                            </li>
                            <li class="glide__slide">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-mail-read"></i>
                                        <p class="card-text mb-0">Kalan Sms Bakiyesi</p>
                                        <p class="lead text-center">222</p>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="row">

                <div class="col-xl-3 col-lg-3">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body justify-content-between d-flex flex-row align-items-center">
                            <div>
                                <i class="iconsminds-business-man-woman  mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white">Müşteri Sayısı</p>
                                    <p class="text-small text-white">Randevusunu tamamlayan müşteri sayısı belirtmektedir.</p>
                                </div>
                            </div>

                            <div>
                                <span style="color: white; font-size: 2rem; font-weight:400 "><?php echo $item->customer_number; ?></span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body justify-content-between d-flex flex-row align-items-center">
                            <div>
                                <i class="iconsminds-gear-2 mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white">Hizmet Sayısı</p>
                                    <p class="text-small text-white">Tüm şubelerde personeller tarafından verilen hizmet sayısını belirtmektedir.</p>
                                </div>
                            </div>

                            <div>
                                <span style="color: white; font-size: 2rem; font-weight:400 "> <?php echo $item->service_number; ?></span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body justify-content-between d-flex flex-row align-items-center">
                            <div>
                                <i class="iconsminds-network  mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white">Personel Sayısı</p>
                                    <p class="text-small text-white">Tüm şubelerde çalışan personel sayısını belirtmektedir.</p>
                                </div>
                            </div>

                            <div>
                                <span style="color: white; font-size: 2rem; font-weight:400 "><?php echo $item->personel_number; ?></span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body justify-content-between d-flex flex-row align-items-center">
                            <div>
                                <i class="iconsminds-shop-2 mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white">Şube Sayısı</p>
                                    <p class="text-small text-white">İşletmeye ait şubelerin sayısını belirtmektedir.</p>
                                </div>
                            </div>

                            <div>
                                <span style="color: white; font-size: 2rem; font-weight:400 "> <?php echo $item->branch_number; ?></span>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Hizmetlerimiz</h5>
                    <table class="data-table data-table-standard responsive nowrap" data-order="[[ 1, &quot;desc&quot; ]]">
                        <thead>
                            <tr>
                                <th>Hizmet Adı</th>
                                <th>Fiyat</th>
                                <th>Süre</th>
                                <th>Puan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    <p class="list-item-heading"><a href="<?php echo base_url("admin/services/updateForm/...") ?>"> <?php echo "Servis Adı"; ?></a></p>
                                </td>
                                <td>
                                    <p class="text-muted"><?php echo "aa"; ?></p>
                                </td>
                                <td>
                                    <p class="text-muted"><?php echo "aa"; ?></p>
                                </td>
                                <td>
                                    <p class="text-muted"><?php echo "aa"; ?></p>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Personellerimiz</h5>
                    <table class="data-table data-table-standard responsive nowrap" data-order="[[ 1, &quot;desc&quot; ]]">
                        <thead>
                            <tr>
                                <th>İsim Soyisim</th>
                                <th>Şube</th>
                                <th>Telefon</th>
                                <th>E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>
                                        <p class="list-item-heading"> <a href="<?php echo base_url("admin/personel/updateForm/....") ?>"> <?php echo "personel adı"; ?></p></a>
                                    </td>
                                    <td>
                                        <p class="text-muted"><?php echo "aaa" ?></p>
                                    </td>
                                    <td>
                                        <p class="text-muted"> <?php echo "sss"; ?></a></p>
                                    </td>
                                    <td>
                                        <p class="text-muted"><?php echo "asd"; ?></p>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>