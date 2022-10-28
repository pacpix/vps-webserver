<?php
include("header.php");
?>

  <main class="bg-light">
    <div class="container py-5">
      <?php 
            // Create job cards based on career stage
            createJobCards('\'Early Career\'');
            createJobCards('\'Mid Career\'');
            createJobCards('\'Late Career\'');
        ?>    


        <?php
          // PHP function to generate career information
          function createJobCards($jobStage){
            include('../db_credentials.php');
            $conn = new mysqli('localhost', $user, $password, $database);

            // Query for Early Career
            $sql = "SELECT job_Title, job_Salary, job_Stage, job_Description, JOB_CAREER.career_ID 
                    FROM JOB 
                    INNER JOIN JOB_CAREER ON JOB.job_ID=JOB_CAREER.job_ID
                    INNER JOIN CAREER ON CAREER.career_ID=JOB_CAREER.job_ID
                    WHERE JOB_CAREER.career_ID =" . $_GET['id'] . " AND job_Stage =" . $jobStage . ";";
            $result = $conn->query($sql);

            echo '<h2>' . str_replace("'", "", $jobStage) . '</h2>';
            echo '<div class="card-group">';
            // Create path buttons from career table
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo '
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">' . $row["job_Title"] . '</h5>
                      <p class="card-text"><strong> Salary: $' . $row["job_Salary"] . '</strong></p>
                      <p class="card-text">' . $row["job_Description"] . '</p>
                      <a href="career_details.php?id=aaa" class="btn btn-primary">Learn More</a>
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