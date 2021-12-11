<?php
$file_pointer = fopen("new.txt","w+");
// shared lock
if (flock($file_pointer,LOCK_SH)) {
   fwrite($file_pointer,"Some content");
   flock($file_pointer,LOCK_UN);
} else {
   echo "Locking of file shows an error!";
}
fclose($file_pointer);