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
<script src="js/submitExhibit.js"></script>
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                    <input class="form-control" type="text" value="" id="exhibitTitle" placeholder="Exhibit Title">
                    </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Location</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="" id="exhibitLocation" placeholder="Exhibit Location">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Date</label>
                <div class="col-10">
                    <input class="form-control" type="date" value="" id="exhibitDate">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Time</label>
                <div class="col-10">
                    <input class="form-control" type="time" value="" id="exhibitTime">
                </div>
            </div>

        <input id="addExhibit" class="btn btn-primary" type="button" value="Add Exhibit">
    </div>
    </div>

    <table id="exhibitList" class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Location</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
        </thead>
        <tbody id="data">
        <?php
            $url = "https://d6iblsogna.execute-api.us-east-2.amazonaws.com/test/exhibit";
            $request = file_get_contents($url);
            $json = json_decode($request,true);
            $size = sizeof($json['Items']);
            foreach ($json['Items'] as $item){
                echo "<tr>";
                echo "<td>".$item['title']['S']."</td>";
                echo "<td>".$item['location']['S']."</td>";
                echo "<td>".$item['date']['S']."</td>";
                echo "<td>".$item['time']['S']."</td>";
                echo "<td>
                    <a class='btn btn-primary' role='button' href='views/artworks.php?id=" . $item['exhibit_id']['S'] . "' >
                    List Artworks
                    </a>";
                echo "</tr>";
            }
        ?>
        </tbody>

    </table>
</div>
</body>
</html>