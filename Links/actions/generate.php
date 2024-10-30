<?php
function genShort(string $full): string{
   $short = ''; 
    $str = str_split($full);
     array_splice($str, 0,7);
     for ($i=0; $i < 10; $i++) { 
        if ($str[$i] == '/' || $str[$i] == '.') {
            continue;
        }
         $short .= mb_chr(mb_ord($str[$i])+1);
     } 
    return $short;
}
function makeFile(string $short, string $full) {
  mkdir($_SERVER['DOCUMENT_ROOT'] . "/Links/store/" . $short) ;
  $file = fopen($_SERVER['DOCUMENT_ROOT'] . "/Links/store/". $short ."/index.html", "w");
  fwrite($file, "<?php header('location: ".$full."')?>");
  rename($_SERVER['DOCUMENT_ROOT'] . "/Links/store/". $short ."/index.html", $_SERVER['DOCUMENT_ROOT'] . "/Links/store/". $short ."/index.php",);
  fclose($file);
  return ("localhost" . "/Links/store/". $short );
}
