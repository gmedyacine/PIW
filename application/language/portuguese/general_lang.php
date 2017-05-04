<?php

$url= base_url();
$handle = fopen($url.'/uploads/lang/general_lang_pt.csv','r');
while ( ($data = fgetcsv($handle,0,";") ) !== FALSE ) {
    $lang[$data[0]]=$data[1];
}
fclose($handle);




