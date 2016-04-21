<?php 

$output=exec('cd /home/pi/FaceFramework/apps/videofacerec; sudo python videofacerec.py -t /home/pi/FaceFramework/trainDataset/Dataset ElvanCan');

echo $output;
?>