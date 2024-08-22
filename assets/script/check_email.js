const EMAIL_REGEXP = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;
const input = document.querySelector('[type="email"]');

function isEmailValid(value) {
 	return EMAIL_REGEXP.test(value);
}

function onInput() {
	if (isEmailValid(input.value)) {
		input.style.borderColor = 'green';
        help.style.color = 'green';
        help.style.marginTop = '10px';
        help.innerHTML = "Адрес электронной почты введен корректно!";
	} else {
		input.style.borderColor = 'red';
        help.style.color = 'red';
        help.style.marginTop = '10px';
        help.innerHTML = "Адрес электронной почты введен некорректно!";
	}
}

input.addEventListener('input', onInput);