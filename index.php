<?php
//index.php đóng vai trò Routing
//Phân tích URL để kiểm tra Controller và Action (phương thức trong Controller)
//Giả định 1: http://localhost/flexbook = http://localhost/flexbook/index.php
    //Mặc định: c=HomeController a=index

//Giả định 2: http://localhost/flexbook/index.php?c=news&a=index
//Giả định 3: http://localhost/flexbook/index.php?c=news&a=add
//Giả định 4: http://localhost/flexbook/index.php?c=category&a=index

//Người lập trình chính là Người viết kịch bản >>> Mọi URL người dùng nhập/nhấp vào liên kết
//thì sẽ hoạt động theo ý đồ của Người viết kịch bản

//1. Phân tích URL: Nhập hay nhấp >> Liên kết hiển thị trên thanh địa chỉ
//Query String ?c=news&a=index >>> Tự động lưu vào mảng siêu toàn cục $_GET
//Lấy ra giá trị qua mảng này: $_GET['c']
//c là 1 cái tên có thể tồn tại (http://localhost/flexbook/index.php?c=news&a=index)
//hoặc c không tồn tại http://localhost/flexbook

$controller = isset($_GET['c']) ? $_GET['c'] : 'user'; //Nếu c tồn tại > Lấy giá trị c còn ko c=home
$action = isset($_GET['a']) ? $_GET['a'] : 'index'; ////Nếu a tồn tại > Lấy giá trị a còn ko c=index

//2. Gọi ra được cái tệp chứa định nghĩa Controller >>> Gọi hàm sẽ xử lý nhiệm vụ tiếp theo.
//home >>> HomeController.php
$controller = ucfirst($controller);
$controller = $controller."Controller";
$pathController = "app/controllers/".$controller.".php";
//echo $pathController.' -- '.$action;
//Tình huống: tệp $pathController ko tồn tại thì sao?
if(!file_exists($pathController)){
    die('Yêu cầu Controller không tồn tại, vui lòng kiểm tra lại liên kết');
} //Nếu die thì dừng thực hiện các đoạn mã phía dưới, còn ko
include($pathController); //Gọi ra được tệp >>> Tạo ra đối tượng
//HomeController $myController = new HomeController()
$myController = new $controller(); //$controller=HomeController = HomeController()
$myController->$action();
