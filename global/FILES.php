<?php
//FILES

if(!empty($_FILES)) {
    echo $_FILES['user_picture']['name'];
    
    echo '<pre>';
    print_r($_FILES);
     echo '<pre>';
}

?>

<form method="post" action="?" enctype="multipart/form-data">
    Picture: <input type="file" name="user_picture" />
    <input type="submit" />
    
</form>