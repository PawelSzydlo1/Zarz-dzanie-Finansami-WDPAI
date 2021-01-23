<?php
require_once 'AppController.php';
require_once __DIR__.'/../repository/GraphRepository.php';
class GraphController extends AppController
{
    private $graphRepository;

    public function __construct()
    {
        parent::__construct();
        $this->graphRepository = new GraphRepository();
    }


    public function getDate()
    {

        echo json_encode($this->graphRepository->getDate());
    }


}