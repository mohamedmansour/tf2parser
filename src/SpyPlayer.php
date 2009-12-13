<?php
require_once('TF2Player.php');

class SpyPlayer extends TF2Player 
{
    public $backstabs;
    public $healthLeeched;
    
    public function __construct($stuff) 
    {
       parent::__construct($stuff);
       $this->backstabs = $stuff['Most backstabs:'];
       $this->healthLeeched = $stuff['Most health leeched:'];
    }
}
?>