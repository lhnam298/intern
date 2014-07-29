function ConfirmDelete(){
	return confirm("Bạn chắc chắn muốn xóa?");
}

function ConfirmRequireTestAgain(){
	return confirm("Bạn muốn yêu cầu thi lại?");
}

function CompleteRequireTestAgain(){
	return alert("Đã gửi yêu cầu!")
}

function ConfirmSend(){
	if (confirm("Bạn muốn nộp bài?")) 
		{ document.form.submit(); } 
	return false;
}

function toggleMe(a){
	var e=document.getElementById(a);
	if(!e)return true;
	if(e.style.display=="none"){
		e.style.display="block"
	}
	else{
		e.style.display="none"
	}
	return true;
}

window.history.forward();
function noBack() {
	window.history.forward();
}

var countdownId = 0;

function start(minute, sencond) {
	//Start clock
	countdownId = setInterval("countdown()", 1000);
}

function countdown(){
	if(minute > 0){
		if (second > 0) {
			second	= second - 1;
			document.getElementById('second').innerHTML = second;
		}
		if (second == 0) {
			if (minute != 0) {
				minute	= minute -1;
				if (minute != 0)
					second	= 59;
				else
					second	= 60;
			}
			document.getElementById('second').innerHTML = second;
			document.getElementById('minute').innerHTML = minute;
		}
	}
	if (minute == 0){
		if (second > 0) {
			second	= second - 1;
			document.getElementById('second').innerHTML = second;
		}
		if (second == 0) {
			clearInterval(countdownId);
			document.exam.submit();
		}
	}
}