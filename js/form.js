class Form {
    constructor() {
        this.formButtonLogin = document.getElementById('buttonLogin');
        this.formButtonRegister = document.getElementById('buttonRegister');
        this.formBackground = document.getElementById('floatingForm');
        this.formBackgroundLogin = document.getElementById('floatingFormLogin');
        this.formBackgroundLoginFocusPoint = document.getElementById('inputLoginUsername');
        this.formBackgroundRegister = document.getElementById('floatingFormRegister');
        this.formBackgroundRegisterFocusPoint = document.getElementById('inputRegisterUsername');
    }
    formShow(action) {
        typingText.pause();
        this.formBackground.style.visibility = 'visible';
        this.formBackground.style.opacity = 1;
        if (action == 'login') this.formShowLogin();
        if (action == 'register') this.formShowRegister();
    }
    formShowLogin() {
        this.formBackgroundLogin.style.visibility = 'visible';
        this.formBackgroundLogin.style.opacity = 1;
        aria.expandedTrue(this.formButtonLogin);
        this.formBackgroundLoginFocusPoint.focus();
    }
    formShowRegister() {
        this.formBackgroundRegister.style.visibility = 'visible';
        this.formBackgroundRegister.style.opacity = 1;
        aria.expandedTrue(this.formButtonRegister);
        this.formBackgroundRegisterFocusPoint.focus();
    }
    formHide(target) {
        if (target.id != 'floatingForm') return;
        if (this.formBackgroundLogin.style.visibility == 'visible') this.formHideLogin();
        if (this.formBackgroundRegister.style.visibility == 'visible') this.formHideRegister();
        this.formBackground.style.visibility = 'hidden';
        this.formBackground.style.opacity = 0;
        typingText.resume();
    }
    formHideLogin() {
        this.formBackgroundLogin.style.visibility = 'hidden';
        this.formBackgroundLogin.style.opacity = 0;
        aria.expandedFalse(this.formButtonLogin);
        this.formButtonLogin.focus();
    }
    formHideRegister() {
        this.formBackgroundRegister.style.visibility = 'hidden';
        this.formBackgroundRegister.style.opacity = 0;
        aria.expandedFalse(this.formButtonRegister);
        this.formButtonRegister.focus();
    }
}
var newForm = new Form();
// Login & Register listeners
// TODO: Add hiding form with escape key
document.getElementById('buttonLogin').addEventListener('click', function () { newForm.formShow('login') });
document.getElementById('buttonRegister').addEventListener('click', function () { newForm.formShow('register') });

document.getElementById('floatingForm').addEventListener('click', function (e) { newForm.formHide(e.target) });