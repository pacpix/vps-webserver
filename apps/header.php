<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Cert Tool Testing</title>
  </head>

  <body>

	<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">IT Career Path Certifications</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="cert_careers.php">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav> 
	</header>

    <main class="bg-light">
    <div class="jumbotron">
      <div class="container">
        <?php
          // PHP section to set up initial page information
          include('../db_credentials.php');

          // Create connection
          $conn = new mysqli('localhost', $user, $password, $database);
          
          // Query to get career path button information from user input on home page
          $sql = "SELECT * FROM CAREER WHERE career_ID =" . $_GET['id'] . ";";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
              echo '
                <h1>' . $row["career_Name"] . '</h1>
                <p>' . $row["career_Description"] . '</p>
              ';
              }
            } 
            $conn->close();
          ?>
      </div>
    </div>
