<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- css add  -->
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <!-- Include Footer PHP -->
     <?php require("header.php"); ?>
    <!-- Cards Gallery -->

    <h1 class="center-heading">Our Employees</h1>
    <div class="cards">
        <?php require "db.php"; 
        
        // Fetch data from the employees table
        $query = "SELECT * FROM emp ORDER BY RAND() LIMIT 8";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        
        ?>
        <div class="card">
            <img src="admin/<?php echo $row["image_path"]; ?>" alt="Dummy Image">
            <h2>Name: <?php echo $row["Full_Name"]; ?></h2>
            <p>Designation: <?php echo $row["Designation"]; ?></p>
            <a href="view-profile.php?id=<?php echo $row['id'] ?>" class="view-profile">View Profile</a>
        </div>

        <?php }} ?>
    </div>
     <!-- Jobs -->
    <h1 class="center-heading">Current Jobs</h1>
    <div class="cards">
       <?php require "db.php"; 
        
        // Fetch data from the employees table
        $query = "SELECT * FROM jobs ORDER BY ID DESC LIMIT 8";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
        <div class="card">
        <button class="status">Opened</button>
            <img src="https://img.freepik.com/free-vector/man-search-hiring-job-online-from-laptop_1150-52728.jpg?w=900&t=st=1692696614~exp=1692697214~hmac=bd3153fd3c92c958497ed8bc8422761ae10e714b7865df687f713ac5b02f08ca" alt="Dummy Image">
            <h2>Current Job: <?php echo $row["Title"]; ?></h2>
            <a href="apply-job.php?id=<?php echo $row['ID'] ?>" class="view-profile">Apply for Job</a>
        </div>
        <?php }} ?>
    </div>
    
   <!-- Include Footer PHP -->
   <?php require("footer.php"); ?>
</body>
</html>