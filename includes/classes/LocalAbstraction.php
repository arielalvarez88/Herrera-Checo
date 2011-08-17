<?php

class LocalAbastraction{


private $title;

private $price;
private $construction;

public function __construct($title, $price, $construction)
{
    $this->title = $title;
    $this->price = $price;
    $this->construction = $construction;
}
public function getPrice()
{
    return $this->price;
}
public function getTitle()
{
    return $this->price;
}
public function getConstruction()
{
    return $this->construction;
}


}
?>
