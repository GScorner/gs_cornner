$(document).ready(function() {
    $('.add-to-cart').on('click', function() {
        var link = window.location.origin + "/ecom_v3/index.php/";
        var cart = $('.shopping-cart');
        var imgid = $(this).parent('.thumbnail').find("img").attr("id");
        var imgtodrag = $('img').eq(imgid);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                    .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                    .css({
                'opacity': '0.5',
                'position': 'absolute',
                'height': '150px',
                'width': '150px',
                'z-index': '100'
            })
                    .appendTo($('body'))
                    .animate({
                'top': cart.offset().top + 10,
                'left': cart.offset().left + 10,
                'width': 75,
                'height': 75
            }, 1000, 'easeInOutExpo');
            setTimeout(function() {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                'height': 0
            }, function() {
                $(this).detach()
            });
        }
        var id = $(this).parent('.thumbnail').find("input").attr("value");
        var opt = $(this).parent('.thumbnail').find("select option:selected").text();
        $.post(link + "index/add_cart_item", {product_id: id, product_option: opt, ajax: '1'},
        function(data) {
            if (data === 'true') {
                $.get(link + "index/show_cart", function(cart) { // Get the contents of the url cart/show_cart     
                    $("#cart").html(cart); // Replace the information in the div #cart_content with the retrieved data
                });
            } else {
                alert("Product does not exist");
            }
        });
    });
});
