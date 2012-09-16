<?php
include_once('config/db_conn.php');
include_once('db_config/db_gigs.php');
include_once('db_config/db_cms.php');
$cid=$_REQUEST['cid'];
$cms =new cms();
$rs_cms=$cms->uniq_cms_list("id",$cid);
if($_REQUEST['submit'])
{
	$table='ninerr_cms';
	$dataArray=array("cms_content"=>$_REQUEST['cms_content']);
	$fldArray=array("id"=>$_REQUEST['id']);
	$cms->dataUpdate($table,$dataArray,$fldArray);
	reDirect('cms.php');
//header ("Location: cms.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Orders - Admin</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!-- TinyMCE -->
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
</head>
<body>
<div id="container">
  <?php
		include_once('header.php');
		?>
  <div id="top-panel">
    <div id="panel">
      <ul>
        <li></li>
      </ul>
    </div>
  </div>
  <div id="wrapper">
    <div id="content">
      <div id="box">
       
        <div id="box">
                	<h3 id="adduser">Edit CMS </h3>
					<?php
					$data_cms=mysql_fetch_array($rs_cms);
					
					?>
                    <form id="form" action="" method="post">
                      <fieldset id="personal">
                        <legend><?php echo $data_cms['cms_name']; ?> INFORMATION</legend>
                     
                        <input name="id" id="id" type="hidden" tabindex="1" value="<?php echo $data_cms['id']; ?>" />
                       
                        CMS Description  : 
						
                        <textarea name="cms_content" id="textarea" ><?php echo $data_cms['cms_content']; ?></textarea>
                        <br />
                       
                      </fieldset>
                      
                      
                      <div align="center">
                        <input name="submit" type="submit" id="button1" value="Submit" />
                        <input id="button2" type="reset" />
                      </div>
                    </form>

        </div>
      </div>
      <br />
    </div>
    <?php
			include_once('right.php');
			?>
  </div>
  <?php
		include_once('footer.php');
		?>
</div>
</body>
</html>
