<?php
include "lib/DBConnection.php";
include "app/models/User.php";
class UserRepository{

    public function getAllUsers(){
        //Mật khẩu lưu THÔ, chưa băm trong CSDL
        //Kết nối tới CSDL: MySQLi procedural, MySQLi OOP, PDO*
        //1. Kết nối DB Server
        try {
            $db = new DBConnection();
            $conn = $db->connect();
            //2. Thực hiện truy vấn
            $sql = "SELECT * FROM employees";
//            $sql = "SELECT username FROM users WHERE email=:e AND password=:p";
            $stmt = $conn->prepare($sql); //Chuẩn bị thực hiện câu này
            $stmt->execute(); //Thực thi đi >>> Nếu có kết quả trả về, nó sẽ lưu vào #stmt
            //3. Xử lý kết quả (SELECT/INSERT-UPDATE-DELETE)
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //            $result = $stmt->fetch(); >> Chỉ lấy ra 1 bản ghi mỗi lần chạy
            $result = $stmt->fetchAll(); //>> Lấy ra tất cả >>> Mảng các Mảng
            //            Chuyển đổi Bản ghi (Mảng thông thường) sang Đối tượng: Post

            $users = [];
            foreach($result as $row){
                $user = new User();
                $user->setUserId($row['user_id']);
                $user->setName($row['name']);
                $user->setEmail($row['email']);
                $user->setProfilePicture($row['profile_picture']);
                $user->setAddress($row['address']);
                $user->setSalary($row['salary']);
                $user->setCreatedAt($row['created_at']);
                $user->setUpdatedAt($row['updated_at']);
                array_push($users, $user);
            }
            return $users;
        } catch(PDOException $e) {
            return null;
        }
    }
   public function Delete()
    {
        try {
            $db = new DBConnection();
           $conn = $db->connect();
            $user_id = $_GET['id'];
            $sql = "DELETE FROM employees WHERE user_id = $user_id";
            $stmt = $conn->prepare($sql);
            if($stmt->execute())
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }
    public function getInfoUser(){
        try {
            $db = new DBConnection();
            $conn = $db->connect();
            $user_id = $_GET['id'];
            $sql = "SELECT * FROM employees WHERE  user_id = $user_id";
            $stmt = $conn->prepare($sql); //Chuẩn bị thực hiện câu này
            $stmt->execute(); //Thực thi đi >>> Nếu có kết quả trả về, nó sẽ lưu vào #stmt
            //3. Xử lý kết quả (SELECT/INSERT-UPDATE-DELETE)
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //            $result = $stmt->fetch(); >> Chỉ lấy ra 1 bản ghi mỗi lần chạy
            $result = $stmt->fetchAll(); //>> Lấy ra tất cả >>> Mảng các Mảng
            //            Chuyển đổi Bản ghi (Mảng thông thường) sang Đối tượng: Post

            $users = [];
            foreach($result as $row){
                $user = new User();
                $user->setUserId($row['user_id']);
                $user->setName($row['name']);
                $user->setEmail($row['email']);
                $user->setProfilePicture($row['profile_picture']);
                $user->setAddress($row['address']);
                $user->setSalary($row['salary']);
                $user->setCreatedAt($row['created_at']);
                $user->setUpdatedAt($row['updated_at']);
                array_push($users, $user);
            }
            return $users;
        } catch(PDOException $e) {
            return null;
        }
    }
//     public function saveRegister($user){
//         //Kết nối tới CSDL: MySQLi procedural, MySQLi OOP, PDO*
//         //1. Kết nối DB Server
//         try {
//         $db = new DBConnection();
//         $conn = $db->connect();
//         //2. Thực hiện truy vấn
//         //Tạm thời bỏ qua kiểm tra
//         $sql = "INSERT INTO users (user_id, username, email, password) VALUES (109, ?, ?, ?)";
//         $stmt = $conn->prepare($sql); //Chuẩn bị thực hiện câu này
//         $username = $user->getUsername();
//         $email = $user->getEmail();
//         $pass = $user->getPassword();
//         // $stmt->bindParam('sss', $user->getUsername(), $user->getEmail(), $user->getPassword() );
//         $stmt->bindParam(1, $username, PDO::PARAM_STR);
//         $stmt->bindParam(2, $email, PDO::PARAM_STR);
//         $stmt->bindParam(3, $pass, PDO::PARAM_STR);
//         //3. Xử lý kết quả (SELECT/INSERT-UPDATE-DELETE)
//         if($stmt->execute())
//         return true;
//     } catch(PDOException $e) {
//                 return false;
//             }
//         }
//     
//     
    public function Edit(){
        try {
            $db = new DBConnection();
            $conn = $db->connect();
            $user_id = $_GET['id'];
            $sql = "SELECT * FROM employees WHERE  user_id = $user_id";
            $stmt = $conn->prepare($sql); //Chuẩn bị thực hiện câu này
            $stmt->execute(); //Thực thi đi >>> Nếu có kết quả trả về, nó sẽ lưu vào #stmt
            //3. Xử lý kết quả (SELECT/INSERT-UPDATE-DELETE)
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //            $result = $stmt->fetch(); >> Chỉ lấy ra 1 bản ghi mỗi lần chạy
            $result = $stmt->fetchAll(); //>> Lấy ra tất cả >>> Mảng các Mảng
            //            Chuyển đổi Bản ghi (Mảng thông thường) sang Đối tượng: Post

            $users = [];
            foreach($result as $row){
                $user = new User();
                $user->setUserId($row['user_id']);
                $user->setName($row['name']);
                $user->setEmail($row['email']);
                $user->setProfilePicture($row['profile_picture']);
                $user->setAddress($row['address']);
                $user->setSalary($row['salary']);
                $user->setCreatedAt($row['created_at']);
                $user->setUpdatedAt($row['updated_at']);
                array_push($users, $user);
            }
            return $users;
        } catch(PDOException $e) {
            return null;
        }
    }
    public function update() {
        try {
            $db = new DBConnection();
            $conn = $db->connect();
            $user_id = $_POST['user_id'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $profile_picture = $_POST['profile_picture'];
            $bio = $_POST['bio'];
            $updated_at = date('Y-m-d H:i:s');
    
            // Kiểm tra xem email hoặc username đã tồn tại hay chưa
            $checkSql = "SELECT COUNT(*) FROM users WHERE email = '".$email."' OR username = '".$username."'";
            $checkStmt = $conn->prepare($checkSql);
            $checkStmt->execute();
            $result = $checkStmt->fetch(PDO::FETCH_NUM);
    
            if ($result[0] > 1) {
                return false;
            } else {
                // Nếu không có email hoặc username trùng, thực hiện lệnh UPDATE
                $sql = "UPDATE users SET username = '".$username."', email = '".$email."', password ='".$password."',profile_picture='".$profile_picture."',bio='".$bio."',updated_at='".$updated_at."' WHERE user_id =".$user_id;
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                return true;
            }
    
        } catch(PDOException $e) {
            return null;
        }
    }
}
?>