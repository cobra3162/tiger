<?
include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "뉴스/공지사항";
include_once("./_head.php");


$token = get_token();

$year = date(Y);
$month = date(m);
$day = date(d);

if ($search != 'yes') { 
	$from_year = $year; $from_month = $month; $from_day = $day;
	$to_year = $year; $to_month = $month; $to_day = $day;
}

?>

<table width=80% align=left>
	<tr>
		<td>
		<IFRAME name="newmain" allowtransparency="true" border=0 src="/bbs/board.php?bo_table=notice"
		frameBorder=0 width=720 height="700" scrolling=no onload="resizeHeight(this)"></iframe>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
</td>
</tr>
</table>


<?
include_once("./_tail.php");
?>
