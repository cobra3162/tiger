<?
include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "";
include_once("./jp_head.php");

$sqlp = "select * from jp_place where race_date='$race_date' ";
//echo $sqlp;
//exit;
$rowp = sql_fetch($sqlp);

		$place0 ="�����";
        $place1 = "������";
        $place2 = "�簡";
        $place3 = "������";
        $place4 = "�ҳ��";
        $place5 = "�ƶ��";
		$place6 = "��������";
		$place7 ="����";
        $place8 ="ī������";
        $place9 ="��ġ";
        $place10 = "��߸�";
        $place11 ="�ĳ��ٽ�";
        $place12="ī�ͻ�Ű";
        $place13="�ƽ���Ű��";
        $place14="ī�縶��";
        $place15="������";
        $place16="����";
        $place17="������";

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
			$race_name = "�Ϻ��渶 ".${$imsifirstplace}."����";
		}
        else if ( $kind==$placearray[$i] ) { ${$imsichk}='checked';  
		   $race_name = "�Ϻ��渶 ".${$imsiplace}."����";
		   //echo "imsi = $imsichk  ";
		}
		$input_radio_str .= "<input type=radio name='kind' value=$placearray[$i] ${$imsichk} onclick=\"noRace($placearray[$i]);\">${$imsiplace} ";
	}    
}

$race_kind = $kind;
if ($game_name) $race_kind = $game_name; 
if (!$race_kind) $race_kind = '0';

/*
if ($race_kind=='0') {$chk0 = 'checked'; $race_name='���� �渶'; $game_name ='h02'; $colspan=17; $over_h02='_over';}
elseif ($race_kind=='h03') {$chk3 = 'checked'; $race_name='�λ� �渶'; $game_name ='h03'; $colspan=17; $over_h03='_over';}
elseif ($race_kind=='k01') {$chk4 = 'checked'; $race_name='���� ���'; $game_name ='k01'; $colspan=9; $over_k01='_over';}
elseif ($race_kind=='k02') {$chk5 = 'checked'; $race_name='â�� ���'; $game_name ='k02'; $colspan=9;$over_k02='_over';}
elseif ($race_kind=='k03') {$chk6 = 'checked'; $race_name='�λ� ���'; $game_name ='k03'; $colspan=9; $over_k03='_over';}
elseif ($race_kind=='t01') {$chk7 = 'checked'; $race_name='�̻縮 ����'; $game_name ='t01'; $colspan=7;$over_t01='_over';}
elseif ($race_kind=='h01') {$chk1 = 'checked'; $race_name='��õ �渶'; $game_name ='h01'; $colspan=17;$over_h01='_over';}
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

if ( !$row[cnt] ) { echo "<script language='JavaScript'> alert('��������� �ԷµǾ����� �ʽ��ϴ�'); 
						//history.go(-1);
						</script>"; }

$sqlgame = "select * from jp_raceinput where race_date='$race_date'  and race_kind='$race_kind' ";
echo $sqlgame."<br>";
$rowgame = sql_fetch($sqlgame);

$num_race = $rowgame[num_race];
//echo "num_game = $num_race";

$r_no =$rowgame[no];  // ���̽���ȣ  world�� ������ ���� ���� 

// �⺻ ���μ� 
$c_num0= $colspan-1;
//if(!$round) $round = 1;  // ����Ʈ ����
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
		<td>- ���ֱǱ��Ŵ� �Ű��� ���������� �����˴ϴ�. <br>
		  - ����� �������� ȯ�ҵ� �ݾ��� ȯ�ޱ����� ȯ�ҵ˴ϴ�.<br>
		  - ������ȭ : <b><font color=teal><?=$callcenter?></font><br>
		  - ����� ������ ���� ��ݽ�û�� �Ͻø� �ٷ� ����Ͻ� �� �ֽ��ϴ�.</td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
					<td align="center">
						<!----- ##### ������ ���� ------>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><!-- 1�� ������ -->
									<a href="ticket.php?race_kind=h01"><img src="/images/ico01<?=$over_h01?>.gif" onmouseover="this.src='/images/ico01_over.gif'" onmouseout="this.src='/images/ico01.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- ���� -->
								<td><!-- 2�� ������ -->
									<a href="ticket.php?race_kind=h02"><img src="/images/ico02<?=$over_h02?>.gif" onmouseover="this.src='/images/ico02_over.gif'" onmouseout="this.src='/images/ico02.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- ���� -->
								<td><!-- 3�� ������ -->
									<a href="ticket.php?race_kind=h03"><img src="/images/ico03<?=$over_h03?>.gif" onmouseover="this.src='/images/ico03_over.gif'" onmouseout="this.src='/images/ico03.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- ���� -->
								<td><!-- 4�� ������ -->
									<a href="ticket.php?race_kind=k01"><img src="/images/ico04<?=$over_k01?>.gif" onmouseover="this.src='/images/ico04_over.gif'" onmouseout="this.src='/images/ico04.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- ���� -->
								<td><!-- 5�� ������ -->
									<a href="ticket.php?race_kind=k02"><img src="/images/ico05<?=$over_k02?>.gif" onmouseover="this.src='/images/ico05_over.gif'" onmouseout="this.src='/images/ico05.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- ���� -->
								<td><!-- 6�� ������ -->
									<a href="ticket.php?race_kind=k03"><img src="/images/ico06<?=$over_k03?>.gif" onmouseover="this.src='/images/ico06_over.gif'" onmouseout="this.src='/images/ico06.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- ���� -->
								<td><!-- 7�� ������ -->
									<a href="ticket.php?race_kind=t01"><img src="/images/ico07<?=$over_t01?>.gif" onmouseover="this.src='/images/ico07_over.gif'" onmouseout="this.src='/images/ico07.gif'" border="0"></td>
								<td><img src="/images/jp_ico_middle.gif"></td><!-- ���� -->
							    <td><!-- 8�� ������ -->
									<a href="jp_ticket.php?race_kind=jp"><img src="/images/jp_ico08.gif" onmouseover="this.src='/images/jp_ico08_over.gif'" onmouseout="this.src='/images/jp_ico08.gif'" border="0"></td>
							</tr>
						</table></td>
						<!----- ##### ������ �� ------>
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
			<b><font color=blue>ȸ������ ���� <font size=3 color=red><b><?=$race_name?></b></font>���ֱ��� �������Դϴ�. �ǽ¹ٶ��ϴ�</font></b></marquee>
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
		&nbsp;&nbsp;<b>���ֽ��۽ð� :
		<font color=red><span id='hour_minute'></font></b></span>
	   <span id='expect'></span>
	";
?>
</td>
</tr>

<tr>
<td align=center width=130 bgcolor='EEEAE8'><b>�����ð�</b></td>
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
battype_name[1]='����'; 
battype_name[2]='�ֽ�'; 
battype_name[3]='�ﺹ��'; 

battype_name[4]='������'; 
battype_name[5]='�ֽ�'; 
battype_name[6]='����';

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
<!-- üũ�� ���� <form name="frm" action="./racing/ticket_buy.php" method=post target="subframe">-->
<input type="hidden" name="r_no" value="<?=$r_no?>" >
<input type="hidden" name="horse_no_str1" >
<input type="hidden" name="horse_no_str2" >
<input type="hidden" name="horse_no_str3" >
<input type="hidden" name="mode" value="add_ok">
<!--<input type="hidden" name="race_date" value="<?=$race_date?>">-->
<!--<input type="hidden" name="code" value=<?=$code?>>-->
<input type="hidden" name="race_kind" value="<?=$race_kind?>">
<input type="hidden" name="round" value="<?=$round?>">

<b>���Ű������ݸӴ�<!--<?=$racec[milename]?>-->
:</b><span id="remain_mile_span"  style="font-size:14px;font-weight:bold;color:red ">
<?=number_format($member[cashmoney])?>
</span>��<?//=$racec[mileunit]?>
<input type="hidden" name="remain_mile" id='remain_mile' value="<?=$member[cashmoney]?>" />

<b>���Ű����̺�Ʈ�Ӵ�<?//=$racec[pointname]?>:
<span id="remain_point_span"  style="font-size:14px;font-weight:bold;color:red ">
<?=number_format($member[eventmoney])?>
</span></b>��<?//=$racec[pointunit]?>
<input type="hidden" name="remain_point" id='remain_point' value="<?=$member[eventmoney]?>" />
&nbsp;&nbsp;
</td>
</tr>

<tr>
  <td align=center width=130 bgcolor='EEEAE8'><b>�����ļ���</b></td>
  <td height="25" valign="middle" style="PADDING-LEFT:5pt" bgcolor='#FFFFFF'>
	<input name="pay_type" type="radio"   value="mile"
	<? if($member[cashmoney] >= $member[eventmoney]) echo "checked";?> />
	<b>
	<?//=$racec[milename]?>���ݸӴ�
	<input name="pay_type" type="radio"  value="point"  <? if($member[eventmoney] > $member[cashmoney]) echo "checked";?>  />
	<b>
	<?//=$racec[pointname]?>�̺�Ʈ�Ӵ�
	</b></b></td>
</tr>

<tr>
  <td align=center width=130 bgcolor='EEEAE8'><b>���ù�ļ���</b></td>
   <td height="25" valign="middle" style="PADDING-LEFT:5pt" bgcolor='#FFFFFF' >
	<!-- ���巹�̽� ���� 
	���ù�ļ��� : <?
foreach($race_battype as $key => $val){
if($key==1) $chk="checked"; else $chk="";
?>
	  <input name="bat_type" type="radio"  value="<?=$key?>" <?=$chk?>  onclick="javascript:SelectBat();" />
	  <b><?=$val?></b>
	  <?}?>
 ���巹�̽� �� -->
	    <input name="bat_type" type="radio"  value="1" checked  onclick="javascript:SelectBat();" /><b>����</b>
		<input name="bat_type" type="radio"  value="2"   onclick="javascript:SelectBat();" /><b>�ֽ�</b>
		<input name="bat_type" type="radio"  value="3"   onclick="javascript:SelectBat();" /><b>�ﺹ��</b>

		<!--<input name="bat_type" type="radio"  value="4"   onclick="javascript:SelectBat();" /><b>������</b>-->

		<input name="bat_type" type="radio"  value="5"   onclick="javascript:SelectBat2();" /><b>����</b>
		<input name="bat_type" type="radio"  value="6"   onclick="javascript:SelectBat2();" /><b>����</b>
</tr>

<tr>
<td height="13" valign="top" class="small" colspan=17>
	<table width="99%" cellpadding="2" cellspacing="1" border="0" bgcolor="#dddddd">
		<tr align="middle">
			<td align="center" bgcolor="#efefef" width="20">����</td>
			<? for($i=1;$i <= $c_num0;$i++){?>
			<td align="center" bgcolor="#FFFFFF" width="35"><?=$horse_no[$i]?><?//=$i?></td>
			<? }?>
			</tr>

			<?
			for($j=1;$j <= 3;$j++){
			?>
		<tr align="middle" bgcolor="#FFFFFF" height="20">
			  <td align="center"><?=$j?>��</td>
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
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('5000000');" >500��</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('3000000');" >300��</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('2000000');" >200��</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('1000000');" >�鸸</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('500000');" >50��</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('300000');" >30��</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('200000');" >20��</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('100000');" >10��</a></b></td>
	  </tr>
	<tr>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('50000');" >5��</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('30000');" >3��</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('20000');" >2��</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('10000');" >1��</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('7000');" >7õ</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('5000');">5õ</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('3000');" >3õ</a></b></td>
	  <td height="30" align="center" bgcolor="#FFFFFF"><b><a href="javascript:setMiles('2000');" >2õ</a></b></td>
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
	<td align="left" bgcolor="#FFFFFF" style="line-height:150%;font-size:14px;font-weight:bold;"><span id="ticket_stat_area" style="font-size:14px;font-weight:bold;color:red;">������ �ݾ��� �����ϼ���.</span><br />

	  <b>���ñݾ�</b>
	  <span id="miles_val_area" style="font-size:14px;font-weight:bold;color:red;">0��</span>
	  <input name="miles" type="hidden" id="miles"  />
	  <br />
<input type=image src='/racing/images/ticket_add.gif' align="middle"> <a href="javascript:ticketclear();"><img src="/racing/images/ticket_reset.gif" height="23" border="0" align="absmiddle" /></a></td>
	</tr>

</form >

</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="25"><font color=red>��&darr;�Ʒ� ��ٱ��Ͽ� ����� ���ֱ��� �ݵ�� ���Ž�û�Ͽ��� ������ �Ϸ�˴ϴ�.</font></td>
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
<td colspan="2" width="600" height="35" align="center" valign="middle"><b>��ٱ��Ͽ� ����� ���ֱ�</b></td>
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
