<?php 
$nid = $row->nid;
$node = node_load($nid);
$output = field_view_field('node', $node, 'field_kordinati');
$string = render($output);
if( $string){
                    $string =  strip_tags($string);
                         if(stristr($string, 'с') || stristr($string, 'ш') || stristr($string, 'в')) 
                       {    
                      $string = substr($string, stripos($string, ',')+2);
                               $DD = stristr($string, '°', true);
                      $string = substr($string, stripos($string, '°')+2);
                              $MM = stristr($string, '′', true);
                      $string = substr($string, stripos($string, '′')+3);
                              $SS = preg_replace("/[^0-9]/", '', $string);                              
                       $DDD = $DD + $MM/60 + $SS/3600;
                        print  $DDD; 
                       }
                     else 
                     {
                       $string = explode(' ', $string);
                       print $string[1];
                     }
}
?>
