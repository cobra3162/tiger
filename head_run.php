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

<!-- ��� ��� ���� -->
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
<!-- ��� ��� �� -->

<!-- ��� �ΰ� �� ��ư ���� -->
<table width="<?=$table_width?>" cellspacing="0" cellpadding="0">
<tr>
    <td width="43" height="57"></td>
    <!-- �ΰ� -->
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
            <!-- ó������ ��ư -->
            <td width="78"><a href="<?=$g4['path']?>/"><img src="<?=$g4['path']?>/img/top_m01.gif" width="78" height="31" border="0"></a></td>

            <? if (!$member['mb_id']) { ?>
            <!-- �α��� ���� 
            <td width="78"><a href="<?=$g4['bbs_path']?>/login.php?url=<?=$urlencode?>"><img src="<?=$g4['path']?>/img/top_m02.gif" width="78" height="31" border="0"></a></td>
            <td width="78"><a href="<?=$g4['bbs_path']?>/register.php"><img src="<?=$g4['path']?>/img/top_m03.gif" width="78" height="31" border="0"></a></td>-->
            <? } else { ?>
            <!-- �α��� ���� 
            <td width="78"><a href="<?=$g4['bbs_path']?>/logout.php"><img src="<?=$g4['path']?>/img/top_m04.gif" width="78" height="31" border="0"></a></td>
            <td width="78"><a href="<?=$g4['bbs_path']?>/member_confirm.php?url=register_form.php"><img src="<?=$g4['path']?>/img/top_m05.gif" width="78" height="31" border="0"></a></td>-->
            <? } ?>
            <!-- �ֱٰԽù� ��ư -->
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
<!-- ��� �ΰ� �� ��ư �� -->

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
 <!--����ݳ���-->
<table cellspacing="0" border="0" cellpadding="0" id='sm1' style='margin:-10 0 0 583;display:none'>
 <tr>
  <td ><div onclick="location.href='/accin.php';">| �Աݽ�û |</div></td>
  <td width="5"></td>
  <td ><div onclick="location.href='/accout.php';"> ��ݽ�û |</div></td>
  <td width="5"></td>
  <td ><div onclick="location.href='/acclist.php';"> ����ݳ��� |</div></td>
 </tr>
</table>
 
 <!--<div nowrap id='sm1' style='margin:20 0 0 150;width:307;display:none'>
  <div onclick="location.href='/';">| �Աݽ�û | </div><div style='width:5;'></div><div class='off' onclick="location.href='/';">��ݽ�û |</div><div style='width:5;'></div>  
  <div class='off' onclick="location.href='/';"> ����ݳ��� |</div>
 </div>
-->

 <!--���ų���-->
<table cellspacing="0" border="0" cellpadding="0" id='sm2' style='margin:-10 0 0 683;display:none'>
 <tr>
  <td ><div onclick="location.href='';">| ���ֱǱ��� |</div></td>
  <td width="5"></td>
  <td ><div onclick="location.href='';">���ų���Ȯ�� |</div></td>
  <td width="5"></td>
 </tr>
</table>

 <!--2depth �޴� ��---------------->

<script>
function openWin(url){
	WinChk = window.open(url, 'CheckWin', 'top=50, left=300, width=210, height=365,resizable=1,scrollbars=auto');
}   
</script>

<table width="<?=$table_width?>" cellspacing="0" cellpadding="0">
<tr>
    <td width="43" height="11"></td>
    <td width="220"><?=outlogin("basic"); // �ܺ� �α��� ?></td>
    <td width="450" align=center><!--<br><br>���κ���� �� �ڸ�<br>--><img src="/img/main/car.gif"></td>
    <td width="234"><!--img src="<?=$g4['path']?>/img/search_top.gif" width="234" height="11">-->
	<a href="javascript:openWin('http://raceb.net/k_tv.hs')">������ ����� �� �ùķ��̼�</a></td>
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

<div style='height:18px;'></div>

<table width='<?=$table_width?>' cellpadding=0 cellspacing=0 border=0>
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
				<td class="txt_left" align=center>- ��õ�渶 1���� -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp; ��,�Ͽ��Ͽ� ���۵˴ϴ�</td></tr><tr><td>&nbsp; 

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
				<td class="txt_left" align=center>- ���ְ渶 1���� -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp; ��,�Ͽ��Ͽ� ���۵˴ϴ�</td></tr><tr><td>&nbsp; 

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
				<td class="txt_left" align=center>- �λ�渶 1���� -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp; �ݿ��Ͽ� ���۵˴ϴ�</td></tr><tr><td>&nbsp; 

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
				<td class="txt_left" align=center>- ������ 1���� -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp;��,��,�Ͽ��Ͽ� ���۵˴ϴ�</td></tr><tr><td>&nbsp; 

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
				<td class="txt_left" align=center>- â����� 1���� -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp;��,��,�Ͽ��Ͽ� ���۵˴ϴ�</td></tr><tr><td>&nbsp; 

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
				<td class="txt_left" align=center>- �λ��� 1���� -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp; �ݿ��Ͽ� ���۵˴ϴ�</td></tr><tr><td>&nbsp; 

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
				<td class="txt_left" align=center>- �̻縮���� 1���� -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			&nbsp; ��, ����Ͽ� �����մϴ�</td></tr><tr><td>&nbsp; 

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
          <span class="style1">���ǽð�</span><br>
          <span class="txt_cus">09:30 ~ 19:00<br>
          ������, ȭ���� �޹�</span></td>
        </tr>
    </table></td>
  </tr>
</table>

    </td>
    <td width=18></td>
    <!-- �߰� -->
    <td width=683 valign=top>
