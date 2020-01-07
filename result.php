
<?php
require_once("../htdocs/dbconfig.php");
session_start();
$id = $_GET['id'];  


?>
<?php

$title = array("1.1 루트 계정 원격 액세스 제한",
"1.2 암호 복잡성 설정",
"1.3 암호 잠금 임계 값 설정",
"1.4 암호 파일 보호",
"1.5 루트를 제외하고 UID '0'금지",
"1.6 root 계정의 su 명령 제한",
"1.7 최소 암호 길이 설정",
"1.8 최대 암호 수명 설정",
"1.9 최소 암호 수명 설정",
"1.10 불필요한 발언권 제거",
"1.11 관리자 그룹의 최소 계정 수",
"1.12 GID 금지 조항 없음",
"1.13 동일 UID 금지",
"1.14 사용자 쉘 확인",
"1.15 세션 시간 초과 설정");

$title2 = array("2.1 루트 홈 및 경로 디렉토리 권한 및 경로 설정",
"2.2 파일과 디렉토리 소유자의 설정",
"2.3 / etc / passwd 파일 소유자 및 권한 설정",
"2.4 / etc / shadow 파일 소유자 및 권한 설정",
"2.5 / etc / hosts 파일 소유자 및 권한 설정",
"2.6 /etc/(x)inetd.conf 파일 소유자 및 권한 설정",
"2.7 /etc/syslog.conf 파일 소유자 및 권한 설정",
"2.8 / etc / services 파일 소유자 및 권한 설정",
"2.9 SUID, SGID, 스티키 비트 및 권한 설정",
"2.10 환경 파일 설정 및 권한 설정",
"2.11 세계 기록 가능한 파일의 검사",
"2.12 / dev에없는 장치 파일 검사",
"2.13 홈 / .rhosts 금지, hosts.equiv 사용",
"2.14 접근 IP 및 포트 제한",
"2.15 hosts.lpd 파일 소유자 및 권한 설정",
"2.16 NIS 서비스 비활성화",
"2.17 UMASK 설정 관리",
"2.18 홈 디렉토리 소유자 및 권한 설정",
"2.19 홈 디렉토리 존재 관리",
"2.20 숨겨진 파일 및 디렉토리 검색 및 제거");

$title3 = array("3.1 핑거 서비스 비활성화",
"3.2 익명 FTP 서비스 비활성화",
"3.3 r 명령 서비스 비활성화",
"3.4 cron 파일 소유자 및 권한 설정",
"3.5 DoS 공격에 취약한 서비스 비활성화",
"3.6 NFS 서비스 비활성화",
"3.7 NFS에 대한 액세스 제어",
"3.8 자동 설치 서비스 제거",
"3.9 RPC 서비스 점검",
"3.10 NIS 및 NIS + 서비스 점검",
"3.11 tftp 및 토크 서비스의 비활성화",
"3.12 센드 메일 버전 확인",
"3.13 스팸 메일 릴레이 Restrictino",
"3.14 일반 사용자에게 Sendmail 실행 블록",
"3.15 DNS 보안 버전 패치정",
"3.16 DNS 영역 전송 설정",
"3.17 Apache 디렉토리 목록 제거",
"3.18 아파치 웹 프로세스 권한 제한",
"3.19 아파치 상위 디렉토리 접근 금지",
"3.20 아파치 불필요한 파일 제거",
"3.21 아파치 링크 금지",
"3.22 Apache 파일 업로드 및 다운로드 제한",
"3.23 아파치 웹 서비스 도메인 분리",
"3.24 ssh 원격 액세스의 허가",
"3.25 FTP 서비스 점검",
"3.26 ftp 계정 쉘 제한",
"3.27 ftpusers 파일 소유자 및 권한 설정",
"3.28 ftpusers 파일의 설정",
"3.29 파일 소유자 및 권한 설정",
"3.30 SNMP 서비스 점검",
"3.31 SNMP 서비스의 커뮤니티 문자열 복잡성 설정",
"3.32 로그온에 대한 경고",
"3.33 NFS 설정 파일의 허가",
"3.34 expn, vrfy 명령에 대한 제한 사항",
"3.35 아파치 웹 서비스 정보의 은폐");

$title4 = array("4.1 최신 보안 패치 및 공급 업체 권장 사항 적용",
"5.1 정기적 인 로그 검사 및보고",
"5.2 정책기반의 시스템 로그 설정");

$pass_1 = 0;
$pass_2 = 0;
$pass_3 = 0;
$pass_4 = 0;
$warn_1 = 0;
$warn_2 = 0;
$warn_3 = 0;
$warn_4 = 0;
$danger_1 = 0;
$danger_2 = 0;
$danger_3 = 0;
$danger_4 = 0;
$pass = 0;
$warn = 0;
$danger = 0;
$all = 0;


$sql = 'select * from contents where id = "'.$id.'"';
$result = $db->query($sql);
while($row = $result->fetch_assoc())    
{
    for($i=1; $i<=15; $i++){
    if($row['_1'.$i] == '0'){
        $pass_1++;
    }
    elseif($row['_1'.$i] == '2'){
        $warn_1++;
    }
    else
    {
        $danger_1++;
    }
}
    for($i=1; $i<=20; $i++){
        if($row['_2'.$i] == '0'){
            $pass_2++;
        }
        else if($row['_2'.$i] == '2'){
            $warn_2++;
        }
        else
        {
            $danger_2++;
        }
    }
    for($i=1; $i<=35; $i++){
        if($row['_3'.$i] == '0'){
            $pass_3++;
        }
        else if($row['_3'.$i] == '2'){
            $warn_3++;
        }
        else
        {
            $danger_3++;
        }
    }                                    
    for($i=1; $i<=3; $i++){
        if($row['_4'.$i] == '0'){
            $pass_4++;
        }
        else if($row['_4'.$i] == '2'){
            $warn_4++;
        }
        else
        {
            $danger_4++;
        }                                
    }          
}
$pass = $pass_1+$pass_2+$pass_3+$pass_4;
$warn = $warn_1+$warn_2+$warn_3+$warn_4;
$danger = $danger_1+$danger_2+$danger_3+$danger_4;
?>
<!DOCTYPE html>
<html lang="kr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" href="favicon.png" type="image/png">
    <link rel= "shortcut icon" href="favicon.png" type="image/png"/>
    <title>서버 취약성 체크 / 검사결과</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style>
        /* @media only screen and (min-width:1440px){
       body{
        font-family: 'Hanna', serif;
        background-image: url('/image/banner.jpeg');
        background-repeat: no-repeat;
        background-size:100% auto;

        }

        #desktop {
        margin-top: 360px;
        }
        } */


         body{
        font-family: 'Hanna', serif;

        /* background-image: url('kback.jpg') center center;
        background-repeat: no-repeat;
        background-size: auto 500px;
        background-repeat : repeat-x; */
        }
        .navbar .nav > li > a {
            font-size : 1.5em;
            margin-left:50px;
            margin-right:20px;
            color : white;
        }
         .navbar .nav > li >a:hover {
            color : #edecc9;
             background:rgba(210,105,30, 0); text-shadow:none;
        }
        .navbar .nav > li >a:focus {
            color : #edecc9;
             background:rgba(210,105,30, 0); text-shadow:none;
        }
                }
        .navbar .nav li.dropdown > .dropdown-toggle .caret {
            color : #edecc9;
            background-color: none;
            text-shadow:none;
        }
        .table > tbody > tr:first-child > td {
            border: none;
        }

        .icon-bar {
        color: black;
        border-color: black;
        background-color: black;
        }
        .navbar-inverse{
        background-color: #000000;
        border-style: none;
        opacity: 0.8;
        padding-bottom: 22px;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation" style="margin-top: -40px; ">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top: 20px">
                <ul class="nav navbar-nav navbar-left">
                    <li style="margin-left:100px">
                        <a class= "first" href="index.php" style=" margin-left:100px;" title="공지사항">파일 목록</a>
                    </li>
                    <li>
                        <a class= "first" href="result.php" title="팀소개">검사결과/ 최근</a>
                    </li>                                  
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content -->
 
    <div class="container"  id="desktop">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">검사결과
                    <small>결과</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">파일목록</a>
                    </li>
                    <li class="active">검사결과</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <!-- Content Column -->
            <div class="col-md-12">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li class="active">
                    <a data-target="#english" role="tab" id="eng-tab" 
                    data-toggle="tab" aria-controls="english" aria-expanded="true"> 종합결과 </a>
                </li>
                <li>
                    <a data-target="#computer" role="tab" id="com-tab" 
                    data-toggle="tab" aria-controls="computer" aria-expanded="false">계정관리</a>
                </li>
                <li>
                    <a data-target="#korean" role="tab" id="kor-tab" 
                    data-toggle="tab" aria-controls="korean" aria-expanded="false">파일 및 디렉터리 관리</a>
                </li>
                <li>
                    <a data-target="#service" role="tab" id="kor-tab" 
                    data-toggle="tab" aria-controls="service" aria-expanded="false">서비스 관리 </a>
                </li>
                <li>
                    <a data-target="#log" role="tab" id="kor-tab" 
                    data-toggle="tab" aria-controls="log" aria-expanded="false">패치&로그 관리 </a>
                </li>
            </ul>

	<div id="myTabContent" class="tab-content">
		<div role="tabpanel" class="tab-pane fade active in" id="english" aria-labelledby="eng-tab">
            <div class="row">
                <div class="col-lg-4">
                <h2>시스템 취약점 수</h2>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="10"
                    aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $danger*10/7?>%">
                        <?php echo $danger ?>개
                    </div>
                    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="10"
                    aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $warn*10/7?>%">
                    <?php echo $warn ?>개
                    </div>
                </div>
                <h3>시스템 정보</h3>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">항목</th>
                        <th scope="col">내용</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">검사번호</th>
                        <td>
                        <?php
                            $sql = 'select * from info where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo $row['id'];
                            }                           
                        ?>
                        </td>
                        </tr>
                        <tr>
                        <tr>
                        <th scope="row">검사일자</th>
                        <td>
                        <?php
                            $sql = 'select * from info where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo $row['date'];
                            }                           
                        ?>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">inet address</th>
                        <td>
                        <?php
                            $sql = 'select * from info where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo $row['inetaddress'];
                            }                           
                        ?>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">Bcast</th>
                        <td>
                        <?php
                            $sql = 'select * from info where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo $row['bcast'];
                            }                           
                        ?>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">Mask</th>
                        <td>
                        <?php
                            $sql = 'select * from info where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo $row['mask'];
                            }                           
                        ?>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">Server OS</th>
                        <td>
                        <?php
                            $sql = 'select * from info where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo $row['server'];
                            }                           
                        ?>
                        </td>
                        </tr>
                        <tr>
                    </tbody>
                    </table>
                </div>
                <?php
                    $data = array(
                        array('항목', '취약점 수'),
                        array('계정관리', $danger_1 + $warn_1),
                        array('파일 및 디렉터리 관리', $danger_2 + $warn_2),
                        array('서비스관리', $danger_3 + $warn_3),
                        array('로그', $danger_4 + $warn_4),
                    );
                ?>
                    <script src="//www.google.com/jsapi"></script>
                        <script>
                        
                        var data = <?= json_encode($data) ?>;
                        var options = {
                        title: '',
                        width: 800, height: 500
                        };
                        google.load('visualization', '1.0', {'packages':['corechart']});
                        google.setOnLoadCallback(function() {
                        var chart = new google.visualization.PieChart(document.querySelector('#chart_div'));
                        chart.draw(google.visualization.arrayToDataTable(data), options);
                        });
                        </script>
                <h2 align="center">취약점 분포 그래프</h2>        
                <div class = "col-lg-8" id="chart_div"></div>
            </div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', '경고', '주의'],
          ['2018/9/3',  2,      5],
          ['2018/9/6',  3,      6],
          ['2018/9/19',  1,       1],
          ['2018/10/1',  2,      2]
        ]);

        var options = {
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <h2>취약점 갯수 추이</h2>
    <div id="curve_chart"></div>
    <h2 style="margin-top : 100px" class="text-danger bg-dark" >!취약 항목</h2>
    <h4 class="text-muted">[계정관리]</h4>
    <?php
        $sql = 'select * from contents where id = "'.$id.'"';
        $result = $db->query($sql);
        echo '<div class="panel-group" id="accordion">';
        while($row = $result->fetch_assoc())    
        {
            for($i=1; $i<=15; $i++){
            if($row['_1'.$i] == '1' || $row['_1'.$i] == '2'){
                
                echo '<div class="panel panel-';
                    if($row['_1'.$i] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_1'.$i] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                echo '">';
                    echo'<div class="panel-heading">';
                    echo'<h4 class="panel-title">';
                    echo'<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'">';
                    echo $title[$i-1];
                    echo'</a>';
                    echo'</h4>';
                    echo'</div>';
                    echo'<div id="collapse'.$i.'" class="panel-collapse collapse">';
                    echo'<div class="panel-body">';
                    $sql2 = 'select * from one where id = "'.$id.'"';
                    $result2 = $db->query($sql2);
                    while($row2 = $result2->fetch_assoc())    
                    {
                        echo nl2br($row2['_1'.$i]);
                    }  
                    echo'</div>';
                    echo'</div>';
                echo'</div>';
                
            }
        }
        echo'</div>';
    }
    ?>
    <h4 class="text-muted ">[파일 및 디렉터리 관리]</h4>
        <?php
        $sql = 'select * from contents where id = "'.$id.'"';
        $result = $db->query($sql);
        echo '<div class="panel-group" id="accordion">';
        while($row = $result->fetch_assoc())    
        {
            for($i=1; $i<=20; $i++){
            if($row['_2'.$i] == '1' || $row['_2'.$i] == '2'){
                
                echo '<div class="panel panel-';
                    if($row['_2'.$i] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_2'.$i] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                echo '">';
                    echo'<div class="panel-heading">';
                    echo'<h4 class="panel-title">';
                    echo'<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.($i+15).'">';
                    echo $title2[$i-1];
                    echo '</a>';
                    echo'</h4>';
                    echo'</div>';
                    echo'<div id="collapse'.($i+15).'" class="panel-collapse collapse">';
                    echo'<div class="panel-body">';
                    $sql2 = 'select * from two where id = "'.$id.'"';
                    $result2 = $db->query($sql2);
                    while($row2 = $result2->fetch_assoc())    
                    {
                        echo nl2br($row2['_2'.$i]);
                    }  
                    echo'</div>';
                    echo'</div>';
                echo'</div>';
                
            }
        }
        echo'</div>';
    }
    ?>
    <h4 class="text-muted">[서비스 관리]</h4>
        <?php
        $sql = 'select * from contents where id = "'.$id.'"';
        $result = $db->query($sql);
        echo '<div class="panel-group" id="accordion">';
        while($row = $result->fetch_assoc())    
        {
            for($i=1; $i<=35; $i++){
            if($row['_3'.$i] == '1' || $row['_3'.$i] == '2'){
                
                echo '<div class="panel panel-';
                    if($row['_3'.$i] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_3'.$i] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                echo '">';
                    echo'<div class="panel-heading">';
                    echo'<h4 class="panel-title">';
                    echo'<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.($i+35).'">';
                    echo $title3[$i-1];
                    echo'</a>';
                    echo'</h4>';
                    echo'</div>';
                    echo'<div id="collapse'.($i+35).'" class="panel-collapse collapse">';
                    echo'<div class="panel-body">';
                    $sql2 = 'select * from three where id = "'.$id.'"';
                    $result2 = $db->query($sql2);
                    while($row2 = $result2->fetch_assoc())    
                    {
                        echo nl2br($row2['_3'.$i]);
                    }  
                    echo'</div>';
                    echo'</div>';
                echo'</div>';

            }
        }
        echo'</div>';
    }
    ?>
    <h4 class="text-muted">[패치&로그 관리]</h4>
        <?php
        $sql = 'select * from contents where id = "'.$id.'"';
        $result = $db->query($sql);
        echo '<div class="panel-group" id="accordion">';
        while($row = $result->fetch_assoc())    
        {
            for($i=1; $i<=3; $i++){
            if($row['_4'.$i] == '1' || $row['_4'.$i] == '2'){
                
                echo '<div class="panel panel-';
                    if($row['_4'.$i] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_4'.$i] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                echo '">';
                    echo'<div class="panel-heading">';
                    echo'<h4 class="panel-title">';
                    echo'<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.($i+70).'">';
                    echo $title4[$i-1];
                    echo'</a>';
                    echo'</h4>';
                    echo'</div>';
                    echo'<div id="collapse'.($i+70).'" class="panel-collapse collapse">';
                    echo'<div class="panel-body">';
                    $sql2 = 'select * from remain where id = "'.$id.'"';
                    $result2 = $db->query($sql2);
                    while($row2 = $result2->fetch_assoc())    
                    {
                        echo nl2br($row2['_4'.$i]);
                    }  
                    echo'</div>';
                    echo'</div>';
                echo'</div>';
                
            }
        }
        echo'</div>';
    }
    ?>
    </div>
		<div role="tabpanel" class="tab-pane fade" id="computer" aria-labelledby="com-tab">
            <div class="panel-group" id="accordion">
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_11'] == '1'){
                        echo 'warning';
                    }
                    elseif($row['_11'] == '2'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                    <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        1.1 루트 계정 원격 액세스 제한</a>
                    </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                    </div>
                    </div>
                </div>
                <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_12'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_12'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                    <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        1.2 암호 복잡성 설정</a>
                    </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                    <?php
                                $sql = 'select * from one where id = "'.$id.'"';
                                $result = $db->query($sql);
                                while($row = $result->fetch_assoc())    
                                {
                                    echo nl2br($row['_12']);
                                }                           
                            ?>
                    </div>
                    </div>
                </div>
                <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_13'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_13'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    1.3 암호 잠금 임계 값 설정</a>
                </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from one where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_13']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_14'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_14'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                    1.4 암호 파일 보호</a>
                </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from one where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_14']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_15'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_15'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                    1.5 루트를 제외하고 UID '0'금지</a>
                </h4>
                </div>
                <div id="collapse5" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from one where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_15']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_16'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_16'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                    1.6 root 계정의 su 명령 제한</a>
                </h4>
                </div>
                <div id="collapse6" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from one where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_16']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_17'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_17'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                    1.7 최소 암호 길이 설정</a>
                </h4>
                </div>
                <div id="collapse7" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from one where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_17']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_18'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_18'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                    1.8 최대 암호 수명 설정</a>
                </h4>
                </div>
                <div id="collapse8" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from one where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_18']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_19'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_19'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">
                    1.9 최소 암호 수명 설정</a>
                </h4>
                </div>
                <div id="collapse9" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from one where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_19']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_110'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_110'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                    1.10 불필요한 발언권 제거</a>
                </h4>
                </div>
                <div id="collapse10" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from one where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_110']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_111'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_111'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">
                    1.11 관리자 그룹의 최소 계정 수</a>
                </h4>
                </div>
                <div id="collapse11" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from one where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_111']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_112'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_112'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse12">
                    1.12 GID 금지 조항 없음</a>
                </h4>
                </div>
                <div id="collapse12" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from one where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_112']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_113'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_113'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse13">
                    1.13 동일 UID 금지</a>
                </h4>
                </div>
                <div id="collapse13" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from one where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_113']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_114'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_114'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse14">
                    1.14 사용자 쉘 확인</a>
                </h4>
                </div>
                <div id="collapse14" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from one where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_114']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_115'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_115'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse15">
                    1.15 세션 시간 초과 설정</a>
                </h4>
                </div>
                <div id="collapse15" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from one where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_115']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            </div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="korean" aria-labelledby="kor-tab">
        <div class="panel-group" id="accordion">
        <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_21'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_21'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse16">
                    2.1 루트 홈 및 경로 디렉토리 권한 및 경로 설정</a>
                </h4>
                </div>
                <div id="collapse16" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_21']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_22'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_22'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse17">
                    2.2 파일과 디렉토리 소유자의 설정</a>
                </h4>
                </div>
                <div id="collapse17" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_22']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_23'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_23'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse18">
                    2.3 / etc / passwd 파일 소유자 및 권한 설정</a>
                </h4>
                </div>
                <div id="collapse18" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_23']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_24'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_24'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse19">
                    2.4 / etc / shadow 파일 소유자 및 권한 설정</a>
                </h4>
                </div>
                <div id="collapse19" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_24']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_25'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_25'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse20">
                    2.5 / etc / hosts 파일 소유자 및 권한 설정</a>
                </h4>
                </div>
                <div id="collapse20" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_25']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_26'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_26'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse21">
                    2.6 /etc/(x)inetd.conf 파일 소유자 및 권한 설정</a>
                </h4>
                </div>
                <div id="collapse21" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_26']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_27'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_27'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse22">
                    2.7 /etc/syslog.conf 파일 소유자 및 권한 설정</a>
                </h4>
                </div>
                <div id="collapse22" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_27']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_28'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_28'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse23">
                    2.8 / etc / services 파일 소유자 및 권한 설정</a>
                </h4>
                </div>
                <div id="collapse23" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_28']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_29'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_29'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse24">
                    2.9 SUID, SGID, 스티키 비트 및 권한 설정</a>
                </h4>
                </div>
                <div id="collapse24" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_29']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_210'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_210'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse25">
                    2.10 환경 파일 설정 및 권한 설정</a>
                </h4>
                </div>
                <div id="collapse25" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_210']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_211'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_211'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse26">
                    2.11 세계 기록 가능한 파일의 검사</a>
                </h4>
                </div>
                <div id="collapse26" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_211']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_212'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_212'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse27">
                    2.12 / dev에없는 장치 파일 검사</a>
                </h4>
                </div>
                <div id="collapse27" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_212']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_213'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_213'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse28">
                    2.13 홈 / .rhosts 금지, hosts.equiv 사용</a>
                </h4>
                </div>
                <div id="collapse28" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_213']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_214'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_214'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse29">
                    2.14 접근 IP 및 포트 제한</a>
                </h4>
                </div>
                <div id="collapse29" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_214']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_215'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_215'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse30">
                    2.15 hosts.lpd 파일 소유자 및 권한 설정</a>
                </h4>
                </div>
                <div id="collapse30" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_215']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_216'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_216'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse31">
                    2.16 NIS 서비스 비활성화</a>
                </h4>
                </div>
                <div id="collapse31" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_216']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_217'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_217'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse32">
                    2.17 UMASK 설정 관리</a>
                </h4>
                </div>
                <div id="collapse32" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_217']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_218'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_218'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse33">
                    2.18 홈 디렉토리 소유자 및 권한 설정</a>
                </h4>
                </div>
                <div id="collapse33" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_218']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_219'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_219'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse34">
                    2.19 홈 디렉토리 존재 관리</a>
                </h4>
                </div>
                <div id="collapse34" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_219']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_220'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_220'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse35">
                    2.20 숨겨진 파일 및 디렉토리 검색 및 제거</a>
                </h4>
                </div>
                <div id="collapse35" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from two where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_220']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            </div>
		</div>
        <div role="tabpanel" class="tab-pane fade" id="service" aria-labelledby="kor-tab">
        <div class="panel-group" id="accordion">
        <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_31'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_31'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse36">
                    3.1 핑거 서비스 비활성화</a>
                </h4>
                </div>
                <div id="collapse36" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_31']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_32'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_32'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse37">
                    3.2 익명 FTP 서비스 비활성화</a>
                </h4>
                </div>
                <div id="collapse37" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_32']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_33'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_33'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse38">
                    3.3 r 명령 서비스 비활성화</a>
                </h4>
                </div>
                <div id="collapse38" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_33']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_34'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_34'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse39">
                    3.4 cron 파일 소유자 및 권한 설정</a>
                </h4>
                </div>
                <div id="collapse39" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_34']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_35'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_35'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse40">
                    3.5 DoS 공격에 취약한 서비스 비활성화</a>
                </h4>
                </div>
                <div id="collapse40" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_35']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_36'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_36'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse41">
                    3.6 NFS 서비스 비활성화</a>
                </h4>
                </div>
                <div id="collapse41" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_36']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_37'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_37'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse42">
                    3.7 NFS에 대한 액세스 제어</a>
                </h4>
                </div>
                <div id="collapse42" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_37']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_38'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_38'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse43">
                    3.8 자동 설치 서비스 제거</a>
                </h4>
                </div>
                <div id="collapse43" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_38']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_39'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_39'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse44">
                    3.9 RPC 서비스 점검</a>
                </h4>
                </div>
                <div id="collapse44" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_39']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_310'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_310'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse45">
                    3.10 NIS 및 NIS + 서비스 점검</a>
                </h4>
                </div>
                <div id="collapse45" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_310']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_311'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_311'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse46">
                    3.11 tftp 및 토크 서비스의 비활성화</a>
                </h4>
                </div>
                <div id="collapse46" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_311']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_312'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_312'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse47">
                    3.12 센드 메일 버전 확인</a>
                </h4>
                </div>
                <div id="collapse47" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_312']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_313'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_313'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse48">
                    3.13 스팸 메일 릴레이 Restrictino</a>
                </h4>
                </div>
                <div id="collapse48" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_313']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_314'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_314'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse49">
                    3.14 일반 사용자에게 Sendmail 실행 블록</a>
                </h4>
                </div>
                <div id="collapse49" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_314']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_315'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_315'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse50">
                    3.15 DNS 보안 버전 패치정</a>
                </h4>
                </div>
                <div id="collapse50" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_315']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_316'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_316'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse51">
                    3.16 DNS 영역 전송 설정</a>
                </h4>
                </div>
                <div id="collapse51" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_316']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_317'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_317'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse52">
                    3.17 Apache 디렉토리 목록 제거</a>
                </h4>
                </div>
                <div id="collapse52" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_317']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_318'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_318'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse53">
                    3.18 아파치 웹 프로세스 권한 제한</a>
                </h4>
                </div>
                <div id="collapse53" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_318']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_319'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_319'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse54">
                    3.19 아파치 상위 디렉토리 접근 금지</a>
                </h4>
                </div>
                <div id="collapse54" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_319']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_320'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_320'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse55">
                    3.20 아파치 불필요한 파일 제거</a>
                </h4>
                </div>  
                <div id="collapse55" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_320']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_321'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_321'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse56">
                    3.21 아파치 링크 금지</a>
                </h4>
                </div>  
                <div id="collapse56" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_321']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_322'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_322'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse57">
                    3.22 Apache 파일 업로드 및 다운로드 제한</a>
                </h4>
                </div>  
                <div id="collapse57" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_322']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_323'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_323'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse58">
                    3.23 아파치 웹 서비스 도메인 분리</a>
                </h4>
                </div>  
                <div id="collapse58" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_323']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_324'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_324'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse59">
                    3.24 ssh 원격 액세스의 허가</a>
                </h4>
                </div>  
                <div id="collapse59" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_324']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_325'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_325'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse60">
                    3.25 FTP 서비스 점검</a>
                </h4>
                </div>  
                <div id="collapse60" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_325']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_326'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_326'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse61">
                    3.26 ftp 계정 쉘 제한</a>
                </h4>
                </div>  
                <div id="collapse61" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_326']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_327'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_327'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse62">
                    3.27 ftpusers 파일 소유자 및 권한 설정</a>
                </h4>
                </div>  
                <div id="collapse62" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_327']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_328'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_328'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse63">
                    3.28 ftpusers 파일의 설정</a>
                </h4>
                </div>  
                <div id="collapse63" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_328']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_329'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_329'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse64">
                    3.29 파일 소유자 및 권한 설정</a>
                </h4>
                </div>  
                <div id="collapse64" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_329']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_330'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_330'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse65">
                    3.30 SNMP 서비스 점검</a>
                </h4>
                </div>  
                <div id="collapse65" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_330']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_331'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_331'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse66">
                    3.31 SNMP 서비스의 커뮤니티 문자열 복잡성 설정</a>
                </h4>
                </div>  
                <div id="collapse66" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_331']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_332'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_332'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse67">
                    3.32 로그온에 대한 경고</a>
                </h4>
                </div>  
                <div id="collapse67" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_332']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_333'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_333'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse68">
                    3.33 NFS 설정 파일의 허가</a>
                </h4>
                </div>  
                <div id="collapse68" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_333']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_334'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_334'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse69">
                    3.34 expn, vrfy 명령에 대한 제한 사항</a>
                </h4>
                </div>  
                <div id="collapse69" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_334']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_335'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_335'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse70">
                    3.35 아파치 웹 서비스 정보의 은폐</a>
                </h4>
                </div>  
                <div id="collapse70" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from three where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_335']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
		</div>
	</div>
    <div role="tabpanel" class="tab-pane fade" id="log" aria-labelledby="com-tab">
        <div class="panel-group" id="accordion">
        <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_41'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_41'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse71">
                    4.1 최신 보안 패치 및 공급 업체 권장 사항 적용</a>
                </h4>
                </div>
                <div id="collapse71" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from remain where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_41']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_42'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_42'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse72">
                    5.1 정기적 인 로그 검사 및보고</a>
                </h4>
                </div>
                <div id="collapse72" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from remain where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_51']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
            <div class="panel panel-<?php 
                $sql = 'select * from contents where id = "'.$id.'"';
                $result = $db->query($sql);
                while($row = $result->fetch_assoc())    
                {
                    if($row['_43'] == '2'){
                        echo 'warning';
                    }
                    elseif($row['_43'] == '1'){
                        echo 'danger';
                    }
                    else
                    {
                        echo 'success';
                    }
                }
                ?>
                ">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse73">
                    5.2 정책기반의 시스템 로그 설정</a>
                </h4>
                </div>
                <div id="collapse73" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
                            $sql = 'select * from remain where id = "'.$id.'"';
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc())    
                            {
                                echo nl2br($row['_52']);
                            }                           
                        ?>
                </div>
                </div>
            </div>
    </div>
    </div>
        <!-- /.row -->  

        <hr>
        </div>
        <!-- Footer -->
    <div style="padding-top: 30px">
         <div class="navbar navbar-default navbar-bottom" style="background-color: #F5FFFA">
            <div class="container" style="padding-top :30px; padding-bottom: 10px">

            </div>
        </div>
    </div>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

</body>
</html>
