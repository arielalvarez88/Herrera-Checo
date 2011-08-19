<?php
require dirname(__FILE__).'/ILocalAbstraction.php';
class LocalAbstraction implements ILocalAbstraction{


private $number;

private $price;
private $construction;
private $condition;

public function __construct($number, $price, $construction,$condition)
{
    $this->number = $number;
    $this->price = $price;
    $this->construction = $construction;
    $this->condition = $condition;
}
public function getPrice()
{
    return $this->price;
}
public function getNumber()
{
    return $this->number;
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
