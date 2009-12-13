<?php
// Copyright (c) 2007 Mohamed Mansour. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

class PersonalInfo
{
    public $name;
    public $totalPlayTime;
    public $twoWeeksPlayTime;
    
    public function __construct(PersonalClassStat $players, $info)
    {
        $this->totalPlayTime += $players->Demoman->totalTime;
        $this->totalPlayTime += $players->Engineer->totalTime;
        $this->totalPlayTime += $players->Heavy->totalTime;
        $this->totalPlayTime += $players->Medic->totalTime;
        $this->totalPlayTime += $players->Pyro->totalTime;
        $this->totalPlayTime += $players->Scout->totalTime;
        $this->totalPlayTime += $players->Sniper->totalTime;
        $this->totalPlayTime += $players->Soldier->totalTime;
        $this->totalPlayTime += $players->Spy->totalTime;
        $this->name = $info['name'];
        $this->twoWeeksPlayTime = $info['twoweeks'];
    }
}
?>
