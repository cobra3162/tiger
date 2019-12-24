<?
$sub_menu = "200100";
include_once("./_common.php");

check_demo();

auth_check($auth[$sub_menu], "w");

check_token();

//$id = $member[mb_id];
//$name = $member[mb_name];

$i = $_POST[race_ser_no];
$no = $_POST[race_no];

echo "chk_line_no = $chk_line_no <br>";

$chk_line_str = '';

//if ($chk01=='1') $chk_line_str .= '1/'; else $chk_line_str .='0/';
//if ($chk02=='1') $chk_line_str .= '1/'; else $chk_line_str .='0/';

for ($k=1;$k<=$chk_line_no;$k++) {

	$line_imsi = 'line_'.$k;
	if (${$line_imsi}!='1') {
		$cancle_line_no = $k;
		echo " $cancle_line_no 은 취소되지 않았습니다 <br>";
		continue;
	} else {
		$cancle_line_no = $k;
		echo " cancle_line_no = $cancle_line_no <br>";
	}

	$sql = " select * from raceinput where no = $no ";
	echo $sql."<br>";

	$row = sql_fetch($sql);
	$race_date = $row[race_date];
	$race_kind = $row[race_kind];
	$race_date = str_replace( "-", "", $race_date); 

    $cancle_str = " and ( sel01 = $k  or sel02 = $k or sel03 = $k )";
	$sql3 = "select * from ticket where race_date='$race_date' and raceno = $i and race_kind = '$race_kind' 
				and status !='cancle'".$cancle_str ;

	echo $sql3;

	$result = mysql_query($sql3);
	$total = mysql_num_rows($result);

	if ($total>0) echo "<script>alert('경기번호 $no 경기순서 $i 취소라인 $k을 선택한 티켓수는 $total 입니다');</script>";
	else { echo "<script>alert('취소가능한 경기번호 $no  경기순서 $i 의 티켓은 없습니다');
			history.go(-1);
			</script>";
	}
   

	for($i=1; $i<=$total; $i++) {


		$row3 = mysql_fetch_array($result);
		$ticket_no = $row3[ticket_no];
		$id = $row3[id];
		$order_gubun = $row3[order_gubun];
		$raceresult=$row3[raceresult];

		$sql5 = "update ticket set status='cancle' where ticket_no=$ticket_no";
		echo "<br>".$sql5."<br>";

		sql_query($sql5);

		$sqlmember = "select mb_name from g4_member where mb_id='$id'";
		$rowmember = sql_fetch($sqlmember);
		$name = $rowmember[mb_name];

		$sql6 = "select * from account where ticket_no = $ticket_no and kind!='cancle'" ;
		echo $sql6;

		$row6 = sql_fetch($sql6);
		$amount = $row6[amount];
		$event = $row6[event];

		if ($order_gubun == 'bankM') {
		
			$kind2 = 'cancle'; 
			$msqlc= " update $g4[member_table] set cashmoney =  cashmoney - $amount,
											  eventmoney = eventmoney - $event where mb_id = '$id' ";		

			$asqlc = " insert into account set id = '$id', kind = '$kind2', amount = -1* $amount, status='confirm',
					   regdate = '$g4[time_ymdhis]', name='$name', 
					   event = -1 * $event ,  ticket_no = $ticket_no" ;
			echo "<br>".$asqlc;
			echo "<br>".$msqlc."<br>";

			sql_query($msqlc);
			sql_query($asqlc);

		} else { 
			$kind2='cancle';
			$msqle= " update $g4[member_table] set eventmoney =  eventmoney - $event where mb_id = '$id' ";		
			$asqle = " insert into account set id = '$id', kind = '$kind2', event = -1*$event, status='confirm',
					  regdate = '$g4[time_ymdhis]', name='$name', ticket_no = $ticket_no" ;

			echo "<br>".$asqle;
			echo "<br>".$msqle;
			sql_query($msqle);
			sql_query($asqle);
		}

	}


   //exit;

} 


//exit;

if ($w=='u')  $sql = "update raceresult set ";  

else {  $sql = "insert into raceresult set ";
		$sql .= " race_no = $no, ";
		$sql .= " race_ser_no = $i, "; }

	if(!$arrv01) $arrv01=0;
    if(!$arrv02) $arrv02=0;	
	if(!$arrv03) $arrv03=0;
		if(!$single) $single= 0;
        if(!$s01) $s01= 0;
        if(!$ss01) $ss01= 0;
        if(!$s02) $s02= 0;
        if(!$ss02) $ss02= 0;
        if(!$s03) $s03= 0;
        if(!$ss03) $ss03= 0;
        if(!$doubl) $doubl= 0;
        if(!$pair) $pair= 0;
        if(!$ddd) $ddd= 0;


$sql .= " arrv01 = $arrv01, ";
$sql .= " arrv02 = $arrv02, ";
$sql .= " arrv03 = $arrv03, ";
$sql .= " arrv_name01 = '$arrv_name01', ";
$sql .= " arrv_name02 = '$arrv_name02', ";
$sql .= " arrv_name03 = '$arrv_name03', ";
$sql .= " single = $single, ";
$sql .= " s01 = $s01, ";
$sql .= " ss01 = $ss01, ";
$sql .= " s02 = $s02, ";
$sql .= " ss02 = $ss02, ";
$sql .= " s03 = $s03, ";
$sql .= " ss03 = $ss03, ";
$sql .= " doubl = $doubl, ";
$sql .= " pair = $pair, ";
$sql .= " ddd = $ddd ";

if ($w=='u')  $sql .= "where race_no =$no and race_ser_no = $i  ";  

//echo $sql;
//exit;
    
 //   echo"<script> alert('$sql'); </script>";

sql_query($sql);

//-------------------------------------------------------
// 구매내역이 있으면 배팅갤과를 산출하여 업데이트한다


$sql2 = " select * from raceinput where no = $no ";
//echo $sql2;
$row2 = sql_fetch($sql2);
$race_date = $row2[race_date];
$race_kind = $row2[race_kind];
$race_date = str_replace( "-", "", $race_date); 

$raceresult = $arrv01."-".$arrv02."-".$arrv03;
//echo "<br>";

//$sql3 = "select * from ticket where race_date='$race_date' and raceno = $i and race_kind = '$race_kind' and id='$id'";

$sql3 = "select * from ticket where race_date='$race_date' and raceno = $i and race_kind = '$race_kind' and status !='cancle' ";
//echo $sql3."<br>";

$result = mysql_query($sql3);
$total = mysql_num_rows($result);


for($i=1; $i<=$total; $i++) {

	$row3 = mysql_fetch_array($result);
	$ticket_no = $row3[ticket_no];
	$id = $row3[id];
	$sel01 = $row3[sel01];
	$sel02 = $row3[sel02];
	$sel03 = $row3[sel03];
	$game_type = $row3[game_type];
	$amount = $row3[amount];
	$order_gubun = $row3[order_gubun];

  //  echo "경기번호 $i : game_type = $game_type : 1착 $sel01  2착 $sel02  3착 $sel03   1착 $arrv01  2착 $arrv02  3착 $arrv03";
	

	if ($game_type == 'doub') {
		 if ( ($sel01 == $arrv01 && $sel02 == $arrv02) || ($sel01 == $arrv02 && $sel02 == $arrv01) )  {
			 $status = 'win'; $rate=$doubl ;
		 } else {
			 $status = 'fail'; $rate=0;
		 }
	} else if ($game_type == 'pair') {
		 if ( ($sel01 == $arrv01 && $sel02 == $arrv02))  {
			 $status = 'win'; $rate=$pair ;
		 } else { $status = 'fail'; $rate=0; }
	} else if ($game_type == 'ddd') {
		 if ( ($sel01 == $arrv01 && $sel02 == $arrv02 && $sel03 == $arrv03))  {
		 $status = 'win'; $rate=$ddd ;
		 } else  { $status = 'fail'; $rate=0; }
	} else if ($game_type == 'ss') {
		//echo " TEST OK ";
		 if ( ($sel01 == $arrv01 && $sel02 == $arrv02) || ($sel01 == $arrv02 && $sel02 == $arrv01) )  {
			 $status = 'win'; $rate=$ss01 ;
		 } else if ( ($sel01 == $arrv01 && $sel02 == $arrv03) || ($sel01 == $arrv03 && $sel02 == $arrv01) )  {
			 $status = 'win'; $rate=$ss02 ;
		 } else if ( ($sel01 == $arrv02 && $sel02 == $arrv03) || ($sel01 == $arrv03 && $sel02 == $arrv02) )  {
			 $status = 'win'; $rate=$ss03 ;	
		 } else { $status = 'fail'; $rate=0; }
	}

	if (!$rate) $rate=0;

	$sql5 = "update ticket set raceresult='$raceresult', rate=$rate where ticket_no=$ticket_no";
	//echo $sql5."-".$status;
	echo $sql5;

	sql_query($sql5);

	/*$sel01 = $row2[sel01];
	$sel02 = $row2[sel02];
	$sel03 = $row2[sel03];
	*/

	if (!$commission) $commission=0.1;

	$cash_win_amount = $amount * $rate;

    $sqlmember = "select mb_name from g4_member where mb_id='$id'";
	echo "<br>".$sqlmember;

	$rowmember = sql_fetch($sqlmember);
	$name = $rowmember[mb_name];


	if($cash_win_amount > 0 ) {
		$sql7_1 = " insert into account set id = '$id', kind ='cash-win', amount = $cash_win_amount  ,
					status = 'confirm', regdate = '$g4[time_ymdhis]', name = '$name',ticket_no=$ticket_no ";

		$msql= " update $g4[member_table] set cashmoney =  cashmoney + $cash_win_amount where mb_id = '$id' ";		

	/*
		$event_win_amount = $cash_win_amount * $commision;
		$sql7_2 = " insert into account set id = '$id', kind ='event-win', amount = $event_win_amount  ,
					 status = 'confirm', regdate = '$g4[time_ymdhis]', name = '$name',ticket_no=$ticket_no  ";
	*/
		echo "<br>".$sql7_1;


		$sql8 = "select count(*) as cnt from account where ticket_no = $ticket_no and kind='cash-win'";
		$row8 = sql_fetch($sql8);
		$cnt = $row8[cnt];
		if ($cnt>0) echo "<script language='JavaScript'> alert('이미 결과가 등록된 티켓입니다'); </script>";
		else { echo "<br>".$sql8."<br>".$msql; sql_query($sql7_1);  sql_query($msql);  //sql_query($sql7_2);	
		}
	}
}

//exit;

//echo "<script language='JavaScript'> alert('$msg'); </script>";

goto_url("./race_result.php");

?>
