$(function () {
    $('.checkbox_wrapper').on('click', function () { // this checkbox_wrapper
        $(this).parents('.card').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));// tim den ten class goc chua checkbox_wrapper 
    });

    $('.checkall').on('click', function () {
        $(this).parents().find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
        $(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));
    });
});

