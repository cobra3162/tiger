<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

if (!$member['mb_id'] && $register_tag!="1") { 
	echo "<META http-equiv=Refresh content=0;url=/bbs/login_vip.php >";
	exit;
}
include_once("$g4[path]/jp_head.php");
?>