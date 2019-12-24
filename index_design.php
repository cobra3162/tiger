<?
include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "";
include_once("./_head_design.php");
?>

<!-- 메인화면 최신글 시작 -->
<table width="100%" cellpadding=0 cellspacing=0><tr>
<?
//  최신글
$sql = " select bo_table, bo_subject from $g4[board_table] order by gr_id, bo_table ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 스킨은 입력하지 않을 경우 관리자 > 환경설정의 최신글 스킨경로를 기본 스킨으로 합니다.

    // 사용방법
    // latest(스킨, 게시판아이디, 출력라인, 글자수);
	echo "<td valign=top width=50%>";
	echo latest("basic", $row['bo_table'], 10, 70);
    echo "<p>\n</td>";
}
?>
</tr></table>
<!-- 메인화면 최신글 끝 -->


<!-- 메인화면 최신글 시작 -->
<!--table width="252" border="0" cellspacing="0" cellpadding="0" align=center>	-->
<?
//   공지형 게시판 for 그누보드 4
$sql = "select wr_id,wr_subject,wr_datetime from g4_write_notice order by wr_id desc limit 0,5";
$result = mysql_query($sql);
if (!$result) {
	echo "query error";
	exit;
}

// 게시판리스트 링크  /gboard/bbs/board.php?bo_table=BOARDID
		
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
<!-- 메인화면 최신글 끝 -->

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
						<!----- ##### 아이콘 시작 ------>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><!-- 1번 아이콘 -->
									<a href="#"><img src="/images/ico01.gif" onmouseover="this.src='/images/ico01_over.gif'" onmouseout="this.src='/images/ico01.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 2번 아이콘 -->
									<a href="#"><img src="/images/ico02.gif" onmouseover="this.src='/images/ico02_over.gif'" onmouseout="this.src='/images/ico02.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 3번 아이콘 -->
									<a href="#"><img src="/images/ico03.gif" onmouseover="this.src='/images/ico03_over.gif'" onmouseout="this.src='/images/ico03.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 4번 아이콘 -->
									<a href="#"><img src="/images/ico04.gif" onmouseover="this.src='/images/ico04_over.gif'" onmouseout="this.src='/images/ico04.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 5번 아이콘 -->
									<a href="#"><img src="/images/ico05.gif" onmouseover="this.src='/images/ico05_over.gif'" onmouseout="this.src='/images/ico05.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 6번 아이콘 -->
									<a href="#"><img src="/images/ico06.gif" onmouseover="this.src='/images/ico06_over.gif'" onmouseout="this.src='/images/ico06.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 7번 아이콘 -->
									<a href="#"><img src="/images/ico07.gif" onmouseover="this.src='/images/ico07_over.gif'" onmouseout="this.src='/images/ico07.gif'" border="0"></td>
							</tr>
						</table></td>
						<!----- ##### 아이콘 끝 ------>
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
    <td>경기구분</td>
    <td colspan=3>
        <input type=radio name='race_kind' value="h01" checked> 과천경마
        <input type=radio name='race_kind' value="h02" selected> 제주경마
        <input type=radio name='race_kind' value="h03" selected> 부산경마		
        <input type=radio name='race_kind' value="k01" selected> 광명경륜
        <input type=radio name='race_kind' value="k02" selected> 창원경륜
        <input type=radio name='race_kind' value="k03" selected> 부산경륜		
        <input type=radio name='race_kind' value="t01" selected> 미사리경정		        
    </td>
</tr>
<tr class='ht' height=25>
    <td>경기일</td>
    <td><!--<input type=text class=ed name='race_ year' size=4 value=2012>년<input type=text class=ed name='race_month' size=2 value=05>월 <input type=text class=ed name='race_day' size=2 value=03>일, 수요일-->
	<? 
	$weekday = date("w");
	if ($weekday==0) $weekday = '일';
	if ($weekday==1) $weekday = '월';
	if ($weekday==2) $weekday = '화';
	if ($weekday==3) $weekday = '수';
	if ($weekday==4) $weekday = '목';
	if ($weekday==5) $weekday = '금';
	if ($weekday==6) $weekday = '토';	

	$today = date ("Y년 m월 d일");
    echo $today." ".$weekday."요일";
	?>
	</td>
</tr>
</table>

<table width=100% align=center cellpadding=0 cellspacing=0 border=1>
		<tr>
			<td width=60 align=center>경기</td><td width=60 align=center>1착</td><td width=60 align=center>2착</td><td width=60 align=center>3착</td>
			<td width=40 align=center>딘승</td><td width=50 align=center>연승1 <br>복연승1</td><td width=50 align=center>연승2 <br>복연승2</td>
			<td width=50 align=center>연승3 <br>복연승3</td><td width=40 align=center>복승</td><td width=40 align=center>쌍승</td>
			<td width=40 align=center>쌍복승</td>
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
