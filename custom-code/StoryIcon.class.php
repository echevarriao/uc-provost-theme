<?php

class StoryIcon{

    var $pageUrl = "";
    var $iconImage = "";

function StoryIcon($url = ""){

    $this->pageUrl = $url;

}

function setUrl($url = ""){
    
    $this->pageUrl = $url;
    
}

function getUrl(){
    
    return $this->pageUrl;
    
}

function getIcon(){
    
    $dom = new DOMDocument();
    $html = "";
    $meta = null;
    $address = "";
    $icon = "";
    $pic;

    if($this->pageUrl == "" || $this->pageUrl == null){
        
        return null;
        
    } else {
        
    $html = file_get_contents($this->pageUrl);

    $dom->loadHTML($html);

    $meta = $dom->getElementsByTagName("meta");

    foreach($meta as $elem){

    if($elem->getAttribute("property") == "og:image"){
    
    $pic = $elem->getAttribute("content");
        
        if(preg_match('/.jpg/', $pic) || preg_match('/[0-9]{3}x[0-9]{3}.jpg/', $pic) || preg_match('/[0-9]{3}x[0-9]{3}.png/', $pic) || preg_match('/[0-9]{3}x[0-9]{3}.gif/', $pic)){
        
        $icon = $pic;

        }
    
    }

    }

    return $icon;    
        
    }
    
}

}

?>