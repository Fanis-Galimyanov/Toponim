<?php
$nid = $row->nid;
$node = node_load($nid);

$output = field_view_field('node', $node, 'field_vid_toponima');

$string= '<font size="2"  face="Arial"><b>Вид топонима:</b> </font> <br>' ;

 $tid =db_query('SELECT tid FROM {taxonomy_index} WHERE nid = :nid', 
                  array(':nid' => $nid)
                )->fetchField();


 $term = taxonomy_term_load( $tid);
$string=$string . $term->name; 

$output = field_view_field('node', $node, 'field_nazvanie_na_tatarsk_yazeke');
$string=$string . render($output);
$output = field_view_field('node', $node, 'field_nazvanie_na_russkom_yazeke');
$string=$string . render($output);
print $string;