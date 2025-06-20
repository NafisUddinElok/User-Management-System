<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
}

mysqli_close($conn);
header('Location: index.php');
exit;
?>
