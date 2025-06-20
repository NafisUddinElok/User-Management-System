<?php 
include 'config.php'; 
include 'includes/header.php'; 
?>

<h2>Add User</h2>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $age   = (int)$_POST['age'];

    if ($name && $email && $age > 0) {
        mysqli_query($conn, "INSERT INTO users(name, email, age) VALUES ('$name', '$email', $age)");
        header('Location: index.php'); 
        exit;
    } else {
        echo "<p style='color: red;'>Please fill all the fields.</p>";
    }
}
?>

<form method="post">
    <input name="name" placeholder="Name"><br>
    <input name="email" placeholder="Email"><br>
    <input name="age" type="number" placeholder="Age"><br>
    <button type="submit">Add</button>
</form>

<?php include 'includes/footer.php'; ?>
