
echo "starting title glob
";
//this glob takes the titles and takes the results of comparison, creating lists of links from the lists of results
$titlethrough1 = glob('titles/*');
$titlethrough2 = glob('titles/*');
foreach ($titlethrough1 as $key1=>$value1) {
$countcomp++;
$countcompa = $countcomp;
echo "comparing $countcompa of $counttxt - filename ";
$title1 = file_get_contents($value1);
$title1name = basename($value1, ".title");
echo "$title1name
";
if (strpos($newfiles, "X$title1")!==false){
if ((!(file_exists("variables/$title1name.lastversion")))or((file_get_contents("variables/$title1name.lastversion"))!=="$versionlast")){
$countcompnews++;
$countcompnew = $countcompnews;
$procfilename1 = file_get_contents("variables/$title1name.procfilename");
$sourcepath1 = file_get_contents("variables/$title1name.sourcepath");
$sourcename1 = file_get_contents("variables/$title1name.sourcename");
$dirtrail1 = file_get_contents("variables/$title1name.dirtrail");
$title1namehtml = $title1name.".html";
$complinebreaks1 = file_get_contents("variables/$title1name.linebreaks");
$compfilesize1 = (file_get_contents("variables/$title1name.filesize"));
$compwords1 = (file_get_contents("variables/$title1name.words"));
$compwordsunique1 = (file_get_contents("variables/$title1name.wordsunique"));
$compwordcount1 = file_get_contents("variables/$title1name.wordcount");
//new glob, to do the comparison
foreach ($titlethrough2 as $key2=>$value2) {
$title2 = file_get_contents($value2);
$title2name = basename($value2, ".title");
$title2namehtml = $title2name.".html";
$sourcepath2 = file_get_contents("variables/$title2name.sourcepath");
$sourcename2 = file_get_contents("variables/$title2name.sourcename");
$dirtrail2 = file_get_contents("variables/$title2name.dirtrail");
$procfilename2 = file_get_contents("variables/$title2name.procfilename");
//if ((!(file_exists("variables/$title1name.linksout")))or(strpos(file_get_contents("variables/$title1name.linksout"), $title2namehtml)==false)) {
//if (preg_match("[$title2namehtml]", file_get_contents("variables/$title1name.linksout"))){
//echo "SKIPPING $title1 $title2, ";
//} else {
//sometimes works, sometime sdoesnt
//if (!(preg_match("[$title2namehtml]", "variables/$title1name.linksout"))){
echo "$countcompa of $counttxt - $title1 AND $title2
";
if (($sourcepath1!==$sourcepath2)&&(preg_match("[websiteinfo]", $sourcepath1))&&(preg_match("[websiteinfo]", $sourcepath2))){
echo "FOUND WEBSITEINFO MATCH
";
$linkout = "<li><div class=\"simfiles\"><span itemprop=\"relatedLink\"><a itemprop=\"url\" href=\"$title1namehtml\">$title1</a></span></div></li>";
file_put_contents("variables/$title2name.linksout", $linkout, FILE_APPEND);
$linkin = "<li><div class=\"simfiles\"><span itemprop=\"relatedLink\"><a itemprop=\"url\" href=\"$title2namehtml\">$title2</a></span></div></li>";
file_put_contents("variables/$title1name.linksout", $linkin, FILE_APPEND);
}
if (($sourcepath1!==$sourcepath2)&&(!preg_match("[websiteinfo]", $sourcepath1))&&(!preg_match("[websiteinfo]", $sourcepath2))){
$countcomp2++;
$countcompb = $countcomp2;
$complinebreaks2 = file_get_contents("variables/$title2name.linebreaks");
$compfilesize2 = (file_get_contents("variables/$title2name.filesize"));
$compwords2 = (file_get_contents("variables/$title2name.words"));
$compwordsunique2 = (file_get_contents("variables/$title2name.wordsunique"));
$compwordcount2 = file_get_contents("variables/$title2name.wordcount");
$countintersect1 = (count(array_intersect((explode(" ", $compwordsunique1)), (explode(" ", $compwordsunique2))))/$compwordcount1);
$countintersect2 = (count(array_intersect((explode(" ", $compwordsunique1)), (explode(" ", $compwordsunique2))))/$compwordcount2);
if(($complinebreaks1+$complinebreaks2)>0){$complinebreaks = (min($complinebreaks1, $complinebreaks2)/max($complinebreaks1, $complinebreaks2));}else{$complinebreaks = 0;}
if(($compfilesize1+$compfilesize2)>0){$compfilesize = (min($compfilesize1, $compfilesize2)/max($compfilesize1, $compfilesize2));}else{$compfilesize = 0;}
if(($compwordcount1+$compwordcount2)>0){$compwordcount = (min($compwordcount1, $compwordcount2)/max($compwordcount1, $compwordcount2));}else{$compwordcount = 0;}
if(($countintersect1+$countintersect2)>0){$countintersect = (min($countintersect1, $countintersect2)/max($countintersect1, $countintersect2));}else{$countintersect = 0;}
$compresult = (round(($complinebreaks+$compfilesize+$compwordcount+$countintersect), 4)/4);
if ($compresult>=0.83){
echo "
PUTTING IN comp $title1namehtml $title2namehtml
";
$linkout = "<li><div class=\"simfiles\"><span itemprop=\"relatedLink\"><a itemprop=\"url\" href=\"$title1namehtml\">$title1</a></span></div></li>";
file_put_contents("variables/$title2name.linksout", $linkout, FILE_APPEND);
$linkin = "<li><div class=\"simfiles\"><span itemprop=\"relatedLink\"><a itemprop=\"url\" href=\"$title2namehtml\">$title2</a></span></div></li>";
file_put_contents("variables/$title1name.linksout", $linkin, FILE_APPEND);
}}}}
//here file put contents
//to mark that the file in that $versionfile was checked
//file_put_contents("variables/$title1name.lastversion", "$versionfile");
}}
echo "finished titleglob comparison
";