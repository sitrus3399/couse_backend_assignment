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
PAGE : LEADERBOARD
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
<br>
<form action="http://localhost/DATABASE_IMPLEMENTATION/user/leaderboard.php" method='GET'>
 Pilih Game
 <select name="gameid">
 <?php
 $gamedata = $db->get("SELECT game_id,nama_game,level FROM game_tbl WHERE status=1"); 
 while($row = mysqli_fetch_assoc($gamedata))
 {
 ?>
 <option value="<?php echo $row['game_id']?>"><?php echo $row['nama_game'] ." Level ".$row['level'] ?></option>
 <?php
 }
 ?>
 </select>
 <input type="submit" value="Tampilkan Leaderboard">
</form>
<?php
if(isset($_GET['gameid']))
{
 echo "LEADERBOARD GAME ID :".$_GET['gameid'];
 ?>
 <table border=1>
 <tr><td>NO</td><td>NAMA</td><td>CLASS</td><td>SCORE</td></tr>
 <?php
 $leaderboarddata = $db->get("SELECT user_tbl.nama as nama, 
 class_tbl.class_name as class_name, 
 max(leaderboard_game_tbl.score) as score FROM user_tbl, 
 leaderboard_game_tbl,class_tbl WHERE user_tbl.user_id = leaderboard_game_tbl.user_id AND leaderboard_game_tbl.game_id = ".$_GET['gameid']." AND user_tbl.class_id = class_tbl.class_id GROUP BY user_tbl.user_id ORDER BY score DESC");
 $no = 0;
 while($row = mysqli_fetch_assoc($leaderboarddata))
 {
 $no++;
 ?>
 <tr>
 <td><?php echo $no?></td>
 <td><?php echo $row['nama']?></td>
 <td><?php echo $row['class_name']?></td>
 <td><?php echo $row['score']?></td> 
 </tr>
 <?php
 }
 ?>
 </table>
 <?php
}
?>