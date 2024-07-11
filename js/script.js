// alert box
function alertBox(successMsg, errorMsg) {
    const value = new URLSearchParams(window.location.search).get('succeed');
    var alertMsg = false;

    if (value === 'true') {
        alertMsg = true;
        document.write('<div id="alert-box" class="alert-box success-alert-box container-mid">' + successMsg + '</div>');
    } else if (value === 'false') {
        alertMsg = true;
        document.write('<div id="alert-box" class="alert-box error-alert-box container-mid">' + errorMsg + '</div>');
    }

    if (alertMsg === true) {
        var element = document.getElementById('alert-box');
        setTimeout(function () {
            element.style.opacity = '0';
        }, 3000);
        setTimeout(function () {
            element.parentNode.removeChild(element);
        }, 4000);
    }
}

function alertBoxSettings1(errorMsg) {
    const value = new URLSearchParams(window.location.search).get('bank_account');
    var alertMsg = false;

    if (value === 'false') {
        alertMsg = true;
        document.write('<div id="alert-box" class="alert-box error-alert-box container-mid">' + errorMsg + '</div>');
    }

    if (alertMsg === true) {
        var element = document.getElementById('alert-box');
        setTimeout(function () {
            element.style.opacity = '0';
        }, 3000);
        setTimeout(function () {
            element.parentNode.removeChild(element);
        }, 4000);
    }
}

function passwordChange1(errorMsg) {
    const value = new URLSearchParams(window.location.search).get('password_error1');
    var alertMsg = false;

    if (value === 'false') {
        alertMsg = true;
        document.write('<div id="alert-box" class="alert-box error-alert-box container-mid">' + errorMsg + '</div>');
    }

    if (alertMsg === true) {
        var element = document.getElementById('alert-box');
        setTimeout(function () {
            element.style.opacity = '0';
        }, 3000);
        setTimeout(function () {
            element.parentNode.removeChild(element);
        }, 4000);
    }
}

function passwordChange2(errorMsg) {
    const value = new URLSearchParams(window.location.search).get('password_error2');
    var alertMsg = false;

    if (value === 'false') {
        alertMsg = true;
        document.write('<div id="alert-box" class="alert-box error-alert-box container-mid">' + errorMsg + '</div>');
    }

    if (alertMsg === true) {
        var element = document.getElementById('alert-box');
        setTimeout(function () {
            element.style.opacity = '0';
        }, 3000);
        setTimeout(function () {
            element.parentNode.removeChild(element);
        }, 4000);
    }
}

// insufficient funds - transaction
function insufficientBalance(errorMsg) {
    const value = new URLSearchParams(window.location.search).get('insufficient');
    var alertMsg = false;

    if (value === 'true') {
        alertMsg = true;
        document.write('<div id="alert-box" class="alert-box error-alert-box container-mid">' + errorMsg + '</div>');
    }

    if (alertMsg === true) {
        var element = document.getElementById('alert-box');
        setTimeout(function () {
            element.style.opacity = '0';
        }, 3000);
        setTimeout(function () {
            element.parentNode.removeChild(element);
        }, 4000);
    }
}

// invalid beneficiary account - transaction
function invalidAcc(errorMsg) {
    const value = new URLSearchParams(window.location.search).get('invalid');
    var alertMsg = false;

    if (value === 'true') {
        alertMsg = true;
        document.write('<div id="alert-box" class="alert-box error-alert-box container-mid">' + errorMsg + '</div>');
    }

    if (alertMsg === true) {
        var element = document.getElementById('alert-box');
        setTimeout(function () {
            element.style.opacity = '0';
        }, 3000);
        setTimeout(function () {
            element.parentNode.removeChild(element);
        }, 4000);
    }
}

// reset password alert
function resetPasswordAlert(errorMsg) {
    const value = new URLSearchParams(window.location.search).get('reset');
    var alertMsg = false;

    if (value === 'true') {
        alertMsg = true;
        document.write('<div id="alert-box" class="alert-box success-alert-box container-mid">' + errorMsg + '</div>');
    }

    if (alertMsg === true) {
        var element = document.getElementById('alert-box');
        setTimeout(function () {
            element.style.opacity = '0';
        }, 3000);
        setTimeout(function () {
            element.parentNode.removeChild(element);
        }, 4000);
    }
}