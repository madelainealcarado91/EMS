<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 500px;
            margin: 0 auto; 
            margin-top: 15%;
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

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST['username'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
      header('Location: users_page.php');
      exit();
  }
  ?>
  
  <div class="container mt-5">
      <div class="form-container">
          <h2 class="text-center">ADD USER</h2>
          <form method="POST">
              <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Add User</button>
              <a href="users_page.php" class="btn btn-secondary btn-block">Cancel</a>
          </form>
      </div>
  </div>
</body>
</html>
