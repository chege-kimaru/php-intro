<?php 

class NameException extends Exception {
    public function showError() {
        return "Error on line {$this->getLine()} in {$this->getFile()}";
    }
}

function sayName($name) {
    if(strlen($name) < 3) {
        throw new NameException('Name must be more than 3 characters.');
    }
    return "My name is $name";
}

function divide($x, $y) {
    if($y == 0) {
        throw new Exception("Cannot divide by zero");
    } else {
        // return $x/$y;
        return $x/$y;
    }
}

try {
    echo divide(10, 2);
    echo "<br>";
} catch(Exception $e) {
    echo 'Error: '. $e->getMessage();
}
echo "<br>";
try {
    echo sayName("k");
} catch(NameException $ne) {
    echo "{$ne->showError()} : {$ne->getMessage()}";
}
echo "<br>";

?>