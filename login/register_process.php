<?php
 SESSION_START();
 include("../database.php"); // sertakan database.php untuk dapat menggunakan class database
 $db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya 
 $user_id = $_POST['user_id'];
 $nama = $_POST['nama'];
 $email = $_POST['email'];
 $class = $_POST['class'];
 $token = ""; // dikosongkan untuk awal
 $password = md5($_POST['password']);
 $password2 = md5($_POST['password2']); 
 if($password == $password2)
 {
 if($user_id && $nama && $email && $class)
 {
 $result = $db->execute("INSERT INTO user_tbl(
 user_id,
 nama,
 email,
 class_id,
 token,
 password
 ) VALUES(
 '".$user_id."',
 '".$nama."',
 '".$email."',
 ".$class.",
 '".$token."',
 '".$password."'
 )");
 if($result){ $_SESSION["notification"] = "Register User Berhasil"; }
 else{ $_SESSION["notification"] = "Register User Gagal"; }
 }
 }
 header("Location: http://localhost/DATABASE_IMPLEMENTATION/"); 
?>