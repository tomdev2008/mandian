define("projects/1.0.0/common", ['cookie' ], function (require) {

    $(document).ready(function(){

        //Sidebar Accordion Menu:

        $("#main-nav li ul").hide(); // Hide all sub menus
        $("#main-nav li a.current").parent().find("ul").slideToggle("slow"); // Slide down the current menu item's sub menu

        $("#main-nav li a.nav-top-item").click( // When a top menu item is clicked...
            function () {
                $(this).parent().siblings().find("ul").slideUp("normal"); // Slide up all sub menus except the one clicked
                $(this).next().slideToggle("normal"); // Slide down the clicked sub menu
                return false;
            }
        );

        $("#main-nav li a.no-submenu").click( // When a menu item with no sub menu is clicked...
            function () {
                window.location.href=(this.href); // Just open the link instead of a sub menu
                return false;
            }
        );

        // Sidebar Accordion Menu Hover Effect:

        $("#main-nav li .nav-top-item").hover(
            function () {
                $(this).stop().animate({ paddingRight: "25px" }, 200);
            },
            function () {
                $(this).stop().animate({ paddingRight: "15px" });
            }
        );

        //Minimize Content Box

        $(".content-box-header h3").css({ "cursor":"s-resize" }); // Give the h3 in Content Box Header a different cursor
        $(".closed-box .content-box-content").hide(); // Hide the content of the header if it has the class "closed"
        $(".closed-box .content-box-tabs").hide(); // Hide the tabs in the header if it has the class "closed"

        $(".content-box-header h3").click( // When the h3 is clicked...
            function () {
                $(this).parent().next().toggle(); // Toggle the Content Box
                $(this).parent().parent().toggleClass("closed-box"); // Toggle the class "closed-box" on the content box
                $(this).parent().find(".content-box-tabs").toggle(); // Toggle the tabs
            }
        );
        // Alternating table rows:
        $('tbody tr:even').addClass("alt-row"); // Add class "alt-row" to even table rows

    });

    //Close button:

    $(".close").click(
        function () {
            $(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
                $(this).slideUp(400);
            });
            return false;
        }
    );


    //全局的弹出窗
    window.cShow = function (_c){
        $.messager.show({
            title:'提示',
            msg: _c,
            timeout:5000,
            style:{
                right:'',
                top:document.body.scrollTop+document.documentElement.scrollTop,
                bottom:''
            }
        });
    }

    window.cAlert = function( _c, _y){
        $.messager.alert('提示', _c, _y);
    }

    //退出
    $('#logout').click(function(){
        location.href = crm_base_url + '/system/welcome/logout';
    });

});
