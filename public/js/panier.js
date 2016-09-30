$(document).ready(function() {
   // demarre de Jquery
   $(function(){


    // connection à notre Compte par la clef primaire (identifiant)
    Stripe.setPublishableKey('pk_test_wFtvFcq92uoF34mXNUrCYhK5');



    // submit : quand je soumet mon formulaire
    $('#payment-form').submit(function(event) {
      console.log("coucou");

      // Disable the submit button to prevent repeated clicks:
      $(this).find('#send').attr('disabled');

      // Request a token from Stripe:
      Stripe.card.createToken({
         number: $('.card-number').val(),
         cvc: $('.card-cvc').val(),
         exp_month: $('.card-expiry-month').val(),
         exp_year: $('.card-expiry-year').val()
        },
       function (status, response) {
         if (response.error) { // Ah une erreur !
           // On affiche les erreurs
           $('#payment-form').find('.payment-errors').text(response.error.message);
           $('#payment-form').find('button').prop('disabled', false); // On réactive le bouton
         } else { // Le token a bien été créé
           var token = response.id; // On récupère le token
           // On crée un champs cachée qui contiendra notre token
           $('#payment-form').append($('<input type="hidden" name="stripeToken" />').val(token));
           $('#payment-form').get(0).submit(); // On soumet le formulaire
         }
        });

      // Prevent the form from being submitted:
      return false;
    });
   });
});
