$(document).ready(function() {
    $('.click').click(function(e) {
        // Stop form from sending request to server
        e.preventDefault();

        var btn = $(this);

        $.ajax({
            method: "POST",
            url: "/click",
            dataType: "json",
            data: {
                "img": btn.val(),
            }
        });
    })
});