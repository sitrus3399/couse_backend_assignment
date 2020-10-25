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
 $statisticdata = $db->get("SELECT game_tbl.nama_game as game, 
 game_tbl.level as level,
 MIN(leaderboard_game_tbl.score) as min,
 MAX(leaderboard_game_tbl.score) as max,
 AVG(leaderboard_game_tbl.score) as avg 
 FROM leaderboard_game_tbl, game_tbl
 WHERE leaderboard_game_tbl.game_id = game_tbl.game_id AND leaderboard_game_tbl.user_id = '".$user_id."' group by leaderboard_game_tbl.game_id"); 
 
 
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
PAGE : STATISTIK
<table border=1>
 <tr>
 <td>MENU</td>
 <td><a href="http://localhost/DATABASE_IMPLEMENTATION/user/">HOME</a></td>
 <td><a href="http://localhost/DATABASE_IMPLEMENTATION/user/statistik.php">STATISTIK</a></td> 
 <td><a href="http://localhost/DATABASE_IMPLEMENTATION/user/leaderboard.php">LEADERBOARD</a></td>
 <td><a href="http://localhost/DATABASE_IMPLEMENTATION/user/submit.php">SUBMIT SCORE</a></td>
 <td><a href="http://localhost/DATABASE_IMPLEMENTATION/user/logout.php">LOGOUT</a></td>
 </tr>
</table>
<table border=1>
 <tr><td align="center" colspan=4>USER STATISTIK SKOR GAME</td></tr>
 <tr><td>GAME</td><td>LEVEL</td><td>MIN</td><td>MAX</td><td>AVG</td></tr>
 <?php
 while($row = mysqli_fetch_assoc($statisticdata))
 {
 ?>
 <tr>
 <td><?php echo $row['game']?></td>
 <td><?php echo $row['level']?></td>
 <td><?php echo $row['min']?></td>
 <td><?php echo $row['max']?></td>
 <td><?php echo $row['avg']?></td> 
 </tr>
 <?php
 }
 ?>
</table>
