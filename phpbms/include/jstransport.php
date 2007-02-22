<?php 
	$loginNoKick=true;
	$loginNoDisplayError=true;
	require_once("session.php");
	
	
	//phone formating
	?>phoneRegExpression=<?php 
	switch($_SESSION["phone_format"]){
		case "US - Loose":
			?>/^(?:[\+]?(?:[\d]{1,3})?(?:\s*[\(\.-]?(\d{3})[\)\.-])?\s*(\d{3})[\.-](\d{4}))(?:(?:[ ]+(?:[xX]|(?:[eE][xX][tT][\.]?)))[ ]?[\d]{1,5})?$/;<?php
		break;
		case "US - Strict":
			?>/^[2-9]\d{2}-\d{3}-\d{4}$/;<?php		
		break;
	} echo "\n\n";	
	
	//date formating
	?>DATE_FORMAT="<?php echo $_SESSION["date_format"]?>";<?php
	echo "\n\n";
	
	//time formating
	?>TIME_FORMAT="<?php echo $_SESSION["time_format"]?>";<?php
	echo "\n\n";
	
 	if(isset($_SESSION["include_js"])){
		echo $_SESSION["include_js"];
		$_SESSION["include_js"]="";
	}
?>