$(function() {
    var pubs = ($("#publications").attr("class"));
    var teach = ($("#teaching").attr("class"));

    //ojo con el cambio de subpage
    $("#publications").click(function() {
        $("#publications").toggleClass("underline");
        $("#teaching").toggleClass("underline");
        $("#subpage").text("tampoco tengo");
    });
    $("#teaching").click(function() {
        $("#publications").toggleClass("underline");
        $("#teaching").toggleClass("underline");
        $("#subpage").text("no tengo");
    });

});