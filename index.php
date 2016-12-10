<?php

require './vendor/autoload.php';


$image_url = 'https://www.elephantnaturepark.org/wp-content/uploads/2016/06/Lek_20may2016_01_n.jpg';

$i = new ImageColor\ImageColor($image_url);

echo $i->get_data_uri();
