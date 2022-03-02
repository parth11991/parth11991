<?php
class FizzBuzz {
 
    public function __construct($number) {
        $this->number = $number;
 
    }
 
    public function getFizzBuzz() {
 
          # Code
          if ($this->number % 3 == 0 && $this->number % 5 == 0) {
              return 'FizzBuzz';
          } elseif ( $this->number % 3 == 0 ) {
              return 'Fizz';
          } elseif ( $this->number % 5 == 0 ) {
              return 'Buzz';
          } else {
              return $this->number;
          }
    }
 
}

for ($i=1; $i <= 100; $i++) { 
    $FizzBuzz = new FizzBuzz($i);
    echo $FizzBuzz->getFizzBuzz().' <br>';
}

?>