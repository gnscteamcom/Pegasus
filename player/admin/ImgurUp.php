<?
	$data = array(
		'Error' => true,
		'ErrorCode' => '0110101',
		'ErrorMessage' => 'Não recebido as variaveis no metodo $_POST corretamente',
		'ImageURL' => ''
	);


	if(!empty($_POST['Image']) && !empty($_POST['Key'])){

		$api_key = $_POST['Key'];
		list($ImageInfos, $ImageBase64) = explode(",", $_POST['Image']);

		$pvars   = array('image' => $ImageBase64, 'key' => $api_key);
		$timeout = 30;
		$curl    = curl_init();
		$post    = http_build_query($pvars);

		curl_setopt($curl, CURLOPT_URL, 'http://imgur.com/api/upload.xml');
		curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$xml_raw = curl_exec($curl);
		curl_close ($curl);



		$xml = new SimpleXMLElement($xml_raw);
		if ($xml->error_code != '') {
			$imgur_error_code = $xml->error_code;
			$imgur_error_msg = $xml->error_msg;

			settype($imgur_error_code, "string");
			settype($imgur_error_msg, "string");

			$data['Error'] = true;
			$data['ErrorCode'] = $imgur_error_code;
			$data['ErrorMessage'] = $imgur_error_msg;
		} else {
			$imgur_original = $xml->original_image;
			$imgur_large_tbn = $xml->large_thumbnail;
			$imgur_small_tbn = $xml->small_thumbnail;
			$imgur_image_hash = $xml->image_hash;
			$imgur_delete_hash = $xml->delete_hash;
			$imgur_page = $xml->imgur_page;
			$img_delete_page = $xml->delete_page;

			settype($imgur_original, "string");
			settype($imgur_large_tbn, "string");
			settype($imgur_small_tbn, "string");

			$data['Error'] = false;
			$data['ErrorCode'] = '';
			$data['ErrorMessage'] = '';

			$data['ImageURL'] = $imgur_original;

		}
		echo json_encode($data);
	}else{
		echo json_encode($data);
	}
?>
