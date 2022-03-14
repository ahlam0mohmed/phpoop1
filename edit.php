<?php
  
  // Include database file
  include 'categry.php';

  $categriesObj = new Categry();

  // Edit categry record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $categry = $categriesObj->displyaRecordById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['update'])) {
    $categriesObj->updateRecord($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP MySql OOP CRUD Example Tutorial</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>PHP MySql OOP CRUD Example Tutorial</h4>
</div><br> 

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Update Records</h4>
                </div>
                <div class="card-body bg-light">
                  <form action="edit.php" method="POST">
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" class="form-control" name="uname" value="<?php echo $categry['name']; ?>" required="">
                    </div>
                    <div class="form-group">
                      <label for="type">Type</label>
                      <input type="text" class="form-control" name="utype" value="<?php echo $categry['type']; ?>" required="">
                    </div>
                    <div class="form-group">
                      <label for="price">Price:</label>
                      <input type="text" class="form-control" name="uprice" value="<?php echo $categry['price']; ?>" required="">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $categry['id']; ?>">
                      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
                    </div>
                  </form>
                </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>