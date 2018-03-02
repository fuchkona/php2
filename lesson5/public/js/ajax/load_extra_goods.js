/**
 * Created by fuchkona on 02.03.2018.
 */
var goods_position = 4;
var goods_count = 4;

function loadExtraGoods() {
    $.ajax({
        type: "POST",
        url: "/ajax/getgoods",
        data: "position=" + goods_position + "&count=" + goods_count,
        success: function (msg) {
            var goods = $.parseJSON(msg);
            if (goods.length > 0) {
                for (var i = 0; i < goods.length; i++) {
                    var $container = $("<div class='col-6 col-md-4 col-lg-3 p-1'></div>");
                    var $card = $("<div class='card'></div>");
                    $card.appendTo($container);
                    var $cardImg = $("<img class='card-img-top'>");
                    $cardImg.attr('src', "/images/small/" + goods[i].img);
                    $cardImg.appendTo($card);
                    var $cardHeader = $("<h5 class='card-header'></h5>");
                    $cardHeader.text(goods[i].title);
                    $cardHeader.appendTo($card);
                    var $cardBody = $("<div class='card-body'></div>");
                    $cardBody.appendTo($card);
                    var $cardDescription = $("<p class='card-text'></p>");
                    $cardDescription.text(goods[i].description);
                    $cardDescription.appendTo($cardBody);
                    var $cardPrice = $("<h6 class='card-subtitle'></h6>");
                    $cardPrice.text("Цена: " + goods[i].price + "$");
                    $cardPrice.appendTo($cardBody);
                    $container.appendTo($("#goodsContainer"));
                }
            } else {
                $("#loadExtraGoods").remove();
            }
            goods_position += goods_count;
        }
    });
}