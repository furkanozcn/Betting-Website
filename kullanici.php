﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Kullanıcı Paneli</title>
<link href="style.css" rel="stylesheet" type="text/css">
<p align="center"><img src="resim/header.png"></p>
<?php require("/db/ayar.php");
	$duyurular=mysql_query("select * from duyurular");
	$guncelle=mysql_fetch_array($duyurular);
	$uyeler=mysql_query("select * from uyeler");
	?>
</head>

<body>
<?php 
  if(mysql_num_rows($uyeler)!=0)
{	
	while($oku = mysql_fetch_assoc($uyeler))
    {	
	$id=$oku['id'];
	$kullanici=$oku['username'];
	$tel=$oku['tel'];
	}}
	?>
<div id="up">  
<nav>
<ul>
<li><a href="kullanici.php">Anasayfa</a></li>
<li><a href="#">Bahis Oyna</a></li>
<li><a href="#" style="width:126px">İşlemler</a>
<ul>
<li><a href="#">Maç Sonuçları</a></li>
<li><a href="#">Bahis Listesi</a></li>
<li><a href="#">Ödeme Dökümü</a></li>
<li><a href="#">Hesap Hareketleri</a></li>
<li><a href="/kullanici/hesabim.php">Hesabını Görüntüle</a></li>
</ul>
</li>
<li><a href="#">Destek</a></li>
<li><a href="index.php">Çıkış Yap</a></li>
</ul>
<table width="200" height="80" border="1" style="float:left" background="../resim/bilgi.jpg";>
  <tr>
    <th scope="row" ><?php 
	echo $kullanici;
				?>
	</th>
  </tr>
  <tr>
  <th scope="row"><?php session_start();
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
<div id="mid" align="center"><iframe id="inscore-xdc" src="http://www.livescore.in/tr/free/123534/" width="515" height="10005" frameborder="0" scrolling="no"></iframe></div>

<div id="under"><p class="renk">&copy; 2017 Albatr0s</p></div>


</body>

</html>
	