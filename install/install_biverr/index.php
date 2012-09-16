<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Biverr:The Awesome Fiverr Clone Installation Wizard</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="javascript/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="javascript/thickbox.js"></script>
<link rel="stylesheet" href="javascript/thickbox.css" type="text/css" media="screen" />
<style type="text/css">
BODY { padding: 0; margin: 0; font: 0.7em Tahoma, Arial, sans-serif; line-height: 1.6em; background-color: #3D3D3D; color: #000000; text-align: center;}

#content { margin: 200px 450px 0px 400px ; width: 500px;  text-align: left; background: #FFFFFF;
         padding: 10px 10px 10px 10px; }




div.response_alert {
background-color: #FFFF99;
border-width: 1px;
border-color: #FFFF33;
border-style: solid;
padding: 2px 2px 2px 2px;
-moz-border-radius: 4px;
}

span.text {
color: #000000;
font-size:11px;
font-family: Tahoma;
font-weight:normal;
}

div.greybox {
background-color: #F7F7F7;
border-width: 1px;
border-color: #D6D5D6;
border-style: solid;
padding: 4px 4px 4px 4px;
margin: 2px 7px 2px 7px;
-moz-border-radius: 4px;
}

div.whitebox {
background-color: #FFFFFF;
border-width: 1px;
border-color: #D6D5D6;
border-style: solid;
padding: 4px 4px 4px 4px;
margin: 2px 7px 2px 7px;
-moz-border-radius: 4px;
}

div.response_error {
background-color: #ffeaea;
border-width: 1px;
border-color: #e82a2a;
border-style: solid;
padding: 2px 2px 2px 2px;
-moz-border-radius: 4px;
}

div.response_success {
background-color: #eaffea;
border-width: 1px;
border-color: #4dda2c;
border-style: solid;
padding: 2px 2px 2px 2px;
-moz-border-radius: 4px;
}




</style>
</head>
<body>
<div id="content">
  <div class="whitebox">
<div align="center">
<h1>Biverr:The Awesome Fiverr Clone</h1>

  <img src="biverr_fiverr_clone.png" alt="Biverr:The Awesome Fiverr Clone"/></div>
    <?php

$pass =0;
function phpMinV($v)
{
    $phpV = PHP_VERSION;

    if ($phpV[0] >= $v[0]) {
        if (empty($v[2]) || $v[2] == '*') {
            return true;
        } elseif ($phpV[2] >= $v[2]) {
            if (empty($v[4]) || $v[4] == '*' || $phpV[4] >= $v[4]) {
                return true;
            }
        }
    }

    return false;
}

 echo '<div class="response_success"><span class="text"> This is the installation page. Please ensure you have your database details ready for the next step. All futher instructions on how the application works are on you admin account.</span>  </div><br/>';

/* ---- Newer than 4 ---- */
if (phpMinV('5')) {
    echo '<div class="response_alert"><span class="text"><img src="images/success.png"> Your PHP version will work fine with this application.</span>  </div><br/>';
} else{
   $pass =1;
   echo '<div class="response_error"><span class="text"><img src="images/alert.png"> You need a higher PHP version for this application.</span>  </div><br/>';

}

 if (extension_loaded('curl')) {
             echo '<div class="response_alert"><span class="text"><img src="images/success.png">  You have cURL installed.</span>  </div><br/>';
} else {

   $pass =1;
   echo '<div class="response_error"><span class="text"><img src="images/alert.png"> cURL is required for this application to work properly.</span>  </div><br/>';


}


?>
    <?php if($pass==0) { ?>
    <center>
      <a href="./step_one.php?&keepThis=true&TB_iframe=true&height=400&width=600" class="thickbox" title="Installation"><img src="./button.gif" border="0" ></a>
    </center>
    <?php } else { ?>
    <div class="response_error"><span class="text">This application will not work properly if any of the above tests failed. Please see our support forum for alternative solutions.</span> </div>
    <?php } ?>
  </div>
</div>
</body>
</html>