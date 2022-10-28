<?php
include("header.php");
?>

<main class="bg-light">
    <div class="container py-5">
      <?php 
            // Create cert cards based on cert difficultystage
            createCertCards('\'Beginner\'');
            createCertCards('\'Intermediate\'');
            createCertCards('\'Advanced\'');
            createCertCards('\'Expert\'');
        ?>    


        <?php
          // PHP function to generate certification information
          function createCertCards($certDifficulty){
            include('../db_credentials.php');
            $conn = new mysqli('localhost', $user, $password, $database);

            // Query for Early Career
            $sql = "SELECT cert_Name, cert_Difficulty, cert_Abbreviation, cert_Description, cert_TimeToComplete, cert_LinkToOfficialSite, cert_Cost, CERTIFICATE_CAREER.career_ID 
                    FROM CERTIFICATE 
                    INNER JOIN CERTIFICATE_CAREER ON CERTIFICATE.cert_ID=CERTIFICATE_CAREER.cert_ID
                    WHERE CERTIFICATE_CAREER.career_ID =" . $_GET['id'] . " AND cert_Difficulty =" . $certDifficulty . ";";
           $result = $conn->query($sql);

            

            echo '<h2>' . str_replace("'", "", $certDifficulty) . '</h2>';
            echo '<div class="card-group">';
            // Create path buttons from career table
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo '
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">' . $row["cert_Name"] . ' (' . $row["cert_Abbreviation"] . ')</h5>
                      <p class="card-text">Cost: $' . $row["cert_Cost"] . '</p>
                      <p class="card-text">' . $row["cert_Description"] . '</p>
                      <p class="card-text">' . $row ["cert_TimeToComplete"] . '</p>
                      <a href="' . $row ["cert_LinkToOfficialSite"] . '"> Official Site </p>
                      <a href="cert_details.php?id=aaa" class="btn btn-primary">Learn More</a>
                    </div>
                  </div>
              ';
              }
            } 
            $conn->close();
            echo '</div>';
        }

          ?>
      </div>
    </div>
  </main>

<?php
include("footer.php");
?>