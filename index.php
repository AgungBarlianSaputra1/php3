<?php
include 'koneksi.php';

// TAMBAH DATA
if(isset($_POST['tambah'])){

    $nama  = $_POST['nama'];
    $sandi = $_POST['sandi'];

    mysqli_query(
        $koneksi,
        "INSERT INTO users(nama, sandi)
         VALUES('$nama','$sandi')"
    );

    header("Location: index.php");
    exit;
}

// HAPUS DATA
if(isset($_GET['hapus'])){

    $id = $_GET['hapus'];

    mysqli_query(
        $koneksi,
        "DELETE FROM users WHERE id='$id'"
    );

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CRUD Railway</title>

<style>

body{
    font-family: Arial;
    background: #f0f2f5;
    margin: 0;
    padding: 40px;
}

.container{
    width: 700px;
    margin: auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h1{
    text-align: center;
    margin-bottom: 30px;
}

form{
    display: flex;
    gap: 10px;
    margin-bottom: 30px;
}

input{
    flex: 1;
    padding: 10px;
}

button{
    padding: 10px 20px;
    border: none;
    background: blue;
    color: white;
    cursor: pointer;
}

table{
    width: 100%;
    border-collapse: collapse;
}

table th{
    background: blue;
    color: white;
    padding: 10px;
}

table td{
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

a{
    color: red;
    text-decoration: none;
}

</style>

</head>

<body>

<div class="container">

<h1>CRUD PHP Railway</h1>

<form method="POST">

<input
    type="text"
    name="nama"
    placeholder="Masukkan Nama"
    required
>

<input
    type="password"
    name="sandi"
    placeholder="Masukkan Password"
    required
>

<button
    type="submit"
    name="tambah"
>
    Simpan
</button>

</form>

<table>

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Password</th>
    <th>Aksi</th>
</tr>

<?php

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM users"
);

while($d = mysqli_fetch_array($data)){

?>

<tr>

<td>
    <?php echo $d['id']; ?>
</td>

<td>
    <?php echo $d['nama']; ?>
</td>

<td>
    <?php echo $d['sandi']; ?>
</td>

<td>
    <a href="index.php?hapus=<?php echo $d['id']; ?>">
        Hapus
    </a>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>
