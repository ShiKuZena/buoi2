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

    $sql_lsp = "SELECT * from tbloaisanpham";

    $sql_sp = "SELECT * from tbsanpham ";
        if(isset($_POST["btnTimSP"])){
        $MaLoai = $_POST["selSP"];
        $sql_sp .= "WHERE MaLoai = '".$MaLoai."'";
        }
    $sql_sp .= "order by TenSP ASC";

    $loaisanpham = $conn -> query($sql_lsp);
    $sanpham = $conn -> query($sql_sp);
?>
<body>
    <div class="hienthi">
        <div>
            <h2>CHỌN LOẠI SẢN PHẨM</h2>
            <form action="sanpham_yc.php" method="post">
                <select name="selSP" id="">
                    <?php
                        if ($loaisanpham->num_rows>0){
                            $i = 1;
                            while($lsp = $loaisanpham->fetch_assoc()){
                    ?>
                    <option value="<?=$lsp["MaLoai"]?>
                    <?= isset($_POST["selSP"]) ? "SELECTED" : ""?>
                    "><?=$lsp["TenLoai"]?></option>
                    <?php
                        $i++;
                        }

                        }
                    ?>
                </select>
                <button name="btnTimSP" type="submit">Tìm Sản Phẩm</button>
            </form>
        </div>

        <div>
            <?php
                if(isset($_POST["btnTimSP"])){
            ?>
            <table>
                <tr>
                    <th>TT</th>
                    <th>Tên SP</th>
                    <th>Hình Ảnh</th>
                    <th>Đơn Giá</th>
                    <th>Số Lượng Có</th>
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
                    <td><img src="../images/<?=$us["HinhAnh"]?>" alt=""></td>
                    <td><?=$us["DonGia"]?></td>
                    <td><?=$us["SLHienCo"]?></td>
                    <td>&nbsp;</td>
                </tr>

                <?php
                $i++;
                        }
                        
                    }
                ?>
            </table>
            <?php
                }
            ?>
        </div>
    </div>
</body>
<?php
    $conn -> close();
?>
</html>