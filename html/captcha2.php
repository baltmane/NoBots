<?php
session_start();
$diff = time() - $_SESSION['time'];
$shirtsLeft = (int)(20/($diff + 1));
if($diff < 10)
{   //Print how many shirts left and calculate time diff
    echo("There are $shirtsLeft shirts left!");
}
else
{   echo("Full stock but going fast!");
    $_SESSION['time'] = time();
    $_SESSION['cart'] = 0;
}
$cart = $_SESSION['cart'];
echo("\nSHIRTS IN CART: $cart");
?>
<style type="text/css">
#tt_capcorrect {
color: #008000;
font-weight: bold;
}

#tt_capincorrect {
color: #F00;
font-weight: bold;
}

#tt_captcha {
width: 330px;
position: absolute;
bottom: 40%;
right: 40%;
margin: 1 auto;
padding: 8px;
border: 1px solid #504D4D;
}

#tt_capform {
width: 100%;
margin: 0;
}

#tt_capimage {
position: absolute;
display: block;
margin: 0px auto;
}

#tt_capsubmit {
text-align: center;
color: #FFF;
cursor: pointer;
padding: 2px 12px 2px 12px;
height: 35px;
top: 30px;
vertical-align: top;
background: #FF8F00;
font-weight: bold;
position: absolute;
float: right;
right: 20px;
display: block;
margin: 5px auto;
}
#tt_capvalue {
color: #888;
border: 1px solid #D7D7D9;
position: relative;
display: block;
padding: 9px;
float: center;
clear: center;
font-size: 12px;
margin: 5px auto;
}
#tt_addr {
color: #888;
border: 1px solid #D7D7D9;
position: relative;
display: block;
padding: 9px;
float: center;
top: 0px;
font-size: 12px;
margin: 5px auto;
}
#tt_capsubmit:hover {
background: #333;
}
</style>
<div id="tt_captcha">
<?php
if(isset($_POST["captcha"]) && $_POST["captcha"] != "" && $_SESSION["ttcapt2"] == $_POST["captcha"] && $diff <= 10)
{
/* Correct CAPTCHA entered. Do whatever you like here */
    echo "<div id=\"tt_capcorrect\">Congratulations on the new shirt!</div>";
    if($_SESSION['cart'] == 5)
    {
        echo("flag{n0w1tkn0wsm0rsec0de}");
        $_SESSION['cart'] = 0;
    }
    else
    {
	$_SESSION['cart'] += 1;
    }
}
else {
if(isset($_POST["captcha"]) && $_POST["captcha"] != "" && $_SESSION["ttcapt2"] != $_POST["captcha"])
{
/* Correct CAPTCHA entered. Do whatever you like here */
echo "<div id=\"tt_capincorrect\">Incorrect Answer!</div>";
}
else if($diff > 10)
{
echo "<div id=\"tt_capincorrect\">Sold Out :( ...<div>";
}
?>
<form id="tt_capform" action="" method="post" id="commentform">
<img id="tt_capimage" src="4.php"/>
<input id="tt_capvalue" name="captcha" type="text" value="Type Captcha Answer Here" onblur="if (this.value == '') {this.value = 'Type Captcha Answer Here';}" onfocus="if (this.value == 'Type Captcha Answer Here') {this.value = '';}" required />
<input name="submit" type="submit" id="tt_capsubmit" tabindex="5" value="Submit"/>
<input name="addr" type="text" id="tt_addr" value="Your Address Here" onblur="if (this.value == '') {this.value = 'Your Address Here';}" onfocus="if (this.value == 'Your Address Here') {this.value = '';}" required />
</form>
<?php
}
?>
</div>
