<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Databaza</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
    <div class="container my-4">
    <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>MESSAGE</th>
        <th>ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "partials/connection.php";
        $sql = "select * from kontakt";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <th>$row[id]</th>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[phone]</td>
        <td>$row[message]</td>
    
        <td>
                  <a class='btn btn-success' href='uprav2.php?id=$row[id]'>Edit</a>
                  <a class='btn btn-danger' href='delete2.php?id=$row[id]'>Delete</a>
                </td>
      </tr>
      ";
        }
      ?>
    </tbody>
  </table>
      </div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>