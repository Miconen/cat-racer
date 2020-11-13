class Form {
    constructor() {
        this.formBackground = document.getElementById('floatingForm');
        this.formBackgroundLogin = document.getElementById('floatingFormLogin');
        this.formBackgroundRegister = document.getElementById('floatingFormRegister');
    }
    formShow(action) {
        typingText.pause();
        this.formBackground.style.visibility = 'visible';
        this.formBackground.style.opacity = 1;
        if (action == 'login') {
            this.formBackgroundLogin.style.visibility = 'visible';
            this.formBackgroundLogin.style.opacity = 1;
        }
        if (action == 'register') {
            this.formBackgroundRegister.style.visibility = 'visible';
            this.formBackgroundRegister.style.opacity = 1;
        }
    }
    formHide(target) {
        if (target.id == 'floatingForm') {
            typingText.resume();
            this.formBackground.style.visibility = 'hidden';
            this.formBackground.style.opacity = 0;
            this.formBackgroundLogin.style.visibility = 'hidden';
            this.formBackgroundLogin.style.opacity = 0;
            this.formBackgroundRegister.style.visibility = 'hidden';
            this.formBackgroundRegister.style.opacity = 0;
        }
    }
}
var newForm = new Form();
// Login & Register listeners
document.getElementById('buttonLogin').addEventListener('click', function () { newForm.formShow('login') });
document.getElementById('buttonRegister').addEventListener('click', function () { newForm.formShow('register') });

document.getElementById('floatingForm').addEventListener('click', function (e) { newForm.formHide(e.target) });
