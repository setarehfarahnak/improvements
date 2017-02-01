$ = jQuery;

$(function(){

    $.getJSON("function/improvement_get.php",
        function (vals) {
            var dataArray = JSON.parse(vals);
            var data = dataArray['json'];
            for (i = 0; i < data.length; i++) {
                $('<p>').html(data[i]['improv_content']+' BY team --> '+data[i]['improv_team']).attr('class','imporovments-content').appendTo('.imporovments');
            }
            var teamList = dataArray['team'];
            console.log(teamList);



            for (var team in teamList) {
                $('<p>').html(team +' BY team --> '+ teamList[team].length).attr('class','teams-list').appendTo('.teams');
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
                improvement_get(JSON.parse(data));
            }
        });
        return false;
    });

});

function improvement_get(data){
    $('.imporovments-content').remove();
    var improvments_list = data['json'];
    for (i = 0; i < improvments_list.length; i++) {
        $('<p>').html(improvments_list[i]['improv_content']+' BY team --> '+improvments_list[i]['improv_team']).attr('class','imporovments-content').appendTo('.imporovments');
    }
    $('.teams-list').remove();
    var team_list = data['team'];
    for (var team in team_list) {
        $('<p>').html(team +' BY team --> '+ team_list[team].length).attr('class','teams-list').appendTo('.teams');
    }

}

