<?
include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "";
include_once("./_head.php");

if ($game_name) $race_kind = $game_name; 
if ($race_kind=='h02') {$chk2 = 'checked'; $race_name='���� �渶'; $game_name ='h02';}
elseif ($race_kind=='h03') {$chk3 = 'checked'; $race_name='�λ� �渶'; $game_name ='h03';}
elseif ($race_kind=='k01') {$chk4 = 'checked'; $race_name='���� ���'; $game_name ='k01';}
elseif ($race_kind=='k02') {$chk5 = 'checked'; $race_name='â�� ���'; $game_name ='k02';}
elseif ($race_kind=='k03') {$chk6 = 'checked'; $race_name='�λ� ���'; $game_name ='k03';}
elseif ($race_kind=='k03') {$chk7 = 'checked'; $race_name='�̻縮 ����'; $game_name ='t01';}
else { $race_kind=='k01'; $chk1='checked'; $race_name='��õ �渶'; $game_name ='h01';}
?>

<table width=100% align=center cellpadding=0 cellspacing=0 >
	<tr>
		<td valign="top"><table  border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td><img src="/img/main/ticket_01.jpg"></td>
		  </tr>
	  <tr>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td>- �渶/������� [��,��, �Ͽ���] �������� [��,��]�� ��Ⱑ �ֽ��ϴ�. <br>
		  - ���ֱǱ��Ŵ� �Ű��� ���������� �����˴ϴ�. <br>
		  - ����� �������� ȯ�ҵ� �ݾ��� ȯ�ޱ����� ȯ�ҵ˴ϴ�.<br>
		  - ������ȭ : 070-7683-0642<br>
		  - ����� ������ ���� ��ݽ�û�� �Ͻø� �ٷ� ����Ͻ� �� �ֽ��ϴ�.</td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
	  </tr>

		  <tr>
			<td><table  border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td><a href="ticket.php?race_kind=h01&aname=#2" ><img src="/img/main/ticket_02.jpg" border="0"></a></td>
				<td><a href="ticket.php?race_kind=h02&aname=#2" ><img src="/img/main/ticket_03.jpg"  border="0"></a></td>
				<td><a href="ticket.php?race_kind=h03&aname=#2" ><img src="/img/main/ticket_04.jpg"  border="0"></a></td>
				<td><a href="ticket.php?race_kind=k01&aname=#2" ><img src="/img/main/ticket_05.jpg"  border="0"></a></td>
				<td><a href="ticket.php?race_kind=k02&aname=#2" ><img src="/img/main/ticket_06.jpg"  border="0"></a></td>
				<td><a href="ticket.php?race_kind=k03&aname=#2" ><img src="/img/main/ticket_07.jpg"  border="0"></a></td>
				<td><a href="ticket.php?race_kind=t01&aname=#2" ><img src="/img/main/ticket_08.jpg"  border="0"></a></td>
			  </tr>
			</table></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td height="25">&nbsp;</td>
	  </tr>
	<tr>
		<td>
		  <table width="590"  border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="590" height="30">
	<!--					<marquee><b><font color=blue>ȸ������ ���� �̻縮 �������ֱ��� �������Դϴ�. �ǽ¹ٶ��ϴ�</font></b></marquee>	-->
			<b><font color=blue>ȸ������ ���� <?=$race_name?>���ֱ��� �������Դϴ�. �ǽ¹ٶ��ϴ�</font></b></marquee>
			</td>
		  </tr>
		  </table>
		 </td>
	</tr>

    <tr>
	<td>
</table>
<?

if ($select_day) {
    $year = substr($select_day,0,4);
	$month = substr($select_day,4,2);
	$day = substr($select_day,6,2);
	$race_date = $year."-".$month."-".$day;
	
} else { 

	$year = date("Y");
	$month = date("m");
	$day = date("d");
	$race_date = date("Y-m-d");
} 

$sql = "select count(*) as cnt from raceinput where race_date='$race_date' and race_kind='$race_kind' ";
echo $sql;
$row = sql_fetch($sql);
//echo $row[cnt];

if ( !$row[cnt] ) { echo "<script language='JavaScript'> alert('��������� �ԷµǾ����� �ʽ��ϴ�'); </script>"; }

include  "ticket_js.php"; 
?>

<body onload='initRace(curRound, curGameTime, curRaceHour, curRaceMinute)' leftmargin=0 topmargin=0>
<table width=700 border="0" cellspacing="1" cellpadding="1" align="center" bgcolor="e0dad6">
<form name=timeform action=''>
<input type="hidden" name="gubunTxt">
<tr height="25">
	<td colspan=7 bgcolor=ffffff>
		<!--<input type="radio" name="gubun" value="totalM" onClick="checkMoney()" checked><font color="000000"><b>���ݸӴ�+�̺�Ʈ�Ӵ� ���ֱǱ���</b></font>&nbsp;&nbsp;&nbsp;-->
		<input type="radio" name="gubun" value="bankM" onClick="checkMoney()" checked><font color="000000"><b>���ݸӴ� ���ֱǱ���</b></font> &nbsp;&nbsp;&nbsp;
		<input type="radio" name="gubun" value="eventM" onClick="checkMoney()"><font color="000000"><b>�̺�Ʈ�Ӵ� ���ֱǱ���</b></font> &nbsp;&nbsp;&nbsp; 
	</td>
</tr>
<tr>
<td height=25 style='padding-left:5px' colspan=7 bgcolor=ffffff>

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
		&nbsp;&nbsp;<b>���ֽ��۽ð� : <font color=red><span id='hour_minute'></font></b></span>
	   <span id='expect'></span>
	";
?>
</td>
</tr>
<tr>
<?
$totalM = $member[cashmoney] + $member[eventmoney];
$totalM = number_format($totalM);
?>

<td align=center width=130 bgcolor='EEEAE8'><b>���Ű����ܾ�</b></td>
<td width="570" style="PADDING-LEFT:5pt;" bgcolor='#FFFFFF' colspan=6><input type="text" style="text-align:right" name="totMoney" size="10" value=<?=$totalM?>>��</td>
</tr>
<tr>
<td align=center bgcolor='EEEAE8'><b>�����ð�</b></td>
<td style="PADDING-LEFT:5pt" bgcolor='#FFFFFF' colspan=6><span id=RoundNm></span><input type=text name=remain_time style="color:red"></td>
</tr>
<tr>
<td align=center bgcolor='EEEAE8'><b>�½�</b></td>
<td style="PADDING-LEFT:5pt" bgcolor='#FFFFFF' colspan=6>
	<b><label for='memb2b_1' style='cursor:hand'>�ֽ½�</label></b><input type=radio id='memb2b_1' name=game_type value='�ֽ½�' onclick=chkTicketType(this.value)>&nbsp;|
	<b><label for='memb2b_2' style='cursor:hand'>���½�</label></b><input type=radio id='memb2b_2' checked name=game_type value='���½�' onclick=chkTicketType(this.value)>&nbsp;|
	<b><label for='memb2b_3' style='cursor:hand'>�ﺹ��</label></b><input type=radio id='memb2b_3' name=game_type value='�ﺹ��' onclick=chkTicketType(this.value)>&nbsp;|
	<b><label for='memb2b_3' style='cursor:hand'>�����½�</label></b><input type=radio id='memb2b_3' name=game_type value='������' onclick=chkTicketType(this.value)>&nbsp;|
	<b><label for='memb2b_4' style='cursor:hand'>����</label></b><input type=radio id='memb2b_4' name=game_type value='������' onclick=chkTicketType(this.value)>&nbsp;|
	<b><label for='memb2b_5' style='cursor:hand'>����</label></b><input type=radio id='memb2b_5' name=game_type value='������' onclick=chkTicketType(this.value)>&nbsp;|
	<!--
	<b>�ܽ½�</b><input type=radio name=game_type value='�ܽ½�' disabled onclick=chkTicketType(this.value)>&nbsp;|
	<b>���½�</b><input type=radio name=game_type value='���½�' disabled onclick=chkTicketType(this.value)>&nbsp;-->
</td>
</tr>
<tr bgcolor='EEEAE8' align=center>
<td width="130" align=center><b>������ȣ</b></td>
<td width="95" align=center><b>1.</b></td>
<td width="95" align=center><b>2.</b></td>
<td width="95" align=center ><b>3.</b></td>
<td width="95" align=center><b>4.</b></td>
<td width="95" align=center><b>5.</b></td>
<td width="95" align=center><b>6.</b></td>
</tr>

<tr bgcolor='#FFFFFF' align=center>
<td><b>1��</b></td>
<td><SPAN id=span_first_player></SPAN></td>
<td><SPAN id=span_first_player></SPAN></td>
<td><SPAN id=span_first_player></SPAN></td>
<td><SPAN id=span_first_player></SPAN></td>
<td><SPAN id=span_first_player></SPAN></td>
<td><SPAN id=span_first_player></SPAN></td>
</tr>

<tr bgcolor='#FFFFFF' align=center>
<td><b>2��</b></td>
<td><SPAN id=span_second_player></SPAN></td>
<td><SPAN id=span_second_player></SPAN></td>
<td><SPAN id=span_second_player></SPAN></td>
<td><SPAN id=span_second_player></SPAN></td>
<td><SPAN id=span_second_player></SPAN></td>
<td><SPAN id=span_second_player></SPAN></td>
</tr>

<tr bgcolor='#FFFFFF' align=center>
<td><b>3��</b></td>
<td><SPAN id=span_third_player></SPAN></td>
<td><SPAN id=span_third_player></SPAN></td>
<td><SPAN id=span_third_player></SPAN></td>
<td><SPAN id=span_third_player></SPAN></td>
<td><SPAN id=span_third_player></SPAN></td>
<td><SPAN id=span_third_player></SPAN></td>
</tr>


<tr bgcolor='FFFFFF'>
<td align=center bgcolor=EEEAE8><b>���űݾ�</b></td>
<td colspan=6>
	<table width=100%  border=0cellpadding=0 cellspacing=0>
	<tr>
	<td>&nbsp;&nbsp;1õ</td><td>&nbsp;&nbsp;2õ</td><td>&nbsp;&nbsp;3õ</td><td>&nbsp;&nbsp;5õ</td>
	<td>&nbsp;&nbsp;1��</td><td>&nbsp;&nbsp;2��</td><td>&nbsp;&nbsp;3��</td><td>&nbsp;&nbsp;5��</td>
	<td>&nbsp;&nbsp;10��</td><td>&nbsp;&nbsp;20��</td><td>&nbsp;&nbsp;30��</td><td>&nbsp;&nbsp;50��</td><td>&nbsp;&nbsp;100��</td>
	</tr>
	<tr>
	<td>&nbsp;&nbsp;<input type=checkbox name=def_money value=1000 onclick="gumplus(1000, 0)"></td>
	<td>&nbsp;&nbsp;<input type=checkbox name=def_money value=2000 onclick="gumplus(2000, 1)"></td>
	<td>&nbsp;&nbsp;<input type=checkbox name=def_money value=3000 onclick="gumplus(3000, 2)"></td>
	<td>&nbsp;&nbsp;<input type=checkbox name=def_money value=5000 onclick="gumplus(5000, 3)"></td>
	<td>&nbsp;&nbsp;<input type=checkbox name=def_money value=10000 onclick="gumplus(10000, 4)"></td>
	<td>&nbsp;&nbsp;<input type=checkbox name=def_money value=20000 onclick="gumplus(20000, 5)"></td>
	<td>&nbsp;&nbsp;<input type=checkbox name=def_money value=30000 onclick="gumplus(30000, 6)"></td>
	<td>&nbsp;&nbsp;<input type=checkbox name=def_money value=50000 onclick="gumplus(50000, 7)"></td>
	<td>&nbsp;&nbsp;<input type=checkbox name=def_money value=100000 onclick="gumplus(100000, 8)"></td>
	<td>&nbsp;&nbsp;<input type=checkbox name=def_money value=200000 onclick="gumplus(200000, 9)"></td>
	<td>&nbsp;&nbsp;<input type=checkbox name=def_money value=300000 onclick="gumplus(300000, 10)"></td>
	<td>&nbsp;&nbsp;<input type=checkbox name=def_money value=500000 onclick="gumplus(500000, 11)"></td>
	<td>&nbsp;&nbsp;<input type=checkbox name=def_money value=1000000 onclick="gumplus(1000000, 12)"></td>
	</tr>
    <tr>
      <td style="PADDING-LEFT:5pt" colspan="9">
	    <b>�� ���ž� <input type=text name=gum size=10 style="border=0; background-color:#EFEFEF; color: #0000FF; font-weight: bold; text-align: right">&nbsp;&nbsp;��</b>
      </td>
    </tr>
    </table>
</td>
</tr>
<tr bgcolor='FFFFFF'>
<td align=center bgcolor='EEEAE8'><b>���Ÿż�</b></td>
<td style="PADDING-LEFT:5pt" colspan=6>
	���� 1��,2�� ��ȣ �� �ݾ�����
	<select name=money_count>
			<option value=1>1</option>
			<option value=2>2</option>
			<option value=3>3</option>
			<option value=4>4</option>
			<option value=5>5</option>
			<option value=6>6</option>
			<option value=7>7</option>
			<option value=8>8</option>
			<option value=9>9</option>
			<option value=10>10</option>
		</select>
        �� �����մϴ�.</td>
</tr>
<tr>
<td style="PADDING-TOP:10pt;PADDING-bottom:10pt" bgcolor=#ffffff height=45 align=center colspan=7>
<font color=#C80632>
<b>[���ų������]��ư�� �����ð�, �ݵ�� �Ʒ� [����]��ư�� Ŭ���� ���Ű� �Ϸ�˴ϴ�.<b></font><br>
<!-- <img src='http://123ebs.com/img/btn_04.gif' border=0 onClick="inputCart(timeform.gubunTxt.value)">-->
<input type=button value=���ų������ style="PADDING-TOP:3pt" onClick="inputCart(timeform.gubunTxt.value)">
</td>
</tr>
<tr><td bgcolor="FFFFFF" colspan=7><font color=336699>������ ���Ȳ�� ���� ���Ÿ����ð��� �ӹ��Ͽ� ���Ű� �̷����� �������� �ֽ��ϴ�
<br>�̿� ������ 30������������ "�����ϱ�"��ư�� Ŭ���ϽǼ� �ֵ��� �ð������� �������� �մϴ�
</font></td></tr>
</form>
</table>

<table width=700>
<form name=cartform method=post>
<input type=hidden name="tmpRemainTime">
<input type=hidden name="mode" value=''>
<input type=hidden name="total_bet_money">
<input type=hidden name="total_commission">
<tr>
<td>
<span id=cart style='display:none'></span>
</td>
</tr>
<tr>
<td>
<span id=mycart></span>
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td align=center>
	<table border=0 cellpadding=2 cellspacing=0 >
	<tr align=center>
	<td><b>���ñݾ�</b></td>
	<td><input type=text name=total_used_money size=12 readonly class=input2></td>
	<td width=20></td>

	<td><b>���ݸӴ��ܾ�</b></td>
	<td><input type=text name=remain_money size=12 readonly class=input2 style="text-align=right" value=''></td>

	<td><b>�̺�Ʈ�Ӵ��ܾ�</b></td>
	<td><input type=text name=remain_eventmoney size=12 readonly class=input2 style="text-align=right" value=''> </td>

	</tr>
	</table>
</td></tr>

<tr><td>
	<div id="totalDisplay" style="display:block">
	<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="28"></td>
		<td><b>���ݸӴ�/�̺�Ʈ�Ӵ� �հ� �ܾ�</b> &nbsp;<input type=text style="text-align=right" name=remain_totalmoney size=12 readonly class=input2 value=''>��</td>
	</tr>
	</table>
	</div>
</td>
</tr>
<span id=sendValue></span>
<tr>
<td align=center style="PADDING-TOP:15pt">
	 <input type=button value='�����ϱ�' style="PADDING-TOP:3pt" name=OrderBnt onClick="Order('', '<?=$game_name?>', timeform.gubunTxt.value)" align=absMiddle style=cursor:hand>
	 <input type=hidden name=run_page value=99>
	 <input type=button value="����ϱ�" style="PADDING-TOP:3pt" onclick="RemoveMyCart1()" style=cursor:hand>

	 <!--<img src='http://123ebs.com/img/btn_07.gif' name=OrderBnt border=0 onClick="Order('', 'boat_mi', timeform.gubunTxt.value)" align=absMiddle style=cursor:hand>
	 <img src='http://123ebs.com/img/btn_08.gif' border=0 onclick="RemoveMyCart1()" align=absMiddle style=cursor:hand>-->

</td>
</tr>
</form>

</table>
</td>
</tr>

</table>

<?
include_once("./_tail.php");
?>
