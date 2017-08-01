<?php
//part 4 of 6
//written and published by Jakub Libner (natural blonde) from Wrocław
//thought of since 2014, created in 2016 due to lack of free CMS that suits my needs, continually updated

//this part uses the source files contents' to create static html pages
$process = glob('content/*');
foreach ($process as $key=>$value) {
	$countproces++;
	$countprocess = $countproces;
	$basename = basename($value, ".content");
	$dirlink = file_get_contents("variables/$basename.dirlink");
	$sourcepath = file_get_contents("variables/$basename.sourcepath");
	$contentraw = file_get_contents("content/$basename.content");
	$title = file_get_contents("titles/$basename.title");
	if (strpos($newfiles, "X$title")!==false){
		echo "converting $countprocess of $counttxt - $basename
		";
		$sourcename = file_get_contents("variables/$basename.sourcename");
		if (file_exists("variables/$basename.linksout")){
			$linksout = file_get_contents("variables/$basename.linksout");
			$output3raw = $output3rawsim;}
			else {
				$output3raw = $output3rawnosim;
			}
			$dirtrailraw = file_get_contents("variables/$basename.dirtrail");
			$sentences = explode('\\', str_ireplace($dfind, $dreplace, $dirtrailraw));
			$counter = 0;
			foreach ($sentences as $sentence) {
				$sentences[$counter] = ucfirst($sentence);
				$counter++;
			}
			$trail2 = implode(' &#62; ', $sentences);
			$dirtrailhtml = str_replace("Source &#62; ", "", $trail2);
			$dirname= file_get_contents("variables/$basename.dirname");
			$datecrea = file_get_contents("variables/$basename.datecreated");
			$schemadatecrea = file_get_contents("variables/$basename.schemadatecreated");
			$datemodi = file_get_contents("variables/$basename.datemodified");
			$schemadatemodi = file_get_contents("variables/$basename.schemadatemodified");
			$wordcount = file_get_contents("variables/$basename.wordcount");
			$schemawordcount = $wordcount;
			$lang = file_get_contents("variables/$basename.lang");
			$schemalang = file_get_contents("variables/$basename.schemalang");
			$sourcepathschema = file_get_contents("variables/$basename.sourcepath");
			$schemameta1 = '<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="Article"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="headline" content="R1TITLE"/>';
			$schemameta2 = '<span itemscope itemtype="https://schema.org/Article" itemprop="articleBody">';
			$schemameta3 = '</span>';
			if (preg_match("[from other users]", $sourcepathschema)) {
				$schemameta1 = '<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="https://schema.org/comment"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="headline" content="R1TITLE"/>';
				$schemameta2 = '<span itemscope itemtype="https://schema.org/CreativeWork" itemprop="comment">';
				$schemameta3 = '</span>';
			}
			if (preg_match("[subdir reviews]", $sourcepathschema)) {
				$schemameta1 = '<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="Review"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="itemReviewed" content="R1TITLE"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="headline" content="review of R1TITLE"/>';
				$schemameta2 = '<span itemscope itemtype="https://schema.org/Review" itemprop="reviewBody">';
				$schemameta3 = '</span>';
			}
			if (preg_match("[my inventions]", $sourcepathschema)) {
				$schemameta1 = '<meta itemscope itemtype="https://schema.org/TechArticle" itemprop="headline" content="R1TITLE"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="name" content="R1DIRNAME"/>';
				$schemameta2 = '<span itemscope itemtype="https://schema.org/TechArticle" itemprop="articlebody">';
				$schemameta3 = '</span>';
			}
			if (preg_match("[guide]", $sourcepathschema)) {
				$schemameta1 ='<meta itemscope itemtype="https://schema.org/WebPage" itemprop="https://schema.org/QAPage" content="R1TITLE"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="question" content="R1TITLE"/>';
				$schemameta2 = '<span itemprop="acceptedAnswer"><meta itemscope itemtype="https://schema.org/Article" itemprop="articlebody">';
				$schemameta3 = '</span>';
			}
			if (preg_match("[websiteinfo]", $sourcepathschema)) {
				$schemameta1 = '';
				$schemameta3 = '</span>';
				if (preg_match("[contact]", $sourcepathschema)) {
					$schemameta2 = '<span itemscope itemtype="https://schema.org/WebPage" itemprop="https://schema.org/ContactPage">';
				}
				if (preg_match("[terms]", $sourcepathschema)) {
					$schemameta3 = '<span itemscope itemtype="https://schema.org/WebPage" itemprop="https://schema.org/AboutPage">';
				}
			}
			$contenthtml0 = str_replace($symbolsraw, $symbolsreplace, $contentraw);
			$contenthtml1 = nl2br($contenthtml0);
			$contenthtml2 = str_replace($hfind, $hreplace, $contenthtml1);
			$output2 = "<p>$contenthtml2</p>";
			$find = array ("R1DIRLINK", "Jacob Libner", "Jakub Libner", "Libner", "SCHEMAMETA1", "SCHEMAMETA2", "SCHEMAMETA3", "R1VERSION", "R1DOMAIN", "R1AUTHOR", "R1LANG", "R1SCHEMALANG", "R1SCHEMAWORDCOUNT", "R1SCHEMALANG", "R1TITLE", "R1SIMFILESLIST", "R1DIRTRAIL", "R1DIRNAME", "R1DATECREA", "R1SCHEMADATECREA", "R1DATEMODI", "R1SCHEMADATEMODI", "<title>websiteinfo ", "<title> ", "<title>descriptions-", "R1ENCODING", "R1LINKTERMS", "R1SCHEMADATEPUBLISHED");
			$replace = array ("$dirlink", "$author", "$author", "", "$schemameta1", "$schemameta2", "$schemameta3", "$version", "$domain", "$author", "$lang", "$schemalang", "$schemawordcount", "$schemalang", "$title", "$linksout", "$dirtrailhtml", "$dirname", "$datecrea", "$schemadatecrea", "$datemodi", "$schemadatemodi", "<title>", "<title>", "<title>", "UTF-8", "$domain/terms.html", "$schemadatepublished");
			$output1 = str_replace($find, $replace, $output1raw);
			$output3 = str_replace($find, $replace, $output3raw);
			$contenthtml = $output1.$output2.$output3;
			file_put_contents("html/$basename.html", $contenthtml);
	}}
?>