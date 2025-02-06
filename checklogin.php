<?php
session_start();

// $host = "192.168.56.103"; // 数据库主机
$host = "localhost";
$dbname = "blog"; // 数据库名称
$username = "blogadmin"; // 数据库用户名
$password = "password"; // 数据库密码

try {
    // 创建 PDO 连接
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("数据库连接失败：" . $e->getMessage());
}

// 获取用户输入
$myusername = $_POST['myusername'] ?? '';
$mypassword = $_POST['mypassword'] ?? '';

// 预处理 SQL 查询，防止 SQL 注入
$sql = "SELECT password, salt FROM members WHERE username = :username LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([':username' => $myusername]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $returnedpassword = $user['password'];
    $salt = $user['salt'];

    // 生成哈希密码
    $salted_password = $salt . $mypassword;
    $hashed_password = hash("sha512", $salted_password);

    // 验证密码
    if ($hashed_password === $returnedpassword && !empty($mypassword)) {
        $_SESSION['username'] = $myusername;
        header("location:login_success.php");
        exit();
    }
}

// 失败情况
$_SESSION['username'] = $myusername;
header("location:login_fail.php");
exit();
?>