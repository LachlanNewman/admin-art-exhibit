var imgUrl =  false;

function addArtwork() {
        if(imgUrl == false){
            return alert("no image");
        }
        var title = $("#artworkTitle").val();
        var artist = $("#artworkArtist").val();
        var style = $('#artworkStyle').val();
        var period = $('#artworkPeriod').val();
        var id = ($.urlParam('id'));
        alert(id);

        alert("second");
        var forSale, cost,data;
        if($('#forSale').prop('checked')){
            forSale = false;
            cost = 0;
            data = {
                "title": title,
                "artist": artist,
                "style": style,
                "period": period,
                "img": imgUrl,
                "forSale": forSale,
                "cost": cost
            };
        }
        else{
            forSale = true;
            cost = $('#artworkCost').val()
            data = {
                "title": title,
                "artist": artist,
                "style": style,
                "period": period,
                "img": imgUrl,
                "forSale": forSale,
                "cost":cost
            };
        }
    var url = "https://d6iblsogna.execute-api.us-east-2.amazonaws.com/test/exhibit/"+id+"/artworks";
    $.postArtwork(data,url,id);
    };

    $.postArtwork = function (data,url,exhibit_id) {
        alert(exhibit_id);
        alert("update");
        $.ajax({
            url: url,
            type: 'POST',
            crossDomain: true,
            contentType: 'application/json',
            data: JSON.stringify(data),
            dataType: 'json',
            success: function(data) {
                alert("success");
                location.reload();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    };

    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        return results[1] || 0;
    }

function updateArtwork () {
    var exhibit_id = ($.urlParam('exhibitid'));
    var artwork_id = ($.urlParam('artworkid'));
    var title = $('#updatetitle').val();
    var artist = $('#updateartist').val();

    data = {
        "exhibit_id": exhibit_id,
        "artwork_id": exhibit_id,
        "title": title,
        "artist": artist
    }
    var url = "https://d6iblsogna.execute-api.us-east-2.amazonaws.com/test/exhibit/"+data['exhibit_id']+"/artworks/"+data['artwork_id'];

    $.postArtwork(data,url);
};

function forSale() {
    if($('#forSale').prop("checked")==true){
        $('#artworkCost').attr("disabled",true);
        $('#artworkCost').attr("value","");
    }
    else{
        $('#artworkCost').attr("disabled",false);


        alert("no");
    }

};

function addImg() {
    var files = document.getElementById('artworkImage').files;
    if (!files.length) {
        return alert('Please choose a file to upload first.');
    }
    var file = files[0];
    var fileName = file.name;
    var photoKey = fileName;
    s3.upload({
        Key: photoKey,
        Body: file,
        ACL: 'public-read'
    },function(err, data) {
        if (err) {
            return alert('There was an error uploading your photo: ', err.message);

        }
        alert('first Successfully uploaded photo.');
        imgUrl = data.Location;
        alert(imgUrl);
    });
}


AWS.config.region = 'us-east-2'; // Region
AWS.config.credentials = new AWS.CognitoIdentityCredentials({
    IdentityPoolId: 'us-east-2:8b470b3d-56ab-444e-8f4c-6236f5196a45',
});

AWS.config.credentials.get(function(err) {
    if (err) alert(err);
    console.log(AWS.config.credentials);
});

var bucketName = 'artimagesapp'; // Enter your bucket name
var s3 = new AWS.S3({
    apiVersion: '2006-03-01',
    params: {Bucket: bucketName}
});
