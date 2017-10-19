<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="../js/artworks.js"></script>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <?php
            echo '<div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                    <input class="form-control" type="text" value="'.$_GET['title'].'" id="updatetitle">
                    </div>
                </div>
        
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Artist</label>
                    <div class="col-10">
                    <input class="form-control" type="text" value="'.$_GET['artist'].'" id="updateartist">
                    </div>
                </div>';
        ?>
        <p class="lead">
        <a id="updateArtwork" class="btn btn-primary btn-lg" role="button"
                onclick="updateArtwork()">Update</a>
    </div>
</div>
</body>
</html>