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

    $sql = "SELECT * from tbloaisanpham ";
    $sql .= "order by TenLoai ASC";

    $sploai = $conn -> query($sql);
?>
<body>
    <div class="danhsach">
        <h2>DANH SÁCH SẢN PHẨM</h2>
        <div>
            <table>
                <tr>
                    <th>TT</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Hình Ảnh</th>
                    <th colspan="2">Chi Tiết</th>
                </tr>
                <?php
                    if ($sploai->num_rows>0){
                        $i = 1;
                        while($us = $sploai->fetch_assoc()){
                ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$us["TenLoai"]?></td>
                    <td><img src="../images/<?=$us["HinhAnh"]?>" alt=""></td>
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