<?php  
require_once("functions.php"); 

$message = "";
if(isset($_POST['submit'])) {
	set_include_path(get_include_path() . PATH_SEPARATOR);
	include_once("Google_Spreadsheet.php");
	$u = "sherren7@gmail.com"; 
	$p = "diexpipe";
	$ss = new Google_Spreadsheet($u,$p);
	$ss->useSpreadsheet("Gifuu Signup");
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
			<h1>Give a real gift virtually</h1>
			<h3 class="grey">Sign up to receive news on our beta release</h3>
			<p class="ampersand">&amp;</p>
			 <form enctype="multipart/form-data" method="post" action="/">
				<input type="text" name="name" value="Name" id="contact_name" class="left" onFocus="this.value=' ' ">
				<input type="text" name="email" value="E-mail" id="contact_email" class="right" onFocus="this.value=' ' ">
				<input type="submit" value="yes please" name="submit" />
			</form>
			<?php if (!$message == '') :?>
				<div class="message"><?php echo $message ?></div>
			<?php endif; ?>
			<h3>Come gift and play, interested merchants, partners, sponsors and friends,
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
		<script type="text/javascript">

				$(document).ready(function() {
				  function filterPath(string) {
				  return string
				    .replace(/^\//,'')
				    .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
				    .replace(/\/$/,'');
				  }
				  var locationPath = filterPath(location.pathname);
				  var scrollElem = scrollableElement('html', 'body');

				  $('a[href*=#]').each(function() {
				    var thisPath = filterPath(this.pathname) || locationPath;
				    if (  locationPath == thisPath
				    && (location.hostname == this.hostname || !this.hostname)
				    && this.hash.replace(/#/,'') ) {
				      var $target = $(this.hash), target = this.hash;
				      if (target) {
				        var targetOffset = $target.offset().top;
				        $(this).click(function(event) {
				          event.preventDefault();
				          $(scrollElem).animate({scrollTop: targetOffset}, 600, function() {
				            location.hash = target;
				          });
				        });
				      }
				    }
				  });

				  // use the first element that is "scrollable"
				  function scrollableElement(els) {
				    for (var i = 0, argLength = arguments.length; i <argLength; i++) {
				      var el = arguments[i],
				          $scrollElement = $(el);
				      if ($scrollElement.scrollTop()> 0) {
				        return el;
				      } else {
				        $scrollElement.scrollTop(1);
				        var isScrollable = $scrollElement.scrollTop()> 0;
				        $scrollElement.scrollTop(0);
				        if (isScrollable) {
				          return el;
				        }
				      }
				    }
				    return [];
				  }

				});

				// Pop-up Message
				$(document).ready(function(){
					$('#scroll-to').fadeIn('slow');
				 $(window).scroll(function(){
				  var h = 350;
				  var y = $(window).scrollTop();
				  if( y > h ){
				   $('#scroll-to').fadeOut('fast');
				  }
				 });
				})
				</script>
	</body>	
</html>