<?

$g4_path = ".."; // common.php 의 상대 경로
include_once("$g4_path/common.php");
	
include_once("$g4[path]/head.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once("$g4[path]/lib/poll.lib.php");
include_once("$g4[path]/lib/visit.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");

// 이미 로그인 중이라면
if ($member[mb_id])
{
    if ($url)
        goto_url($url);
    else
        goto_url($g4[path]);
}

if ($url)
    $urlencode = urlencode($url);
else
    $urlencode = urlencode($_SERVER[REQUEST_URI]);

//$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";

//include_once("$member_skin_path/login.skin.php");

//include_once("./_tail.php");

$url = '';
if ($g4['https_url']) {
    if (preg_match("/^\./", $urlencode))
        $url = $g4[url];
    else
        $url = $g4[url].$urlencode;
} else {
    $url = $urlencode;
}
?>

<script type="text/javascript" src="<?=$g4[path]?>/js/capslock.js"></script>


<link rel='stylesheet' href='../css/admin.css' type='text/css'>
<body bgcolor='#00498c'>

<!--<form name=write method=post action=login_check.php onsubmit="return check_submit();">
<input type=hidden name=s_url value="<?=$REQUEST_URI?>">
<input type=hidden name=exec value=login> -->

<form name="flogin" method="post" onsubmit="return flogin_submit(this);" autocomplete="off">
<input type="hidden" name="url" value='<?=$url?>'>

<table width='100%' height='80%'>
	<tr>
		<td style='text-align:center'>
			<table>
				<tr>
					<td id='bag' valign='top'>
						<table>
							<tr>
								<td><span id='ind1'></span></td>
							</tr>
								<td id='log1'>
									<table style='width:210px; margin-top:10px;' border=0>
		<!--						<tr>
											<td><img src='img/login_id.gif' alt='아이디'></td>
											<td><input type='text' name='mb_id' class='ob1' style='width:120px'></td>
											<td width='45' rowspan='2'><input type=image src='img/login_submit.gif' alt='클릭하시면 로그인 됩니다'></td>
										</tr>
										<tr>
											<td><img src='img/login_pass.gif' alt='비밀번호'></td>
											<td><input type='password' name=mb_password class='ob1' style='width:120px' itemname="패스워드" required onkeypress="check_capslock(event, 'login_mb_password');"></td>
										</tr>-->
									    <tr>
									 		<td><img src='img/login_id.gif' alt='아이디'><br><img src='img/login_pass.gif' alt='비밀번호'></td>
											<td rowspan='2'><input type='text' name='mb_id' class='ob1' style='width:120px'><br>
											<input type='password' name=mb_password class='ob1' style='width:120px' itemname="패스워드" required onkeypress="check_capslock(event, 'login_mb_password');">
											</td>
											<td width='45' ><input type=image src='img/login_submit.gif' alt='클릭하시면 로그인 됩니다'></td>
										</tr>
									</table>
								</td>
							</tr>
							<!--<tr><td id='log2_2' title='관리자만 접근이 가능합니다'></td></tr>-->
							<tr><td ><img src=/bbs/img/login_login4_2.gif border="0" usemap="#Map"></td></tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<!--<table width='100%' height='20%' bgcolor='#ffffff'>
	<tr>
		<td valign='top' align='center'><span id='ind2'></span></td>
	</tr>
</table>
-->
<form>

<map name="Map">
  <area shape="rect" coords="40,25,98,46" href="./register_form.php">
  <area shape="rect" coords="128,24,225,44" href="#" onclick="win_password_forget('./password_forget.php');">
</map>


<script language='Javascript'>
document.flogin.mb_id.focus();

function flogin_submit(f)
{
    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/login_check.php';";
    else
        echo "f.action = '$g4[bbs_path]/login_check.php';";
    ?>

    return true;
}
</script>


</body>
</html>