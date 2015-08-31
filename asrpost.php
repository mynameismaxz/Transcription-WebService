<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?PHP
$mountpointReq = $_REQUEST["mountpoint"];
$textReq = $_REQUEST["text"];
$mountpoint = iconv(mb_detect_encoding($mountpointReq), 'UTF-8', $mountpointReq);
$text = iconv(mb_detect_encoding($textReq), 'UTF-8', $textReq);

// get previous text from etherpad
// $url_data_get = "http://104.43.14.16:9001/api/1.2.1/getText?apikey=captionservice&padID=".$mountpoint;
// $json_get_data = file_get_contents($url_data_get);
// $obj_json = json_decode($json_get_data);
// $previous_txt = $obj_json->data->text;

// send text after previous text (not delete old Text)
$new_txt_data = $text;
$postData = array('apikey' => "captionservice" ,'padID' => $mountpoint, 'text' => $new_txt_data);
$url_data_post = "http://104.43.18.77:9001/api/1.2.1/setText";
//$url_data_send = "http://128.199.174.129:9001/api/1.2.1/setText?apikey=mic&padID=".$mountpoint."&text=".$new_txt_data;

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r",
        'method'  => 'POST',
        'content' => http_build_query($postData),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url_data_post, false, $context);

// var_dump($result);

// test fixed padID
// $myvars = 'apikey=mic' . '&padID=kmutt.mp3' . '&text=' . $new_txt_data;


// $ch = curl_init( $url_data_post );
// curl_setopt( $ch, CURLOPT_POST, 1);
// curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
// curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
// curl_setopt( $ch, CURLOPT_HEADER, 0);
// curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

// $response = curl_exec( $ch );

echo $text.'<br>';
// echo $response;
?>