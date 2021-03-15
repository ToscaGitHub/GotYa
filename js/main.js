
// function sumValuesVrai(){
//     $('input[name="vrai"]').css('background-color','#48BFE3')
//     $('input[name="faux"]').css('background-color','gray')
// };

// function sumValuesFaux(){
//     $('input[name="vrai"]').css('background-color','gray')
//     $('input[name="faux"]').css('background-color','#e63946')
// };


function SuppAnec(val){


        var jqxhr = $.ajax({
            method: "POST",
            url: "user.php",
            data: { name: val }
        })
        .done(function(contenuDeLaPage) {
            $('#emplacementText').html(contenuDeLaPage);
        })
        .fail(function() {
            alert( "error" );
        })
        .always(function() {

        })
        

}