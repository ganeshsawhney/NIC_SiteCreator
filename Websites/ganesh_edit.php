<?php $wname = 'ganesh'; ?>

<?php 
$db='website_'.$wname;
require_once('../db/db_connect.php');
session_start();

    $dataquery = $conn->prepare("SELECT * FROM Data");
    $dataquery->execute();
    $dataresult=$dataquery->get_result();
    $datarow=$dataresult->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <script src=<?php echo '"'.$wname.'_'.'ajaxscripts.js"'; ?>></script>
  <title><?php if($datarow["title"]!="None")echo $datarow["title"]; else echo $wname; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>


<?php 
if($datarow["is_header"]==true)
{
?>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?php echo $wname; ?></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="<?php echo $wname.'_index.php'; ?>">Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Page 1-1</a></li>
              <li><a href="#">Page 1-2</a></li>
              <li><a href="#">Page 1-3</a></li>
            </ul>
          </li>
          <li><a href="#">Page 2</a></li>
          <li><a href="#">Page 3</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Page 4</a></li>
          <li><a href="#">Page 5</a></li>
        </ul>
      </div>
    </div>
  </nav>
<?php
}
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="link to image" alt="Image">
        <div class="carousel-caption">
          <h3>Image 1</h3>
          <p>Caption 1</p>
        </div>
      </div>

      <div class="item">
        <img src="http://placehold.it/1200x400?text=Another Image Maybe" alt="Image">
        <div class="carousel-caption">
          <h3>Image 2</h3>
          <p>Caption 2</p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  
<div class="container text-center">
  <h3>Heading</h3><br>
  <div class="row">
    <div class="col-sm-2">
      <img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      <p>Text</p>
    </div>
    <div class="col-sm-8">
      <img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      <p>Text</p>
    </div>
    <div class="col-sm-2">
      <div class="well">
       <p>Text</p>
      </div>
      <div class="well">
       <p>Text</p>
      </div>
    </div>
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>