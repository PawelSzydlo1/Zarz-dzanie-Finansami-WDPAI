<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Price.php';
require_once __DIR__.'/../repository/PriceRepository.php';
require_once __DIR__.'/../repository/SumRepository.php';
require_once __DIR__.'/../repository/GraphRepository.php';


class PriceController extends AppController
{
    private $message = [];
    private $priceRepository;
    private $sumRepository;
    private $graphRepository;

    public function __construct()
    {
        parent::__construct();
        $this->priceRepository = new PriceRepository();
        $this->sumRepository = new SumRepository();
        $this->graphRepository = new GraphRepository();
    }
    public function your_expanses()
    {
        $prices = $this->priceRepository->getPrices();
        $this->render('your_expanses', ['prices' => $prices,
            'sum'=>$this->sumRepository->getSum($this->sumRepository->getIdUser()),
            'minus'=>$this->sumRepository->minusMoney()]);

    }
    public function statistic()
    {
        $prices = $this->priceRepository->getPrices();
        $this->render('statistic', ['prices' => $prices,
            'sum'=>$this->sumRepository->getSum($this->sumRepository->getIdUser()),
            'minus'=>$this->sumRepository->minusMoney()]);

    }
    public function addPrice()
    {
        if($this->isPost())
        {

        $price = new Price($_POST['price_elements'],$_POST['category'], $_POST['data']);
        $this->priceRepository->addPrice($price);

        return $this->render('your_expanses', [
            'messages' => $this->message,
            'sum'=>$this->sumRepository->getSum($this->sumRepository->getIdUser()),
            'prices'=> $this->priceRepository->getPrices(),
            'minus'=>$this->sumRepository->minusMoney()
        ]);
        }
    return $this->render('your_expanses', ['messages' => $this->message]);
    }
}