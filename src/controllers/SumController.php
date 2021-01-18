<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Sum.php';
require_once __DIR__.'/../repository/SumRepository.php';
require_once __DIR__.'/../repository/PriceRepository.php';

class SumController extends AppController
{
    private $message = [];
    private $sumRepository;
    private $priceRepository;

    public function __construct()
    {
        parent::__construct();
        $this->sumRepository = new SumRepository();
        $this->priceRepository = new PriceRepository();
    }

    public function updateSum()
    {
        if($this->isPost())
        {

            $sum = new Sum($_POST['sum_area']);
            $this->sumRepository->updateSum($sum);
        }
        return $this->render('your_expanses', [
            'messages' => $this->message,
            'sum'=>$this->sumRepository->getSum($this->sumRepository->getIdUser()),
            'prices'=> $this->priceRepository->getPrices(),
            'minus'=>$this->sumRepository->minusMoney()
            ]);
    }



}