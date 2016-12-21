$(document).ready(function() {
    $("#myform input[type=submit]").click(function(event){
        event.preventDefault();
        var bReturn = true;
        $('label[for="Titre"]').css({color: ''});
        if ( jQuery.trim($("#Titre").val()).length==0 ) {
            $('label[for="Titre"]').css({color: 'red'});
            $('#erreur_form').css({color: 'red'});
            $('#erreur_form').text('Veuillez saisir tous les champ *.');
            bReturn = false;
        }
        $('label[for="Message"]').css({color: ''});
        if ( jQuery.trim($("#Message").val()).length==0 ) {
            $('label[for="Message"]').css({color: 'red'});
            $('#Message').css({border: 'red'});
            $('#erreur_form').css({color: 'red'});
            $('#erreur_form').text('Veuillez saisir tous les champ *.');
            bReturn = false;
        }
        $('label[for="Mailfrom"]').css({color: ''});
        if ( jQuery.trim($("#Mailfrom").val()).length==0 ) {
            $('label[for="Mailfrom"]').css({color: 'red'});
            $('#Mailfrom').css({border: 'red'});
            $('#erreur_form').css({color: 'red'});
            $('#erreur_form').text('Veuillez saisir tous les champ *.');
            bReturn = false;
        }
        if(bReturn){
            alert('Votre demande a bien été transmise à lampe-videoprojecteur.info.Un mail de confirmation vous sera envoyé. Nous vous répondrons dans les plus brefs délais');
            $(this).unbind("click").click(function(){
            });
            $(this).trigger("click");
        }
    });
});