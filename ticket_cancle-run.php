<?
$sub_menu = "200200";
include_once("./_common.php");

check_demo();

//auth_check($auth[$sub_menu], "d");

check_token();

for ($i=0; $i<count($chk); $i++) 
{
    // 실제 번호를 넘김
    $k = $_POST['chk'][$i];

    $sql = " update ticket set status='cancle' where ticket_no = '{$_POST['no'][$k]}' ";
	//echo $sql
	//exit;

    sql_query($sql);

    $sqlticket = "select * from ticket where ticket_no = '{$_POST['no'][$k]}' ";
	$rowticket = sql_fetch($sqlticket);
	$order_gubun = $rowticket[order_gubun];
	$amount = $rowticket[amount];  // +값이다
	$id = $rowticket[id];
	$game_type = $rowticket[game_type];

    $sqlmem = "select * from g4_member where mb_id='$id'";
	$rowmem = sql_fetch($sqlmem);
	$name = $rowmem[mb_name];

	/*
		$sqlconf =" select * from  config_race";
		$rowconf = sql_fetch($sqlconf);	

		$event_doub = $rowconf[cf_event_doub];
		$event_pair = $rowconf[cf_event_pair];
		$event_ddd = $rowconf[cf_event_ddd];
		$event_ser = $rowconf[cf_event_ser];

		if ( $game_type == "pair" ) $event_win = $event_pair;
		elseif ( $game_type == "doub" ) $event_win = $event_doub;
		elseif ( $game_type == "ddd" ) $event_win = $event_ddd;
		elseif ( $game_type == "ss" ) $event_win = $event_ser;
	*/

    $sql6 = "select * from account where ticket_no = '{$_POST['no'][$k]}' and kind!='cancle'" ;
	echo $sql6;
	$row6 = sql_fetch($sql6);
	$amount = $row6[amount];
	$event = $row6[event];
	
	if ($order_gubun == 'bankM') {
	
		$kind = 'cancle'; 
		/*
		$eventmoney_win = $amount * $event_win / 100;  // 이벤트적립금 취소액
		$msql= " update $g4[member_table] set cashmoney =  cashmoney + $amount,
										  eventmoney = eventmoney - $eventmoney_win where mb_id = '$id' ";		
		*/

		$msqlc= " update $g4[member_table] set cashmoney =  cashmoney - $amount,		
										  eventmoney = eventmoney - $event where mb_id = '$id' ";			

		$asqlc = " insert into account set id = '$id', kind = '$kind', amount = -1* $amount, status='confirm',
				   regdate = '$g4[time_ymdhis]', name='$name', 
				   event = -1 * $event ,   ticket_no = '{$_POST['no'][$k]}'" ;

		echo "<br>".$asqle;
		echo "<br>".$msql;
		//exit;

		sql_query($msqlc);
		sql_query($asqlc);

	} else { 
		$kind='cancle';
		$msqle = " update $g4[member_table] set eventmoney =  eventmoney - $event where mb_id = '$id' ";		
		$asqle = " insert into account set id = '$id', kind = '$kind', event = -1* $event, status='confirm',
				  regdate = '$g4[time_ymdhis]', name='$name', ticket_no = '{$_POST['no'][$k]}'" ;

		echo "<br>".$asqle;
		echo "<br>".$msqle;
		sql_query($msqle);
		sql_query($asqle);
	}

}

goto_url("./ticket_list.php");
?>
