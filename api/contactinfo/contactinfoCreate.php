<?php
 $data = file_get_contents('php://input');
 echo $data;
 $data1 = json_decode($data);

 echo "Firstname: " . $data1->firstname;
