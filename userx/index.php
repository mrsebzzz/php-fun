<?php

require 'config.php';

    // Attempt to log in
    if(isset($_GET['login'])) {
        $login      = $_POST['login'];
        $password   = $_POST['password'];
        
        
        // Construct
        $crud = new CRUD('mysql', 'userx', 'localhost', 'sebasw9');
        $crud->table = "user";
        $result = $crud->select('*', ['login' => $login, 'password' => hash256($password)]);
    
    
    // There is a match    
    if (!empty($result)) {
        $user_id = $result[0]['user_id'];
        $_SESSION['user_id'] = $user_id;
        $crud->update(['date_logged' => DATETIME], ['user_id' => $user_id]);
        header('Location: dashboard.php');
        exit;
    }
        echo "<div class='alert alert-danger' role='alert'>Invalid user!</div>";
    }
    
    
    if(isset($_GET['logout'])) {
        session_destroy();
        echo "<div class='alert alert-danger' role='alert'>Logged user out!</div>";
    } 
    
?>

<?php include('header.php'); ?>

    <hr />
    <div class="login">
        <div class="container col-md-offset-3 col-md-3">
        <form method="post" class="form-group" action="index.php?login">
            
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Login">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Log In</button>
        </form>
        </div>
    </div>
   
    
<?php include('footer.php'); ?>