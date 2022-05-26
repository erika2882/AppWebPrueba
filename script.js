$(document).ready(function(){
    //callPage("form");
    pageCall("films");
    $(".btn-end").hide();
    $("#errorLetter").hide();
    $("#errorAp").hide();
    $("#errorMa").hide();
});

function pageCall(page){
    $(".vista").hide();
    $("#" + page).show();
}

