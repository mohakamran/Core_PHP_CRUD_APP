<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Employees Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Centered Card with Responsive Table</title>
<link rel="stylesheet" href="admin.css">
<style>
  .cont {
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f0f0f0;
  }
  
 
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
  }
  
  th, td {
    padding: 10px;
    border-bottom: 1px solid #ccc;
    text-align: left;
  }
  
  th {
    background-color: #f0f0f0;
  }
</style>
</head>
<body>
  <?php require("header.php"); ?>
  <div class="cont">
    <div class="card">
        <h2>Employee Information</h2>
        <?php if(isset($_GET['del'])){ ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Deleted Successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
        <?php } ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Full_Name</th>
                <th>Age</th>
                <th>Designation</th>
                <th>Gender</th>
                <th>Description </th>
                <th>Image</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php  
               require "../db.php";
               // Fetch data from the employees table
                $query = "SELECT * FROM emp";
                $result = $conn->query($query);

                // Display data in a table
                $count = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $count = $count+1;
                        $id = $row['id'];
                        $del_link = "del.php?id=".$id;
                        echo "<tr>";
                            echo "<td>".$count."</td>";
                            echo "<td>".$row["Full_Name"]."</td>";
                            echo "<td>".$row["Age"]."</td>";
                            echo "<td>".$row["Designation"]."</td>";
                            echo "<td>".$row["Gender"]."</td>";
                            echo "<td>".$row["Description"]."</td>";
                            echo "<td><img src='" . $row["image_path"] . "' width='40' height='40'></td>";
                            echo '<td><a href="#" class="btn btn-primary">Update</a></td>';
                            echo "<td>
                                <a onclick=\"return confirm('Are you sure to delete?')\" href='$del_link' class='btn btn-danger'>Delete</a>
                                </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
                            
            ?>
        </table>
        </div>
  </div>  


<?php require("footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
