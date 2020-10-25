<?php
SESSION_START();
include("database.php"); // sertakan database.php untuk dapat menggunakan class database
$db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya
$user_id = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";
if($token && $user_id)
{
 $result = $db->execute("SELECT * FROM user_tbl WHERE user_id = '".$user_id."' AND token = '".$token."' AND status = 1 ");
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
}
?>
PAGE : REGISTER
<form action="login/register_process.php" method="POST">
<table>
 <tr>
 <td>ID</td><td>:</td><td><input type="text" name="user_id" required></td>
 </tr>
 <tr>
 <td>password</td><td>:</td><td><input type="password" name="password" required></td>
 </tr>
 <tr>
 <td>password(again)</td><td>:</td><td><input type="password" name="password2" required></td>
 </tr> 
 <tr>
 <td>nama</td><td>:</td><td><input type="text" name="nama" required></td>
 </tr> 
 <tr>
 <td>email</td><td>:</td><td><input type="text" name="email" required></td>
 </tr> 
 <tr>
 <td>Class</td><td>:</td>
 <td>
 <select name="class" required>
 <option value="">- SELECT -</option>
 <?php
 $kota = $db->get("SELECT class_id,class_name FROM class_tbl WHERE status = 1");
 if($kota)
 {
 while($row = mysqli_fetch_assoc($kota))
 {
 ?>
 <option value="<?php echo $row['class_id'] ?>"><?php echo $row['class_name']?></option>
 <?php
 }
 }
 ?>
 </select>
 </td>
 </tr> 
 <tr>
 <td colspan=3><input type="submit" value="REGISTER"></td>
 </tr> 
</table>
</form>
<button><a href="http://localhost/DATABASE_IMPLEMENTATION/">Back to Login</button>
