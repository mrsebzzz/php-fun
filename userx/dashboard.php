<?php
    require('config.php');
    protected_area();
    
?>

<?php include('header.php'); ?>

<hr />

<div class="container">
    
    <h1>Dashboard</h1>
    <a class="btn btn-md btn-danger" href="index.php?logout">Logout</a>
    <a class="btn btn-md btn-success" href="user.php">Create User</a>
    
</div>

<?php include('footer.php'); ?>