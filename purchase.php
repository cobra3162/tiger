<?
$sub_menu = "200100";
include_once("./_common.php");

auth_check($auth[$sub_menu], "w");

$token = get_token();

if ($w == "") 
{
    $required_mb_id = "required minlength=3 alphanumericunderline itemname='ȸ�����̵�'";
    $required_mb_password = "required itemname='�н�����'";

    $mb[mb_mailling] = 1;
    $mb[mb_open] = 1;
    $mb[mb_level] = $config[cf_register_level];
    $html_title = "���";
}
else if ($w == "u") 
{
    $mb = get_member($mb_id);
    if (!$mb[mb_id])
        alert("�������� �ʴ� ȸ���ڷ��Դϴ�."); 

    if ($is_admin != 'super' && $mb[mb_level] >= $member[mb_level])
        alert("�ڽź��� ������ ���ų� ���� ȸ���� ������ �� �����ϴ�.");

    $required_mb_id = "readonly style='background-color:#dddddd;'";
    $required_mb_password = "";
    $html_title = "����";
} 
else 
    alert("����� �� ���� �Ѿ���� �ʾҽ��ϴ�.");

if ($mb[mb_mailling]) $mailling_checked = "checked"; // ���� ����
if ($mb[mb_sms])      $sms_checked = "checked"; // SMS ����
if ($mb[mb_open])     $open_checked = "checked"; // ���� ����

$g4[title] = "���ְ���Է� " ;
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
    <td>��ⱸ��</td>
    <td colspan=3>
        <input type=radio name='racekind' value="hor_kc" checked> ��õ�渶
        <input type=radio name='racekind' value="hor_jj" selected> ���ְ渶
        <input type=radio name='racekind' value="hor_ps" selected> �λ�渶		
        <input type=radio name='racekind' value="wh_km" selected> ������
        <input type=radio name='racekind' value="wh_cw" selected> â�����
        <input type=radio name='racekind' value="wh_ps" selected> ��õ���		
        <input type=radio name='racekind' value="bo_misari" selected> �̻縮����		        
    </td>
</tr>
<tr class='ht'>
    <td>�����</td>
    <td><input type=text class=ed name='race_ year' size=4 value=2012>��<input type=text class=ed name='race_month' size=2 value=05>�� <input type=text class=ed name='race_day' size=2 value=03>��, ������</td>
    <td>������</td>
    <td>��õ</td>

</tr>
<tr class='ht'>
    <td>�����</td>
    <td colspan=3>

    <table width=100% align=center cellpadding=0 cellspacing=0 border=1>
		<tr>
			<td width=60 align=center>���</td><td width=60 align=center>1��</td><td width=60 align=center>2��</td><td width=60 align=center>3��</td>
			<td width=60 align=center>���</td><td width=60 align=center>����1 <br>������1</td><td width=60 align=center>����2 <br>������2</td>
			<td width=60 align=center>����3 <br>������3</td><td width=60 align=center>����</td><td width=60 align=center>�ֽ�</td>
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

         
		 <!-- ����� ���� 
		<tr>
			<td width=60 align=center>���</td><td width=60 align=center>1��</td><td width=60 align=center>2��</td><td width=60 align=center>3��</td><td width=60 align=center>���</td>
			<td width=60 align=center>����1 </td><td width=60 align=center>����2 </td><td width=60 align=center>����</td><td width=60 align=center>�Ž�</td><td width=60 align=center>�ﺹ��</td>
       </tr>
        -->
	</table>
</td>
</tr>
<tr><td colspan=4 class=line2></td></tr>
</table>

<p align=center>
    <input type=submit class=btn1 accesskey='s' value='  Ȯ    ��  '>&nbsp;
    <input type=button class=btn1 value='  ��  ��  ' onclick="document.location.href='./member_list.php?<?=$qstr?>';">&nbsp;
    
    <? if ($w != '') { ?>
    <input type=button class=btn1 value='  ��  ��  ' onclick="del('./member_delete.php?<?=$qstr?>&w=d&mb_id=<?=$mb[mb_id]?>&url=<?=$_SERVER[PHP_SELF]?>');">&nbsp;
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
