<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$token = $data->token;

	$response = array();

	if ($token != $auth_token) {
		$response['error'] = true;
		$response['message'] = "Token salah";

		echo json_encode($response);
	}
	else {
		$query = mysqli_query($link, "SELECT * FROM category");

		$categories = array();
		while ($data = mysqli_fetch_array($query)) {
			$category = array(
				"id" => $data['id'],
				"nama" => $data['nama']
			);
			array_push($categories, $category);
		}

		echo json_encode($categories);
	}
?>