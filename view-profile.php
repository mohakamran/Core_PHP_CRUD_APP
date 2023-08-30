<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <!-- css add  -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/admin.css">
    <link rel="stylesheet" href="index.css">

    <style>
    .card2-view {
    background-color: #ffffff;
    border: 1px solid #dddddd;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    /* width: 300px; */
    padding: 20px;
    box-sizing: border-box;
    text-align: left;
  }

  .card2-view img {
    width: 300px;
    height: 300px;
    padding: 5px;
    border-radius: 50px;
    display: block;
    margin: 0 auto;
}
  }

  .card2-view h2 {
    margin-top: 0;
    font-size: 1em;
    font-weight: 500;
    font-family: 'Poppins', sans-serif;
  }

  .card2-view p {
    margin: 0;
    color: #666666;
    font-size: 1rem;
  }
    </style>
    
</head>
<body>
   <!-- Include Footer PHP -->
   <?php require("header.php"); ?>
   
      <?php   $id = $_GET['id']; 
       require "db.php";
       $sql = "SELECT * FROM emp WHERE id='$id' ";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) { 
   ?>
    <div class="container-form">
        <div class="card2-view">
            <?php
                echo "<img style='border-radius:30px' class='img-pro' src='admin/" . $row["image_path"] . "' ";
                echo "<p><strong>Full Name:</strong> </p> <p>".$row["Full_Name"]."</p>";
                echo "<p><strong>Age:</strong> </p> <p>".$row["Age"]."</p>";
                echo "<p> <strong> Designation: </strong> </p> <p>".$row["Designation"]."</p>";
                echo "<p> <strong> Gender </strong> </p> <p>".$row["Gender"]."</p>";
                echo "<p> <strong> Description </strong> </p> </p>".$row["Description"]."</p>";
            ?>
        </div>
    </div>
    <?php }} ?>
      <!-- Include Footer PHP -->
      <?php require("footer.php"); ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
