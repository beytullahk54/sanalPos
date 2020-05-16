<?php 
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\site_ayarlar;

function dosya($file,$fileDirectory){

    $destinationPath = 'uploads'.$fileDirectory.'';
    $fileName=str_replace(" ", "_", $file->getClientOriginalName());
    $yeniurl = date_format(Carbon::now(),"YmdHis")."_".$fileName ;

    $file->move($destinationPath, $yeniurl);
   
    return array("status"=>true,"message"=>"Dosyanız başarıyla yüklenmiştir..","url"=>$destinationPath.$yeniurl,"fileType"=>$file->getClientOriginalExtension());
   
}
function XMLPOST($PostAddress,$xmlData)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$PostAddress);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);
    $result = curl_exec($ch);
    return $result;
}
function sendsms2($msg){
    $sms_user=site_ayarlar::find(1)->sms_user;
    $sms_pass=site_ayarlar::find(1)->sms_pass;

    $xml='<?xml version="1.0" encoding="UTF-8"?>
    <mainbody>
            <header>
                    <company>NETGSM</company>
            <usercode>'.$sms_user.'</usercode>
            <password>'.$sms_pass.'</password>
                    <startdate>'.date('d.m.Y H:i').'</startdate>
                    <stopdate>'.date('d.m.Y H:i', strtotime('+1 day')).'</stopdate>
                <type>n:n</type>
            <msgheader>SAYEM</msgheader>
            </header>
            <body>
            '.$msg.'
            </body>
    </mainbody>';
    //return $xml;
    $gelen=XMLPOST('http://api.netgsm.com.tr/xmlbulkhttppost.asp',$xml);
    return $gelen;
}
