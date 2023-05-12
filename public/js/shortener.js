$(".shortener__copy-button").on("click", function () {
    // console.log($("#shortener-result").attr("value"));
    console.log($("#shortener-result").val());
    $("#shortener-result").select();
    document.execCommand("copy");
    console.log(this);
})
