$(document).ready(function (){
    $('.slider').slick({
        arrows: false,
        slidesToShow: 5,
        adaptiveHeight: true,
        slidesToScroll: 2,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2500,
        speed: 100,
        variableWidth: true,
    });
});

$(document).ready(function (){
    $('.tabs-triggers__item').click(function (e){
       e.preventDefault();

       $('.tabs-triggers__item').removeClass('tabs-triggers__item--active');
       $('.tabs-content__item').removeClass('tabs-content__item--active');

       $(this).addClass('tabs-triggers__item--active');
       $($(this).attr('href')).addClass('tabs-content__item--active');
    });

    $('.tabs-triggers__item:first').click();
});



//Корзина
var url_diplom = location.protocol + '//' + location.hostname;


$(document).ready(function () {

    var modalProductCart = new bootstrap.Modal(document.getElementById("exampleModalProductCart"), {});

    $('.add-to-cart').click(function (event){

        event.preventDefault();

        $.ajax({
            url: url_diplom + '/api/add-cart-product/' + $(this).data('product'),
            success: function(data) {
                modalProductCart.show();
            }
        });
        return false;
    });

    $('.cart-btn-add').click(function () {
        $.ajax({
            url: url_diplom + '/api/add-cart-product/' + $(this).data('product'),
            success: function(response) {
                location.reload()
            }
        });
    });

    $('.cart-btn-del').click(function () {
        $.ajax({
            url: url_diplom + '/api/del-cart-product/' + $(this).data('product'),
            success: function(response) {
                location.reload()
            }
        });
    });

    $('.cart-btn-edit').change(function () {
        if ($(this).val() < 1) {
            $(this).val(1);
        } else {
            $.ajax({
                url: url_diplom + '/api/edit-cart-product/' + $(this).data('product') + '-' + $(this).val(),
                success: function(response) {
                    location.reload()
                }
            });
        }
    });

    $('.cart-btn-clear').click(function () {
        $.ajax({
            url: url_diplom + '/api/clear-cart-product/' + $(this).data('product'),
            success: function(response) {
                location.reload()
            }
        });
    });
});
