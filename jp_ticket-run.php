<?
include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "";
include_once("./jp_head.php");

$sqlp = "select * from jp_place where race_date='$race_date' ";
//echo $sqlp;
//exit;
$rowp = sql_fetch($sqlp);

		$place0 ="나고야";
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

if($rowp) {
	$place_str = $rowp[place_str];

	$placearray = explode('|',$place_str);

	$noplace = sizeof($placearray);

	for ($i=0;$i<$noplace-1;$i++) {
	    $first = $placearray[0];
		//echo "$i, $placearray[$i] ";
		$imsichk = 'chk'.$placearray[$i];
		$imsiplace = 'place'.$placearray[$i];
		
		$imsifirst = 'chk'.$first;
		$imsifirstplace = 'place'.first;

		if(!$kind) { 
   	        $kind = $first; ${$imsifirst}='checked'; 
			$race_name = "일본경마 ".${$imsifirstplace}."지역";
		}
        else if ( $kind==$placearray[$i] ) { ${$imsichk}='checked';  
		   $race_name = "일본경마 ".${$imsiplace}."지역";
		   //echo "imsi = $imsichk  ";
		}
		$input_radio_str .= "<input type=radio name='kind' value=$placearray[$i] ${$imsichk} onclick=\"noRace($placearray[$i]);\">${$imsiplace} ";
	}    
}

$race_kind = $kind;
if ($game_name) $race_kind = $game_name; 
if (!$race_kind) $race_kind = '0';

/*
if ($race_kind=='0') {$chk0 = 'checked'; $race_name='제주 경마'; $game_name ='h02'; $colspan=17; $over_h02='_over';}
elseif ($race_kind=='h03') {$chk3 = 'checked'; $race_name='부산 경마'; $game_name ='h03'; $colspan=17; $over_h03='_over';}
elseif ($race_kind=='k01') {$chk4 = 'checked'; $race_name='광명 경륜'; $game_name ='k01'; $colspan=9; $over_k01='_over';}
elseif ($race_kind=='k02') {$chk5 = 'checked'; $race_name='창원 경륜'; $game_name ='k02'; $colspan=9;$over_k02='_over';}
elseif ($race_kind=='k03') {$chk6 = 'checked'; $race_name='부산 경륜'; $game_name ='k03'; $colspan=9; $over_k03='_over';}
elseif ($race_kind=='t01') {$chk7 = 'checked'; $race_name='미사리 경정'; $game_name ='t01'; $colspan=7;$over_t01='_over';}
elseif ($race_kind=='h01') {$chk1 = 'checked'; $race_name='과천 경마'; $game_name ='h01'; $colspan=17;$over_h01='_over';}
*/
$weekday = date ("w");

$colspan=17;
?>

<script language="JavaScript">
function noRace(kind) {
	var kind;
    document.fnum_race.kind.value = kind ;
    document.fnum_race.submit();
}

</script>
<form name=fnum_race method=post  action="./jp_ticket.php">
<input type=hidden name=norace>
<input type=hidden name=kind>
</form>

<?

$sql = "select count(*) as cnt from jp_raceinput where race_date='$race_date' and race_kind='$race_kind' ";
//echo $sql;
//exit;

$row = sql_fetch($sql);
//echo "cnt : $row[cnt]";

if ( !$row[cnt] ) { echo "<script language='JavaScript'> alert('경기정보가 입력되어있지 않습니다'); 
						//history.go(-1);
						</script>"; }

$sqlgame = "select * from jp_raceinput where race_date='$race_date'  and race_kind='$race_kind' ";
echo $sqlgame."<br>";
$rowgame = sql_fetch($sqlgame);

$num_race = $rowgame[num_race];
//echo "num_game = $num_race";

$r_no =$rowgame[no];  // 레이스번호  world와 결합을 위해 지정 

// 기본 라인수 
$c_num0= $colspan-1;
//if(!$round) $round = 1;  // 디폴트 라운드
//echo "   round = $round";

include  "jp_ticket_js_mobile.php"; 

$starttime = $startTime[$round];
$c_num = $countPlayer[$round];

?>

<table width="700" align=left cellpadding=0 cellspacing=0 >
	<tr>
		<td valign="top"><table  border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td><img src="/img/main/ticket_01.jpg"></td>
		  </tr>
	  <tr>
		<td>&nbsp;</td>
	  </tr>

<?
$sql = "select cf_call_center from config_race ";
$rowcall = sql_fetch($sql);
$callcenter = $rowcall[cf_call_center];
?>
	  <tr>
		<td>- 경주권구매는 매경주 시작직전에 마감됩니다. <br>
		  - 경기장 사정으로 환불될 금액은 환급금으로 환불됩니다.<br>
		  - 문의전화 : <b><font color=teal><?=$callcenter?></font><br>
		  - 배당이 맞으신 경기는 출금신청을 하시면 바로 출금하실 수 있습니다.</td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
					<td align="center">
						<!----- ##### 아이콘 시작 ------>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><!-- 1번 아이콘 -->
									<a href="ticket.php?race_kind=h01"><img src="/images/ico01<?=$over_h01?>.gif" onmouseover="this.src='/images/ico01_over.gif'" onmouseout="this.src='/images/ico01.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 2번 아이콘 -->
									<a href="ticket.php?race_kind=h02"><img src="/images/ico02<?=$over_h02?>.gif" onmouseover="this.src='/images/ico02_over.gif'" onmouseout="this.src='/images/ico02.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 3번 아이콘 -->
									<a href="ticket.php?race_kind=h03"><img src="/images/ico03<?=$over_h03?>.gif" onmouseover="this.src='/images/ico03_over.gif'" onmouseout="this.src='/images/ico03.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 4번 아이콘 -->
									<a href="ticket.php?race_kind=k01"><img src="/images/ico04<?=$over_k01?>.gif" onmouseover="this.src='/images/ico04_over.gif'" onmouseout="this.src='/images/ico04.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 5번 아이콘 -->
									<a href="ticket.php?race_kind=k02"><img src="/images/ico05<?=$over_k02?>.gif" onmouseover="this.src='/images/ico05_over.gif'" onmouseout="this.src='/images/ico05.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 6번 아이콘 -->
									<a href="ticket.php?race_kind=k03"><img src="/images/ico06<?=$over_k03?>.gif" onmouseover="this.src='/images/ico06_over.gif'" onmouseout="this.src='/images/ico06.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
								<td><!-- 7번 아이콘 -->
									<a href="ticket.php?race_kind=t01"><img src="/images/ico07<?=$over_t01?>.gif" onmouseover="this.src='/images/ico07_over.gif'" onmouseout="this.src='/images/ico07.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- 여백 -->
							    <td><!-- 8번 아이콘 -->
									<a href="jp_ticket.php?race_kind=jp"><img src="/images/jp_ico08.gif" onmouseover="this.src='/images/jp_ico08_over.gif'" onmouseout="this.src='/images/jp_ico08.gif'" border="0"></td>
							</tr>
						</table></td>
						<!----- ##### 아이콘 끝 ------>
				</tr>
	  <tr>
		<td height="25">&nbsp;</td>
	  </tr>
	<tr>
		<td>
		  <table width="590"  border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="590" height="30">

		 <table width="590"  border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="590" height="30">
			<b><font color=blue>회원님은 현재 <font size=3 color=red><b><?=$race_name?></b></font>경주권을 구매중입니다. 건승바랍니다</font></b></marquee>
			</td>
		  </tr>

		  <tr>
			<td width="590" height="30">
			   <?=$input_radio_str?></td>
		  </tr>

		  </table>		
			</td>
		  </tr>
		  </table>
		 </td>
	</tr>

    <tr>
	<td>
</table>

<body onload='initRace(curRound, curGameTime, curRaceHour, curRaceMinute)' leftmargin=0 topmargin=0>
<table width="700" border="0" cellspacing="1" cellpadding="1" bgcolor="e0dad6" align=left>
<form name=timeform action=''>
<input type="hidden" name="gubunTxt">
<tr>
<td height=25 style='padding-left:5px' colspan="2" bgcolor=ffffff>

<? 

$day_from = date ("d");

echo "
	<select name=game_year>
			<option value='$year'  >$year</option>
		</select>

	<select name=game_month>
			<option value='$month'  >$month</option>
		</select>

	<select name=game_day onchange='changeDate()'>";

			for ($i=$day_from ; $i<=31 ; $i++) {
				if ($i == $day ) $day_str = 'selected'; else $day_str='';
				echo "<option value='$i' $day_str  >$i</option>";
			}
	echo "
	</select>";

echo"
		<span id='span_select_round'></span>
		&nbsp;&nbsp;<b>경주시작시간 :
		<font color=red><span id='hour_minute'></font></b></span>
	   <span id='expect'></span>
	";
?>
</td>
</tr>

<tr>
<td align=center width=130 bgcolor='EEEAE8'><b>마감시간</b></td>
<td style="PADDING-LEFT:5pt" bgcolor='#FFFFFF' > <span id=RoundNm></span><input type=text name=remain_time style="color:red"></td>
</tr>
</form>

<?
$enable_mile=number_format($member[cashmoney]);
$enable_point=number_format($member[eventmoney]);

include "./racing/ticket_mobile.js";

$horse_no[1]="<img src='/racing/images/ball_1.gif' align='absmiddle' >";
$horse_no[2]="<img src='/racing/images/ball_2.gif' align='absmiddle' >";
$horse_no[3]="<img src='/racing/images/ball_3.gif' align='absmiddle' >";
$horse_no[4]="<img src='/racing/images/ball_4.gif' align='absmiddle' >";
$horse_no[5]="<img src='/racing/images/ball_5.gif' align='absmiddle'  >";
$horse_no[6]="<img src='/racing/images/ball_6.gif' align='absmiddle' >";
$horse_no[7]="<img src='/racing/images/ball_7.gif' align='absmiddle' >";
$horse_no[8]="<img src='/racing/images/ball_8.gif' align='absmiddle' >";
$horse_no[9]="<img src='/racing/images/ball_9.gif' align='absmiddle' >";
$horse_no[10]="<img src='/racing/images/ball_10.gif' align='absmiddle' >";
$horse_no[11]="<img src='/racing/images/ball_11.gif' align='absmiddle' >";
$horse_no[12]="<img src='/racing/images/ball_12.gif' align='absmiddle' >";
$horse_no[13]="<img src='/racing/images/ball_13.gif' align='absmiddle' >";
$horse_no[14]="<img src='/racing/images/ball_14.gif' align='absmiddle' >";
$horse_no[15]="<img src='/racing/images/ball_15.gif' align='absmiddle' >";
$horse_no[16]="<img src='/racing/images/ball_16.gif' align='absmiddle' >";

include "./racing/public_js.php";
?>

<script language="JavaScript" src="./racing/timer.js" ></script>
<script language="JavaScript" src="./racing/math.js" ></script>

<script language="JavaScript">
battype_name=new Array();
<?
/* from world
foreach($race_battype as $key => $val){
echo "battype_name[$key]='$val'; \n ";
}
*/
?>
battype_name[1]='복승'; 
battype_name[2]='쌍승'; 
battype_name[3]='삼복승'; 

battype_name[4]='복연승'; 
battype_name[5]='쌍승'; 
battype_name[6]='복승';

miles_val=0;
min_bat_amount=2000;
hno_ary=new Array();

horse_no=new Array();
horse_no[1]="<img src='/racing/images/ball_1.gif' align='absmiddle' >";
horse_no[2]="<img src='/racing/images/ball_2.gif' align='absmiddle' >";
horse_no[3]="<img src='/racing/images/ball_3.gif' align='absmiddle' >";
horse_no[4]="<img src='/racing/images/ball_4.gif' align='absmiddle' >";
horse_no[5]="<img src='/racing/images/ball_5.gif' align='absmiddle'  >";
horse_no[6]="<img src='/racing/images/ball_6.gif' align='absmiddle' >";
horse_no[7]="<img src='/racing/images/ball_7.gif' align='absmiddle' >";
horse_no[8]="<img src='/racing/images/ball_8.gif' align='absmiddle' >";
horse_no[9]="<img src='/racing/images/ball_9.gif' align='absmiddle' >";
horse_no[10]="<img src='/racing/images/ball_10.gif' align='absmiddle' >";
horse_no[11]="<img src='/racing/images/ball_11.gif' align='absmiddle' >";
horse_no[12]="<img src='/racing/images/ball_12.gif' align='absmiddle' >";
horse_no[13]="<img src='/racing/images/ball_13.gif' align='absmiddle' >";
horse_no[14]="<img src='/racing/images/ball_14.gif' align='absmiddle' >";
horse_no[15]="<img src='/racing/images/ball_15.gif' align='absmiddle' >";
horse_no[16]="<img src='/racing/images/ball_16.gif' align='absmiddle' >";

lcount=clcount=blcount=0;

</script>

<form name="frm" action="./racing/jp_ticket_buy.php" method=post target="subframe" onsubmit="return check_form();">
<tr>
<td bgcolor='#FFFFFF' colspan="2" valign="middle" >
<!-- 체크폼 제외 <form name="frm" action="./racing/ticket_buy.php" method=post target="subframe">-->
<input type="hidden" name="r_no" value="<?=$r_no?>" >
<input type="hidden" name="horse_no_str1" >
<input type="hidden" name="horse_no_str2" >
<input type="hidden" name="horse_no_str3" >
<input type="hidden" name="mode" value="add_ok">
<!--<input type="hidden" name="race_date" value="<?=$race_date?>">-->
<!--<input type="hidden" name="code" value=<?=$code?>>-->
<input type="hidden" name="race_kind" value="<?=$race_kind?>">
<input type="hidden" name="round" value="<?=$round?>">

<b>구매가능현금머니<!--<?=$racec[milename]?>-->
:</b><span id="remain_mile_span"  style="font-size:14px;font-weight:bold;color:red ">
<?=number_format($member[cashmoney])?>
</span>원<?//=$racec[mileunit]?>
<input type="hidden" name="remain_mile" id='remain_mile' value="<?=$member[cashmoney]?>" />

<b>구매가능이벤트머니<?//=$racec[pointname]?>:
<span id="remain_point_span"  style="font-size:14px;font-weight:bold;color:red ">
<?=number_format($member[eventmoney])?>
</span></b>원<?//=$racec[pointunit]?>
<input type="hidden" name="remain_point" id='remain_point' value="<?=$member[eventmoney]?>" />
&nbsp;&nbsp;
</td>
</tr>

<tr>
  <td align=center width=130 bgcolor='EEEAE8'><b>결재방식선택</b></td>
  <td height="25" valign="middle" style="PADDING-LEFT:5pt" bgcolor='#FFFFFF'>
	<input name="pay_type" type="radio"   value="mile"
	<? if($member[cashmoney] >= $member[eventmoney]) echo "checked";?> />
	<b>
	<?//=$racec[milename]?>현금머니
	<input name="pay_type" type="radio"  value="point"  <? if($member[eventmoney] > $member[cashmoney]) echo "checked";?>  />
	<b>
	<?//=$racec[pointname]?>이벤트머니
	</b></b></td>
</tr>

<tr>
  <td align=center width=130 bgcolor='EEEAE8'><b>배팅방식선택</b></td>
   <td height="25" valign="middle" style="PADDING-LEFT:5pt" bgcolor='#FFFFFF' >
	<!-- 월드레이스 시작 
	배팅방식선택 : <?
foreach($race_battype as $key => $val){
if($key==1) $chk="checked"; else $chk="";
?>
	  <input name="bat_type" type="radio"  value="<?=$key?>" <?=$chk?>  onclick="javascript:SelectBat();" />
	  <b><?=$val?></b>
	  <?}?>
 월드레이스 끝 -->
	    <input name="bat_type" type="radio"  value="1" checked  onclick="javascript:SelectBat();" /><b>복승</b>
		<input name="bat_type" type="radio"  value="2"   onclick="javascript:SelectBat();" /><b>쌍승</b>
		<input name="bat_type" type="radio"  value="3"   onclick="javascript:SelectBat();" /><b>삼복승</b>

		<!--<input name="bat_type" type="radio"  value="4"   onclick="javascript:SelectBat();" /><b>복연승</b>-->

		<input name="bat_type" type="radio"  value="5"   onclick="javascript:SelectBat2();" /><b>쌍조</b>
		<input name="bat_type" type="radio"  value="6"   onclick="javascript:SelectBat2();" /><b>복조</b>
</tr>

<tr>
<td height="13" valign="top" class="small" colspan=17>
	<table width="99%" cellpadding="2" cellspacing="1" border="0" bgcolor="#dddddd">
		<tr align="middle">
			<td align="center" bgcolor="#efefef" width="20">착순</td>
			<? for($i=1;$i <= $c_num0;$i++){?>
			<td align="center" bgcolor="#FFFFFF" width="35"><?=$horse_no[$i]?><?//=$i?></td>
			<? }?>
			</tr>

			<?
			for($j=1;$j <= 3;$j++){
			?>
		<tr align="middle" bgcolor="#FFFFFF" height="20">
			  <td align="center"><?=$j?>착</td>
			  <?
			  for($i=1;$i <= $c_num;$i++){
			  ?>
			  <td align="center">
			  <? if($j == 1){?>
			  <input type="radio" name="c_no_<?=$j?>" id="c_no_<?=$j?>" onclick="SelectHorse('<?=$j?>','<?=$i?>');" value="<?=$i?>" />
			  <?}else{?>
			  <input type="checkbox" name="c_no_<?=$j?>" id="c_no_<?=$j?>" onclick="SelectHorse('<?=$j?>','<?=$i?>');" value="<?=$i?>" />
			  <? }?>
			  </td>
			 <? }?>
		   </tr>
		   <? }?>

	</table>
</td>
</tr>
			  
<tr>
<td colspan="2" height="3" align="left" valign="top"></td>
</tr>
<tr>
<td colspan="2" align="center" valign="top">
  <table width="100%" border="0" cellspacing="1" cellpadding="2" bgcolor=#cccccc >
	<tr>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('5000000');" >500만</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('3000000');" >300만</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('2000000');" >200만</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('1000000');" >백만</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('500000');" >50만</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('300000');" >30만</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('200000');" >20만</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('100000');" >10만</a></b></td>
	  </tr>
	<tr>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('50000');" >5만</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('30000');" >3만</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('20000');" >2만</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('10000');" >1만</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('7000');" >7천</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('5000');">5천</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('3000');" >3천</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('2000');" >2천</a></b></td>
	  </tr>
  </table></td>
</tr>
<tr>
<td colspan=2height="3" align="left" valign="top"></td>
</tr>
<tr>
<td colspan="2" align="left" valign="top">
<table width="100%" border="0" cellspacing="2" cellpadding="5" bgcolor="e2e2e2">
  <tr>
	<td align="left" bgcolor="#FFFFFF" style="line-height:150%;font-size:14px;font-weight:bold;"><span id="ticket_stat_area" style="font-size:14px;font-weight:bold;color:red;">마번과 금액을 선택하세요.</span><br />

	  <b>선택금액</b>
	  <span id="miles_val_area" style="font-size:14px;font-weight:bold;color:red;">0원</span>
	  <input name="miles" type="hidden" id="miles"  />
	  <br />
<input type=image src='/racing/images/ticket_add.gif' align="middle"> <a href="javascript:ticketclear();"><img src="/racing/images/ticket_reset.gif" height="23" border="0" align="absmiddle" /></a></td>
	</tr>

</form >

</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="25"><font color=red>※&darr;아래 장바구니에 담겨진 경주권을 반드시 구매신청하여야 배팅이 완료됩니다.</font></td>
	  </tr>
</table>
</td>
</tr>
			<!--</table>
		</td>
      </tr>
      </table>
      <br />
      <table width="99%" border="0" cellspacing="0" cellpadding="0">-->
<tr>
<td colspan="2" width="600" height="35" align="center" valign="middle"><b>장바구니에 담겨진 경주권</b></td>
</tr>
<!--  </table>
      <table width="99%" border="0" cellspacing="0" cellpadding="0">-->
<tr>
  <td colspan="2" width="600" align="left" valign="top" bgcolor="#ffffff">
    <iframe src="/racing/jp_ticket_buy.php?r_no=<?=$r_no?>&code=<?=$code?>" name="subframe" id="subframe"  width="670" height="280" frameborder="0"  scrolling="no" onload="calcHeight();" ></iframe></td>
</tr>

</td>
</tr>
</table>


</td>
</tr>
</table>

<script>
basic_remain_time_val_<?=$data[no]?> = <?=$data[racedate]-$Kj[ntime]- ($Iconf[limit_bat_time]*60) ?> ;
//write_timer('<?=$data[no]?>');
//blink_timer('<?=$data[no]?>');
SelectBat();
</script>

<?
include_once("./_tail.php");
?>
