<?php

/*
 * a helper class to handle youtube videos
 * 
 */

/**
 * Description of youtube
 *
 * @author mambenanje
 */
class Youtube {

    private $url;
    private $id;
    private $title;
    private $description;

    public function __construct($url) {
        $this->url = $url;
        $this->parse();
    }

    private function parse() {
        //parse to get the id
        $url = $this->url;    // some youtube url
        $parsed_url = parse_url($url);
        $parsed_query_string = "";
        parse_str($parsed_url['query'], $parsed_query_string);
        $this->id = $parsed_query_string['v'];
    }
    
    /**
     * generates the embed code for the current youtube video
     * @param type $width //the width of the embed video display
     * @param type $height //the height of the embed video display
     * @return string // the embed code string
     */
    public function getEmbedCode($width,$height) {
        $embedCode = '</pre>
<iframe src="http://www.youtube.com/embed/' . $this->id . '?rel=0" frameborder="0" width="' . ($width ? $width : 560) . '" height="' . ($height ? $height : 349) . '"></iframe>
<pre>';
        return $embedCode;
    }
    
    /**
     * returns the youtube video id 
     * @return string v //the youtube video id 
     */
    public function getID(){
        return $this->id;
    }
    
    /**
     * get the thumb image to represent the youtube video
     * @param type $size //the size either small or large 
     * @return string //the url of the youtube image on youtube public servers
     */
    public function getThumb($size="small"){
        $youtube_thumb="";
        if($size=="small"){
            $youtube_thumb = "http://i3.ytimg.com/vi/" . $this->id. "/1.jpg";
        }else{
            $youtube_thumb = "http://i3.ytimg.com/vi/" . $this->id . "/0.jpg";
        }
        return $youtube_thumb;
    }
    
    public function getURL(){
        return $this->url;
    }
    
    public function getTitle(){
        //TODO: process the title from youtube and return it
    }
    
    public function getDescription(){
        //TODO: process the description from youtube and return it
    }

}

?>
