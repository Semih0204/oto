<div id="tab5">
    <div>

        <div class="form-group row ">
            <label class="col-sm-2 col-form-label"> <strong> Açıklama</strong></label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="description" placeholder="Arama motorları için açıklama yazınız."><?php echo $item->description; ?></textarea>
                <small class="form-text text-muted">Buraya yazılmış değerler web sitesinin ön yüzünde görünmemektedir. Bu değerler sadece Google,Yandex gibi arama motorlarında daha üst seviyelerde görülmek için eklenmiştir.</small>
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-2 col-form-label"> <strong> Anahtar Kelimeler</strong></label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="keywords" placeholder="Arama motorları için anahtar kelime yazınız."><?php echo $item->keywords; ?></textarea>
                <small class="form-text text-muted">Buraya yazılmış değerler web sitesinin ön yüzünde görünmemektedir. Bu değerler sadece Google,Yandex gibi arama motorlarında daha üst seviyelerde görülmek için eklenmiştir. Anahtar kelimeler arasında mutlaka virgül (,) kullanınız.</small>
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-2 col-form-label"> <strong> Google Map Kodu </strong></label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="googleMap" placeholder="Konumun gösterilebilmesi için Google Konum bilgisini yazınız."><?php echo $item->googleMap; ?></textarea>
                <small class="form-text text-muted">Web sitesini ziyaret eden kullanıcıların işletme merkezinin konum bilgisini görebilmesi için gereklidir.</small>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label><strong>Yazar Bilgisi</strong></label>
                <input type="text" class="form-control" name="author" value="<?php echo $item->author; ?>" placeholder="ABC Güzellik Merkezinin Randevu Sistemi">
                <small class="form-text text-muted">Web Sitesinin sahibi şirketin ismi yazılabilir(ABC Güzellik Merkezinin Randevu Sistemi).</small>
            </div>
            <div class="form-group col-md-6">
                <label><strong>Google Analystic Kodu</strong></label>
                <input type="text" class="form-control" name="googleAnalystic" value="<?php echo $item->googleAnalystic; ?>" placeholder="Google tarafından verilen Analystic kodunu yazınız.">
                <small class="form-text text-muted">Site ziyaretçilerinin izlenebilmesi için Google Analystic hesabını aktif ediniz.</small>
            </div>

        </div>

    </div>
</div>