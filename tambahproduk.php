<html>
    <head>
        <title>Data Barang UMKM</title>
    </head>
    <body>
        <?php
        if (isset ($_POST['id_produk'])) {
            $url = 'https://vrteknikinformatika.000webhostapp.com/tugaspkl/jsonpkl.php';
            $data="{\"id_produk\":\"".$_POST['id_produk']."\",\"nama_produk\":\"".$_POST['nama_produk']."\",\"produsen\":\"".$_POST['produsen']."\",\"harga\":\"".$_POST['harga']."\",\"kategori\":\"".$_POST['kategori']."\",\"jenis\":\"".$_POST['jenis']."\"}";
            echo "datanya ".$data;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $response = curl_exec($ch);
            echo "response ".$response;
            curl_close($ch);
        }
        ?>
        <form method="POST" action="tambahproduk.php">
            <table>
                <tr>
                    <td>id_produk</td>
                    <td><input type="text" name="id_produk" id="id_produk"></td>
                </tr>
                <tr>
                    <td>Nama Produk</td>
                    <td><input type="text" name="nama_produk" id="nama_produk"></td>
                </tr>
                <tr>
                    <td>Produsen</td>
                    <td><input type="text" name="produsen" id="produsen"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="integer" name="harga" id="harga"></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td><input type="text" name="kategori" id="kategori"></td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td><input type="text" name="jenis" id="jenis"></td>
                </tr>
                <tr>
                    <tr>
                        <td><input type="submit" name="submit" id="submit" value="Tambah"></td>
                        <td></td>
                    </tr>
            </table>
        </form>
    </body>
</html>