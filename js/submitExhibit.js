$(function () {
    alert( "Handler for .submit() called." );

    $("#addExhibit").on("click",function () {
        var admin = "Lachlan"
        var title = $("#exhibitTitle").val();
        var location = $("#exhibitLocation").val();
        var date = $("#exhibitDate").val();
        var time = $("#exhibitTime").val();
        var desc = $("#exhibitDesc").val();

        var data = {
            "title": title,
            "location": location,
            "date": date,
            "time": time
        }

        var url = "https://d6iblsogna.execute-api.us-east-2.amazonaws.com/test/exhibit";
        $.ajax({
            url: url,
            type: 'POST',
            crossDomain: true,
            contentType: 'application/json',
            data: JSON.stringify(data),
            dataType: 'json',
            success: function(data) {
                alert("success");

            },
            error: function(xhr, ajaxOptions, thrownError) {

            }
        });
        location.reload(true);

    })
})

