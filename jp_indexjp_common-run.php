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
			<tr><td height=10></td></tr>
            <tr>
                <td valign="top"><table  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="/img/main/ticket_01.jpg"></td>
                  </tr>
			<tr><td height=10></td></tr>
          
				  <tr>
					<td align="center">
						<!----- ##### 아이콘 시작 ------>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><!-- 1번 아이콘 -->
									<a href="jp_ticket.php?race_kind=h01"><img src="/images/ico01.gif" onmouseover="this.src='/images/ico01_over.gif'" onmouseout="this.src='/images/ico01.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 2번 아이콘 -->
									<a href="jp_ticket.php?race_kind=h02"><img src="/images/ico02.gif" onmouseover="this.src='/images/ico02_over.gif'" onmouseout="this.src='/images/ico02.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 3번 아이콘 -->
									<a href="jp_ticket.php?race_kind=h03"><img src="/images/ico03.gif" onmouseover="this.src='/images/ico03_over.gif'" onmouseout="this.src='/images/ico03.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 4번 아이콘 -->
									<a href="jp_ticket.php?race_kind=k01"><img src="/images/ico04.gif" onmouseover="this.src='/images/ico04_over.gif'" onmouseout="this.src='/images/ico04.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 5번 아이콘 -->
									<a href="jp_ticket.php?race_kind=k02"><img src="/images/ico05.gif" onmouseover="this.src='/images/ico05_over.gif'" onmouseout="this.src='/images/ico05.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 6번 아이콘 -->
									<a href="jp_ticket.php?race_kind=k03"><img src="/images/ico06.gif" onmouseover="this.src='/images/ico06_over.gif'" onmouseout="this.src='/images/ico06.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 7번 아이콘 -->
									<a href="jp_ticket.php?race_kind=t01"><img src="/images/ico07.gif" onmouseover="this.src='/images/ico07_over.gif'" onmouseout="this.src='/images/ico07.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 8번 아이콘 -->
									<a href="jp_ticket.php?race_kind=jp"><img src="/images/jp_ico08.gif" onmouseover="this.src='/images/jp_ico08_over.gif'" onmouseout="this.src='/images/jp_ico08.gif'" border="0"></td>
							</tr>						<!--	<tr><td height=10></td></tr>
							<tr>
								<td><!-- 8번 아이콘 -->
									<!--<a href="ticket.php?race_kind=t01"><img src="/images/ico07.gif" onmouseover="this.src='/images/ico07_over.gif'" onmouseout="this.src='/images/ico07.gif'" border="0"></td>
							</tr>-->
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
			  <tr>
   <td colspan=2><img src="/img/main/result.jpg"></td>
                 <tr>
                <td height="10">&nbsp;</td>
              </tr>

</tr>

</table>

<?
if (!$race_kind ) $race_kind='0';

if( $race_kind=='0' ) { $chk0='checked'; }
elseif ($race_kind=='1')  {$chk1 = 'checked';  }
elseif ($race_kind=='2')  {$chk2 = 'checked';  }
elseif ($race_kind=='3')  {$chk3 = 'checked';  }
elseif ($race_kind=='4')  {$chk4 = 'checked'; }
elseif ($race_kind=='5')  {$chk5 = 'checked'; }
elseif ($race_kind=='6')  {$chk6 = 'checked'; }
elseif ($race_kind=='7')  {$chk7 = 'checked'; }
elseif ($race_kind=='8')  {$chk8 = 'checked'; }
elseif ($race_kind=='9')  {$chk9 = 'checked'; }
elseif ($race_kind=='10')  {$chk10 = 'checked'; }
elseif ($race_kind=='11')  {$chk11 = 'checked'; }
elseif ($race_kind=='12')  {$chk12 = 'checked';  }
elseif ($race_kind=='13')  {$chk13 = 'checked';  }
elseif ($race_kind=='14')  {$chk14 = 'checked'; }
elseif ($race_kind=='15')  {$chk15 = 'checked'; }
elseif ($race_kind=='16')  {$chk16 = 'checked'; }
elseif ($race_kind=='17')  {$chk17 = 'checked'; }
elseif ($race_kind=='18')  {$chk18 = 'checked'; }

$sql = "select * from jp_raceinput where race_kind='$race_kind' order by no desc limit 1";
echo $sql;
$res = sql_query($sql);

//while ( $row = sql_fetch_array($res) ) {

    if ($row = sql_fetch_array($res)) {
	$no = $row[no];
	$sqlr = "select count(*) as cnt from jp_raceresult where race_no = $no ";
	echo "<br>".$sqlr;
   	$rowr = sql_fetch($sqlr);
	$cntres = $rowr[cnt];
	echo "<br>".$cntres;
	}else $res_str="경기정보가 입력되지 않았습니다"; 

	if ($cntres > 0) {
		$sqlno = "select no from jp_raceresult where race_no = $no ";
		$rowno = sql_fetch($sqlno);
		$resno = $rowno[no];
			echo "<br>".$resno;

	$sqlres = "select * from jp_raceresult where no = $resno ";
	//echo $sqlres;

	$rowres = sql_fetch($sqlres);

	$race_no =  $rowres[race_no];
	$racedate = $row[race_date];

	//echo "날짜 $racedate";

	$num_race = $row[num_race];

	$no = $rowres[no];

		//break;
	}

//$res_str='임시';

    else $res_str = "경기결과가 입력되지 않았습니다"; 
/*	if (!$res && !$resno) {
		$res_str = "경기정보가 입력되지 않았습니다";
	} else if ($res) {
		$res_str = "경기결과가 입력되지 않았습니다";
		$racedate = $row[race_date];
	} else {
*/

//	}

//echo $res_str."<br>";
//echo "num_race = $num_race";

//}

?>

<table width=100% align=left>
	<tr class='ht' height=25>
		<td>경기구분</td>
		<td colspan=3>

<?		$place0 ="나고야";
        $place1 = "미즈사와";
        $place2 = "사가";
        $place3 = "삿포로";
        $place4 = "소노다";
        $place5 = "아라오";
		$place6 = "오비히로";
		$place7 ="우라와";
        $place8 ="카나지와";
        $place9 ="코치";
        $place10 = "쿠야마";
        $place11 ="후나바시";
        $place12="카와사키";
        $place13="아시히키오";
        $place14="카사마츠";
        $place15="오오이";
        $place16="몬베츠";
        $place17="히메지";

		for ($i=0;$i<18;$i++) {
			$imsichk = 'chk'.$i;
			$imsiplace = 'place'.$i;
			echo "<input type=radio name='race_kind' value=$i ${$imsichk} onclick=\"goResult($i);\">${$imsiplace} ";
		}    

	?>
			<!--<input type=radio name='race_kind' value='h01' <?=$chk1?> onclick="goResult(1);"> 과천경마
			<input type=radio name='race_kind' value='h02' <?=$chk2?> onclick="goResult(2);"> 제주경마
			<input type=radio name='race_kind' value="h03" <?=$chk3?> onclick="goResult(3);"> 부산경마		
			<input type=radio name='race_kind' value="k01" <?=$chk4?> onclick="goResult(4);"> 광명경륜
			<input type=radio name='race_kind' value="k02" <?=$chk5?> onclick="goResult(5);"> 창원경륜
			<input type=radio name='race_kind' value="k03" <?=$chk6?> onclick="goResult(6);"> 부산경륜		
			<input type=radio name='race_kind' value="t01" <?=$chk7?> onclick="goResult(7);"> 미사리경정
			<input type=radio name='race_kind' value="t01" <?=$chk7?> onclick="goResultJp();"> 일본경마			-->
		</td>
	</tr>


	<tr class='ht' height=25>
		<td>경기결과</td>
		<td colspan=3><!--<input type=text class=ed name='race_ year' size=4 value=2012>년<input type=text class=ed name='race_month' size=2 value=05>월 <input type=text class=ed name='race_day' size=2 value=03>일, 수요일-->
		<? 
		$weekday = date("w");
		if ($weekday==0) $weekday = '일';
		if ($weekday==1) $weekday = '월';
		if ($weekday==2) $weekday = '화';
		if ($weekday==3) $weekday = '수';
		if ($weekday==4) $weekday = '목';
		if ($weekday==5) $weekday = '금';
		if ($weekday==6) $weekday = '토';	

		$today = date ("m-d");
		//echo $res_str." ".$racedate." (Today ".$today." ".$weekday.")";
		echo $racedate." (Today ".$today." ".$weekday.")";
		?>
		</td>
	</tr>

<tr>
		<td colspan=4>
			<table width="100%"  border="0" cellpadding="1" cellspacing="1" bgcolor="cbac6f"><!--bgcolor="e0dad6" -->
			  <tr align="center">
				<td colspan="10" bgcolor="e0dad6"></td>
			  </tr>
		<tr  bgcolor="#e0dad6">
			<td width=60 align=center class="txt_main1">경기</td><td width=60 align=center class="txt_main1">1착</td><td width=60 align=center class="txt_main1">2착</td><td width=60 align=center class="txt_main1">3착</td>
			<td width=40 align=center class="txt_main1">단승</td><td width=50 align=center class="txt_main1">연승1 <br>복연승1</td><td width=50 align=center class="txt_main1">연승2 <br>복연승2</td>
			<td width=50 align=center class="txt_main1">연승3 <br>복연승3</td><td width=40 align=center class="txt_main1">복승</td><td width=40 align=center>쌍승</td>
			<td width=40 align=center class="txt_main1">삼복승</td>
        </tr>

<?
	if (!$resno) {
		echo "<tr bgcolor='#e0dad6'><td colspan=11 align=center class='txt_main1' height=25>$res_str</td></tr>";
	} 

	for ($i=1; $i<= $num_race; $i++)  {
	
/*	$sqlcnt = "select count(*) as cnt from raceresult where race_ser_no = $i and race_no=$race_no";
	$rowcnt = sql_fetch($sqlcnt);
	$cnt = $rowcnt[cnt];
	if ($cnt < 1) break;
*/
	$sql2 = "select * from jp_raceresult where race_ser_no = $i and race_no=$race_no";
	//echo $sql2;

	$row2 = sql_fetch($sql2);
	if (!$row2) continue;
	
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

	if ($arrv01) { $arrv01 = "<img src='/images/number/".$arrv01.".jpg' align=bottom>";}
	else {$arrv01 = ''; $arrv_name01=''; }
	if ($arrv02) { $arrv02 = "<img src='/images/number/".$arrv02.".jpg' align=bottom>"; }
	else {   $arrv02 = ''; $arrv_name02=''; }
	if ($arrv03) { $arrv03 = "<img src='/images/number/".$arrv03.".jpg' align=bottom>";}
	else {  $arrv03 = ''; $arrv_name03=''; }

	echo "
		<tr bgcolor=#ffffff height=25>
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
   }
?>
</table>
</td>
</tr>
</table>

<script language="JavaScript">
function goResult(kind) {
	var kind;
	<?
	for ($i=0;$i<18;$i++) {
		echo " if ( kind == $i ) { document.fgo_result.race_kind.value ='$i'; } ";
	}
	?>
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
