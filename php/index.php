<?php
require 'db.php';
$db = new db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $db->insert($fname, $lname, $age, $phone);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User CRUD</title>
</head>
<body>
    <h2>Add User</h2>
    <form method="post">
        <input name="fname" placeholder="First Name" required>
        <input name="lname" placeholder="Last Name" required>
        <input name="age" type="number" placeholder="Age" required>
        <input name="phone" placeholder="Phone" required>
        <button type="submit">Add User</button>
    </form>

    <h2>All Users</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Age</th><th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = $db->getAll();
            foreach ($users as $user) {
                echo "<tr>
                        <td>{$user['id']}</td>
                        <td>{$user['fname']} {$user['lname']}</td>
                        <td>{$user['age']}</td>
                        <td>{$user['phone']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
