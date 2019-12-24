<?
include_once("./_common.php");
include_once("$g4[path]/lib/mailer.lib.php");

//$id = trim(strip_tags(mysql_escape_string($_POST[id])));

//$amount = str_replace( ",", "", $amount);
//$amount = number_format($amount, 0,'.', '');  

// 관리자님 회원정보
//$admin = get_admin('super');
//$mb = get_member($mb_id);
$id = $member[mb_id];
$name = $member[mb_name];

/*
		strSpan += "<input type=hidden name=OrderInfo[] value='" + option_value + "'>";
		strSpan += "<input type=hidden name=order_gub value='" + gubun + "'>";
		strSpan += "<input type=hidden name=race_kind value='"+game_name+"'>";	// 게임네임
		strSpan += "<input type=hidden name=money_type value='"+money_type+"'>";	// 모의베팅
*/

//echo "Orderinfo 01 = $OrderInfo[0] <br>";
//echo "Orderinfo 02 = $OrderInfo[1] <br>";
//echo "Orderinfo 03 = $OrderInfo[2] <br>";
//echo "Orderinfo 04 = $OrderInfo[3] <br>";

$ordernum = count($OrderInfo);

//echo "ordernum : $ordernum";

// exit;


for ( $i=0; $i<$ordernum ; $i++ )  {
    
	echo "Orderinfo $i = $OrderInfo[$i] <br>";

	$order_split = explode('|', $OrderInfo[$i]);
 

	$race_date = $order_split[0];
	$raceno =  $order_split[1];
	$game_type = $order_split[2];
	$sel01 = $order_split[3];
	$sel02 = $order_split[4];
	$sel03 = $order_split[5];
	$amount = $order_split[6];
	$ea = $order_split[8];
	$commission = $order_split[8];;

	// if(!$commission) $commission=0;

		if($game_type == '쌍승식') $game_type2 = "pair";
		if($game_type == '복승식') $game_type2 = "doub";
		if($game_type == '복연승') $game_type2 = "ss";
		if($game_type == '삼복승') $game_type2 = "ddd";
		if($game_type == '쌍조') $game_type2 = "sj";
		if($game_type == '복조') $game_type2 = "dj";

	$regdate = date("Y-m-d H:i");

	$tsql = "select max(ticket_no) as maxno from ticket";
	$trow = sql_fetch($tsql);
	$ticket_no = $trow[maxno] + 1;


		$sqlconf =" select * from  config_race";
		$rowconf = sql_fetch($sqlconf);

		$event_doub = $rowconf[cf_event_doub];
		$event_pair = $rowconf[cf_event_pair];
		$event_ddd = $rowconf[cf_event_ddd];
		$event_ser = $rowconf[cf_event_ser];

		$event2_doub = $rowconf[cf_event2_doub];
		$event2_pair = $rowconf[cf_event2_pair];
		$event2_ddd = $rowconf[cf_event2_ddd];

        if ($race_kind =='h01' || $race_kind =='h02' || $race_kind =='h03') {
			if ( $game_type2 == "pair" ) $event_win = $event_pair;
			elseif ( $game_type2 == "doub" ) $event_win = $event_doub;
			elseif ( $game_type2 == "ddd" ) $event_win = $event_ddd;
			elseif ( $game_type2 == "ss" ) $event_win = $event_ser;
		} else {
			if ( $game_type2 == "pair" ) $event_win = $event2_pair;
			elseif ( $game_type2 == "doub" ) $event_win = $event2_doub;
			elseif ( $game_type2 == "ddd" ) $event_win = $event2_ddd;
		}

    $regdate =  $g4[time_ymdhis];

	$sql = " insert into ticket set ticket_no = $ticket_no, id = '$id', race_date ='$race_date', raceno = $raceno  ,
			game_type = '$game_type2', sel01 = '$sel01', sel02 = '$sel02', sel03 = '$sel03',
			amount = '$amount', ea = $ea, commission = $commission, race_kind = '$race_kind',
			money_type = '$money_type', order_gubun='$order_gubun', regdate ='$regdate', eventratio=$event_win ;
			";

	//echo $sql; 
	//exit;

	sql_query($sql);

	// 2012.5.13  티켓구매결과를 account와 회원정보에 반영하기
	/*
	no, id,kind enum('accin','accout','event-win','event-ticket','cash-ticket','cash-win','cancle','manual')
	amount    int(7)  , event int(7), status enum('apply','confirm') 
	regdate, name , ticket_no 
	*/
	if ($order_gubun == 'bankM') {
		$kind = 'cash-ticket'; 
		
		$eventmoney_win = $amount * $event_win / 100;

		$msql= " update $g4[member_table] set cashmoney =  cashmoney - $amount,
										  eventmoney = eventmoney + $eventmoney_win where mb_id = '$id' ";		

		$amount = -1 * $amount;
		
		$asqle = " insert into account set id = '$id', kind = '$kind', amount = $amount, status='confirm',
				   regdate = '$g4[time_ymdhis]', name='$name', 
				   event = $eventmoney_win  , 
				   ticket_no = $ticket_no" ;

		// $asqlc = " insert into account set id = '$id', kind = 'event-get', amount = $eventmoney_win, status='confirm',
		//      regdate = '$g4[time_ymdhis]', name='$name', ticket_no = $ticket_no" ;

	//	echo "<br>".$asqlc;
		echo "<br>".$asqle;
		echo "<br>".$msql;
	//	exit;

		sql_query($msql);
	//	sql_query($asqlc);
		sql_query($asqle);

	} else { 
		$kind='event-ticket';
		$event = -1* $amount;
		$msql= " update $g4[member_table] set eventmoney =  eventmoney - $event where mb_id = '$id' ";		
		// $amount = -1 * $amount;
		$asql = " insert into account set id = '$id', kind = '$kind', event = $event, status='confirm',
				  regdate = '$g4[time_ymdhis]', name='$name', ticket_no = $ticket_no" ;

		echo "<br>".$asql;
		echo "<br>".$msql;
		sql_query($msql);
		sql_query($asql);
	}
}

$msg = "";
if ($msg) 
    echo "<script language='JavaScript'>alert('{$msg}');</script>";

//$url = "/ticket.php?race_kind='$race_kind'";
//echo $url;

$url = "/ticket00.php";
goto_url($url);


?>
