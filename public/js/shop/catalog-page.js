// Фильтр по категориям
$('.filter-category-item').on('click', function () {

    var filterItem = {
        item: $(this).data('filter'),
        _token: $('meta[name="csrf-token"]').attr('content')
    }

    $.ajax({
        url: '/catalog/filterByCategory',
        type: 'POST',
        dataType: 'JSON',
        data: filterItem,
        success: function () {
             console.log('success');
        },
        errro: function () {
            alert('Ошибка');
        }
    });
});
