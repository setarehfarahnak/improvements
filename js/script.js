$ = jQuery;
$(function(){

    $.getJSON("function/improvement_get.php",
        function (vals) {
            var data = JSON.parse(vals['json']);
            console.log(data.length);
            for (i = 0; i < data.length; i++) {
                $('<p>').html(data[i]['improv_content']+' BY team --> '+data[i]['improv_team']).attr('class','imporovments-content').appendTo('.imporovments');
            }
    });

    $(".js-ajax-php-json").submit(function() {
        var improvement = document.getElementById('improvContent').value;
        var team = document.getElementById('improvTeam').value;
        $('#myModal').modal('toggle');
        var data = {
            'improvment': improvement,
            'team':team
        };
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "function/improvement_create.php",
            data: data,
            success: function (data) {
                document.getElementById('improvContent').value = null;
                console.log(JSON.parse(data["json"]));
                improvement_get(JSON.parse(data["json"]));
            }
        });
        return false;
    });

});

function improvement_get(data){
    $('.imporovments-content').remove();
    for (i = 0; i < data.length; i++) {
        $('<p>').html(data[i]['improv_content']+' BY team --> '+data[i]['improv_team']).attr('class','imporovments-content').appendTo('.imporovments');
    }
}

