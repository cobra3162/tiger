<?
include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "";
include_once("./_head.php");

if ($game_name) $race_kind = $game_name; 
if (!$race_kind) $race_kind = 'h01';
if ($race_kind=='h02') {$chk2 = 'checked'; $race_name='���� �渶'; $game_name ='h02'; $colspan=15;}
elseif ($race_kind=='h03') {$chk3 = 'checked'; $race_name='�λ� �渶'; $game_name ='h03'; $colspan=15;}
elseif ($race_kind=='k01') {$chk4 = 'checked'; $race_name='���� ���'; $game_name ='k01'; $colspan=8;}
elseif ($race_kind=='k02') {$chk5 = 'checked'; $race_name='â�� ���'; $game_name ='k02'; $colspan=8;}
elseif ($race_kind=='k03') {$chk6 = 'checked'; $race_name='�λ� ���'; $game_name ='k03'; $colspan=8;}
elseif ($race_kind=='t01') {$chk7 = 'checked'; $race_name='�̻縮 ����'; $game_name ='t01'; $colspan=8;}
elseif ($race_kind=='h01') {$chk1 = 'checked'; $race_name='��õ �渶'; $game_name ='h01'; $colspan=15;}

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

<?
$sql = "select cf_call_center from config_race ";
$rowcall = sql_fetch($sql);
$callcenter = $rowcall[cf_call_center];
?>
	  <tr>
		<td>- �渶/������� [��,��, �Ͽ���] �������� [��,��]�� ��Ⱑ �ֽ��ϴ�. <br>
		  - ���ֱǱ��Ŵ� �Ű��� ���������� �����˴ϴ�. <br>
		  - ����� �������� ȯ�ҵ� �ݾ��� ȯ�ޱ����� ȯ�ҵ˴ϴ�.<br>
		  - ������ȭ : <b><font color=teal><?=$callcenter?></font><br>
		  - ����� ������ ���� ��ݽ�û�� �Ͻø� �ٷ� ����Ͻ� �� �ֽ��ϴ�.</td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
	  </tr>


	  <tr>
		<td align="left">
			<!----- ##### ������ ���� ------>
			<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td><!-- 1�� ������ -->
						<a href="ticket.php?race_kind=h01"><img src="/images/ico01.gif" onmouseover="this.src='/images/ico01_over.gif'" onmouseout="this.src='/images/ico01.gif'" border="0"></td>
					<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
					<td><!-- 2�� ������ -->
						<a href="ticket.php?race_kind=h02"><img src="/images/ico02.gif" onmouseover="this.src='/images/ico02_over.gif'" onmouseout="this.src='/images/ico02.gif'" border="0"></td>
					<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
					<td><!-- 3�� ������ -->
						<a href="ticket.php?race_kind=h03"><img src="/images/ico03.gif" onmouseover="this.src='/images/ico03_over.gif'" onmouseout="this.src='/images/ico03.gif'" border="0"></td>
					<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
					<td><!-- 4�� ������ -->
						<a href="ticket.php?race_kind=k01"><img src="/images/ico04.gif" onmouseover="this.src='/images/ico04_over.gif'" onmouseout="this.src='/images/ico04.gif'" border="0"></td>
					<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
					<td><!-- 5�� ������ -->
						<a href="ticket.php?race_kind=k02"><img src="/images/ico05.gif" onmouseover="this.src='/images/ico05_over.gif'" onmouseout="this.src='/images/ico05.gif'" border="0"></td>
					<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
					<td><!-- 6�� ������ -->
						<a href="ticket.php?race_kind=k03"><img src="/images/ico06.gif" onmouseover="this.src='/images/ico06_over.gif'" onmouseout="this.src='/images/ico06.gif'" border="0"></td>
					<td><img src="/images/ico_middle.gif"></td><!-- ���� -->
					<td><!-- 7�� ������ -->
						<a href="ticket.php?race_kind=t01"><img src="/images/ico07.gif" onmouseover="this.src='/images/ico07_over.gif'" onmouseout="this.src='/images/ico07.gif'" border="0"></td>
				</tr>
			</table></td>
			<!----- ##### ������ �� ------>
	</tr>
</table>

</td>
</tr>
</table>

<?
include_once("./_tail.php");
?>
