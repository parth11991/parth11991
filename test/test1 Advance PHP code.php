<?php

interface FizzBuzzable
{
    public function printMe();
}

class NumberFizzBuzzItem implements FizzBuzzable
{
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function printMe()
    {
        return (string) $this->number;
    }
}

class WordFizzBuzzItem implements FizzBuzzable
{
    private $word;

    public function __construct($word)
    {
        $this->word = $word;
    }

    public static function check($number, $multiplier)
    {
        return !($number % $multiplier);
    }

    public function printMe()
    {
        return $this->word;
    }
}

class FizzBuzzPrint
{
    private $items = array();

    public function add(FizzBuzzable $item)
    {
        $this->items[] = $item;
    }

    public function printMe()
    {
        $output = '';
        foreach ($this->items as $item) {
            $output .= $item->printMe();
        }

        return $output;
    }

    public function __toString()
    {
        return $this->printMe();
    }

    public function isEmpty()
    {
        return empty($this->items);
    }
}

class FizzBuzzFactory
{
    private static $multipliers = array();

    public static function init(array $multipliers)
    {
        self::$multipliers = $multipliers;
    }

    public static function create($number)
    {
        $printer = new FizzBuzzPrint();

        foreach (self::$multipliers as $multiplier => $word) {
            if (WordFizzBuzzItem::check($number, $multiplier)) {
                $printer->add(new WordFizzBuzzItem($word));
            }
        }

        if ($printer->isEmpty()) {
            $printer->add(new NumberFizzBuzzItem($number));
        }

        return $printer;
    }
}

class FizzBuzzInterval implements Iterator
{
    private $from;
    private $to;
    private $number;

    public function __construct($from, $to, $multipliers)
    {
        $this->from = $from;
        $this->to = $to;
        FizzBuzzFactory::init($multipliers);
    }

    public function current()
    {
        return FizzBuzzFactory::create($this->number);
    }

    public function rewind()
    {
        $this->number = $this->from;
    }

    public function key()
    {
        return null;
    }

    public function next()
    {
        ++$this->number;
    }

    public function valid()
    {
        return $this->number <= $this->to;
    }
}

foreach (new FizzBuzzInterval(1, 100, array(3 => 'Fizz', 5 => 'Buzz')) as $fb) {
    echo $fb . "<br>";
}