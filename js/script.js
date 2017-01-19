$ = jQuery;
$(function(){
    $(".js-ajax-php-json").submit(function() {

        var improvement = document.getElementById('improvContent').value;
        var team = document.getElementById('improvTeam').value;
        $('#myModal').modal('toggle');

        var data = {
            "improvment": improvement, 'team':team
        };
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "function/engine.php", //Relative or absolute path to response.php file
            data: data,
            success: function (data) {
                document.getElementById('improvContent').value = null;
                alert("Form submitted successfully.\nReturned json: " + data["json"]);
            }
        });
        return false;
    });

});
