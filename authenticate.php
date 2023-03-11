<?php
//if not login, user can not go cart section
if(!isset($_SESSION['auth'])){
    redirect('login.php', 'Login to continue');
}
?>