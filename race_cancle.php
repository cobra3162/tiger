<?
$sub_menu = "200100";
include_once("./_common.php");

check_demo();

auth_check($auth[$sub_menu], "w");

check_token();

//$id = $member[mb_id];
//$name = $member[mb_name];

$i = $_GET[race_ser_no];
$no = $_GET[race_no];

?>

<script>

if(!confirm("��ҵ� ������ ���ֱ��� ȯ�ҵ˴ϴ�.\n\n���� ����Ͻðڽ��ϱ�?")) 
history.go(-1);

</script>

<?

$sql = " select * from raceinput where no = $no ";
$row = sql_fetch($sql);
$race_date = $row[race_date];
$race_kind = $row[race_kind];
$race_date = str_replace( "-", "", $race_date); 
$status = $row[status];

$sql3 = "select * from ticket where race_date='$race_date' and raceno = $i and race_kind = '$race_kind' and status !='cancle'";
//echo $sql3;


//-------------------------------------------------------
// ���ų����� ������ ���ð����� �����Ͽ� ������Ʈ�Ѵ�

$result = mysql_query($sql3);
$total = mysql_num_rows($result);


if ($total>0) echo "<script>alert('����ȣ $no  ������ $i �� Ƽ�ϼ��� $total �Դϴ�');</script>";
else { echo "<script>alert('��Ұ����� ����ȣ $no  ������ $i �� Ƽ���� �����ϴ�');
			history.go(-1);
			</script>";
}
		

for($i=1; $i<=$total; $i++) {

	$row3 = mysql_fetch_array($result);
	$ticket_no = $row3[ticket_no];
	$id = $row3[id];
//	$game_type = $row3[game_type];
//	$amount = $row3[amount];
	$order_gubun = $row3[order_gubun];
	$raceresult=$row3[raceresult];

	$sql5 = "update ticket set status='cancle' where ticket_no=$ticket_no";
	echo "<br>".$sql5."<br>";

	sql_query($sql5);

	$sqlmember = "select mb_name from g4_member where mb_id='$id'";
	$rowmember = sql_fetch($sqlmember);
	$name = $rowmember[mb_name];

    $sql6 = "select * from account where ticket_no =$ticket_no and kind!='cancle'" ;
	echo $sql6;
	$row6 = sql_fetch($sql6);

	if(!$row6) {
		echo "<script>alert('��Ұ����� ����ȣ Ƽ�Ϲ�ȣ $ticket_no �� ȯ�Ұ��� �����ϴ�');
				history.go(-1);
			</script>";
	}

	$amount = $row6[amount];
	$event = $row6[event];

	if ($order_gubun == 'bankM') {
	
		$kind2 = 'cancle'; 
		$msqlc= " update $g4[member_table] set cashmoney =  cashmoney - $amount,
										  eventmoney = eventmoney - $event where mb_id = '$id' ";		

		$asqlc = " insert into account set id = '$id', kind = '$kind2', amount = -1* $amount, status='confirm',
				   regdate = '$g4[time_ymdhis]', name='$name', 
				   event = -1 * $event ,  ticket_no = $ticket_no" ;
//		echo "<br>".$asqlc;
//		echo "<br>".$msqlc."<br>";
		

		sql_query($msqlc);
		sql_query($asqlc);

	} else { 
		$kind2='cancle';
		$msqle= " update $g4[member_table] set eventmoney =  eventmoney - $event where mb_id = '$id' ";		
		$asqle = " insert into account set id = '$id', kind = '$kind2', event = -1*$event, status='confirm',
				  regdate = '$g4[time_ymdhis]', name='$name', ticket_no = $ticket_no" ;

//		echo "<br>".$asqle;
//		echo "<br>".$msqle;
		sql_query($msqle);
		sql_query($asqle);
	}

    $sql7 = "select * from account where ticket_no = $ticket_no and kind='cash-win'" ;
	echo $sql7;
	$row7 = sql_fetch($sql7);
	$amount = $row7[amount];
	$kind = $row7[kind];
    
    if ($row7) { // ��� ��� (���ֱ��Է½�)  
 		
		echo "$raceresult $kind ���ְ���� �ԷµǾ����ϴ� ���Ϸ�<br>";
		$kind2 = 'win-cancle'; 
		$msql= " update $g4[member_table] set cashmoney =  cashmoney - $amount where mb_id = '$id' ";		
		$asql= " insert into account set id = '$id', kind = '$kind2', amount = -1* $amount, status='confirm',
				   regdate = '$g4[time_ymdhis]', name='$name', ticket_no = $ticket_no" ;
		echo $asql;
		echo "--".$msql."<br><br>";

		sql_query($msql);
		sql_query($asql);
    }

}

exit;

goto_url("./race_result.php");

?>
