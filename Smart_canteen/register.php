<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="register.css"> -->
    <style>
    form{
        padding: 15px;
        margin-left: 40%;
        margin-right: 20%;
        margin-top: 50px;
        margin-bottom: 100px;
        box-shadow: 5px 10px 18px #888888;
        background-color: ghostwhite;
        border-radius: 8px;
    }
    body{
        background-image: url("bg.jpg");
        background-size:cover ;
    }
    </style>
    <title>Register</title>
</head>
<body>
<form action="/EDI/Smart_canteen/register.php" method="post">   <!--1-->
    <div class="mb-3">
        <label for="exampleInputname" class="form-label">Full name</label>
        <input type="text" name='name' class="form-control" id="exampleInputname">
      </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" name='email' class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputnumber" class="form-label">phone number</label>
    <input type="number" name='number' class="form-control" id="exampleInputnumber">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name='pass'class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword2" class="form-label">Conform Password</label>
    <input type="password"  name='comfpass'class="form-control" id="exampleInputPassword2">
  </div>
 
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <p>Already user? <br><a href="login.html">login</a></p>
  <?php
if($_SERVER['REQUEST_METHOD']=='POST'){  //2
        $name=$_POST['name'];
        $email=$_POST['email'];  
        $number=$_POST['number'];
        $pass1=$_POST['pass'];
        $pass2=$_POST['comfpass'];
        
       
    //submit it to database

    //connecting to database
      $servername="localhost";
      $username ="root";
      $password ="";     //blank password
   

//Create a connection
      $conn=mysqli_connect($servername,$username,$password);

      if(!$conn){
      die("Sorry we failed to connect:" .mysqli_connect_error());
      }else{
     
      }
      $sql="INSERT INTO canteen.register ( `Name`, `email`, `phone number`, `password`, `conferm password`) VALUES ('$name','$email','$number','$pass1','$pass2')";

      $result=mysqli_query($conn,$sql);


//check for the database insertion success
      if($result){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> your entry has been successfully submitted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

      
      }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR!</strong> We are facing some technical issue and your entry was not subitted successfully!
        we regret the inconvinience caused!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true>&times;</span>
        </button>
        </div>';
      }     
}
?>
</form>

</body>
</html>