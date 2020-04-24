<?php

echo "Hello World!";
$file = fopen('index.html','r');

    if($file){
        while(!feof($file)){
            $line = fgetc($file);
            echo $line;
        }
    }
    fclose($file);