<?php

  $raw_response =  file_get_contents('php://input');
   file_put_contents('ronok.txt', $raw_response.'\n', FILE_APPEND | LOCK_EX); 
   file_put_contents('ronok123.txt', 'my name is ronok', FILE_APPEND | LOCK_EX); 
