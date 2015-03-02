$(document).ready(function() {

    // get current url and set active menu
    url = window.location.href;
    active_url = url.split("/").slice(0, 6).join("/");
    $("#left-menu a").each(function() {
        var a_href = $(this).attr("href").split("/").slice(0, 6).join("/");
        if (a_href == active_url) {
            $(this).addClass("active");
            if ($(this).attr("class").indexOf("sub-menu") != -1) {
                $(this).parent().parent().parent().children("a").addClass("active");
                $(this).parent().parent().show();
            }
            return;
        }
    });

    // set full height of left column
    if ($("#left-column").css("height") < $("#content").css("height")) {
        $("#left-column").css("height", $("#content").css("height"));
    }

    // drop down menu
    $(".has-dropdown").click(function() {

        display_css = $(this).children("ul").css("display");
        if (display_css == "none") {
            $(".dropdown").slideUp();
            $(this).children("ul").slideDown();
        }
        else {
            $(this).children("ul").slideUp();
        }
    });

    // hover sub menu
    $(".sub-menu:not(.active)").hover(function() {
        $(this).animate({"padding-left":"30px"})
    }, function() {
        $(this).animate({"padding-left":"20px"})
    });


    // check or uncheck all
    $("#check-all").click(function(){
        $(".row-checkbox").prop("checked", this.checked);
    });

    // add required for input form
    $(".required").find("input").attr('required', '');
    $(".required").find("textarea").attr('required', '');

    // check if has error in collapse form then expand it
    if ($("form .collapse").find(".error-message").length > 0) {
        $("form .collapse").addClass("in");
    }
});

// tool tip
$(function () {
    $(".date-picker").datepicker({format: 'yyyy-mm-dd'});
    $('[data-toggle="tooltip"]').tooltip();
});