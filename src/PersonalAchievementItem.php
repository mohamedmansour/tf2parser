<?php
// Copyright (c) 2007 Mohamed Mansour. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

class PersonalAchievementItem
{
    public $name;
    public $description;
    public $status;
    
    public function __construct($name, $desc, $status) 
    {
        $this->name = $name;
        $this->description = $desc;
        $this->status = $status;
    }
}
?>
