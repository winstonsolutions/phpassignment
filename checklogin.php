<?php
session_start();

$host = "192.168.56.103"; // Database host
// $host = "localhost";
$dbname = "blog"; // Database name
$username = "blogadmin"; // Database username
$password = "password"; // Database password

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Get user input
$myusername = htmlspecialchars($_POST['myusername'] ?? ''); // Sanitize username input to prevent XSS
$mypassword = htmlspecialchars($_POST['mypassword'] ?? ''); // Sanitize password input to prevent XSS


// Prepare SQL query to prevent SQL injection
// $sql = "SELECT password, salt FROM members WHERE username = :username LIMIT 1";
$sql = "SELECT id, password, salt FROM members WHERE username = :username LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([':username' => $myusername]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $returnedpassword = $user['password'];
    $salt = $user['salt'];
    $id = $user['id'];

    // Generate hashed password
    $salted_password = $salt . $mypassword;
    $hashed_password = hash("sha512", $salted_password);



    // Verify password
    if ($hashed_password === $returnedpassword && !empty($mypassword)) {
        $_SESSION['username'] = $myusername;
        $_SESSION['userid'] = $id;
        header("location:login_success.php");
        exit();
    }
}

// Failure case
// $_SESSION['username'] = $myusername;

header("location:login_fail.php");
exit();
?>