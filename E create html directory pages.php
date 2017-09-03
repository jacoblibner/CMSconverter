
echo "starting directory lists
";
$dirprocess = glob('dirlist/*');
foreach ($dirprocess as $dirkey=>$dirvalue) {
$countdirs++;
$countdir = $countdirs;
$basename = basename($dirvalue, ".dir");
echo "converting $countdir - $basename
";
$contentraw = file_get_contents($dirvalue);
$title = str_replace("-", " ", $basename);
//if file book exists
//$book = file_get_contents("variables/$basename.book");
//https://schema.org/CollectionPage
//itempage for book's page
//insert ISBN if its book has it

$outputdir =<<<HEADERDIR
<!DOCTYPE html>
<head>
<meta itemprop="lang" content="en">
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>$title</title>
<meta itemscope itemtype="https://schema.org/Brand" itemprop="logo" content="favicon.ico"/>
<link rel="shortcut icon" href="favicon.ico">
<meta name="robots" content="index, follow"/>
<meta name="revisit-after" content="10 days"/>
<meta itemscope itemtype="https://schema.org/WebPage" itemprop="CollectionPage"/>
<meta itemscope itemtype="https://schema.org/Book" itemprop="name" content="$title"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="datePublished" content="$schemadatepublished"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="copyrightYear" content="$year"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="version" content="$version"/>
<meta itemscope itemtype="https://schema.org/CreativeWork" itemprop="inLanguage" content="en-GB"/>
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
/*Copyright $year $author, shared under my Terms of use and copyright , which serve as the license of this template too.*/
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
<div class="info title" style="padding:3%">$title</div><article class="article"><!-- Copyright $author $year, shared under my Terms of use, serving as the license for this content's publication.--><span itemscope itemtype="https://schema.org/CollectionPage" itemprop="mainContentOfPage">
HEADERDIR;

$footerdir=<<< FOOTERDIR
</span></article></div>
<div class="space"></div>
<div class="last"><div class="flex-container3"><div class="donate">If you'd like to tip me: BTC 1HzWBmDjc4SBuKPsPSgWQ953y4aLDHqhTn</div></div></div>
</body>
</html>
FOOTERDIR;

$output2 = "<ul>$contentraw</ul>";
$output1 = $outputdir;
$output3 = $footerdir;
$contenthtml = $output1.$output2.$output3;
file_put_contents("html/$basename.html", $contenthtml);
}
