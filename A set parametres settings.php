echo "starting up
";

$dateprocessstart = date("Y-m-d-H-i-s");
$version = date("Ymd");
$versionfile = date("YmdHis");
$datepublished = date("Y-m-dTH:i:s");
$schemadatepublished = $datepublished;
$dateprocessstart2 = time();
$dateprocessmicrostart = microtime();
$author = "Javo Lee";
$domain = "http://www.javolee.com";
$year = "2017";
$script = __FILE__;
$scriptname = basename($script);
$scriptdir = getcwd();
$scriptpath = realpath($script);
echo "loading parametres
";
$versionlast = file_get_contents("reports/versionfile.txt");

$countotherextent = 0;
//here add replace str or preg of all typos, extracted from previous converter
//also add replace of "<" into "&lsaquo;" and ">" into "&rsaquo;" in the content files into HTML code tag sequences, to avoid the text content being misperceived by the browser as HTMl code
$symbolspolskie = array("ę", "ó", "ł", "ś", "ą", "ż", "ź", "ć", "ń", "websiteinfo ");
//,"rz", "sz", "dż", "dź");
//maybe also remove template from here and have it removed afterwards? but why not leave it
//this varialbr also is used in filename title function, getting template out of the name but leaving it for comparison
$symbolspolskiereplace = array("&#281;", "&#243;", "&#322;", "&#347;", "&#261;", "&#380;", "&#378;", "&#263;", "&#324;", "");
$s1 = ";";
$s2 = "@";
$s3 = "$";
$s4 = "%";
$s5 = "^";
$s6 = "\*";
$s7 = "(";
$s8 = ")";
$s9 = "-";
$s10 = "_";
$s11 = "=";
$s12 = "+";
$s13 = "[";
$s14 = "{";
$s15 = "]";
$s16 = "}";
$s17 = ":";
$s18 = "\'";
$s19 = "\"";
$s20 = "\\";
$s21 = "|";
$s22 = "/";
$s23 = "<";
$s24 = ",";
$s25 = ">";
$s26 = ".";
$s27 = "?";
$s28 = "!";
$s29 = "§";
$s30 = "&#";
$s31 = "&";
$s32 = "#";
$s33 = "KTKTKT";
$sr1 = "&#59;";
$sr2 = "&#64;";
$sr3 = "&#36;";
$sr4 = "&#37;";
$sr5 = "&#94;";
$sr6 = "&#42;";
$sr7 = "&#40;";
$sr8 = "&#41;";
$sr9 = "&#45;";
$sr10 = "&#95;";
$sr11 = "&#61;";
$sr12 = "&#43;";
$sr13 = "&#91;";
$sr14 = "&#123;";
$sr15 = "&#93;";
$sr16 = "&#125;";
$sr17 = "&#58;";
$sr18 = "&#39;";
$sr19 = "&#34;";
$sr20 = "&#92;";
$sr21 = "&#124;";
$sr22 = "&#44;";
$sr23 = "&#60;";
$sr24 = "&#44;";
$sr25 = "&#62;";
$sr26 = "&#46;";
$sr27 = "&#63;";
$sr28 = "&#33;";
$sr29 = "&#167;";
$sr30 = "KTKTKT";
$sr31 = "&#38;";
$sr32 = "&#35;";
$sr33 = "&#";
$symbolsraw = array("$s1", "$s2", "$s3", "$s4", "$s5", "$s6", "$s7", "$s8", "$s9", "$s10", "$s11", "$s12", "$s13", "$s14", "$s15", "$s16", "$s17", "$s18", "$s19", "$s20", "$s21", "$s22", "$s23", "$s24", "$s25", "$s26", "$s27", "$s28");
$symbolsreplace = array("$sr1", "$sr2", "$sr3", "$sr4", "$sr5", "$sr6", "$sr7", "$sr8", "$sr9", "$sr10", "$sr11", "$sr12", "$sr13", "$sr14", "$sr15", "$sr16", "$sr17", "$sr18", "$sr19", "$sr20", "$sr21", "$sr22", "$sr23", "$sr24", "$sr25", "$sr26", "$sr27", "$sr28");

//$html = htmlspecialchars($data); doesn't change '' at all, so it's useless if nl2br is running
// replace more by making arrays that overlay each others cells
//replace the searched for $f phrases and find them exactly as they are written inbetween ""
//but ireplace also finds other case-adjustments of them and turns into exactly $r="" phrases
//same thing for preg replace - from Aba and aba to aba or Aba , to have them paralelly more cells have to be made
//so in html output we get <p>te .
$hf0 = "\r\n";
$hr0 = "";
$hf1 = "<br />";
$hr1 = "<br>";
$hf2 = "<br><br>";
$hr2 = "</p><p>";
$hf5 = "\t";
$hr5 = "&nbsp;";
//changing multiple spaces to single spaces, just to make the content code nicer
//without escape sequence code phrases because using \s didn't work
$hf6 = "  ";
$hr6 = " ";
$hf7 = "   ";
$hr7 = " ";
$hfind = array("$hf0", "$hf1", "$hf2", "$hf3", "$hf4", "$hf5", "$hf6", "$hf7");
$hreplace = array("$hr0", "$hr1", "$hr2", "$hr3", "$hr4", "$hr5", "$hr6", "$hr7");
$cf1 = " eac ";
$cr1 = " each ";
$cf2 = "hh";
$cr2 = "h";
$cf3 = "HH";
$cr3 = "H";
$cf4 = " cna ";
$cr5 = " can ";
$cf6 = " RE";
$cr7 = " Re";
$cf8 = " ar e";
$cr8 = " are ";
$cf9 = " thre ";
$cr9 = " there ";
$cf11 = " msot ";
$cr11 = " most ";
$cf12 = " tey ";
$cr12 = " they ";
$cf13 = " wa s";
$cr13 = " was ";
$cf14 = " wit ";
$cr14 = " with ";
$cf15 = " lsot ";
$cr15 = " lost ";
$cf16 = " ting ";
$cr16 = " thing ";
$cf17 = " ow ";
$cr17 = " how ";
$cf18 = " igh ";
$cr18 = " high ";
$cf19 = " wich ";
$cr19 = " which ";
$cf20 = " ina ";
$cr20 = " in a ";
$cf21 = " ahve ";
$cr21 = " have ";
$cf22 = "agaisnt";
$cr22 = "against";
$cf23 = " lvie";
$cr23 = " live";
$cf24 = " tink ";
$cr24 = " think ";
$cf25 = " tis ";
$cr25 = " this ";
$cf26 = " tkae ";
$cr26 = " take ";
$cf27 = " jsut ";
$cr27 = " just ";
$cf28 = " igh ";
$cr28 = " high ";
$cf29 = " msuic ";
$cr29 = " music ";
$cf30 = " qutie ";
$cr30 = " quite ";
$cf31 = " tey ";
$cr31 = " they ";
$cf32 = " adn ";
$cr32 = " and ";
$cf33 = " wich ";
$cr33 = " which ";
$cf34 = " tis ";
$cr34 = " this ";
$cf35 = " te ";
$cr35 = " the ";
$cf36 = " ow ";
$cr36 = " how ";
$cf37 = " lsit ";
$cr37 = " list ";
$cf38 = " urt ";
$cr38 = " hurt ";
$cf39 = " enoug ";
$cr39 = " enough ";
$cf40 = "toughts";
$cr40 = "thoughts";
$cf41 = " eb ";
$cr42 = " be ";
$cf43 = " anyoen ";
$cr43 = " anyone ";
$cf44 = " teir";
$cr44 = " their";
$cf45 = " mena ";
$cr45 = " mean ";
//maybe there is a way to list all $symbolNUMBERS but I don't know it yet so manual input:
$find = array ("$cf1", "$cf2", "$cf3", "$cf4", "$cf5", "$cf6", "$cf7", "$cf8", "$cf9", "$cf10", "$cf11", "$cf12", "$cf13", "$cf14", "$cf15", "$cf16", "$cf17", "$cf18", "$cf19", "$cf20", "$cf21", "$cf22", "$cf23", "$cf24", "$cf25", "$cf26", "$cf27", "$cf28", "$cf29", "$cf30", "$cf31", "$cf32", "$cf33", "$cf34", "$cf35", "$cf36", "$cf37", "$cf38", "$cf39", "$cf40", "$cf41", "$cf42", "$cf43", "$cf44", "$cf45");
$replace = array ( "$cr1", "$cr2", "$cr3", "$cr4", "$cr5", "$cr6", "$cr7", "$cr8", "$cr9", "$cr10", "$cr11", "$cr12", "$cr13", "$cr14", "$cr15", "$cr16", "$cr17", "$cr18", "$cr19", "$cr20", "$cr21", "$cr22", "$cr23", "$cr24", "$cr25", "$cr26", "$cr27", "$cr28", "$cr29", "$cr30", "$cr31", "$cr32", "$cr33", "$cr34", "$cr35", "$cr36", "$cr37", "$cr38", "$cr39", "$cr40", "$cr41", "$cr42", "$cr43", "$cr44", "$cr45");
//ireplace changes found phrases in any case into exactly as replace cell is written
//we use replace, without i, because if charcters are high they use force
$df5 = "/";
$dr5 = "\\";
$dfind = array ("$df5");
$dreplace = array ("$dr5");

$wfind1 = " ";
$wfind2 = "websiteinfo ";
$wreplace1 = "-";
$wreplace2 = "";
$wfind = array("$wfind1", "$wfind2");
$wreplace = array("$wreplace1", "$wreplace2");

$output1raw =<<< HEADER
<!DOCTYPE html>
<head>
<meta itemprop="lang" content="R1LANG">
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>R1TITLE</title>
<meta itemscope itemtype="https://schema.org/Brand" itemprop="logo" content="favicon.ico"/>
<link rel="shortcut icon" href="favicon.ico">
<meta name="robots" content="index, follow"/>
<meta name="revisit-after" content="10 days"/>
SCHEMAMETA1
<meta itemscope itemtype="https://schema.org/WebPage" itemprop="name" content="R1TITLE"/>
<meta itemscope itemtype="https://schema.org/Article" itemprop="wordcount" content="R1SCHEMAWORDCOUNT"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="datePublished" content="R1SCHEMADATEPUBLISHED"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="dateModified" content="R1SCHEMADATEMODI"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="dateCreated" content="R1SCHEMADATECREA"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="copyrightYear" content="$year"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="version" content="R1VERSION"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="inLanguage" content="R1SCHEMALANG"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="isPartOf" content="R1DIRNAME"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="provider" content="$author"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="producer" content ="$author"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="creator" content ="$author"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="author" content="$author"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="copyrightHolder" content ="$author"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="publisher" content ="$author"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="license" content ="$domain/websiteinfo-terms-of-use-and-copyright-statement.html"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="accessMode" content="textual"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="accessModeSufficient" content="textual"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="accessibilityFeature" content="highContrast"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="accessibilityControl" content="fullMouseControl"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="accessibilityHazard" content="noFlashingHazard">
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="accessibilityHazard" content="noMotionSimulationHazard"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="accessibilityHazard" content="noSoundHazard"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
<style> 
.flex-container {
    display: -webkit-flex;
    display: flex;  
    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
    font-weight: bold;}
.flex-container2 {
    display: -webkit-flex;
    display: flex;  
    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
    font-weight: bold;
    text-align:center;
}
.flex-container3 {
    display: -webkit-flex;
    display: flex;  
    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
    font-weight: bold;
    text-align:center;
}
/*Copyright $year $author, shared under my Terms of use and copyright $domain/websiteinfo-terms-of-use-and-copyright-statement.html , which serve as the license of this template too.*/
.flex-container > * {
    padding: 6px;
    flex: 100%;
}
.body {max-width:600px;background:black;margin-left:auto; margin-right:auto;}
.header {background: coral; text-align:center;}
.footer {background: lightgreen; text-align:center;}
.info {text-align: center;}
.title {background: moccasin;}
.dates {background: cornflowerblue; text-align:center;}
.zone {background: violet;}
.article {background:white;padding-left:8%;padding-right:8%;}
.simfiles {background:white;text-align:center;}
.more {background:black;text-align:center;}
.donate {background:white;text-align:center;}
.counter {background:white;text-align:center;}
@media{
    .info {flex:1%;}
    .header {order:1;}  
    .footer  {padding:5px;flex:1%;}
    .copyright {order:2;flex:1%;}
    .terms {order:3;flex:1%;}
    .contact {order:4;flex:1%;}
    .title {order:5;flex:1%;} 
    .dates {order:6;flex:1%;}
    .zone {order: 7;}
    .article {order:8;}
    .space {order:9;padding:30px;}
    .more {order:10;flex:1%;}
    .flex-container2 {order:11;flex:1%;}
    .simfiles {order:12;flex:1%;padding:20px;}
	.last {order:13;flex:1%;}
    .donate {order:14;flex:1%;}
    .counter {order:15;flex:1%;}
}
</style>
</head>
<body class="body">
  <header class="header">You are now browsing the official website of $author and the original source of my content. Acceptance of Terms of use and copyright statement is mandatory.</header>
  <footer class="footer"><div class="flex-container3"><div class="copyright">Copyright $author $year</div><div class="terms"><a href="websiteinfo-terms-of-use-and-copyright-statement.html">Terms of use and copyright statement</a></div><div class="contact"><a href="websiteinfo-contact.html">Contact</a></div><div class="contact"><a href="websiteinfo-about.html">About</a></div></div></footer>
  <div class="flex-container">
<div class="info title" style="padding:3%">R1TITLE</div>
  <div class="dates"><table>
  <tr>
    <td>first written at:</td>
    <td>R1DATECREA</td>
  </tr>
  <tr>
    <td>last modified:</td>
    <td>R1DATEMODI</td>
  </tr>
</table></div>
  <aside class="info zone" style="padding:3%">this article is from <br>R1DIRTRAIL .<br>R1DIRLINK</aside>
  <article class="article"><!-- Copyright $author $year, shared under my Terms of use $domain/websiteinfo-terms-of-use-and-copyright-statement.html , serving as the license for this content's publication.-->SCHEMAMETA2
HEADER;

$output3rawsim =<<< FOOTERSIM
SCHEMAMETA3
</article></div>
<div class="space"></div>
<div class="more"><div class="article">Similar articles (definitely similar but may be irrelevant):</div>
<div class="flex-container2" style="padding:7px;">R1SIMFILESLIST</div>
</div>
<div class="last"><div class="flex-container3"><div class="donate">If you'd like to tip me: BTC 1HzWBmDjc4SBuKPsPSgWQ953y4aLDHqhTn</div></div></div>
</body>
</html>
FOOTERSIM;

$output3rawnosim =<<< FOOTERNOSIM
SCHEMAMETA3
</article></div>
<div class="space"></div>
<div class="last"><div class="flex-container3"><div class="donate">If you'd like to tip me: BTC 1HzWBmDjc4SBuKPsPSgWQ953y4aLDHqhTn</div></div></div>
</body>
</html>
FOOTERNOSIM;

$dir = "source/";