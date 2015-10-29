<?php

//Loops

$data = [
    'height' => [
        'Tall',
        'Small',
        'Medium',
        'Mini'
    ], 
    'weight' => [
        '150',
        '200',
        '250'
        ]
    ];


//for($i = 0; $i < count($data); $i++) {
//    echo $data[$i];
 //   echo '<br />';
//};

echo '<br />';
echo '<pre>';

foreach($data as $_key => $_value) {
  echo $_key . ':';
  
  foreach($_value as $__key => $__value) {
      echo $__value . '<br />';
  }
  
  echo '<br />';
};

echo '<hr />';

    foreach($data['height'] as $_key => $_value){
        echo $_value;
    }
    
    foreach($data['weight'] as $_key => $_value){
        echo $_value;
    }
echo '<hr />';
while ($i < 50) {
    echo i;
    $i++;
};