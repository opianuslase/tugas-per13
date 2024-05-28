<?php
echo "<html>
   <body>";

// Check if the form is submitted and 'nama' field is set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nama'])) {
    $koneksi = mysqli_connect("localhost", "root", "", "db_searching");

    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $cari = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $query = "SELECT * FROM tabel_mahasiswa WHERE nama LIKE '%$cari%' ORDER BY nama ASC";
    $hasil = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($hasil) > 0) {
        echo "<table border='1'> 
        <tr>
        <th>NIM</th> 
        <th>Nama</th> 
        <th>Alamat</th> 
        <th>Jurusan</th>
        </tr>";

        while ($data = mysqli_fetch_assoc($hasil)) {
            echo "<tr> 
            <td>" . $data['nim'] . "</td> 
            <td>" . $data['nama'] . "</td> 
            <td>" . $data['alamat'] . "</td>
            <td>" . $data['jurusan'] . "</td> 
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }

    mysqli_close($koneksi);
} else {
    echo "Please enter a name to search.";
}

echo "</body>
</html>";
?>
