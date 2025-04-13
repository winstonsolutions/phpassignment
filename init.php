<?php
// 包含配置文件
require_once 'config.php';

// 确保会话已启动
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>