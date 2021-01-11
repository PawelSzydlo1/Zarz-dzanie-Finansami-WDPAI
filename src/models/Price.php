<?php


class Price
{


    private $price;
    private $category;
    private $data;


    public function __construct($price, $category, $data)
    {
        $this->price = $price;
        $this->category = $category;
        $this->data = $data;
    }



    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

}