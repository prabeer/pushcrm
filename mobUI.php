<?php 
$arr = array('Json'=> array (
			array(	
				'app_catagory' => 'Recommended',
				'app_details'=>
				array(
					array('appName' => "Facebook", 'imageURL' => 'http://192.168.43.180/pushapp/apkpic/face.png', 'APKlocation' => 'http://192.168.43.180/pushapp/apk/facebook.apk', 'APPPackage' => 'com.facebook.katana'),
					array('appName' => "Whatsapp", 'imageURL' => 'http://192.168.43.180/pushapp/apkpic/whatsapp.png', 'APKlocation' => 'http://192.168.43.180/pushapp/apk/whatsapp.apk', 'APPPackage' => 'com.whatsapp'),
					array('appName' => "CPUz", 'imageURL' => 'http://192.168.43.180/pushapp/apkpic/cpuz.png', 'APKlocation' => 'http://192.168.43.180/pushapp/apk/cpuz.apk', 'APPPackage' => 'com.cpuid.cpu_z'),
					array('appName' => "Twitter", 'imageURL' => 'http://192.168.43.180/pushapp/apkpic/twitter.png', 'APKlocation' => 'http://192.168.43.180/pushapp/apk/twitter.apk', 'APPPackage' => 'com.twitter.android'),
					array('appName' => "Clash", 'imageURL' => 'http://192.168.43.180/pushapp/apkpic/clash.png', 'APKlocation' => 'http://192.168.43.180/pushapp/apk/clan.apk', 'APPPackage' => 'com.supercell.clashofclans'),
					array('appName' => "Clean Master", 'imageURL' => 'http://192.168.43.180/pushapp/apkpic/clean.png', 'APKlocation' => 'http://192.168.43.180/pushapp/apk/clean.apk', 'APPPackage' => 'com.cleanmaster.mguard')
					
					)
				),
			array(	
				'app_catagory' => 'Trending',
				'app_details'=>
				array(
					array('appName' => "UBER1", 'imageURL' => 'http://192.168.43.180/pushapp/apkpic/uber.png', 'APKlocation' => 'appurl', 'APPPackage' => 'com.xyz.tk'),
					array('appName' => "UBER2", 'imageURL' => 'http://192.168.43.180/pushapp/apkpic/uber.png', 'APKlocation' => 'appurl', 'APPPackage' => 'com.xyz.tk'),
					array('appName' => "UBER3", 'imageURL' => 'http://192.168.43.180/pushapp/apkpic/uber.png', 'APKlocation' => 'appurl', 'APPPackage' => 'com.xyz.tk'),
					array('appName' => "UBER4", 'imageURL' => 'http://192.168.43.180/pushapp/apkpic/uber.png', 'APKlocation' => 'appurl', 'APPPackage' => 'com.xyz.tk'),
					array('appName' => "UBER5", 'imageURL' => 'http://192.168.43.180/pushapp/apkpic/uber.png', 'APKlocation' => 'appurl', 'APPPackage' => 'com.xyz.tk'),
					array('appName' => "UBER6", 'imageURL' => 'http://192.168.43.180/pushapp/apkpic/uber.png', 'APKlocation' => 'appurl', 'APPPackage' => 'com.xyz.tk')
					)
				),	
				
			)
			);

echo json_encode($arr);

 	
	