<?php
// Copyright (c) 2007 Mohamed Mansour. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

require('PersonalAchievementItem.php');

class PersonalAchievement 
{
    private $Items = array();
    public $Total;
    public $Current;
    
    public function __construct($stuff) 
    {
        foreach ($stuff as $arr ) 
        {
            array_push($this->Items,new PersonalAchievementItem($arr['name'],$arr['desc'],$arr['status']));
        }
        
        // Total achievements
        $this->Total = sizeof($this->Items);
    }
}
?>
