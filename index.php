<?php 
include 'config.php'; 
include 'includes/header.php'; 
?>

<h2>User List</h2>

<?php
$res = mysqli_query($conn, "SELECT * FROM users");

if (mysqli_num_rows($res) > 0) {
    echo "<table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Action</th>
            </tr>";

    while ($u = mysqli_fetch_assoc($res)) {
        echo "<tr>
                <td>{$u['name']}</td>
                <td>{$u['email']}</td>
                <td>{$u['age']}</td>
                <td>
                    <a href='edit.php?id={$u['id']}'>Edit</a> |
                    <a href='delete.php?id={$u['id']}' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No users found.</p>";
}

mysqli_free_result($res);
mysqli_close($conn);
?>

<?php include 'includes/footer.php'; ?>
