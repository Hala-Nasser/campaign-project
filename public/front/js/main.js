
$(document).ready(function () {
    new WOW().init();
    scrollShow = false;

    $(window).scroll(function () {
        scrollTop = $(window).scrollTop();

        if (scrollTop > 0) {
            if (scrollShow)
                return;
            console.log(scrollShow);
            scrollShow = true;
            $('.navbar').addClass('scrollNav');
            $('.navbar').css('opacity', 0)
                .slideDown('slow').animate({ opacity: 1 },
                    { queue: false, duration: 'slow' }
                );
        }
        else {
            $('.navbar').removeClass('scrollNav');
            /*console.log('false');*/
            scrollShow = false;
        }
    });

    /* call slick nav*/
    $('.mobile-menu').slicknav({
        prependTo: '.navbar-header',
        parentTag: 'liner',
        allowParentLisnks: true,
        duplicate: true,
        label: '',
        closedSymbol: '<i class="lni-chevron-right"></i>',
        openedSymbol: '<i class="lni-chevron-down"></i>',
    });



  



    /************************************************back top*********************************************/
    $(".up").on("click", function () { $("html, body").animate({ scrollTop: 0 }, "slow"); return false; });
    /********************FAQ callapse********************************/



    $('.thumbnail').click(function(){
        $('.modal-body').empty();
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#modal').modal({show:true});
    });
    
    $('#modal').on('show.bs.modal', function () {
       $('.col-6,.row .thumbnail').addClass('blur');
    })
    
    $('#modal').on('hide.bs.modal', function () {
       $('.col-6,.row .thumbnail').removeClass('blur');
    });




});
