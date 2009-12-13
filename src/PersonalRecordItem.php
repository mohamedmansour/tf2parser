<?php
// Copyright (c) 2007 Mohamed Mansour. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

/**
 * Holds the item personal record
 *
 */
class PersonalRecordItem 
{
    /**
     * The value of record
     *
     * @var string
     */
    public $value;
    
    /**
     * The player class of record
     *
     * @var string
     */
    public $class;
    
    /**
     * Constructor
     *
     * @param string $value - Value of Record
     * @param string $class - Player class of Record
     */
    public function __construct($stuff) 
    {
        if(preg_match('#(.*) \(as (.*)\)#',$stuff,$match))
        {
            $this->value = $match[1];
            $this->class = $match[2];
        }
        else 
        {
            $this->value = 0;
            $this->class = 0;
            
        }
    }
}

?>
