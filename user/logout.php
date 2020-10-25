<?php
SESSION_START();
SESSION_UNSET($_SESSION);
unset($_SESSION['user_id']);
unset($_SESSION['token']);
SESSION_DESTROY();
header("Location: http://localhost/DATABASE_IMPLEMENTATION/");
?>