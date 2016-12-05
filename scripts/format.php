<?php
// Format Timestamps Into 1s, 1m, 1h ect.
function getTime($t_time){
  $pt = time() - $t_time;
  if ($pt>=86400)
    $p = date("F j, Y",$t_time);
  elseif ($pt>=3600)
    $p = (floor($pt/3600))." Hours Ago";
  elseif ($pt>=60)
    $p = (floor($pt/60))." Minutes Ago";
  else
    $p = $pt." Seconds Ago";
  return $p;
}

// Echo A Predetermined Length Of An Actual String.
function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}

// Sanitize Inputs To Stop Malicious Attemps.
function cleanInput($input) {
 
  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );
 
    $output = preg_replace($search, '', $input);
    return $output;
  }
?>