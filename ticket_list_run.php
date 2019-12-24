<?
include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "구매내역";
include_once("./_head.php");

$token = get_token();

$year = date(Y);
$month = date(m);
$day = date(d);

if ($search != 'yes') { 
	$from_year = '2012'; $from_month = 5; $from_day = 1;
	$to_year = $year; $to_month = $month; $to_day = $day;
}

?>

<table width=100% align=left>
<tr> 
	<td><img src=/img/title_ticket.gif></td>
</tr>

	  <tr>
		<td height=5></td>
	  </tr>


	  <tr>
					<td align="center">
						<!----- ##### 아이콘 시작 ------>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><!-- 1번 아이콘 -->
									<a href="ticket.php?race_kind=h01"><img src="/images/ico01<?=$over_h01?>.gif" onmouseover="this.src='/images/ico01_over.gif'" onmouseout="this.src='/images/ico01.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 2번 아이콘 -->
									<a href="ticket.php?race_kind=h02"><img src="/images/ico02<?=$over_h02?>.gif" onmouseover="this.src='/images/ico02_over.gif'" onmouseout="this.src='/images/ico02.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 3번 아이콘 -->
									<a href="ticket.php?race_kind=h03"><img src="/images/ico03<?=$over_h03?>.gif" onmouseover="this.src='/images/ico03_over.gif'" onmouseout="this.src='/images/ico03.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 4번 아이콘 -->
									<a href="ticket.php?race_kind=k01"><img src="/images/ico04<?=$over_k01?>.gif" onmouseover="this.src='/images/ico04_over.gif'" onmouseout="this.src='/images/ico04.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 5번 아이콘 -->
									<a href="ticket.php?race_kind=k02"><img src="/images/ico05<?=$over_k02?>.gif" onmouseover="this.src='/images/ico05_over.gif'" onmouseout="this.src='/images/ico05.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 6번 아이콘 -->
									<a href="ticket.php?race_kind=k03"><img src="/images/ico06<?=$over_k03?>.gif" onmouseover="this.src='/images/ico06_over.gif'" onmouseout="this.src='/images/ico06.gif'" border="0"></td>
								<td><img src="/images/ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 7번 아이콘 -->
									<a href="ticket.php?race_kind=t01"><img src="/images/ico07<?=$over_t01?>.gif" onmouseover="this.src='/images/ico07_over.gif'" onmouseout="this.src='/images/ico07.gif'" border="0"></td>
							</tr>
						</table></td>
						<!----- ##### 아이콘 끝 ------>
				</tr>


	  <tr>
		<td height="10">&nbsp;</td>
	  </tr>

<tr>
<td>
<table  border="0" cellpadding="3" cellspacing="0">
                <form name="search" method="post">
				<input type=hidden name=search value=yes>
                  <tr>
                    <td>
<select name="race_kind">
<option value='' selected>전체경주장소</option>
<option value='h01' >과천경마</option>
<option value='h02' >제주경마</option>
<option value='h03' >부산경마</option>
<option value='k01' >광명경륜</option>
<option value='k02' >창원경륜</option>
<option value='k03' >부산경륜</option>
<option value='t01' >미사리경정</option>
</select></td>
<td>
<select name="bet_type">
<option value=''>전체승식</option>
<option value='pair'  >쌍승식</option>
<option value='doub'  >복승식</option>
<option value='ddd'  >삼복조</option>
<option value='ss'  >복연승</option>
<option value='sj'  >쌍조</option>
<option value='dj'  >복조</option>
</select></td>
<td>
				<select name=from_year>
					<? for ($i=2012;$i<=2015;$i++) {
						 if($from_year == $i) $str = "selected"; else $str='';
						 echo "<option value=$i $str>$i</option>";
						}
					?>
				</select>
				</td>
				<td>
				<select name=from_month>
					<? for ($i=1;$i<=12;$i++) {
						 if($from_month == $i) $str = "selected"; else $str='';
						 echo "<option value=$i $str>$i</option>";
						}
					?>
				</select>
				<select name=from_day>
					<? for ($i=1;$i<=31;$i++) {
						 if($from_day == $i) $str = "selected"; else $str='';
						 echo "<option value=$i $str>$i</option>";
						}
					?>
				</select>
				~
				<select name=to_year>
					<? for ($i=2012;$i<=2015;$i++) {
						 if($to_year == $i) $str = "selected"; else $str='';
						 echo "<option value=$i $str>$i</option>";
						}
					?>
				</select>
				</td>
				<td>
				<select name=to_month>
					<? for ($i=1;$i<=12;$i++) {
						 if($to_month == $i) $str = "selected"; else $str='';
						 echo "<option value=$i $str>$i</option>";
						}
					?>
				</select>
				<select name=to_day>
					<? for ($i=1;$i<=31;$i++) {
						 if($to_day == $i) $str = "selected"; else $str='';
						 echo "<option value=$i $str>$i</option>";
						}
					?>
				</select>

</td>
                    <td><input type=submit value=검색>
					<!--<input type=image src="/img/btn_01.gif" width="47" height="19" style="cursor:hand">--></td>
                    </tr>
                </form>
                </table>
</td>
</tr>

<?
$sql_common = " from ticket ";

$sql_search = " where (1) ";

$from_date = $from_year."-".$from_month."-".$from_day;
$to_date = $to_year."-".$to_month."-".$to_day." 23:59;59";

if ( strlen($from_month) == 1 ) $spfm="0";
if ( strlen($from_day) == 1 ) $spfd="0";
if ( strlen($to_month) == 1 ) $sptm="0";
if ( strlen($to_day) == 1 ) $sptd="0";

$from_date = $from_year."-".$spfm.$from_month."-".$spfd.$from_day;
$to_date = $to_year."-".$sptm.$to_month."-".$sptd.$to_day." 23:59;59";

if ($search == 'yes') $sql_search .= " and regdate > '$from_date' and regdate <= '$to_date'";

if ($race_kind) {
    $sql_search .= " and ( ";
    $sql_search .= " (race_kind ='$race_kind') ";
    $sql_search .= " ) ";
}

if ($bet_kind) {
    $sql_search .= " and ( ";
    $sql_search .= " (game_type ='$bet_kind') ";
    $sql_search .= " ) ";
}

if (!$sst) {
    $sst  = "regdate";
    $sod = "desc";
}

$sql_order = " order by $sst $sod ";

$sql = " select count(*) as cnt
         $sql_common 
         $sql_search and id = '$member[mb_id]'
         $sql_order ";

//echo $sql;

$row = sql_fetch($sql);
$total_count = $row[cnt];

//$rows = $config[cf_page_rows];
$rows = 20;

$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page == "") $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select *
          $sql_common
          $sql_search and id = '$member[mb_id]'
          $sql_order
          limit $from_record, $rows ";

$result = sql_query($sql);

$listall = "<a href='$_SERVER[PHP_SELF]'>처음</a>";

$mb = get_member($stx);

$colspan = 14;
?>

<script language="javascript" src="<?=$g4[path]?>/js/sideview.js"></script>

<!--<tr>
    <td width=50% align=left>
        <?=$listall?> (건수 : <?=number_format($total_count)?>)
        <? 
       	$row2 = sql_fetch(" select sum(amount) as sum_money from account where status='confirm' and id='$member[mb_id]'");
		echo "&nbsp;(" . $member[mb_name] ." 님 현금머니 (확인후) : " . number_format($row2[sum_money]) . "원)";
        ?>
    </td>
</tr>
-->
<form name=ticketlist method=post> 

<input type=hidden name=sst   value='<?=$sst?>'>
<input type=hidden name=sod   value='<?=$sod?>'>
<input type=hidden name=sfl   value='<?=$sfl?>'>
<input type=hidden name=stx   value='<?=$stx?>'>
<input type=hidden name=page  value='<?=$page?>'>
<input type=hidden name=token value='<?=$token?>'>

<tr>
<td>
<table width="800"  border="0" cellpadding="1" cellspacing="1" bgcolor="cbac6f">
			<tr align="center">
				<td colspan="14" bgcolor="e0dad6"></td>
			</tr>
			<tr align="center" bgcolor="#EEEAE8" height=25>
				<td class="txt_main1"><input type=checkbox name=chkall value='1' onclick='check_all(this.form)'></td>
				<td class="txt_main1">일자</td>
				<td class="txt_main1">장소</td>
				<td class="txt_main1">경주</td>
				<td class="txt_main1">구매일자</td>
				<td class="txt_main1">승식</td>
				<td class="txt_main1">선택1</td>
				<td class="txt_main1">선택2</td>
				<td class="txt_main1">선택3</td>
				<td class="txt_main1">금액</td>
				<td class="txt_main1">결과</td>
				<td class="txt_main1">배당율</td>
				<td class="txt_main1">배당금</td>
				<td class="txt_main1">상태</td>
			</tr>

<tr><td colspan='<?=$colspan?>' class='line2'></td></tr>

<?
for ($i=0; $row=sql_fetch_array($result); $i++) 
{
    if ($row2[mb_id] != $row[id])
    {
        $sql2 = " select mb_id, mb_name, mb_nick, mb_email, mb_homepage, mb_point from $g4[member_table] where mb_id = '$member[mb_id]' ";
        $row2 = sql_fetch($sql2);
    }

    $name = $row2[mb_name];
		
    $list = $i%2;
 
    $ticket_no = $row[ticket_no];
	$race_date = $row[race_date];
	$raceno = $row[raceno];
    $regdate = $row[regdate];
    $id = $row[id];  
	$game_type = $row[game_type];

	if ($game_type == 'pair') $game_type = '쌍승식';
	if($game_type == 'doub') $game_type = '복승식';
	if($game_type == 'ss') $game_type = '복연승' ;
	if($game_type == 'ddd') $game_type = '삼복승' ;
	if($game_type == 'sj') $game_type = '쌍조' ;
	if($game_type == 'dj') $game_type = '복조' ;

	$sel01 = $row[sel01];
	$sel02 = $row[sel02];
	$sel03 = $row[sel03];
	$ea = $row[ea];
	$commission = $row[commision];
	$race_kind = $row[race_kind];
    $raceresult = $row[raceresult];
	$rate = $row[rate];
	$amount = $row[amount];
    // $amount = number_format($amount);
	$money_type = $row[money_type];
	$order_gubun = $row[order_gubun];
	$statusval = $row[status];

    if ($raceresult) { 
		$rateamount = $amount * $rate;
		$rateamount = number_format($rateamount);
		if($rate > 0) {
			$status='승'; $bgcolor='#ffbfff'; 
		} else { 
			$status='패'; $bgcolor='#ffffff'; 
		}
    } else { 
		$rateamount = NULL; $status=''; $bgcolor='#ffffff'; 
	}
	
	if($statusval=='cancle') {$status='취소'; $bgcolor="#ffff00"; }
	
    if($race_kind == 't01') $race_kind_str = "미사리경정";
	if($race_kind == 'h01') $race_kind_str = "과천경마";
	if($race_kind == 'h02') $race_kind_str = "제주경마";
	if($race_kind == 'h03') $race_kind_str = "부산경마";
	if($race_kind == 'k01') $race_kind_str = "광명경륜";
	if($race_kind == 'k02') $race_kind_str = "창원경륜";
	if($race_kind == 'k03') $race_kind_str = "부산경륜";
   
    $amount = number_format($amount);
    
	$race_date_input = substr($race_date,0,4)."-".substr($race_date,4,2)."-".substr($race_date,6,2);
	
    $sqlstart = "select no as raceid, start_$raceno as start from raceinput where race_kind='$race_kind' and race_date = '$race_date_input'";
//	echo $sqlstart;

	$rowstart = sql_fetch($sqlstart);
	
	$start_time = $race_date_input." ".$rowstart[start];
    $timenow = date("Y-m-d H:i");
//    echo $start_time."   ".$timenow;

    if ($start_time < $timenow || $statusval=='cancle') $check_str ='';  // 시간경과 또는 이미취소된 티켓


	else $check_str = "<input type=checkbox name=chk[] value='$i'>";
	//<input type=checkbox name=chk[] value='$ticket_no'>";

    echo "
    <input type=hidden name=no[$i] value='$row[ticket_no]'>
    <input type=hidden name=id[$i] value='$row[id]'>
    <input type=hidden name=startTime[$i] value='$start_time'>
    <tr bgcolor=$bgcolor height=23>
        <td align=center>$check_str</td>
        <td align=center>$race_date</td>
        <td align=center>$race_kind_str</td>
        <td align=center>$raceno</td>
        <td align=center>$regdate</td>
        <td align=center>$game_type</td>
        <td align=center>$sel01</td>
        <td align=center>$sel02</td>
        <td align=center>$sel03</td>
        <td align=center>$amount</td>

		<td align=center>$raceresult</td>
        <td align=center>$rate</td>
        <td align=center>$rateamount</td>
        <td align=center>$status</td>
    </tr> ";
}

if ($i == 0)
    echo "<tr><td colspan='$colspan' align=center height=100 bgcolor=#ffffff>자료가 없습니다.</td></tr>";

echo "<tr><td colspan='$colspan' class='line2'></td></tr>";
echo "</table>";

$pagelist = get_paging($config[cf_write_pages], $page, $total_page, "$_SERVER[PHP_SELF]?$qstr&page=");

?>

<script>
function btn_check(f, act)
{
	if (act == "delete") // 선택삭제
    { 
        f.action = "./ticket_delete.php";
        str = "삭제";
    } 
    else if (act == "cancle") // 구매취소 
    { 
        f.action = "./ticket_cancle.php";
        str = "취소";
    } 
    else
        return;

    var chk = document.getElementsByName("chk[]");
    var bchk = false;

    for (i=0; i<chk.length; i++)
    {
        if (chk[i].checked)
            bchk = true;
    }

    if (!bchk) 
    {
        alert(str + "할 자료를 하나 이상 선택하세요.");
        return;
    }

    if (act == "delete")
    {
        if (!confirm("선택한 자료를 정말 삭제 하시겠습니까?"))
            return;
    }

    f.submit();
}
</script>

<?
echo "<table width=100% cellpadding=3 cellspacing=1>";
echo "<tr height=22><td width=50%>";
echo "<input type=button class='btn1' value='선택취소' onclick=\"btn_check(this.form, 'cancle')\">";
echo "</td>";
echo "<td width=50% align=left>$pagelist</td></tr>";

$sqli = "select sum(amount) as sum_in from account $sql_search and status='confirm' and kind='accin' and id = '$member[mb_id]'";
$sqlo = "select sum(amount) as sum_out from account $sql_search and status='confirm' and kind='accout' and id = '$member[mb_id]'";
$sqlbc= "select sum(amount) as cash_bet from account $sql_search and kind='cash-ticket' and id = '$member[mb_id]'";
$sqlbe= "select sum(event) as event_bet from account $sql_search and kind='event-ticket' and id = '$member[mb_id]'";

//echo $sqlsumin;

$rowi = sql_fetch($sqli);  $sum_in = number_format($rowi[sum_in]);
$rowo = sql_fetch($sqlo);  $sum_out = number_format($rowo[sum_out]);

$rowbc = sql_fetch($sqlbc);  $cash_bet = $rowbc[cash_bet];
$rowbe = sql_fetch($sqlbe);  $event_bet = $rowbe[event_bet];
$total_bet = number_format($cash_bet + $event_bet);

$sqlwin = "select sum(amount*rate) as total_win from ticket $sql_search and id = '$member[mb_id]' and raceresult is not NULL  and rate>0 ";
$rowwin = sql_fetch($sqlwin);
$total_win = number_format($rowwin[total_win]);

//echo $sqlwin;

/*
echo"
			<tr align='center' bgcolor='#EEEAE8'' height=30>
				<td colspan='14' class='txt_main1'>총입금액 : $sum_in / 총출금액 : $sum_out / 배팅금액 : $total_bet / 배당금액 : $total_win </td>
            </tr>
            <tr align='center'>
                <td colspan='14' bgcolor='e0dad6'></td>
            </tr>";
*/

echo "
</table>\n";

if ($stx)
    echo "<script language='javascript'>document.fsearch.sfl.value = '$sfl';</script>\n";

if (strstr($sfl, "mb_id"))
    $mb_id = $stx;
else
    $mb_id = "";
?>
</form>

</td>
</tr>
</table>

<?
include_once("./_tail.php");
?>
