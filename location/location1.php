<!DOCTYPE html>
<html>
<head>
	<title>Location</title>
</head>
<body>


	<?php 
	   $city="chokara";
	   $state="kpk";
	   $contry="pakistan";
	   echo $loc = "$city,+$state,+$contry";
	?>

	<iframe width="700" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $loc;?>&amp;sspn=33.984987,77.607422&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $loc;?>&amp;z=12&amp;output=embed"></iframe>
	
	<!--x
	<iframe width="700" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Clacton-on-sea,+Essex,+United_kingdom&amp;sl=37.0625,-95677068&amp;sspn=33.984987,77.607422&amp;ie=UTF8&amp;hq=&amp;hnear=Clacton-on-sea,+Essex,+United_kingdom&amp;z=12&amp;ll=51.790898,1.156235&amp;output=embed"></iframe>
	<iframe width="700" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Clacton-on-sea,+Essex,+United_kingdom&amp;sl=37.0625,-95677068&amp;sspn=33.984987,77.607422&amp;ie=UTF8&amp;hq=&amp;hnear=Clacton-on-sea,+Essex,+United_kingdom&amp;z=12&amp;ll=51.790898,1.156235&amp;output=embed"></iframe>
</body>
</html>