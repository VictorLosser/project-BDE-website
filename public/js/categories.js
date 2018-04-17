$(function () {

    const noCategory = $('#no-category');
    const formVetements = $('#CategoryVetements');
    const formVaisselle = $('#CategoryVaisselle');
    const formAccessoires = $('#CategoryAccessoires');

    // When the page is loaded, directly display products
    getProductsList();

    function getProductsList(){
        $.get($(noCategory).attr('action'), function (data) {
            $('#products-display').html('');
            $('#products-display').append(data);
        }, "html");
    }

    function getProductsbyCategory(category){
        $.get($(formVetements).attr('action'), {category: category}, function (data) {
            $('#products-display').html('');
            $('#products-display').append(data);
        }, "html");
    }

    $(noCategory).submit(function (event) {
        event.preventDefault();

        getProductsList();
    });

    $(formVetements).submit(function (event) {
        event.preventDefault();

        const category = $('#category-Vetements').val();

        getProductsbyCategory(category);
    });

    $(formVaisselle).submit(function (event) {
        event.preventDefault();

        const category = $('#category-Vaisselle').val();

        getProductsbyCategory(category);
    });

    $(formAccessoires).submit(function (event) {
        event.preventDefault();

        const category = $('#category-Accessoires').val();

        getProductsbyCategory(category);
    });
});