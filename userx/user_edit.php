<?php
require('config.php');
protected_area();

$crud->table = "user";

    if (!isset($_GET['id'])) {
        redirect('dashboard.php');
        exit;
    }


$id = (int) $_GET['id'];

    // Only admin can edit other users
    // User can only edit themselves
    if($_SESSION['type'] == 'user' && $id != $_SESSION['user_id']) {
        $_SESSION['message'] = "You do not have authority to edit this user.";
        redirect('dashboard.php');
        exit;
    }


// List out existings users
$user = $crud->select('*', ['user_id' => $id]);
$login = $user[0]['login'];
$email = $user[0]['email'];

// Track any errors
$errors = [];

    if (isset($_GET['save'])) {
        $login = $_POST['login'];
        $email = $_POST['email'];
        
        // Error checking
        if (strlen($login) == 0) {
            $errors[] = "Login is required!";
        }
        
        if (strlen($email) == 0) {
            $errors[] = "Email is required!";
        }
        
        if(empty($errors)) {
            $result = $crud->update([
                'login' => $login,
                'email' => $email
            ], [
                'user_id' => $id    
            ]);
            
            $result;
        }
    }
    
    if (isset($_GET['change_password'])) {
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        
        if (strlen($password) == 0) {
            $errors[] =  "Password is required!";
        }
        
        if ($password != $password_confirm) {
            $errors[] = "Passwords do not match!";
        }
        
        if(empty($errors)) {
            $result = $crud->update([
                'password' => hash256($password),
            ], [
                'user_id' => $id    
            ]);
            
            $result;
        }
    }

?>

<?php include('header.php'); ?>

<div class="create">
<div class="container col-md-offset-3 col-md-3">
    <h1>User Management</h1>
    <a class="btn btn-md btn-success" href="dashboard.php">Dashboard</a>
    <a class="btn btn-md btn-danger" href="index.php?logout">Logout</a> <br /><br />
    
    <?php 
    if(!empty($errors)) {
        
        echo "<div class='alert alert-danger' role='alert'>";
            echo "<ul>";
            foreach ($errors as $_value) {
                echo "<li>$_value</li>";
            }
            echo "</ul>";
        echo "</div>";
    } ?>
    
    <h3>Edit User</h3>
    <form method="post" class="form-group" action="?save&id=<?=$id?>">
        <div class="form-group">
            <label for="user">Login:</label>
            <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?=isset($login) ? $login : ''?>" />
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?=isset($email) ? $email : ''?>" />
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    
    <h3>Change Password</h3>
    <form method="post" class="form-group" action="?change_password&id=<?=$id?>">
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" name="password" class="form-control" id="password" placeholder="Password" value="<?=isset($password) ? $password : ''?>" />
        </div>
        <div class="form-group">
            <label for="password_confirm">Password Confirm:</label>
            <input type="text" name="password_confirm" class="form-control" id="password_confirm" placeholder="Password Confirm" value="<?=isset($password_confirm) ? $password_confirm : ''?>" />
        </div>
        <button type="submit" class="btn btn-primary">Save Password</button>
    </form>
    
</div>
</div>

<?php include('footer.php'); ?>