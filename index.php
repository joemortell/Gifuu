<?php  
require_once("functions.php"); 
set_include_path(get_include_path() . PATH_SEPARATOR . "$_SERVER[DOCUMENT_ROOT]");

$message = "";
if(isset($_POST['submit'])) {
	set_include_path(get_include_path() . PATH_SEPARATOR . "$_SERVER[DOCUMENT_ROOT]");
	include_once("Google_Spreadsheet.php");
	$u = "joe@rarebreeddigital.com"; //sherren7@gmail.com
	$p = "Ezekiel17"; //diexpipe
	$ss = new Google_Spreadsheet($u,$p);
	$ss->useSpreadsheet("Signup"); //Gifuu Signup
	$name = $_POST['name'];
	$email = $_POST['email'];
		if (strpos($email,'@') == true) {
			$row = array 
			(
				"Timestamp" => date("m/d/y H:i:s", time())
				, "Email" => "{$email}"
				, "Name" => "{$name}"
			);
			if ($ss->addRow($row)) $message = "You've been added to the list!" ;
			else $message = "Oops, something happened. Try again!";
	} else {
		$message = "We're going to need an e-mail address...";
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
	<head>
		<TITLE>Gifuu &bull; SignUp</TITLE>
		<link href='http://fonts.googleapis.com/css?family=Lato:400' rel='stylesheet' type='text/css'>
		<link href='css/reset.css' rel='stylesheet' type='text/css'>
		<link href='css/style.css' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	</head>
	
	<body>
		<a href="#wrapper" id="scroll-to">How To Use gifuu</a>
		<div id="container" class="small">
			<div id="logo"></div>
			<h3 class="grey">Sign up to receive news on our beta release</h3>
			<p><?php echo get_include_path() . PATH_SEPARATOR . "$_SERVER[DOCUMENT_ROOT]"; ?></p>
			<p class="ampersand">&amp;</p>
			 <form enctype="multipart/form-data" method="post" action="/">
				<input type="text" name="name" value="Name" id="contact_name" class="left" onFocus="this.value=' ' ">
				<input type="text" name="email" value="E-mail" id="contact_email" class="right" onFocus="this.value=' ' ">
				<input type="submit" value="yes please" name="submit" />
			</form>
			<?php if (!$message == '') :?>
				<div class="message"><?php echo $message ?></div>
			<?php endif; ?>
			<h3>Come gift and play, interested merchants, partners, sponsers and friends,
			Join us <a href="mailto:sherren@gifuu.com">now</a></h3>
		
		</div>
		
		<div id="wrapper" class="one">
			<div id="container" class="normal">
				<ul class="grid_2">
					<li class="friend">
						<h2>pick a friend</h2>
						<p>With social connect, choose friends from your different social networks
						or simply add their email addresses and start treating instantly.
						</p>
					</li>
					<li class="gift">
						<h2>pick a gift</h2>
						<p>Browse peep and gift. A window into gifts big or small, for the young and old, for any occasion or non
						 occasion-there&#39;s simply something for everyone everytime.</p>
					</li>
					<li class="pay">
						<h2>e-pay and send</h2>
						<p class="left-align">Your double security locked eWallet displays all your treats.
						At one glance you&#39;ll see all your received gifts redeemed or not, all in real time.</p>
					</li>
					<li class="receive">
						<h2>friend receives</h2>
						<p>Receiver walks into the store to pick up her gift. She can SHOUT out her joy on social media or 
							thank for friend privately.</p>
					</li>
					<li class="friendpool">
						<h2>friend pool</h2>
						<p>Pick a few friends near or far, same country or afar. Group together to gift and chat.
						Share pay and $track, add personalized messages and send away.</p>
					</li>
					<li class="message">
						<h2>cheeky message texter</h2>
						<p>Lost for words? Brain locked and can&#39;t articulate the moment? Tongue tied no longer 
						With our fun sensible message texter.
						</p>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
		
		<div id="container" class="normal">
			<div id="social-links">
				<a href="#" class="facebook"></a>
				<a href="#" class="pinterest"></a>
				<a href="#" class="google"></a>
			</div>
			<p class="copyright grey clearfix">Copyright &copy; 2012 gifuu. All Rights Reserved.</p>
			<div class="clearfix"></div>
		</div>
	</body>	
</html>