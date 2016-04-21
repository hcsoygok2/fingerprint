<?php 

$output= shell_exec(' cd /home/pi/FaceFramework/trainDataset ;sudo python train.py');

echo $output;


?>