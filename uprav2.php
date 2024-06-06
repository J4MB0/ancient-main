<?php
  include "partials/connection.php";


  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location:admin2.php");
      exit;
    }
    $id = $_GET['id'];
    $sql = "select * from kontakt where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(!$row){
      header("location: admin2.php");
      exit;
    }
    $name=$row["name"];
    $email=$row["email"];
    $phone=$row["phone"];
    $message=$row["message"];
    

  }
  else{
    $id = $_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $message=$_POST["message"];
    

    $sql = "update kontakt set name='$name', email='$email', phone='$phone', message='$message' where id='$id'";
    if($conn->query($sql)){
      header("location: admin2.php");
      exit;
    }
  }
  
?>

<head>
 <title>CRUD</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
      <div class="container-fluid">
        <a class="navbar-brand" href="admin.php">PHP CRUD OPERATION</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="admin.php">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="admin2.php">Kontakt</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-warning">
 <h1 class="text-white text-center">  Update </h1>
 </div><br>

 <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>

 <label> NAME: </label>
 <input type="text" name="name" value="<?php echo $name; ?>" class="form-control"> <br>

 <label> EMAIL: </label>
 <input type="text" name="email" value="<?php echo $email; ?>" class="form-control"> <br>

 <label> PHONE: </label>
 <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control"> <br>

 <label> MESSAGE: </label>
 <input type="text" name="message" value="<?php echo $message; ?>" class="form-control"> <br>


 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="admin2.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
