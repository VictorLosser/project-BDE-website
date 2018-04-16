$(function () {

    // Get the form.
    var formVetements = $('#CategoryVetements');
    var formVaisselle = $('#CategoryVaisselle');
    var formAccessoires = $('#CategoryAccessoires');

    $(formVetements).submit(function (event) {
        event.preventDefault();

        var category = $('#category-Vetements').val();

        $.get($(formVetements).attr('action'), {category: category}, function (data) {
            $('#products-display').html('');
            $('#products-display').append(data);
        }, "html");
    });
    $(formVaisselle).submit(function (event) {
        event.preventDefault();

        var category = $('#category-Vaisselle').val();

        $.get($(formVaisselle).attr('action'), {category: category}, function (data) {
            $('#products-display').html('');
            $('#products-display').append(data);

        }, "html");
    });
    $(formAccessoires).submit(function (event) {
        event.preventDefault();

        var category = $('#category-Accessoires').val();

        $.get($(formAccessoires).attr('action'), {category: category}, function (data) {
            $('#products-display').html('');
            $('#products-display').append(data);

        }, "html");
    });
});