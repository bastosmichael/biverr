<?php
function reDirect($url){
header("Location: ".$url);
//echo "redirect is being called";
//exit;
}
function goToUrl($url){
echo "<script>parent.location.href='$url'</script>";
exit;}
function pre($data){
	echo '<pre>';print_r($data);}
function dataPrepare($string){
if(is_string($string))
{
return addslashes(stripslashes(trim($string)));
}}
function showDate($date){
	$dt1=explode(" ",$date);
	if(count($dt1)>0)
	{
		$dt=explode("-",$dt1[0]);	
	}
	else
	{
		$dt=explode("-",$date);
	}
	return(date("F j, Y", mktime(0, 0, 0, $dt[1], $dt[2], $dt[0])));}
	
	function shortDescription($descr,$noc){
$sdescr=strip_tags($descr);
if(empty($noc))$noc=200;
if(trim($sdescr)<>''){
if(strlen($sdescr)>$noc)
return substr($sdescr, 0, $noc).".....";
else
return $sdescr;
}
else
return $sdescr;}
function fileUpload($fileName,$oldfileName,$fileSize,$fileTempName,$folderPath,$maxSize=5242880){
	if($fileName!=''){
$imginfo = pathinfo($fileName);
	$fileExt=$imginfo["extension"];

			if($fileExt=='jpeg' || $fileExt=='jpg' || $fileExt=='pdf' || $fileExt=='doc' || $fileExt=='txt' || $fileExt=='ppt' || $fileExt=='zip' || $fileExt=='rar'){
				$filename_upld=date("ymdhi").$fileName;
				if($fileSize<$maxSize){
					$newFilePath =  $folderPath."/".$filename_upld;
					
					if(move_uploaded_file($fileTempName, $newFilePath)){
						$msg="";
					}
				}else{
					$msg="Maximum File File Size 5 MB";
				}
			}else{
				$msg="Please Upload xls or psd or pdf or doc or txt or ppt or zip or rar format of the File";
			}
	}else{
		if($oldfileName!=''){
			$filename_upld=$oldfileName;
		}else{
			$filename_upld='noimage.jpg';
		}
	}
	$result=array($msg,$filename_upld);
return $result;}
?>
