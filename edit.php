<?php
    include("connect.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $database = "SELECT * FROM siswa WHERE id = $id";

        $row = mysqli_query($connect, $database);
        $hasil = mysqli_fetch_assoc($row);
    } else {
        header ("Location: output.php");
    }
?>

<html>
    <title> Edit </title>
    <pre> Form Ubah Data </pre>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama" value="<?php echo $hasil['nama']; ?>">
        <input type="text" name="nim" maxlength="10" pattern="\d*" placeholder="NIM" value="<?php echo $hasil['nim']; ?>">
        <input type="date" name="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $hasil['tgl_lahir']; ?>">
        <input type="submit" value="SUBMIT" name="submit">
    </form>
</html>

<?php  
    if (isset($_POST['submit'])) {
        $nama       = $_POST['nama'];
        $nim        = $_POST['nim'];
        $tgl_lahir  = $_POST['tgl_lahir'];

        $database = "UPDATE siswa SET nama = '$nama', nim = '$nim', tgl_lahir = '$tgl_lahir' WHERE id = '$id'";

        if (mysqli_query($connect, $database)) {
            echo "Update Berhasil";
            header("Location: output.php");
        } else {
            echo "Update Gagal : ".$database."<br>".mysqli_error($connect);
        }

        mysqli_close($connect);
    }
?>
