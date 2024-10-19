<?php
include 'conn.php';

$sql = "CREATE TABLE IF NOT EXISTS Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(40) NOT NULL UNIQUE,
    password VARCHAR(40) NOT NULL,
    role varchar(20)('admin', 'user') NOT NULL DEFAULT 'user',
    email VARCHAR(40) NOT NULL UNIQUE,
    phone VARCHAR(11),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

?>
