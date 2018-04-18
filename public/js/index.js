$(document).ready(function () {
    $('.cart-inner').hover(function () {
        $(".top-cart-content").show();
    }, function () {
            $(".top-cart-content").hide();
    });

    $("#login").click(function(event){
        $(".modal-content").modal('show');
    });
});