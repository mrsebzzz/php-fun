<?php
    require('config.php');
    
    
    // Protects dashboard from unauthorized user
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php');
    }

?>

<?php include('header.php'); ?>

<hr />

<div class="container">
    <h1>Dashboard</h1>
    <a class="btn btn-md btn-danger" href="index.php?logout">Logout</a>
</div>

<?php include('footer.php'); ?>