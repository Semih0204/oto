<div id="tab1">
    <div>

        <div class="form-group row ">
            <label class="col-sm-2 col-form-label"> <strong> Şirket İsmi</strong></label>
            <div class="col-sm-10">
                <input type="text" class="form-control " name="companyName" placeholder="Şirket İsmini Yazınız.">
                <small class="form-text text-muted">Şirketin yada Web sitesinin tam ismini yazınız.</small>
                <?php if (isset($formError)) { ?>
                    <small class="input-form-error pull-right"><?php echo form_error("companyName") ?></small>
                <?php } ?>
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-2 col-form-label"> <strong> Web Sayfasının Adresi (URL)</strong></label>
            <div class="col-sm-10">
                <input type="text" class="form-control " name="url" placeholder="Web Sitesi İsmini Yazınız.">
                <small class="form-text text-muted">Web sitesinin tam ismini yazınız.(https://companyname.com)</small>
                <?php if (isset($formError)) { ?>
                    <small class="input-form-error pull-right"><?php echo form_error("url") ?></small>
                <?php } ?>
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-2 col-form-label"> <strong> Web Sayfasının Başlığı </strong></label>
            <div class="col-sm-10">
                <input type="text" class="form-control " name="title" placeholder="Web Sitesi İsmini Yazınız.">
                <small class="form-text text-muted">Web sitesinin başlığını yazınız.("ABC Güzellik Bakım Merkezi")</small>
                <?php if (isset($formError)) { ?>
                    <small class="input-form-error pull-right"><?php echo form_error("title") ?></small>
                <?php } ?>
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-2 col-form-label"> <strong> Çalışma Saatleri</strong></label>
            <div class="col-sm-10">
                <input type="text" class="form-control " name="workingHours" placeholder="Web Sitesi İsmini Yazınız.">
                <small class="form-text text-muted">Çalışma saatleri ile ilgili genel bilgi. Örn: Hafta İçi 08:00-18:00 - Cumartesi-Pazar 10:00-23:00</small>
                <?php if (isset($formError)) { ?>
                    <small class="input-form-error pull-right"><?php echo form_error("workingHours") ?></small>
                <?php } ?>
            </div>
        </div>

    </div>
</div>