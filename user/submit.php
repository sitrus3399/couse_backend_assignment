<?php
SESSION_START();
include("../Database.php"); // sertakan database.php untuk dapat menggunakan class database
$db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya
if(isset($_GET['game_id']))
{
    $_SESSION['game_id'] = $_GET['game_id'];
    $_SESSION['level'] = "";
}
else if(isset($_GET['level']))
{
    $_SESSION['level'] = $_GET['level'];
}
else
{
    $_SESSION['game_id'] = "";
    $_SESSION['level'] = "";
}
$email = (isset($_SESSION['email'])) ? $_SESSION['email'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";
$game_id = (isset($_SESSION['game_id'])) ? $_SESSION['game_id'] : "";
$level = (isset($_SESSION['level'])) ? $_SESSION['level'] : "";
if($token)
{
   $result = $db->execute("SELECT * FROM user_tbl WHERE email = '".$email."' AND token = '".$token."'");
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

PAGE : SUBMIT SCORE
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

<form action="http://localhost/DATABASE_IMPLEMENTATION/user/submit.php" method='GET'>
       Pilih Game
       <select name="game_id">
           <?php
           $gamedata = $db->get("SELECT game_id,nama_game,level FROM game_tbl");                                
           while($row = mysqli_fetch_assoc($gamedata))
           {
               ?>
               <option value="<?php echo $row['game_id']?>"><?php echo $row['nama_game']. " Level "?><?php echo $row['level']?></option>
               <?php
           }
           ?>
       </select>
       <input type="submit" value="Pilih Game">
</form>

<br>
<?php 
if ($game_id)
{
    $nama_game = $db->get("SELECT nama_game, level FROM game_tbl WHERE game_id = '".$game_id."'");
    $nama_game = mysqli_fetch_assoc($nama_game);
    echo "Game : ".$nama_game['nama_game'].", ";
	echo "Level : " .$nama_game['level'];

    ?>
    <br>
    <form action = "http://localhost/DATABASE_IMPLEMENTATION/login/submit_process.php" method="POST">
    Score :
    <input type="text" name="score" required>
    <input type="submit" value="Submit Score">
    <?php
}
?>