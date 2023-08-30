<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emplooyes</title>
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
        $query = "SELECT * FROM emp";
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
    
   <!-- Include Footer PHP -->
   <?php require("footer.php"); ?>
</body>
</html>