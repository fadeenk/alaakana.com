<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dr. Alaa Kana: October 6th Universtiy</title>
  <?php include("inc/meta.inc"); ?>
  <?php include("inc/style.inc"); ?>
  <?php include("inc/scripts.inc"); ?>
</head>
<body>
  <div id="temp_header_wrapper">
    <?php include("inc/header.inc"); ?>
  </div>
  <div id="temp_main_top"></div>
  <div id="temp_main">
    <h2>October 6 Universtiy in Egypt</h2>
    <?php
      $path = "pix/october";
      $dir_path = dirname(__FILE__) . "/" . $path;
      $dir = new DirectoryIterator($dir_path);
      $files = array();
      foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot()) {
          array_push($files, $fileinfo->getFilename());
        }
      }
    ?>
    <?php foreach($files as $key=>$filename): ?>
      <?php if ($key % 4 == 0) {
         echo '<div class="cleaner"></div>';
        }
      ?>
      <div class="gallery_box <?php if ($key % 4 == 0) echo no_margin_right; ?>">
        <a href="<?php echo $path . "/" . $filename; ?>" rel="lightbox[portfolio]">
          <img src="<?php echo $path . "/" . $filename; ?>" style="width:200px;">
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</body>
</html>
