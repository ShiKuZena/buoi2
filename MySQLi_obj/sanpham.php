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

    $sql = "SELECT * from tbsanpham ";
    $sql .= "order by TenSP ASC";

    $sanpham = $conn -> query($sql);
?>
<body>
    <div class="danhsach">
        <h2>DANH SÁCH SẢN PHẨM</h2>
        <div>
            <button type="submit">THÊM SẢN PHẨM</button>
            <table>
                <tr>
                    <th>TT</th>
                    <th>Tên SP</th>
                    <th>Mã Hàng</th>
                    <th>Mô Tả</th>
                    <th>Đơn Giá</th>
                    <th>Trọng Lượng</th>
                    <th>Số Lượng Có</th>
                    <th>Tình Trạng</th>
                    <th colspan="2">Chi Tiết</th>
                </tr>
                <?php
                    if ($sanpham->num_rows>0){
                        $i = 1;
                        while($us = $sanpham->fetch_assoc()){
                ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$us["TenSP"]?></td>
                    <td><?=$us["MaHang"]?></td>
                    <td><?=$us["MoTa"]?></td>
                    <td><?=$us["DonGia"]?></td>
                    <td><?=$us["TrongLuong"]?></td>
                    <td><?=$us["SLHienCo"]?></td>
                    <td><?=$us["TinhTrang"]?></td>
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