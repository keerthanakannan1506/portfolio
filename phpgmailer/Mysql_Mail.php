<?php
$outputHtml = "";
$con=mysqli_connect("localhost","root","root","test");
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }     
$TodayDate=date('Y-m-d');

$outputHtml.="<p align='center'><b><font size='5' color='black'>Scadaa_Issue_Identfication</font></b></p>";
$outputHtml.="<table id='myTable' width='1200' border='2' cellpadding='1' cellspacing='1' align='center'>

<head>

</head>


<thead>
<th bgcolor='lightcoral' onclick='sortTable(0)'>ID</th>
<th bgcolor='lightcoral' onclick='sortTable(1)'>Source</th>
<th bgcolor='lightcoral' onclick='sortTable(2)'>Script_Version</th>
<th bgcolor='lightcoral' onclick='sortTable(4)'>Source_Type</th>
<th bgcolor='lightcoral' onclick='sortTable(3)'>Execution_type</th>
<th bgcolor='lightcoral' onclick='sortTable(4)'>Status</th>
<th bgcolor='lightcoral' onclick='sortTable(5)'>Mac_Execution_Type</th>
</thead>";

$sql1 = "select id,source,script_version,Source_type,execution_type,status,Mac_Execution_Type from scadaa_source_script_version";
$result1 = $con->query($sql1);

while ($row1 = $result1->fetch_assoc()) 
{
     	$outputHtml.= "<tr>";
		$outputHtml.= "<td bgcolor='cyan'><center>" . $row1['id']. "<br>";
		$outputHtml.= "<td bgcolor='cyan'><center>" . $row1['source']. "<br>";
		$outputHtml.= "<td bgcolor='cyan'><center>" . $row1['script_version']. "<br>";
		$outputHtml.= "<td bgcolor='cyan'><center>" . $row1['Source_type']. "<br>";
		$outputHtml.= "<td bgcolor='cyan'><center>" . $row1['execution_type']. "<br>";
		$outputHtml.= "<td bgcolor='cyan'><center>" . $row1['status']. "<br>";
		$outputHtml.= "<td bgcolor='cyan'><center>" . $row1['Mac_Execution_Type']. "<br>";
        
}

$outputHtml.= "</table>";

mysqli_close($con);  

require_once('phpgmailer/class.phpgmailer.php');
 $mail = new PHPGMailer();
 $mail->Username = 'saravanansr@sciera.com';
 $mail->Password = 'SARAvanan86#';
 $mail->From = 'saravanansr@sciera.com';
 $mail->FromName = 'Saravanan';
 $mail->Subject = 'Scadaa Script Version : '.$TodayDate;
 $mail->AddAddress('saravanansr@sciera.com');
 
 $mail->IsHTML(true);
 //$mail->setBodyHtml($Bodyname);     
 
  $full_content ='';
  $full_content .= "Hi,</br></br><h3><pre><center>  Hereby given the Scadaa Script Version. </center> </pre> ";
  $full_content .= "<h4><br><i><center>  SCADAA SCRIPT VERSION </center></br></br> $outputHtml  </br></br></br></br></h4></i>";
  
  
 $mail->Body = $full_content;
 $mail->Send(); 

?>