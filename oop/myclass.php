<?php 

class MyClass {
    public $hello = "Hello world public";
    protected $hello1 = "Hello world protected";
    private $hello2 = "Hello world private";
    static $hello_static = "Hello world static";
    const HELLO_CONSTANT = "Hello world constant";

    // function __construct($x, $y) {
    //     echo "Welcome $x and $y";
    // }

    function __construct() {
        
    }

    function get_hello() {
        return $this->hello;
    }

    function get_hello_static() {
        // echo self::$hello_static;
        return self::$hello_static;
    }

    static function pre() {
        return "My name is ";
    }

    static function complete() {
        return self::pre()."Kevin";
    }

    function get_hello_constant() {
        return self::HELLO_CONSTANT;
    }

    function __destruct() {
        echo "<br> Destructed";
    }
}

class MyClass2 extends MyClass {
    function getHello1() {
        // echo $this->hello1;
        return $this->hello1;
    }
}

// $obj = new MyClass("Kevin", "Kim");
$obj = new MyClass;
$obj2 = new MyClass2;

echo $obj->hello;
echo "<br>";
echo $obj->get_hello();
echo "<br>";
// $obj2->getHello1();
echo $obj2->getHello1();
echo "<br>";
// $obj->get_hello_static();
echo $obj->get_hello_static();
echo "<br>";

echo MyClass::complete();
echo "<br>";
echo MyClass::HELLO_CONSTANT;
echo "<br>";
echo $obj->get_hello_constant();
echo "<br>";

echo "<br>";
echo "<br>";


?>