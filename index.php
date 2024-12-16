<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti jika menggunakan username lain
$password = ""; // Ganti jika menggunakan password
$dbname = "db_uas"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data
$sql = "SELECT * FROM tb_uas WHERE 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Server</title>
    <style>
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1 class="text-center">UAS</h1>
        <h1 class="text-center">Keamanan Digital</h1><br>
        <h3 class='text-center'>Nama Yang Berhasil</h3>

        <?php
                    if ($result->num_rows > 0) {
                        // Output data dari setiap baris
                        while($row = $result->fetch_assoc()) {
                            echo "
                            <h3 class='text-center'>{$row['Password']}</h3>
                            ";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Tambahkan Nama Anda</td></tr>";
                    }
                    $conn->close();
                    ?>
    </div>
</body>
</html>
