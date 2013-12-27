define("examples/web/1.0.0/main", [ "jquery", "artDialog" ], function (require) {

    var $ = require('jquery');
    $('div.table-list tr').hover(
        function(){
            $(this).find('td').css('background-color','#FFFCED');
        },
        function(){
            $(this).find('td').css('background-color','#FFF');
        }
    )

    $('#btn').click(function(){
        art.dialog({id:'map',content:'?m=admin&c=index&a=public_map', title:'后台地图', width:'700', height:'500', lock:true});

    });

});
