<?php
// Copyright (c) 2007 Mohamed Mansour. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

require('HeavyPlayer.php');
require('MedicPlayer.php');
require('ScoutPlayer.php');
require('EngineerPlayer.php');
require('PyroPlayer.php');
require('SpyPlayer.php');
require('SoldierPlayer.php');
require('DemomanPlayer.php');
require('SniperPlayer.php');
class PersonalClassStat 
{
    /**
     * Heavy TF2 Player
     *
     * @var HeavyPlayer
     */
    public $Heavy;
    /**
     * Heavy TF2 Player
     *
     * @var HeavyPlayer
     */
    public $Medic;
    /**
     * Heavy TF2 Player
     *
     * @var HeavyPlayer
     */
    public $Engineer;
    /**
     * Heavy TF2 Player
     *
     * @var HeavyPlayer
     */
    public $Demoman;
    /**
     * Heavy TF2 Player
     *
     * @var HeavyPlayer
     */
    public $Soldier;
    /**
     * Heavy TF2 Player
     *
     * @var HeavyPlayer
     */
    public $Sniper;
    /**
     * Heavy TF2 Player
     *
     * @var HeavyPlayer
     */
    public $Spy;
    /**
     * Heavy TF2 Player
     *
     * @var HeavyPlayer
     */
    public $Pyro;
    /**
     * Heavy TF2 Player
     *
     * @var HeavyPlayer
     */
    public $Scout;
    
    /**
     * Constructor
     *
     * @param string[] $stuff
     */
    public function __construct($stuff) 
    {
        $this->Heavy = new HeavyPlayer($stuff['Heavy']);
        $this->Medic = new MedicPlayer($stuff['Medic']);
        $this->Engineer = new EngineerPlayer($stuff['Engineer']);
        $this->Demoman = new DemomanPlayer($stuff['Demoman']);
        $this->Soldier = new SoldierPlayer($stuff['Soldier']);
        $this->Sniper = new SniperPlayer($stuff['Sniper']);
        $this->Spy = new SpyPlayer($stuff['Spy']);
        $this->Pyro = new PyroPlayer($stuff['Pyro']);
        $this->Scout = new ScoutPlayer($stuff['Scout']);
    }
}
?>
