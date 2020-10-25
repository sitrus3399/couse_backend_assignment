<?php
SESSION_START();
include("../database.php"); // sertakan database.php untuk dapat menggunakan class database
$db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya
$user_id = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";
if($token && $user_id)
{
 $result = $db->execute("SELECT * FROM user_tbl WHERE user_id = '".$user_id."' AND token = '".$token."' ");
 if(!$result)
 {
 // redirect ke halaman login, data tidak valid
 header("Location: http://localhost/DATABASE_IMPLEMENTATION/");
 }
 // abaikan jika token valid
 $userdata = $db->get("SELECT user_tbl.user_id as user_id, user_tbl.nama as nama, class_tbl.class_name as class_name from user_tbl,class_tbl WHERE user_tbl.user_id = '".$user_id."' AND user_tbl.class_id = class_tbl.class_id"); 
 $userdata = mysqli_fetch_assoc($userdata); 
}
else
{
 header("Location: http://localhost/DATABASE_IMPLEMENTATION/");
}
$notification = (isset($_SESSION['notification'])) ? $_SESSION['notification'] : "";
if($notification)
{
 echo $notification;
 unset($_SESSION['notification']); 
}
?>
PAGE : HOME
<table border=1>
 <tr>
 <td>MENU</td>
 <td><a href="http://localhost/DATABASE_IMPLEMENTATION/user/">HOME</a></td>
 <td><a href="http://localhost/DATABASE_IMPLEMENTATION/user/statistik.php">STATISTIK</a></td> 
 <td><a href="http://localhost/DATABASE_IMPLEMENTATION/user/leaderboard.php">LEADERBOARD</a></td>
 <td><a href="http://localhost/DATABASE_IMPLEMENTATION/user/submit.php">SUBMIT SCORE</a></td>
 <td><a href="http://localhost/DATABASE_IMPLEMENTATION/user/logout.php">LOGOUT</a></td>
 </tr>
 <tr><td align="center" colspan=5>Profile</td></tr>
 <tr><td>ID</td><td colspan=4><?php echo $userdata['user_id'];?></td></tr>
 <tr><td>Nama</td><td colspan=4><?php echo $userdata['nama'];?></td></tr>
 <tr><td>Class</td><td colspan=4><?php echo $userdata['class_name'];?></td></tr>
</table>
