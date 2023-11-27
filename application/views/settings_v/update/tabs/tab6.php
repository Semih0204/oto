<div id="tab6">
    <div>


        <div class="form-group row ">

            <label class="col-sm-2 col-form-label"> <strong>Logo Seçiniz</strong></label>

            <div class="col-sm-6">
                <input type="file" class="form-control " name="logo_url">
                <small class="form-text text-muted">Şirket logosunu seçiniz.jpg | jpeg | png formatları desteklenmektedir.</small>
            </div>
            <div class="col-sm-4">
                <img width="240px" src="<?php echo base_url("uploads/$viewFolder/$item->logo_url") ?>" alt="<?php echo "$item->companyName"; ?>" class="img-responsive">
            </div>

        </div>





    </div>
</div>