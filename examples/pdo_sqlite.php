<?php
require_once('../Barstool.php');


$bs = new Barstool(
    array(
        'adaptor'=>'pdo',
        'pdo_dsn'=>'sqlite:Lawnchair_pdo.sqlite.db'
    )
);


/*
    delete everything
*/
$bs->nuke();

/*
    make a new object to store
*/
$obj = new stdClass;
$obj->foo = 'bar';
$obj->x = '2000';
$obj->key = 'foobarthing'; // the key property is a custom id. Otherwise a UUID is generated by barstool

/*
    store it and delete it
*/
$bs->save($obj);
unset($obj);

/*
    retrieve it
*/
$obj = $bs->get('foobarthing');
var_dump($obj);


/*
    retrieve it as an associative array
*/
$bs->setReturnAssocArray(true);
$obj = $bs->get('foobarthing');
var_dump($obj);

// $obj = $bs->get('poop');
// var_dump($obj);

$bs->remove('foobarthing');

?>