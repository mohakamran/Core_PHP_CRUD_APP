<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Job</title>
    <!-- css add  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/admin.css">
    
</head>
<body>
   <!-- Include Footer PHP -->
   <?php require("header.php"); ?>
    <div class="container-form">
        <div class="card">
          <?php
            if(isset($_GET['success'])){ ?>
                  <div class="alert alert-primary alert-dismissible fade show" role="alert">
                      Job Application has been submitted. Keep patience we will contact with you soon. <a href="view-jobs.php">View Details</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
           <?php } ?>

           <?php
            if(isset($_GET['filetype'])){ ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Please attach a PDF file resume. <a href="view-jobs.php">View Details</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
           <?php } ?>

           <?php
               require "db.php"; 
               if(isset($_GET['id'])) {

               
               $data_id = $_GET['id'];
               $query = "select * from jobs where ID='$data_id' ";
               $result = $conn->query($query);
               if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
           ?>
           <ul>
               <li><strong>Job title:</strong> <?php echo $row['Title']; ?></li>
               <li><strong>Minimum Experience:</strong> <?php echo $row['Experience']; ?> Years </li>
               <li><strong>Last Date to Apply:</strong> <?php echo $row['Last_Date']; ?></li>
               <li><strong>Job Type:</strong> <?php echo $row['Job_Type']; ?></li>
               <li><strong>Job Time:</strong> <?php echo $row['Job_Time']; ?></li>
               <li><strong>Job Desc:</strong> <?php echo $row['Job_Desc']; ?></li>
           </ul>
           <p>Please Read above Job Description carefully. If you do not meet any of above Job Conditions, Your Resume will be directly
               rejected. </p>
             <?php 
                } } 
                else {
                   echo "No Job Found";
                } }?>
            <h1>Apply Now</h1>
            <form method="post" action="apply-job.php?id=<?php echo $data_id ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="username" name="candidate_name" required>
              </div>
              <div class="form-group">
                <label for="candidate_phone">Phone Number</label>
                <input type="number" id="username" name="candidate_phone" required>
              </div>
              <div class="form-group">
                <label for="candidate_email">Email</label>
                <input type="email" id="username" name="candidate_email" required>
              </div>
              <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="email" name="age" required>
              </div>
              <div class="form-group">
                <label for="experience">Experience</label>
                <input type="number" id="experience" name="experience" required>
              </div>
              <div class="form-group">
                <label for="candidate_location">Address</label>
                <input type="text" id="last-date" name="candidate_location" required>
              </div>
              <div class="form-group">
                <label for="expected_salary">Expected Salary</label>
                <input type="number" name="expected_salary" required>
              </div>
              <div class="form-group">
                <label for="candidate_resume">Resume(PDF)</label>
                <input type="file" name="candidate_resume" accept=".pdf" required>
              </div>
             
              <button type="submit" name='applyJob'>Submit Application</button>
            </form>
        </div>
    </div>
    
      <!-- Include Footer PHP -->
      <?php require("footer.php"); ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 


if(isset($_POST['applyJob'])) {
   require "db.php";
    $targetDir = "/admin/resumes/";  // target directory
    $targetFile = $targetDir . basename($_FILES["candidate_resume"]["name"]); 
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $candidate_name = $_POST["candidate_name"];
    $job_id = $_GET['id'];
    $age = $_POST["age"];
    $experience = $_POST["experience"];
    $candidate_location = $_POST["candidate_location"];
    $expected_salary= $_POST["expected_salary"];
    $candidate_phone = $_POST['candidate_phone'];
    $candidate_email = $_POST['candidate_email'];
    // Check if the file is a PDF
    if ($fileType != "pdf") {
      echo "<script>window.open('apply-job.php?filetype=false&id=$job_id','_self')</script>";
      $uploadOk = 0;
    }
    else {

      if (move_uploaded_file($_FILES["candidate_resume"]["tmp_name"], $targetFile)) {

          $insert_query = "INSERT INTO cadidates(Name	, Age, Experience, Location, Expected_Salary, Resume, Status, Job_ID, candidate_phone, candidate_email) 
                      VALUES ('$candidate_name', '$age', '$experience', '$candidate_location', '$expected_salary', '$targetFile', 'Pending', '$job_id', '$candidate_phone','$candidate_email')";
          if ($conn->query($insert_query) === TRUE) {
            echo "<script>window.open('apply-job.php?success=true&$job_id','_self')</script>";
          } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
          }
           
       }
    }

    
       
   
}

?>