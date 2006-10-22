<?php 
/*
 $Rev$ | $LastChangedBy$
 $LastChangedDate$
 +-------------------------------------------------------------------------+
 | Copyright (c) 2005, Kreotek LLC                                         |
 | All rights reserved.                                                    |
 +-------------------------------------------------------------------------+
 |                                                                         |
 | Redistribution and use in source and binary forms, with or without      |
 | modification, are permitted provided that the following conditions are  |
 | met:                                                                    |
 |                                                                         |
 | - Redistributions of source code must retain the above copyright        |
 |   notice, this list of conditions and the following disclaimer.         |
 |                                                                         |
 | - Redistributions in binary form must reproduce the above copyright     |
 |   notice, this list of conditions and the following disclaimer in the   |
 |   documentation and/or other materials provided with the distribution.  |
 |                                                                         |
 | - Neither the name of Kreotek LLC nor the names of its contributore may |
 |   be used to endorse or promote products derived from this software     |
 |   without specific prior written permission.                            |
 |                                                                         |
 | THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS     |
 | "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT       |
 | LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A |
 | PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT      |
 | OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,   |
 | SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT        |
 | LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,   |
 | DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY   |
 | THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT     |
 | (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE   |
 | OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.    |
 |                                                                         |
 +-------------------------------------------------------------------------+
*/

	include("../../include/session.php");
	include("../../include/common_functions.php");
	include("../../include/fields.php");
	include("include/users_addedit_include.php");
	
	$pageTitle="User";
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $pageTitle ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php require("../../head.php")?>

<link href="<?php echo $_SESSION["app_path"] ?>common/stylesheet/<?php echo $_SESSION["stylesheet"] ?>/pages/users.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../../common/javascript/fields.js" type="text/javascript"></script>
<script language="JavaScript" src="../../common/javascript/choicelist.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
	function checkPassword(theform){
		if(theform["password"].value!=theform["password2"].value && theform["command"].value!="cancel"){
			alert("Passwords did not match.");
			return false;
		}
		return true;
	}
</script>
</head>
<body><?php include("../../menu.php")?>
<form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post" name="record" onSubmit="return (validateForm(this) &amp;&amp; checkPassword(this));"><div id="dontSubmit"><input type="submit" value=" " onClick="return false;" /></div>
<div class="bodyline">
	<div id="topButtons"><?php showSaveCancel(1); ?></div>
	<h1 id="topTitle"><span><?php echo $pageTitle ?></span></h1>
	
	<fieldset id="fsAttributes">
		<legend>attributes</legend>
		
		<p>
			<label for="id">id</label><br />
			<input name="id" type="text" value="<?php echo $therecord["id"]; ?>" size="5" maxlength="5" readonly="true" class="uneditable"/>		
		</p>

		<p>		
			<label for="accesslevel" class="important">access level</label><br />
			<?php basic_choicelist("accesslevel",$therecord["accesslevel"],array(array("value"=>"-10","name"=>"portal access only"),array("value"=>"10","name"=>"basic user (shipping)"),array("value"=>"20","name"=>"Power User (sales)"),array("value"=>"30","name"=>"Manager (sales manager)"),array("value"=>"50","name"=>"Upper Manager"),array("value"=>"90","name"=>"Administrator")),Array("class"=>"important"));?>		
		</p>
		
		<p><?PHP field_checkbox("revoked",$therecord["revoked"])?><label for="revoked">revoke access</label></p>		
	</fieldset>
	
	<div id="leftSideDiv">
		<fieldset id="fsName">
			<legend>name</legend>
			<p id="firstnameP">
				<label for="firstname" class="important" >first name</label><br />
				<?PHP field_text("firstname",$therecord["firstname"],1,"First name cannot be blank.","",Array("size"=>"32","maxlength"=>"64","class"=>"important")); ?>			
			</p>
			<p>
				<label for="lastname" class="important">last name</label><br />
				<?PHP field_text("lastname",$therecord["lastname"],1,"Last name cannot be blank.","",Array("size"=>"32","maxlength"=>"64","class"=>"important")); ?>					
			</p>
		</fieldset>

		<fieldset>
			<legend>log in</legend>
			<p>
				<label for="login" class="important">name</label><br />
				<?PHP field_text("login",$therecord["login"],1,"Login cannot be blank.","",Array("size"=>"32","maxlength"=>"32","class"=>"important")); ?>
			</p>

			<p>
				<label for="lastlogin" >last log in</label><br />
				<input id="lastlogin" name="lastlogin" type="text" value="<?php echo $therecord["lastlogin"]; ?>" size="32" maxlength="64" readonly="true" class="uneditable"  />			
			</p>

			<p>
				<label for="password">set new password</label><br />
				<input id="password" name="password" type="password" size="32" maxlength="32" />			
			</p>
			
			<p>
				<label for="password2">confirm new password</label><br />
				<input id="password2" name="password2" type="password" size="32" maxlength="32" />
			</p>
		</fieldset>

		<fieldset>
			<legend>contact / user information</legend>
			<p>
				<label for="email">e-mail address</label><br />
				<?PHP field_email("email",$therecord["email"],Array("size"=>"64","maxlength"=>"128")); ?>						
			</p>
			<p>
				<label for="phone">phone/extension</label><br />
				<input type="text" id="phone" name="phone" value="<?php echo htmlQuotes($therecord["phone"]) ?>" size="32" maxlength="32" />
			</p>
			<p>
			<label for="department">department</label><br />
				<?PHP choicelist("department",$therecord["department"],"department"); ?>			
			</p>
			<p>
				<label for="employeenumber">employee number</label><br />
				<input type="text" id="employeenumber" name="employeenumber" value="<?php echo htmlQuotes($therecord["employeenumber"]) ?>" size="32" maxlength="32" />			
			</p>
		</fieldset>
	</div>	

	<?php include("../../include/createmodifiedby.php"); ?>
</div>
<?php include("../../footer.php")?>
</form>
</body>
</html>