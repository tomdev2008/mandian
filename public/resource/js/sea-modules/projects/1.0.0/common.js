define("projects/1.0.0/common", ['cookie' ], function (require) {

    $('.table-list').find('tr').hover(
        function(){
            $(this).find('td').css('background-color','#FFFCED');
        },
        function(){
            $(this).find('td').css('background-color','#FFF');
        }
    );

    //表单提交
    window.doForm = function(_url, _data, _call){
        var art = _alert('提交中，请稍后……')
        if(typeof _call != 'function'){
            _call = function(){};
        }
        $.ajax({
            url: _url,
            type:'post',
            data: _data,
            dataType: 'json',
            success: function(data){
                art.close();
                _call(data);
            },
            error: function(){
                art.close();
                _alert('出错了');
            }
        });
        return false;
    }

    //全局的弹出窗

    window._alert = function( _c, _call ){
        if(typeof _call != 'function'){
            _call = function(){};
        }
        return window.top.art.dialog({
            title: '提示',
            content: _c,
            icon: 'warning',
            lock: true,
            background: '#000', // 背景色
            ok: function () { _call(); }
        });
    }

    window._confirm = function(_t, _call){
        if(typeof _call != 'function'){
            _call = function(){};
        }
        window.top.art.dialog({
            title: '提示',
            content: _t,
            icon: 'question',
            cancelVal: '关闭',
            lock: true,
            background: '#000', // 背景色
            ok: function () {
                _call();
            },
            cancel:function(){}
        });
    }

    window._open = function(t, url){
        window.top.art.dialog.open(url, { title: t,lock: true });
    }
});
