<?php
// non-static
function alo($name){
    $names = [];
    $names[] = $name;
    var_dump($names);
}
alo('an');
alo('huong');

class A {
    public $names = [];
    function addName($name){
        $this->names[] = $name;
    }
}
$a = new A;
$a->addName('an');
$a->addName('huong');
$a = new A;
$a->addName('an2');
$a->addName('huong2');
var_dump($a->names);

// static
function alo2($name){
    static $names = [];
    $names[] = $name;
    var_dump($names);
}
alo2('an');
alo2('huong');

class A2 {
    public static $names = [];
    function addName($name){
        self::$names[] = $name;
    }
}
$a2 = new A2;
$a2->addName('an');
$a2->addName('huong');
$a2 = new A2;
$a2->addName('an2');
$a2->addName('huong2');
var_dump($a2::$names);