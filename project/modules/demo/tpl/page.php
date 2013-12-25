<meta charset="utf-8">
<style type="text/css">
    .pages {
        color: #014d67;
        cursor: default;
        font-size: 12px;
        font-family: arail;
        padding: 3px 0px 3px 0px;
    }
    .pages .count, .pages .number, .pages .arrow {
        color: #014d67;
        font-size: 12px;
    }
        /* Page and PageCount Style */
    .pages .count {
        font-weight: bold;
        border-right: none;
        padding: 2px 10px 1px 10px;
    }
    .pages .page{
        /*background-color: #f1f1f1;*/
    }
        /* Mode 0,1,2 Style (Number) */
    .pages .number {
        font-weight: normal;
        padding: 2px 10px 1px 10px;
    }
    .pages .number a, .pages .number span {
        font-size: 12px;
    }
    .pages .number span {
        color: #999999;
        margin: 0px 3px 0px 3px;
    }
    .pages .number a {
        color: #666;
        text-decoration: none;
        border:1px solid #ccc;
        padding: 2px 5px;
    }
    .pages .number a:hover {
        color: #fff;
        border:1px solid #666;
        background-color: #666;
    }
        /* Mode 3 Style (Arrow) */
    .pages .arrow {
        font-weight: normal;
        padding: 0px 5px 0px 5px;
    }
    .pages .arrow a, .pages .arrow span {
        font-size: 12px;
        font-family: arail;
    }
    .pages .arrow span {
        color: #999999;
        margin: 0px 5px 0px 5px;
    }
    .pages .arrow a {
        color: #000000;
        text-decoration: none;
    }
    .pages .arrow a:hover {
        color: #0000ff;
    }
        /* Mode 4 Style (Select) */
    .pages select, .pages input {
        color: #000000;
        font-size: 12px;
        font-family: arail;
    }
        /* Mode 5 Style (Input) */
    .pages .input input.ititle, .pages .input input.itext, .pages .input input.icount {
        color: #666666;
        font-weight: bold;
        background-color: #F7F7F7;
        border: 1px solid #CCCCCC;
    }
    .pages .input input.ititle {
        width: 70px;
        text-align: right;
        border-right: none;
    }
    .pages .input input.itext {
        width: 25px;
        color: #000000;
        text-align: right;
        border-left: none;
        border-right: none;
    }
    .pages .input input.icount {
        width: 35px;
        text-align: left;
        border-left: none;
    }
    .pages .input input.ibutton {
        height: 17px;
        color: #FFFFFF;
        font-weight: bold;
        font-family: arial;
        background-color: #999999;
        border: 1px solid #666666;
        padding: 0px 0px 2px 1px;
        margin-left: 2px;
        cursor: hand;
    }
</style>
<script type="text/javascript" src="/resource/js/pager.js"></script>
<script type="text/javascript">
    var pg = new showPages('pg');
    pg.pageCount = 100; //定义总页数(必要)
    pg.argName = 'p';    //定义参数名(可选,缺省为page)
    pg.printHtml(1);        //显示页数
</script>
