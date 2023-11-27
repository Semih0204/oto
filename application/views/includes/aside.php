<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li>
                    <a href="<?php echo base_url("admin/dashboard"); ?>">
                        <i class="simple-icon-badge"></i> Ana Sayfa
                    </a>
                </li>

                <!-- <li>
                    <a href="<?php echo base_url("admin/color") ?>">
                        <i class="iconsminds-building"></i> Renk İşlemleri
                    </a>
                </li> -->

                <li>
                    <a href="<?php echo base_url("admin/type") ?>">
                        <i class="iconsminds-building"></i> Tür İşlemleri
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("admin/brands") ?>">
                        <i class="iconsminds-building"></i> Marka İşlemleri
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("admin/service") ?>">
                        <i class="iconsminds-building"></i> Servis İşlemleri
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("admin/cars") ?>">
                        <i class="iconsminds-building"></i> Seçim ve Kayıt İşlemleri
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("admin/customer") ?>">
                        <i class="iconsminds-building"></i> Müşteri Kayıt İşlemleri
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("admin/users") ?>">
                        <i class="iconsminds-building"></i> Kullanıcı İşlem B
                    </a>
                </li>

            

                <li>
                    <a href="#booking">
                        <i class="iconsminds-shop-4"></i>
                        <span>Randevu İşlemleri</span>
                    </a>
                </li>

                <li>
                    <a href="#customer">
                        <i class="iconsminds-conference"></i> Müşteri İşlemleri
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("admin/branch") ?>">
                        <i class="iconsminds-building"></i> Şube İşlemleri
                    </a>
                </li>
                

                <li>
                    <a href="<?php echo base_url("admin/services"); ?>">
                        <i class="iconsminds-air-balloon-1"></i> Hizmet İşlemleri
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("admin/personel"); ?>">
                        <i class="iconsminds-box-with-folders"></i> Personel İşlemleri
                    </a>
                </li>

                <li>
                    <a href="#sms">
                        <i class="iconsminds-bird-delivering-letter"></i>SMS İşlemleri
                    </a>
                </li>

                <!--   <li>
                    <a href="#email">
                        <i class="iconsminds-mail-forward"></i>E-Mail İşlemleri
                    </a>
                </li>

                <li>
                    <a href="#muhasebe">
                        <i class="simple-icon-calculator"></i>Ön Muhasebe
                    </a>
                </li>

                <li>
                    <a href="#reports">
                        <i class="iconsminds-folder-edit"></i> Raporlar
                    </a>
                </li>

                <li>
                    <a href="#charts">
                        <i class="iconsminds-pie-chart-3"></i> Grafikler
                    </a>
                </li> -->

                <li>
                    <a href="#settings">
                        <i class="iconsminds-gear-2"></i> Ayarlar
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("admin/users") ?>">
                        <i class="iconsminds-add-user"></i> Kullanıcı İşlemleri
                    </a>
                </li>

                <li>
                    <a href="https://trendasist.com" target="_blank">
                        <i class="iconsminds-library"></i> Destek
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">
            <ul class="list-unstyled" data-link="booking">
                <li>

                    <!--
                    <a href="<?php echo base_url("admin/booking/newBookingForm"); ?>">
                        <i class="simple-icon-rocket"></i> <span class="d-inline-block">Yeni Randevu</span>
                    </a>

                  -->
                </li>
                <li class="active">
                    <a href="<?php echo base_url("admin/booking") ?>">
                        <i class="simple-icon-event"></i> <span class="d-inline-block">Randevular</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("admin/booking/complatedList") ?>">
                        <i class="simple-icon-check"></i> <span class="d-inline-block">Tamamlananlar</span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled" data-link="customer">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                        aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Müşteri İşlemleri</span>
                    </a>
                    <div id="collapseForms" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="<?php echo base_url("admin/customer") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Müşteri
                                        Listesi</span>
                                </a>
                                <a href="<?php echo base_url("admin/customer/new_form") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Müşteri Ekle</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                        aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Müşteri Meslek
                            Grupları</span>
                    </a>
                    <div id="collapseForms" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="<?php echo base_url("admin/customerJob") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Meslek Listesi
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/customerJob/new_form") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Yeni Meslek Tanımlama
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

            <ul class="list-unstyled" data-link="sms">

                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                        aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Müşteri SMS İşlemleri</span>
                    </a>
                    <div id="collapseForms" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="<?php echo base_url("admin/sendSmsCustomer") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Toplu Sms
                                        Gönder</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                        aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Personel</span>
                    </a>
                    <div id="collapseForms" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="<?php echo base_url("admin/sendSmsPersonel") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Toplu Sms
                                        Gönder</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                        aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Sms Şablonları</span>
                    </a>
                    <div id="collapseForms" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="<?php echo base_url("admin/sendSmsTemplate") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Sms Şablonları</span>
                                </a>
                            </li>
                            <li>
                                <a href="Ui.Forms.Components.html">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Özel Günler</span>
                                </a>
                            </li>
                            <li>
                                <a href="Ui.Forms.Components.html">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Hatırlatma
                                        Sms'leri</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <ul class="list-unstyled" data-link="muhasebe">

                <li>
                    <a href="#" data-toggle="collapse" data-target="#genelTanimlar" aria-expanded="false"
                        aria-controls="genelTanimlar" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Genel Tanımlar</span>
                    </a>
                    <div id="genelTanimlar" class="collapse">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="<?php echo base_url("tedarikciler") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Tedarikçiler</span>
                                </a>

                            </li>

                            <li>
                                <a href="<?php echo base_url("admin/sendSmsCustomer") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Depolar</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url("admin/sendSmsCustomer") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Kasa-Banka</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url("admin/sendSmsCustomer") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Ödeme
                                        Yöntemleri</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url("admin/sendSmsCustomer") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">KDV</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#" data-toggle="collapse" data-target="#urunIslemleri" aria-expanded="true"
                        aria-controls="urunIslemleri" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Ürün İşlemleri</span>
                    </a>
                    <div id="urunIslemleri" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">

                            <li>
                                <a href="<?php echo base_url("admin/sendSmsPersonel") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Kategoriler</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url("admin/sendSmsPersonel") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Ürünler/Ham
                                        Maddeler</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#" data-toggle="collapse" data-target="#faturaIslemleri" aria-expanded="true"
                        aria-controls="faturaIslemleri" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Satış İşlemleri</span>
                    </a>
                    <div id="faturaIslemleri" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="<?php echo base_url("admin/sendSmsCustomer") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Satış Faturası</span>
                                </a>

                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/sendSmsCustomer") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Tahsilatlar</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/sendSmsCustomer") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Müşteriler</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#" data-toggle="collapse" data-target="#faturaIslemleri" aria-expanded="true"
                        aria-controls="faturaIslemleri" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Alış İşlemleri</span>
                    </a>
                    <div id="faturaIslemleri" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="<?php echo base_url("admin/sendSmsCustomer") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Alış Faturası</span>
                                </a>

                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/sendSmsCustomer") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Ödeme</span>
                                </a>

                            </li>
                            <li>
                                <a href="<?php echo base_url("admin/sendSmsCustomer") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Tedarikçiler</span>
                                </a>

                            </li>
                        </ul>
                    </div>
                </li>





                <li>
                    <a href="#" data-toggle="collapse" data-target="#giderGiris" aria-expanded="true"
                        aria-controls="giderGiris" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Günlük İşlemler</span>
                    </a>
                    <div id="giderGiris" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="<?php echo base_url("admin/sendSmsTemplate") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Genel Giderler</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url("admin/sendSmsTemplate") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Personel
                                        Ödemeleri</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <!--   <ul class="list-unstyled" data-link="email">

                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true" aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Müşteri Email İşlemleri</span>
                    </a>
                    <div id="collapseForms" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="Ui.Forms.Components.html">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Toplu Email Gönder</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true" aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Personel</span>
                    </a>
                    <div id="collapseForms" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="Ui.Forms.Components.html">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Toplu Email Gönder</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true" aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Email Şablonları</span>
                    </a>
                    <div id="collapseForms" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="Ui.Forms.Components.html">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Doğum Günü</span>
                                </a>
                            </li>
                            <li>
                                <a href="Ui.Forms.Components.html">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Özel Günler</span>
                                </a>
                            </li>
                            <li>
                                <a href="Ui.Forms.Components.html">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Hatırlatma Sms'leri</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul> -->

            <ul class="list-unstyled" data-link="reports">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                        aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Forms</span>
                    </a>
                    <div id="collapseForms" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="Ui.Forms.Components.html">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Components</span>
                                </a>
                            </li>
                            <li>
                                <a href="Ui.Forms.Layouts.html">
                                    <i class="simple-icon-doc"></i> <span class="d-inline-block">Layouts</span>
                                </a>
                            </li>
                            <li>
                                <a href="Ui.Forms.Validation.html">
                                    <i class="simple-icon-check"></i> <span class="d-inline-block">Validation</span>
                                </a>
                            </li>
                            <li>
                                <a href="Ui.Forms.Wizard.html">
                                    <i class="simple-icon-magic-wand"></i> <span class="d-inline-block">Wizard</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

            <ul class="list-unstyled" data-link="charts">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                        aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Forms</span>
                    </a>
                    <div id="collapseForms" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="Ui.Forms.Components.html">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Components</span>
                                </a>
                            </li>
                            <li>
                                <a href="Ui.Forms.Layouts.html">
                                    <i class="simple-icon-doc"></i> <span class="d-inline-block">Layouts</span>
                                </a>
                            </li>
                            <li>
                                <a href="Ui.Forms.Validation.html">
                                    <i class="simple-icon-check"></i> <span class="d-inline-block">Validation</span>
                                </a>
                            </li>
                            <li>
                                <a href="Ui.Forms.Wizard.html">
                                    <i class="simple-icon-magic-wand"></i> <span class="d-inline-block">Wizard</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

            <ul class="list-unstyled" data-link="settings" id="settings">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                        aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Sistem Bilgileri</span>
                    </a>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="<?php echo base_url("admin/settings"); ?>">
                                    <i class="simple-icon-organization"></i> <span class="d-inline-block">Genel
                                        Ayarlar</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true"
                        aria-controls="collapseProduct" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Randevu Bilgileri</span>
                    </a>
                    <div id="collapseProduct" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="<?php echo base_url("admin/settingsBooking") ?>">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Randevu
                                        Ayarları</span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true"
                        aria-controls="collapseProfile" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Sms Ayarları</span>
                    </a>
                    <div id="collapseProfile" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="<?php echo base_url("admin/settingsSms") ?>">
                                    <i class="simple-icon-list"></i> <span class="d-inline-block">Sms Bilgileri</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true"
                        aria-controls="collapseBlog" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Email Ayarları</span>
                    </a>
                    <div id="collapseBlog" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="<?php echo base_url("admin/settingsEmail") ?>">
                                    <i class="simple-icon-list"></i> <span class="d-inline-block">E-Mail
                                        Bilgileri</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>