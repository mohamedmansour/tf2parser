<?php
require_once('TF2Formatter.php');

class TF2Player 
{
    public $points;
    public $kills;
    public $assists;
    public $captures;
    public $defenses;
    public $damage;
    public $destructions;
    public $dominations;
    public $revenges;
    public $uberCharges;
    public $longestLife;
    public $totalTime;
    
    
    public function __construct($stuff) 
    {
        $this->points = $stuff['Most points:'];
        $this->kills = $stuff['Most kills:'];
        $this->assists = $stuff['Most assists:'];
        $this->captures = $stuff['Most captures:'];
        $this->defenses = $stuff['Most defenses:'];
        $this->damage = TF2Formatter::formatRemoveComma($stuff['Most damage:']);
        $this->destructions = $stuff['Most destruction:'];
        $this->dominations = $stuff['Most dominations:'];
        $this->revenges = $stuff['Most revenges:'];
        $this->uberCharges = utf8_encode($stuff['Most ÜberCharges:']);
        $this->longestLife = TF2Formatter::formatLongestLife($stuff['Longest life:']);
        $this->totalTime = $stuff['Total time:'];
    }
}
?>