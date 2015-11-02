<?php
require('config.php');
protected_area();

$crud->table = "user";

// List out existings users
$user_list = $crud->select('*');

// Track any errors
$errors = [];

    if (isset($_GET['create'])) {

        
        // POST the form
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        $email = $_POST['email'];
        
        // Error checking
        if (strlen($login) == 0) {
            $errors[] = "Login is required!";
        }
        
        if (strlen($password) == 0) {
            $errors[] =  "Password is required!";
        }
        
        if ($password != $password_confirm) {
            $errors[] = "Passwords do not match!";
        }
        
        if (strlen($email) == 0) {
            $errors[] = "Email is required!";
        }
        
        // Success 
        if (empty($errors)) {
            $user_id = $crud->insert([
                'login'       => $login, 
                'password'    => hash256($password),
                'email'       => $email
            ]);
            
            if (!$user_id) {
                $errors[] = "Problem with creating a user!";
            } else {
                header('location: user.php');
                exit;
            }
        }
    }
    
    if (isset($_GET['delete'])) {
        $user_id    = $_GET['delete'];
        $result     = $crud->delete(['user_id' => $user_id]);
        if ($result) {
            header('location: user.php');
        } else {
            $errors[] = "Problem deleting the user!";
        }
    }
?>

<?php include('header.php'); ?>

<hr />

<div class="create">
<div class="container col-md-offset-3 col-md-3">
    <h1>User Manager</h1>
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
    
    <h3>Create</h3>
    <form method="post" class="form-group" action="user.php?create">
        <div class="form-group">
            <label for="user">Login:</label>
            <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?=isset($login) ? $login : ''?>" />
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" name="password" class="form-control" id="password" placeholder="Password" value="<?=isset($password) ? $password : ''?>" />
        </div>
        <div class="form-group">
            <label for="password_confirm">Password Confirm:</label>
            <input type="text" name="password_confirm" class="form-control" id="password_confirm" placeholder="Password Confirm" value="<?=isset($password_confirm) ? $password_confirm : ''?>" />
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?=isset($email) ? $email : ''?>" />
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
</div>

<div class="existing">
    <div class="container">
        
        <h3>Existing Users</h3>
        <table>
            <?php
            foreach ($user_list as $user) :?>
                <tr>
                    <td><?=$user['user_id']?></td>
                    <td><?=$user['login']?></td>
                    <td><?=$user['email']?></td>
                    <td><a href="user_edit.php?id=<?=$user['user_id']?>">Edit</a></td>
                    <td><a href="?delete=<?=$user['user_id']?>">Delete</a></td>
                </tr>
            <?php endforeach;?>
        </table>
 
    </div>
</div>

<?php include('footer.php'); ?>