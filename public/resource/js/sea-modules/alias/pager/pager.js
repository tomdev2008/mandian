define("alias/pager/pager", [], function(require, exports, module) {

    var showPages = function(name) { //初始化属性
        this.name = name;      //对象名称
        this.page = 1;         //当前页数
        this.pageCount = 1;    //总页数
        this.argName = 'p'; //参数名
        this.showTimes = 1;    //打印次数
    }

    module.exports = new showPages('_pg');

    showPages.prototype.getPage = function () { //丛url获得当前页数,如果变量重复只获取最后一个
        var args = location.search;
        var reg = new RegExp('[\?&]?' + this.argName + '=([^&]*)[&$]?', 'gi');
        var chk = args.match(reg);
        this.page = RegExp.$1;
    }
    showPages.prototype.checkPages = function () { //进行当前页数和总页数的验证
        if (isNaN(parseInt(this.page))) this.page = 1;
        if (isNaN(parseInt(this.pageCount))) this.pageCount = 1;
        if (this.page < 1) this.page = 1;
        if (this.pageCount < 1) this.pageCount = 1;
        if (this.page > this.pageCount) this.page = this.pageCount;
        this.page = parseInt(this.page);
        this.pageCount = parseInt(this.pageCount);
    }
    showPages.prototype.createHtml = function (mode) { //生成html代码
        var strHtml = '<a class="number">Pages: ' + this.page + ' / ' + this.pageCount + '</a>';
        strHtml += '', prevPage = this.page - 1, nextPage = this.page + 1;
        if (mode == '' || typeof(mode) == 'undefined') mode = 0;
        if (prevPage < 1) {
            strHtml += '<a  title="First Page">首页</a>';
            strHtml += '<a  title="Prev Page">上页</a>';
        } else {
            strHtml += '<a class="number" href="javascript:' + this.name + '.toPage(1);">首页</a>';
            strHtml += '<a class="number" href="javascript:' + this.name + '.toPage(' + prevPage + ');">上页</a>';
        }
        if (this.page % 10 == 0) {
            var startPage = this.page - 9;
        } else {
            var startPage = this.page - this.page % 10 + 1;
        }
        if (startPage > 10) strHtml += '<a class="number" href="javascript:' + this.name + '.toPage(' + (startPage - 1) + ');">...</a>';
        for (var i = startPage; i < startPage + 10; i++) {
            if (i > this.pageCount) break;
            if (i == this.page) {
                strHtml += '<a  class="number current">' + i + '</a>';
            } else {
                strHtml += '<a class="number" href="javascript:' + this.name + '.toPage(' + i + ');">' + i + '</a>';
            }
        }
        if (this.pageCount >= startPage + 10) strHtml += '<a class="number" href="javascript:' + this.name + '.toPage(' + (startPage + 10) + ');">...</a>';
        if (nextPage > this.pageCount) {
            strHtml += '<a  title="Next Page">下页</a>';
            strHtml += '<a  title="Last Page">末页</a>';
        } else {
            strHtml += '<a class="number" href="javascript:' + this.name + '.toPage(' + nextPage + ');">下页</a>';
            strHtml += '<a class="number" href="javascript:' + this.name + '.toPage(' + this.pageCount + ');">末页</a>';
        }
        return strHtml;
    }
    showPages.prototype.createUrl = function (page) { //生成页面跳转url
        if (isNaN(parseInt(page))) page = 1;
        if (page < 1) page = 1;
        if (page > this.pageCount) page = this.pageCount;
        var url = location.protocol + '//' + location.host + location.pathname;
        var args = location.search;
        var reg = new RegExp('([\?&]?)' + this.argName + '=[^&]*[&$]?', 'gi');
        args = args.replace(reg, '$1');
        if (args == '' || args == null) {
            args += '?' + this.argName + '=' + page;
        } else if (args.substr(args.length - 1, 1) == '?' || args.substr(args.length - 1, 1) == '&') {
            args += this.argName + '=' + page;
        } else {
            args += '&' + this.argName + '=' + page;
        }
        return url + args;
    }
    showPages.prototype.toPage = function (page) { //页面跳转
        var turnTo = 1;
        if (typeof(page) == 'object') {
            turnTo = page.options[page.selectedIndex].value;
        } else {
            turnTo = page;
        }
        self.location.href = this.createUrl(turnTo);
    }
    showPages.prototype.printHtml = function ( id) { //显示html代码
        this.getPage();
        this.checkPages();
        this.showTimes += 1;
        document.getElementById(id).innerHTML = this.createHtml();

    }
    showPages.prototype.formatInputPage = function (e) { //限定输入页数格式
        var ie = navigator.appName == "Microsoft Internet Explorer" ? true : false;
        if (!ie) var key = e.which;
        else var key = event.keyCode;
        if (key == 8 || key == 46 || (key >= 48 && key <= 57)) return true;
        return false;
    }

});