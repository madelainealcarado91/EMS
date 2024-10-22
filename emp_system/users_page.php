

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
  h1 {
        margin-top: 5%;
        margin-bottom: 3%;
        text-align: center;
        font-size: 4.5rem;
        font-weight: bold;
        color: #25476a;
    }
</style>
<body>
      
  <?php
    session_start();
    include 'database.php';
    if (!isset($_SESSION['user_id'])) header('Location: login.php');
    $result = $conn->query("SELECT * FROM users");
    ?>
    <div class="container mt-4">
        <h1>USER MANAGEMENT</h1>
        <div class="d-flex mb-4">
            <form action="add_users.php" class="mr-2">
                <button type="submit" class="btn btn-primary">Add New User</button>
            </form>
            <form action="emp_page.php">
                <button type="submit" class="btn btn-primary">See Employee Records</button>
            </form>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td>
                            <a href="edit_users.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form method="POST" action="delete.php" style="display:inline;">
                                <input type="hidden" name="action" value="delete_user">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                              </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
