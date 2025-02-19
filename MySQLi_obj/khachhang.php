<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/lmao.css">
</head>
<?php
    $hostname = "localhost";
    $database = "db_nutrang";
    $user = "root";
    $pass = "";

    $conn = new mysqli($hostname,$user,$pass,$database);

    $sql = "SELECT * from tbkhachhang ";
    $sql .= "order by TenKH ASC";

    $kh = $conn -> query($sql);
?>
<body>
<div class="danhsach">
        <h2>DANH SÁCH KHÁCH HÀNG</h2>
        <div>
            <table>
                <tr>
                    <th>TT</th>
                    <th>Mã KH</th>
                    <th>Họ Tên KH</th>
                    <th>Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th colspan="2">Chi Tiết</th>
                </tr>
                <?php
                    if ($kh->num_rows>0){
                        $i = 1;
                        while($us = $kh->fetch_assoc()){
                ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$us["KhachHang_id"]?></td>
                    <td><?=$us["TenKH"]?></td>
                    <td><?=$us["SoDT"]?></td>
                    <td><?=$us["DiaChi"]?></td>
                    <td><button name="btnCapNhat" type="submit">Cập Nhật</button></td>
                    <td><button name="btnXoa" type="submit">Xóa</button></td>
                </tr>

                <?php
                $i++;
                        }
                        
                    }
                ?>
            </table>
        </div>
    </div>
</body>
<?php
    $conn -> close();
?>
</html>