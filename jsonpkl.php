<?php
// Check for the path elements
// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
echo "isinya data===".$request;
echo "method===".$method;
echo "|||";
//$input = json_decode(file_get_contents('php://input'),true);
$input = file_get_contents('php://input');
$link = mysqli_connect("localhost", "id12804385_vidorizqy48", "vidorizqy4816", "id12804385_pkl");
mysqli_set_charset($link,'utf8');

$data = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
echo "isinya data===".$data;
echo "|||";
$id = array_shift($request);
echo "isinya data===".$id;
echo "|||";


if (strcmp($data, 'data') ==0) {
	switch ($method) {
		case 'GET':
			{
				if (empty($id))
				{
					$sql = "select * from barang"; 
					echo "select * from barang ";break;
				}
				else
				{
					$sql = "select * from barang where id_produk='$id'";
					echo "select * from barang where id_produk='$id'";break;
				}
			}
		}
		$result = mysqli_query($link,$sql);
		if (!$result) {
			http_response_code(404);
			die(mysqli_error());
		}
		if ($method == 'GET') {
			$hasil=array();
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				$hasil[]=$row;
			}
			$hasil1 = array('status' => true, 'message' => 'Data show succes', 'data' => $hasil);
			echo json_encode($hasil1);
		}
	}
	else{
		$hasil1 = array('status' => false, 'message' => 'Access Denied');
		echo json_encode($hasil1);
	}
	if ($method == 'POST') {
        echo "Method POST";
        echo "Data input ".$input;
        
        ////
        
        $json = json_decode($input, true);
        echo "json =".$json["id_produk"] ;
        echo "Proses".$json->id_produk;
        $Id_produk=$json["id_produk"];
        $Nama=$json["nama_produk"];
		$Produsen=$json["produsen"];
		$Harga=$json["harga"];
		$Kategori=$json["kategori"];
		$Jenis=$json["jenis"];

		$querycek = "SELECT id_produk,nama_produk,produsen,harga,kategori,jenis FROM barang WHERE id_produk ='$Id_produk'";
		echo "query select ".$querycek;
		$result=mysqli_query($link,$querycek);
		//echo "result =".$result;

		
		if ( $rowcount == 0){
			$query = "INSERT INTO barang (id_produk,nama_produk,produsen,harga,kategori,jenis)
			VALUES ('$Id_produk',$Nama','$Produsen','$Harga','$Kategori','$Jenis')";
			echo "query ".$query;
			mysqli_query($link,$query);
		}
		else if ($rowcount > 0){
			$query = "UPDATE barang SET nama_produk = '$Nama', produsen = '$Produsen',	harga = '$Harga', kategori = '$Kategori', jenis = '$Jenis'
			WHERE id_produk ='$Id_produk'";
			echo "query ".$query;
		mysqli_query($link,$query);
		}
        
        
        
        
        /////
        }
        
mysqli_close($link);
?>