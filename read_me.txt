last update:2012/7/18

PHP API:
http://137.132.145.195:7777/st/stereogaugeV2/stereogauge.php?sessionid=49&teamid=chenaho&img1=img_0037.png&img2=img_0038.png&pos1x=167&pos1y=240&pos2x=167&pos2y=240&IsiPhone4s=0&yaw01=-1.713752&pitch01=1.448144&roll01=-0.396208&yaw02=-1.923150&pitch02=1.461892&roll02=-0.400685&lat_01=1.1&long_01=2.2&lat_02=3.3&long_02=4.4&degree=2.2&gps=0.5




.EXE Useage:
stereogauge <image1> <image2> <left_x> <left_y> <right_x> <right_y> <yaw01> <pitch01> <roll01> <yaw02> <pitch02> <roll02> <use_iphone4s>


'yaw','pitch' and 'roll' are obtained from the iphone client.

use_iphone4s : 0 - for iphone 4;  1 - for iphone 4s
	 

example:
	stereogauge img_0037.png img_0038.png 167 240 167 240 -1.713752 1.448144 -0.396208 -1.923150 1.461892 -0.400685 0

