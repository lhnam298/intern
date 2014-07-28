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