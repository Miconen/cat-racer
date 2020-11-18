class Aria {
    constructor() {
        this.lastFocus;
    }
    expandedTrue(element) {
        element.setAttribute('aria-expanded', 'true');
    }
    expandedFalse(element) {
        element.setAttribute('aria-expanded', 'false');
    }
    lastFocusSave(element) {
        this.lastFocus = element;
    }
    lastFocusLoad() {
        this.lastFocus.focus();
    }
}
var aria = new Aria();
