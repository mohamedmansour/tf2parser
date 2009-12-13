<?php
include('PersonalRecord.php');
include('PersonalAchievement.php');
include('PersonalClassStat.php');
include('PersonalInfo.php');

/**
 * Parsing Utility for Team Fortress 2
 *
 */
class TF2Parser 
{
    
     /**
     * Personal Records from best of all of the classes
     *
     * @var PersonalRecord
     */
    public $Records;
    /**
     * Each characters stats
     *
     * @var PersonalClassStat
     */
    public $ClassStats;
    /**
     * Achievements won and unattained
     *
     * @var PersonalAchievement
     */
    public $Achievements;
    /**
     * Normal General Info
     *
     * @var PersonalInfo
     */
    public $Info;
    
    
    
    /**
     * Constructor
     *
     * @param unknown_type $steamUser
     */
    public function __construct($steamUser,$steamType) 
    {
        $rawData = $this->fetchURL($steamUser,$steamType);
        $this->parseData($rawData);
    }
    
    /**
     * Downloads the website to a variable
     *
     * @param string $steamUser
     * @return string - data
     */
    private function fetchURL($steamUser,$steamType) 
    {
        if($steamType==0)
            $url = 'http://steamcommunity.com/id/' . $steamUser . '/stats/tf2';
        else 
            $url = 'http://steamcommunity.com/profiles/' . $steamUser . '/stats/tf2';

        $ch = curl_init();
        $timeout = 7; // set to zero for no timeout
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $fileContents = curl_exec($ch);
        curl_close($ch);
        $data = explode("\n", $fileContents);


        if(strlen($fileContents) == 0) 
        {
            throw new Exception('You don\'t have Team Fortress 2! According to your ID: '. $steamUser );
        }
        else if(empty($data[0])) 
        {
            throw new Exception('Steam user does not exist, please recheck your ID: ' . $steamUser );
        }
        
        return $data;
    }
    
    /**
     * Parses the returned text
     *
     * @param unknown_type $data
     */
    private function parseData($data)
    {
        
        // For Everything
        $start = true;
        $statOdd = true;
        $tempLine;
        $currentItem = '';
        $statCnt = 0;
        
        // For Personal Records
        $personalRecords = array();
        $startParsingRecords = false;
        
        // For Personal Stats
        $personalClassStats = array();
        $startParsingClassStats = false;
        
        // For Acheivements
        $personalAchievements = array();
        $startParsingAchievements = false;
          
        // For General
        $personalGeneralInfo = array();
        
        foreach($data as $line) 
        {
            // -----------------------------------------------------------
            //  Check if page is valid
            // -----------------------------------------------------------
            if(preg_match('#<h2>(.*)</h2>#',$line,$match))
            {

                switch ($match[1]) 
                {
                    case 'Error':
                        throw new Exception('Steam ID does not exist.');
                        return false;
                }
            }
            // -----------------------------------------------------------
            //  Fetch Steam Name
            // -----------------------------------------------------------
            else if(preg_match('#<h1>(.*)</h1>#',$line,$match))
            {
                $personalGeneralInfo['name'] = $match[1];
            }
            // -----------------------------------------------------------
            //  Fetch 2 Week Playtime
            // -----------------------------------------------------------
            else if (preg_match('#<div id="playtimeBody">Playtime:<br /> (.*) hrs past 2 weeks#',$line,$match))  
            {
                $personalGeneralInfo['twoweeks'] = $match[1];
            }
            // -----------------------------------------------------------
            //  Fetch Personal Records
            // -----------------------------------------------------------
            else if (preg_match('#<div class="mainSectionHeader">Personal Records <span class="underscoreColor">_</span></div>#',$line))  
            {
                $startParsingRecords = true;
            }
            else if($startParsingRecords) 
            {
                if(preg_match('#<br clear="all" />#',$line)) 
                {
                     $startParsingRecords = false;
                     $statOdd = true;
                }
                else
                {
                    $line = trim(strip_tags($line));
                    if($line != '') 
                    {
                        if($statOdd) 
                        {
                            $statOdd = false;
                            $tempLine = $line;
                            $personalRecords[$line] = '';
                        }
                        else 
                        {
                            $statOdd = true;
                            $personalRecords[$tempLine] = $line;
                        }
                    }
                } 
            }
            // -----------------------------------------------------------
            //  Fetch Personal Class Stats
            // -----------------------------------------------------------
            //else if(preg_match('#<div class="classExtended" id="(.*)">#',$line,$match))  
            else if(preg_match('#<div class="className">(.*)</div>#',$line,$match))
            {
                $startParsingClassStats = true;
                $currentItem = $match[1];
                //$currentItem = str_replace('Extended','',$match[1]);
                $personalClassStats[$currentItem] = array();
                $statOdd = true;
            }
            else if($startParsingClassStats && preg_match('#(.*) hours<br />#',$line,$match))
            {
                $personalClassStats[$currentItem]['Total time:'] = $match[1];
            }
            else if($startParsingClassStats)
            {
                if(preg_match('#<br clear="all" />#',$line)) 
                {
                     $startParsingClassStats = false;
                }
                else
                {
                    $line = trim(strip_tags($line));
                    if($line != '') 
                    {
                        if($statOdd) 
                        {
                            $statOdd = false;
                            $tempLine = $line;
                            $personalClassStats[$currentItem][$line] = '';
                        }
                        else 
                        {
                            $statOdd = true;
                            $personalClassStats[$currentItem][$tempLine] = $line;
                        }
                    }
                }
            }
            // -----------------------------------------------------------
            //  Fetch Achievements
            // -----------------------------------------------------------
            else if(preg_match('#<div id="personalAchieve">#',$line))
            {
                $startParsingAchievements = true;
            }
            else if($startParsingAchievements && preg_match('#<div class="mainSectionHeader">(.*) <span class="underscoreColor">_</span></div>#',$line,$match))  
            {
                $statOdd = true;
                $currentItem = $match[1];
                $statCnt = 0;
            }
            else if($startParsingAchievements)
            {
                if(preg_match('#<br clear="all" />#',$line)) 
                {
                     $startParsingAchievements = false;
                     break;
                }
                else 
                {
                    $line = trim(strip_tags($line));
                    if($line != '') 
                    {
                        if($statOdd) 
                        {
                            $statOdd = false;
                            $tempLine = $line;
                            $personalAchievements[$statCnt]['name'] = $line;
                            $personalAchievements[$statCnt]['desc'] = '';
                            $personalAchievements[$statCnt]['status'] = $currentItem;
                        }
                        else 
                        {
                            $statOdd = true;
                            $personalAchievements[$statCnt]['desc'] = $line;
                            $statCnt++;
                        }
                    } 
                }
            }
        }
        
        // Populate Object
        $this->Records = new PersonalRecord($personalRecords);
        $this->ClassStats = new PersonalClassStat($personalClassStats);
        $this->Achievements  = new PersonalAchievement($personalAchievements);
        $this->Info = new PersonalInfo($this->ClassStats,$personalGeneralInfo);
    }
}
?>
