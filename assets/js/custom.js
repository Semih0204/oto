$(document).ready(function() {

    $('.phone').mask('0(000) 000-00-00', { placeholder: "_(___) ___ __ -__" });
    $('.onlychar').mask('SSSSSSSSSSSSSSSSSSSS');
    $('.onlyNumber').mask('00000000000000000000');
    $('.tcNo').mask('00000000000');

    $('.money').mask('000.000.000.000.000,00', { reverse: true });
    $('.password').mask('AAAAAA');

    $('.countdown').keyup(function() { // id'si geri olan nesne için keyup fonksiyonu
        var max = 760; // karakter sınırı
        var len = $(this).val().length; // textarea içine girilen değerleri say
        if (len >= max) { // girilen değer verilen sınır değere eşit veya büyük ise
            $('.countdownText').text('Karakter Limitini Aştınız');
        } else { // girilen değer verilen sınır değerden küçük ise
            var char = max - len; // sınır değerden girilen değeri çıkar
            $('.countdownText').text(char); // g-sayim id'li nesne içine bas
        }
    });




    $(".data-table ").on("click", ".remove-btn-sweet", function() {

        var $data_url = $(this).data("url");

        swal.fire({
            title: 'Emin misiniz?',
            text: "Bu işlemi geri alamayacaksınız!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText: "Hayır"
        }).then(function(result) {
            if (result.value) {

                window.location.href = $data_url;
            }
        });

        return false;
    })

    $(".remove-btn-sweet").click(function() {

        var $data_url = $(this).data("url");

        swal.fire({
            title: 'Emin misiniz?',
            text: "Bu işlemi geri alamayacaksınız!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText: "Hayır"
        }).then(function(result) {
            if (result.value) {

                window.location.href = $data_url;
            }
        });

        return false;
    })

    $(".data-table ").on("click", ".isActive", function() {
        //console.log('test');
        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {

            $.post($data_url, { data: $data }, function(response) {

            });

        }
    })


    $(".data-table ").on("change", ".isCover", function() {
        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {

            $.post($data_url, { data: $data }, function(response) {
                window.location.reload();
            });

        }
    })

    $(".imageIsCover").change(function() {
        //console.log('test');
        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {

            $.post($data_url, { data: $data }, function(response) {
                /* alert(response); */
            });

        }

    })


    $(".imageIsActive").change(function() {
        //console.log('test');
        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {

            $.post($data_url, { data: $data }, function(response) {
                /* alert(response); */
            });

        }

    })



    /*    $(".sortable").on("sortupdate", function() {
           alert();
           var $data = $(this).sortable("serialize");
           var $data_url = $(this).data("url");

           $.post($data_url, { data: $data }, function(response) {})

       }) */




})