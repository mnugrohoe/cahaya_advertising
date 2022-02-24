function preview() {
    // gambar.src = URL.createObjectURL(target.files[0]);
    var file = $("input[type=file]").get(0).files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function() {
            $("#gambarprev").attr("src", reader.result);
        };

        reader.readAsDataURL(file);
    }
}

// show hide user area
$("#userArea").css(
    "marginLeft",
    $("#userIcon").css("width").replace("px", "") -
    $("#userArea").css("width").replace("px", "")
);
$("#userIcon, #userArea")
    .mouseenter(() => {
        $("#userArea").css("visibility", "visible");
    })
    .mouseleave(() => {
        $("#userArea").css("visibility", "hidden");
    });
// end show hide user area

// toogle login button
$("#loginButton").click(function() {
    $("#login").css("visibility", "visible");
});
var containerClick = true;
$("#login").click(function() {
    if (containerClick) {
        $("#login").css("visibility", "hidden");
    } else {
        containerClick = true;
    }
});
$("#loginForm").click(function() {
    containerClick = false;
});
// end

$("#navbarSupportedContent a").on("click", function() {
    $("#navbarSupportedContent a").removeClass("selected");
    $(this).addClass("selected");
});