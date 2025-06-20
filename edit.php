<?php
include 'config.php';
include 'includes/header.php';

if (!isset($_GET['id'])) {
    echo "<p style='color:red;'>User ID missing.</p>";
    include 'includes/footer.php';
    exit;
}

$id = (int)$_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$user = mysqli_fetch_assoc($res);

if (!$user) {
    echo "<p style='color:red;'>User not found.</p>";
    include 'includes/footer.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $age   = (int)$_POST['age'];

    if ($name && $email && $age > 0) {
        mysqli_query($conn, "UPDATE users SET name='$name', email='$email', age=$age WHERE id=$id");
        header('Location: index.php');
        exit;
    } else {
        echo "<p style='color:red;'>Please fill all fields correctly.</p>";
    }
}
?>

<h2>Edit User</h2>
<form method="post">
    <input name="name" value="<?= htmlspecialchars($user['name']) ?>" placeholder="Name"><br>
    <input name="email" value="<?= htmlspecialchars($user['email']) ?>" placeholder="Email"><br>
    <input name="age" type="number" value="<?= $user['age'] ?>" placeholder="Age"><br>
    <button type="submit">Update</button>
</form>

<?php
mysqli_free_result($res);
mysqli_close($conn);
include 'includes/footer.php';
?>
