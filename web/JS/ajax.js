$(document).ready(function(){

    $("#btn-simulation").click(function(){

        $('#amount').empty();
        let duration = $('#input_duration').val();
        let asset = $('#input_asset').val();

        $.ajax({
            url : '../simulation',
            type : 'POST', 
            data : {duration: duration, asset: asset},
            success : function(data) {
                $('form').append('<p id="amount">' + data + '</p>');
            }
         });

    });

    $("#btn-invesment").click(function(){

        let amount = $('#input_amount').val();
        let user = $('#input_user').val();;
        let project = $('#input_project').val();

        $.ajax({
            url : '../invesment',
            type : 'POST', 
            data : {amount: amount, user: user, project: project},
            success : function() {
                alert("Votre investissement a bien été pris en compte");
            }
         });

    });

});