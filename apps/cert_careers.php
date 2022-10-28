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
        <h1>IT Career Path Certifications :)</h1>
        <p>A tool to help information systems majors find certification and career information!</p> 
      </div>
    </div>

    <div class="container py-5">
      <div class="row">
        <?php
          // File with stored db credentials
          include('../db_credentials.php');

          // Create connection
          $conn = new mysqli('localhost', $user, $password, $database);

          // Query to get career path button information
          $sql = "SELECT * FROM CAREER";
          $result = $conn->query($sql);

          // Create path buttons from career table
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo '
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">' . $row["career_Name"] . '</h5>
                    <p class="card-text">' . $row["career_Description"] . '</p>
                    <a href="career_details.php?id= ' . $row["career_ID"] . '" class="btn btn-primary">Learn More</a>
                  </div>
                </div>
            ';
            }
          } 
          $conn->close();
        ?>
      </div>
    </div>
  </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>