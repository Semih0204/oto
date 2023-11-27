<div id="tab3">
    <div>
        <div class="form-group row ">
            <label class="col-sm-2 col-form-label"> <strong> Misyon</strong></label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="mission" placeholder="Şirketinizin misyonunu yazabilirsiniz."><?php echo $item->mission; ?></textarea>
                <small class="form-text text-muted">Şirkete ait misyon bilgisini yazınız. </small>
            </div>
        </div>
        <div class="form-group row ">
            <label class="col-sm-2 col-form-label"> <strong> Vizyon</strong></label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="vision" placeholder="Şirketinizin vizyon yazabilirsiniz."><?php echo $item->vision; ?></textarea>
                <small class=" form-text text-muted">Şirkete ait vizyon bilgisini yazınız.</small>
            </div>
        </div>
        <div class="form-group row ">
            <label class="col-sm-2 col-form-label"> <strong> Slogan</strong></label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="slogan" placeholder="Arama motorları için açıklama yazınız."><?php echo $item->slogan; ?></textarea>
                <small class="form-text text-muted">Şirkete ait slogan bilgisini yazınız.</small>
            </div>
        </div>
    </div>
</div>