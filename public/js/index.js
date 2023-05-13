$('#submit').on('click', function () {
    let post = {
        resource: $('input[name=resource]').val()
    };


    fetch('/shortener', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
        },
        body: JSON.stringify(post)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log($(".shortener__dialog.bg-alternative"));
            $(".shortener__dialog.bg-alternative").addClass('active');
            $("#shortener-result").attr('value', data.shortLink);
            $("#src").attr('href', data.resource);
            $("#src").text(data.resource);
        });
});

$("#shortener__copy-button").on("click", function () {
    // console.log($("#shortener-result").attr("value"));
    console.log($("#shortener-result").val());
    $("#shortener-result").select();
    document.execCommand("copy");
    console.log(this);
})
