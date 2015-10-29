<?php
//Arrays
$pets = [
    
    'mammal' => [
        'Dog',
        'Cat',
        'Sebastian'
        ],
        'bird' => [
            'Parrot',
            'Turkey',
            'Flamingo']
];

//$pets[] = 'Cat';
//$pets[] = 'Piglet';

//Multi-dimensional arrays

echo $pets['mammal_3'];

//array_push(); //adds on to the end
//array_shift(); //adds to beginning
//array_unshift(); //removes

//array_pop(); //pops one off the end

echo '<br />';

echo $pets[2]['bird_1'];


echo '<pre>';
print_r($pets);

print_r($pets['mammal']);