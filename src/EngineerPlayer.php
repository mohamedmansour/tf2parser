<?php
// Copyright (c) 2007 Mohamed Mansour. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

require_once('TF2Player.php');

class EngineerPlayer extends TF2Player 
{
    public $sentryKills;
    public $buildingsBuilt;
    public $teleportersBuilt;
    
    public function __construct($stuff) 
    {
       parent::__construct($stuff);
       $this->sentryKills = $stuff['Most sentry kills:'];
       $this->buildingsBuilt = $stuff['Most buildings built:'];
       $this->teleportersBuilt = $stuff['Most teleporters built:'];
    }
    
}
?>
