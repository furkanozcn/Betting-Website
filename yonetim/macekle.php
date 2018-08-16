<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Yönetici Paneli</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<p align="center"><img src="../resim/header.png"></p>
<?php require("../db/ayar.php");
	$duyurular=mysql_query("select * from duyurular");
	$guncelle=mysql_fetch_array($duyurular);
	$match=mysql_query("select * from maclar");
	$duzelt=mysql_fetch_assoc($match);
	?>
    <style>
	form label { float:left; width: 200px; }
#mid form .kayit tr td fieldset table tr th {
	text-align: center;
}
    </style>
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
<table class="tablo" width="728" height="182" border="7" cellpadding="2" bordercolor="">
<tr>
  <th height="35" colspan="4" scope="col" align="center">Maç Ekle</th>
  </tr>
<tr>
  <td width="151" align="center">Maç Kodu :</td>
  <td width="160" height="49" align="left"><input name="kod" type="text" required pattern="\d{3}" title="3 Haneli Bir Sayı Giriniz..!" value="<?php echo $_SESSION["kod"]; ?>" size="3" readonly></td>
  <td align="center">Maç Tarih-Saat :</td>
  <td align="left"><input  type="datetime-local" name="zaman" required size="10"></td>
</tr>
<tr>
  <td height="62" align="center">Ev Sahibi Takım : </td>
  <td align="left"><input name="ev" type="text" required size="10"></td>
  <td width="177" align="center">Deplasman Takım :</td>
  <td width="238" align="left"><input name="misafir" type="text" required size="10"></td>
</tr>

</table>
<table class="kayit" width="728" height="177" border="7" cellpadding="2">
  <td height="159" colspan="2" align="center"><fieldset><legend>Maç Sonucu</legend>

         <table width="265" border="0">
           <tr>
             <th style="float:right" scope="row"><p>Ev Sahibi :</p>
               <p>&nbsp;</p></th>
             <th width="120" scope="row"><p>
               <input type="text" name="evsonc" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
           </tr>
           <tr>
             <th scope="row" style="float:right"><p>Beraberlik :</p>
               <p>&nbsp;</p></th>
             <th scope="row"><p>
               <input type="text" name="berabersonc" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
           </tr>
           <tr>
             <th scope="row" style="float:right"><p>Deplasman :</p>
               <p>&nbsp;</p></th>
             <th scope="row"><p>
               <input type="text" name="misafirsonc" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
           </tr>
         </table>
  </fieldset></td>
  <td height="159" colspan="2" align="center"><fieldset><legend>Handicap</legend>
  <table width="265" border="0">
  <tr>
    <th style="float:right" scope="row"><p>Ev Sahibi :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="evhandi" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>Beraberlik :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="beraberhandi" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>Deplasman :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="deplasmanhandi" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
</table>
  </fieldset></td>
  </tr>
   <tr>
    <td height="159" colspan="2" align="center"><fieldset><legend>İlk Yarı Sonucu (D)</legend>
 <table width="265" border="0">
  <tr>
    <th style="float:right" scope="row"><p>Ev Sahibi :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="evilk" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>Beraberlik :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="beraberilk" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>Deplasman :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="deplasmanilk" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
</table>   
    
    
    </fieldset><p>&nbsp;</p><fieldset><legend>Çifte Şans (C)</legend>
 <table width="265" border="0">
  <tr>
    <th style="float:right" scope="row"><p>1/0 :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="evcift" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>1/2 :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="berabercift" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>0/2 :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="deplasmancift" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
</table>   
    
    
    </fieldset></td>
    <td height="159" colspan="2" align="center"><fieldset><legend>Beraberlikte İade (G)</legend>
 <table width="265" border="0">
  <tr>
    <th style="float:right" scope="row"><p>Ev Sahibi(+1) :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="ev1" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right">Deplasman(+1) :</th>
    <th scope="row"><input type="text" name="dep1" size="5" style="float:left;" ></th>
  </tr>
  <tr>
    <th height="28" style="float:right" scope="row">&nbsp;</th>
    <th scope="row">&nbsp;</th>
  </tr>
  <tr>
    <th style="float:right" scope="row"><p>Ev Sahibi(+2) :</p>
      <p>&nbsp;</p></th>
    <th scope="row"><p>
      <input type="text" name="ev2" size="5" style="float:left;" >
    </p>
      <p>&nbsp;</p>
      <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>Deplasman(+2) :</p>
      <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
      <input type="text" name="dep2" size="5" style="float:left;" >
      </p>
      <p>&nbsp;</p>
      <p>&nbsp; </p></th>
  </tr>
  
</table>   
    
    
    </fieldset></td>
  </tr>
  <tr>
     <td height="159" colspan="2" align="center"><fieldset><legend>Gol Sayısı (Tek - Çift) (B)</legend>
     <table width="265" border="0">
  <tr>
    <th style="float:right" scope="row"><p>Tek :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="tek" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>Çift :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="cift" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
</table>   </fieldset></td>
     <td height="159" colspan="2" align="center"><fieldset><legend>Hangi Yarı Çok Gol Olur ? (A)</legend>
     <table width="265" border="0">
  <tr>
    <th style="float:right" scope="row"><p>İlk Yarı :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="ilkyari" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>Gol Yok :</p>
               <p>&nbsp;</p></th>
     <th width="120" scope="row"><p>
               <input type="text" name="golyok" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>İkinci Yarı :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="ikinciyari" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
</table>   </fieldset></td>
   </tr>
      <tr>
     <td height="159" colspan="2" align="center"><fieldset><legend>İlk Golü Hangi Takım Atar?</legend>
     <table width="265" border="0">
  <tr>
    <th style="float:right" scope="row"><p>Ev Sahibi :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="evilkgol" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>Gol Yok :</p>
               <p>&nbsp;</p></th>
     <th width="120" scope="row"><p>
               <input type="text" name="nogol" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>Deplasman :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="depilkgol" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
</table>   </fieldset></td>
     <td height="159" colspan="2" align="center"><fieldset><legend>Kim Daha Fazla Korner Kullanır ?</legend>
     <table width="265" border="0">
  <tr>
    <th style="float:right" scope="row"><p>Ev Sahibi :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="evkorner" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>Deplasman :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="depkorner" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
</table>   </fieldset></td>
<tr>
        <td height="78" colspan="2" align="center"><fieldset><legend>Kim Tur Atlar ?</legend>
     <table width="265" border="0">
  <tr>
    <th style="float:right" scope="row"><p>Ev Sahibi :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="evtur" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>Deplasman :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="deptur" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
</table>   </fieldset><p>&nbsp;</p>

        <td height="159" colspan="2" rowspan="2" align="center"><fieldset><legend>Maç Sonucu (S)</legend>
            <table width="300" height="508" border="0">
              <tr>
                <th>1/0</th>
                <th>2/0</th>
                <th>2/1</th>
              </tr>
              <tr>
                <th scope="row" ><input type="text" name="10" size="5" ></th>
                <th><input type="text" name="20" size="5" ></th>
                <th><input type="text" name="21" size="5"></th>
              </tr>
              <tr>
                <th scope="row">3/0</th>
                <th>3/1</th>
                <th>3/2</th>
              </tr>
              <tr>
                <th scope="row"><input type="text" name="30" size="5" ></th>
                <th><input type="text" name="31" size="5" ></th>
                <th><input type="text" name="32" size="5" ></th>
              </tr>
              <tr>
                <th scope="row">4/0</th>
                <th>4/1</th>
                <th>4/2</th>
              </tr>
              <tr>
                <th scope="row"><input type="text" name="40" size="5" ></th>
                <th><input type="text" name="41" size="5" ></th>
                <th><input type="text" name="42" size="5" ></th>
              </tr>
              <tr>
                <th scope="row">5/0</th>
                <th>0/0</th>
                <th>1/1</th>
              </tr>
              <tr>
                <th scope="row"><input type="text" name="50" size="5" ></th>
                <th><input type="text" name="00" size="5" ></th>
                <th><input type="text" name="11" size="5" ></th>
              </tr>
              <tr>
                <th scope="row">2/2</th>
                <th>3/3</th>
                <th>4/4</th>
              </tr>
              <tr>
                <th scope="row"><input type="text" name="22" size="5" ></th>
                <th><input type="text" name="33" size="5" ></th>
                <th><input type="text" name="44" size="5" ></th>
              </tr>
              <tr>
                <th scope="row">0/1</th>
                <th>0/2</th>
                <th>0/3</th>
              </tr>
              <tr>
                <th scope="row"><input type="text" name="01" size="5" ></th>
                <th><input type="text" name="02" size="5" ></th>
                <th><input type="text" name="03" size="5" ></th>
              </tr>
              <tr>
                <th scope="row">0/4</th>
                <th>0/5</th>
                <th>1/2</th>
              </tr>
              <tr>
                <th scope="row"><input type="text" name="04" size="5" ></th>
                <th><input type="text" name="05" size="5" ></th>
                <th><input type="text" name="12" size="5" ></th>
              </tr>
              <tr>
                <th scope="row">1/3</th>
                <th>1/4</th>
                <th>1/5</th>
              </tr>
              <tr>
                <th scope="row"><input type="text" name="13" size="5" ></th>
                <th><input type="text" name="14" size="5" ></th>
                <th><input type="text" name="15" size="5" ></th>
              </tr>
              <tr>
                <th scope="row">2/3</th>
                <th>2/4</th>
                <th>2/5</th>
              </tr>
              <tr>
                <th scope="row"><p>
                  <input type="text" name="23" size="5" >
                </p>
                <p>&nbsp; </p></th>
                <th><p>
                  <input type="text" name="24" size="5" >
                </p>
                <p>&nbsp; </p></th>
                <th><p>
                  <input type="text" name="25" size="5" >
                </p>
                <p>&nbsp; </p></th>
              </tr>
            </table>
        </fieldset><p>&nbsp; </p><fieldset><legend>Toplam Gol Aralığı (TB)</legend>
     <table width="265" border="0">
  <tr>
    <th style="float:right" scope="row"><p>0 ila 1 Arası :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="aralik1" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>2 veya 3 Arası :</p>
               <p>&nbsp;</p></th>
     <th width="120" scope="row"><p>
               <input type="text" name="aralik2" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
  <tr>
    <th scope="row" style="float:right"><p>4 ve Üzeri :</p>
               <p>&nbsp;</p></th>
    <th width="120" scope="row"><p>
               <input type="text" name="aralik3" size="5" style="float:left;" >
             </p>
               <p>&nbsp;</p>
               <p>&nbsp; </p></th>
  </tr>
</table>   </fieldset><p>&nbsp; </p><p>&nbsp; </p><p>&nbsp; </p><p>&nbsp; </p></td>
      </tr>
<tr>
  <td height="79" colspan="2" align="center"><fieldset><legend>İlk Yarı / Maç Sonucu (Home - Away - Draw)</legend>
            <table width="300" height="189" border="0">
              <tr>
                <th>1/0</th>
                <th>1/2</th>
                <th>1/1</th>
              </tr>
              <tr>
                <th scope="row" ><input type="text" name="sonucaralik1" size="5" ></th>
                <th><input type="text" name="sonucaralik2" size="5" ></th>
                <th><input type="text" name="sonucaralik3" size="5"></th>
              </tr>
              <tr>
                <th scope="row">0/0</th>
                <th>0/2</th>
                <th>0/1</th>
              </tr>
              <tr>
                <th scope="row"><input type="text" name="sonucaralik4" size="5" ></th>
                <th><input type="text" name="sonucaralik5" size="5" ></th>
                <th><input type="text" name="sonucaralik6" size="5" ></th>
              </tr>
              <tr>
                <th scope="row">2/0</th>
                <th>2/2</th>
                <th>2/1</th>
              </tr>
              <tr>
                <th scope="row"><input type="text" name="sonucaralik7" size="5" ></th>
                <th><input type="text" name="sonucaralik8" size="5" ></th>
                <th><input type="text" name="sonucaralik9" size="5" ></th>
              </tr>
            </table>
        </fieldset><p>&nbsp;</p><fieldset><legend>Alt Üst (T)</legend>
            <table width="300" height="367" border="0">
              <tr>
                <th><strong>Alt (1,5) :</strong></th>
                <th><input type="text" name="altbir" size="5" ></th>
              </tr>
              <tr>
                <th scope="row" ><strong>Üst (1,5) :</strong></th>
                <th><input type="text" name="ustbir" size="5" ></th>
              </tr>
              <tr>
                <th scope="row">&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
              <tr>
                <th scope="row"><strong>Alt (2,5) :</strong></th>
                <th><input type="text" name="altiki" size="5" ></th>
              </tr>
              <tr>
                <th scope="row"><strong>Üst (2,5) :</strong></th>
                <th><input type="text" name="ustiki" size="5" ></th>
              </tr>
              <tr>
                <th scope="row">&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
              <tr>
                <th scope="row"><strong>Alt (3,5) :</strong></th>
                <th><input type="text" name="altuc" size="5" ></th>
              </tr>
              <tr>
                <th scope="row"><strong>Üst (3,5) :</strong></th>
                <th><input type="text" name="ustuc" size="5" ></th>
              </tr>
              <tr>
                <th scope="row">&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
              <tr>
                <th scope="row"><strong>Alt (4,5) :</strong></th>
                <th><input type="text" name="altdort" size="5" ></th>
              </tr>
              <tr>
                <th scope="row"><strong>Üst (4,5) :</strong></th>
                <th><input type="text" name="ustdort" size="5" ></th>
              </tr>
              <tr>
                <th scope="row">&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </table>
            <p>&nbsp;</p>
        </fieldset></td></td>
</tr>
<tr>
    <td height="40" colspan="4" align="right"><input type="submit" name="kaydet" value="Maçı Ekle..!"></td>
    </tr>
   </tr>
</table>
<?php
if($_POST){
$zaman=$_POST["zaman"];
$kod=$_POST["kod"];		
$ev=$_POST["ev"];	
$misafir=$_POST["misafir"];
/**/
$evsonc=$_POST["evsonc"];
$berabersonc=$_POST["berabersonc"];
$misafirsonc=$_POST["misafirsonc"];
$evhandi=$_POST["evhandi"];
$beraberhandi=$_POST["beraberhandi"];
$deplasmanhandi=$_POST["deplasmanhandi"];
$evilk=$_POST["evilk"];
$beraberilk=$_POST["beraberilk"];
$deplasmanilk=$_POST["deplasmanilk"];
$evcift=$_POST["evcift"];
$berabercift=$_POST["berabercift"];
$deplasmancift=$_POST["deplasmancift"];
$ev1=$_POST["ev1"];
$dep1=$_POST["dep1"];
$ev2=$_POST["ev2"];
$dep2=$_POST["dep2"];
$tek=$_POST["tek"];
$cift=$_POST["cift"];
$ilkyari=$_POST["ilkyari"];
$golyok=$_POST["golyok"];
$ikinciyari=$_POST["ikinciyari"];
$evilkgol=$_POST["evilkgol"];
$nogol=$_POST["nogol"];
$depilkgol=$_POST["depilkgol"];
$evkorner=$_POST["evkorner"];
$depkorner=$_POST["depkorner"];
$evtur=$_POST["evtur"];
$deptur=$_POST["deptur"];
$oran1=$_POST["10"];
$oran2=$_POST["20"];
$oran3=$_POST["21"];
$oran4=$_POST["30"];
$oran5=$_POST["31"];
$oran6=$_POST["32"];
$oran7=$_POST["40"];
$oran8=$_POST["41"];
$oran9=$_POST["42"];
$oran10=$_POST["50"];
$oran11=$_POST["00"];
$oran12=$_POST["11"];
$oran13=$_POST["22"];
$oran14=$_POST["33"];
$oran15=$_POST["44"];
$oran16=$_POST["01"];
$oran17=$_POST["02"];
$oran18=$_POST["03"];
$oran19=$_POST["04"];
$oran20=$_POST["05"];
$oran21=$_POST["12"];
$oran22=$_POST["13"];
$oran23=$_POST["14"];
$oran24=$_POST["15"];
$oran25=$_POST["23"];
$oran26=$_POST["24"];
$oran27=$_POST["25"];
$sonucaralik1=$_POST["sonucaralik1"];
$sonucaralik2=$_POST["sonucaralik2"];
$sonucaralik3=$_POST["sonucaralik3"];
$sonucaralik4=$_POST["sonucaralik4"];
$sonucaralik5=$_POST["sonucaralik5"];
$sonucaralik6=$_POST["sonucaralik6"];
$sonucaralik7=$_POST["sonucaralik7"];
$sonucaralik8=$_POST["sonucaralik8"];
$sonucaralik9=$_POST["sonucaralik9"];
$altbir=$_POST["altbir"];
$ustbir=$_POST["ustbir"];
$altiki=$_POST["altiki"];
$ustiki=$_POST["ustiki"];
$altuc=$_POST["altuc"];
$ustuc=$_POST["ustuc"];
$altdort=$_POST["altdort"];
$ustdort=$_POST["ustdort"];
$aralik1=$_POST["aralik1"];
$aralik2=$_POST["aralik2"];
$aralik3=$_POST["aralik3"];
/**/
$maclar=mysql_query("insert into maclar(tarih,mackodu,oyun,ev,misafir,evsonc,berabersonc,misafirsonc,evhandi,beraberhandi,deplasmanhandi,evilk,beraberilk,deplasmanilk,evcift,berabercift,deplasmancift,ev1,dep1,ev2,dep2,tek,cift,ilkyari,golyok,ikinciyari,evilkgol,nogol,depilkgol,evkorner,depkorner,evtur,deptur,oran1,oran2,oran3,oran4,oran5,oran6,oran7,oran8,oran9,oran10,oran11,oran12,oran13,oran14,oran15,oran16,oran17,oran18,oran19,oran20,oran21,oran22,oran23,oran24,oran25,oran26,oran27,sonucaralik1,sonucaralik2,sonucaralik3,sonucaralik4,sonucaralik5,sonucaralik6,sonucaralik7,sonucaralik8,sonucaralik9,altbir,ustbir,altiki,ustiki,altuc,ustuc,altdort,ustdort,aralik1,aralik2,aralik3) values ('$zaman','$kod','futbol','$ev','$misafir','$evsonc','$berabersonc','$misafirsonc','$evhandi','$beraberhandi','$deplasmanhandi','$evilk','$beraberilk','deplasmanilk','$evcift','$berabercift','$deplasmancift','$ev1','$dep1','$ev2','$dep2','$tek','$cift','$ilkyari','$golyok','$ikinciyari','$evilkgol','$nogol','$depilkgol','$evkorner','$depkorner','$evtur','$deptur','$oran1','$oran2','$oran3','$oran4','$oran5','$oran6','$oran7','$oran8','$oran9','$oran10','$oran11','$oran12','$oran13','$oran14','$oran15','$oran16','$oran17','$oran18','$oran19','$oran20','$oran21','$oran22','$oran23','$oran24','$oran25','$oran26','$oran27','$sonucaralik1','$sonucaralik2','$sonucaralik3','$sonucaralik4','$sonucaralik5','$sonucaralik6','$sonucaralik7','$sonucaralik8','$sonucaralik9','$altbir','$ustbir','$altiki','$ustiki','$altuc','$ustuc','$altdort','$ustdort','$aralik1','$aralik2','$aralik3')");
	if($maclar){
                echo "Başarılı Bir Şekilde Eklendi !";
				echo '<meta http-equiv="refresh" content="2;URL=/yonetim/macayarlari.php">';//sayfa yenileme
				echo "";
            }else{
                echo "Bir Sorun Oluştu";
            }
        }
?>
</form>
</div>

<div id="under"><p>&copy; 2017 Albatr0s</p></div>

</body>

</html>
	