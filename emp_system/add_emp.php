<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
  h1 {
        margin-top: 5%;
        margin-bottom: 3%;
        text-align: center;
        font-size: 4rem;
        font-weight: bold;
        color: #25476a;
    }
    .container {
      width: 70%;
    }
</style>
<body>
  <?php
    include 'database.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $position = $_POST['position'];
        $contact = $_POST['contact'];
        $stmt = $conn->prepare("INSERT INTO employees (name, position, contact) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $position, $contact);
        $stmt->execute();
        header('Location: emp_page.php');

    }
    ?>
    <div class="container mt-4">
        <h1>ADD NEW EMPLOYEE</h1>
        <div class="card mb-4">
            <div class="card-body"> 
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" name="position" required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact No.</label>
                        <input type="number" class="form-control" id="contact" name="contact" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Employee</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

