$(function () {

    // Get the form.
    var formVetements = $('#CategoryVetements');
    var formVaisselle = $('#CategoryVaisselle');
    var formAccessoires = $('#CategoryAccessoires');

    $(formVetements).submit(function (event) {
        event.preventDefault();

        var category = $('#category-Vetements').val();

        $.get($(formVetements).attr('action'), {category: category}, function (data) {
            $('#tut').text(data);

        });
    });
    $(formVaisselle).submit(function (event) {
        event.preventDefault();

        var category = $('#category-Vaisselle').val();

        $.get($(formVaisselle).attr('action'), {category: category}, function (data) {
            $('#tut').text(data);

        });
    });
    $(formAccessoires).submit(function (event) {
        event.preventDefault();

        var category = $('#category-Accessoires').val();

        $.get($(formAccessoires).attr('action'), {category: category}, function (data) {
            $('#tut').text(data);

        });
    });
});