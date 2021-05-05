function StoreownerCheck() {
	if (document.getElementById('storeown').checked) {
		document.getElementById('ifStoreown').style.display = 'block';}
	else document.getElementById('ifStoreown').style.display = 'none';
}

function SamePassword() {
  if (document.getElementById('pass').value ==
    document.getElementById('rpass').value) {
    document.getElementById('message').style.color = '#008000';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = '#ff0000';
    document.getElementById('message').innerHTML = 'not matching';
  }
}

function is_numeric(str) {
	return /^\d+$/.test(str);
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
	return true;
}