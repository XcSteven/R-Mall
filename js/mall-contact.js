function is_numeric(str) {
	return /^\d+$/.test(str);
}

function checkbox_daycheck() {
	flag = false;
	a = document.getElementsByClassName("day_check");
	Array.from(a).forEach(function(ele) {
		console.log(ele, ele.checked);
		if (ele.checked) {
			flag = true
		}
	});
	return flag;
}

function valid_phone(phone) {
	debugger;
	phone_length = phone.length;
	valid_characters = ['.', '-', ' '];
	if (!is_numeric(phone[0]) | !is_numeric(phone[phone_length - 1])) {
		console.log("First or last character invalid");
		return false;
    }
	count_number = 0;
	for (i = 0; i < phone_length; ++i) {
		if (is_numeric(phone[i])) {
			count_number++;
		} else if (valid_characters.includes(phone[i])) {
			if (!is_numeric(phone[i - 1]) | !is_numeric(phone[i + 1])) {
				console.log("Two characters next each other");
				return false;
			}
		} else {
			console.log("Invalid characters");
			return false;
		}
	}
	if (count_number < 9 | count_number > 11) {
		console.log("Length not satisfied");
		return false;
	}
	return true;
}

function custom_valid() {
	phonenum = document.getElementById("phone");
	pv = valid_phone(phonenum.value);
	if (!pv) {
        phonenum.setCustomValidity("Phone number is invalid!");
        phonenum.reportValidity();
        phonenum.focus();
        console.log("Phone is invalid");
        return false;
    }
    if (!checkbox_daycheck()) {
		document.getElementById("form_submit_result").innerHTML = "* At least one day must be checked!";
		console.log("Check box must be checked");
		document.getElementById("form_submit_result").focus();
		return false;
	}
	return true;
}

document.addEventListener("DOMContentLoaded", function() {
	fb_mess = document.getElementById("mess");
	fb_mess.addEventListener("input", function() {
		ml = fb_mess.value.length;
		flag = false;
		if (ml < 50) {
			document.getElementById("letters").innerHTML = (50 - ml) + " more letters are needed";
			if (!flag) {
				fb_mess.classList.add("error-border");
				flag = true;
			}
		} else if (ml > 500) {
			document.getElementById("letters").innerHTML = "Deleting " + (ml - 500) + " more letters is needed";
			if (!flag) {
				fb_mess.classList.add("error-border");
				flag = true;
			}
		} else {
			document.getElementById("letters").innerHTML = "You can type " + (500 - ml) + " more letters";
			flag = false;
			fb_mess.classList.remove("error-border");
		}
	})
})