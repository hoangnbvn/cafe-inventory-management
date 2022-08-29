function validate() {
	var idprod = document.getElementById("idprod").value;
	var name = document.getElementById("name").value;
	var unit = document.getElementById("unit").value;
	var price = document.getElementById("price").value;
	
	sessionStorage.idprod = idprod;
	sessionStorage.setItem("name", name);
	sessionStorage.unit = unit;
	sessionStorage.price = price;

	var error_msg = ""
	if (idprod.match("^[0-9]{1,5}$") == null) {
		error_msg += "Id chỉ gồm 1 đến 5 chữ số<br>";
	}

	if (name.match("^[A-Z a-z]{1,30}$") == null) {
		error_msg += "Tên chỉ gồm chữ cái và dấu cách từ 1 đến 30 số<br>";
	}

	if (unit.match("^[A-z a-z]{1,30}$") == null) {
		error_msg += "Đơn vị chỉ gồm chữ có độ dài từ 1 đến 30<br>";
	}

	if (price.match("^[0-9]{3,}$") == null) {
		error_msg += " giá tiền của sản phẩm chỉ gồm số sô ít nhất có 3 chữ số<br>";
	}

	if (error_msg == "") {
		return true
	} else {
		document.getElementById("error").innerHTML = error_msg;
		return false
	}
}

function prefillData() {
	if (sessionStorage.firstname != null) {
		document.getElementById("idprod").value = sessionStorage.idprod;
		document.getElementById("name").value = sessionStorage.name;
		document.getElementById("unit").value = sessionStorage.unit;
		document.getElementById("price").value = sessionStorage.price;
    }
}

function init() {
	var regForm = document.getElementById("addForm");
	regForm.onsubmit = validate;
    prefillData();
}

window.onload = init;

