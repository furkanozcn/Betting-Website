﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Yönetici Paneli</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<p align="center"><img src="../resim/header.png"></p>
<?php require("../db/ayar.php");
	$duyurular=mysql_query("select * from duyurular");
	$guncelle=mysql_fetch_array($duyurular);

	?>
</head>

<body>
<div id="up">
<nav>
<ul>
<li><a href="yonetim.php">Anasayfa</a></li>
<li><a href="#">Kullanıcı İşlemleri</a>
<ul>
<li><a href="bakiyeayarlari.php">Bakiye Ayarları</a></li>
<li><a href="kullaniciayarlari.php">Kullanıcı Ayarları</a></li>
<li><a href="duyuruayarlari.php">Duyuru Ayarları</a></li>
<li><a href="kullanicilar.php" title="Kayıtlı Kullanıcı Listesi">Kullanıcılar</a></li>
<li><a href="#">Ödemeler</a></li>
</ul>
</li>
<li><a href="#" style="width:126px">Bahis İşlemleri</a>
<ul>
<li><a href="macayarlari.php">Maç Ayarları</a></li>
<li><a href="bahisayarlari.php">Bahis Ayarları</a></li>
<li><a href="canlimaclar.php" title="Bahise Açık Maçlar">Canlı Maçlar</a></li>
<li><a href="maclar.php" title="Tüm Maçlar">Maçlar</a></li>
<li><a href="bahisler.php" title="Oynanan Bahisler">Bahisler</a></li>
</ul>
</li>
<li><a href="#">Destek</a></li>
<li><a href="../index.php">Çıkış Yap</a></li>
</ul>
<table width="200" height="80" border="1" style="float:left" background="../resim/bilgi.jpg";>
  <tr>
    <th scope="row" ><?php session_start();
	echo $_SESSION["user"];
				?>
	</th>
  </tr>
  <tr>
  <th scope="row"><?php 
  echo $_SESSION["money"]; ?>
        TL</th>
  </tr>
</table>
<table width="580" height="80" border="5" style="float:right" class="tablo";>
  <tr>
    <th scope="row" ><script type="text/javascript">		
		var delay = 5000; //mesaj değişimi(milisaniye)
		var maxsteps=30; // renk değişim sayısı
		var stepdelay=40; // milisaniyede tek renk
		var startcolor= new Array(0,0,0); // başlangıç renkleri (kırmızı, yeşil, mavi)
		var endcolor=new Array(0,14,160); // bitiş renkleri (kırmızı, yeşil, mavi)
		
		var fcontent=new Array();
		begintag='<div>'; //yayın açılışı ve yayınlanacak duyurular
		fcontent[0]="<?php echo $guncelle['duyuru1'];?>";
		fcontent[1]="<?php echo $guncelle['duyuru2'];?>";
		fcontent[2]="<?php echo $guncelle['duyuru3'];?>";       fcontent[3]="<?php echo $guncelle['duyuru4'];?>";
		closetag='</div>';
		
		var fwidth='550px'; //yazı genişlik
		var fheight=''; //yazı boy
		
		var fadelinks=1;  //slide ve yazı ayarları	
		var ie4=document.all&&!document.getElementById;
		var DOM2=document.getElementById;
		var faderdelay=0;
		var index=0;
		
		

		function changecontent(){
		  if (index>=fcontent.length)
			index=0
		  if (DOM2){
			document.getElementById("fscroller").style.color="rgb("+startcolor[0]+", "+startcolor[1]+", "+startcolor[2]+")"
			document.getElementById("fscroller").innerHTML=begintag+fcontent[index]+closetag
			if (fadelinks)
			  linkcolorchange(1);
			colorfade(1, 15);
		  }
		  else if (ie4)
			document.all.fscroller.innerHTML=begintag+fcontent[index]+closetag;
		  index++
		}
		
		
		
		function linkcolorchange(step){
		  var obj=document.getElementById("fscroller").getElementsByTagName("A");
		  if (obj.length>0){
			for (i=0;i<obj.length;i++)
			  obj[i].style.color=getstepcolor(step);
		  }
		}
		
		
		var fadecounter;
		function colorfade(step) {
		  if(step<=maxsteps) {	
			document.getElementById("fscroller").style.color=getstepcolor(step);
			if (fadelinks)
			  linkcolorchange(step);
			step++;
			fadecounter=setTimeout("colorfade("+step+")",stepdelay);
		  }else{
			clearTimeout(fadecounter);
			document.getElementById("fscroller").style.color="rgb("+endcolor[0]+", "+endcolor[1]+", "+endcolor[2]+")";
			setTimeout("changecontent()", delay);
			
		  }   
		}
		
		
		function getstepcolor(step) {
		  var diff
		  var newcolor=new Array(3);
		  for(var i=0;i<3;i++) {
			diff = (startcolor[i]-endcolor[i]);
			if(diff > 0) {
			  newcolor[i] = startcolor[i]-(Math.round((diff/maxsteps))*step);
			} else {
			  newcolor[i] = startcolor[i]+(Math.round((Math.abs(diff)/maxsteps))*step);
			}
		  }
		  return ("rgb(" + newcolor[0] + ", " + newcolor[1] + ", " + newcolor[2] + ")");
		}
		
		if (ie4||DOM2)
		  document.write('<div id="fscroller" style="border:0px solid black;width:'+fwidth+';height:'+fheight+'"></div>');
		
		if (window.addEventListener)
		window.addEventListener("load", changecontent, false)
		else if (window.attachEvent)
		window.attachEvent("onload", changecontent)
		else if (document.getElementById)
		window.onload=changecontent
		
		</script>
	</th>
  </tr>
</table></nav></div>

<div id="mid">
<form method="post">
<table class="tablo" width="600" height="250" border="7" cellpadding="2">
<tr>
  <th colspan="7" scope="col">Bahis Başlat/Sonlandır</th>
</tr>
<tr>
  <td width="112" align="center">Maç Kodu:</td>
  <td width="326"><input  name="kod" pattern="\d{3}"   title="3 Haneli Bir Sayı Giriniz..!"required type="text">   <input type="submit" value="Sorgula"></td>
</tr>

<tr>
<td colspan="2"  align="center">
  <?php
if($_POST){
$kod=$_POST["kod"];	
$mackodu=mysql_query("select * from maclar WHERE mackodu like '%".$kod."%'");
$maclar = mysql_fetch_assoc($mackodu);
$sil=mysql_query('delete from maclar where mackodu=$kod');
if($kod==$maclar["mackodu"]){echo $maclar["ev"]; echo"-"; echo $maclar["misafir"];
echo "<tr><td colspan='2'  align='center'><a href='bahisbaslat.php'><input type='button' value='Bahis Başlat..!'></a><a href='bahisbitir.php'><input type='button' value='Bahis Sonlandır..!'></a></td></tr>";

}else{echo"Böyle Bir Maç Yok..!"; }
}
?>
</td>
</tr>
</table>

</form>
</div>

<div id="under"><p>&copy; 2017 Albatr0s</p></div>

</body>

</html>
	