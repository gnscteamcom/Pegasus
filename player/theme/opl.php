<?php
if(isset($_GET["id"])){
    $videoID = $_GET["id"];
}
else{
    echo "Video ID not sended";
}

$login = "0f5029059bb97f9f";
$key = "RsBXx35T";
$hasError = false;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.openload.io/1/file/dlticket?file={$videoID}&login={$login}&key={$key}");
curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);

$responseJSON = json_decode($response, true);

if(!$responseJSON || $responseJSON["status"] != 200){
    $hasError = true;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Player openload</title>
        <meta charset="utf-8">
        <style>
            * {
                margin: 0px;
                padding: 0px;
            }
            html, body, video {
                width: 100% !important;
                height: 100% !important;
            }
            body {
                background-color: #000;
                color: #FFF;
            }
        </style>
        <script src="jwplayer7/jquery.min.js"></script>
        <script src="jwplayer7/jwplayer.js"></script>
        <script>jwplayer.key="nN2o1zDINLbsQSjkvDhlq5qWJzsc57+W7SqS3Q==";</script>
        <script>
            var ticketCode = "<?php echo $responseJSON["result"]["ticket"]; ?>";
            var fileId = "<?php echo $videoID; ?>";
            var hasError = <?php if($hasError){ echo "true"; }else{ echo "false"; } ?>;
        </script>
        <script src="jwplayer7/app.js"></script>
    </head>
    <body>
        <div id="videoWrapper">
            <?php
            if($hasError){
            ?>
            Ocorreu um erro, não será possivel carregar o video.
            <?php
            }
            ?>
        </div>
    </body>
</html>
