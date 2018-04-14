/*POPUP évènements*/
$(function(){
    /*Ajout de l'évenement aux boutons*/
    $('.eventInscription').click(function(){
        $('#popupAll, #popupBackground, #inscriptionPopup').fadeIn();
        });
    $('.eventConnexion').click(function(){
        $('#popupAll, #popupBackground, #connexionPopup').fadeIn();
    });
    $('.croixIconPopup').click(function(){
        $('#popupAll, #popupBackground, #inscriptionPopup, #connexionPopup').fadeOut();
    });

    /*Evenements de page POPUP elle-même*/
    $('#popupBackground').click(function(){
        $('#popupAll, #popupBackground, #inscriptionPopup, #connexionPopup').fadeOut();
    });
    $('#popupMenuBackground').click(function(){
        $('#popupMenuBackground').fadeOut();
    });
});