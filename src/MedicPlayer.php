<?php
// Copyright (c) 2007 Mohamed Mansour. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

require_once('TF2Player.php');

class MedicPlayer extends TF2Player 
{

    public $healthHealed;
    
    public function __construct($stuff) 
    {
       parent::__construct($stuff);
       $this->healthHealed = TF2Formatter::formatRemoveComma($stuff['Most health healed:']);
    }
    
}
?>
