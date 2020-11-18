class TextToSpeech {
    constructor() {
        this.tts = new SpeechSynthesisUtterance();
    }
    ttsCheck() {
        if ('speechSynthesis' in window) {
            // Speech Synthesis supported
            return true;
        } else {
            // Speech Synthesis Not Supported
            return false;
        }
    }
    ttsSpeak() {
        console.log('speak');
        if (window.speechSynthesis.paused) {
            return window.speechSynthesis.resume();
        }
        else {
            var msg = new SpeechSynthesisUtterance();
            msg.text = typingText.getText();
            window.speechSynthesis.speak(msg);
        }
    }
    ttsPause() {
        console.log('pause');
        window.speechSynthesis.pause();
    }
    ttsCancel() {
        console.log('cancel');
        window.speechSynthesis.cancel();
    }
}
var textToSpeech = new TextToSpeech();