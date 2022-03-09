// show a message with a type of the input
function showMessage(input, message, type) {
	// get the p element and set the message
	const msg = input.parentNode.querySelector("p");
	msg.innerText = message;
	// update the class for the input
	input.className = type ? "success" : "error";
	return type;
}

function showError(input, message) {
	return showMessage(input, message, false);
}

function showSuccess(input) {
	return showMessage(input, "", true);
}

function hasValue(input, message) {
	if (input.value.trim() === "") {
		return showError(input, message);
	}
	return showSuccess(input);
}

function validatePassword(input, requiredMsg, invalidMsg) {
	// check if the value is not empty
	if (!hasValue(input, requiredMsg)) {
		return false;
	}
	// validate email format
	const PassRegex = /^(?=(.*[a-zA-Z]){1,})(?=(.*[0-9]){2,}).{8,}$/;

	const password = input.value.trim();
	if (!PassRegex.test(password)) {
		return showError(input, invalidMsg);
	}
	return true;
}

const form = document.querySelector(".form");

const NAME_REQUIRED = "Please enter your name";
const PASSWORD_REQUIRED = "Please enter your password";

form.addEventListener("submit", function (event) {
	// stop form submission
	event.preventDefault();

	// validate the form
	let nameValid = hasValue(form.elements["name"], NAME_REQUIRED);
	let passwordValid = validatePassword(form.elements["password"], PASSWORD_REQUIRED, PASSWORD_INVALID);
	// if valid, submit the form.
	if (nameValid && passwordValid) {
		alert("Login successful.");
	}
});

