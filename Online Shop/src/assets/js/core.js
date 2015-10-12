$(document).ready(function () {
    $("#Table input").click(function () {
        if ($(this).is(":checked")) {
            $(this).parent().parent().addClass("highlight");
        } else {
            $(this).parent().parent().removeClass("highlight");
        }
    });

    $("#calculate_profit").click(function () {
        var ids = [];
        $("#Table input:checkbox:checked").each(function () {
            ids.push($(this).attr('data-order-id'));
        });

        $.ajax({
            type: "POST",
            url: "/orders/getProfit",
            dataType: "json",
            data: {orders: ids},
            success: function (jsObj) {
                if (jsObj.success == true) {
                    alert('Total profit:' + jsObj.profit + '\u20AC');
                } else {
                    alert(jsObj.error);
                }
                $("#Table input:checkbox:checked").each(function () {
                    $(this).attr('checked', false);
                    $(this).parent().parent().removeClass("highlight");
                });
            }

        });
    });

});
