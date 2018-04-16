$( document ).ready(function() {

    /* LARAVEL FORM CHECK SETUP */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //WHEN ARRIVING ON THE PAGE, DIRECTLY GET DATA AND DISPLAY
    getData();

    /* GET DATA AND DISPLAY */
    function getData() {
        $.ajax({
            dataType: 'json',
            url: '/evenements/indexdata',
        }).done(function (data) {

            var	rows = '';
            $.each( data, function( key, value ) {
                rows = rows + '<tr>';
                rows = rows + '<td>'+value.id+'</td>';
                rows = rows + '<td>'+value.title+'</td>';
                rows = rows + '<td>'+value.description+'</td>';
                rows = rows + '<td>'+value.date_event+'</td>';
                rows = rows + '<td>'+value.repeat_interval+'</td>';
                rows = rows + '<td>'+value.price+'</td>';

                rows = rows + '<td data-id="'+value.id+'">';
                rows = rows +
                    '<a href="/evenement/' + value.id + '/edit">' +
                    '<button class="btn btn-info" type="submit" style="width: 100%;">Modifier</button>' +
                    '</a>';
                rows = rows + '<button class="btn btn-danger remove-item" style="width: 100%;">Supprimer</button>';
                rows = rows + '</td>';
                rows = rows + '</tr>';
            });

            $("tbody").html(rows);
        });
    }

    /* DELETE AN EVENT AND REFRESH DATA */
    $("body").on("click",".remove-item",function(){
        var id = $(this).parent("td").data('id');
        var c_obj = $(this).parents("tr");
        var urlWithId = '/evenement/' + id;

        $.ajax({
            dataType: 'json',
            type:'DELETE',
            url: urlWithId,
            data:{id:id}
        }).done(function(data){
            c_obj.remove();
        });

        /* Refresh data */
        getData();

    });
});