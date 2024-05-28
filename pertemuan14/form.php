<?php
// Include database connection file
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Tabel 1</h2>
<table>
    <tr>
        <th>kode</th>
        <th>nama barang</th>
        <th>jumlah</th>
    </tr>
    <?php
    if ($koneksi) {
        $tabel_1 = mysqli_query($koneksi, "SELECT * FROM tabel_1");
        while ($dataku = mysqli_fetch_assoc($tabel_1)) {
            echo "<tr>
                <td>{$dataku['kode']}</td>
                <td>{$dataku['nama_barang']}</td>
                <td>{$dataku['jumlah']}</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Error: Unable to connect to database.</td></tr>";
    }
    ?>
</table>

<h2>Tabel 2</h2>
<table>
    <tr>
        <th>kode</th>
        <th>nama barang</th>
        <th>jumlah</th>
    </tr>
    <?php
    if ($koneksi) {
        $tabel2 = mysqli_query($koneksi, "SELECT * FROM tabel_2");
        while ($data2 = mysqli_fetch_assoc($tabel2)) {
            echo "<tr>
                <td>{$data2['kode']}</td>
                <td>{$data2['nama_barang']}</td>
                <td>{$data2['jumlah']}</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Error: Unable to connect to database.</td></tr>";
    }
    ?>
</table>

<h2>Kirim Barang</h2>
<form action="aksi_form.php" method="post">
    <label for="kode">Kode Barang:</label>
    <select name="kode" id="kode">
        <?php
        if ($koneksi) {
            $tabel1 = mysqli_query($koneksi, "SELECT * FROM tabel_2");
            while ($data1 = mysqli_fetch_assoc($tabel1)) {
                echo '<option value="' . $data1['kode'] . '">' . $data1['kode'] . '/' . $data1['nama_barang'] . '</option>';
            }
        } else {
            echo '<option value="">Error: Unable to connect to database.</option>';
        }
        ?>
    </select><br><br>
    <label for="jumlah">Jumlah:</label>
    <input type="number" name="jumlah" id="jumlah"><br><br>
    <input type="submit" value="Kirim">
</form>
</body>
</html>
