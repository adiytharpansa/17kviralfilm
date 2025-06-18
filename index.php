
<?php
$videos = json_decode(file_get_contents("../videos.json"), true);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>17Kviral - Streaming Video Dewasa</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header><h1>17Kviral</h1></header>
  <div class="grid">
    <?php foreach ($videos as $v): ?>
      <a class="card" href="video.php?id=<?= $v['id'] ?>">
        <img src="<?= $v['thumb'] ?>" alt="<?= $v['title'] ?>">
        <div class="card-title"><?= $v['title'] ?></div>
      </a>
    <?php endforeach; ?>
  </div>
</body>
</html>
