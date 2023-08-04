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
//         //Lấy các giá trị từ FORM
//         if(isset($_POST['txtUsername'])){
//             $username  = $_POST['txtUsername'];
//         }
//         if(isset($_POST['txtEmail'])){
//             $email  = $_POST['txtEmail'];
//         }
//         if(isset($_POST['txtPassword'])){
//             $password  = $_POST['txtPassword'];
//         }
//         //Tạo và thiết lập đối tượng User
//         $user = new User();
//         $user->setUsername($username);
//         $user->setEmail($email);
//         $user->setPassword($password);
//         //Truyền và gọi tới saveRegister() của UserRepository
//         $userRepo = new UserRepository();
// //        $userRepo->saveRegister($user);
//         if($userRepo->saveRegister($user) == true){
//             header("Location:index.php?c=home&a=index&success=true");
//         }else{
//             header("Location:index.php?c=home&a=error&success=false");
//         }
     }

}
