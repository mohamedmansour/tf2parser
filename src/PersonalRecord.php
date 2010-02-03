<?php
// Copyright (c) 2007 Mohamed Mansour. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

require_once('PersonalRecordItem.php');

/**
 * Personal Records derived from all the player classes
 *
 */
class PersonalRecord
{
    /**
     * Most TF2 Points
     *
     * @var PersonalRecordItem
     */
    public $MostPoints;
    /**
     * Most TF2 Kills
     *
     * @var PersonalRecordItem
     */
    public $MostKills;
    /**
     * Most TF2 Sentry Kills
     *
     * @var PersonalRecordItem
     */
    public $MostSentryKills;
    /**
     * Most TF2 Kill Assists
     *
     * @var PersonalRecordItem
     */
    public $MostAssists;
    /**
     *  Most TF2 Capures
     *
     * @var PersonalRecordItem
     */
    public $MostCaptures;
    /**
     *  Most TF2 Defenses
     *
     * @var PersonalRecordItem
     */
    public $MostDefenses;
    /**
     *  Most TF2 Damage
     *
     * @var PersonalRecordItem
     */
    public $MostDamage;
    /**
     * Most TF2 Destruction
     *
     * @var PersonalRecordItem
     */
    public $MostDestruction;
    /**
     * Most TF2 Dominations
     *
     * @var PersonalRecordItem
     */
    public $MostDominations;
    /**
     * Most TF2 Revenges
     *
     * @var PersonalRecordItem
     */
    public $MostRevenges;
    /**
     * Most TF2 Uber Charges
     *
     * @var PersonalRecordItem
     */
    public $MostUberCharges;
    /**
     * Most TF2 Longest Life
     *
     * @var PersonalRecordItem
     */
    public $MostLongestLife;
    /**
     * Most TF2 Backstabs
     *
     * @var PersonalRecordItem
     */
    public $MostBackstabs;
    /**
      Most TF2 Buildings Built
     *
     * @var PersonalRecordItem
     */
    public $MostBuildingsBuilt;
    /**
     * Most TF2 Head Shots
     *
     * @var PersonalRecordItem
     */
    public $MostHeadshots;
    /**
     * Most TF2 Health Healed
     *
     * @var PersonalRecordItem
     */
    public $MostHealthHealed;
    /**
     * Most TF2 Health Leeched
     *
     * @var PersonalRecordItem
     */
    public $MostHealthLeeched;
    /**
     * Most TF2 Teleporters Build
     *
     * @var PersonalRecordItem
     */
    public $MostTeleportersBuilt;
    
    /**
     * Constructor
     *
     * @param string[] $stuff
     */
    public function __construct($stuff) 
    {
        $this->MostPoints = new PersonalRecordItem($stuff['Most points:']);
        $this->MostKills = new PersonalRecordItem($stuff['Most kills:']);
        $this->MostSentryKills = new PersonalRecordItem($stuff['Most sentry kills:']);
        $this->MostAssists = new PersonalRecordItem($stuff['Most assists:']);
        $this->MostCaptures = new PersonalRecordItem($stuff['Most captures:']);
        $this->MostDefenses = new PersonalRecordItem($stuff['Most defenses:']);
        $this->MostDamage = new PersonalRecordItem($stuff['Most damage:']);
        $this->MostDestruction = new PersonalRecordItem($stuff['Most destruction:']);
        $this->MostDominations = new PersonalRecordItem($stuff['Most dominations:']);
        $this->MostRevenges = new PersonalRecordItem($stuff['Most revenges:']);
        $this->MostUberCharges = new PersonalRecordItem(utf8_encode($stuff['Most ÜberCharges:']));
        $this->MostLongestLife = new PersonalRecordItem($stuff['Longest life:']);
        $this->MostBackstabs = new PersonalRecordItem($stuff['Most backstabs:']);
        $this->MostBuildingsBuilt = new PersonalRecordItem($stuff['Most buildings built:']);
        $this->MostHeadshots = new PersonalRecordItem($stuff['Most headshots:']);
        $this->MostHealthHealed = new PersonalRecordItem($stuff['Most health healed:']);
        $this->MostHealthLeeched = new PersonalRecordItem($stuff['Most health leeched:']);
        $this->MostTeleportersBuilt = new PersonalRecordItem($stuff['Most teleporters built:']);
   
    }
    
}
?>
