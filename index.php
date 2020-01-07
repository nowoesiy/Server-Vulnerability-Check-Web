<?php
    require_once("../htdocs/dbconfig.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="kr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.png" type="image/png">
    <link rel= "shortcut icon" href="favicon.png" type="image/png"/>

    <title>서버 취약성 체크 / 목록</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">

<style>
        body{
        font-family: 'Hanna', serif;
        }

         .navbar .nav > li >a:hover {
            color : #edecc9;
             background:rgba(210,105,30, 0); text-shadow:none;
        }
        .navbar .nav > li >a:focus {
            color : #edecc9;
             background:rgba(210,105,30, 0); text-shadow:none;
        }


        .navbar .nav > li > a {
            font-size : 1.5em;
            margin-left:50px;
            margin-right:20px;
            color : white;

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
    <nav class="navbar navbar-inverse" role="navigation" style="margin-top: -40px; ">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top: 20px">
                <ul class="nav navbar-nav navbar-left">
                    <li style="margin-left:100px">
                        <a class= "first" href="index.php" style=" margin-left:100px;" title="공지사항">파일 목록</a>
                    </li>
                    <li>
                        <a class= "first" href='tier.php/?id=<?php $id ?>' title="팀소개">검사결과/ 최근</a>
                    </li>                                  
                </ul>
            </div>
        </div>
    </nav>
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">파일 목록
                    <small>목록</small>
                </h1>
            </div>
        </div>
            <ul class="list-group">
                <?php
                    // 폴더명 지정
                    $dir = "/xampp/htdocs/result";
                    
                    // 핸들 획득
                    $handle  = opendir($dir);
                    
                    $files = array();
                    
                    // 디렉터리에 포함된 파일을 저장한다.
                    while (false !== ($filename = readdir($handle))) {
                        if($filename == "." || $filename == ".."){
                            continue;
                        }
                        
                        // 파일인 경우만 목록에 추가한다.
                        if(is_file($dir . "/" . $filename)){
                            $files[] = $filename;
                        }
                    }
                    
                    // 핸들 해제 
                    closedir($handle);
                    
                    // 정렬, 역순으로 정렬하려면 rsort 사용
                    sort($files);
                    $ips = array();
                    //파일명을 출력한다.
                    for ($f =0; $f<sizeof($files); $f++) {
                        $ip = "";
                        $com = ".";
                        //$f = str_replace("%","",$f);
                        $arr = explode(".", $files[$f]);

                        if(sizeof($arr) >= 5){
                        for($i=0; $i<4; $i++){
                            if($i==3){
                                $ip .= $arr[$i];
                            }else{
                                $ip .= $arr[$i].".";
                            }
                        }
                        }
                        //정상범위 이외의 IP 표시 제한
                        //크기 작은거 삭제
                        $ips[$f] = $ip;
                        
                        //echo "<li class=\"list-group-item\"><a href=\"test2.php?id=$id & file=$files[$f]\">".$files[$f]."</a></li>";
                    }

                    $i=0;
                    echo '<div class="panel-group" id="accordion">';
                    while($i<sizeof($ips)){
                        echo '<div class="panel panel-default">';
                            echo '<div class="panel-heading">';
                            echo '<h4 class="panel-title">';
                                echo "<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse$i\">";
                                echo $ips[$i].'</a>';
                            echo '</h4>';
                            echo '</div>';
                            echo "<div id=\"collapse$i\" class=\"panel-collapse collapse in\">";
                            echo '<div class="panel-body">';

                    do{

                        $ip = "";
                        $com = ".";
                        $arr = explode(".", $files[$i]);

                        $id = str_replace(".","",$files[$i]);
                        $id = str_replace("-","",$id);
                            echo "<li class=\"list-group-item\"><a href=\"parse.php?id=$id & file=$files[$i]\">".$files[$i]."</a></li>";
                        if($i == sizeof($ips)-1){
                            $i++;   
                            break;}
                    }while($ips[$i++]==$ips[$i]);

                            echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                
                    echo '</div>';
                ?>
                
            </ul>
        </div>
</body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>
