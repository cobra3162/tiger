<?
$sub_menu = "200200";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

//$norace = $_POST[norace];
//$kind = $_POST[kind];

//echo "norace=$norace,  kind=$kind"; 
if(!$norace) $norace = 5;
if(!$kind || $kind==1) { $chk1='checked'; $race_kind = 'h01'; $selected02='selected'; }
if ($kind==2)       { $chk2 = 'checked'; $race_kind ='h02'; $selected02='selected';}
elseif ($kind==3)  {$chk3 = 'checked'; $race_kind ='h03'; $selected02='selected';}
elseif ($kind==4)  {$chk4 = 'checked'; $race_kind ='k01'; $selected01='selected';}
elseif ($kind==5)  {$chk5 = 'checked'; $race_kind ='k02';$selected01='selected';}
elseif ($kind==6)  {$chk6 = 'checked'; $race_kind ='k03'; $selected01='selected';}
elseif ($kind==7)  {$chk7 = 'checked'; $race_kind ='t01'; $selected03='selected';}

$token = get_token();

$g4[title] = "경주정보입력 " ;
include_once("./admin.head_main.php");

//$raceyear = $_POST[race_year];

if (!$race_year) {
	$race_year = date(Y) ; $race_month =date(m); $race_day= date(d); 
} 
$race_date = $race_year."-".$race_month."-".$race_day;
?>

<script language="javascript" src="<?=$g4[path]?>/js/sideview.js"></script>
<script language="JavaScript">
var list_update_php = "";
var list_confirm_php = "account_confirm.php";
var list_delete_php = "account_delete.php";
var list_cancle_php = "account_cancle.php";

function noRace(kind) {
	var kind;
	if ( kind == 1 ) 	{ document.fraceinput.num_race.value = 12;  document.fnum_race.norace.value =12; }
	if ( kind == 2 ) 	{ document.fraceinput.num_race.value = 3;  document.fnum_race.norace.value = 3; }
	if ( kind == 3 )    { document.fraceinput.num_race.value = 11;  document.fnum_race.norace.value = 11; }
	if ( kind == 4 ) 	{ document.fraceinput.num_race.value = 14;  document.fnum_race.norace.value = 14; }
	if ( kind == 5 ) 	{ document.fraceinput.num_race.value = 4;  document.fnum_race.norace.value = 4; }
	if ( kind == 6 ) 	{ document.fraceinput.num_race.value = 4;  document.fnum_race.norace.value = 4; }
	if ( kind == 7 ) 	{ document.fraceinput.num_race.value = 15;  document.fnum_race.norace.value = 15; }

    document.fnum_race.kind.value = kind ;
    document.fnum_race.submit();

}
</script>
<form name=fnum_race method=post  action="./race_information.php">
<input type=hidden name=norace>
<input type=hidden name=kind>
</form>

<? 
$sql = "select count(*) as cnt from raceinput where race_kind='$race_kind' and race_date='$race_date' ";
//echo $sql; 
$row = sql_fetch($sql);

if ($row[cnt]) { $w='u'; 
$sql2 = "select * from raceinput where race_kind='$race_kind' and race_date='$race_date' ";
//echo $sql2;
//exit;
$row2 = sql_fetch($sql2);
if($row2[num_race]) $norace = $row2[num_race];
if($norace2) $norace = $norace2;
$no = $row2[no];
}

?>

<table width=90% align=left cellpadding=0 cellspacing=0>
<colgroup width=15% class='col1 pad1 bold right'>
<colgroup width=15% class='col2 pad2'>
<colgroup width=15% class='col1 pad1 bold right'>
<colgroup width=45% class='col2 pad2'>
<tr>
    <td colspan=4 class=title align=left><img src='<?=$g4[admin_path]?>/img/icon_title.gif'> <?=$g4[title]?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>

<form name=fraceinput method=POST action='./race_inform_update.php'>
<input type=hidden name=w  value='<?=$w?>'>
<input type=hidden name=no  value='<?=$no?>'>
<input type=hidden name=race_kind  value='<?=$race_kind?>'>
<tr class='ht'>
    <td>경기구분</td>
    <td colspan=3>
        <input type=radio name='kind' value="1" <?=$chk1?> onclick="noRace(1);"> 과천경마
        <input type=radio name='kind' value="2" <?=$chk2?> onclick="noRace(2);"> 제주경마
        <input type=radio name='kind' value="3" <?=$chk3?> onclick="noRace(3);"> 부산경마		
        <input type=radio name='kind' value="4" <?=$chk4?> onclick="noRace(4);"> 광명경륜
        <input type=radio name='kind' value="5" <?=$chk5?> onclick="noRace(5);"> 창원경륜
        <input type=radio name='kind' value="6" <?=$chk6?> onclick="noRace(6);"> 부산경륜		
        <input type=radio name='kind' value="7" <?=$chk7?> onclick="noRace(7);"> 미사리경정		        
    </td>
</tr>

<script>

function  change_day() {

var race_year = document.fraceinput.race_year.value;
var race_month = document.fraceinput.race_month.value;
var race_day = document.fraceinput.race_day.value;

document.location.href='<?=$PHP_SELF?>?race_year='+race_year+'&race_month='+race_month+'&race_day='+race_day+'&kind=<?=$kind?>';

}


function  change_numrace() {

var num_race = document.fraceinput.num_race.value;
var kind ;
var race_date;

document.location.href='<?=$PHP_SELF?>?race_date=<?=$race_date?>&kind=<?=$kind?>&norace2='+num_race;

}

</script>

<tr class='ht'>
    <td>경기수</td>
    <td><input type=text class=ed name='num_race' size=2 value=<?=$norace?>>
	&nbsp; <input type=button class=btn1 value='경기수변경' onclick="javascript:change_numrace()"; ></td>
    <td>경기일</td>
    <td>
	<input type=text class=ed name='race_year' size=4 value='<?=$race_year?>'>년<input type=text class=ed name='race_month' size=2 value='<?=$race_month?>'>월 <input type=text class=ed name='race_day' size=2 value='<?=$race_day?>'>
	&nbsp;&nbsp;&nbsp; <input type=button class=btn1 value=' 날짜변경 조회 ' onclick="javascript:change_day()"; > </td>
</tr>

<tr class='ht'>
    <td>경기시작시간</td>
    <td colspan=3>
	<? 
	if (!$w)  {
	    for ( $i=1;$i<=$norace; $i++) {
        if ($i<10) $sp="&nbsp;&nbsp"; else $sp='';
		$i_str = "제".$sp.$i."경기";
		echo "$i_str<select name='hr_{$i}'>
		        <option value=09>09</option><option value=10>10</option><option value=11>11</option><option value=12>12</option>
				<option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option>
				<option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option>
				<option value=21>21</option><option value=22>22</option>
					
				</select>시";
		echo "&nbsp;<select name='min_{$i}'>
		        <option value=00>00</option><option value=05>05</option><option value=10>10</option><option value=15>15</option><option value=20>20</option>
				<option value=25>25</option><option value=30>30</option><option value=35>35</option><option value=40>40</option>
				<option value=45>45</option><option value=50>50</option><option value=55>55</option></select>분";
			
         					
		echo "&nbsp;라인<select name='line_{$i}'>
		        <option value=1></option><option value=2>2</option><option value=3>3</option><option value=4>4</option>
				<option value=5>5</option><option value=6 $selected03>6</option><option value=7 $selected01>7</option><option value=8>8</option>
				<option value=9>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option>
				<option value=13>13</option><option value=14 $selected02>14</option></select> |&nbsp;&nbsp";
		
		if ($i%2 == 0 ) echo "<br>";
       }
	} else {
		for ( $i=1;$i<=$norace; $i++) {
        if ($i<10) $sp="&nbsp;&nbsp"; else $sp='';
        
		$start_imsi = 'start_'.$i; $hr_imsi='hr_'.$i; $min_imsi='min_'.$i;  $line_imsi = 'line_'.$i;
		$start_time = $row2[$start_imsi];
        $start_time = explode(':', $start_time) ;
		${$hr_imsi} = $start_time[0];
		${$min_imsi} = $start_time[1];
		${$line_imsi} = $row2[$line_imsi];		

		$i_str = "제".$sp.$i."경기";
		echo "$i_str<input type=text name='hr_{$i}' value='${$hr_imsi}' size=2>시&nbsp;<input type=text name='min_{$i}' value='${$min_imsi}' size=2>분 <input type=text name='line_{$i}' value='${$line_imsi}' size=2> 라인 |&nbsp;&nbsp;";
		
		if ($i%3 == 0 ) echo "<br>";
		}
	}

		?>
</td>
</tr>
<tr><td colspan=4 class=line2></td></tr>


<tr><td colspan=4 >
    <p align=center>
    <input type=submit class=btn1 accesskey='s' value='  경기시간표 입력 '>&nbsp;
    <!--<input type=button class=btn1 value='  목  록  ' onclick="document.location.href='./race_inform_update.php';">&nbsp;-->
    
    <? if ($w != '') { ?>
    <input type=button class=btn1 value='  삭  제  ' onclick="del('./race_inform_delete.php?no=<?=$no?>&url=<?=$_SERVER[PHP_SELF]?>');">&nbsp;
    <? } ?>
</td></tr>

<?

function race_list($place) {

global $race_year ;
global $race_month ;
global $race_day ;

    $str = '';

	if (!$race_year) {
	$race_year = date(Y) ; $race_month =date(m); $race_day= date(d); 
	} 

	$race_date = $race_year."-".$race_month."-".$race_day;
	$race_kind = $place;

	if($race_kind == 't01') $race_str = "미사리경정";
	if($race_kind == 'h01') $race_str = "과천경마";
	if($race_kind == 'h02') $race_str = "제주경마";
	if($race_kind == 'h03') $race_str = "부산경마";
	if($race_kind == 'k01') $race_str = "광명경륜";
	if($race_kind == 'k02') $race_str = "창원경륜";
	if($race_kind == 'k03') $race_str = "부산경륜";

	$str .= "
		<td valign=top>
		<table width=110 >
			<tr><td align=center>$race_str</td></tr>
			<tr align='center'>
				<td bgcolor='e0dad6'></td>
			</tr>";	


	$sql = "select count(*) as cnt from raceinput where race_kind='$race_kind' and race_date='$race_date' ";
    
	$row = sql_fetch($sql);

    //echo $sql;

	if ($row[cnt]) { 
	$sql3 = "select * from raceinput where race_kind='$race_kind' and race_date='$race_date' ";
	$row3 = sql_fetch($sql3);
	$norace = $row3[num_race];
	$no = $row3[no];
	
		for ( $i=1;$i<=$norace; $i++) {
		if ($i<10) $sp="&nbsp;&nbsp"; else $sp='';

		$start_imsi = 'start_'.$i; $hr_imsi='hr_'.$i; $min_imsi='min_'.$i;  $line_imsi = 'line_'.$i;
		$start_time0 = $row3[$start_imsi];
		$start_time = explode(':', $start_time0) ;
		${$hr_imsi} = $start_time[0];
		${$min_imsi} = $start_time[1];
		${$line_imsi} = $row3[$line_imsi];		

		$i_str = $sp.$i."경기";
		$str .= "<tr><td>$i_str $start_time0 (${$line_imsi})</td></tr>";}
	} else $str = "	<td valign=top>
		<table width=110 valign=top>
			<tr><td align=center>$race_str</td></tr>
			<tr align='center'>
				<td bgcolor='e0dad6'></td>
			</tr>	
			<tr align=center><td>등록된 경기없음</td></tr>	";
	
	$str .= "		</table>
		</td>";

    return $str;
}
?>

<tr>
	<td colspan=4>
	<table width="700"  border="0" cellpadding="1" cellspacing="1" bgcolor="cbac6f">
	<tr align="center">
		<td colspan="7" bgcolor="e0dad6" height=25 ><b>경주일 <?=$race_date?></b></td>
	</tr>
	<tr bgcolor=#EEEAE8>

<? 

echo race_list('h01'); 

echo race_list('h02'); 

echo race_list('h03'); 

echo race_list('k01'); 

echo race_list('k02'); 

echo race_list('k03'); 

echo race_list('t01');

?>

<input type=hidden name=reconfirm value='<?=$str?>'>


	</tr>
	</table>
	</td>
</tr>
</form>

</table>

<script language='Javascript'>
function fraceinput_submit(f)
{
    f.action = './race_inform_update.php';
    return true;
}
</script>

<script language="JavaScript">
function faccountlist2_submit(f)
{
    f.action = "./account_update.php";
    return true;
}
</script>

<?
include_once ("./admin.tail.php");
?>

