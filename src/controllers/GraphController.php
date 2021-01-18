<?php
require_once 'AppController.php';
require_once __DIR__.'/../repository/GraphRepository.php';
class GraphController extends AppController
{
    private $graphRepository;

    public function __construct()
    {
        parent::__construct();
        $this->graphRepository = New GraphController();
    }


    public function getDate(){
        $this->graphRepository->getDate();
    }

}