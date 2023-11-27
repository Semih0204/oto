<div id="tab2">
    <div>

        <div class="form-group row ">

            <label class="col-sm-2 col-form-label"> <strong> Şube Adresi</strong></label>

            <div class="col-sm-10">

                <textarea class="form-control" rows="5" name="adress" placeholder="Şube Adresini Yazınız."></textarea>
                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek adresini giriniz.</small>

                <?php if (isset($formError)) { ?>
                    <small class="input-form-error pull-right"><?php echo form_error("adress") ?></small>
                <?php } ?>
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label><strong> İl</strong></label>
                <input type="text" class="form-control onlychar" name="province" placeholder="İl Yazınız.">
                <small class="form-text text-muted">Şubelerinizin bulunduğu ili yazınız.</small>

                <?php if (isset($formError)) { ?>
                    <small class="input-form-error pull-right"><?php echo form_error("province") ?></small>
                <?php } ?>
            </div>

            <div class="form-group col-md-6">
                <label><strong> İlçe</strong></label>
                <input type="text" class="form-control onlychar" name="district" placeholder="İlçe Yazınız.">
                <small class="form-text text-muted">Şubelerinizin bulunduğu ilçeyi yazınız.</small>

                <?php if (isset($formError)) { ?>
                    <small class="input-form-error pull-right"><?php echo form_error("district") ?></small>
                <?php } ?>

            </div>

        </div>



        <hr>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label><strong> Sabit Telefon-1</strong></label>
                <input type="text" class="form-control phone " name="phone1" placeholder="Sabit Telefon Yazınız.">
                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek sabit telefon numarasını giriniz.</small>

                <?php if (isset($formError)) { ?>
                    <small class="input-form-error pull-right"><?php echo form_error("phone1") ?></small>
                <?php } ?>
            </div>
            <div class="form-group col-md-6">
                <label><strong> Sabit Telefon-2</strong></label>
                <input type="text" class="form-control phone" name="phone2" placeholder="Sabit Telefon Yazınız(Zorunlu Değildir).">
                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek sabit telefon numarasını giriniz.</small>

            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label><strong> Fax-1</strong></label>
                <input type="text" class="form-control phone " name="fax1" placeholder="Fax Numarasını Yazınız(Zorunlu Değildir).">
                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek fax numarasını giriniz.</small>

                <?php if (isset($formError)) { ?>
                    <small class="input-form-error pull-right"><?php echo form_error("fax1") ?></small>
                <?php } ?>
            </div>
            <div class="form-group col-md-6">
                <label><strong> Fax-2</strong></label>
                <input type="text" class="form-control phone" name="fax2" placeholder="Fax Numarasını Yazınız(Zorunlu Değildir).">
                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek fax numarasını giriniz.</small>

            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label><strong>GSM-1</strong></label>
                <input type="text" class="form-control phone" name="gsm1" placeholder="Cep Telefon Yazınız(Zorunlu Değildir).">
                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek cep telefon numarasını giriniz.</small>
            </div>
            <div class="form-group col-md-6">
                <label><strong>GSM-2</strong></label>
                <input type="text" class="form-control phone" name="gsm2" placeholder="Cep Telefon Yazınız(Zorunlu Değildir).">
                <small class="form-text text-muted">Şubelerinizin, müşteriler tarafından görülecek cep telefon numarasını giriniz.</small>
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label><strong>Şirket Mail Adresi</strong></label>
                <input type="text" class="form-control " name="email" placeholder="Şirkete ait email adresi yazınız.">
                <small class="form-text text-muted">Şirketinizin, müşteriler tarafından görülecek email adresini giriniz.</small>
            </div>
        </div>


    </div>
</div>