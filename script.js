$('.bd, .expected_benefits').on('keyup click', function () {
        var form = $("#calculator__form");
        $.ajax({
            url: 'calculator.php',
            type: 'POST',
            dataType: 'json',
            data: form.serialize(),
            success: function (data) {
                $(".quarter").val(data.quarter + ' zł');
                $(".half_year").val(data.half_year + ' zł');
                $(".one_time").val(data.one_time + ' zł');
                $(".calculated_age").val(data.calculated_age);
            },
            error: function (request, status, error) {
                console.log(request.responseText);
            }
        });
    }
);

$('form').submit(function (e) {
    e.preventDefault();
    var form = $("#calculator__form");
    $.ajax({
        url: 'submit.php',
        type: 'POST',
        dataType: 'json',
        data: form.serialize(),
        success: function (data) {
            $('p.modal_content').text('Dziękujemy za wypełnienie formularza');
            $("#myModal").modal()
        },
        error: function (data) {
            $('p.modal_content').text('Proszę wypełnić formularz poprawnie, ponieważ pojawiły się w nim błędy lub puste pola');
            $("#myModal").modal()
        }
    });
});

$(document).ready(function(){
    var d = new Date();
    var a = d.getDate() + "-" + (d.getMonth() + 1) + "-" + d.getFullYear();
    var min_y = d.getFullYear() - 120;
    var max_y = d.getFullYear() - 17;
    d.setFullYear(min_y);
    $('.bd').attr('min', d.getFullYear()+ "-" + (("0" + (d.getMonth() + 1)).slice(-2))+ "-" + (("0" + d.getDate()).slice(-2)));
    d.setFullYear(max_y);
    $('.bd').attr('max', d.getFullYear()+ "-" + (("0" + (d.getMonth() + 1)).slice(-2))+ "-" + (("0" + d.getDate()).slice(-2)));

});
