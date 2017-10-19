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
<script src="https://sdk.amazonaws.com/js/aws-sdk-2.132.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-promise/4.1.1/es6-promise.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"

        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="../js/artworks.js"></script>
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">

            <div class="form-group">
                <label for="artworkTitle">Title</label>
                <input class="form-control" type="text" value="" id="artworkTitle" placeholder="Artwork Title">
            </div>

            <div class="form-group">
                <label for="artworkTitle">Artist</label>
                <input type="text" class="form-control" id="artworkArtist" placeholder="Artist">
            </div>

            <div class="form-group">
                <label for="artworkStyle">Style</label>
                <select class="form-control" id="artworkStyle">
                    <option>Painting</option>
                    <option>Sculpture</option>
                    <option>Interactive</option>
                    <option>Drawing</option>
                </select>
            </div>

            <div class="form-group">
                <label for="artworkTitle">Period</label>
                <input type="text" class="form-control" id="artworkPeriod" placeholder="Period">
            </div>

            <div class="form-group">
                <label for="artworkImage">File input</label>
                <input type="file" class="form-control-file" id="artworkImage" aria-describedby="fileHelp">

            </div>
            <a name="" id="" class="btn btn-primary|secondary|success|info|warning|danger" role="button" onclick="addImg()">Upload</a>

            <div class="form-check">
                <label class="forSale">
                    <input type="checkbox" id="forSale" checked="checked" onchange="forSale()">
                    For Sale
                </label>
            </div>

            <div class="form-group">
                        <label for="artworkCost">Cost</label>
                        <input type="number" class="form-control" id="artworkCost" placeholder="cost" disabled>
            </div>
             <input id="addArtwork" class="btn btn-primary" type="button" value="Add Artwork" onclick="addArtwork()">
        </div>
    </div>

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Style</th>
                <th>Period</th>
                <th>For Sale</th>
                <th>Cost</th>
                <th>Room</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $exhibitWSK = "".$_GET['id'];
                $url = "https://d6iblsogna.execute-api.us-east-2.amazonaws.com/test/exhibit/" . $exhibitWSK . "/artworks";

                $request = file_get_contents($url);
                $json = json_decode($request,true);

                 foreach ($json['Items'] as $item){
                     echo "<tr>";
                     echo "<td>" .$item['title']['S']. "</td>" ;
                     echo "<td>" .$item['artist']['S']."</td>" ;
                     echo "<td>" .$item['style']['S']."</td>" ;
                     echo "<td>" .$item['period']['S']."</td>" ;
                     echo "<td>" .$item['forSale']['S']."</td>" ;
                     echo "<td>" .$item['cost']['S']."</td>" ;
                     echo "<td>
                    <a class='btn btn-primary' role='button' 
                    href='editArtwork.php?exhibitid=". $item['exhibit_id']['S'] .
                                        "&artworkid=". $item['artwork_id']['S'] .
                                        "&title="    . $item['title']['S'].
                                        "&artist="   . $item['artist']['S']. "' >
                    Edit Artwork
                    </a>";
                     echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>


</body>
</html>