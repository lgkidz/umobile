$(document).ready(function () {

    /*js for login*/
    $("#login").click(function( event ){
        event.preventDefault();
        $(".overlay").fadeToggle("fast");
    });

    $(".close").click(function(){
        $(".overlay").fadeToggle("fast");
    });

    $(document).keyup(function(e) {
        if(e.keyCode == 27 && $(".overlay").css("display") != "none" ) {
            event.preventDefault();
            $(".overlay").fadeToggle("fast");
        }
    });

    $('.sign-up').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });

    /*js for oneproduct.html*/
    $("ul.menu-items > li").on("click",function(){
        $("ul.menu-items > li").removeClass("active");
        $(this).addClass("active");
    })

    $(".attr,.attr2").on("click",function(){
        var clase = $(this).attr("class");

        $("." + clase).removeClass("active");
        $(this).addClass("active");
    })

    //-- Click on QUANTITY
    $(".btn-minus").on("click",function(){
        var now = $(".section > div > input").val();
        if ($.isNumeric(now)){
            if (parseInt(now) -1 > 0){ now--;}
            $(".section > div > input").val(now);
        }else{
            $(".section > div > input").val("1");
        }
    })
    $(".btn-plus").on("click",function(){
        var now = $(".section > div > input").val();
        if ($.isNumeric(now) < 8){
            $(".section > div > input").val(parseInt(now)+1);
        }else{
            $(".section > div > input").val("1");
        }
    })

    $(".btn-order-product").on('click',function (res) {
        swal({
            title: 'Are you sure?',
            text: "Your order will be saved immediately",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(function (res) {
            if (res.data.success) {
                swal(
                    'Well done. Save successfully',
                    'success'
                ).then(function () {
                    location.reload();
                });
            } else {
                swal(
                    'Error',
                    'error'
                );
            }
        })
    });

    /*js for profile.html*/
    $("#button-edit-info").click(function () {
        $('#modal-edit-info').modal('show');
    });
})
