

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 500px; 
            margin: 0 auto;  
            padding: 20px;    
            margin-top: 15%;
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
    $result = $conn->query("SELECT * FROM users WHERE id = $id");
    $user = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $stmt = $conn->prepare("UPDATE users SET username = ? WHERE id = ?");
        $stmt->bind_param("si", $username, $id);
        $stmt->execute();
        header('Location: users_page.php');
        exit(); 
    }
    ?>
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="text-center">EDIT USER DETAILS</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Update User</button>
                <a href="users_page.php" class="btn btn-secondary btn-block">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>
