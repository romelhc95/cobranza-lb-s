+function ($, window) {
    function calc() {
        var amount = parseFloat($('.amount-input').val());
        var utility = parseFloat($('#utility').val());
        var total = parseFloat(amount * (utility/100)) + parseFloat(amount);
        var quote = parseFloat(total) / parseFloat($('#payment_number').val())

        $('.total-box #total_show').html("S/. " + total.toFixed(2));
        $('.total-box #quote').html("S/. " + quote.toFixed(2));
        if (isNaN(total)) {
            $('.total-box').addClass('hidden');
        } else {
            $('.total-box').removeClass('hidden');
        }
    }
    $('body').on('keyup', '.amount-input', function (e) {
        return calc();
    });
    $('body').on('change', '#utility', function () {
        return calc();
    });
    $('body').on('change', '#payment_number', function () {
        return calc();
    });
}(jQuery, window);

$(document).ready(function() {
    $('#users').DataTable({
        responsive: true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
    $('#loans').DataTable({
        responsive: true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
    $('#sectors').DataTable({
        responsive: true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
    $('#payment_create').DataTable({
        responsive: true,
        searching: false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
    $('#payment_index').DataTable({
        responsive: true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});

$(document).on("click", "#btn-modal", function () {
    var userId= $(this).attr('data-item-user-id');
    var loanId= $(this).attr('data-item-loan-id');
    $("#user_id").val(userId);
    $("#loan_id").val(loanId);
});


$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });


