<?php 
date_default_timezone_set("Asia/Taipei");

// for logging exec info into Log.txt
function DebugLog( $text)
{
$myFile = "Log.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = $text."\n";
fwrite($fh, $stringData);

//$stringData = "New Stuff 2\n";
//fwrite($fh, $stringData);
fclose($fh);
}

?>


<?php 
include_once '../../CommandCenter/Common/MySQL_ST.php';  
// TODO: check if the session vaild  
// TODO: 
  
$t=time();
$timestamp=date("Y-m-d H:i:s",$t);
DebugLog("-----".$timestamp."-------");

@$sessionid=$_GET['sessionid']; 
@$teamid=$_GET['teamid'];
@$img1=$_GET['img1'];
@$img2=$_GET['img2'];
@$pos1x=$_GET['pos1x'];
@$pos1y=$_GET['pos1y'];
@$pos2x=$_GET['pos2x'];
@$pos2y=$_GET['pos2y'];

@$yaw01=$_GET['yaw01']; 
@$pitch01=$_GET['pitch01']; 
@$roll01=$_GET['roll01']; 
@$yaw02=$_GET['yaw02']; 
@$pitch02=$_GET['pitch02']; 
@$roll02=$_GET['roll02'];
@$IsiPhone4=$_GET['IsiPhone4s'];

@$lat_01=$_GET['lat_01'];
@$long_01=$_GET['long_01'];
@$lat_02=$_GET['lat_02'];
@$long_02=$_GET['long_02'];
@$degree=$_GET['degree'];
@$gps=$_GET['gps'];


//print_r($_GET);
//echo "\n".$sessionid."\n".$teamid.",\n".$img1.",\n".$img2.",\n".$pos1x.",\n".$pos1y.",\n".$pos2x.",\n".$pos2y.";\n".$yaw01.";\n".$pitch01.";\n".$roll01.";\n".$yaw02.";\n".$pitch02.";\n".$roll02.";\n".$roll02.";\n".$IsiPhone4.";\n";
//return;

//$strExec="StereoGauge.exe ../uploads/".$img1." ../uploads/".$img2." ".$pos1x." ".$pos1y." ".$pos2x." ".$pos2y;
$strExec="StereoGauge.exe ../uploads/".$img1." ../uploads/".$img2." ".$pos1x." ".$pos1y." ".$pos2x." ".$pos2y." ".$yaw01." ".$pitch01." ".$roll01." ".$yaw02." ".$pitch02." ".$roll02." ".$IsiPhone4;
DebugLog($strExec);


//get the file pathes
$return="-1";

//unset($paramArray);
//exec('stereogauge.exe',$paramArray,$return);
//echo $strExec." <br>";	
	
//$ret = exec('stereogauge.exe IMG_0062_G.JPG IMG_0063_G.JPG 89.8 99.8 220.5 180.3',$return);  // for test
$ret = 	exec($strExec,$return);	
$retsults = $return[0];

	
/*write the result into RangeFinder Table*/	
$distance_L=33;
$distance_R=34;
$ErrorValue=0.05;
$distanceResult =$distance_L; 
$timestamp=1334554;


$dbObj = new MySQLWrapper;
$sql='INSERT INTO `cc_rangefinder` ( `sessionid`, `teamid`, `distance_L`, `distance_R`, `ErrorValue`, `distanceResult`, `image_Left`, `image_Right`, `timestamp`, `yaw01`, `pitch01`, `roll01`, `yaw02`, `pitch02`, `roll02`, `lat_01`, `long_01`, `lat_02`, `long_02`, `degree`, `gps`) VALUES
('.$sessionid.',"'.$teamid.'",'.$distance_L.','.$distance_R.','.$ErrorValue.','.$distanceResult.',"'.$img1.'","'.$img2.'","'.$timestamp.'",'.$yaw01.','.$pitch01.','.$roll01.','.$yaw02.','.$pitch02.','.$roll02
.','.$lat_01.','.$long_01.','.$lat_02.','.$long_02.','.$degree.',"'.$gps.'")';

 
echo "SQL String=  ".$sql."\n";

	
$result = $dbObj->QueryCommand($sql );
$Count_BlueForce = $dbObj->GetRowCount($result);	
echo "count =".$Count_BlueForce."   ";



	
echo $retsults;
	//exec('echo $retsults>> test.txt');	
?>