jQuery(function ($) {
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"], input[type="radio"]').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
    });
    //toastr
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    const allEditors = document.querySelectorAll('.editor');
    for (let i = 0; i < allEditors.length; ++i) {
        ClassicEditor.create(allEditors[i],{
            ckfinder: {
                // The URL that the images are uploaded to.
                uploadUrl: '/admin/products/upload-descp-image',
                allowedContent: false
            }
        });
    }


    $(".toggle-display").click(function () {
        $(this).parents('tr').find('.display').toggleClass('d-none');
    });

    $('[data-toggle="tooltip"]').tooltip();

    function valueFileInput(e){
        e.parent('label').next('span').remove();
        e.parent('label').after('<span>' + e.val().replace("C:\\fakepath\\", "") + '</span>');
    }
    $('input[type="file"]').on('change', function () {
        valueFileInput($(this))
    });
    $('.on-file').on('change', 'input[type="file"]', function () {
        valueFileInput($(this))
    });
});
