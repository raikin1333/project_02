$(document).ready(function() {
    $('#update-button').click(function() {
        var newUrl = $('#url-input').val();
        $('#web-iframe').attr('src', newUrl);
    });
});