<?
$sub_menu = "200100";
include_once("./_common.php");

auth_check($auth[$sub_menu], "w");

$token = get_token();

if ($w == "") 
{
    $required_mb_id = "required minlength=3 alphanumericunderline itemname='회원아이디'";
    $required_mb_password = "required itemname='패스워드'";

    $mb[mb_mailling] = 1;
    $mb[mb_open] = 1;
    $mb[mb_level] = $config[cf_register_level];
    $html_title = "등록";
}
else if ($w == "u") 
{
    $mb = get_member($mb_id);
    if (!$mb[mb_id])
        alert("존재하지 않는 회원자료입니다."); 

    if ($is_admin != 'super' && $mb[mb_level] >= $member[mb_level])
        alert("자신보다 권한이 높거나 같은 회원은 수정할 수 없습니다.");

    $required_mb_id = "readonly style='background-color:#dddddd;'";
    $required_mb_password = "";
    $html_title = "수정";
} 
else 
    alert("제대로 된 값이 넘어오지 않았습니다.");

if ($mb[mb_mailling]) $mailling_checked = "checked"; // 메일 수신
if ($mb[mb_sms])      $sms_checked = "checked"; // SMS 수신
if ($mb[mb_open])     $open_checked = "checked"; // 정보 공개

$g4[title] = "경주결과입력 " ;
include_once("./admin.head_main.php");
?>

<table width=100% align=center cellpadding=0 cellspacing=0 >
<form name=frace_result method=post onsubmit="return fraceinput_submit(this);" autocomplete="off">
<input type=hidden name=w  value='<?=$w?>'>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<tr>
    <td colspan=4 class=title align=left><img src='<?=$g4[admin_path]?>/img/icon_title.gif'> <?=$g4[title]?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td>경기구분</td>
    <td colspan=3>
        <input type=radio name='racekind' value="hor_kc" checked> 과천경마
        <input type=radio name='racekind' value="hor_jj" selected> 제주경마
        <input type=radio name='racekind' value="hor_ps" selected> 부산경마		
        <input type=radio name='racekind' value="wh_km" selected> 광명경륜
        <input type=radio name='racekind' value="wh_cw" selected> 창원경륜
        <input type=radio name='racekind' value="wh_ps" selected> 과천경륜		
        <input type=radio name='racekind' value="bo_misari" selected> 미사리경정		        
    </td>
</tr>
<tr class='ht'>
    <td>경기일</td>
    <td><input type=text class=ed name='race_ year' size=4 value=2012>년<input type=text class=ed name='race_month' size=2 value=05>월 <input type=text class=ed name='race_day' size=2 value=03>일, 수요일</td>
    <td>경기장소</td>
    <td>과천</td>

</tr>
<tr class='ht'>
    <td>경기결과</td>
    <td colspan=3>

    <table width=100% align=center cellpadding=0 cellspacing=0 border=1>
		<tr>
			<td width=60 align=center>경기</td><td width=60 align=center>1착</td><td width=60 align=center>2착</td><td width=60 align=center>3착</td>
			<td width=60 align=center>딘승</td><td width=60 align=center>연승1 <br>복연승1</td><td width=60 align=center>연승2 <br>복연승2</td>
			<td width=60 align=center>연승3 <br>복연승3</td><td width=60 align=center>복승</td><td width=60 align=center>쌍승</td>
        </tr>
		<tr>
			<td  align=center>1</td><td  align=center><input type=text name=1_1st_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=1_2nd_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=2_3rd_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=1_single size=5 ></td><td  align=center><input type=text name=1_chain1 size=5><br><input type=text name=1_dbchain1 size=5 ></td><td  align=center><input type=text name=1_chain2 size=5 > <br><input type=text name=1_dbchain2 size=5 ></td>
			<td  align=center><input type=text name=1_chain2 size=5 > <br><input type=text name=1_dbchain2 size=5 ></td>
			<td  align=center><input type=text name=1_double size=5 ></td><td  align=center><input type=text name=1_couple size=5 ></td>
        </tr>
		<tr>
			<td  align=center>2</td><td  align=center><input type=text name=2_1st_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=2_2nd_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=2_3rd_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=2_single size=5 ></td><td  align=center><input type=text name=2_chain1 size=5><br><input type=text name=2_dbchain1 size=5 ></td><td  align=center><input type=text name=2_chain2 size=5 > <br><input type=text name=2_dbchain2 size=5 ></td>
			<td  align=center><input type=text name=2_chain2 size=5 > <br><input type=text name=2_dbchain2 size=5 ></td>
			<td  align=center><input type=text name=2_double size=5 ></td><td  align=center><input type=text name=2_couple size=5 ></td>
        </tr>
		<tr>
			<td  align=center>3</td><td  align=center><input type=text name=3_1st_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=3_2nd_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=2_3rd_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=3_single size=5 ></td><td  align=center><input type=text name=3_chain1 size=5><br><input type=text name=3_dbchain1 size=5 ></td><td  align=center><input type=text name=3_chain2 size=5 > <br><input type=text name=3_dbchain2 size=5 ></td>
			<td  align=center><input type=text name=3_chain2 size=5 > <br><input type=text name=3_dbchain2 size=5 ></td>
			<td  align=center><input type=text name=3_double size=5 ></td><td  align=center><input type=text name=3_couple size=5 ></td>
        </tr>
		<tr>
			<td  align=center>4</td><td  align=center><input type=text name=4_1st_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=4_2nd_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=2_3rd_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=4_single size=5 ></td><td  align=center><input type=text name=4_chain1 size=5><br><input type=text name=4_dbchain1 size=5 ></td><td  align=center><input type=text name=4_chain2 size=5 > <br><input type=text name=4_dbchain2 size=5 ></td>
			<td  align=center><input type=text name=4_chain2 size=5 > <br><input type=text name=4_dbchain2 size=5 ></td>
			<td  align=center><input type=text name=4_double size=5 ></td><td  align=center><input type=text name=4_couple size=5 ></td>
        </tr>
		<tr>
			<td  align=center>5</td><td  align=center><input type=text name=5_1st_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=5_2nd_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=2_3rd_arrival size=8  maxsize=20 ></td>
			<td  align=center><input type=text name=5_single size=5 ></td><td  align=center><input type=text name=5_chain1 size=5><br><input type=text name=5_dbchain1 size=5 ></td><td  align=center><input type=text name=5_chain2 size=5 > <br><input type=text name=5_dbchain2 size=5 ></td>
			<td  align=center><input type=text name=5_chain2 size=5 > <br><input type=text name=5_dbchain2 size=5 ></td>
			<td  align=center><input type=text name=5_double size=5 ></td><td  align=center><input type=text name=5_couple size=5 ></td>
        </tr>

         
		 <!-- 경륜과 경정 
		<tr>
			<td width=60 align=center>경기</td><td width=60 align=center>1착</td><td width=60 align=center>2착</td><td width=60 align=center>3착</td><td width=60 align=center>딘승</td>
			<td width=60 align=center>연승1 </td><td width=60 align=center>연승2 </td><td width=60 align=center>복승</td><td width=60 align=center>씽승</td><td width=60 align=center>삼복승</td>
       </tr>
        -->
	</table>
</td>
</tr>
<tr><td colspan=4 class=line2></td></tr>
</table>

<p align=center>
    <input type=submit class=btn1 accesskey='s' value='  확    인  '>&nbsp;
    <input type=button class=btn1 value='  목  록  ' onclick="document.location.href='./member_list.php?<?=$qstr?>';">&nbsp;
    
    <? if ($w != '') { ?>
    <input type=button class=btn1 value='  삭  제  ' onclick="del('./member_delete.php?<?=$qstr?>&w=d&mb_id=<?=$mb[mb_id]?>&url=<?=$_SERVER[PHP_SELF]?>');">&nbsp;
    <? } ?>
</form>

<script language='Javascript'>


function frace_result_submit(f)
{
    f.action = './race_result_update.php';
    return true;
}
</script>

<?
include_once("./admin.tail.php");
?>
