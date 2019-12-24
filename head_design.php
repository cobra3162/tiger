<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

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

// 사용자 화면 상단과 좌측을 담당하는 페이지입니다.
// 상단, 좌측 화면을 꾸미려면 이 파일을 수정합니다.



$table_width = 1004;
?>

<style type='text/css'>
body { margin:0; background-image:url('/images/top_bg.gif'); background-repeat:repeat-x; }
</style>

<!-- 상단 배경 시작 -->
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
<!-- 상단 배경 끝 -->

<table border="0" cellpadding="0" cellspacing="0" width="1000" align="center">
	<!--- 상단 메뉴 부분 시작 --------->
	<tr height="80">
		<td>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="200" align="center"><img src='/img/logo.jpg'></td><!------- #### 로고 삽입 ----------->
					<td width="40"></td>
					<td align="center" valign="top" style="padding-top:26px;">
						<!----------------- #### 메뉴부분 시작 ------------->
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
						<!----------------- #### 메뉴부분 끝 ------------->
				</tr>
			</table></td>
	</tr>
	<!--- 상단 메뉴 부분 끝 --------->
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

<!--2depth 메뉴 시작---------------->
<!--입출금내역
<table cellspacing="0" border="0" cellpadding="0" id='sm1' style='margin:-10 0 0 583;display:none'>
 <tr>
  <td ><div onclick="location.href='/accin.php';">| 입금신청 |</div></td>
  <td width="5"></td>
  <td ><div onclick="location.href='/accout.php';"> 출금신청 |</div></td>
  <td width="5"></td>
  <td ><div onclick="location.href='/acclist.php';"> 입출금내역 |</div></td>
 </tr>
</table>
-->

<!--구매내역
<table cellspacing="0" border="0" cellpadding="0" id='sm2' style='margin:-10 0 0 683;display:none'>
 <tr>
  <td ><div onclick="location.href='';">| 경주권구매 |</div></td>
  <td width="5"></td>
  <td ><div onclick="location.href='';">구매내역확인 |</div></td>
  <td width="5"></td>
 </tr>
</table>
-->

<!--2depth 메뉴 끝---------------->

<script>
function openWin(url){
	WinChk = window.open(url, 'CheckWin', 'top=50, left=300, width=210, height=365,resizable=1,scrollbars=auto');
}   
</script>

<table width="<?=$table_width?>" cellspacing="0" cellpadding="0" align=center>
<tr>
    <td width="43" height="11"></td>
    <td width="220"><?=outlogin("basic"); // 외부 로그인 ?></td>
	<td width="40"></td>
	<!---- ########## 색션부분 삽입 시작 ----------->
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
	<!---- ########## 색션부분 삽입 끝 ----------->

	<!--<td width="450" align=center><img src="/img/main/car.gif"></td>
    <td width="234"><a href="javascript:openWin('http://raceb.net/k_tv.hs')">전경주 배당판 및 시뮬레이션</a></td>
    <td width="35"></td>-->
</tr>
</table>



<script language="JavaScript">
function fsearchbox_submit(f)
{
    if (f.stx.value.length < 2) {
        alert("검색어는 두글자 이상 입력하십시오.");
        f.stx.select();
        f.stx.focus();
        return false;
    }

    // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
    var cnt = 0;
    for (var i=0; i<f.stx.value.length; i++) {
        if (f.stx.value.charAt(i) == ' ')
            cnt++;
    }

    if (cnt > 1) {
        alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
        f.stx.select();
        f.stx.focus();
        return false;
    }

    f.action = "<?=$g4['bbs_path']?>/search.php";
    return true;
}
</script>
<!-- 검색 끝 -->

<div style='height:5px;'></div>

<table width='<?=$table_width?>' cellpadding=0 cellspacing=0 border=0 align=center>
<tr>
    <td width=43></td>
    <!-- 왼쪽 메뉴 -->
    <td width=220 valign=top>
        <? // echo outlogin("basic"); // 외부 로그인 ?>
        <!--<div style='height:10px;'></div>-->
       <? // echo poll("basic"); // 설문조사 ?>
        <!--<div style='height:10px;'></div>-->
       <? // echo visit("basic"); // 방문자수 ?>
        <!--<div style='height:10px;'></div>-->
        <? // echo connect(); // 현재 접속자수 ?> 


<!-- race board start -->

<? include "race_board.php"; ?>
<!-- race board End  -->

    </td>
    <td width=18></td>
    <!-- 중간 -->
    <td width=780 valign=top>
