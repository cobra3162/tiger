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

<!-- 상단 배경 시작 -->
<table width="<?=$table_width?>" cellspacing="0" cellpadding="0">
<tr>
    <td background="<?=$g4['path']?>/img/top_img_bg.gif">
        <table width="100%" height="7" cellspacing="0" cellpadding="0">
        <tr>
            <td><img src="<?=$g4['path']?>/img/top_img.gif" width="100%" height="7"></td>
        </tr>
        </table></td>
</tr>
</table>
<!-- 상단 배경 끝 -->

<!-- 상단 로고 및 버튼 시작 -->
<table width="<?=$table_width?>" cellspacing="0" cellpadding="0">
<tr>
    <td width="43" height="57"></td>
    <!-- 로고 -->
    <td width="220"><a href="<?=$g4['path']?>/"><img src="<?=$g4['path']?>/img/logo.jpg" width="220" height="31" border="0"></a></td>
    <td>
        <table width=100% border=0 cellpadding=0 cellspacing=0>
        <tr>
            <td></td>
        </tr>
        </table>
    </td>
    <td width="390" align="right">
        <table border="0" cellspacing="0" cellpadding="0">
        <tr>
            <!-- 처음으로 버튼 -->
            <td width="78"><a href="<?=$g4['path']?>/"><img src="<?=$g4['path']?>/img/top_m01.gif" width="78" height="31" border="0"></a></td>

            <? if (!$member['mb_id']) { ?>
            <!-- 로그인 이전 
            <td width="78"><a href="<?=$g4['bbs_path']?>/login.php?url=<?=$urlencode?>"><img src="<?=$g4['path']?>/img/top_m02.gif" width="78" height="31" border="0"></a></td>
            <td width="78"><a href="<?=$g4['bbs_path']?>/register.php"><img src="<?=$g4['path']?>/img/top_m03.gif" width="78" height="31" border="0"></a></td>-->
            <? } else { ?>
            <!-- 로그인 이후 
            <td width="78"><a href="<?=$g4['bbs_path']?>/logout.php"><img src="<?=$g4['path']?>/img/top_m04.gif" width="78" height="31" border="0"></a></td>
            <td width="78"><a href="<?=$g4['bbs_path']?>/member_confirm.php?url=register_form.php"><img src="<?=$g4['path']?>/img/top_m05.gif" width="78" height="31" border="0"></a></td>-->
            <? } ?>
            <!-- 최근게시물 버튼 -->
            <td width="78"><a href="<?=$g4['bbs_path']?>/new.php"><img src="<?=$g4['path']?>/img/top_m07.gif" width="78" height="31" border="0"></a></td>
            <td width="78"><a href="<?=$g4['bbs_path']?>/new.php"><img src="<?=$g4['path']?>/img/top_m08.gif" width="78" height="31" border="0"></a></td>
            <td width="78"><a href="<?=$g4['bbs_path']?>/new.php"><img src="<?=$g4['path']?>/img/top_m09.gif" width="78" height="31" border="0"></a></td>
            <td width="78"><a href="<?=$g4['bbs_path']?>/new.php"><img src="<?=$g4['path']?>/img/top_m10.gif" width="78" height="31" border="0"></a></td>
            <td width="78"><a href="<?=$g4['bbs_path']?>/new.php"><img src="<?=$g4['path']?>/img/top_m11.gif" width="78" height="31" border="0" onmouseover="tm1('m1')" id='m1'></a></td>
            <td width="78"><a href="<?=$g4['bbs_path']?>/new.php"><img src="<?=$g4['path']?>/img/top_m12.gif" width="78" height="31" border="0" onmouseover="tm1('m2')" id='m2'></a></td>
        </tr>
        </table>
		</td>
    <td width="35"></td>
</tr>
<!--<tr><td colspan=5 height=10></td></tr>-->
</table>
<!-- 상단 로고 및 버튼 끝 -->

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
 <!--입출금내역-->
<table cellspacing="0" border="0" cellpadding="0" id='sm1' style='margin:-10 0 0 583;display:none'>
 <tr>
  <td ><div onclick="location.href='/accin.php';">| 입금신청 |</div></td>
  <td width="5"></td>
  <td ><div onclick="location.href='/accout.php';"> 출금신청 |</div></td>
  <td width="5"></td>
  <td ><div onclick="location.href='/acclist.php';"> 입출금내역 |</div></td>
 </tr>
</table>
 
 <!--<div nowrap id='sm1' style='margin:20 0 0 150;width:307;display:none'>
  <div onclick="location.href='/';">| 입금신청 | </div><div style='width:5;'></div><div class='off' onclick="location.href='/';">출금신청 |</div><div style='width:5;'></div>  
  <div class='off' onclick="location.href='/';"> 입출금내역 |</div>
 </div>
-->

 <!--구매내역-->
<table cellspacing="0" border="0" cellpadding="0" id='sm2' style='margin:-10 0 0 683;display:none'>
 <tr>
  <td ><div onclick="location.href='';">| 경주권구매 |</div></td>
  <td width="5"></td>
  <td ><div onclick="location.href='';">구매내역확인 |</div></td>
  <td width="5"></td>
 </tr>
</table>

 <!--2depth 메뉴 끝---------------->

<script>
function openWin(url){
	WinChk = window.open(url, 'CheckWin', 'top=50, left=300, width=210, height=365,resizable=1,scrollbars=auto');
}   
</script>

<table width="<?=$table_width?>" cellspacing="0" cellpadding="0">
<tr>
    <td width="43" height="11"></td>
    <td width="220"><?=outlogin("basic"); // 외부 로그인 ?></td>
    <td width="450" align=center><!--<br><br>메인비쥬얼 들어갈 자리<br>--><img src="/img/main/car.gif"></td>
    <td width="234"><!--img src="<?=$g4['path']?>/img/search_top.gif" width="234" height="11">-->
	<a href="javascript:openWin('http://raceb.net/k_tv.hs')">전경주 배당판 및 시뮬레이션</a></td>
    <td width="35"></td>
</tr>
<!--
<tr>
    <td height="33"><img src="<?=$g4['path']?>/img/bar_01.gif" width="43" height="33"></td>
    <td><img src="<?=$g4['path']?>/img/bar_02.gif" width="220" height="33"></td>
    <td background="<?=$g4['path']?>/img/bar_03.gif" width="472" height="33"><table width=100% cellpadding=0 cellspacing=0><tr><td width=25>&nbsp;</td><td><?//=popular();?></td></tr></table></td>
    <td>
        <form name="fsearchbox" method="get" onsubmit="return fsearchbox_submit(this);" style="margin:0px;">-->
        <!-- <input type="hidden" name="sfl" value="concat(wr_subject,wr_content)"> -->
<!--        <input type="hidden" name="sfl" value="wr_subject||wr_content">
        <input type="hidden" name="sop" value="and">
        <table width="100%" height="33" cellspacing="0" cellpadding="0">
        <tr>
            <td width="25" height="25"><img src="<?=$g4['path']?>/img/search_01.gif" width="25" height="25"></td>
            <td width="136" valign="middle" bgcolor="#F4F4F4"><INPUT name="stx" type="text" maxlength=20 style="BORDER : 0px solid; width: 125px; HEIGHT: 20px; BACKGROUND-COLOR: #F4F4F4" maxlength="20"></td>
            <td width="12"><img src="<?=$g4['path']?>/img/search_02.gif" width="12" height="25"></td>
            <td width="48"><input type="image" src="<?=$g4['path']?>/img/search_button.gif" width="48" height="25" border="0"></td>
            <td width="13"><img src="<?=$g4['path']?>/img/search_03.gif" width="13" height="25"></td>
        </tr>
        <tr>
            <td width="234" height="8" colspan="5"><img src="<?=$g4['path']?>/img/search_down.gif" width="234" height="8"></td>
        </tr>
        </table>
        </form>
    </td>
    <td></td>
</tr>-->
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

<div style='height:18px;'></div>

<table width='<?=$table_width?>' cellpadding=0 cellspacing=0 border=0>
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
<table  border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td align=center><img src="/img/main/left_01.jpg"></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10"></td>
      </tr>
      <tr>
        <td align="center">

		<table width="185"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="185" align="center"><table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/img/main/left_top.jpg"></td>
          </tr>
          <tr>
            <td align="center" background="/img/main/left_bg.jpg">
			<table width="165" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td class="txt_left" align=center>- 과천경마 1경주 -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp; 토,일요일에 시작됩니다</td></tr><tr><td>&nbsp; 

				</span>
				</td>
			</tr>
			</table>
			</td>
		</tr>
          <tr>
            <td><img src="/img/main/left_bottom.jpg"></td>
          </tr>
</table></td>
            </tr>
			<tr><td height=7></td></tr>
            <tr>
              <td align="center"><table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/img/main/left_top.jpg"></td>
          </tr>
          <tr>
            <td align="center" background="/img/main/left_bg.jpg">
			<table width="165" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td class="txt_left" align=center>- 제주경마 1경주 -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp; 토,일요일에 시작됩니다</td></tr><tr><td>&nbsp; 

				</span>
				</td>
			</tr>
			</table>
			</td>
		</tr>
          <tr>
            <td><img src="/img/main/left_bottom.jpg"></td>
          </tr>
</table></td>
            </tr>
			<tr><td height=7></td></tr>
            <tr>
              <td align="center"><table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/img/main/left_top.jpg"></td>
          </tr>
          <tr>
            <td align="center" background="/img/main/left_bg.jpg">
			<table width="165" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td class="txt_left" align=center>- 부산경마 1경주 -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp; 금요일에 시작됩니다</td></tr><tr><td>&nbsp; 

				</span>
				</td>
			</tr>
			</table>
			</td>
		</tr>
          <tr>
            <td><img src="/img/main/left_bottom.jpg"></td>
          </tr>
</table></td>
            </tr>
			<tr><td height=7></td></tr>
            <tr>
              <td align="center"><table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/img/main/left_top.jpg"></td>
          </tr>
          <tr>
            <td align="center" background="/img/main/left_bg.jpg">
			<table width="165" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td class="txt_left" align=center>- 광명경륜 1경주 -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp;금,토,일요일에 시작됩니다</td></tr><tr><td>&nbsp; 

				</span>
				</td>
			</tr>
			</table>
			</td>
		</tr>
          <tr>
            <td><img src="/img/main/left_bottom.jpg"></td>
          </tr>
</table></td>
            </tr>
			<tr><td height=7></td></tr>
            <tr>
              <td align="center"><table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/img/main/left_top.jpg"></td>
          </tr>
          <tr>
            <td align="center" background="/img/main/left_bg.jpg">
			<table width="165" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td class="txt_left" align=center>- 창원경륜 1경주 -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp;금,토,일요일에 시작됩니다</td></tr><tr><td>&nbsp; 

				</span>
				</td>
			</tr>
			</table>
			</td>
		</tr>
          <tr>
            <td><img src="/img/main/left_bottom.jpg"></td>
          </tr>
</table></td>
            </tr>
			<tr><td height=7></td></tr>
            <tr>
              <td align="center"><table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/img/main/left_top.jpg"></td>
          </tr>
          <tr>
            <td align="center" background="/img/main/left_bg.jpg">
			<table width="165" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td class="txt_left" align=center>- 부산경륜 1경주 -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp; 금요일에 시작됩니다</td></tr><tr><td>&nbsp; 

				</span>
				</td>
			</tr>
			</table>
			</td>
		</tr>
          <tr>
            <td><img src="/img/main/left_bottom.jpg"></td>
          </tr>
</table></td>
            </tr>
			<tr><td height=7></td></tr>
            <tr>
              <td align="center"><table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/img/main/left_top.jpg"></td>
          </tr>
          <tr>
            <td align="center" background="/img/main/left_bg.jpg">
			<table width="165" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td class="txt_left" align=center>- 미사리경정 1경주 -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp; 수, 목요일에 시작합니다</td></tr><tr><td>&nbsp; 

				</span>
				</td>
			</tr>
			</table>
			</td>
		</tr>
          <tr>
            <td><img src="/img/main/left_bottom.jpg"></td>
          </tr>
</table></td>
            </tr>
        </table>
		</td>
      </tr>
      <tr>
        <td height="8"></td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="170" height="150" align="center" valign="top" background="/img/main/right_13.jpg"><table  border="0" cellspacing="0" cellpadding="0">
	<tr>
        <td height="30"></td>
        </tr>
      <tr>
        <td height="81" class="txt_cus_tel">070-7683-0642</span><br>
          <span class="style1">문의시간</span><br>
          <span class="txt_cus">09:30 ~ 19:00<br>
          월요일, 화요일 휴무</span></td>
        </tr>
    </table></td>
  </tr>
</table>

    </td>
    <td width=18></td>
    <!-- 중간 -->
    <td width=683 valign=top>
