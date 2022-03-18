<?php



require_once('../DAL/TestService.php');



class TestController
{

    private $testService;

    // initialize services

    function __construct()
    {

        $this->testService = new TestService();
    }


    public function index()
    {

        return   $users = $this->testService->getItems();

        // include_once('views/mtest.php');

    }
}
