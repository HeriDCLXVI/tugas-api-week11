<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$nama = $data->nama;
	$category_id = $data->category_id;
	$token = $data->token;

	$response = array();

	if ($token != $auth_token) {
		$response['error'] = true;
		$response['message'] = "Token salah";

		echo json_encode($response);
	}
	else {
		$query = mysqli_query($link, "INSERT INTO product(nama, category_id) VALUES('$nama', '$category_id')");

		if ($query) {
			$response['error'] = false;
			$response['message'] = "Data berhasil disimpan";
		}
		else {
			$response['error'] = true;
			$response['message'] = "Data gagal disimpan";
		}

		echo json_encode($response);
	}
?>