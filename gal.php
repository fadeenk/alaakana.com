<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galleries</title>
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
		<h2>Galleries</h2>
		<?php
      class Gal
      {
          public $thumb;
          public $source;
          public $title;
  
          function __construct($in_thumb, $in_source, $in_title) {
            $this->thumb = $in_thumb;
            $this->source = $in_source;
            $this->title = $in_title;
          }
  
      }
      $gals = array();
      array_push(
        $gals,
        new Gal("galleries/pix/goldParty/279777266_10159981890341165_5979533984845891057_n.jpg", "galleries/goldParty.php", "The Gold Key Awards party"),
        new Gal("galleries/pix/EMTLI/78946189_423100381902375_6068178079258247168_n.jpg", "galleries/EMTLI.php", "Equity-Minded Teaching and Learning institute (EMTLI)
"),
        new Gal("galleries/pix/startalk2018/20180724_125056.jpg", "galleries/startalk2018.php", "STARTALK Program 2018"),
        new Gal("galleries/pix/comicCon2018/20180721_065213%20-%20Copy.jpg", "galleries/comicCon2018.php", "Comic-Con 2018 in San Diego, California"),
        new Gal("galleries/pix/ACTFL/title.jpg", "galleries/ACTFL.php", "Annual Convention and World Languages Expo (ACTFL)"),
        new Gal("galleries/pix/coworkers/20180601_221112.jpg", "galleries/coworkers.php", "Coworkers at Gaslamp Hilton Hotel"),
        new Gal("galleries/pix/startalk/20170728_132121.jpg", "galleries/startalk.php", "STARTALK Program 2017"),
        new Gal("galleries/pix/Phd/photo_028.jpg", "galleries/phd.php", "Ph.D. Pictures in Jordan"),
        new Gal("galleries/pix/baghdad hotel/photo_031.jpg", "galleries/b_hotel.php", "Baghdad Hotel in Iraq"),
        new Gal("galleries/pix/october/photo_006.jpg", "galleries/october.php", "October 6 Universtiy in Egypt"),
        new Gal("galleries/pix/ahlea/photo_036.jpg","galleries/ahlea.php","AL-Ahliyya Amman University in Jordan"),
        new Gal("galleries/pix/comic con/photo_008.jpg","galleries/comic con.php","Comic-Con 2011 in San Diego, California"),
        new Gal("galleries/pix/course/photo_007.jpg","galleries/course.php","Hotel & Restaurant Management Course in Baghdad Hotel"),
        new Gal("galleries/pix/c amman/photo_003.jpg","galleries/c amman.php","Restaurant Management Course in Imperial Palace Hotel in Jordan"),
        new Gal("galleries/pix/others/photo_003.jpg","galleries/others.php","Miscellaneous"),
        new Gal("galleries/pix/h t/photo_003.jpg","galleries/h t.php","Hilton San Diego Gaslamp Quarter hotel"),
        new Gal("galleries/pix/tc/photo_003.jpg","galleries/tc.php","Practical Training Courses in Arena Hotel in Jordan")
      );    
		?>
		
    <?php foreach($gals as $key=>$gal): ?>
      <?php if ($key % 4 == 0) {
         echo '<div class="cleaner"></div>';
        }
      ?>
      <div class="gallery_box <?php if ($key % 4 == 0) echo no_margin_right; ?>">
        <a href="<?php echo $gal->source; ?>"><img src="<?php echo $gal->thumb; ?>" style="width:200px;"></a>
        <a href="<?php echo $gal->source; ?>"><?php echo $gal->title; ?></a>
      </div>
    <?php endforeach; ?>
    <div class="cleaner"></div>
</div> <!-- END of main -->
<?php include("inc/footer.html"); ?>

</body>
</html>
