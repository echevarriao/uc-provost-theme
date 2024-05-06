<?php include("UConnTodayNewsFeed.class.php"); ?>
<?php include("StoryIcon.class.php"); ?>
<?php

	$news = null;
	$i = 0;
	$info = null;
	$defIcon = "/wp-content/themes/provost/images/uconn-sig.jpg";
	$news = null;
	$icon = null;
	$info = Array();
	$todayDate = date("Y-m-d");
	$pubDate = get_theme_mod("pnews_opts['pubDate']");
	$test = true;

	// load the news into custom WP fields as theme mods
	// check if the publication Date(pubDate) is yesterday's date or if it is blank
	// if it is, retrieve the news
	// if the publication date(pubDate) is blank that means we're running the code for the first time
	// otherwise do not do anything

	if($todayDate > $pubDate || $pubDate == "" || $test == true){

	$news = new UConnTodayNewsFeed("http://today.uconn.edu/feed/");
	$icon = new StoryIcon();
	
	for($news->m_index = 0; $news->m_index < 20; $news->m_index++){ 
			
	$info[$i]['title'] = (string)$news->getTitle();
	$info[$i]['url'] = (string)$news->getUrl();
	$info[$i]['pubDate'] = (string)$news->getPubDate();
	$info[$i]['excerpt'] = (string)$news->getExcerpt();
		
	$icon->setUrl($news->getUrl());
	$info[$i]['icon'] = (string)$icon->getIcon();

	set_theme_mod("pnews_opts[$i]['title']", $info[$i]['title']);
	set_theme_mod("pnews_opts[$i]['url']", $info[$i]['url']);
	set_theme_mod("pnews_opts[$i]['pubDate']", $info[$i]['pubDate']);
	set_theme_mod("pnews_opts[$i]['excerpt']", $info[$i]['excerpt']);
	set_theme_mod("pnews_opts[$i]['icon']", $info[$i]['icon']);
	
 	$i++; 

	} // end for loop

	// set the new publication date
	
	set_theme_mod("pnews_opts['pubDate']", $todayDate);
	
	} 

	$info = array();
	
	for($i = 0; $i < 8; $i++):
	
	$info[$i]['title'] = get_theme_mod("pnews_opts[$i]['title']");
	$info[$i]['url'] = get_theme_mod("pnews_opts[$i]['url']");
	$info[$i]['pubDate'] = get_theme_mod("pnews_opts[$i]['pubDate']");
	$info[$i]['excerpt'] = get_theme_mod("pnews_opts[$i]['excerpt']");
	$info[$i]['icon'] = get_theme_mod("pnews_opts[$i]['icon']");
	
	endfor;
?>


<ul class="newsList">
<?php for($i = 0; $i < 4; $i++): ?>
	<li>
		<a href="<?php echo  $info[$i]['url'] ?>">
			<img src = "<?php echo  ($info[$i]['icon'] == "") ? $defIcon : $info[$i]['icon'] ?>" alt = "news story icon" width = "100" border = "1" height = "67" align = "left" hspace = "0" />
			<em><?php echo  substr($info[$i]['pubDate'], 0, 17) ?></em>
			<h5><?php echo  $info[$i]['title'] ?></h5>
			<p><?php echo  $info[$i]['excerpt'] ?></p>
		</a>
	</li>
<?php endfor; ?>
</ul>
<ul class="newsList">
<?php for($i = 4; $i < 8; $i++): ?>
	<li>
		<a href="<?php echo  $info[$i]['url'] ?>">
			<img src = "<?php echo  ($info[$i]['icon'] == "") ? $defIcon : $info[$i]['icon'] ?>" alt = "news story icon" width = "100" border = "1" height = "67" align = "left" hspace = "0" />
			<em><?php echo  substr($info[$i]['pubDate'], 0, 17) ?></em>
			<h5><?php echo  $info[$i]['title'] ?></h5>
			<p><?php echo  $info[$i]['excerpt'] ?></p>
		</a>
	</li>
<?php endfor; ?>
</ul>