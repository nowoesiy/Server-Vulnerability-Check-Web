<?php
require_once './db.php';
require_once("../htdocs/dbconfig.php");
session_start();


if(isset($_GET['id']))
{
$id=$_GET['id'];
}
else
{
$id='123';
}
//Index페이지에서 ID 받기

echo $id;
$sql = 'select * from info where id = '.$id;
$result = $db->query($sql);
    if($result) echo "<script>location.replace('./result.php?id=$id');</script>"; 

//이전에 검사했으면, 이전 검사 페이지로 넘어가기.

$db = new DBC;
$db->DBI();



$file = $_GET['file'];
echo $_GET['file']."<br/>";;
echo $id. "<br/>";
echo $file;
$dir = 'result/';
$dir .= $file;

$handle = @fopen($dir, "r"); //읽기 모드로 text문서 열기
    if(!$handle) die("Not Found!");//실패시 경고문
        for ($i=0 ; !feof($handle) ; $i++) { //텍스트 문서에서 한줄한줄 읽어와 배열에 저장
        $buffer[$i] = fgets($handle, 1000);
        }

   $check = array("0. Basic information",
    "1.1 Restriction on root account remote access",
    "1.2 Setting of the password complexity",
    "1.3 Setting of the password locking threshold value",
    "1.4 Password file protection",
    "1.5 Prohibition of UID '0' except for root",
    "1.6 Restriction on su command of root account",
    "1.7 Settig of minimum password length",
    "1.8 Settig of maximum password lifetime",
    "1.9 Settig of minimum password lifetime",
    "1.10 Removal of unnecessary accunt",
    "1.11 Minimum number of accounts in administrator group",
    "1.12 Prohibition of GID not having accouont",
    "1.13 Prohibition of same UID",
    "1.14 Check of user shell",
    "1.15 Setting of session timeout",
    "2.1 Setting of the root home and path directory privilege and path",
    "2.2 Setting of the file and directory owner",
    "2.3 Setting of the /etc/passwd file owner and privilege",
    "2.4 Setting of the /etc/shadow file owner and privilege",
    "2.5 Setting of the /etc/hosts file owner and privilege",
    "2.6 Setting of the /etc/(x)inetd.conf file owner and privilege",
    "2.7 Setting of the /etc/syslog.conf file owner and privilege",
    "2.8 Setting of the /etc/services file owner and privilege",
    "2.9 Setting of the SUID, SGID, Sticky bit and privilege",
    "2.10 Setting of the environment files onwer and privilege",
    "2.11 Check of world writable files",
    "2.12 Check of device files not being in /dev",
    "2.13 Prohibition of \$Home/.rhosts, hosts.equiv use",
    "2.14 Restriction on access IP and port",
    "2.15 Setting of hosts.lpd file owner and permission",
    "2.16 Inactivation of NIS service",
    "2.17 UMASK setting management",
    "2.18 Setting of home directory owner and privilege",
    "2.19 Home directory existence management",
    "2.20 Search and removal of hidden file and directory",
    "3.1 Inactivation of Finger service",
    "3.2 Inactivation of Anonymous FTP service",
    "3.3 Inactivation of r command service",
    "3.4 Setting of the cron file owner and privilege",
    "3.5 Inactivation of vulnerable service to DoS attack",
    "3.6 Inactivation of NFS service",
    "3.7 Access control to NFS",
    "3.8 Removal of automounted service",
    "3.9 Check of RPC service",
    "3.10 Check of NIS and NIS+ service",
    "3.11 Inactivation of tftp and talk services",
    "3.12 Check of Sendmail version",
    "3.13 Restriction of Spam mail relay",
    "3.14 Sendmail execution block to general user",
    "3.15 DNS security version patch",
    "3.16 Setting of DNS Zone Transfer",
    "3.17 Removal of Apache directory listing",
    "3.18 Restriction on Apache web process privilege",
    "3.19 Prohibition of Apache upper directory access",
    "3.20 Removal of Apache unnecessary file",
    "3.21 Prohibition of Apache link",
    "3.22 Restriction on Apache file upload and dowload",
    "3.23 Separation of Apache web service domain",
    "3.24 Permission of ssh remote access",
    "3.25 Check of ftp service",
    "3.26 Restriction on shell of ftp account",
    "3.27 Setting of ftpusers file owner and privilege",
    "3.28 Setting of ftpusers file",
    "3.29 Setting of at file owner and privilege",
    "3.30 Check of SNMP service",
    "3.31 Setting of Community String complexity in SNMP service",
    "3.32 Alert on logon",
    "3.33 Permission of NFS configuration file",
    "3.34 Restriction on expn, vrfy commands",
    "3.35 Concealment of Apache web service information",
    "4.1 Application of latest security patch and vendor recommendation",
    "5.1 Regular log check and report",
    "5.2 Settig of system logging depending on policy"
);//73
   

   $content = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
   $default = "-----------";
   $i = 4;
    $code = array();
   for($j=0; $j<=sizeof($check)-1; $j++){
   if(!strcmp(trim($buffer[$i]), $check[$j])){
    while($i++){
        //$str1 = strcmp(trim($buffer[$i+1]), trim($default));
        //$strp = strpos(trim($buffer[$i+1]),$default);

        if(!strcmp(trim($buffer[$i-1]), $check[0]))
        {
            for($u = 0; $u < 10; $u++){
                $arr = explode(": ", $buffer[$u]);
                    if($arr[0] == "DATE")
                        $date = $arr[1];
                    if($arr[0] == "IP"){
                        $arr2 = explode(":", $arr[1]);
                        if($arr2[0] == "inet addr")
                                                
                        $arr4 = explode(" ", $arr2[1]);
                        $arr5 = explode(" ", $arr2[2]);
                        $arr6 = explode(" ", $arr2[3]);

                        $inetadress = $arr4[0];
                        $bcast = $arr5[0];
                        $mask = $arr6[0];
                    }
                    if($arr[0] == "Server"){
                        $arr3 = explode("#", $arr[1]);
                        $server = $arr3[0];
                    }
    
            }
            
            echo $date. "<br/>";
            echo $inetadress. "<br/>";
            echo $bcast. "<br/>";
            echo $mask. "<br/>";
            echo $server. "<br/>";
        }

        if(strpos($buffer[$i+1], $default) !== false){
        
            echo "하나끝 <br/>";
            $i=$i+2;
            break;
                
            }
            else{   
                //$content[$j] .= '\n\r';
                $arr1 = explode("||", $buffer[$i+1]);
                if($arr1[0] == 'State')
                $code[$j] = $arr1[1];

                $buffer[$i+1] = str_replace("\"","",$buffer[$i+1]);
                $buffer[$i+1] = str_replace("'","",$buffer[$i+1]);
                $buffer[$i+1] = str_replace("$","",$buffer[$i+1]);
                $buffer[$i+1] = str_replace("(","",$buffer[$i+1]);
                $buffer[$i+1] = str_replace(")","",$buffer[$i+1]);
                $buffer[$i+1] = str_replace(";","",$buffer[$i+1]);
                $buffer[$i+1] = str_replace("!","",$buffer[$i+1]);
                $buffer[$i+1] = str_replace(",","",$buffer[$i+1]);
                $buffer[$i+1] = str_replace("&&","",$buffer[$i+1]);
                $buffer[$i+1] = str_replace("umask","",$buffer[$i+1]);
                $content[$j] .= $buffer[$i+1] ;
                
                //echo $buffer[$i+1]."<br/>";
                //echo $test[1];
                //echo ($content[$j])."<br/>";

                
            }
            if(sizeof($buffer)-2 == $i)
            break;
        }
        
    }
    else
    {
        
    }
    
    //$db->query = "insert into test2 values ('".$id."','".$content[1]."')";
    //$db->DBQ();
}


// $db->query = "insert into test2 values ('".$id."','".$content[74]."')";
// $db->DBQ();
//10, 16,22,29, 37, 53, 72,73

//$db->query = "insert into contents values ('".$id."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."','".$content[0]."')";
//$db->DBQ();

$db->query = "insert into info values ('".$id."'
,'".$date."'
,'".$inetadress."'
,'".$bcast."'
,'".$mask."'
,'".$server."')";

$db->DBQ();

$db->query = "insert into one values ('".$id."'
,'".$content[1]."'  
,'".$content[2]."'
,'".$content[3]."'
,'".$content[4]."'
,'".$content[5]."'
,'".$content[6]."'
,'".$content[7]."'
,'".$content[8]."'
,'".$content[9]."'
,'".$content[10]."'
,'".$content[11]."'
,'".$content[12]."'
,'".$content[13]."'
,'".$content[14]."'
,'".$content[15]."')";
$db->DBQ();



// $db->query = "insert into test2 values ('".$id."'
// ,'".$content[16]."','".$content[17]."')";
// $db->DBQ();

$db->query = "insert into two values ('".$id."'
,'".$content[16]."'
,'".$content[17]."'
,'".$content[18]."'
,'".$content[19]."'
,'".$content[20]."'
,'".$content[21]."'
,'".$content[22]."'
,'".$content[23]."'
,'".$content[24]."'
,'".$content[25]."'
,'".$content[26]."'
,'".$content[27]."'
,'".$content[28]."'
,'".$content[29]."'
,'".$content[30]."'
,'".$content[31]."'
,'".$content[32]."'
,'".$content[33]."'
,'".$content[34]."' 
,'".$content[35]."')";
$db->DBQ();


$db->query = "insert into three values ('".$id."'
,'".$content[36]."'
,'".$content[37]."'
,'".$content[38]."'
,'".$content[39]."'
,'".$content[40]."'
,'".$content[41]."'
,'".$content[42]."'
,'".$content[43]."'
,'".$content[44]."'
,'".$content[45]."'
,'".$content[46]."'
,'".$content[47]."'
,'".$content[48]."'
,'".$content[49]."'
,'".$content[50]."'
,'".$content[51]."'
,'".$content[52]."'
,'".$content[53]."'
,'".$content[54]."'
,'".$content[55]."'
,'".$content[56]."'
,'".$content[57]."'
,'".$content[58]."'
,'".$content[59]."'
,'".$content[60]."'
,'".$content[61]."'
,'".$content[62]."'
,'".$content[63]."' 
,'".$content[64]."'
,'".$content[65]."'
,'".$content[66]."'
,'".$content[67]."'
,'".$content[68]."'
,'".$content[69]."' 
,'".$content[70]."')";
$db->DBQ();
//3.2 17 18 19 20 21 23

$db->query = "insert into remain values ('".$id."'
,'".$content[71]."'
,'".$content[72]."'
,'".$content[73]."')";
$db->DBQ();

$db->query = "insert into contents values ('".$id."'
,'".$code[0]."'
,'".$code[1]."'
,'".$code[2]."'
,'".$code[3]."'
,'".$code[4]."'
,'".$code[5]."'
,'".$code[6]."'
,'".$code[7]."'
,'".$code[8]."'
,'".$code[9]."'
,'".$code[10]."'
,'".$code[11]."'
,'".$code[12]."'
,'".$code[13]."'
,'".$code[14]."'
,'".$code[15]."'
,'".$code[16]."'
,'".$code[17]."'
,'".$code[18]."'
,'".$code[19]."'
,'".$code[20]."'
,'".$code[21]."'
,'".$code[22]."'
,'".$code[23]."'
,'".$code[24]."'
,'".$code[25]."'
,'".$code[26]."'
,'".$code[27]."'
,'".$code[28]."'
,'".$code[29]."'
,'".$code[30]."'
,'".$code[31]."'
,'".$code[32]."'
,'".$code[33]."'
,'".$code[34]."'
,'".$code[35]."'
,'".$code[36]."'
,'".$code[37]."'
,'".$code[38]."'
,'".$code[39]."'
,'".$code[40]."'
,'".$code[41]."'
,'".$code[42]."'
,'".$code[43]."'
,'".$code[44]."'
,'".$code[45]."'
,'".$code[46]."'
,'".$code[47]."'
,'".$code[48]."'
,'".$code[49]."'
,'".$code[50]."'
,'".$code[51]."'
,'".$code[52]."'
,'".$code[53]."'
,'".$code[54]."'
,'".$code[55]."'
,'".$code[56]."'
,'".$code[57]."'
,'".$code[58]."'
,'".$code[59]."'
,'".$code[60]."'
,'".$code[61]."'
,'".$code[62]."'
,'".$code[63]."' 
,'".$code[64]."'
,'".$code[65]."'
,'".$code[66]."'
,'".$code[67]."'
,'".$code[68]."'
,'".$code[69]."' 
,'".$code[70]."'
,'".$code[71]."'
,'".$code[72]."'
,'".$code[73]."')";

$db->DBQ();
// $db->query = "insert into mm values ('".$id."'
// ,'".$content[0]."'
// ,'".$content[1]."'
// ,'".$content[2]."'
// ,'".$content[3]."'
// ,'".$content[4]."'
// ,'".$content[5]."'
// ,'".$content[6]."'
// ,'".$content[7]."'
// ,'".$content[8]."'
// ,'".$content[9]."'
// ,'".$content[11]."'
// ,'".$content[11]."'
// ,'".$content[12]."'
// ,'".$content[13]."'
// ,'".$content[14]."'
// ,'".$content[15]."'
// ,'".$content[15]."'
// ,'".$content[17]."'
// ,'".$content[17]."'
// ,'".$content[18]."'
// ,'".$content[19]."'
// ,'".$content[20]."'
// ,'".$content[20]."'
// ,'".$content[21]."'
// ,'".$content[23]."'
// ,'".$content[23]."'
// ,'".$content[23]."'
// ,'".$content[23]."'
// ,'".$content[23]."'
// ,'".$content[23]."'
// ,'".$content[23]."'
// ,'".$content[23]."'
// ,'".$content[23]."'
// ,'".$content[23]."'
// ,'".$content[23]."'
// ,'".$content[38]."'
// ,'".$content[38]."'
// ,'".$content[38]."')";
// $db->DBQ();

// $db->query = "insert into contents values ('".$id."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."'
// ,'".$content[0]."')";



echo nl2br($content[7]);
echo $code[73];
if(!$db->result)
{
	header("Content-Type: text/html; charset=UTF-8");
	echo "<script>alert('오류');</script>";
	$db->DBO();
	exit;
	
} else
{
	echo "<script>location.replace('./tier.php?id=$id');</script>";
	$db->DBO();
	exit;
}

//    if($str){//일치 x // 1번
        
//    }
//    else{
//     $i = 3;
//        while($i++){
//         $str1 =  strcmp(trim($buffer[$i]), trim($default));
//         if($str1){
//                 echo $buffer[$i]."<br/>";
//             }
//             else{
//                 $i=$i+2;
//                 break;
//             }
//         }
//    }

//    if($str2){//일치 x // 1번
        
//    }
//    else{
//     $i = 21;
//        while($i++){
//         $str1 =  strcmp(trim($buffer[$i]), trim($default));
//         if($str1){
//                 echo $buffer[$i]."<br/>";
//             }
//             else{
//                 $i=$i+2;
//                 break;
//             }
//         }
//    }

//    if($str3){//일치 x // 1번
        
//    }
//    else{
//     $i = 57;
//        while($i++){
//         $str1 =  strcmp(trim($buffer[$i]), trim($default));
//         if($str1){
//                 echo $buffer[$i]."<br/>";
//             }
//             else{
//                 $i=$i+2;
//                 break;
//             }
//         }
//    }

?>