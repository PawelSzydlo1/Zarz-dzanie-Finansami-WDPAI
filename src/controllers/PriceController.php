<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Price.php';
require_once __DIR__.'/../repository/PriceRepository.php';


class PriceController extends AppController
{
    private $message = [];
    private $priceRepository;

    public function __construct()
    {
        parent::__construct();
        $this->priceRepository = new PriceRepository();
    }
    public function your_expanses()
    {
        $prices = $this->priceRepository->getPrices();
        $this->render('your_expanses', ['prices' => $prices]);
    }
    public function addPrice()
    {
        if($this->isPost())
        {

        $price = new Price($_POST['price_elements'],$_POST['category'], $_POST['data']);
        $this->priceRepository->addPrice($price);

        return $this->render('your_expanses', [
            'messages' => $this->message,
            'prices'=> $this->priceRepository->getPrices()
        ]);
        }
    return $this->render('your_expanses', ['messages' => $this->message]);
    }
}