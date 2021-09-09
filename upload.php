

<?php

//upload.php
error_reporting(0);
	
if(isset($_POST['url']))
{

	$message = '';
	$image = '';
	$title = '';
	$description='';

   $url1= $_POST["url"];
	
   $html = file_get_contents($url1);
   // title
   $title_f = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $html, $match) ? $match[1] : null;
   
   // description
   $start = strpos($html, '<p>');
   $end = strpos($html, '</p>', $start);
   $paragraph = substr($html, $start, $end-$start+25);
   $paragraph = html_entity_decode(strip_tags($paragraph)); 
   $tags = get_meta_tags($url1);
   // title
   if($title_f != null){
     $title =  $title_f;
   }
   else{
     $path = parse_url($url1, PHP_URL_PATH);
     $file_name = basename($url1); //base name of image eg :- image.jpg
     $arr = explode(".", $file_name, 2); // break the string "image"   ".jpg"
     $first = $arr[0]; // print " image"
     $title = $first;
   }
   
   // description
   if($tags['description'] || $paragraph !== null){   
     $description = $tags['description'];                  
   }
   else{
     $description = $paragraph;
   }
   
   // image

   libxml_use_internal_errors(true);
   $c = file_get_contents($url1);
   $d = new DomDocument();
   $d->loadHTML($c);
   $xp = new domxpath($d);
   foreach ($xp->query("//meta[@property='og:image']") as $el) {
      $image23 = $el->getAttribute("content");
   }

   if(getimagesize($url1)){
     $image = $url1;
   }
   else if ($image23 == TRUE){
      $image = $image23;
   }
   else{
     $image = "assets/image/image.jpg";
   }
   
	if (strlen($title) > 165){
		$title1 = substr($title, 0, 165);
	} else {
		$title1 = $title;
	}
	if (strlen($description) > 165){
		$description1 = substr($description, 0, 165);
	} else {
		$description1 = $description;
	}
    	
	$output = array(
        
		'image'		=>	$image,
		'title'		=>	$title1,
		'description'=>	$description1,
        
	);
	echo json_encode($output);
}


?>