<?php
include("database.php");
//include("form.php");
//error_reporting(0);
//$error='';

$sql= mysqli_query($conn,"select * from courses");


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Document</title>
    <style>
    body{
        background-image: url("white7.jpg");
    }
    button{
        color:red;
        text-decoration: none;
       
    }
    a{
        color:blueviolet;
        text-decoration: none;
    }
    .card{
        display:flex;
    }
    </style>

</head>
<body>
<!-- Button trigger modal -->
<?php 

if(!empty($_GET['upd'])){
?>
<div id="alert" class="alert alert-success">   
<?php echo   $_GET['upd']; ?>
</div>

<?php 
}   
?>

<!----------modal----------->
<?php if (isset($_GET['id'])){
       ?>
       <<h1><?php echo $_GET['id'];?></h1>

  <?php }?>
    <div class="head text-center">
    <h2><i class="bi bi-book">Course Available </i></h2> 
   </div> <div class="container">
    <div class="row">
   <?php while($arr = mysqli_fetch_assoc($sql)){?>
    <div class="col-md-3">
   <div class="card mt-5" style="width: 13rem;">
  <img height="130px" width="130px" class="card-img-top" src="<?=$arr['image']?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title text-center"><?=$arr['name']?></h5>
     <a href="form.php?que=<?php echo $arr['id']?>" class="btn btn-primary">Enquiry</a>
     <a href="details.php?que=<?php echo $arr['id']?>"  class="btn btn-success">Details</a>
  </div>
</div>
   
   </div>
   <?php
   }
   ?>
    </div>
</div>
</body>
</html>