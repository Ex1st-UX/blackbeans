// Вешаем AJAX на отправку формы по обратной связи
$('#feedback_submit').on('submit', function (e) {
    e.preventDefault();

    var arFeedbackData = {
        name: $('#w3lName').val(),
        email: $('#w3lSender').val(),
        subject: $('#w3lSubect').val(),
        text: $('#w3lMessage').val(),
        _token: $('meta[name="csrf-token"]').attr('content'),
    };

    $.ajax({
        url: '/contact/submit',
        dataType: 'JSON',
        method: 'POST',
        data: arFeedbackData,
        success: function (response) {
            $('#feedback_modal_button').trigger('click');
        },
        error: function () {
            alert('Ошибка, Попробуйте снова.')
        }
    });
});


