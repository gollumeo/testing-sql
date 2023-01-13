<?
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb";

// Creating connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$request = "SELECT * FROM users";
$result = $conn->query($request);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<hr>User's ID: " . $row['id'] . "<hr>Name: " . $row["name"] . "<hr> Email: " . $row['email'] . "<hr> Password: " . $row['password'];
    }
}

// Editing a name/username

$name = 'Pierre Mauriello';
$mail = 'p.mauriello54@gmail.com';
$id = 1;

$request_update = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

if ($conn->query($request_update) === TRUE) {
    echo "<br><br>Row updated succesfully<br>";
} else {
    echo "Error updating row: " . $conn->error;
}

$display_update = "SELECT * FROM users WHERE id=$id";
$result_update = $conn->query($display_update);

while ($row = $result_update->fetch_assoc()) {
    echo "<hr>New name: " . $row['name'];
}

$request_delete = "DELETE FROM users WHERE id=$id";

if ($conn->query($request_delete) === TRUE) {
    echo "<pre>User correctly deleted.</pre>";
} else {
    echo "Error deleting this user: " .$conn->error;
}