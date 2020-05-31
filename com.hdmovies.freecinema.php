<?php
//header('Content-type: application/json');

$version = "7"; //versi yang berbeda akan membuat jendela popup update tampil
$package = "com.hdmovies.freecinema"; //package sama akan membuka playstore yg sama, kl banned bisa diganti untuk mengarahkan update ke package baru
$key = "039559ca2fd25c16255f516672a9adc2d6443e9f3454ef23"; //appodeal key
$host = "1mov.xyz, gdriveplayer.us, gdriveplayer.me, gdriveplayer.co, vidcloud9.com, vidnode.net, vidcloud9.com, gcloud.live, youtube.com, 123movie.cc, fvs.io, googlevideo.com, o0-3.com, o0-2.com, o0-4.com, o0-1.com";
$image = "1"; /// set 0 untuk sebelum publish untuk off kan gambar, set 1 setelah publish

$ip = $_SERVER['REMOTE_ADDR'];
$ips = file_get_contents("http://ip-api.com/json/$ip");
$ips = json_decode($ips, true);
$isp = strtolower($ips['isp']);
$isp = str_replace('google','harusoff',$isp);
//$isp = str_replace('telkom','harusoff',$isp);
$isp = str_replace('facebook','harusoff',$isp);
$isp = str_replace('admob','harusoff',$isp);
$isp = str_replace('appodeal','harusoff',$isp);
$filter = "harusoff";
if (strpos($isp, $filter) !== false) 
{
$ads = "0";
}
else
{ 
$ads = "1";

}
if ($image == "1")
{
$image = "https://image.tmdb.org";
$ytimage = "https://img.youtube.com";
}
else
{
$image = "https://tmdb.org";
$ytimage = "https://youtube.com";    
}
$myObj->status = base64_encode($ads);
$myObj->packages = base64_encode($package);
$myObj->version = base64_encode($version);
$myObj->key = base64_encode($key);
$myObj->white = base64_encode($host);
$myObj->image = base64_encode($image);
$myObj->imageyt = base64_encode($ytimage); 
$myJSON = json_encode($myObj);

echo $myJSON;
?>