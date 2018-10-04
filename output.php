<?php
    include("connect.php");
?>

<html>
    <title> Siswa </title>
    <a href="input.php"><input type="button" value="Tambah Data" id="tombols" style="cursor:pointer"></a>
    <table border=1 style="border-spacing : 0; text-align : center;">
        <th> ID </th>
        <th> Nama </th>
        <th> NIM </th>
        <th> Tanggal Lahir </th>
        <th> Action </th>
</html>

<?php
    $database = "SELECT * FROM siswa";
    $row = mysqli_query($connect, $database);

    if (mysqli_num_rows($row) > 0) {
        while ($hasil = mysqli_fetch_assoc($row)) {
            ?>
            <tr>
            <td><?php echo $hasil["id"]; ?></td>
            <td><?php echo $hasil["nama"]; ?></td>
            <td><?php echo $hasil["nim"]; ?></td>
            <td><?php echo $hasil["tgl_lahir"]; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $hasil['id'];?>" style="text-decoration : none;"><input type="button" value="Edit" style="cursor:pointer"></a>
                <a href="delete.php?id=<?php echo $hasil['id'];?>" onclick= "return confirm('Yakin Ingin Menghapus Data ID : <?php echo $hasil['id']; ?>? ')" style="text-decoration : none;"><input type="button" value="Hapus" style="cursor:pointer"></a>
            </td>
            </tr>
            <?php
        }
    } else {
        echo "0 results";
    }
    mysqli_close($connect);
?>
</table>
