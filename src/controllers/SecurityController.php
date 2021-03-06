<?php
session_start();
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
class SecurityController extends AppController
    {  private $userRepository;

        public function __construct()
        {
            parent::__construct();
            $this->userRepository = new UserRepository();
        }
    public function login()
    {

        if(!$this->isPost()){
            return $this->render('login');
        }
       $email =$_POST["email"];
       $password =md5($_POST["password"]);

        $user = $this->userRepository->getUser($email);;

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }
       if($user ->getEmail() !== $email){
           return $this->render('login',['messages'=> ['User with this email not exist!']]);
       }

       if($user->getPassword() !==$password){
           return $this->render('login',['messages'=>['Wrong password!']]);
       }

       $_SESSION['user']=serialize($user);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/your_expanses");
    }
    public function registration()
    {
        if (!$this->isPost()) {
            return $this->render('registration');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];


        if ($password !== $confirmedPassword) {
            return $this->render('registration', ['messages' => ['Please provide proper password']]);
        }

        $user = new User($email, md5($password), $name, $surname);


        $this->userRepository->addUser($user);
        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }



}