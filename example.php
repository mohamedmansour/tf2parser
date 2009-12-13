<?php
  require('src/TF2Parser.php');
  
  // Lets see how we can get our states based on our steam community:
  $steamcommunity_name = 'm0-';
  $steamcommunity_id = '76561197989481829';

  // Given the above, you can see that we can choose two different approaches to fetch
  // your states, via name or id from steam community.
  //
  // The second parameter denotes which type of id it is:
  //   0 = Steam community name = http://steamcommunity.com/id/m0-/
  //   1 = Steam community id = http://steamcommunity.com/profiles/76561197989481829/


  // By name.
  $tf2 = new TF2Parser($steamcommunity_name, 0);
  $captures = $tf2->Records->MostCaptures;
  print 'Most Captures: ' . $captures->value . ' by ' . $captures->class;


  // By id.
  $tf2 = new TF2Parser($steamcommunity_id, 1);
  print 'Demoman kills: ' . $tf2->ClassStats->Demoman->kills;
?>
