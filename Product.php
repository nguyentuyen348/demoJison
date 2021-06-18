<?php


class Product
{

    public $sort;
    public $name;
    public $price;
    public $img;
    public static $count=1;



    public function __construct($sort, $name, $price, $img)
    {
        $this->sort= $sort;
        $this->name = $name;
        $this->price = $price;
        $this->img = $img;
        self::$count++;
    }

    public function getCount(){
        return self::$count;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img): void
    {
        $this->img = $img;
    }

}