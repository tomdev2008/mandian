define("projects/1.0.0/common", ['cookie' ], function (require) {

    $('div.table-list tr').hover(
        function(){
            $(this).find('td').css('background-color','#FFFCED');
        },
        function(){
            $(this).find('td').css('background-color','#FFF');
        }
    );
    //全局的弹出窗

    window._alert = function( _c, _y){
        $.messager.alert('提示', _c, _y);
    }

    window._confirm = function(_t, _call){
        if(typeof _call != 'function'){
            _call = function(){};
        }
        $.messager.confirm('提示', _t, function(r){
            if (r){
                _call();
            }
        });
    }

    //退出
    $('#logout').click(function(){
        location.href = crm_base_url + '/system/welcome/logout';
    });

});
