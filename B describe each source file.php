
function all_files($dir) {
$files = Array();
$file_tmp= glob($dir.'*',GLOB_MARK | GLOB_NOSORT);

foreach($file_tmp as $item) {
if (substr($item,-1)!=DIRECTORY_SEPARATOR){
$files[] = $item;
}
else {
$files = array_merge($files,all_files($item));
}
}
return $files;
}

echo "starting allfiles list
";
foreach (all_files($dir) as $source) {
$enctest = null;
$enctestmes = null;
//this glob lists all files and puts information about them as ready-made variables into files to drag from by subsequent globs
$countallfiles++;
if (!(filesize($source)>0)){
$count0++;	
}
if (filesize($source)>0){
$filecount++;
$filecoun = $filecount;
$sourcepath = realpath($source);
$dcreated = filectime($source);
$dmodified = filemtime($source);
if ($dmodified >= $dcreated) {
$datecreated = $dcreated;
$datemodified = $dmodified;
};
if ($dmodified <= $dcreated) {
$datecreated = $dmodified;
$datemodified = $dcreated;
};
$ext = pathinfo($source, PATHINFO_EXTENSION);
$extent = $ext;
if ($extent != 'txt') {
$countotherextent++;
$otherextent = $otherextent . "$ext => $sourcepath\r\n";
}
if ($extent == 'txt') {
$counttxt++;
$dirtrail= str_replace($dfind, $dreplace, dirname($source));
$dirname = str_replace($dfind, $dreplace, basename($dirtrail));
$name = basename($source, ".txt");
$dname = str_replace(" ", "-", basename(dirname($source)));
$thename = $dname."-".reset(array_values(explode("%", str_replace(" ", "-", trim(wordwrap(preg_replace("/[^a-zA-Z0-9 ]+/", "", $name), 55, "%"))))));
$checksize = filesize($source);
if (file_exists("variables/$thename.filesize")){
$checksize2 = file_get_contents("variables/$thename.filesize");
}
if ("$checksize"!=="$checksize2"){
$titleput = ucfirst(strtolower(str_replace($symbolspolskie, $symbolspolskiereplace, basename($source, ".txt"))));
//$check1 = filesize($source);
//$check2 = file_get_contents("variables/$thename.filesize");
//if ("$check1"!=="$check2") {
$countnews++;
$countnew = $countnews;
$newslist = $newslist."
$thename";
$newfiles = $newfiles."X$titleput
";
echo "processing file number $counttxt - filesize comparison: $check1 $check2
";
$content1 = file_get_contents($source);
$content = $content1;
$enctest0 = preg_match("[]u", $content1);
$enctest0mes = array_flip(get_defined_constants(true)['pcre'])[preg_last_error()];
if ($enctest0mes=="PREG_BAD_UTF8_ERROR") {
$enctestunicode = iconv('windows-1250', 'UTF-8', $content1);
$enctestunicodemsg = preg_match("[]u", $enctestunicode);
$enctestunicodemes = array_flip(get_defined_constants(true)['pcre'])[preg_last_error()];
$content = $enctestunicode;
if (!(strlen($enctestunicode)>0)){
$content = $content1;
$enctestutfmsg = preg_match("[]u", $content);
$enctestutfmes = array_flip(get_defined_constants(true)['pcre'])[preg_last_error()];
if ($enctestutfmes=="PREG_BAD_UTF8_ERROR") {
$content = iconv('UTF-16','UTF-8',$content1);
}
}
}
$contentcheck = substr($content, 0, 60);
echo "contentcheck | filename: $name | dirname: $dirname
$contentcheck
";
$contentclean = str_replace($find, $replace,$content);
$lang = "en";
$schemalang = "en-US";
if (preg_match("[Ó|ó|ę|Ę|ą|Ą|ś|Ś|ł|Ł|ż|Ż|ź|Ź|ć|Ć|ń|Ń|dż|Dż|DŻ]u", $content)){
$lang = "pl";
$schemalang = "pl-PL";
$countpolski++;
$polish = $polish."$dirname : $name
";}
$dirlinkcode = str_replace(" ", "-", $dirname);
$dirlinkhtml = "<a href=\"$dirlinkcode.html\">$dirname</a>";
file_put_contents("variables/$thename.dirlink", $dirlinkhtml);
$thenamehtml = "$thename.html";
if (!(file_exists("dirlist/$dirlinkcode.dir"))or((strpos(file_get_contents("dirlist/$dirlinkcode.dir"), $thenamehtml)==false))) {
//if (!(preg_match("[$thenamehtml]", file_get_contents("dirlist/$dirlinkcode.dir")))){
echo "
PUTTING IN $thename $dirlinkcode
";
$linkfile = "<li><div class=\"simfiles\"><span itemprop=\"relatedLink\"><a itemprop=\"url\" href=\"$thenamehtml\">$name</a></span></div></li>";
file_put_contents("dirlist/$dirlinkcode.dir", $linkfile, FILE_APPEND);
}
file_put_contents("variables/$thename.procfilename", $thename);
file_put_contents("variables/$thename.lang", $lang);
file_put_contents("variables/$thename.schemalang", $schemalang);
file_put_contents("titles/$thename.title", $titleput);
file_put_contents("variables/$thename.sourcename", $name);
file_put_contents("variables/$thename.sourcepath", $sourcepath);
file_put_contents("variables/$thename.dirtrail", $dirtrail);
//dirtrail gives / and \ in the dirtrail 
file_put_contents("variables/$thename.dirname", $dirname);
file_put_contents("variables/$thename.schemadatecreated", date("Y-m-dTH:i:s", $datecreated));
file_put_contents("variables/$thename.datecreated", date("H:i, d.m.Y", $datecreated));
file_put_contents("variables/$thename.schemadatemodified", date("Y-m-dTH:i:s", $datemodified));
//j \of F, Y g:ia = 4 of October, 2016 2:34pm
file_put_contents("variables/$thename.datemodified", date("H:i, d.m.Y", $datemodified));
file_put_contents("variables/$thename.linebreaks", preg_match_all("/\n/", $content));
file_put_contents("variables/$thename.filesize", filesize($source));
file_put_contents("content/$thename.content", $contentclean);
file_put_contents("variables/$thename.words", strtolower(preg_replace("/[^a-zA-Z0-9']+/", " ", $contentclean)));
file_put_contents("variables/$thename.wordsunique", implode(" ", array_keys(array_count_values(explode(" ", strtolower(preg_replace("/[^a-zA-Z0-9']+/", " ", $contentclean)))))));
file_put_contents("variables/$thename.wordcount", count(explode(" ",  preg_replace("/[^a-zA-Z0-9']+/", " ", $contentclean))));
//$booknamefind = array ("");
//$booknamereplace = array ("");
//$bookname = str_replace($booknamefind, $booknamereplace, $dirname);
//if (preg_match("[k book ]", $sourcepath)) {
//get and save meta information to be fetched in html processing
//itemscope itemtype https://schema.org/Book
//isbnText The ISBN of the book - register all books that have k book i folder into isbn, 
//registering them as books published in the internet as something continous 
//but that precisely may prevent them from being marked as isbn
//so maybe make files for book, registering them and keeping those files under their descriptions
//isPartOf- and is a part of series ? https://schema.org/isPartOf
//booklink
//file_put_contents("books/$bookname.book", $content, FILE_APPEND);
//file_put_contents("variables/$thename.bookname", "This piece is a part of $bookname (add here link to book page with buy option)", FILE_APPEND);
//} 
//else { file_put_contents("variables/$thename.bookname", "This piece wasn't put into any book of mine.)", FILE_APPEND);}
//here's the possibility of creating the database for the search engine
//all unique words from the file add to the dump of all words
//have the engine search request seek the words that only are in the database
//then lead to which file added them
}}
file_put_contents("variables/$thename.version", "$versionfile");
}}
file_put_contents("reports/$versionfile-filecount.txt", "Found $filecount files, $counttxt text processable of which $countnew new will be processed.");
