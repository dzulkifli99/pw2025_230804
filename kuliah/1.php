<?php

// koneksi
$kon = mysqli_connect('localhost', 'root', '', 'baru');

if (!$kon) {
    echo "Gagal koneksi ke database: " . mysqli_connect_error();
    exit;
}

// mengambil data di db baru
$result = mysqli_query($kon, "SELECT * FROM mahasiswa");

if (!$result) {
    echo "Gagal menjalankan query: " . mysqli_error($kon);
    exit;
}

$rows = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

$mahasiswa = $rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar mahasiswa</title>
</head>

<body>
    <h3>daftar mahasiswa</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>#</th>
            <th>gambar</th>
            <th>nrp</th>
            <th>nama</th>
            <th>email</th>
            <th>jurusan</th>
            <th>aksi</th>
        </tr>
        <?php $no = 1;
        foreach ($mahasiswa as $mhs): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><img src="img/<?php echo $mhs['gambar']; ?>" width="50" height="60" alt=""></td>
                <td><?php echo $mhs['nrp']; ?></td>
                <td><?php echo $mhs['nama']; ?></td>
                <td><?php echo $mhs['email']; ?></td>
                <td><?php echo $mhs['jurusan']; ?></td>
                <td>
                    <a href="ubah.php?id=<?php echo $mhs['id']; ?>">ubah</a> | <a href="hapus.php?id=<?php echo $mhs['id']; ?>">hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>