function preview() {
    gambar.src = URL.createObjectURL(target.files[0]);
}

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