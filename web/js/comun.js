var docElement, request;
var pathname;
$(document).ready(function () {
    pathname = window.location.pathname; // Returns path only
    //
//    $('#loading').show();
    $(document).on('pjax:complete', function () {

        $('.filters').toggle();
        $('.onoffswitch-label').click(function () {
            btn_activar_desactivar($(this).parent('.onoffswitch').find('.src_flip').attr('id'));
        });
    });
    $('.onoffswitch-label').click(function () {
        btn_activar_desactivar($(this).parent('.onoffswitch').find('.src_flip').attr('id'));
    });

    $('.close_modal').click(function () {
        $('#fr_modal').attr('src', '');
        closed_modal();
    });

    $('.List_').change(function () {
        if ($(this).val() != "")
            $(this).parents('.select2-bootstrap-append').find('.add_select').show();
        else
            $(this).parents('.select2-bootstrap-append').find('.add_select').hide();
    });

    $('.add_select').click(function () {
        $(this).hide();
        id_seelct = $(this).parents('.select2-bootstrap-append').find('select').attr('id');
        add_Select(id_seelct, $('#' + id_seelct + " option:selected").text(), $('#' + id_seelct).val());
        $("#" + id_seelct + " option[value='" + $('#' + id_seelct).val() + "']").remove();
    });








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


    $(".tab_validate ").on("afterValidate", function (event, messages) {
        valida_tab();
    });
    
    
    vent_size();
    vent_size();
    activate_menu();
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

    $('#fr_modal').css('height', ($(window).height() - 130));




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


function activate_menu() {
    $('.bloque_hijos div:not(.guia_,.guia2_)').each(function () {
        url_ = $(this).attr('onclick').replace("'", " ").split("/web/");
        url_2 = pathname.split("/web/");
        url_[1] = url_[1].replace("'", " ");
        url_3 = url_[1].split("/");
        var regexp = url_3[0] + "/" + url_3[1];
        if (url_2[1].replace("'", " ").match(regexp)) {
            $(this).parents('.bloque_hijos').prev('.bloque_').trigger('click');
            return;
        }
//        alert(regexp);
//        alert(url_2[1].replace("'", " ").match(regexp));
    });
}


function btn_activar_desactivar(url) {

    $.ajax({url: url,
        type: 'post',
        success: function (result) {

        }});
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
    if (document.body.requestFullscreen) {
        document.body.requestFullscreen();
    } else if (document.body.msRequestFullscreen) {
        document.body.msRequestFullscreen();
    } else if (document.body.mozRequestFullScreen) {
        document.body.mozRequestFullScreen();
    } else if (document.body.webkitRequestFullscreen) {
        document.body.webkitRequestFullscreen();
    }



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


function onchange_pais(url_) {
    $.post("" + url_ + "", {id: $('#pais_').val()}, function (data) {
        $("#estados_").html(data);
        $("#municipio_").html('<option>Seleccione...</option>');
        $("#parroquia_").html('<option>Seleccione...</option>');
    });
}

function onchange_estado(url_) {
    $.post("" + url_ + "", {id: $('#estados_').val()}, function (data) {
        $("#municipio_").html(data);
        $("#parroquia_").html('<option>Seleccione...</option>');
    });
}


function onchange_municipio(url_) {
    $.post("" + url_ + "", {id: $('#municipio_').val()}, function (data) {
        $("#parroquia_").html(data);
    });
}

function soloLetras(e) {
    alert(e.keyCode);
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxy";
    especiales = [8, 37, 39, 46, 44];
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}


function add_Select(div, text, id) {
    $('#' + div + "_select .SN_LISTA").hide();
    $('#' + div + "_select")
            .append('<div class="form-group field-clientes-fk_presona_ref has-success"><div class=""><div class="input-group"><input readonly id="' + id + '" value="' + text + '" type="text" class="form-control" name="' + div + '[' + id + ']' + '"><span class="input-group-btn"><button type="button" class="btn btn-danger list_delete" id="btn_lst' + id + '" onclick="delete_list(this.id,\'' + div + '_select\')"><i class="fa fa-trash-o" aria-hidden="true"></i></button></span></div><div class="help-block"></div></div></div>');


}


function delete_list(id, div) {

    var div_ = div.split("_select");

    $('#' + div_[0]).append($('<option>', {
        value: $('#' + id).parents('.form-group').find('input').attr('id'),
        text: $('#' + id).parents('.form-group').find('input').val()
    }));

    $('#' + id).parents('.form-group').remove();


    if ($("#" + div + ' .form-group').size() < 1)
        $('#' + div + " .SN_LISTA").show();




}



function src_frame(url) {
    $('#fr_modal').attr('src', '.');
    $('#fr_modal').css('height', ($(window).height() - 140));
    $('#fr_modal').attr('src', url);
    

}


function closed_modal() {
    $('#myModal').modal('toggle');
}