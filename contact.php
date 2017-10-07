<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Information</title>
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
	<h2>Contact Information</h2>
    <div class="col_12 float_l">
    	<h4>Alaa Gado Kana, ph.D</h4>
        <h6><strong>Adjunct Faculty</strong></h6>
        Email: <a href="mailto:alaa_kana@yahoo.com">alaa_kana@yahoo.com</a><br />
        <div class="cleaner h40"></div>
        <h6><strong>Night Auditor</strong></h6>
        <a href="http://www.hiltongaslamp.com">San Diego Hilton Gaslamp Quarter</a><br /><br />
        401 K Street, San Diego, CA, 92101<br /><br />
        Phone:(619)2314040<br />
        Fax:(619)2316439<br /><br />
        Email: <a href="mailto:agado@hiltongaslamp.com">agado@hiltongaslamp.com</a>


	</div>
    <div class="col_12 float_r">
    	<h4>Feel free to send me a message.</h4>
        <div id="contact_form">
           <form method="post" name="contact" action="send.php">

                        <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
                        <div class="cleaner h10"></div>
                        <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                        <div class="cleaner h10"></div>

						<label for="subject">Subject:</label> <input type="text" name="subject" id="subject" class="input_field" />

						<div class="cleaner h10"></div>

                        <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                        <div class="cleaner h10"></div>

                        <input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />
						<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
            </form>
        </div>
	</div>

    <div class="cleaner"></div>
</div> <!-- END of main -->
<?php include("inc/footer.html"); ?>

</body>
</html>
