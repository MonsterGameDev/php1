<?php
 $data = file_get_contents('php://input');
 echo $data;
 $data = json_decode($data);

 echo "Firstname: " . $data->firstname;
