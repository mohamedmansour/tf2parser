<?php
require_once('TF2Player.php');

class SniperPlayer extends TF2Player 
{
    public $headshots;
    
    public function __construct($stuff) 
    {
       parent::__construct($stuff);
       $this->headshots = $stuff['Most headshots:'];
    }
}
?>