
echo "creating report
";
$dateprocessend = date("Y-m-d-H-i-s");
$dateprocessend2 = time();
$dateprocessmicroend = microtime();
$dateprocessperiod = abs($dateprocessstart2 - $dateprocessend2);
//$dateprocessend - $dateprocessstart;
$dateprocessmicroperiod = abs($dateprocessmicroend - $dateprocessmicrostart);
//notepad doesnt always see all line breaks
//but all line breakls are put in properly
//and vivaldi sees both windows and unix and the \n and \r\n  - all of them are put in and work, it's just notepad fault
$report0 = "Script named $scriptname ran in $scriptdir at $dateprocessstart,\r\n
ended at $dateprocessend, took $dateprocessperiod seconds $dateprocessmicroperiod.\r\n
path trail: $scriptpath.\r\n
Found $countallfiles files, $count0 were empty and ignored, $filecountnew were new from $filecoun all processable of which $counttxt were txt and $countpolski Polish.\r\n
Compared $countcompnew new files of all $countcompa comparable.
Found $countdir directories, made them all into html list pages.
Found files which need their source filename or folder changed to avoid being overwritten with/by other files that already exist under same name: 
$samefiles .
Found Polish files: 
$polish .
Found $countotherextent other extensions: \r\n
$otherextent .";
$report = $report0;
$reportname = $dateprocessend;
file_put_contents("reports/" . $reportname. ".1st", $report);
file_put_contents("reports/versionfile.txt", "$versionfile");
echo "done";