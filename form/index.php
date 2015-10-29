<?php

if (!isset($_GET['submit'])) {
    echo $_POST['general'];    
}

?>

<!DOCTYPE html>
<html>
    <body>
        <form action="?submit" method="post"> 
            
            General: <input type="text" name="general" />
            <input type="submit" />
        </form>
    </body>
</html>