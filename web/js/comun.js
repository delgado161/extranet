var docElement, request;

$(document).ready(function () {

//    $('#loading').show();
    $(document).on('pjax:complete', function () {
//        alert();
        $('.filters').toggle();
    });

//$(document).on('pjax:send', function() {
//  $('#loading').show();
//});





    $('.bloque_').click(function () {
        $(this).next('.bloque_hijos').toggle();
        $(this).next('.bloque_hijos').find('.guia_').css('height', $(this).next('.bloque_hijos').height() - 15);

        if ($(this).next('.bloque_hijos').is(':visible')) {
            $(this).find('.fl_down').css('transform', 'rotate(180deg)');
        } else {
            $(this).find('.fl_down').css('transform', 'rotate(0deg)');
        }





    });




    $('.btn_menu_h').click(function () {
        $('.menu_login').toggle();
    });

    $('.contenido').click(function () {
        $('.menu_login').hide();
    });

    $('.btn-success').click(function () {
        vent_size();
    });


    $('.btn_maximizar').click(function () {
        fullwindows();
    });




    $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });


    $('.btn_filter').click(function () {
        $('.filters').toggle();
    });

    $('._chkbox').click(function () {
        print_checkbox();
    });


    $(window).resize(function () {
        vent_size();
    });




    $('.tab_new').click(function () {

        $('.bhoechie-tab-content').hide();
        $('.bhoechie-tab-content:nth-child(' + ($(this).index() + 1) + ')').show();


        $('.tab_new').css('color', '#333');
        $(this).css('color', '#5DB12E');


        if ($('.tab_new').size() == ($(this).index() + 1)) {
            $('#submit_btn').show();
        } else {
            $('#submit_btn').hide();
        }
        vent_size();
        initMap();
    });

    vent_size();
    vent_size();


    $("#prueba__").on("afterValidate", function (event, messages) {
        valida_tab();
    });

});



function valida_tab() {
    $('.bhoechie-tab-content').each(function () {
        stop_ = 0;
        $(this).find('.help-block').each(function (index, secondValue) {
            if ($(secondValue).html() != "") {
                stop_ = 1;
            }

//            console.log($(secondValue).html());
        });
        if (stop_ == 1) {
            $('.tab_new:nth-child(' + ($(this).index() + 1) + ')').css('color', 'red').trigger('click');

            return false;
        }

    });



}




jQuery.fn.hasScrollBar = function (direction)
{
    if (direction == 'vertical')
    {
        return this.get(0).scrollHeight > this.innerHeight();
    }
    else if (direction == 'horizontal')
    {
        return this.get(0).scrollWidth > this.innerWidth();
    }
    return false;
}

function vent_size() {

    $('.menu_lateral').css('height', $(window).height() - 85);
    if ($('body').hasScrollBar('vertical')) {

        $('.nav_derecho,.contenido').css('max-width', ($(window).width() - $('.nav_logo').width() - 10.5));
    } else {
        $('.nav_derecho,.contenido').css('max-width', ($(window).width() - $('.nav_logo').width() - 10));
    }





//    $('.nav_level1,.nav_level2,.contenido').css('max-width', ($(window).width() - $('.nav_logo').width() - 15));
//    $('.contenido').width(($(window).width() - $('.nav_logo').width()));
}

function print_checkbox() {
    var keys = $('#w0').yiiGridView('getSelectedRows');

}

function print_checkbox2(id) {
    $('#' + id + " table tr").each(function () {
//        
//        $(this).attr('data-key');


    });
}

function fullwindows() {
//    alert();

    $.ajax({url: "index.php",
        type: 'post',
        data: {
            full: 1
        },
        success: function (result) {
//alert(result);
        }});



//    if (document.documentElement.requestFullscreen) {
//        document.documentElement.requestFullscreen();
//    } else if (document.documentElement.msRequestFullscreen) {
//        document.documentElement.msRequestFullscreen();
//    } else if (document.documentElement.mozRequestFullScreen) {
//        document.documentElement.mozRequestFullScreen();
//    } else if (document.documentElement.webkitRequestFullscreen) {
//        document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
//    }



}

function exit_fullwindows() {

//    var docElement, request;

    docElement = document;
    request = docElement.cancelFullScreen || docElement.webkitCancelFullScreen || docElement.mozCancelFullScreen || docElement.msCancelFullScreen || docElement.exitFullscreen;
    if (typeof request != "undefined" && request) {
        request.call(docElement);
    }
}


function toggleFullScreen() {
    if (!document.fullscreenElement && // alternative standard method
            !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {  // current working methods
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.msRequestFullscreen) {
            document.documentElement.msRequestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        }
    }
}