var $ = jQuery;

$(document).ready(function() {
    // Checkbox único
    $(document).on("click", ".unique", function() {
        var $box = $(this);
        if ($box.is(":checked")) {
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });

    $(".showto").on("click", "input, select", function() {
        var id = $(this).attr("show");

        $(".content .box:not(.resultados-" + id + ")").fadeOut(300, function() {
            $(".resultados-" + id)
                .hide()
                .fadeIn();
        });
    });

    $(".title").on("click", "input", function() {
        $(".title").removeClass("active");
        $(".fields").slideUp(400, function() {
            $(this)
                .find("input")
                .prop("checked", false);
        });

        var title = $(this).parents(".title");

        if ($(this).is(":checked")) {
            title.addClass("active");
            title.next().slideDown();
        }
    });

    // $('.estado, .buscador').on('click', 'input', function () {
    //     var id = $(this).attr("show");
    //     hide_res('resultados-' + id);
    //     show_res('resultados-' + id);
    // });
    /*
    function show_res(id) {
        id = id === undefined ? 'content .box' : id;
        $('.' + id).fadeIn();
    }
    
    function hide_res(id) {
        id = id === undefined ? 'content .box' : id;
        $('.' + id).fadeOut();
    }*/

    $(".filter").on("click", "input", function() {
        if ($(this).attr("id") == "lista") {
            $(this)
                .parent()
                .parent()
                .find(".list")
                .slideDown();
            $(this)
                .parent()
                .parent()
                .find(".list-map")
                .slideUp();
        } else {
            $(this)
                .parent()
                .parent()
                .find(".list-map")
                .slideDown();
            $(this)
                .parent()
                .parent()
                .find(".list")
                .slideUp();
        }
    });
});
