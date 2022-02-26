resizeTextArea();
var stock = parseInt($("#stock").html());

if (role != "admin") {
    if (stock == 0) {
        $("button").attr("disabled", "true");
        $("button").html("Stock Habis");
    }
}

$("textarea").keyup(function() {
    resizeTextArea();
});

function resizeTextArea() {
    $("textarea").height("1");
    while (
        $("textarea").outerHeight() <
        $("textarea")[0].scrollHeight +
        parseFloat($("textarea").css("borderTopWidth")) +
        parseFloat($("textarea").css("borderBottomWidth"))
    ) {
        $("textarea").height($("textarea").height() + 1);
    }
}
$('input[name="jumlah"]').change(function() {
    if ($('input[name="jumlah"]').val() <= 0) {
        $('input[name="jumlah" ]').val(1);
    } else if ($('input[name="jumlah"]').val() > stock) {
        $('input[name="jumlah" ]').val(stock);
    }
    $("#subTotal").html(
        $('input[name="jumlah"]').val() * $('input[name="harga"]').val()
    );
});

function jumlahOrder(action) {
    if (action == "minus") {
        $('input[name="jumlah"]').get(0).value--;
        if ($('input[name="jumlah"]').val() <= 0) {
            $('input[name="jumlah"]').val(1);
        }
    } else {
        $('input[name="jumlah"]').get(0).value++;
        if ($('input[name="jumlah"]').val() >= stock) {
            $('input[name="jumlah"]').val(stock);
        }
    }
    $("#subTotal").html(
        $('input[name="jumlah"]').val() * $('input[name="harga"]').val()
    );
}