<?
//��������
$race_date = date("Y-m-d");
$year = date("Y");
$month = date("m");
$day = date("d");


$t01_str = "�̻縮����";
$h02_str = "��õ�渶"; $h03_str = "���ְ渶"; $k01_str = "�λ�渶";
$k02_str = "������"; $k03_str = "â�����"; $k01_str = "�λ���";

$week_str0304 = " ��, ����Ͽ�";
$week_str05 = " �ݿ��Ͽ�";
$week_str0600 = "��, �Ͽ��Ͽ�";
$week_str050600 = " ��, ��, �Ͽ��Ͽ�";

function pred_schedule($place, $weekday_str) {
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

if ($weekday ==3 || $weekday == 4 )  {
            
		   $race_date = date("Y-m-d");
           $sql = "select * from raceinput where race_date ='$race_date' and race_kind='t01' order by no desc limit 1";
     
          echo "        
          <tr>
              <td width='185' align='center'><table  border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td><img src='/img/main/left_top.jpg'></td>
          </tr>
          <tr>
            <td align='center' background='/img/main/left_bg.jpg'>
			<table width='165' border='0' cellpadding='0' cellspacing='0'>
			<tr>
				<td class='txt_left' align=center>- �̻縮 ���� ���� -</td>
			</tr>
			<tr>
                <td><img src='/img/main/left_line.jpg'></td>
            </tr>
			<tr>
				<td height='20' align='absmiddle'><span class='txt_left1'>
			<script language='JavaScript'>
			<!--
				passTime_bmi = 0;
				curRemainTime_bmi = 493;
				pLayerName = 'remain_times_bmi';
				pLayerName1 = '�̻縮';

			//-->
			</script>

			&nbsp;&nbsp;&nbsp;����:&nbsp;17�� 10��</span><td>
			</tr>
			<tr height='20'><td>
			&nbsp;&nbsp;&nbsp;����:&nbsp;<span id=remain_times_bmi class=cuInput>
			<SCRIPT LANGUAGE='JavaScript'>
			<!--
				remain_time_bmi();
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

}
if ($weekday ==5 )  {
           $sql = "select * from raceinput where race_date ='$race_date' and race_kind='h03' limit 1";
		  // echo $sql;
		   
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
			$timenow = date ("YmdHi");
			//echo "$starttime - $recent_time ";
			if ($starttime > $recent_time) {
				$remaintime = mktime(${$hr_imsi},${$min_imsi},0,$month,$day,$year) - time() ;
			//	echo "remaintime : $remaintime";
				break;
			}
				
		   } 

?>
				<tr><td height=7></td></tr> 

           <tr>
              <td width="185" align="center"><table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/img/main/left_top.jpg"></td>
          </tr>
          <tr>
            <td align="center" background="/img/main/left_bg.jpg">
			<table width="165" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td class="txt_left" align=center>- �λ�渶 <?=$i?>���� -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			<script language="JavaScript">
			<!--
				passTime_hbu = 0;
				curRemainTime_hbu = <?=$remaintime?>;
				pLayerName = "remain_times_hbu";
				pLayerName1 = "�λ�";

			//-->
			</script>

			&nbsp;&nbsp;&nbsp;����:&nbsp;<?=$start_time_str?></span><td>
			</tr>
			<tr height="20"><td>
			&nbsp;&nbsp;&nbsp;����:&nbsp;<span id=remain_times_hbu class=cuInput>
			<SCRIPT LANGUAGE="JavaScript">
			<!--
				remain_time_hbu();
			//-->
			</SCRIPT>
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

<?
}
if ($weekday ==6 || $weekday == 0 )  {
	          $sql = "select * from raceinput where race_date ='$race_date' and race_kind='h01' limit 1";
		  // echo $sql;
		   
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
			$timenow = date ("YmdHi");
			//echo "$starttime - $recent_time ";
			if ($starttime > $recent_time) {
				$remaintime = mktime(${$hr_imsi},${$min_imsi},0,$month,$day,$year) - time() ;
			//	echo "remaintime : $remaintime";
				break;
			}
				
		   } 
?>
            <tr>
              <td width="185" align="center"><table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/img/main/left_top.jpg"></td>
          </tr>
          <tr>
            <td align="center" background="/img/main/left_bg.jpg">
			<table width="165" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td class="txt_left" align=center>- ��õ�渶 <?=$i?>���� -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			<script language="JavaScript">
			<!--
				passTime_hkw = 0;
				curRemainTime_hkw = <?=$remaintime?>;
				pLayerName = "remain_times_hkw";
				pLayerName1 = "��õ";

			//-->
			</script>

			&nbsp;&nbsp;&nbsp;����:&nbsp;<?=$start_time_str?></span><td>
			</tr>
			<tr height="20"><td>
			&nbsp;&nbsp;&nbsp;����:&nbsp;<span id=remain_times_hkw class=cuInput>
			<SCRIPT LANGUAGE="JavaScript">
			<!--
				remain_time_hkw();
			//-->
			</SCRIPT>
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
<?

           $sql2 = "select * from raceinput where race_date ='$race_date' and race_kind='h02' limit 1";
		   //echo $sql2;
		   
		   $rowrace2 = sql_fetch($sql2);
		   $recent_time2 = date("H:i");

		   $num_race2 = $rowrace2[num_race];
		   //echo "num_race = $num_race";
		   
		   //exit;

		   for ($ii=1;$ii <= $num_race2 ;$ii++) {

			//echo "TEST $i ";
			$start_imsi2 = 'start_'.$ii; $hr_imsi2='hr_'.$ii; $min_imsi2='min_'.$ii;
			$starttime2 = $rowrace2[$start_imsi2];
			$start_time2 = explode(':', $starttime2) ;
			${$hr_imsi2} = $start_time2[0];
			${$min_imsi2} = $start_time2[1];
			$start_time_str_h02 = ${$hr_imsi2}."��".${$min_imsi2}."��";
			//$gameday = date("Ymd");
			//$gamestarttime = $gameday.${$hr_imsi}.${$min_imsi};
			$timenow2 = date ("YmdHi");
			//echo "$starttime - $recent_time ";
			if ($starttime2 > $recent_time2) {
				$remaintime_h02 = mktime(${$hr_imsi2},${$min_imsi2},0,$month,$day,$year) - time() ;
			//	echo "remaintime : $remaintime";
				break;
			}
				
		   }
?>		   
            <tr>
              <td width="185" align="center"><table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/img/main/left_top.jpg"></td>
          </tr>
          <tr>
            <td align="center" background="/img/main/left_bg.jpg">
			<table width="165" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td class="txt_left" align=center>- ���ְ渶 <?=$ii?>���� -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			<script language="JavaScript">
			<!--
				passTime_hje = 0;
				curRemainTime_hje = <?=$remaintime_h02?>;
				pLayerName = "remain_times_hje";
				pLayerName1 = "����";

			//-->
			</script>

			&nbsp;&nbsp;&nbsp;����:&nbsp;<?=$start_time_str_h02?></span><td>
			</tr>
			<tr height="20"><td>
			&nbsp;&nbsp;&nbsp;����:&nbsp;<span id=remain_times_hje class=cuInput>
			<SCRIPT LANGUAGE="JavaScript">
			<!--
				remain_time_hje();
			//-->
			</SCRIPT>
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
<? 
} else 	{
?>	
		  <tr>
              <td align="center"><table  border="0" cellspacing="0" cellpadding="0">
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
			&nbsp; ��, �Ͽ��Ͽ� �����մϴ�</td></tr><tr><td>&nbsp; 

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
<?
}

if ($weekday !=5 )  {
?>
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

<?
}
if ($weekday ==5 || $weekday ==6 || $weekday ==0 )  {

           $sql = "select * from raceinput where race_date ='$race_date' and race_kind='k01' limit 1";
		  // echo $sql;
		   
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
			$start_time_str_k01 = ${$hr_imsi}."��".${$min_imsi}."��";
			//$gameday = date("Ymd");
			//$gamestarttime = $gameday.${$hr_imsi}.${$min_imsi};
			$timenow = date ("YmdHi");
			//echo "$starttime - $recent_time ";
			if ($starttime > $recent_time) {
				$remaintime_k01 = mktime(${$hr_imsi},${$min_imsi},0,$month,$day,$year) - time() ;
			//	echo "remaintime : $remaintime";
				break;
			} 
		   } 
		   
?>
           <tr>
              <td width="185" align="center"><table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/img/main/left_top.jpg"></td>
          </tr>
          <tr>
            <td align="center" background="/img/main/left_bg.jpg">
			<table width="165" border="0" cellpadding="0" cellspacing="0">

<?			if(!$remain_time_k01 && !$start_time_str_k01) {
				?>
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
<?
} else {
?>
			<tr>
				<td class="txt_left" align=center>- ������ <?=$i?>���� -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>

			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			<script language="JavaScript">
			<!--
				passTime_bja = 0;
				curRemainTime_bja = <?=$remaintime_k01?>;
				pLayerName = "remain_times_bja";
				pLayerName1 = "����";

			//-->
			</script>

			&nbsp;&nbsp;&nbsp;����:&nbsp;<?=$start_time_str_k01?></span><td>
			</tr>
			<tr height="20"><td>
			&nbsp;&nbsp;&nbsp;����:&nbsp;<span id=remain_times_bja class=cuInput>
			<SCRIPT LANGUAGE="JavaScript">
			<!--
				remain_time_bja();
			//-->
			</SCRIPT>
				</span>
				</td>
			</tr>
			</table>
			</td>
		</tr>
<?
				}
			?>
          <tr>
            <td><img src="/img/main/left_bottom.jpg"></td>
          </tr>
</table></td>
            </tr>
			<tr><td height=7></td></tr>
<?

           $sql2 = "select * from raceinput where race_date ='$race_date' and race_kind='k02' limit 1";
		   //echo $sql2;
		   
		   $rowrace2 = sql_fetch($sql2);
		   $recent_time2 = date("H:i");

		   $num_race2 = $rowrace2[num_race];
		   //echo "num_race = $num_race";
		   
		   //exit;

		   for ($ii=1;$ii <= $num_race2 ;$ii++) {

			//echo "TEST $i ";
			$start_imsi2 = 'start_'.$ii; $hr_imsi2='hr_'.$ii; $min_imsi2='min_'.$ii;
			$starttime2 = $rowrace2[$start_imsi2];
			$start_time2 = explode(':', $starttime2) ;
			${$hr_imsi2} = $start_time2[0];
			${$min_imsi2} = $start_time2[1];
			$start_time_str_k02 = ${$hr_imsi2}."��".${$min_imsi2}."��";
			//$gameday = date("Ymd");
			//$gamestarttime = $gameday.${$hr_imsi}.${$min_imsi};
			$timenow2 = date ("YmdHi");
			//echo "$starttime - $recent_time ";
			if ($starttime2 > $recent_time2) {
				$remaintime_k02 = mktime(${$hr_imsi2},${$min_imsi2},0,$month,$day,$year) - time() ;
			//	echo "remaintime : $remaintime";
				break;
			}
				
		   } 
			

?>
           <tr>
              <td width="185" align="center"><table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/img/main/left_top.jpg"></td>
          </tr>
          <tr>
            <td align="center" background="/img/main/left_bg.jpg">
			<table width="165" border="0" cellpadding="0" cellspacing="0">

<?			if(!$remain_time_k02 && !$start_time_str_k02) {
				?>
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
<?
} else {
?>

			<tr>
				<td class="txt_left" align=center>- â����� <?=$ii?>���� -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			<script language="JavaScript">
			<!--
				passTime_bch = 0;
				curRemainTime_bch = <?=$remaintime_k02?>;
				pLayerName = "remain_times_bch";
				pLayerName1 = "â��";

			//-->
			</script>

			&nbsp;&nbsp;&nbsp;����:&nbsp;<?=$start_time_str_k02?></span><td>
			</tr>
			<tr height="20"><td>
			&nbsp;&nbsp;&nbsp;����:&nbsp;<span id=remain_times_bch class=cuInput>
			<SCRIPT LANGUAGE="JavaScript">
			<!--
				remain_time_bch();
			//-->
			</SCRIPT>
				</span>
				</td>
			</tr>
			</table>
			</td>
		</tr>
<?
				}
			?>
          <tr>
            <td><img src="/img/main/left_bottom.jpg"></td>
          </tr>
</table></td>
            </tr>
			<tr><td height=7></td></tr>

<?
} else {
?>
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
<?
}
if ( $weekday == 5) {
	          $sql = "select * from raceinput where race_date ='$race_date' and race_kind='k03' limit 1";
		  // echo $sql;
		   
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
			$timenow = date ("YmdHi");
			//echo "$starttime - $recent_time ";
			if ($starttime > $recent_time) {
				$remaintime = mktime(${$hr_imsi},${$min_imsi},0,$month,$day,$year) - time() ;
			//	echo "remaintime : $remaintime";
				break;
			}
				
		   } 
?>
           <tr>
              <td width="185" align="center"><table  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/img/main/left_top.jpg"></td>
          </tr>
          <tr>
            <td align="center" background="/img/main/left_bg.jpg">
			<table width="165" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td class="txt_left" align=center>- �λ��� <?=$i?>���� -</td>
			</tr>
			<tr>
                <td><img src="/img/main/left_line.jpg"></td>
            </tr>
			<tr>
				<td height="20" align="absmiddle"><span class="txt_left1">
			<script language="JavaScript">
			<!--
				passTime_bbu = 0;
				curRemainTime_bbu = <?=$remaintime?>;
				pLayerName = "remain_times_bbu";
				pLayerName1 = "�λ�";

			//-->
			</script>

			&nbsp;&nbsp;&nbsp;����:&nbsp;<?=$start_time_str?></span><td>
			</tr>
			<tr height="20"><td>
			&nbsp;&nbsp;&nbsp;����:&nbsp;<span id=remain_times_bbu class=cuInput>
			<SCRIPT LANGUAGE="JavaScript">
			<!--
				remain_time_bbu();
			//-->
			</SCRIPT>
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

<?
} else {
?>
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
<?
}
if ( $weekday != 3 && $weekday !=4 ) 
{
echo pred_schedule($t01_str, $weekday_0304) ;
}
?>

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