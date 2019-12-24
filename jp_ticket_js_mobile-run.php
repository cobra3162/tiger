<style type='text/css'>
.input2 {border:1 solid; border-color:#999999; background-color:#FFFFFF; font-size:10pt}
</style>

<script language='JavaScript'>
<!--
var gameTime = new Array;
var raceHour = new Array;
var raceMinute = new Array;
var remainTime = new Array;
var countPlayer = new Array;
var ssang = new Array;
var intCommission = 0
var game_name = "<?=$game_name?>"
var money_type = "real"

<?
for ($i=1; $i < $num_race+1 ; $i++) { 
	$start_imsi = 'start_'.$i; $hr_imsi='hr_'.$i; $min_imsi='min_'.$i; $line_imsi='line_'.$i;
	$start_time = $rowgame[$start_imsi];
	$start_time = explode(':', $start_time) ;
	${$hr_imsi} = $start_time[0];
	${$min_imsi} = $start_time[1];
	$countplayer = $rowgame[$line_imsi];

	$gameday = date("Ymd");
	$gamestarttime = $gameday.${$hr_imsi}.${$min_imsi};
	$timenow = date ("YmdHi");

	// for mobile 
	$countPlayer[$i]=$countplayer;
	$startTime[$i] = $rowgame[$start_imsi];

	$remaintime = mktime(${$hr_imsi},${$min_imsi},0,$month,$day,$year) - time() ;

	if ($gamestarttime > $timenow) {
		if (!$startround_tag) $startround = $i;
		$startround_tag = 'yes';

		echo "
		gameTime[$i] = '$gamestarttime'
		raceHour[$i] = '${$hr_imsi}'
		raceMinute[$i] = '${$min_imsi}'
		remainTime[$i] = '$remaintime'
		countPlayer[$i] = $countplayer
		ssang[1] = ''
		";
	}
} // for $i  racedate racekind의  경주정보 배열
if(!$cur_round) $cur_round= $startround ;
$round = $cur_round;
?>

var round =<?=$cur_round?>;
//document.frm.round.value = round;
var firstRound = <?=$startround?>;
var selRound = "<?=$cur_round?>";
var lastRound = remainTime.length;

var curRound = "<?=$cur_round?>";
var curGameTime = gameTime[<?=$cur_round?>];
var curRaceHour = raceHour[<?=$cur_round?>];
var curRaceMinute = raceMinute[<?=$cur_round?>];
var curRemainTime = remainTime[<?=$cur_round?>];
var curCountPlayer = countPlayer[<?=$cur_round?>];
var maxPlayer = countPlayer[<?=$cur_round?>];
var passTime = 0;

<?
$cashmoney = $member[cashmoney] ;
$eventmoney = $member[eventmoney];
if (!$cashmoney) $cashmoney=0;
if (!$eventmoney) $eventmoney=0;

$totalM = $cashmoney + $eventmoney ;
?>

//var userMoney= $cashmoney;
//var userEventMoney = $eventmoney;
//var userTotalMoney = $totalM";

var userMoney= <?=$cashmoney?>;
var userEventMoney = <?=$eventmoney?>;
var userTotalMoney = <?=$totalM?>;

// 날짜 변경시
function changeDate(){
	var form = document.timeform;
	var year = form.game_year.value;
	var month = form.game_month.value;
	var day = form.game_day.value;

	location = "/jp_ticket.php?game_name=<?=$game_name?>&select_day="+year+month+day;
}

// 예상평 클릭시
function changeExpect(round){
	var form = document.timeform;
	var year = form.game_year.value;
	var month = form.game_month.value;
	var day = form.game_day.value;
	var str;
	var url;
	var setting="width=690, height=560, top=0,scrollbars=auto";
	url = "/ticket/popup_view.html?idx=&game_name="+game_name+"&game_date="+year+month+day+"&round_num="+round+"&m=v"
	str = "<img src='/img/btn_03.gif' align=absmiddle border=0 onclick=\"window.open('"+url+"','','"+setting+"')\" style='cursor:hand'>";

//	document.all.expect.innerHTML = str;  // 버튼표시를 삭제
	document.all.expect.innerHTML = '' ;
}

function hangju(round){
	var setting="width=365, height=350, top=0,scrollbars=no";
	//window.open('hangju.html?span_select_round='+round, '',setting);
	hang="<img src='/img/button/hang.gif' border=0 onClick=\"window.open('hangju.html", '',setting+"')\">";
	document.all.rounda.innerHTML = hang;
}

function checkMoney() {
	var form = document.timeform;
	var inputLine = document.getElementById('totalDisplay').style;
	var bankMoney = <?=$cashmoney?>;
	var eventMoney = <?=$eventmoney?>;
	var allMoney = <?=$cashmoney?> + <?=$eventmoney?>;;
	var gubunTxt;

	RemoveMyCart1();

	if(form.gubun[0].checked == true) {

		form.totMoney.value = comma(String(bankMoney));
		form.gubunTxt.value = "bankM";
		inputLine.display = "none";
		
	} else if(form.gubun[1].checked == true) {

		if(eventMoney < 1000) {
			alert('이벤트머니가 1000원 이상일 경우에만 구매를 하실 수 있습니다');
			return;
		}

		form.totMoney.value = comma(String(eventMoney));
		form.gubunTxt.value = "eventM";
		inputLine.display = "none";
	
	} else {
		form.totMoney.value = comma(String(allMoney));
		cartform.remain_totalmoney.value = comma(String(allMoney));
		form.gubunTxt.value = "totalM";
		inputLine.display = "block";
	}
}

//-->
</script>
<script language=javascript>
// onload 시 초기화.  페이지 열때.
function initRace(cur_Round, cur_GameTime, cur_RaceHour, cur_RaceMinute)
{
//	cur_Round = -1;
	remain_time_input_box();
	initSelect();
	changeExpect(cur_Round);
	initGameTime(cur_Round);
	initSpan();
	enableSsang(cur_Round);
	initCart();
	initMyCart();
//	document.all.RoundNm.innerHTML = "제" + firstRound + "경주";
	//document.all.round11.value = cur_Round;
}

// 남은 시간 표시
function remain_time_input_box(){
	var remain_times = "";
	var g_name = "<?=$game_name?>";
	var g_round = "1"

	//remain_seconds = curRemainTime+50;
	remain_seconds = curRemainTime;

	if(g_name == 't01') g_str = "미사리경정";
	if(g_name == 'h01') g_str = "과천경마";
	if(g_name == 'h02') g_str = "제주경마";
	if(g_name == 'h03') g_str = "부산경마";
	if(g_name == 'k01') g_str = "광명경륜";
	if(g_name == 'k02') g_str = "창원경륜";
	if(g_name == 'k03') g_str = "부산경륜";

	if ( (remain_seconds/86400) >= 1)  
	{
		remain_times = remain_times + Math.floor(remain_seconds/86400) + "일 ";
	}

	if ( (remain_seconds%86400)/3600 >= 1)  
	{
		remain_times = remain_times + Math.floor((remain_seconds%86400)/3600) + "시간 ";
	}

	if ( (remain_seconds%3600)/60 >= 1)  
	{
		remain_times = remain_times + Math.floor((remain_seconds%3600)/60) + "분 ";
	}

	if ( ((remain_seconds%60)/60 >=0) && (remain_seconds != "") )  
	{
		remain_times = remain_times + Math.floor(remain_seconds%60) + "초";
	}
	else
	{
		remain_times = "종료";
		document.timeform.remain_time.value = remain_times;

/*		if(remain_times == '종료') {
			alert( g_str+" 제" + g_round + " 경주가 마감되었습니다" );
			location.replace( "/ticket.php?game_name="+g_name );
		}
*/
	}
	
	curRemainTime--;  // 남은 시각
	passTime++;		  // 현재페이지를 연상태에서 지나간 시간
	document.timeform.remain_time.value = remain_times;
	if(remain_times != '종료') {
	setTimeout("remain_time_input_box()",1000);
	}
}

// 경주 날짜 초기화
function initSelect()
{
	var g_name = "<?=$game_name?>";
	var string = "<select name='select_round' onchange='changeRound(this.value)'>\n";
	
//	string += "<option value='-1'>경주를 선택하세요</option>\n";
	
	for(i=firstRound;i<lastRound;i++){
		if(gameTime[i]){	
		string += "<option value='"+i+"'";
		if( i == selRound ) {
			string += " SELECTED";
		}

		string += ">제 "+i+" 경주</option>\n";

		}
	}
	string += "</select>";		
	document.all.span_select_round.innerHTML = string;
}

// 라운드 변경시 
function changeRound(round){
	with( document.timeform ) {
		var year = game_year.value;
		var month = game_month.value;
		var day = game_day.value;
	}

	// location = "/ticket.php?game_name=<?=$game_name?>&select_day="+year+month+day + "&cur_round=" + round + "&r_round=" + round + "&aname=#2";
	location = "/jp_ticket.php?race_kind=<?=$race_kind?>&select_day="+year+month+day + "&cur_round=" + round ;

	document.frm.round.value = round;
	curRound = round;
	changeRemainClock(round);
	initGameTime(round);
	enableSsang(round);
	curCountPlayer = countPlayer[round];
	initSpan();
	changeExpect(round);
}

// 라운드 변경시 해당라운드의 경기 시각, 남은 시간 변경
function changeRemainClock(round){
//	if( eval( round ) > 0 ) {
		curRemainTime = remainTime[round] - passTime;
//	} else {
//		curRemainTime = remainTime[firstRound] - passTime;
//	}
}


// 경기시각 변경
function initGameTime(round){
//	if( eval( round ) > 0  ) {
		document.all.hour_minute.innerHTML =  " [ "+ raceHour[round] +":"+ raceMinute[round] +" ] ";
//		document.all.RoundNm.innerHTML = "제" + curRound + "경주";
//	} else {
//		document.all.hour_minute.innerHTML = " [제" + firstRound + "경주 " + raceHour[firstRound] +":"+ raceMinute[firstRound] + "] ";
//		document.all.RoundNm.innerHTML = "제" + firstRound + "경주";
//	}
}

// 라운드 변경시 해당라운드의 쌍승식 변경
function enableSsang(round){
}

//예상평 변경


// 승식, 1착, 2착, 금액, 매수, 기권마 초기화
function initSpan(){
	// 승식 초기화
	//for(i=0;i<document.timeform.game_type.length;i++){
	//	document.timeform.game_type[i].checked = false;
	//}

	// 금액 초기화
	
	// default 복승식 기준
	//매수 초기화

	// 기권마 초기화

}

// 승식 선택시 1착, 2착 상태 설정
function chkTicketType(gameType)
{ }

// 삼복승 멀티 체크 가능하도록 작업 2006-01-13
function thirdCheckbox(){
}

function thirdEnable(){
}


function thirdDisable(){
}

// 1착 선택시 같은 선수는 2착에서 선택 불가 (쌍승,복승,복연승)
function chkSecondPlayer(firstPlayer){
}

// 1착 ,2착 선택시 같은 선수는 3착에서 선택 불가 (삼복승)
function chkThirdPlayer(secondPlayer){
}


function initCart(){
	var str = "";
	str += "<select name='ticket_cart' size='10' onDblClick=RemoveOption(this)>\n";
	str += "  <option value='' style='color:white;background:black;'>\n";
	str += "  &nbsp;&nbsp;날짜&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n";
	str += "  경주&nbsp;&nbsp;&nbsp;\n";
	str += "  승식&nbsp;&nbsp;&nbsp;\n";
	str += "  1착&nbsp;\n";
	str += "  2착&nbsp;\n";
	str += "  3착&nbsp;\n";
	str += "  금액&nbsp;&nbsp;&nbsp;&nbsp;\n";
	str += "  매수&nbsp;&nbsp;\n";
	str += "  수수료\n";
	str += "  </option>\n";
	str += "</select>\n";
}


function initMyCart(){
	var str = "";
	str += "<table cellpadding=0 cellspacing=0 border=0 width=606 bgcolor='8FAD1A'>\n";
	str += "<tr>\n";
	str += "<td height=2></td>\n";
	str += "</tr>\n";
	str += "</table>\n";
	str += "<table cellpadding=1 cellspacing=1 border=0 width=606 align=center bgcolor='F6FAB7'>\n";
	str += "<tr bgcolor='#EFEFCE' align=center>\n";
	str += "<td>날짜</td>\n";
	str += "<td>경기</td>\n";
	str += "<td>승식</td>\n";
	str += "<td>1착</td>\n";
	str += "<td>2착</td>\n";
	str += "<td>3착</td>\n";
	str += "<td>금액</td>\n";
	str += "<td>매수</td>\n";
	str += "<td>수수료</td>\n";
	str += "</tr>\n";
	str += "<tr bgcolor='#ffffff'>\n";
	str += "<td colspan=9 align=center>구매내역이 없습니다.</td>\n";
	str += "</tr>\n";
}

function gumplus(mon, j)
{
	var mon1=parseInt(timeform.gum.value);
	mon2=parseInt(mon);
	j=parseInt(j);

	if(timeform.gum.value=='') mon1=0;
	if(timeform.def_money[j].checked==true) mon2=mon2;
	else mon2=-mon2;

	timeform.gum.value=mon1+mon2;
}
</script>
<script language=javascript>
function inputCart(gubun){
//	if( eval( document.timeform.select_round.value ) < 0 ) {
//		alert( "구매하고자하는 경주을 선택하세요!!" );
		
//		return;
//	}
	
	with( document.timeform ) {
		if( remain_time.value == "종료" ) {
			alert( "종료된 경기입니다" );

			location.href = "/ticket/ticket_buy.html";

			return false;
		}
	}

	var game_type = document.timeform.game_type;
	var first_player = document.timeform.first_player;
	var second_player = document.timeform.second_player;
	var third_player = document.timeform.third_player;
	var def_money = document.timeform.def_money;
	var money_count = document.timeform.money_count;

	var ticket_cart = document.cartform.ticket_cart;

	var gameType = "";
	var gameTypes ="";	
	var firstPlayer = "";
	var firstPlayers = new Array();		
	var secondPlayer = new Array();
	var thirdPlayer = new Array();
	defMoney = 0;
	var moneyCount = ""; // 매수
	var commission = "";  // 수수료.

	// 승식 체크
	for(i=0;i<game_type.length;i++){
		if(game_type[i].checked == true){
			gameType = game_type[i].value;
			alert('코드 실행체크 #3 '+gameType);
		}
	}

	if(gameType == ""){
		alert('승식이 선택되지 않았습니다.');
		return false;
	}
	if(gameType =="복조식") {
		gameTypes = "복승식";
	} 
	if(gameType =="쌍조식") {
		gameTypes = "쌍승식";
	}
	

	//베팅금액 체크
	for(i=0 ; i<def_money.length ; i++){
		if(def_money[i].checked == true ){
			defMoney += parseInt(def_money[i].value);
		}
	}

	if(defMoney < 1000){
		alert('구매 가능한 금액은 1천원 이상입니다.');
		return false;
	}

	// 베팅금액 * 구매매수
	bettingMoney = defMoney * parseInt(money_count.value);
//	alert(comma(bettingMoney.toString()));

	cartSize = 0;
	for(i=0;i<ticket_cart.length;i++){
		if(ticket_cart[i].value){
			cartSize++;
		}
	}

	if(gameType == "단승식" || gameType == "연승식" )
	{
		var strValue = "";
		var strText = "";

		j = 0;
		for(i=0 ; i<1 ; i++){
			commission = parseFloat(intCommission) * defMoney;
			// option 의 text값(보이는 값)
			strText = curGameTime.substr(0,8)+"   ";
			strText += curRound+"     ";
			strText += gameType+"    ";
			strText += firstPlayer+"      ";
			strText += " "+"     ";
			strText += " "+"      ";
			strText += String(defMoney)+"      ";
			strText += money_count.value+"      ";
			strText += commission

			// option  의 value 값
			strValue = curGameTime.substr(0,8)+"|";
			strValue += curRound+"|";
			strValue += gameType+"|";
			strValue += firstPlayer+"|";
			strValue += " |";
			strValue += " |";
			strValue += defMoney.toString()+"|";
			strValue += money_count.value+"|";
			strValue += commission;
			j++;
		}

	}
	else if(gameType == "쌍승식" || gameType=="복승식" || gameType=="복연승")
	{
		var strValue = "";
		var strText = "";

		j = 0;

		for(i=0 ; i<secondPlayer.length ; i++){
			commission = parseFloat(intCommission) * defMoney;
			// option 의 text값(보이는 값)
			strText = curGameTime.substr(0,8)+"   ";
			strText += curRound+"     ";
			strText += gameType+"    ";
			strText += firstPlayer+"      ";
			strText += secondPlayer[i]+"     ";
			strText += " "+"      ";
			strText += String(defMoney)+"      ";
			strText += money_count.value+"      ";
			strText += commission;

			// option  의 value 값
			strValue = curGameTime.substr(0,8)+"|";
			strValue += curRound+"|";
			strValue += gameType+"|";
			strValue += firstPlayer+"|";
			strValue += secondPlayer[i]+"|";
			strValue += " |";
			strValue += defMoney.toString()+"|";
			strValue += money_count.value+"|";
			strValue += commission;
				
			j++;

		} // end for
	}
	else if(gameType == "삼복승" )
	{
		// 삼복승 멀티 체크 가능하도록 작업 2006-01-13
		var strValue = "";
		var strText = "";

		j = 0;
		for( k = 0; k < secondPlayer.length; k++ ) {
			for( i = 0; i < thirdPlayer.length; i++ ) {
				commission = parseFloat(intCommission) * defMoney;
				// option 의 text값(보이는 값)
				strText = curGameTime.substr(0,8)+"   ";
				strText += curRound+"     ";
				strText += gameType+"    ";
				strText += firstPlayer+"      ";
				strText += secondPlayer[k]+"     ";
				strText += thirdPlayer[i]+"      ";
				strText += String(defMoney)+"      ";
				strText += money_count.value+"      ";
				strText += commission;
	
				// option  의 value 값
				strValue = curGameTime.substr(0,8)+"|";
				strValue += curRound+"|";
				strValue += gameType+"|";
				strValue += firstPlayer+"|";
				strValue += secondPlayer[k]+"|";
				strValue += thirdPlayer[i]+"|";
				strValue += defMoney.toString()+"|";
				strValue += money_count.value+"|";
				strValue += commission;
					
				j++;
			}
		} // end for
		
	} 	else if(gameType=="복조식")	{
	} 	else if(gameType=="쌍조식")	{
	} // end if(gameType)

	Calculate(gubun);
	initSpan();
	MyCart();
	//winorder();
	alert('반드시 아래의 [구매하기] 버튼을 클릭하여야 구매가 완료됩니다.');
	location.href = "#1";
}// end function

function MyCart(){
	var str = "";
	str += "<table cellpadding=1 cellspacing=1 border=0 width=606 bgcolor='F6FAB7'>";
	str += "<tr align=center bgcolor=#EFEFCE>";
	str += "<td width=10%>날짜</td>";
	str += "<td width=8%>경기</td>";
	str += "<td width=10%>승식</td>";
	str += "<td width=10%>1착</td>";
	str += "<td width=10%>2착</td>";
	str += "<td width=10%>3착</td>";
	str += "<td width=12%>금액</td>";
	str += "<td width=10%>매수</td>";
	str += "<td width=10%>수수료</td>";
	str += "<td width=10%></td>";
	str += "</tr>";

	var ticket_cart = document.cartform.ticket_cart

	if(ticket_cart.length <= 1){			// 구입 내역 없을때
		str += "<td colspan=10 align=center>구매내역이 없습니다.</td>\n";
		str += "</tr>\n";
	}else{									// 구입내역이 있을경우 리스트
		for(i=0 ; i<ticket_cart.length ; i++){
			if(ticket_cart.options[i].value == ""){
				continue;
			}
			strSplit = ticket_cart.options[i].value.split("|");

			str += "<tr align=center bgcolor='#ffffff'>";
			str += "<td>"+strSplit[0]+"</td>";
			str += "<td>"+strSplit[1]+"</td>";
			str += "<td>"+strSplit[2]+"</td>";
			str += "<td>"+strSplit[3]+"</td>";
			str += "<td>"+strSplit[4]+"</td>";
			str += "<td>"+strSplit[5]+"</td>";
			str += "<td align=right>"+strSplit[6]+"&nbsp;원</td>";
			str += "<td>"+strSplit[7]+"</td>";
			str += "<td align=right>"+strSplit[8]+"&nbsp;원</td>";
//			str += "<td onclick='RemoveMyCart("+i+")' style='cursor:hand'><img src=/img/btn_05.gif border=0></td>";
			str += "<td><input type=button value=삭제 onclick='RemoveMyCart("+i+")' style='cursor:hand'></td>";
			str += "</tr>";
		}
	}
	str += "</table>";
	document.all.mycart.innerHTML = str;
	document.all.gum.value = '';     //금액 체크시 금액 합계 초기화
}

// 총배팅금액, 잔액, 수수료 계산.
function Calculate(gubun){
	var form = document.cartform
	var tform = document.timeform;
	var ticket_cart = document.cartform.ticket_cart;
	var str = "";
	bet_money = 0;

	for(i=0 ; i<ticket_cart.length ; i++){
		if(ticket_cart.options[i].value == ""){
			continue;
		}
		strSplit = ticket_cart.options[i].value.split("|");
		intMoney = parseInt(strSplit[6]); // 금액
		intTicketNum = parseInt(strSplit[7]); // 티켓매수
		bet_money = bet_money + (intMoney * intTicketNum);
	}
	commission = bet_money * parseFloat(intCommission);
	form.total_bet_money.value = comma(String(bet_money));
	form.total_commission.value = comma(String(commission));
	form.total_used_money.value = comma(String(bet_money+commission));
	timeform.money_count.value = '1';
/*
	remain_money = userMoney - (bet_money + commission); // 남은 사이버머니
	if(remain_money > 0){
		form.remain_money.value = comma(String(remain_money));
	}else{
		form.remain_money.value = "-" + comma(String(( bet_money + commission) - userMoney));
	}*/

	//remain_money = userMoney - (bet_money + commission); // 남은 사이버머니
	//remain_eventmoney = userEventMoney - (bet_money + commission);
	//remain_totalmoney = userTotalMoney - (bet_money + commission);

	if(gubun == 'eventM') {

		remain_money = userMoney;
		remain_eventmoney = userEventMoney - (bet_money + commission);
		remain_totalmoney = userTotalMoney;
		
		if(remain_eventmoney > 0){
			form.remain_eventmoney.value = comma(String(remain_eventmoney));
		}else{
			form.remain_eventmoney.value = "-" + comma(String(( bet_money + commission) - userEventMoney));
		}
	} else if(gubun == 'bankM') {

		remain_money = userMoney - (bet_money + commission);
		remain_eventmoney = userEventMoney;
		remain_totalmoney = userTotalMoney;

		if(remain_money > 0){
			form.remain_money.value = comma(String(remain_money));
			form.remain_eventmoney.value = comma(String(remain_eventmoney));
			form.remain_totalmoney.value = comma(String(remain_totalmoney));
		}else{
			form.remain_money.value = "-" + comma(String(( bet_money + commission) - userMoney));
		}
	} else {

		remain_money = userMoney;
		remain_eventmoney = userEventMoney;
		remain_totalmoney = userTotalMoney - (bet_money + commission);

		if(remain_totalmoney > 0){
			form.remain_totalmoney.value = comma(String(remain_totalmoney));
		}else{
			form.remain_totalmoney.value = "-" + comma(String(( bet_money + commission) - userTotalMoney));
		}
	}
}


function comma(int_str)
{
	num3 = '';
	k=0;
  
	for(i=int_str.length+2;i>-1;i--)
	{
		if(k%3==0&&k>3)
		{
			num3 = ","+num3;  
		}
		num3=int_str.charAt(i)+num3;
		k++;
	}
	return num3;
}

// 최종 주문. 체크(마감된경기, 구매내역, 잔액)
// 넘겨줄 값 생성
function Order(idx, game_name, gubun){

	var obj = document.cartform.ticket_cart
	var strSplit = new Array();
	var strSpan = "";
	bet_money = 0;

	if(gubun == '') gubun = "bankM";

	with( document.timeform ) {
		if( remain_time.value == "종료" ) {
			alert( "경주가 마감되었습니다 다음 경주로 넘어갑니다" );
			document.cartform.tmpRemainTime.value = remain_time.value;

			location.href = "/ticket.php?idx="+idx+"&game_name="+game_name+"&aname=#2";

			return false;
		}

		document.cartform.tmpRemainTime.value = remain_time.value;
	}

	with( document.cartform ) {
		if( eval( run_page.value ) < 0 ) {
			alert( "지금 처리중입니다. 잠시만 기다려 주세요" );
			
			run_page.value = "-99";
			OrderBnt.value = "처리중";

			return false;
		}
		
		run_page.value = "-99";
		OrderBnt.value = "처리중";
		//OrderBnt.disabled = true;
	}
	
	for(i=1;i<obj.length;i++){
		if(obj.options[i].value == ""){
			continue;
		}
		option_value = obj.options[i].value;
		strSplit = obj.options[i].value.split("|");

		roundNum = parseInt(strSplit[1]);
		intMoney = parseInt(strSplit[6]); // 금액
		intTicketNum = parseInt(strSplit[7]); // 티켓매수

		bet_money = bet_money + (intMoney * intTicketNum);

		strSpan += "<input type=hidden name=OrderInfo[] value='" + option_value + "'>";
		strSpan += "<input type=hidden name=order_gubun value='" + gubun + "'>";


		// 주문도중에 종료된 경기 체크 : 남은경기시간(배열) - 주문중에 흐린 시간.
		//if(remainTime[roundNum] - passTime <= 0){
		if(remainTime[roundNum] <= 0){
			alert('구매도중 '+roundNum+' Round 경기가 마감되었습니다.');

//			document.cartform.run_page.value = 99;
//			document.cartform.OrderBnt.value = "구매하기";
			
			location.href = "/ticket.php?idx="+idx+"&game_name="+game_name+"&aname=#2";
// original
//          location.href = "/ticket/race_ticket.html?idx="+idx+"&game_name="+game_name+"&aname=#2";


//			return false;
			break;
		}
	}
	// 주문내역 체크              
	if(bet_money < 1000){
		alert('구매내역이 없습니다.');
		
		document.cartform.run_page.value = 99;
		document.cartform.OrderBnt.value = "구매하기";
		
		return false;
	}

	commission = bet_money * parseFloat(intCommission);
	remain_money = userMoney - (bet_money + parseInt(commission));

	// 잔액 체크
	if(gubun == 'eventM') {

		if(remain_eventmoney < 0) {
			alert("회원님이 보유하신 이벤트머니를 초과하여 경주권 구매를 하셨습니다.\n\n 현금을 입금하신 후 경주권 구매를 하시거나 보유하신 이벤트머니 한도내에서 구매하시기 바랍니다.");

			document.cartform.run_page.value = 99;
			document.cartform.OrderBnt.value = "구매하기";

			return false;
		}	
	} else if(gubun == 'bankM') {

		if(remain_money < 0){
			alert("회원님이 보유하신 현금머니를 초과하여 경주권 구매를 하셨습니다\n\n현금을 입금하신후 경주권구매를 하시기 바라며 이벤트머니를 보유하고 계시면 이벤트머니로 경주권구매를 하시기 바랍니다");

			document.cartform.run_page.value = 99;
			document.cartform.OrderBnt.value = "구매하기";

			return false;
		}
	} 
	strSpan += "<input type=hidden name=race_kind value='"+game_name+"'>";	// 게임네임
	strSpan += "<input type=hidden name=money_type value='"+money_type+"'>";	// 모의베팅

	document.all.sendValue.innerHTML = strSpan;

	document.cartform.action = "/ticket_ok.php?idx="+idx+"&game_name="+game_name;
	document.cartform.submit();
}
</script>
