var config = {
    _token: $('meta[name="csrf-token"]').attr('content'),
};

function preloaderAdd(target, styles) {
    $(
        '<div class="spinner-border '+ styles +'" role="status">' +
        '<span class="sr-only">Loading...</span>' +
        '</div>'
    ).appendTo(target);
}

function preloaderRemove() {
    $('.spinner-border').detach();
    $('.sr-only').detach();
}
