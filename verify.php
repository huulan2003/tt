<?php
$email = $_POST['inputEmail'];
$pswd = $_POST['inputPasswd'];

$conn = mysqli_connect("localhost", "root", "", "obs_db");

if (!$conn) {
    die("Cannot connect to database " . mysqli_connect_error());
}

$query = "SELECT username, password FROM admin";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    $hashedPassword = $row['password'];

    // Verify the hashed password using password_verify
    if ($email == $row['username'] && password_verify($pswd, $hashedPassword)) {
        echo "Welcome admin! Long time no see";
        break;
    }
}

// Close the database connection
mysqli_close($conn);
?>
