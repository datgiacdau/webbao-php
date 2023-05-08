<?php include "includes/header.php" ?>
<?php 
//Gọi file connection.php ở bài trước
require_once("includes/connection.php");
    // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
if (isset($_POST["btn_submit"])) {
    // lấy thông tin người dùng
    $username = $_POST["username"];
    //$username = strip_tags($username);
    //$username = addslashes($username);
    if ($username == "") {
        echo " bạn không được để trống!";
    }else{
        $sql = "select username, email, fullname from users where username = '$username'";
        //$sql = "select * from users where username = '$username'";
        $result = $conn->query($sql);
        //$num_rows = mysqli_num_rows($query);
        if ($result->num_rows == 0) {

            echo "khong ton tai user này";
        }else{
            echo "có user này, email là ";
            while($row = $result->fetch_assoc()){
            $username =$row["username"];
            $email =$row["email"];
            $fullname =$row["fullname"];

            echo "<pre>ten: {$username}<br />email: {$email}<br />Fullname: {$fullname}</pre>";
            }
          }

        }
    }
?>
    <form method="POST" action="hienthimail.php">
    <fieldset>
        <legend>Tìm kiếm mail</legend>
            <table>
                <tr>
                    <td>Nhập username</td>
                    <td><input type="text" name="username" size="30"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"> <input type="submit" name="btn_submit" value="Hiển thị mail"></td>
                </tr>
            </table>
  </fieldset>
  </form>
<?php include "includes/footer.php" ?>