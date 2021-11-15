$(document).ready(function() {
    var add_chapitre_div = $(".add_chapitre_div");

    $(".add_form_add_chapitre").click(function () {
        if (add_chapitre_div.hasClass("d-none")) {
           add_chapitre_div.removeClass("d-none");
           $("html, body").animate({ scrollTop: $(document).height() }, 1000);

           $(this).hide();
        } 
    });
});