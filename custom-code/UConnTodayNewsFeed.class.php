<?php

class UConnTodayNewsFeed{

    var $feedUrl = "";
    var $feed = null;
    var $title = "";
    var $descr = "";
    var $link = "";
    var $pubdate = "";
    var $rss = null;
    var $category = null;
    var $m_index = 0;
   
function UConnTodayNewsFeed($feed = ""){

    $this->rss = Array();

    if($feed == ""){
    
    } else {

    $this->feed = simplexml_load_file($feed);
    $this->feedUrl = $feed;

    }

    for($index = 0; $index < 20; $index++){
        
    $this->rss[$index] = $this->feed->channel->item[$index];        
        
    }

}

function getIcon($url = ""){
    
    $dom = new DOMDocument();
    $html = "";
    $meta = null;
    $address = "";
    $icon = "";
    
    if($url == "" || $url == null){ 
        
        return "";
        
    } elseif($this->rss[$this->m_index]->link == "" || $this->rss[$this->m_index]->link == null){
        
        return "";
    
    } elseif($url != "" || $url != null){
    
        
    } elseif($this->rss[$this->m_index]->link != "" || $this->rss[$this->m_index]->link != null){
        
    $url = $this->rss[$this->m_index]->link;
    
    } else {
        
    return "";
        
    }

    $html = file_get_contents($url);

    $dom->loadHTML($html);

    $meta = $dom->getElementsByTagName("meta");

    foreach($meta as $elem){

    if($elem->getAttribute("property") == "og:image"){
        
        if(preg_match('/300x200.jpg/', $elem->getAttribute("content"))){
        
        $icon = $elem->getAttribute("content");

        }
    
    }

    }

    return $icon;    
    
}

function setFeedUrl($feed = ""){
    
    $this->feedUrl = $feed;
    
}

function getFeedUrl(){
    
    return $this->feedUrl;
    
}

function getCount(){
    
    return count($this->rss);
    
}

function getPubDate(){
    
    return $this->rss[$this->m_index]->pubDate;
}
function getDescription(){
    
    return $this->rss[$this->m_index]->description;
}
function getUrl(){
    
    return $this->rss[$this->m_index]->link;
}

function getExcerpt($limit = 300){
    
    if(intval($limit > 0)){
    
    return substr($this->rss[$this->m_index]->description, 0, $limit);
    
    } else {
    
    return substr($this->rss[$this->m_index]->description, 0, 300);
        
    }
    
}

function getCategories(){
    
    $temp = Array();
    $categories = "";
    $z = 0;
    
    for($z = 0; $z < count($this->rss[$this->m_index]->category); $z++){
    
    $temp[$z] = $this->rss[$this->m_index]->category[$z];
    
    }
    
    $categories = implode("|", $temp);
    
    return $categories;
}

function getTitle(){
    
    return $this->rss[$this->m_index]->title;
    
}

function hasCategory($category = ""){

    $i = 0;
    $temp = Array();
    
    if($category == "" || $category == null){
    
    return false;
        
    } else {

    for($i = 0; $i < count($this->rss[$this->m_index]->category); $i++){

    $temp[$i] = $this->rss[$this->m_index]->category[$i];

    }

    if(in_array($category, $temp)){
        
    return true;
        
    } else {
        
    return false;
        
    }
    
    }
    
}

function resetIndex(){
    
    $this->m_index = 0;
    
}

function hasEnded(){
    
    if($this->m_index == count($this->rss)){
    
    return true;
    
    }
    
    return false;
    
}

function next(){

/*
 
 
    $ok = 0;
  
    if($this->m_index == 0){
        
        
    } elseif($this->m_index < 20){
        
        
        
    }
    
    if($this->m_index < count($this->rss)){

    $this->title = $this->rss[$this->m_index]->title;
    $this->pubDate = $this->rss[$this->m_index]->pubDate;
    $this->link = $this->rss[$this->m_index]->link;
    $this->desc = $this->rss[$this->m_index]->description;
    $this->cat = $this->rss[$this->m_index]->category;
      
    $ok = 1;    
        
    } elseif($this->m_index == count($this->rss)){
    
    $ok = 0;    
        
    } else {
        
    $ok = 0;    
        
    }

    $this->m_index++;
*/
    return $ok;
   
}

}

?>