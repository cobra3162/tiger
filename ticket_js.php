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
var game_name = "<?=game_name?>"
var money_type = "real"

<?

$sqlgame = "select * from raceinput where race_date='$race_date'  and race_kind='$race_kind' ";
//echo $sqlgame;
$rowgame = sql_fetch($sqlgame);

$num_race = $rowgame[num_race];
//echo "num_game = $num_race";

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
 

// $remaintime = mktime(${$hr_imsi},${$min_imsi},0,$month,$day,$year) - time() ;

 $remaintime = mktime(${$hr_imsi},${$min_imsi},0,$month,$day,$year) - time() ;

// echo "gameday = $gameday"; 
 
 if ($gamestarttime > $timenow)
 {
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

 }
?>

//if (!round) round = "<?=$startround?>";
var firstRound = <?=$startround?>;
var selRound = "<?=$startround?>";
var lastRound = remainTime.length;

var curRound = "<?=$startround?>";
var curGameTime = gameTime[<?=$startround?>];
var curRaceHour = raceHour[<?=$startround?>];
var curRaceMinute = raceMinute[<?=$startround?>];
var curRemainTime = remainTime[<?=$startround?>];
var curCountPlayer = countPlayer[<?=$startround?>];
var maxPlayer = countPlayer[<?=$startround?>];
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

// ��¥ �����
function changeDate(){
	var form = document.timeform;
	var year = form.game_year.value;
	var month = form.game_month.value;
	var day = form.game_day.value;

	location = "/ticket.php?game_name=<?=$game_name?>&select_day="+year+month+day;
}

// ������ Ŭ����
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

//	document.all.expect.innerHTML = str;  // ��ưǥ�ø� ����
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
			alert('�̺�Ʈ�Ӵϰ� 1000�� �̻��� ��쿡�� ���Ÿ� �Ͻ� �� �ֽ��ϴ�');
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
// onload �� �ʱ�ȭ.  ������ ����.
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
	document.cartform.remain_money.value = comma(String(userMoney));
//	document.all.RoundNm.innerHTML = "��" + firstRound + "����";
	//document.all.round11.value = cur_Round;
}

// ���� �ð� ǥ��
function remain_time_input_box(){
	var remain_times = "";
	var g_name = "<?=$game_name?>";
	var g_round = "1"

	//remain_seconds = curRemainTime+50;
	remain_seconds = curRemainTime;

	if(g_name == 't01') g_str = "�̻縮����";
	if(g_name == 'h01') g_str = "��õ�渶";
	if(g_name == 'h02') g_str = "���ְ渶";
	if(g_name == 'h03') g_str = "�λ�渶";
	if(g_name == 'k01') g_str = "������";
	if(g_name == 'k02') g_str = "â�����";
	if(g_name == 'k03') g_str = "�λ���";

	if ( (remain_seconds/86400) >= 1)  
	{
		remain_times = remain_times + Math.floor(remain_seconds/86400) + "�� ";
	}

	if ( (remain_seconds%86400)/3600 >= 1)  
	{
		remain_times = remain_times + Math.floor((remain_seconds%86400)/3600) + "�ð� ";
	}

	if ( (remain_seconds%3600)/60 >= 1)  
	{
		remain_times = remain_times + Math.floor((remain_seconds%3600)/60) + "�� ";
	}

	if ( ((remain_seconds%60)/60 >=0) && (remain_seconds != "") )  
	{
		remain_times = remain_times + Math.floor(remain_seconds%60) + "��";
	}
	else
	{
		remain_times = "����";
		document.timeform.remain_time.value = remain_times;

/*		if(remain_times == '����') {
			alert( g_str+" ��" + g_round + " ���ְ� �����Ǿ����ϴ�" );
			location.replace( "/ticket.php?game_name="+g_name );
		}
*/
	}
	
	curRemainTime--;  // ���� �ð�
	passTime++;		  // ������������ �����¿��� ������ �ð�
	document.timeform.remain_time.value = remain_times;
	if(remain_times != '����') {
	setTimeout("remain_time_input_box()",1000);
	}
}

// ���� ��¥ �ʱ�ȭ
function initSelect()
{
	var g_name = "<?=$game_name?>";
	var string = "<select name='select_round' onchange='changeRound(this.value)'>\n";
	
//	string += "<option value='-1'>���ָ� �����ϼ���</option>\n";
	
	for(i=firstRound;i<lastRound;i++){
		if(gameTime[i]){	
		string += "<option value='"+i+"'";
		if( i == selRound ) {
			string += " SELECTED";
		}

		string += ">�� "+i+" ����</option>\n";

		}
	}
	string += "</select>";		
	document.all.span_select_round.innerHTML = string;
}

// ���� ����� 
function changeRound(round){
	with( document.timeform ) {
		var year = game_year.value;
		var month = game_month.value;
		var day = game_day.value;
	}

	// location = "/ticket.php?game_name=<?=$game_name?>&select_day="+year+month+day + "&cur_round=" + round + "&r_round=" + round + "&aname=#2";
	curRound = round;
	changeRemainClock(round);
	initGameTime(round);
	enableSsang(round);
	curCountPlayer = countPlayer[round];
	initSpan();
	changeExpect(round);
}

// ���� ����� �ش������ ��� �ð�, ���� �ð� ����
function changeRemainClock(round){
//	if( eval( round ) > 0 ) {
		curRemainTime = remainTime[round] - passTime;
//	} else {
//		curRemainTime = remainTime[firstRound] - passTime;
//	}
}


// ���ð� ����
function initGameTime(round){
//	if( eval( round ) > 0  ) {
		document.all.hour_minute.innerHTML =  " [ "+ raceHour[round] +":"+ raceMinute[round] +" ] ";
//		document.all.RoundNm.innerHTML = "��" + curRound + "����";
//	} else {
//		document.all.hour_minute.innerHTML = " [��" + firstRound + "���� " + raceHour[firstRound] +":"+ raceMinute[firstRound] + "] ";
//		document.all.RoundNm.innerHTML = "��" + firstRound + "����";
//	}
}


// ���� ����� �ش������ �ֽ½� ����
function enableSsang(round){
	if(ssang[round] == "ssang"){
		document.all.game_type[2].disabled = true;
	}else{
		document.all.game_type[2].disabled = false;
	}
}

//������ ����


// �½�, 1��, 2��, �ݾ�, �ż�, ��Ǹ� �ʱ�ȭ
function initSpan(){
	// �½� �ʱ�ȭ
	//for(i=0;i<document.timeform.game_type.length;i++){
	//	document.timeform.game_type[i].checked = false;
	//}
	for(i=0 ; i < curCountPlayer ; i++){
		eval("document.all.span_first_player["+i+"]").innerHTML = "<b style='color:red'><input type='radio' name='first_player' value='"+(i+1)+"' ></b>";
	}

  // ���������������� �������� ����
	for(i=curCountPlayer ; i < maxPlayer ; i++){
		eval("document.all.span_first_player["+i+"]").innerHTML = "&nbsp;";
	}

  // �������� ����
	for(i=0 ; i < curCountPlayer ; i++){
		eval("document.all.span_second_player["+i+"]").innerHTML = "<b style='color:red'><input type='checkbox' name='second_player' value='"+(i+1)+"' ></b>";
	}

  // ���������������� �������� ����
	for(i=curCountPlayer ; i < maxPlayer ; i++){
		eval("document.all.span_second_player["+i+"]").innerHTML = "&nbsp;";
	}

  // �������� ����
	for(i=0 ; i < curCountPlayer ; i++){
		eval("document.all.span_third_player["+i+"]").innerHTML = "<b style='color:red'><input type='radio' name='third_player' value='"+(i+1)+"' ></b>";
	}

  // ���������������� �������� ����
	for(i=curCountPlayer ; i < maxPlayer ; i++){
		eval("document.all.span_third_player["+i+"]").innerHTML = "&nbsp;";
	}

	// �ݾ� �ʱ�ȭ
	var def_money = document.timeform.def_money;
	for(i=0;i<def_money.length;i++){
		def_money[i].checked = false;
	}
	
	// default ���½� ����
	firstRadio();
	firstEnable();			
	secondCheckbox();
	secondEnable();
	thirdRadio();
	thirdDisable()
	//�ż� �ʱ�ȭ

	// ��Ǹ� �ʱ�ȭ

}


// �½� ���ý� 1��, 2�� ���� ����
function chkTicketType(gameType)
{
	switch(gameType){
		case "�ܽ½�" :
			firstRadio();		// 1�� ����
			secondDisable();	// 2�� ���Ұ�
			thirdRadio();
			thirdDisable()
			break;

		case "���½�" :
			firstRadio();
			secondDisable();
			thirdRadio();
			thirdDisable()
			break;


		case "�ֽ½�" :
			firstRadio();
			firstEnable();			
			secondCheckbox();	//2�� üũ�ڽ�
			secondEnable();		//2�� ��밡��
			thirdRadio();
			thirdDisable()
			break;

		case "���½�" :
			firstRadio();
			firstEnable();			
			secondCheckbox();
			secondEnable();
			thirdRadio();
			thirdDisable()
			break;

		case "�ﺹ��" :
			firstRadio();
			firstEnable();		
			secondRadio();
			secondEnable();
			thirdCheckbox();
			//thirdRadio();
			thirdEnable();
			break;

		case "������" :
			firstRadio();
			firstEnable();				
			secondCheckbox();
			secondEnable();
			thirdDisable();
			break;


		case "������" :
			firstRadio();
			firstDisable();
			secondCheckbox();
			secondEnable();
			thirdRadio();
			thirdDisable();
			break;
			
		case "������" :
			firstRadio();
			firstDisable();
			secondCheckbox();
			secondEnable();
			thirdRadio();
			thirdDisable();
			break;
	}
}


function firstRadio(){
	for(i=0;i<curCountPlayer;i++){
		eval("document.all.span_first_player["+i+"]").innerHTML = "<b style='color:red'><input type='radio' name='first_player' value='"+(i+1)+"' onclick='chkSecondPlayer(this.value);'></b>";
	}
}
// # ����,���� �߰��κ� 2005.0425.
function firstEnable(){
	for(i=0; i < curCountPlayer ; i++){
		eval("document.all.span_first_player["+i+"]").checked = false;
		eval("document.all.span_first_player["+i+"]").disabled = false;
	}      
}
function firstDisable(){
	for(i=0; i < curCountPlayer ; i++){
		eval("document.all.span_first_player["+i+"]").checked = false;
		eval("document.all.span_first_player["+i+"]").disabled = true;
	}      
}

function secondCheckbox(){
	for(i=0;i<curCountPlayer;i++){
		eval("document.all.span_second_player["+i+"]").innerHTML = "<b style='color:red'><input type='checkbox' name='second_player' value='"+(i+1)+"'></b>";
	}
}


function secondRadio(){
	for(i=0;i<curCountPlayer;i++){
		eval("document.all.span_second_player["+i+"]").innerHTML = "<b style='color:red'><input type='radio' name='second_player' value='"+(i+1)+"' onclick='chkThirdPlayer(this.value);'></b>";
	}
}


function secondEnable(){
	for(i=0; i < curCountPlayer ; i++){
		eval("document.all.span_second_player["+i+"]").checked = false;
		eval("document.all.span_second_player["+i+"]").disabled = false;
	}      
}


function secondDisable(){
	for(i=0; i < curCountPlayer ; i++){
		eval("document.all.span_second_player["+i+"]").checked = false;
		eval("document.all.span_second_player["+i+"]").disabled = true;
	}      
}

function thirdRadio(){
	for(i=0;i<curCountPlayer;i++){
		eval("document.all.span_third_player["+i+"]").innerHTML = "<b style='color:red'><input type='radio' name='third_player' value='"+(i+1)+"' ></b>";
	}
}

// �ﺹ�� ��Ƽ üũ �����ϵ��� �۾� 2006-01-13
function thirdCheckbox(){
	for(i=0;i<curCountPlayer;i++){
		eval("document.all.span_third_player["+i+"]").innerHTML = "<b style='color:red'><input type='checkbox' name='third_player' value='"+(i+1)+"' ></b>";
	}
}

function thirdEnable(){
	for(i=0; i < curCountPlayer ; i++){
		eval("document.all.span_third_player["+i+"]").checked = false;
		eval("document.all.span_third_player["+i+"]").disabled = false;
	}      
}


function thirdDisable(){
	for(i=0; i < curCountPlayer ; i++){
		eval("document.all.span_third_player["+i+"]").checked = false;
		eval("document.all.span_third_player["+i+"]").disabled = true;
	}      
}

// 1�� ���ý� ���� ������ 2������ ���� �Ұ� (�ֽ�,����,������)
function chkSecondPlayer(firstPlayer){
	disSecondPlayer = firstPlayer - 1
	for(i=0 ; i<curCountPlayer ; i++){
		eval("document.timeform.second_player["+i+"]").checked = false;
		eval("document.timeform.second_player["+i+"]").disabled = false;
		eval("document.timeform.third_player["+i+"]").checked = false;
		eval("document.timeform.third_player["+i+"]").disabled = false;
	}
	document.timeform.second_player[disSecondPlayer].disabled = true;
	document.timeform.third_player[disSecondPlayer].disabled = true;
}

// 1�� ,2�� ���ý� ���� ������ 3������ ���� �Ұ� (�ﺹ��)
function chkThirdPlayer(secondPlayer){
	disThirdPlayer = secondPlayer - 1
	for(i=0 ; i<curCountPlayer ; i++){
		if(document.timeform.first_player[i].checked == true){
			disSecondPlayer = i;
		}
		eval("document.timeform.third_player["+i+"]").checked = false;
		eval("document.timeform.third_player["+i+"]").disabled = false;
	}
	document.timeform.third_player[disThirdPlayer].disabled = true;
	document.timeform.third_player[disSecondPlayer].disabled = true;
}


function initCart(){
	var str = "";
	str += "<select name='ticket_cart' size='10' onDblClick=RemoveOption(this)>\n";
	str += "  <option value='' style='color:white;background:black;'>\n";
	str += "  &nbsp;&nbsp;��¥&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n";
	str += "  ����&nbsp;&nbsp;&nbsp;\n";
	str += "  �½�&nbsp;&nbsp;&nbsp;\n";
	str += "  1��&nbsp;\n";
	str += "  2��&nbsp;\n";
	str += "  3��&nbsp;\n";
	str += "  �ݾ�&nbsp;&nbsp;&nbsp;&nbsp;\n";
	str += "  �ż�&nbsp;&nbsp;\n";
	str += "  ������\n";
	str += "  </option>\n";
	str += "</select>\n";
	document.all.cart.innerHTML = str;
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
	str += "<td>��¥</td>\n";
	str += "<td>���</td>\n";
	str += "<td>�½�</td>\n";
	str += "<td>1��</td>\n";
	str += "<td>2��</td>\n";
	str += "<td>3��</td>\n";
	str += "<td>�ݾ�</td>\n";
	str += "<td>�ż�</td>\n";
	str += "<td>������</td>\n";
	str += "</tr>\n";
	str += "<tr bgcolor='#ffffff'>\n";
	str += "<td colspan=9 align=center>���ų����� �����ϴ�.</td>\n";
	str += "</tr>\n";
	
	document.all.mycart.innerHTML = str;
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
//		alert( "�����ϰ����ϴ� ������ �����ϼ���!!" );
		
//		return;
//	}
	
	with( document.timeform ) {
		if( remain_time.value == "����" ) {
			alert( "����� ����Դϴ�" );

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
	var moneyCount = ""; // �ż�
	var commission = "";  // ������.

	// �½� üũ
	for(i=0;i<game_type.length;i++){
		if(game_type[i].checked == true){
			gameType = game_type[i].value;
		}
	}

	if(gameType == ""){
		alert('�½��� ���õ��� �ʾҽ��ϴ�.');
		return false;
	}
	if(gameType =="������") {
		gameTypes = "���½�";
	} 
	if(gameType =="������") {
		gameTypes = "�ֽ½�";
	}
		
	// 1�� üũ
	if(gameType != "������" && gameType != "������") {
		for(i=0;i<first_player.length;i++){
		if(first_player[i].checked == true){
			firstPlayer = first_player[i].value;
		}
	}	
		if(firstPlayer == ""){
			alert('1�������� ���õ��� �ʾҽ��ϴ�.');
			return false;
		}	
		
	} else {
	j=0;
	for(i=0;i<second_player.length;i++){
		if(second_player[i].checked == true) {
				firstPlayers[j] = second_player[i].value;
				j++;
			}
		}
		
		if(firstPlayers.length <2) {
			alert('������ �� �������� ������ȣ�� �ּ� 2�� �̻� ���� �մϴ�.' );
			return false;
		}
	}	

	// 2�� üũ(�ֽ�,����,������)
	if(gameType == "�ֽ½�" || gameType == "���½�" || gameType == "������" || gameType == "�ﺹ��"){
		j = 0;
		for(i=0;i<second_player.length;i++){
			if(second_player[i].checked == true){
				secondPlayer[j] = second_player[i].value;
				j++;
			}
		}
		if(secondPlayer == ""){
			alert('2�������� ���õ��� �ʾҽ��ϴ�.');
			return false;
		}
	}

	if(gameType == "�ﺹ��"){
		j = 0;
		for(i=0;i<third_player.length;i++){
			if(third_player[i].checked == true){
				thirdPlayer[j] = third_player[i].value;
				j++;
			}
		}
		if(thirdPlayer == ""){
			alert('3�������� ���õ��� �ʾҽ��ϴ�.');
			return false;
		}
	}


	//���ñݾ� üũ
	for(i=0 ; i<def_money.length ; i++){
		if(def_money[i].checked == true ){
			defMoney += parseInt(def_money[i].value);
		}
	}

	if(defMoney < 1000){
		alert('���� ������ �ݾ��� 1õ�� �̻��Դϴ�.');
		return false;
	}

	// ���ñݾ� * ���Ÿż�
	bettingMoney = defMoney * parseInt(money_count.value);
//	alert(comma(bettingMoney.toString()));

	cartSize = 0;
	for(i=0;i<ticket_cart.length;i++){
		if(ticket_cart[i].value){
			cartSize++;
		}
	}

	if(gameType == "�ܽ½�" || gameType == "���½�" )
	{
		var strValue = "";
		var strText = "";

		j = 0;
		for(i=0 ; i<1 ; i++){
			commission = parseFloat(intCommission) * defMoney;
			// option �� text��(���̴� ��)
			strText = curGameTime.substr(0,8)+"   ";
			strText += curRound+"     ";
			strText += gameType+"    ";
			strText += firstPlayer+"      ";
			strText += " "+"     ";
			strText += " "+"      ";
			strText += String(defMoney)+"      ";
			strText += money_count.value+"      ";
			strText += commission

			// option  �� value ��
			strValue = curGameTime.substr(0,8)+"|";
			strValue += curRound+"|";
			strValue += gameType+"|";
			strValue += firstPlayer+"|";
			strValue += " |";
			strValue += " |";
			strValue += defMoney.toString()+"|";
			strValue += money_count.value+"|";
			strValue += commission;
			
			document.cartform.ticket_cart.options[cartSize+j+1] = new Option(strText, strValue);
			j++;
		}

	}
	else if(gameType == "�ֽ½�" || gameType=="���½�" || gameType=="������")
	{
		var strValue = "";
		var strText = "";

		j = 0;
		for(i=0 ; i<secondPlayer.length ; i++){
			commission = parseFloat(intCommission) * defMoney;
			// option �� text��(���̴� ��)
			strText = curGameTime.substr(0,8)+"   ";
			strText += curRound+"     ";
			strText += gameType+"    ";
			strText += firstPlayer+"      ";
			strText += secondPlayer[i]+"     ";
			strText += " "+"      ";
			strText += String(defMoney)+"      ";
			strText += money_count.value+"      ";
			strText += commission;

			// option  �� value ��
			strValue = curGameTime.substr(0,8)+"|";
			strValue += curRound+"|";
			strValue += gameType+"|";
			strValue += firstPlayer+"|";
			strValue += secondPlayer[i]+"|";
			strValue += " |";
			strValue += defMoney.toString()+"|";
			strValue += money_count.value+"|";
			strValue += commission;
				
			document.cartform.ticket_cart.options[cartSize+j+1] = new Option(strText, strValue);
			j++;

		} // end for
	}
	else if(gameType == "�ﺹ��" )
	{
		// �ﺹ�� ��Ƽ üũ �����ϵ��� �۾� 2006-01-13
		var strValue = "";
		var strText = "";

		j = 0;
		for( k = 0; k < secondPlayer.length; k++ ) {
			for( i = 0; i < thirdPlayer.length; i++ ) {
				commission = parseFloat(intCommission) * defMoney;
				// option �� text��(���̴� ��)
				strText = curGameTime.substr(0,8)+"   ";
				strText += curRound+"     ";
				strText += gameType+"    ";
				strText += firstPlayer+"      ";
				strText += secondPlayer[k]+"     ";
				strText += thirdPlayer[i]+"      ";
				strText += String(defMoney)+"      ";
				strText += money_count.value+"      ";
				strText += commission;
	
				// option  �� value ��
				strValue = curGameTime.substr(0,8)+"|";
				strValue += curRound+"|";
				strValue += gameType+"|";
				strValue += firstPlayer+"|";
				strValue += secondPlayer[k]+"|";
				strValue += thirdPlayer[i]+"|";
				strValue += defMoney.toString()+"|";
				strValue += money_count.value+"|";
				strValue += commission;
					
				document.cartform.ticket_cart.options[cartSize+j+1] = new Option(strText, strValue);
				j++;
			}
		} // end for
		
	} 	else if(gameType=="������")	{
		
		var strValue = "";
		var strText = "";

		j = 0; k= 0;
		for(l=0 ; l<firstPlayers.length ; l++){
		
			for(m=l+1; m<firstPlayers.length; m++){
				
						commission = parseFloat(intCommission) * defMoney;
			// option �� text��(���̴� ��)
			strText = curGameTime.substr(0,8)+"   ";
			strText += curRound+"     ";
			strText += gameTypes+"    ";
			strText += firstPlayers[l]+"      ";
			strText += firstPlayers[m]+"     ";
			strText += " "+"      ";
			strText += String(defMoney)+"      ";
			strText += money_count.value+"      ";
			strText += commission;

			// option  �� value ��
			strValue = curGameTime.substr(0,8)+"|";
			strValue += curRound+"|";
			strValue += gameTypes+"|";
			strValue += firstPlayers[l]+"|";
			strValue += firstPlayers[m]+"|";
			strValue += " |";
			strValue += defMoney.toString()+"|";
			strValue += money_count.value+"|";
			strValue += commission;
				
			document.cartform.ticket_cart.options[cartSize+j+1] = new Option(strText, strValue);
			j++;
		 	}
		} // end for
	} 	else if(gameType=="������")	{
		
		var strValue = "";
		var strText = "";

		j = 0; k= 0;
		for(l=0 ; l<firstPlayers.length ; l++){		
			for(m=0; m<firstPlayers.length; m++){				
				if(l != m) {
					commission = parseFloat(intCommission) * defMoney;
					// option �� text��(���̴� ��)
					strText = curGameTime.substr(0,8)+"   ";
					strText += curRound+"     ";
					strText += gameTypes+"    ";
					strText += firstPlayers[l]+"      ";
					strText += firstPlayers[m]+"     ";
					strText += " "+"      ";
					strText += String(defMoney)+"      ";
					strText += money_count.value+"      ";
					strText += commission;
		
					// option  �� value ��
					strValue = curGameTime.substr(0,8)+"|";
					strValue += curRound+"|";
					strValue += gameTypes+"|";
					strValue += firstPlayers[l]+"|";
					strValue += firstPlayers[m]+"|";
					strValue += " |";
					strValue += defMoney.toString()+"|";
					strValue += money_count.value+"|";
					strValue += commission;
						
					document.cartform.ticket_cart.options[cartSize+j+1] = new Option(strText, strValue);
					j++;
				}
		  	}
		} // end for		
	} // end if(gameType)

	Calculate(gubun);
	initSpan();

	firstRadio();
	secondCheckbox();
	secondEnable();
	MyCart();
	//winorder();
	alert('�ݵ�� �Ʒ��� [�����ϱ�] ��ư�� Ŭ���Ͽ��� ���Ű� �Ϸ�˴ϴ�.');
	location.href = "#1";
}// end function


    /*function winorder(){
		//window.open('/Admin/member/member_info.php?Id='+id, '', '');
		var settings  ='height=200,';
        settings +='width=300, ';
		settings +='resizable=no';
		win=window.open('/race/order.html', 'w1',settings);
	}*/



function MyCart(){
	var str = "";
	str += "<table cellpadding=0 cellspacing=0 border=0 width=606 bgcolor='8FAD1A'>";
	str += "<tr>";
	str += "<td height=2></td>";
	str += "</tr>";
	str += "</table>";
	str += "<table cellpadding=1 cellspacing=1 border=0 width=606 bgcolor='F6FAB7'>";
	str += "<tr align=center bgcolor=#EFEFCE>";
	str += "<td width=10%>��¥</td>";
	str += "<td width=8%>���</td>";
	str += "<td width=10%>�½�</td>";
	str += "<td width=10%>1��</td>";
	str += "<td width=10%>2��</td>";
	str += "<td width=10%>3��</td>";
	str += "<td width=12%>�ݾ�</td>";
	str += "<td width=10%>�ż�</td>";
	str += "<td width=10%>������</td>";
	str += "<td width=10%></td>";
	str += "</tr>";

	var ticket_cart = document.cartform.ticket_cart

	if(ticket_cart.length <= 1){			// ���� ���� ������
		str += "<tr bgcolor='#ffffff'>\n";
		str += "<td colspan=10 align=center>���ų����� �����ϴ�.</td>\n";
		str += "</tr>\n";

	}else{									// ���Գ����� ������� ����Ʈ

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
			str += "<td align=right>"+strSplit[6]+"&nbsp;��</td>";
			str += "<td>"+strSplit[7]+"</td>";
			str += "<td align=right>"+strSplit[8]+"&nbsp;��</td>";
//			str += "<td onclick='RemoveMyCart("+i+")' style='cursor:hand'><img src=/img/btn_05.gif border=0></td>";
			str += "<td><input type=button value=���� onclick='RemoveMyCart("+i+")' style='cursor:hand'></td>";
			str += "</tr>";
		}
	}
	str += "</table>";
	document.all.mycart.innerHTML = str;
	document.all.gum.value = '';     //�ݾ� üũ�� �ݾ� �հ� �ʱ�ȭ
}


// ��ٱ��Ͽ��� ����
function RemoveMyCart(val){
	var obj = document.cartform.ticket_cart
	for(i=1 ; i < obj.length ; i++){
		if(i == val){
			obj.options[i].value = null;
			obj.options[i].text = null;
			obj.options[i] = null;
		}    
	}
	Calculate();
	MyCart();
}

function RemoveMyCart1(){
	var obj = document.cartform.ticket_cart
    
	while(i==obj.length)
	{
		i=1;
		//if(i == val){
			//alert(obj.options[i].text);
			obj.options[i].value = null;
			obj.options[i].text = null;
			obj.options[i] = null;
			
		//} 
	i=i+1;
	Calculate();
	MyCart();
	}

	/*for(i=1 ; i < obj.length ; i++){
		//alert(obj.length);
		//if(i == val){
			obj.options[i].value = null;
			obj.options[i].text = null;
			obj.options[i] = null;
		//} 
	Calculate();
	MyCart();
	
	}*/
}


function RemoveOption(obj){
	for(i=1 ; i < obj.length ; i++){
    // ���õǾ� �ִ°͸� ������Ų��.
		if(obj.options[i].selected == true){
		  //alert(obj.options[i].value);
			obj.options[i].value = null;
			obj.options[i].text = null;
			obj.options[i] = null;
		}    
	}
	Calculate();
}

// �ѹ��ñݾ�, �ܾ�, ������ ���.
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
		intMoney = parseInt(strSplit[6]); // �ݾ�
		intTicketNum = parseInt(strSplit[7]); // Ƽ�ϸż�
		bet_money = bet_money + (intMoney * intTicketNum);
	}
	commission = bet_money * parseFloat(intCommission);
	form.total_bet_money.value = comma(String(bet_money));
	form.total_commission.value = comma(String(commission));
	form.total_used_money.value = comma(String(bet_money+commission));
	timeform.money_count.value = '1';
/*
	remain_money = userMoney - (bet_money + commission); // ���� ���̹��Ӵ�
	if(remain_money > 0){
		form.remain_money.value = comma(String(remain_money));
	}else{
		form.remain_money.value = "-" + comma(String(( bet_money + commission) - userMoney));
	}*/

	//remain_money = userMoney - (bet_money + commission); // ���� ���̹��Ӵ�
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

// ���� �ֹ�. üũ(�����Ȱ��, ���ų���, �ܾ�)
// �Ѱ��� �� ����
function Order(idx, game_name, gubun){

	var obj = document.cartform.ticket_cart
	var strSplit = new Array();
	var strSpan = "";
	bet_money = 0;

	if(gubun == '') gubun = "bankM";

	with( document.timeform ) {
		if( remain_time.value == "����" ) {
			alert( "���ְ� �����Ǿ����ϴ� ���� ���ַ� �Ѿ�ϴ�" );
			document.cartform.tmpRemainTime.value = remain_time.value;

			location.href = "/ticket.php?idx="+idx+"&game_name="+game_name+"&aname=#2";

			return false;
		}

		document.cartform.tmpRemainTime.value = remain_time.value;
	}

	with( document.cartform ) {
		if( eval( run_page.value ) < 0 ) {
			alert( "���� ó�����Դϴ�. ��ø� ��ٷ� �ּ���" );
			
			run_page.value = "-99";
			OrderBnt.value = "ó����";

			return false;
		}
		
		run_page.value = "-99";
		OrderBnt.value = "ó����";
		//OrderBnt.disabled = true;
	}
	
	for(i=1;i<obj.length;i++){
		if(obj.options[i].value == ""){
			continue;
		}
		option_value = obj.options[i].value;
		strSplit = obj.options[i].value.split("|");

		roundNum = parseInt(strSplit[1]);
		intMoney = parseInt(strSplit[6]); // �ݾ�
		intTicketNum = parseInt(strSplit[7]); // Ƽ�ϸż�

		bet_money = bet_money + (intMoney * intTicketNum);

/*
		race_date = parseInt(strSplit[0]);
		raceno =    parseInt(strSplit[1]);
		game_type = strSplit[2];
		sel01 = parseInt(strSplit[3]);
		sel02 = parseInt(strSplit[4]);
		sel03 = parseInt(strSplit[5]);
		amount = parseInt(strSplit[6]);
		ea = parseInt(strSplit[7]);
		commission = parseInt(strSplit[8]);
*/

		strSpan += "<input type=hidden name=OrderInfo[] value='" + option_value + "'>";
		strSpan += "<input type=hidden name=order_gubun value='" + gubun + "'>";

/*
		strSpan += "<input type=hidden name=OrderInfo[] value='" + option_value + "'>";
		strSpan += "<input type=hidden name=order_gubun value='" + gubun + "'>";
		strSpan += "<input type=hidden name=race_date value='" + race_date + "'>";
		strSpan += "<input type=hidden name=raceno value='" + raceno + "'>";
		strSpan += "<input type=hidden name=game_type value='" + game_type + "'>";
		strSpan += "<input type=hidden name=sel01 value='" + sel01 + "'>";
		strSpan += "<input type=hidden name=sel02 value='" + sel02 + "'>";
		strSpan += "<input type=hidden name=sel03 value='" + sel03 + "'>";
		strSpan += "<input type=hidden name=amount value='" + amount + "'>";
		strSpan += "<input type=hidden name=ea value='" + ea + "'>";
		strSpan += "<input type=hidden name=commission value='" + commission + "'>";
*/

		// �ֹ����߿� ����� ��� üũ : �������ð�(�迭) - �ֹ��߿� �帰 �ð�.
		//if(remainTime[roundNum] - passTime <= 0){
		if(remainTime[roundNum] <= 0){
			alert('���ŵ��� '+roundNum+' Round ��Ⱑ �����Ǿ����ϴ�.');

//			document.cartform.run_page.value = 99;
//			document.cartform.OrderBnt.value = "�����ϱ�";
			
			location.href = "/ticket.php?idx="+idx+"&game_name="+game_name+"&aname=#2";
// original
//          location.href = "/ticket/race_ticket.html?idx="+idx+"&game_name="+game_name+"&aname=#2";


//			return false;
			break;
		}
	}
	// �ֹ����� üũ              
	if(bet_money < 1000){
		alert('���ų����� �����ϴ�.');
		
		document.cartform.run_page.value = 99;
		document.cartform.OrderBnt.value = "�����ϱ�";
		
		return false;
	}

	commission = bet_money * parseFloat(intCommission);
	remain_money = userMoney - (bet_money + parseInt(commission));

	// �ܾ� üũ
	if(gubun == 'eventM') {

		if(remain_eventmoney < 0) {
			alert("ȸ������ �����Ͻ� �̺�Ʈ�Ӵϸ� �ʰ��Ͽ� ���ֱ� ���Ÿ� �ϼ̽��ϴ�.\n\n ������ �Ա��Ͻ� �� ���ֱ� ���Ÿ� �Ͻðų� �����Ͻ� �̺�Ʈ�Ӵ� �ѵ������� �����Ͻñ� �ٶ��ϴ�.");

			document.cartform.run_page.value = 99;
			document.cartform.OrderBnt.value = "�����ϱ�";

			return false;
		}	
	} else if(gubun == 'bankM') {

		if(remain_money < 0){
			alert("ȸ������ �����Ͻ� ���ݸӴϸ� �ʰ��Ͽ� ���ֱ� ���Ÿ� �ϼ̽��ϴ�\n\n������ �Ա��Ͻ��� ���ֱǱ��Ÿ� �Ͻñ� �ٶ�� �̺�Ʈ�Ӵϸ� �����ϰ� ��ø� �̺�Ʈ�ӴϷ� ���ֱǱ��Ÿ� �Ͻñ� �ٶ��ϴ�");

			document.cartform.run_page.value = 99;
			document.cartform.OrderBnt.value = "�����ϱ�";

			return false;
		}
	} 
	/*
	else {

		if(remain_totalmoney < 0) {
			alert("ȸ������ �����Ͻ� ���ݸӴϳ� �̺�Ʈ�Ӵϸ� �ʰ��Ͽ� ���ֱ� ���Ÿ� �ϼ̽��ϴ�.\n\n �����Ͻ� �Ӵ� �ѵ������� �����Ͻñ� �ٶ��ϴ�.");

			document.cartform.run_page.value = 99;
			document.cartform.OrderBnt.value = "�����ϱ�";

			return false;
		}	
	}
	*/

	strSpan += "<input type=hidden name=race_kind value='"+game_name+"'>";	// ���ӳ���
	strSpan += "<input type=hidden name=money_type value='"+money_type+"'>";	// ���Ǻ���

	document.all.sendValue.innerHTML = strSpan;

	document.cartform.action = "/ticket_ok.php?idx="+idx+"&game_name="+game_name;
	document.cartform.submit();
}
</script>
