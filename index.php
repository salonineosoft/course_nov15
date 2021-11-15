<?php
include("database.php");


?>
<!-- i made registration and login at one page ----->


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
    <title>Document</title>
    <style>
      body{
        background-color:091 ;
      }
     .container{
       background-color:#093f68;
       color: whitesmoke;
      
     }
    
    </style>

</head>
<body>
  <!-- registration page--->
    <div class="container col-5  mt-3 border border-primary" id="reg">
    <div class="alert"></div>
    <div class="s"></div>
        <h3 class="text-center mb-5 text-secondery">Register Form</h3>  
  <div class="form-group">
    <input type="text" class="col-12" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <input type="email" class="control-form col-12" id="email" placeholder="Email">
  </div>
  <div class="form-group">
    <input type="text" class="control-form col-12" id="password" placeholder="password">
  </div>
  <div class="form-group">
    <input type="number" class="control-form col-12" id="age" placeholder="AGE">
  </div>
  <div class="form-group">
   Captcha <p value="captcha" id="captcha"></p>
    <input type="text" class="control-form" id="captcha22" placeholder="">
  </div>
  <button type="submit" class="btn btn-success" id="submit">register</button><!--regis button--->
  <button type="submit" class="btn btn-primary" id="llogin">login</button>
    </div>

<!-- login page--->
<div class="container col-5 mt-3 border border-primary" id="log">
<div class="alert"></div>
    <div class="s"></div>
        <h3 class="text-center mb-5">Login Form</h3>
  <div class="form-group ">
    <input type="text" class="form-control" id="lemail" aria-describedby="emailHelp" placeholder="Enter Email">
  </div>
  <div class="form-group">
    <input type="email" class="form-control" id="lpassword" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary" id="login">Submit</button>
  <button type="submit" class=" btn btn-success" id="regi">register</button>
    </div>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
<script>
  /* captcha code */
    $(document).ready(function(){
        var a=parseInt(Math.random()*10);
        var b=parseInt(Math.random()*10);
        answer=a+b;
        //alert(answer);
        var cc = a + '+' +b + '?'
        $("#captcha").text(cc);
  /* captcha code end here */
        $("#log").hide(); //hide login page
  /* registration page start here */
        $(document).on("click","#submit",function(){
            var name = $("#name").val();
            var email = $("#email").val();
            var pass = $("#password").val();
            var age = $("#age").val();
            var captcha =$("#captcha22").val();
         /*if all field not empty*/ 
         /* use ajax*/
            if(name!='' && email!='' && pass!='' && age!='' && captcha!='')
            {
                  var regisdata={'name':name,'email':email,'pass':pass,'age':age};
                  $.ajax({
                    type:"POST",
                    url:"ajax.php",
                    data:regisdata,
                    success:function(data) {
                    if(data=='success')//if success its shows direct login page 
                    {
                      $("#log").show();
                      $("#reg").hide();
                    }
                    else{
                     
                      $(".s").html("<p class='alert alert-danger'>"+"User already registered"+"</p>");
                    }
                    }

                  })
            }
            else{
                $(".alert").html("<p class='alert alert-danger'>check all the fields </p>");
            }
        })
      /* registration page end here */

      /* login page start here */
        $(document).on("click","#login",function(){
         // alert("dbj");
         var email = $("#lemail").val();
         var pass =$("#lpassword").val();
         if(email!='' && pass!='')
         {
           var logindata={'lemail':email,'lpass':pass};
           console.log(logindata);
           $.ajax({
             type:"POST",
             url:"ajax.php",
             data:logindata,
             success:function(data){
               console.log(data);
               if(data='1')
               {
                 window.location.replace("dashboard.php");
               }
               else{
                $(".s").html("<p class='alert alert-danger'>"+"User not  registered"+"</p>");
               }
              }
           })
         }
         else
         {
          $(".alert").html("<p class='alert alert-danger'>check all the fields </p>");
         }

        })
        /* login page end here */

        /* if click on login button it shows login page and hide regis page */
        $(document).on("click","#llogin",function(){
        $("#reg").hide();
        $("#log").show();
        });
        /* if click on regis button page it shows regis page and hide login page */
        $(document).on("click","#regi",function(){
        $("#log").hide();
        $("#reg").show();
        });
    })
</script>



</body>
</html>












