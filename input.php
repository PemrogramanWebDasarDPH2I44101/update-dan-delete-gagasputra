<?php
    include("connect.php");
?>

<html>
    <title> Input </title>
    <pre> Form Registrasi </pre>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama">
        <input type="text" name="nim" maxlength="10" pattern="\d*" placeholder="NIM">
        <input type="date" name="tgl_lahir" placeholder="Tgl Lahir">
        <input type="submit" value="SUBMIT" name="submit">
    </form>
</html>

<?php  
    if (isset($_POST['submit'])) {
        $nama       = $_POST['nama'];
        $nim        = $_POST['nim'];
        $tgl_lahir  = $_POST['tgl_lahir'];

        $database = "INSERT INTO siswa (nama,nim,tgl_lahir)
                    VALUES ('$nama','$nim','$tgl_lahir')";

        if (mysqli_query($connect, $database)) {
            echo "Input Berhasil";
            header("Location: output.php");
        } else {
            echo "Input Gagal : ".$database."<br>".mysqli_error($connect);
        }

        mysqli_close($connect);
    }
?>
