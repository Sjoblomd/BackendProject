<?php
session_start();
include '../includes/functions.php';

$upload_dir = '../uploads/';
$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture'])) {
    $file = $_FILES['profile_picture'];
    $file_name = basename($file['name']);
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    $allowed_exts = ['jpg', 'jpeg', 'png'];
    if (!in_array($file_ext, $allowed_exts)) {
        $errors[] = "Only JPG and PNG files are allowed.";
    }
    
    if ($file_size > 500000) {
        $errors[] = "File size should not exceed 2MB.";
    }
    
    if (empty($errors)) {
        $new_file_name = uniqid("profile_", true) . '.' . $file_ext;
        $file_path = $upload_dir . $new_file_name;
        
        if (move_uploaded_file($file_tmp, $file_path)) {
            $_SESSION['profile_picture'] = $new_file_name;
            $_SESSION['upload_success'] = "Profile picture uploaded successfully!";
        } else {
            $_SESSION['upload_errors'][] = "Failed to upload profile picture.";
        }
    } else {
        $_SESSION['upload_errors'] = $errors;
    }
    header("Location: ../pages/profile.php");
    exit();
}
?>