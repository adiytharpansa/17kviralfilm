
<?php
$videos = json_decode(file_get_contents("../videos.json"), true);
$id = $_GET['id'] ?? '';
$video = null;
foreach ($videos as $v) {
  if ($v['id'] === $id) {
    $video = $v;
    break;
  }
}
if (!$video) die("Video not found");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $video['title'] ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header><h1><?= $video['title'] ?></h1></header>
  <div class="video-player"><?= $video['embed'] ?></div>
</body>
</html>
