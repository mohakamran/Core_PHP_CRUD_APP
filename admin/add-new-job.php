<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Job</title>
    <!-- css add  -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
    
</head>
<body>
   <!-- Include Footer PHP -->
   <?php require("header.php"); ?>
    <div class="container-form">
        <div class="card">
          <?php
            if(isset($_GET['success'])){ ?>
                  <div class="alert alert-primary alert-dismissible fade show" role="alert">
                      A new Job has been added. <a href="view-jobs.php">View Details</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
           <?php } ?>
    
            <h1>Add New Job</h1>
            <form method="post" action="" >
              <div class="form-group">
                <label for="fullname">Job Title:</label>
                <input type="text" id="username" name="job-title" required>
              </div>
              <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" id="email" name="age" required>
              </div>
              <div class="form-group">
                <label for="experience">Experience:</label>
                <input type="text" id="experience" name="experience" required>
              </div>
              <div class="form-group">
                <label for="last-date">Last Date:</label>
                <input type="date" id="last-date" name="last-date" required>
              </div>
              <div class="form-group">
                <label for="jobtype">Job Type:</label>
                <select id="jobtype" name="jobtype" required>
                    <option value="On Site"> On Site</option>
                    <option value="Remote"> Remote</option>
                    <option value="Hybrid"> Hybrid</option>
                </select>
              </div>
              <div class="form-group">
                <label for="jobtime">Job Time:</label>
                <select id="jobtype" name="jobtime" required>
                    <option value="9AM-6PM (Morning Shift)"> 9AM-6PM (Morning Shift)</option>
                    <option value="8PM-5AM (Night Shift)"> 8PM-5AM (Night Shift)</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Description">Job Description:</label>
                <textarea class="feedback-textarea" name="description" rows="4" placeholder="Enter employee details"></textarea>
              </div>
             
              <button type="submit" name='saveJob'>Add Job Info</button>
            </form>
        </div>
    </div>
    
      <!-- Include Footer PHP -->
      <?php require("footer.php"); ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 


if(isset($_POST['saveJob'])) {
   require "../db.php";
    $job_title = $_POST["job-title"];
    $age = $_POST["age"];
    $experience = $_POST["experience"];
    $last_date = $_POST["last-date"];
    $jobtype= $_POST["jobtype"];
    $jobtime = $_POST["jobtime"];
    $description = $_POST["description"];

    $insert_query = "INSERT INTO jobs(Title	, Age, Experience, Last_Date, Job_Type, Job_Time, Job_Desc) 
                    VALUES ('$job_title', '$age', '$experience', '$last_date', '$jobtype', '$jobtime', '$description')";
    if ($conn->query($insert_query) === TRUE) {
      echo "<script>window.open('add-new-job.php?success=true','_self')</script>";
    } else {
      echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
       
   
}

?>