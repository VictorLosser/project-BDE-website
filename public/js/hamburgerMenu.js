var mediaSize = window.matchMedia("(max-width: 768px)")
resizePage(mediaSize) // Call listener function at run time
mediaSize.addListener(resizePage) // Attach listener function on state changes

function resizePage(mediaSize) {
    if (mediaSize.matches) { // If media query matches
        $('#headSandwichIcone').show();
        $('#btnInsCo').hide();
    }
    else {
        $('#headSandwichIcone').hide();
        $('#headMenu').slideUp();
        $('#popupMenuBackground').hide();
        $('#btnInsCo').show();
    }
}

//=document.ready
$(document).ready(function(){
    resizePage(mediaSize);
    $('#headSandwichIcone').click(animMenu);
    $('#popupMenuBackground').click(animMenu);
    $('.headMenu_title').click(function () {
        if ($('div', this).is(":hidden")) {
            $('div', this).slideDown();
        } else {
            $('div:visible', this).slideUp();
        }
    })
});

function animMenu() {

    if ($('#headMenu').is(":hidden")) {
        /*animation menu vers croix*/
        $('#popupMenuBackground').fadeIn();
        /*animation : burger vers croix*/
        $('#croixBarre2').css({"opacity":"0"});
        $('#croixBarre1').css({"transform-origin":"0% 50%","transform":"rotate(39deg)"});
        $('#croixBarre3').css({"transform-origin":"0% 50%","transform":"rotate(-39deg)"});
        //cacher la searchBar :
        $('#searchBar').slideUp();
        //ajouter une division sous la barre de recherche (menu) :
        $('header').css({"height":"initial"});
        $('#headMenu').slideDown();

    }
    else {
        /*animation croix vers menu*/
        $('#popupMenuBackground').fadeOut();
        /*animation : croix vers burger*/
        $('#croixBarre1').css({"transform-origin":"0% 0%","transform":"rotate(0deg)"});
        $('#croixBarre3').css({"transform-origin":"0% 100%","transform":"rotate(0deg)"});
        $('#croixBarre2').css({"opacity":"1"});
        //cacher la searchBar :
        $('#searchBar').slideDown();
        //retirer le menu :
        $('header').css({"height":"initial"});
        $("#headMenu").slideUp();

    }
}