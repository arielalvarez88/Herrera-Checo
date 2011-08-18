<?php

class LocalAbstraction{


private $title;

private $price;
private $construction;
private $condition;

public function __construct($title, $price, $construction,$condition)
{
    $this->title = $title;
    $this->price = $price;
    $this->construction = $construction;
    $this->condition = $condition;
}
public function getPrice()
{
    return $this->price;
}
public function getTitle()
{
    return $this->title;
}
public function getConstruction()
{
    return $this->construction;
}

public function getCondition()
{
    return $this->condition;
}

}
?>
