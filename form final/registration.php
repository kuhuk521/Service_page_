<?php
require_once('config.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Contact Us Form</title>

  </head>
  <body >


  <?php
  if (isset($_POST['name']) && isset($_POST['number'])){
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $message = $_POST['message'];


        $sql= "INSERT INTO form (name,number,email,message) VALUES(?,?,?,?)" ;
        $stmtinsert = $db->prepare($sql);
        $result=$stmtinsert->execute([$name,$number,$email,$message]);

        if($result){
            echo' Successfully saved.';

        }else 
        {
            echo 'There were errors while saving the data.';
        }
     

      
    }
    ?>


    
   <div>
     <form action="registartion.php" onsubmit="return validation()" method="post">
       <div class="container mt-3 mb-3" >
           <div class="row">
        <div class="col-md-5 mt-3 ms-3 me-3"  style="color:#05386B; font-family:montserrat; background-color:#EDF5E1; border-style:solid; ">
         <h1 style="text-align:center;">Registration form</h1>
         <p style="text-align:center;">Fill the form with correct value</p>
         <hr class="mb-3">
         <label for="name"><b>Name</b></label>  <span id="username" class="text-danger font-weight-bold"></span>
         <input id="name"  class="form-control mb-5 mt-3" type="text" name="name">
        
    
         <label for="number" ><b>Mobile Number</b></label>   <span id="usernumber" class="text-danger font-weight-bold"></span>
         <input id="number" class="form-control mb-5 mt-3" type="text" name="number" maxlength="11" minlength="6">
        

         <label for="email" ><b>Email</b></label>  <span id="useremail" class="text-danger font-weight-bold"></span>
         <input id="email" class="form-control mb-5 mt-3" type="text" name="email">
         

         <label for="message"  ><b>Message</b></label> <span id="usermessage" class="text-danger font-weight-bold"></span>
          <input id="message" class="form-control mb-5 mt-3"  type="text" name="message">
         
         <hr class="mb-3">
         <input class="btn mb-3" style="background-color:#05386B; color:#EDF5E1" type="submit" name="create" value="Submit">
</div>
       </div>
     </form>
   </div>
   
   <script type="text/javascript">

   function validation(){

     var name = document.getElementById('name').value;
     var number = document.getElementById('number').value;
     var email = document.getElementById('email').value;
     var message = document.getElementById('message').value;


    if(name==""){
    document.getElementById('username').innerHTML="**Please fill out Name field";
    return false;
    }    

     if(!isNaN(name)){
       document.getElementById('username').innerHTML =" ** only letters allowed";
       return false;
     }
     

     if( number== ""){
       document.getElementById('usernumber').innerHTML = " **Please fill the Mobile Number field";
       return false;
     }

     if(isNaN(number)){
       document.getElementById('usernumber').innerHTML = " **Only numeric value is allowed";
       return false;
     }

     if(email == ""){
       document.getElementById('useremail').innerHTML = " **Please fill the Email field";
       return false;
     }

     if(email.indexOf('@')<= 0 ){
       document.getElementById('useremail').innerHTML="** Invalid Format ";
       return false;
     }

     if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')){
       document.getElementById('useremail').innerHTML=" **Invalid Format";
       return false;
     }

     if(message == ""){
       document.getElementById('usermessage').innerHTML = " **Please fill the Message  field";
       return false;
     }


   }
   </script>
   
   
   


<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
   
   

    

  </body>
</html>