<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

if (!$member['mb_id'] && $register_tag!="1") { 
	echo "<META http-equiv=Refresh content=0;url=/bbs/login_vip.php >";
	exit;
}
include_once("$g4[path]/jp_head.php");
?>