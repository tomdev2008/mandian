define("examples/test/1.0.0/main", [ "./helper", "jquery" ], function (require) {

    var Helper = require('./helper');
    var helper = new Helper('');
    helper.setCookie('name', 'cui',0.5)
    var _c = helper.getCookie('name')

}), define("examples/test/1.0.0/helper", [ "jquery" ], function (require, exports, module) {
    var $ = require('jquery');

    function Helper(container) {

    }

    //... cookie操作
    Helper.prototype.setCookie = function (name, value, day) {
        var Days = parseFloat(day); // 30 day
        var exp = new Date(); // new Date("December 31, 9998");
        exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
        if (typeof value === "boolean") value = value ? 1 : 0;
        document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";path=/";
    }

    Helper.prototype.getCookie = function (name) {
        var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
        if (arr != null) return unescape(arr[2]);
        return null;
    }

    //... 引入外部js
    Helper.prototype.loadJs = function (_js) {
        document.write(unescape("%3Cscript src='" + _js + "' type='text/javascript'%3E%3C/script%3E"));
    }
    //... 引入外部css
    Helper.prototype.loadCss = function (_js) {
        document.write(unescape("%3Clink href='" + _js + "' rel='stylesheet' type='text/css' /%3E"));
    }
    //... 是否为空
    Helper.prototype.isEmpty = function (val) {
        if (val == '' || val == [] || val == 0 || val == null) {
            return true;
        }
        if (typeof val == 'undefined') {
            return true;
        }
        return false;
    }
    //... 获取url,替换其中的参数
    Helper.prototype.createUrl = function (param, val) {
        var url = location.protocol + '//' + location.host + location.pathname;
        var args = location.search;
        //..p换掉
        var reg = new RegExp('([\?&]?)p=[^&]*[&$]?', 'gi');
        args = args.replace(reg, '$1');

        var reg = new RegExp('([\?&]?)' + param + '=[^&]*[&$]?', 'gi');
        args = args.replace(reg, '$1');
        if (args == '' || args == null) {
            args += '?' + param + '=' + val;
        } else if (args.substr(args.length - 1, 1) == '?' || args.substr(args.length - 1, 1) == '&') {
            args += param + '=' + val;
        } else {
            args += '&' + param + '=' + val;
        }
        return url + args;
    },
        Helper.prototype.loadModule = function (_m) {
            document.write(unescape("%3Cscript src='lib/module/" + _m + ".js' type='text/javascript'%3E%3C/script%3E"));
        }

    Helper.prototype.namespaceRegister = function (fullNS) {
        var nsArray = fullNS.split('.');
        var sEval = "";
        var sNS = "";
        for (var i = 0; i < nsArray.length; i++) {
            if (i != 0) {
                sNS += ".";
            }
            sNS += nsArray[i];
            sEval += "if (typeof(" + sNS + ") == 'undefined') " + sNS + " = new Object();"
        }
        if (sEval != "") {
            eval(sEval);
        }
    }

    module.exports = Helper;
});
