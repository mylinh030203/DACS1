<?php

    if (isset($_COOKIE['username'])){
        include "infordb.php";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // $Fullname = $_POST['fullname'];
        // $Address = $_POST['address'];
        // $Phonenumber = $_POST['SDT'];
        // $Email = $_POST['email'];
        $sql = "SELECT * from infor where Username ='".$_COOKIE['username']."'"; 
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        }
        $html = "<a href='#'>".$row['HoTen']."</a>".
        '<ul>'.
        '<li><a href="/profile/index.php">THÔNG TIN</a></li>'.
        '<li><a href="" onclick = "logout()"> ĐĂNG XUẤT </a></li>'.
        '</ul>';
    }
    else
        $html = "<a href='/login/index.php'>ĐĂNG NHẬP</a>";

    echo '<div id="wrapper">';
    echo '<div id="header">';
    echo '<div id="toggle">';
    echo '<i class="fas fa-bars"></i>';
    echo '</div>';
    echo '<nav class="nav">';
    echo '<ul id="main-menu">';
    echo '<li>';
    echo '<img class="img-icon" src="/acesss/img/logo.png" alt="icon-dog">';
    echo '</li>';
    echo '<li><a href="../"><i class="ti-home"></i> TRANG CHỦ</a></li>';
    echo '<li>';
    echo '<a href="/takeCare/indexTc.php">CHĂM SÓC <i class="ti-angle-down"></i></a>';
    echo '<ul>';
    echo '<li><a href="/takeCare/food.php">THỰC PHẨM</a></li>';
    echo '<li><a href="takeCare/health.php">SỨC KHỎE</a></li>';
    echo '</ul>';
    echo '</li>';
    echo '<li><a href="/adopt/index.php">NHẬN NUÔI</a></li>';
    echo '<li><a href="/donate/">ỦNG HỘ</a></li>';
    echo "<li  class = 'lg'>".$html."</li>";
    echo '</ul>';
    echo '</nav>';
    echo '</div>';
    echo '</div>';

    echo "<script type='text/javascript'>";
    echo   "function logout(){";
    echo   "   document.cookie = 'username= ; expires = Thu, 01 Jan 1970 00:00:00 GMT';";
    echo "return 'Logout - done!'";
    echo"  }";
    echo" </script>";

?>
