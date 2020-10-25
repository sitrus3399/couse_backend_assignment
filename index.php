<?php
SESSION_START();
include("database.php"); // sertakan database.php untuk dapat menggunakan class database
$db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya
$user_id = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";
if($token && $user_id)
{
 $result = $db->execute("SELECT * FROM user_tbl WHERE user_id = '".$user_id."' AND token = '".$token."' ");
 if($result)
 {
 // redirect ke halaman user, token valid
 header("Location: http://localhost/DATABASE_IMPLEMENTATION/user/");
 }
 // abaikan jika token tidak valid
}
// token tidak tersedia
 
$notification = (isset($_SESSION['notification'])) ? $_SESSION['notification'] : "";
if($notification)
{
 echo $notification;
 unset($_SESSION['notification']);
 echo "<br>";
}
?>
PAGE : LOGIN
<form action="login/process.php" method="POST">
<table>
 <tr>
 <td>ID</td>
 <td>:</td>
 <td><input type="text" name="user_id" required></td>
 </tr>
 <tr>
 <td>Password</td>
 <td>:</td>
 <td><input type="password" name="password" required></td>
 </tr>
 <tr>
 <td colspan=3><input type="submit" value="LOGIN"></td>
 </tr> 
 </form> 
 <tr>
 <td colspan=3><button><a href="register.php">REGISTER</a></button></td>
 </tr> 
</table>
