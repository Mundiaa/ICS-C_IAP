<?php
// Create a class for HelloWorld
class HelloWorld {
    public function greet() {
        return "<h1>Hello, ICS C Community!</h1>";
    }

    public function today() {
        return "<p>Today is " . date("l") . "</p>";
    }
}

// create an instance of HelloWorld
$hello = new HelloWorld();

// Call the greet method
print $hello->greet();

// Call the today method
print $hello->today();