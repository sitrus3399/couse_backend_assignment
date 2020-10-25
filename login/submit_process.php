<?php
 SESSION_START();
 include("../database.php"); // sertakan database.php untuk dapat menggunakan class database
 $db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya 
 $user_id = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : "";
 $level = (isset($_SESSION['level'])) ? $_SESSION['level'] : "";
 $score = $_POST['score'];
 $game_id = (isset($_SESSION['game_id'])) ? $_SESSION['game_id'] : "";
 
 $result = $db->execute("INSERT INTO leaderboard_game_tbl(
															user_id,
															game_id,
															level,
															score
															) VALUES(
															'".$user_id."',
															'".$game_id."',
															'".$level."',
															'".$score."'
	)");

 if($result){ $_SESSION["notification"] = "Submit Berhasil"; }
 else{ $_SESSION["notification"] = "Submit Gagal"; }
 
 
 header("Location: http://localhost/DATABASE_IMPLEMENTATION/user/submit.php"); 
?>