<?php
 SESSION_START();
 include("../database.php"); // sertakan database.php untuk dapat menggunakan class database
 $db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya 
 $user_id = $_POST['user_id'];
 $password = md5($_POST['password']);
 $result = $db->get("SELECT user_id FROM user_tbl WHERE user_id= '".$user_id."' AND password='".$password."' ");
 if($result)
 {
 $_SESSION['notification'] = "Berhasil Login, Selamat Datang";
 $token = md5($user_id."coursebackend".date("Y-m-d H:i:s"));
 $db->execute("UPDATE user_tbl SET token = '".$token."' WHERE user_id = '".$user_id."'"); // update token to user_tbl
 $_SESSION['token'] = $token;
 $_SESSION['user_id'] = $user_id;
 header("Location: http://localhost/DATABASE_IMPLEMENTATION/user/");
 }
 $_SESSION['notification'] = "Gagal Login, Coba lagi ";
 header("Location: http://localhost/DATABASE_IMPLEMENTATION/");
?>