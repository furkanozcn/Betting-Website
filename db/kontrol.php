<?php 
 
include("ayar.php");
ob_start();
session_start();
 
$kadi = $_POST['kadi'];
$sifre = $_POST['sifre'];

$sql_check = mysql_query("select * from uyeler where username='".$kadi."' and password='".$sifre."'") or die(mysql_error());

 if(mysql_num_rows($sql_check)!=0)
{	 $_SESSION["user"] = $kadi;
     $_SESSION["sifre"] = $sifre;
    while($oku = mysql_fetch_object($sql_check))
    { $bakiye=$oku->bakiye;
       $yetki=$oku->yetki;
	   $user=$oku->username;
	   $pass=$oku->password;
	   echo $yetki;
	   $_SESSION["money"] = $bakiye;
	   
    }}if($kadi==$user && $sifre==$pass){
	if($yetki==1){header("Location:../yonetim/yonetim.php");}  
 if($yetki==0){header("Location:../kullanici.php");}
	
}else{ if($kadi=="" or $sifre=="") {
	
        echo "<center>Kullanici Adi/Sifre boş.<a href=javascript:history.back(-1)>Geri Don</a></center>";;
    }
    else {
        echo "<center>Kullanici Adi/Sifre Yanlis.<a href=javascript:history.back(-1)>Geri Don</a></center>";
    }}
ob_end_flush();
?>
   
