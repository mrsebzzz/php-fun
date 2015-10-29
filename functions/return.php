<?php
//function returns

function add_years($age, $add_years) {
    $age += $add_years;
    return $age; //Can only do one return in a fuction
}

$sebastian = add_years(45, 5);
$joe = add_years(25, 5);
$ted = add_years(65, 5);

?>

<html>
    <body>
        <h1><?php echo $sebastian;?></h1>
        <h1><?php echo $joe;?></h1>
        <h1><?php echo $ted;?></h1>
    </body>
</html>