<?php 
$nid = $row->nid;
$node = node_load($nid);
$output = field_view_field('node', $node, 'field_kordinati');
$string = render($output);
                    $string =  strip_tags($string);
                         if(stristr($string, 'с') || stristr($string, 'ш') || stristr($string, 'в')) 
                       {    
                      $string = substr($string, stripos($string, ',')+2);
                               $DD = stristr($string, '°', true);
                      $string = substr($string, stripos($string, '°')+2);
                              $MM = stristr($string, '′', true);
                      $string = substr($string, stripos($string, '′')+3);
                                 if(stristr($string, '″', true)){
                                                    $SS = stristr($string, '″', true);
                                                   $string = substr($string, stripos($string, '″')+3);}
                                  if(stristr($string, '′′', true)){
                                                    $SS = stristr($string, '′′', true);
                                                   $string = substr($string, stripos($string, '′′')+3);}
                       $DDD = $DD + $MM/60 + $SS/3600;
                        print $DDD;
                       }
                     else 
                     {
                       $string = explode(' ', $string);
                       print $string[1];
                     }
?>