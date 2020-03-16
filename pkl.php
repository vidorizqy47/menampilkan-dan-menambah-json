<?php
$konek = mysqli_connect("localhost", "id12804385_vidorizqy48", "vidorizqy4816", "id12804385_pkl");
$query = "SELECT * from barang ";
$result = mysqli_query($konek,$query);
$arr = array();
while ($row = mysqli_fetch_assoc($result)) {
    $temp = array(
    "id_produk" => $row["id_produk"],
    "nama_produk" => $row["nama_produk"],
    "produsen" => $row["produsen"], 
    "harga" => $row["harga"],
    "kategori" => $row["kategori"],
    "jenis" => $row["jenis"]);
    array_push($arr, $temp);
}
$data = json_encode($arr);
echo "{\"MENAMPILKAN DATA Barang\":" . $data . "}";
?>