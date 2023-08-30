<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                      A new employee has been added. <a href="emps.php">View Details</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
           <?php } ?>
           <?php 
           if(isset($_GET['imgErr'])){ ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      File image upload error!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
           <?php } ?>
       
            <h1>Add New Employee</h1>
            <form method="post" action="" enctype="multipart/form-data">
              <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="username" name="fullname" required>
              </div>
              <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" id="email" name="age" required>
              </div>
              <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" id="designation" name="designation" required>
              </div>
              <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Description">Description:</label>
                <textarea class="feedback-textarea" name="description" rows="4" placeholder="Enter employee details"></textarea>
              </div>
              <div class="form-group">
                <label for="fullname">Employee Image:</label>
                <input class="upload-input" type="file" accept="image/*" name="image" id="photo">
              </div>
              <button type="submit" name='saveInfo'>Save Info</button>
            </form>
        </div>
    </div>
    
      <!-- Include Footer PHP -->
      <?php require("footer.php"); ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 


if(isset($_POST['saveInfo'])) {
   require "../db.php";
    $fullname = $_POST["fullname"];
    $age = $_POST["age"];
    $Designation = $_POST["designation"];
    $Gender = $_POST["gender"];
    $Description = $_POST["description"];
    $image = $_FILES["image"];

    // Handle image upload
    $target_dir = "uploads/"; // Directory where images will be stored
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_path = $target_file;
        // Insert data and image path into the database
        $insert_query = "INSERT INTO emp(Full_Name	, Age, Designation, Gender, Description, image_path) 
                         VALUES ('$fullname', '$age', '$Designation', '$Gender', '$Description', '$image_path')";
        if ($conn->query($insert_query) === TRUE) {
           echo "<script>window.open('index.php?success=true','_self')</script>";
        } else {
          echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
         // Now you can use the $conn variable to perform database queries
        // Close the connection when done
        $conn->close();
    }
    else {
      echo "<script>window.open('index.php?imgErr=true','_self')</script>";
    }
}

?>