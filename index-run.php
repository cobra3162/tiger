<?
include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "";
include_once("./_head.php");
?>

<!-- ����ȭ�� �ֽű� ���� -->
<table width="100%" cellpadding=0 cellspacing=0><tr>
<?
//  �ֽű�
$sql = " select bo_table, bo_subject from $g4[board_table] order by gr_id, bo_table ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    // �� �Լ��� �ٷ� �ֽű��� �����ϴ� ������ �մϴ�.
    // ��Ų�� �Է����� ���� ��� ������ > ȯ�漳���� �ֽű� ��Ų��θ� �⺻ ��Ų���� �մϴ�.

    // �����
    // latest(��Ų, �Խ��Ǿ��̵�, ��¶���, ���ڼ�);
	echo "<td valign=top width=50%>";
	echo latest("basic", $row['bo_table'], 10, 70);
    echo "<p>\n</td>";
}
?>
</tr></table>
<!-- ����ȭ�� �ֽű� �� -->


<!-- ����ȭ�� �ֽű� ���� -->
<!--table width="252" border="0" cellspacing="0" cellpadding="0" align=center>	-->
<?
//   ������ �Խ��� for �״����� 4
$sql = "select wr_id,wr_subject,wr_datetime from g4_write_notice order by wr_id desc limit 0,5";
$result = mysql_query($sql);
if (!$result) {
	echo "query error";
	exit;
}

// �Խ��Ǹ���Ʈ ��ũ  /gboard/bbs/board.php?bo_table=BOARDID
		
		$total = mysql_num_rows($result);

		for($i=1; $i<=$total; $i++) {
			$data1 = mysql_fetch_array($result);
			
			// $w_date = date("[Y-m-d]", $data1[wr_datetime]);
			$w_date = "[".substr($data1[wr_datetime],2,8)."]";

			$string_num=28;
			$data1[wr_subject] = stripslashes($data1[wr_subject]);
			for($j=0;$j<$string_num;$j++){
				if(ord(substr($data1[wr_subject],$j,1))>127)
					$j++;
			}

			if($string_num < strlen($data1[wr_subject])) {
				$data1[wr_subject] = substr($data1[wr_subject],0,$j)."..";
			}
			/*echo "
						<tr><td><a href=''>$data1[wr_subject]</a></td>
							<td align='right'>$w_date</td></tr>";
			*/
		}
?>
<!--</table>-->
<!-- ����ȭ�� �ֽű� �� -->

<table width=100% align=center cellpadding=0 cellspacing=0 >
			<tr><td height=10></td></tr>
            <tr>
                <td valign="top"><table  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="/img/main/ticket_01.jpg"></td>
                  </tr>
			<tr><td height=10></td></tr>
          
				  <tr>
					<td align="center">
						<!----- ##### ������ ���� ------>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><!-- 1�� ������ -->
									<a href="ticket.php?race_kind=h01"><img src="/images/ico01.gif" onmouseover="this.src='/images/ico01_over.gif'" onmouseout="this.src='/images/ico01.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
								<td><!-- 2�� ������ -->
									<a href="ticket.php?race_kind=h02"><img src="/images/ico02.gif" onmouseover="this.src='/images/ico02_over.gif'" onmouseout="this.src='/images/ico02.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
								<td><!-- 3�� ������ -->
									<a href="ticket.php?race_kind=h03"><img src="/images/ico03.gif" onmouseover="this.src='/images/ico03_over.gif'" onmouseout="this.src='/images/ico03.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
								<td><!-- 4�� ������ -->
									<a href="ticket.php?race_kind=k01"><img src="/images/ico04.gif" onmouseover="this.src='/images/ico04_over.gif'" onmouseout="this.src='/images/ico04.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
								<td><!-- 5�� ������ -->
									<a href="ticket.php?race_kind=k02"><img src="/images/ico05.gif" onmouseover="this.src='/images/ico05_over.gif'" onmouseout="this.src='/images/ico05.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
								<td><!-- 6�� ������ -->
									<a href="ticket.php?race_kind=k03"><img src="/images/ico06.gif" onmouseover="this.src='/images/ico06_over.gif'" onmouseout="this.src='/images/ico06.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
								<td><!-- 7�� ������ -->
									<a href="ticket.php?race_kind=t01"><img src="/images/ico07.gif" onmouseover="this.src='/images/ico07_over.gif'" onmouseout="this.src='/images/ico07.gif'" border="0"></td>
							</tr>
						</table></td>
						<!----- ##### ������ �� ------>
				</tr>
					</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="25">&nbsp;</td>
              </tr>
			  <tr>
   <td colspan=2><img src="/img/main/result.jpg"></td>
                 <tr>
                <td height="10">&nbsp;</td>
              </tr>

</tr>

</table>

<?
if (!$race_kind ) $race_kind='h01';

if( $race_kind=='h01') { $chk1='checked'; }
elseif ($race_kind=='h02')  {$chk2 = 'checked';  }
elseif ($race_kind=='h03')  {$chk3 = 'checked';  }
elseif ($race_kind=='k01')  {$chk4 = 'checked'; }
elseif ($race_kind=='k02')  {$chk5 = 'checked'; }
elseif ($race_kind=='k03')  {$chk6 = 'checked'; }
elseif ($race_kind=='t01')  {$chk7 = 'checked'; }

$sql = "select * from raceinput where race_kind='$race_kind' order by no desc";
//echo $sql;
$res = sql_query($sql);

while ( $row = sql_fetch_array($res) ) {
	
	$no = $row[no];
	$sqlr = "select count(*) as cnt from raceresult where race_no = $no ";
	//echo "<br>".$sqlr;
   	$rowr = sql_fetch($sqlr);
	$cntres = $rowr[cnt];

	if ($cntres > 0) {
		$sqlno = "select no from raceresult where race_no = $no ";
		$rowno = sql_fetch($sqlno);
		$resno = $rowno[no];
		break;
	}
}

$sqlres = "select * from raceresult where no = $resno ";
//echo $sqlres;

$rowres = sql_fetch($sqlres);

$race_no =  $rowres[race_no];
$racedate = $row[race_date];

// echo "��¥ $racedate";

$num_race = $row[num_race];

$no = $rowres[no];

//echo "num_race = $num_race";

?>

<table width=100% align=left>
	<tr class='ht' height=25>
		<td>��ⱸ��</td>
		<td colspan=3>
			<input type=radio name='race_kind' value='h01' onclick="goResult(1);"> ��õ�渶
			<input type=radio name='race_kind' value='h02' onclick="goResult(2);"> ���ְ渶
			<input type=radio name='race_kind' value="h03"  onclick="goResult(3);"> �λ�渶		
			<input type=radio name='race_kind' value="k01"  onclick="goResult(4);"> ������
			<input type=radio name='race_kind' value="k02"  onclick="goResult(5);"> â�����
			<input type=radio name='race_kind' value="k03" onclick="goResult(6);"> �λ���		
			<input type=radio name='race_kind' value="t01"  onclick="goResult(7);"> �̻縮����		        
		</td>
	</tr>

	<tr class='ht' height=25>
		<td>�����</td>
		<td colspan=3><!--<input type=text class=ed name='race_ year' size=4 value=2012>��<input type=text class=ed name='race_month' size=2 value=05>�� <input type=text class=ed name='race_day' size=2 value=03>��, ������-->
		<? 
		$weekday = date("w");
		if ($weekday==0) $weekday = '��';
		if ($weekday==1) $weekday = '��';
		if ($weekday==2) $weekday = 'ȭ';
		if ($weekday==3) $weekday = '��';
		if ($weekday==4) $weekday = '��';
		if ($weekday==5) $weekday = '��';
		if ($weekday==6) $weekday = '��';	

		$today = date ("m-d");
		echo $racedate." (Today ".$today." ".$weekday.")";
		?>
		</td>
	</tr>
	<tr>
		<td colspan=4>
			<table width="700"  border="0" cellpadding="1" cellspacing="1" bgcolor="cbac6f"><!--bgcolor="e0dad6" -->
			  <tr align="center">
				<td colspan="8" bgcolor="e0dad6"></td>
			  </tr>
		
	
		<tr  bgcolor="#e0dad6">
			<td width=60 align=center class="txt_main1">���</td><td width=60 align=center class="txt_main1">1��</td><td width=60 align=center class="txt_main1">2��</td><td width=60 align=center class="txt_main1">3��</td>
			<td width=40 align=center class="txt_main1">�ܽ�</td><td width=50 align=center class="txt_main1">����1 <br>������1</td><td width=50 align=center class="txt_main1">����2 <br>������2</td>
			<td width=50 align=center class="txt_main1">����3 <br>������3</td><td width=40 align=center class="txt_main1">����</td><td width=40 align=center>�ֽ�</td>
			<td width=40 align=center class="txt_main1">�ֺ���</td>
        </tr>

<?

for ($i=1; $i<= $num_race; $i++)  {
	
/*	$sqlcnt = "select count(*) as cnt from raceresult where race_ser_no = $i and race_no=$race_no";
	$rowcnt = sql_fetch($sqlcnt);
	$cnt = $rowcnt[cnt];
	if ($cnt < 1) break;
*/
	$sql2 = "select * from raceresult where race_ser_no = $i and race_no=$race_no";
	//echo $sql2;

	$row2 = sql_fetch($sql2);
	if (!$row2) break;
	
	$raceno = $row2[race_ser_no];

	$arrv01 = $row2[arrv01];
	$arrv02 = $row2[arrv02];
	$arrv03 = $row2[arrv03];
	$arrv_name01 = $row2[arrv_name01];
	$arrv_name02 = $row2[arrv_name02];
	$arrv_name03 = $row2[arrv_name03];

	$single = $row2[single];
	$s01 = $row2[s01];
	$s02 = $row2[s02];
	$s03 = $row2[s03];
	$ss01 = $row2[ss01];
	$ss02 = $row2[ss02];
	$ss03 = $row2[ss03];
	$doubl = $row2[doubl];
	$pair = $row2[pair];
	$ddd = $row2[ddd];

	if ($arrv01) { $arrv01 = "<img src='/images/number/".$arrv01.".gif' align=absmiddle>";}
	else {$arrv01 = ''; $arrv_name01=''; }
	if ($arrv02) { $arrv02 = "<img src='/images/number/".$arrv02.".gif' align=absmiddle>"; }
	else {   $arrv02 = ''; $arrv_name02=''; }
	if ($arrv03) { $arrv03 = "<img src='/images/number/".$arrv03.".gif' align=absmiddle>";}
	else {  $arrv03 = ''; $arrv_name03=''; }
	echo "
	<tr bgcolor=#ffffff>
		<td align=center>$raceno</td>
		<td align=left width=100>&nbsp;$arrv01&nbsp;$arrv_name01</td>
		<td align=left width=100>&nbsp;$arrv02&nbsp;$arrv_name02</td>
		<td align=left width=100>&nbsp;$arrv03&nbsp;$arrv_name03</td>
		<td align=center>$single</td>
		<td align=center height=40>$s01 <br> $ss01</td>
		<td align=center height=40>$s02 <br> $ss02</td>
		<td align=center height=40>$s03 <br> $ss03</td>
		<td align=center>$doubl</td>
		<td align=center>$pair</td>
		<td align=center>$ddd</td>
	</tr>";
	//break;
}

echo "
</table>
</td>
</tr>
</table>";
?>

<script language="JavaScript">
function goResult(kind) {
	var kind;
	if ( kind == 1 ) 	{ document.fgo_result.race_kind.value ='h01'; }
	if ( kind == 2 ) 	{ document.fgo_result.race_kind.value = 'h02'; }
	if ( kind == 3 )    { document.fgo_result.race_kind.value = 'h03'; }
	if ( kind == 4 ) 	{ document.fgo_result.race_kind.value = 'k01'; }
	if ( kind == 5 ) 	{ document.fgo_result.race_kind.value = 'k02'; }
	if ( kind == 6 ) 	{ document.fgo_race.race_kind.value = 'k03'; }
	if ( kind == 7 ) 	{ document.fgo_result.race_kind.value = 't01'; }

    document.fgo_result.race_date.value = <?=$race_date?> ;
    document.fgo_result.submit();
}
</script>

<form name=fgo_result method=post  action="<?=$PHP_SELF?>">
<input type=hidden name=race_kind>
<input type=hidden name=race_date>
</form>



<?
include_once("./_tail.php");
?>
