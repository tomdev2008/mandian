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

    window._alert = function( _c ){
        art.dialog({
            title: '提示',
            content: _c,
            icon: 'warning',
            lock: true,
            background: '#999', // 背景色
            ok: function () {}
        });
    }

    window._confirm = function(_t, _call){
        if(typeof _call != 'function'){
            _call = function(){};
        }
        art.dialog({
            title: '提示',
            content: _t,
            icon: 'question',
            cancelVal: '关闭',
            lock: true,
            background: '#999', // 背景色
            ok: function () {
                _call();
            },
            cancel:function(){}
        });
    }
});
