<?php

require 'phone.php';
require 'customer.php';
require 'gateway.php';
require 'address.php';
require 'contact.php';

echo "here";

// $test4 = new contact('{"id": "", "name":"Daniel", "obs":"lá da igreja resgate"}');

// $test3 = new address('{"id": "", "address":"Av. Barroso, 2171 - Santana", "obs":""}');

//$test2 = new customer('{"id": "", "mainContact":"", "mainPhone":"", "mainAddress":""}');

$test = new phone('{"id": "", "number":"", "obs":"", "customerid":""}');

$gw = new gateway();

var_dump($gw->retrieve($test));

//echo $gw->save($test);
//echo $gw->save($test2);

// echo $gw->save($test2);

//$test = new phone();

//echo $gw->save($test);

?>
