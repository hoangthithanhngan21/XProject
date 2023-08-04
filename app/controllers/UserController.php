<?php
include "app/repositories/UserRepository.php";
class UserController {
    public function index(){
        //Gọi dữ liệu ra
        $userRepo = new UserRepository();
        $users = $userRepo->getAllUsers();
        include "app/views/index.php";
    }
    public function delete(){
        $userRepo = new UserRepository();
        if($userRepo->Delete() == true){
            header("Location:index.php?c=user&a=index&action=delete&success=true");
        }
    }
    public function detail(){
            $userRepo = new UserRepository();
            $user = $userRepo->getInfoUser();
            $users = $userRepo->getAllUsers();
            include "app/views/detail.php";
    }
    public function edit(){
            $userRepo = new UserRepository();
            $user = $userRepo->getInfoUser();
            $users = $userRepo->getAllUsers();
            include "app/views/edit.php";
    }
    public function update() {
        $userRepo = new UserRepository();
        if ($userRepo->update() == true) {
           header("Location: index.php?c=user&a=index");
        } else {
            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }
    public function add(){
        $userRepo = new UserRepository();
        if($userRepo->saveRegister() == true){
            header("Location:index.php?c=user&a=index");
     }
    }

}
