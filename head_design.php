<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�

if (!$member['mb_id'] && $register_tag!="1") { 
	echo "<META http-equiv=Refresh content=0;url=/bbs/login.php >";
	exit;
}

include_once("$g4[path]/head.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once("$g4[path]/lib/poll.lib.php");
include_once("$g4[path]/lib/visit.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");

//print_r2(get_defined_constants());

// ����� ȭ�� ��ܰ� ������ ����ϴ� �������Դϴ�.
// ���, ���� ȭ���� �ٹ̷��� �� ������ �����մϴ�.



$table_width = 1004;
?>

<style type='text/css'>
body { margin:0; background-image:url('/images/top_bg.gif'); background-repeat:repeat-x; }
</style>

<!-- ��� ��� ���� -->
<!--<table width="<?=$table_width?>" cellspacing="0" cellpadding="0">
<tr>
    <td background="<?=$g4['path']?>/img/top_img_bg.gif">
        <table width="100%" height="7" cellspacing="0" cellpadding="0">
        <tr>
            <td><img src="<?=$g4['path']?>/img/top_img.gif" width="100%" height="7"></td>
        </tr>
        </table></td>
</tr>
</table>-->
<!-- ��� ��� �� -->

<table border="0" cellpadding="0" cellspacing="0" width="1000" align="center">
	<!--- ��� �޴� �κ� ���� --------->
	<tr height="80">
		<td>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="200" align="center"><img src='/img/logo.jpg'></td><!------- #### �ΰ� ���� ----------->
					<td width="40"></td>
					<td align="center" valign="top" style="padding-top:26px;">
						<!----------------- #### �޴��κ� ���� ------------->
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="49" align="center">
									<a href="/accin.php"><img src="/images/menu01.gif" onmouseover="this.src='/images/menu01_over.gif'" onmouseout="this.src='/images/menu01.gif'" border="0"></a></td>
								<td width="49" align="center">
									<a href="/accout.php"><img src="/images/menu02.gif" onmouseover="this.src='/images/menu02_over.gif'" onmouseout="this.src='/images/menu02.gif'" border="0"></a></td>
								<td width="49" align="center">
									<a href="account_list.php"><img src="/images/menu03.gif" onmouseover="this.src='/images/menu03_over.gif'" onmouseout="this.src='/images/menu03.gif'" border="0"></a></td>
								<td width="49" align="center">
									<a href="ticket.php"><img src="/images/menu04.gif" onmouseover="this.src='/images/menu04_over.gif'" onmouseout="this.src='/images/menu04.gif'" border="0"></a></td>
								<td width="49" align="center">
									<a href="ticket_list.php"><img src="/images/menu05.gif" onmouseover="this.src='/images/menu05_over.gif'" onmouseout="this.src='/images/menu05.gif'" border="0"></a></td>
								<td width="49" align="center">
									<a href="/bbs/board.php?bo_table=review"><img src="/images/menu06.gif" onmouseover="this.src='/images/menu06_over.gif'" onmouseout="this.src='/images/menu06.gif'" border="0"></a></td>
							</tr>
						</table></td>
						<!----------------- #### �޴��κ� �� ------------->
				</tr>
			</table></td>
	</tr>
	<!--- ��� �޴� �κ� �� --------->
	<tr height="25">
		<td><img src="/images/top_bar.gif"></td>
	</tr>
</table>

<script> 
function tm1(str){
 if (str == 'm1'){
  sm1.style.display = "block";
  sm2.style.display = "none";
  }
 if (str == 'm2'){
  sm1.style.display = "none";
  sm2.style.display = "block";
 }
}
</script>

<!--2depth �޴� ����---------------->
<!--����ݳ���
<table cellspacing="0" border="0" cellpadding="0" id='sm1' style='margin:-10 0 0 583;display:none'>
 <tr>
  <td ><div onclick="location.href='/accin.php';">| �Աݽ�û |</div></td>
  <td width="5"></td>
  <td ><div onclick="location.href='/accout.php';"> ��ݽ�û |</div></td>
  <td width="5"></td>
  <td ><div onclick="location.href='/acclist.php';"> ����ݳ��� |</div></td>
 </tr>
</table>
-->

<!--���ų���
<table cellspacing="0" border="0" cellpadding="0" id='sm2' style='margin:-10 0 0 683;display:none'>
 <tr>
  <td ><div onclick="location.href='';">| ���ֱǱ��� |</div></td>
  <td width="5"></td>
  <td ><div onclick="location.href='';">���ų���Ȯ�� |</div></td>
  <td width="5"></td>
 </tr>
</table>
-->

<!--2depth �޴� ��---------------->

<script>
function openWin(url){
	WinChk = window.open(url, 'CheckWin', 'top=50, left=300, width=210, height=365,resizable=1,scrollbars=auto');
}   
</script>

<table width="<?=$table_width?>" cellspacing="0" cellpadding="0" align=center>
<tr>
    <td width="43" height="11"></td>
    <td width="220"><?=outlogin("basic"); // �ܺ� �α��� ?></td>
	<td width="40"></td>
	<!---- ########## ���Ǻκ� ���� ���� ----------->
	<td valign="top">
	
		<table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<a href="#"><img src="/images/banner01t.jpg" border="0"></a></td>
				<td>
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<a href="#"><img src="/images/banner_tit_01_over.gif" border="0"></a></td>
						</tr>
						<tr height="6">
							<td></td>
						</tr>
						<tr>
							<td>
								<a href="#"><img src="/images/banner_tit_02.gif" onmouseover="this.src='/images/banner_tit_02_over.gif'" onmouseout="this.src='/images/banner_tit_02.gif'" border="0"></a></td>
						</tr>
						<tr height="6">
							<td></td>
						</tr>
						<tr>
							<td>
								<a href="#"><img src="/images/banner_tit_03.gif" onmouseover="this.src='/images/banner_tit_03_over.gif'" onmouseout="this.src='/images/banner_tit_03.gif'" border="0"></a></td>
						</tr>
						<tr height="6">
							<td></td>
						</tr>
					</table></td>
			</tr>
		</table>
	</td>
	<!---- ########## ���Ǻκ� ���� �� ----------->

	<!--<td width="450" align=center><img src="/img/main/car.gif"></td>
    <td width="234"><a href="javascript:openWin('http://raceb.net/k_tv.hs')">������ ����� �� �ùķ��̼�</a></td>
    <td width="35"></td>-->
</tr>
</table>



<script language="JavaScript">
function fsearchbox_submit(f)
{
    if (f.stx.value.length < 2) {
        alert("�˻���� �α��� �̻� �Է��Ͻʽÿ�.");
        f.stx.select();
        f.stx.focus();
        return false;
    }

    // �˻��� ���� ���ϰ� �ɸ��� ��� �� �ּ��� �����ϼ���.
    var cnt = 0;
    for (var i=0; i<f.stx.value.length; i++) {
        if (f.stx.value.charAt(i) == ' ')
            cnt++;
    }

    if (cnt > 1) {
        alert("���� �˻��� ���Ͽ� �˻�� ������ �Ѱ��� �Է��� �� �ֽ��ϴ�.");
        f.stx.select();
        f.stx.focus();
        return false;
    }

    f.action = "<?=$g4['bbs_path']?>/search.php";
    return true;
}
</script>
<!-- �˻� �� -->

<div style='height:5px;'></div>

<table width='<?=$table_width?>' cellpadding=0 cellspacing=0 border=0 align=center>
<tr>
    <td width=43></td>
    <!-- ���� �޴� -->
    <td width=220 valign=top>
        <? // echo outlogin("basic"); // �ܺ� �α��� ?>
        <!--<div style='height:10px;'></div>-->
       <? // echo poll("basic"); // �������� ?>
        <!--<div style='height:10px;'></div>-->
       <? // echo visit("basic"); // �湮�ڼ� ?>
        <!--<div style='height:10px;'></div>-->
        <? // echo connect(); // ���� �����ڼ� ?> 


<!-- race board start -->

<? include "race_board.php"; ?>
<!-- race board End  -->

    </td>
    <td width=18></td>
    <!-- �߰� -->
    <td width=780 valign=top>
