<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>PHP Photos</title>
  <style>
    body {
        background-color: #121212;
        color: white;
    }

    #gallery {
        background-color: #202020;
        border: 1px dotted #3b3b3b;
    }

    .card {
        background-color: #121212;
        color: white;
        border: none;
        border-radius: 0;
    }

    .card-body {
         margin: 0;
         padding: 0;
    }
</style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="./">Photography</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-0 ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="./"><i class="fas fa-home mr-2"></i>Home</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="https://gitlab.com/christian-cleberg/php-photos"><i class="fab fa-gitlab mr-2"></i>Source Code</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>


    <div class="my-4 container">
        <div class="card-columns">
            <?php
            $image_dir = "images/";
            $images = [];
            if (!$dir = opendir($image_dir)) { die("Cannot open $image_dir"); }

            while (false !== ($image = readdir($dir)))
            {
                if ($image != "." && $image != ".." && (strtolower(substr($image, -4)) == "jpeg" || strtolower(substr($image, -3)) == "jpg"))
                {
                    array_push($images, $image);
                }
            }

            foreach ($images as $value) { echo "<div class='card'><div class='card-body'><a href='" . $image_dir . $value . "'><img class='img-fluid w-100 h-100' src='thumbnails.php?image=" . $value . "' border=0 /></a></div></div>"; }

            closedir($dir);
            ?>
        </div>
    </div>

    <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
