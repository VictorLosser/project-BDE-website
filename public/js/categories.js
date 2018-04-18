$(function () {

    const noCategory = $('#no-category');
    const formVetements = $('#CategoryVetements');
    const formVaisselle = $('#CategoryVaisselle');
    const formAccessoires = $('#CategoryAccessoires');
    const productDisplay = $('#products-display');
    const slider = $('#slider-range');

    // When the page is loaded, directly display products
    getProductsList();

    function getProductsList(){
        $.get($(noCategory).attr('action'), function (data) {
            $(productDisplay).html('');
            $(productDisplay).append(data);
        }, "html");
    }

    function getProductsbyCategory(category){
        $.get($(formVetements).attr('action'), {category: category}, function (data) {
            $(productDisplay).html('');
            $(productDisplay).append(data);
        }, "html");
    }

    function getProductsbyPrices(prices){
        $.get($(formVetements).attr('action'), {prices: prices}, function (data) {
            $(productDisplay).html('');
            $(productDisplay).append(data);
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

    $(slider).slider({
        range: true,
        min: 0,
        max: 100,
        values: [ 0, 100 ],
        slide: function( event, ui ) {
            $("#amount").val( ui.values[0] + " € - " + ui.values[1] + " €" );
        }
    });
    $("#amount").val( $(slider).slider( "values", 0 ) + " € - " + $(slider).slider( "values", 1 ) + " €");

    $(slider).on( "slidechange", function() {
        const prices = $(slider).slider("values");

        getProductsbyPrices(prices);

    } );
});