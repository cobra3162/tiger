<?
include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "";
include_once("./_head_design.php");
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
            <tr>
                <td valign="top"><table  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="/img/main/ticket_01.jpg"></td>
                  </tr>
                  <tr>
					<td>
						<table  border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><a href="ticket.php?race_kind=h01" ><img src="/img/main/ticket_02.jpg" border="0"></a></td>
								<td><a href="ticket.php?race_kind=h02" ><img src="/img/main/ticket_03.jpg"  border="0"></a></td>
								<td><a href="ticket.php?race_kind=h03" ><img src="/img/main/ticket_04.jpg"  border="0"></a></td>
								<td><a href="ticket.php?race_kind=k01" ><img src="/img/main/ticket_05.jpg"  border="0"></a></td>
								<td><a href="ticket.php?race_kind=k02" ><img src="/img/main/ticket_06.jpg"  border="0"></a></td>
								<td><a href="ticket.php?race_kind=k03" ><img src="/img/main/ticket_07.jpg"  border="0"></a></td>
								<td><a href="ticket.php?race_kind=t01" ><img src="/img/main/ticket_08.jpg"  border="0"></a></td>
							</tr>
						</table>
					</td>
					</tr>
				  <tr>
					<td align="center">
						<!----- ##### ������ ���� ------>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><!-- 1�� ������ -->
									<a href="#"><img src="/images/ico01.gif" onmouseover="this.src='/images/ico01_over.gif'" onmouseout="this.src='/images/ico01.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
								<td><!-- 2�� ������ -->
									<a href="#"><img src="/images/ico02.gif" onmouseover="this.src='/images/ico02_over.gif'" onmouseout="this.src='/images/ico02.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
								<td><!-- 3�� ������ -->
									<a href="#"><img src="/images/ico03.gif" onmouseover="this.src='/images/ico03_over.gif'" onmouseout="this.src='/images/ico03.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
								<td><!-- 4�� ������ -->
									<a href="#"><img src="/images/ico04.gif" onmouseover="this.src='/images/ico04_over.gif'" onmouseout="this.src='/images/ico04.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
								<td><!-- 5�� ������ -->
									<a href="#"><img src="/images/ico05.gif" onmouseover="this.src='/images/ico05_over.gif'" onmouseout="this.src='/images/ico05.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
								<td><!-- 6�� ������ -->
									<a href="#"><img src="/images/ico06.gif" onmouseover="this.src='/images/ico06_over.gif'" onmouseout="this.src='/images/ico06.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
								<td><!-- 7�� ������ -->
									<a href="#"><img src="/images/ico07.gif" onmouseover="this.src='/images/ico07_over.gif'" onmouseout="this.src='/images/ico07.gif'" border="0"></td>
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
</table>


<table width=100% align=center cellpadding=0 cellspacing=0 border=1 align=center>
<tr class='ht' height=25>
    <td>��ⱸ��</td>
    <td colspan=3>
        <input type=radio name='race_kind' value="h01" checked> ��õ�渶
        <input type=radio name='race_kind' value="h02" selected> ���ְ渶
        <input type=radio name='race_kind' value="h03" selected> �λ�渶		
        <input type=radio name='race_kind' value="k01" selected> ������
        <input type=radio name='race_kind' value="k02" selected> â�����
        <input type=radio name='race_kind' value="k03" selected> �λ���		
        <input type=radio name='race_kind' value="t01" selected> �̻縮����		        
    </td>
</tr>
<tr class='ht' height=25>
    <td>�����</td>
    <td><!--<input type=text class=ed name='race_ year' size=4 value=2012>��<input type=text class=ed name='race_month' size=2 value=05>�� <input type=text class=ed name='race_day' size=2 value=03>��, ������-->
	<? 
	$weekday = date("w");
	if ($weekday==0) $weekday = '��';
	if ($weekday==1) $weekday = '��';
	if ($weekday==2) $weekday = 'ȭ';
	if ($weekday==3) $weekday = '��';
	if ($weekday==4) $weekday = '��';
	if ($weekday==5) $weekday = '��';
	if ($weekday==6) $weekday = '��';	

	$today = date ("Y�� m�� d��");
    echo $today." ".$weekday."����";
	?>
	</td>
</tr>
</table>

<table width=100% align=center cellpadding=0 cellspacing=0 border=1>
		<tr>
			<td width=60 align=center>���</td><td width=60 align=center>1��</td><td width=60 align=center>2��</td><td width=60 align=center>3��</td>
			<td width=40 align=center>���</td><td width=50 align=center>����1 <br>������1</td><td width=50 align=center>����2 <br>������2</td>
			<td width=50 align=center>����3 <br>������3</td><td width=40 align=center>����</td><td width=40 align=center>�ֽ�</td>
			<td width=40 align=center>�ֺ���</td>
        </tr>

<?
$race_date = date ("Y-m-d");
if (!$race_kind ) $race_kind='h01';

$sql = "select * from raceinput where race_date = '$race_date' and race_kind='$race_kind'";
//echo $sql;
$row = sql_fetch($sql);
$num_race = $row[num_race];
$no = $row[no];

for ($i=1; $i<= $num_race; $i++)  {

    $sql2 = "select * from raceresult where race_ser_no = $i and race_no=$no";
	//echo $sql2;

    $row2 = sql_fetch($sql2);

    if (!$row2) continue;
	$raceno = $row2[race_ser_no];

	$arrv01 = $row2[arrv01];
	$arrv02 = $row2[arrv02];
	$arrv03 = $row2[arrv03];
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

    echo "
    <tr bgcolor=#ffffff>
        <td align=center>$raceno</td>
        <td align=center>$arrv01</td>
        <td align=center>$arrv02</td>
        <td align=center>$arrv03</td>
        <td align=center>$single</td>
        <td align=center height=40>$s01 <br> $ss01</td>
        <td align=center height=40>$s02 <br> $ss02</td>
        <td align=center height=40>$s03 <br> $ss03</td>
        <td align=center>$doubl</td>
        <td align=center>$pair</td>
        <td align=center>$ddd</td>
	</tr>";
}
echo "
</table>";

include_once("./_tail.php");
?>
