resizeTextArea();
var stock = parseInt($("#stock").html());

if (role != "admin") {
    if (stock == 0) {
        $("button").attr("disabled", "true");
        $("button").html("Stock Habis");
    }
} else {
    $("button[name='submit']").attr("disabled", "true");
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

function validasiJumlah() {
    if (role == "admin") {
        if ($('input[name="jumlah"]').val() <= -stock) {
            $('input[name="jumlah" ]').val(-stock);
        }
        $("#stock-akhir").html(parseInt($('input[name="jumlah"]').val()) + stock);
    } else {
        if ($('input[name="jumlah"]').val() <= 0) {
            $('input[name="jumlah" ]').val(1);
        } else if ($('input[name="jumlah"]').val() > stock) {
            $('input[name="jumlah" ]').val(stock);
        }
        $("#subTotal").html(
            $('input[name="jumlah"]').val() * $('input[name="harga"]').val()
        );
    }
}

$('input[name="jumlah"]').change(function() {
    validasiJumlah();
});

function jumlahOrder(action) {
    if (action == "minus") {
        $('input[name="jumlah"]').get(0).value--;
    } else {
        $('input[name="jumlah"]').get(0).value++;
    }
    validasiJumlah();
}

var nama_produk, harga_produk, deskripsi_produk, gambar_produk;

$("#edit").click(function() {
    $("#edit, #delete").css("display", "none");
    $("#cancel").css("display", "inline");
    $(".prev-stock, input[name = 'gambar']").css("display", "block");
    $("input, textarea").removeAttr("readonly");
    $(".action-card button, #katalog").attr("disabled", false);

    nama_produk = $('input[name="nama_produk"]').val();
    harga_produk = $('input[name="harga"]').val();
    deskripsi_produk = $('textarea[name="deskripsi"]').val();
    resizeTextArea();
    gambar_produk = $("#gambarprev").attr("src");
});

$("#cancel").click(function() {
    $("#edit, #delete").css("display", "inline");
    $("#cancel, .prev-stock, input[name = 'gambar']").attr(
        "style",
        "display: none !important"
    );
    $("input, textarea").attr("readonly", true);
    $(".action-card button, #katalog").attr("disabled", true);

    $('input[name="nama_produk"]').val(nama_produk);
    $('input[name="harga"]').val(harga_produk);
    $('textarea[name="deskripsi"]').val(deskripsi_produk);
    $('input[name="jumlah"]').val(parseInt("0"));
    validasiJumlah();
    resizeTextArea();
    $("#gambarprev").attr("src", gambar_produk);
    $('input[type="file"]').val(null);
});

$("#delete").click(function() {
    if (
        confirm(
            "Apakah anda ingin menghapus produk " +
            $('input[name="nama_produk"]').val() +
            "?"
        )
    ) {
        window.location.href = "delete.php?id=" + id;
    }
});

function errorBeli() {
    $("#login").css("visibility", "visible");
}