<?php 
/*
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
	
	if($_SESSION["userinfo"]["accesslevel"]<30) header("Location: ".$_SESSION["app_path"]."noaccess.html");	
	
	include("include/products_functions.php");
	if(!isset($_POST["fromdate"])) $_POST["fromdate"]=date("m")."/01/".date("Y");
	if(!isset($_POST["todate"])) $_POST["todate"]=date("m/d/Y",mktime(0,0,0,date("m")+1,0,date("Y")));
	if(!isset($_POST["status"])) $_POST["status"]="Orders/Invoices";
	if(!isset($_POST["command"])) $_POST["command"]="show";

	if($_POST["command"]=="print")	{
			$_SESSION["printing"]["whereclause"]="WHERE products.id=".$_GET["id"];
			$_SESSION["printing"]["dataprint"]="Single Record";
			$fromProduct=true;
			require("report/products_saleshistory.php");
	} else {
	$thestatus="(invoices.type =\"";
	switch($_POST["status"]){
		case "Orders/Invoices":
			$thestatus.="Order\" or invoices.type=\"Invoice\")";
			$searchdate="orderdate";
		break;
		case "Invoices":
			$thestatus.="Invoice\")";
			$searchdate="invoicedate";
		break;
		case "Orders":
			$thestatus.="Order\")";
			$searchdate="orderdate";
		break;
	}

	$temparray=explode("/",$_POST["fromdate"]);
	$mysqlfromdate="\"".$temparray[2]."-".$temparray[0]."-".$temparray[1]."\"";

	$temparray=explode("/",$_POST["todate"]);
	$mysqltodate="\"".$temparray[2]."-".$temparray[0]."-".$temparray[1]."\"";

	$refquery="select partname from products where id=".$_GET["id"];
	$refquery=mysql_query($refquery,$dblink);
	$refrecord=mysql_fetch_array($refquery);
	
	$querystatement="SELECT invoices.id as id, 
		if(invoices.type=\"Invoice\",invoices.invoicedate,invoices.orderdate) as thedate, 
		if(invoices.type=\"Invoice\",Date_Format(invoices.invoicedate,\"%c/%e/%Y\"),Date_Format(invoices.orderdate,\"%c/%e/%Y\")) as formateddate, 
		if(clients.lastname!=\"\",concat(clients.lastname,\", \",clients.firstname,if(clients.company!=\"\",concat(\" (\",clients.company,\")\"),\"\")),clients.company) as client,
		lineitems.quantity as qty, 
		lineitems.unitprice*lineitems.quantity as extended,
		lineitems.unitprice as price, lineitems.unitcost as cost, 
		lineitems.unitcost*lineitems.quantity as extendedcost
		FROM((products inner join lineitems on products.id=lineitems.productid) 
				inner join invoices on lineitems.invoiceid=invoices.id) 
					inner join clients on invoices.clientid=clients.id
		WHERE products.id=".$_GET["id"]." 
		AND ".$thestatus."
		HAVING thedate >=".$mysqlfromdate."
		and thedate <=".$mysqltodate." ORDER BY thedate";
	$queryresult=mysql_query($querystatement,$dblink);
	if(!$queryresult) reportError(100,mysql_error($dblink)." ".$querystatement);
	$queryresult? $numrows=mysql_num_rows($queryresult): $numrows=0;

	$pageTitle="Product Sales History: ".$refrecord["partname"];	
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo $pageTitle ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?php echo $_SESSION["app_path"] ?>common/stylesheet/<?php echo $_SESSION["stylesheet"] ?>/base.css" rel="stylesheet" type="text/css">

<script language="JavaScript" src="../../common/javascript/fields.js"></script>
<script language="JavaScript" src="../../common/javascript/datepicker.js"></script>
</head>
<body><?php include("../../menu.php")?>
<?php product_tabs("Sales History",$_GET["id"]);?><div class="bodyline" style="padding:4px;">
	<h1><?php echo $pageTitle ?></h1>
	<form action="<?PHP echo $_SERVER["REQUEST_URI"] ?>" method="post" name="record">		
		<div class="box" style="vertical-align:middle;">
			<table border=0 cellspacing="0" cellpadding="0">
				<tr>
					<td style="padding-right:20px;">
					   invoice status<br>
					   <select name="status" style="">
							<option value="Orders/Invoices" <?php if($_POST["status"]=="Orders/Invoices") echo "selected"?>>Orders/Invoices</option>
							<option value="Invoices" <?php if($_POST["status"]=="Invoices") echo "selected"?>>Invoices</option>
							<option value="Orders" <?php if($_POST["status"]=="Orders") echo "selected"?>>Orders</option>
					   </select>					
					</td>
					<td nowrap>
					   from<br>
					   <?PHP field_datepicker("fromdate",$_POST["fromdate"],0,"",Array("size"=>"10","maxlength"=>"12"),false);?>
					</td>
					<td style="padding-left:5px;" nowrap>
						to<br>
						<?PHP field_datepicker("todate",$_POST["todate"],0,"",Array("size"=>"10","maxlength"=>"12"),false);?>
					</td>
					<td style="padding-left:20px;"><br>
				       <input name="command" type="submit" value="change timeframe/view" class="smallButtons" style="">					
					</td>
					<td width="100%" align="right">
						<br>
						<input name="command" type="submit" value="print" class="Buttons" style="width:80px;">	
					</td>
				</tr>
			</table>			
		   
		</div>
   
   <table border="0" cellpadding="3" cellspacing="0" class="querytable">
	<tr>
	 <th align="center" nowrap class="queryheader">ID</td>
	 <th align="center" nowrap class="queryheader">Order Date</td>
	 <th nowrap class="queryheader" width="100%" align="left">Client</td>
	 <th align="center" nowrap class="queryheader">Qty.</td>
	 <th align="right" nowrap class="queryheader">Unit Cost</td>
	 <th align="right" nowrap class="queryheader">Cost Ext.</td>
	 <th align="right" nowrap class="queryheader">Unit Price</td>
	 <th align="right" nowrap class="queryheader">Price Ext.</td>
	</tr>
    <?PHP 	
	$totalextended=0;
	$totalcostextended=0;
	$totalquantity=0;
	$avgprice=0;
	$avgcost=0;
	$row=1;
	while ($therecord=mysql_fetch_array($queryresult)){
		if($row==1) $row=2;else $row=1;
		$avgcost+=$therecord["cost"];
		$avgprice+=$therecord["price"];
		$totalquantity+=$therecord["qty"];
		$totalextended+=$therecord["extended"];
		$totalcostextended+=$therecord["extendedcost"];
?>
	<tr class="row<?php echo $row?>">
	 <td align="center" nowrap><?PHP echo $therecord["id"]?></td>
	 <td align="center" nowrap><?PHP echo $therecord["formateddate"]?$therecord["formateddate"]:"&nbsp;" ?></td>
	 <td nowrap><?PHP echo $therecord["client"]?></td>
	 <td align="center" nowrap><?PHP echo number_format($therecord["qty"],2)?></td>
	 <td align="right" nowrap><?PHP echo "\$".number_format($therecord["cost"],2)?></td>
	 <td align="right" nowrap><?PHP echo "\$".number_format($therecord["extendedcost"],2)?></td>
	 <td align="right" nowrap><?PHP echo "\$".number_format($therecord["price"],2)?></td>
	 <td align="right" nowrap><?PHP echo "\$".number_format($therecord["extended"],2)?></td>
	</tr>
    <?PHP } if(!mysql_num_rows($queryresult)) {?>
	<tr><td colspan="9" align=center style="padding:0px;"><div class="norecords">No Sales Data for Given Timeframe</div></td></tr>
	<?php }?>
	<tr>
	 <td align="center" class="queryfooter">&nbsp;</td>
	 <td align="center" class="queryfooter">&nbsp;</td>
	 <td class="queryfooter">&nbsp;</td>
	 <td align="center" class="queryfooter"><?PHP echo number_format($totalquantity,2)?></td>
	 <td align="right" nowrap class="queryfooter">avg. = <?PHP $numrows?$avgcost=$avgcost/$numrows:$avgcost=0; echo "\$".number_format($avgcost,2)?></td>
	 <td align="right" class="queryfooter"><?PHP echo "\$".number_format($totalcostextended,2)?></td>
	 <td align="right" nowrap class="queryfooter">avg. = <?PHP $numrows?$avgprice=$avgprice/$numrows:$avgprice=0; echo "\$".number_format($avgprice,2)?></td>
	 <td align="right" class="queryfooter"><?PHP echo "\$".number_format($totalextended,2)?></td>
	</tr>
   </table>	</form>	
</div>
</body>
</html><?php }?>