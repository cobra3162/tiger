<?
//��������
$race_date = date("Y-m-d");
$year = date("Y");
$month = date("m");
$day = date("d");


$t01_str = "�̻縮����"; $t01_str2="�̻縮"; $t01_scrpt_str = "bmi";
$h01_str = "��õ�渶"; $h02_str = "���ְ渶"; $h03_str = "�λ�渶";
$h01_str2 = "��õ"; $h02_str2 = "����"; $h03_str2 = "�λ�";
$h01_scrpt_str = "hkw"; $h02_scrpt_str = "hje"; $h03_scrpt_str= "hbu";
$k01_str = "������"; $k02_str = "â�����"; $k03_str = "�λ���";
$k01_str2 = "����"; $k02_str2 = "â��"; $k03_str2 = "�λ�";
$k01_scrpt_str = "bja"; $k02_scrpt_str = "bch"; $k03_scrpt_str = "bbu";

$week_str0304 = " ��, ����Ͽ�";
$week_str05 = " �ݿ��Ͽ�";
$week_str0506 = "��, ����Ͽ�";
$week_str0500 = "��, �Ͽ��Ͽ�";
$week_str0600 = "��, �Ͽ��Ͽ�";
$week_str050600 = " ��, ��, �Ͽ��Ͽ�";


function pred_schedule($place, $weekday_str) {

global $race_date ;
global $year ;
global $month ;
global $day ;

	$str = " 
		  <tr><td height=7></td></tr>
		  <tr>
              <td align='center'><table  border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td><img src='/img/main/left_top.jpg'></td>
          </tr>
          <tr>
            <td align='center' background='/img/main/left_bg.jpg'>
			<table width='165' border='0' cellpadding='0' cellspacing='0'>
			<tr>
				<td class='txt_left' align=center>- ";
    $str .= $place;
	$str .= " 1���� -</td>
			</tr>
			<tr>
                <td><img src='/img/main/left_line.jpg'></td>
            </tr>
			<tr>
				<td height='20' align='absmiddle'><span class='txt_left1'>
			&nbsp; ";
	$str .= $weekday_str;
	$str .= "			
			 �����մϴ�</td></tr><tr><td>&nbsp; 
				</span>
				</td>
			</tr>
			</table>
			</td>
		</tr>
          <tr>
            <td><img src='/img/main/left_bottom.jpg'></td>
        </tr>
				</table></td>
            </tr>";

   return $str;
}

function call_remain_time($race_kind, $place, $place2, $scrpt_str) {

global $race_date;
global $year ;
global $month ;
global $day ;

  
       $sql = "select * from raceinput where race_date ='$race_date' and race_kind='$race_kind' limit 1";

	   $rowrace = sql_fetch($sql);
	   $recent_time = date("H:i");

	   $num_race = $rowrace[num_race];
	   //echo "num_race = $num_race";
	   
	   //exit;

	   for ($i=1;$i <= $num_race ;$i++) {

		//echo "TEST $i ";
		$start_imsi = 'start_'.$i; $hr_imsi='hr_'.$i; $min_imsi='min_'.$i;
		$starttime = $rowrace[$start_imsi];
		$start_time = explode(':', $starttime) ;
		${$hr_imsi} = $start_time[0];
		${$min_imsi} = $start_time[1];
		$start_time_str = ${$hr_imsi}."��".${$min_imsi}."��";

		//$gameday = date("Ymd");
		//$gamestarttime = $gameday.${$hr_imsi}.${$min_imsi};

		$gameday = date("Ymd");
//		$timenow = date ("YmdHis");

		//echo "$starttime - $recent_time ";
		if ($starttime > $recent_time) {
			$remaintime = mktime(${$hr_imsi},${$min_imsi},0,$month,$day,$year) - time()   ;
		    //echo "remaintime : $remaintime";
			break;
		}
	   } 

	if (!$remaintime) $remaintime = '0'; 

 $str = " 
  <tr><td height=7></td></tr> 
  <tr>
	  <td width='185' align='center'><table  border='0' cellspacing='0' cellpadding='0'>
  <tr>
	<td><img src='/img/main/left_top.jpg'></td>
  </tr>
  <tr>
	<td align='center' background='/img/main/left_bg.jpg'>
	<table width='165' border='0' cellpadding='0' cellspacing='0'>
	<tr>
		<td class='txt_left' align=center>- ".$place." ".$i."���� -</td>
	</tr>";

 $str .= "
	<tr>
		<td><img src='/img/main/left_line.jpg'></td>
	</tr>
	<tr>
		<td height='20' align='absmiddle'><span class='txt_left1'>
	<script language='JavaScript'>";

 $str .="
	<!--
		passTime_".$scrpt_str." = 0;
		curRemainTime_".$scrpt_str." = ".$remaintime.";
		pLayerName = 'remain_times_".$scrpt_str."';
		pLayerName1 = '".$place2."';

	//-->
	</script>

	&nbsp;&nbsp;&nbsp;����:&nbsp;".$start_time_str."</span><td>
	</tr>";

 $str.="
	<tr height='20'><td>
	&nbsp;&nbsp;&nbsp;����:&nbsp;<span id=remain_times_".$scrpt_str." class=cuInput>
	<SCRIPT LANGUAGE='JavaScript'>
	<!--
		remain_time_".$scrpt_str."();
	//-->
	</SCRIPT>
		</span>
		</td>
	</tr>
	</table>
	</td>
</tr>
  <tr>
	<td><img src='/img/main/left_bottom.jpg'></td>
  </tr>
</table></td>
	</tr>";

   return $str;

}

?>

<script language=javascript src="/js/remain_time.js"></script>
	 
<table  border="0" cellspacing="0" cellpadding="0" align=center>
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
<?

$weekday = date ("w");

echo call_remain_time('t01', $t01_str, $t01_str2, $t01_scrpt_str);
echo call_remain_time('h01', $h01_str, $h01_str2, $h01_scrpt_str);	
echo call_remain_time('h02', $h02_str, $h02_str2, $h02_scrpt_str);	
echo call_remain_time('h03', $h03_str, $h03_str2, $h03_scrpt_str);
echo call_remain_time('k01', $k01_str, $k01_str2, $k01_scrpt_str);	
echo call_remain_time('k02', $k02_str, $k02_str2, $k02_scrpt_str);	
echo call_remain_time('k03', $k03_str, $k03_str2, $k03_scrpt_str);	

//---------- �̻縮���� ��,�����--------------
//if ($weekday == 3 || $weekday == 4)  
//echo call_remain_time('t01', $t01_str, $t01_str2, $t01_scrpt_str);

//---------- ����/�λ�渶 �ݿ���--------------
/*
if ($weekday ==5 ) {
echo call_remain_time('h02', $h02_str, $h02_str2, $h02_scrpt_str);	
echo call_remain_time('h03', $h03_str, $h03_str2, $h03_scrpt_str);
}
*/

//---------- ��õ�渶 ��,�Ͽ��� --------------
/*
if ($weekday ==6 || $weekday == 0 ) echo call_remain_time('h01', $h01_str, $h01_str2, $h01_scrpt_str);	
else echo pred_schedule($h01_str, $week_str0600) ; 	// �ٸ�����
*/

//---------- ���ְ渶 ����� --------------
//if ( $weekday == 6 )  echo call_remain_time('h02', $h02_str, $h02_str2, $h02_scrpt_str);	

//---------- ���ְ渶 ��,��� �ٸ����� --------------
//if ( $weekday != 5 && $weekday !=6 ) echo pred_schedule($h02_str, $week_str0506) ; 

//---------- �λ�渶 �Ͽ���--------------
//if ($weekday == 0 )  echo call_remain_time('h03', $h03_str, $h03_str2, $h03_scrpt_str);

//---------- �λ�渶 ��,�Ͽ� �ٸ����� --------------
//if ( $weekday != 5 && $weekday !=0 ) echo pred_schedule($h03_str, $week_str0500) ; 

//---------- �λ��� �ݿ���--------------
//if ( $weekday == 5) echo call_remain_time('k03', $k03_str, $k03_str2, $k03_scrpt_str);	

//---------- ��õ�渶, ���ְ渶, �λ�渶, ������, â�����, �λ���  ��,��,�Ͽ���--------------
/*
if ($weekday ==5 || $weekday ==6 || $weekday ==0 )  {
echo call_remain_time('h01', $h01_str, $h01_str2, $h01_scrpt_str);	
echo call_remain_time('h02', $h02_str, $h02_str2, $h02_scrpt_str);	
echo call_remain_time('h03', $h03_str, $h03_str2, $h03_scrpt_str);
echo call_remain_time('k01', $k01_str, $k01_str2, $k01_scrpt_str);	
echo call_remain_time('k02', $k02_str, $k02_str2, $k02_scrpt_str);	
echo call_remain_time('k03', $k03_str, $k03_str2, $k03_scrpt_str);	

} else if  ($weekday ==1 || $weekday ==2 )  { // ���ְ渶�� �׽�Ʈ�۾�
echo pred_schedule($h01_str, $week_str050600) ;
echo pred_schedule($h02_str, $week_str050600) ;
echo pred_schedule($h03_str, $week_str050600) ;
echo pred_schedule($k01_str, $week_str050600) ;
echo pred_schedule($k02_str, $week_str050600) ;
echo pred_schedule($k03_str, $week_str050600) ;

} else {  //  �ٸ� ����
echo pred_schedule($h01_str, $week_str050600) ;
echo pred_schedule($h02_str, $week_str050600) ;
echo pred_schedule($h03_str, $week_str050600) ;
echo pred_schedule($k01_str, $week_str050600) ;
echo pred_schedule($k02_str, $week_str050600) ;
echo pred_schedule($k03_str, $week_str050600) ;
}
*/

//---------- �λ��� �ݿ��Ͽ� �ٸ�����--------------
//if ($weekday !=5 )  echo pred_schedule($k03_str, $week_str05) ;

//---------- �̻縮���� �ݿ��Ͽ� �ٸ�����--------------
//if ( $weekday != 3 && $weekday !=4 ) echo pred_schedule($t01_str, $week_str0304) ;

?>

        </table>
		</td>
      </tr>
      <tr>
        <td height="8"></td>
      </tr>
    </table></td>
  </tr>
  <?
  $sqltel = "select * from config_race";
  $rowtel = sql_fetch($sqltel);
  $callcenter = $rowtel[cf_call_center];
  ?>
  <!--
  <tr>
    <td width="170" height="150" align="center" valign="top" background="/img/main/right_13.jpg">
	<table  style="border-width:2px" cellspacing="0" cellpadding="0" bodercolor=gray>
	<tr>
        <td height="7"></td>
        </tr>
      <tr>
        <td height="81" class="txt_cus_tel">
		  <b><font size=3 color=teal></font><br>
          <font size=3 color=gray>���ǽð�</font><br>
          <font size=3 color=gray>09:30 ~ 19:00<br>
          ������, ȭ���� �޹�</font></b></td>
        </tr>
    </table></td>
  </tr>
  -->
  <tr><td alingn=center>
  	<!------- #### ������ ���� ----------->
	<table border="0" cellpadding="0" cellspacing="0" background="/images/custom_bg.gif" style="background-repeat:repeat-y;">
		<tr>
			<td><img src="/images/custom_tit.gif"></td>
		</tr>
		<tr height="65">
			<td align="center"><font face="arial" style="font-weight:bold; font-size:25px;"><?=$callcenter?></font></td>
		</tr>
		<tr>
			<td><img src="/images/custom_tel.gif"></td>
		</tr>
		<tr height="40">
			<td align="center" style="font-face:����;"><font style="font-size:14px;">09:30 ~ 19:00</font><br><font style="font-size:12px;">������, ȭ���� �޹�</font></td>
		</tr>
		<tr>
			<td><img src="/images/custom_bottom.gif"></td>
		</tr>
	</table></td>
	<!------- #### ������ ���� ----------->
   </tr>
 
 </table>