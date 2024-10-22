<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 500px; 
            margin: 0 auto; 
            margin-top: 10%;  
            padding: 20px;    
            border: 1px solid #ccc;
            border-radius: 5px; 
            background-color: #f9f9f9; 
        }
        h2 {
          font-weight: bold;
          color: #25476a;
        }
    </style>
</head>
<body>
  
  <?php
  include 'database.php';
  
  $id = $_GET['id'];
  $result = $conn->query("SELECT * FROM employees WHERE id = $id");
  $employee = $result->fetch_assoc();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $stmt = $conn->prepare("UPDATE employees SET name = ?, position = ?, contact = ? WHERE id = ?");
      $stmt->bind_param("sssi", $_POST['name'], $_POST['position'], $_POST['contact'], $id);
      $stmt->execute();
      header('Location: emp_page.php');
      exit(); 
  }
  ?>

  <div class="container mt-5">
      <div class="form-container">
          <h2 class="text-center">EDIT EMPLOYEE DETAILS</h2>
          <form method="POST">
              <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($employee['name']) ?>" required>
              </div>
              <div class="form-group">
                  <label for="position">Position:</label>
                  <input type="text" class="form-control" id="position" name="position" value="<?= htmlspecialchars($employee['position']) ?>" required>
              </div>
              <div class="form-group">
                  <label for="contact">Contact No.:</label>
                  <input type="number" class="form-control" id="contact" name="contact" value="<?= htmlspecialchars($employee['contact']) ?>" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Update Employee</button>
              <a href="emp_page.php" class="btn btn-secondary btn-block">Cancel</a>
          </form>
      </div>
  </div>
</body>
</html>
