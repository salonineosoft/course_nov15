<?php
include("database.php");
$cid=$_GET['que'];

$error='';

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $enqu=$_POST['enq'];

       if(mysqli_query($conn,"insert into course_enquiry(name,email,enquiry,course_id) values ('$name','$email','$enqu',$cid)") )
       {
         header("location:dashboard.php");
        //echo "success";
        }
        else{
            echo $name.$email.$enqu;
        }
      
}



?>



<?php 

if(!empty($_GET['upd'])){
?>
<div id="alert" class="alert alert-success">   
<?php echo   $_GET['upd']; ?>
</div>

<?php 
}   
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
        .btn{
            margin-left: 45%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
   <form method="POST">
       <div class="head text-center">
       <h3>Add your Enquiry</h3>
       </div>
       <input type="text" class="form-control col-5 mx-auto" name="name" placeholder="Enter Name"><br>
       <input type="email" class="form-control col-5 mx-auto" name="email" placeholder="Enter Email"><br>
       <textarea  cols="10" rows="5" name="enq" class="form-control col-5 mx-auto"placeholder="Enter your query....."></textarea><br>
       <input type="submit" class="btn btn-success" name="submit">
   </form>
    </div>
</body>
</html>