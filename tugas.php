<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handling dan Validation</title>
</head>
<body>

<?php
// Inisialisasi variabel
$nim = $nama = $email = $alamat = "";
$nimErr = $namaErr = $emailErr = $alamatErr = "";

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi NIM
    if (empty($_POST["nim"])) {
        $nimErr = "*NIM wajib diisi";
    } else {
        $nim = test_input($_POST["nim"]);
    }

    // Validasi Nama
    if (empty($_POST["nama"])) {
        $namaErr = "*Nama wajib diisi";
    } else {
        $nama = test_input($_POST["nama"]);
    }

    // Validasi Email
    if (empty($_POST["email"])) {
        $emailErr = "*Email wajib diisi";
    } else {
        $email = test_input($_POST["email"]);
        // Validasi format email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email tidak valid";
        }
    }

    // Validasi Alamat
    if (empty($_POST["alamat"])) {
        $alamatErr = "*Alamat wajib diisi";
    } else {
        $alamat = test_input($_POST["alamat"]);
    }
}

// Fungsi untuk membersihkan dan memvalidasi input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    NIM: <input type="text" name="nim" value="">
    <span class="error"><?php echo $nimErr; ?></span>
    <br><br>

    Nama: <input type="text" name="nama" value="">
    <span class="error"><?php echo $namaErr; ?></span>
    <br><br>

    Email: <input type="text" name="email" value="">
    <span class="error"><?php echo $emailErr; ?></span>
    <br><br>

    Alamat: <textarea name="alamat" rows="5" cols="40"></textarea>
    <span class="error"><?php echo $alamatErr; ?></span>
    <br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
// Menampilkan hasil default "NIM" dan "Nama"
echo "<h2>Hasil Default:</h2>";
echo "NIM: 22090049<br>";
echo "Nama: Dhini Meisya Paramadina<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST" && $nimErr == "" && $namaErr == "" && $emailErr == "" && $alamatErr == "") {
    echo <h2>Hasil Input</h2>
    NIM: 22090049 <br><br>
    Nama: Dhini Meisya Paramadina <br><br>
    Email: dhinimeisya04@gmail.com <br><br>
    Alamat: Desa Pedeslohor <br><br>
}
?>

</body>
</html>