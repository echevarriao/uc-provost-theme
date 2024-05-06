<?php

class NewsStories{
    
    var $pubDate = Array();
    var $link = Array();
    var $description = Array();
    var $title = Array();
    var $limit = 0;
    var $feed = "";
    var $xmlFeed = null;
    var $xml = null;
    var $rss = null;
    
function NewsStories($feedurl = "", $subj = "", $lim = 10){
    
    $story = null;
    $i = 0;
    
    $this->feed = $feedurl;
    
    if($this->feed != "" || $this->feed != null){
    
    $this->rss = simplexml_load_file($feedurl);

        if($subj != ""){

        foreach($this->rss->channel->item as $story){

            for($j = 0; $j < count($story->category); $j++){

            if(preg_match("/$subj/i", $story->category[$j])){
                
            $this->title[$i] = $story->title;
            $this->description[$i] = $story->description;
            $this->link[$i] = $story->link;
            $this->pubDate[$i] = $story->pubDate;

            $i++;
            
            print "IN HERE";
            
            }

            if($i > $lim - 1){ break; }

            }
        
        }
    
        } else {
        
        foreach($this->rss->channel->item as $story){

            for($j = 0; $j < count($story->category); $j++){

            if(preg_match("/Health Center/i", $story->category[$j])){

print "HELP";                
            
            } else {
                
print "NOHELP";                
            $this->title[$i] = $story->title;
            $this->description[$i] = $story->description;
            $this->link[$i] = $story->link;
            $this->pubDate[$i] = $story->pubDate;

            $i++;
                
            }

            if($i > $lim - 1){ break; }

            }
        
        }
        
        }
    
    }
    
}

function getCount(){
    
    return count($this->link);
    
}

}
?>