// TODO: Show some kind of text cursor
class Typing {
    constructor() {
        // Split up visible text
        this.sentence = document.getElementById('textSentence');
        // Hidden 'complete' text
        this.hidden = document.getElementById('textHidden').innerHTML;
        this.typedText = '';
        this.typedCorrect = '';
        this.typedCorrectWords = 0;
        this.typedCorrectLettersInWord = 0;
        this.typedErrors = 0;
        this.errorBuffer = 3;
        this.state = 'resumed';
    }
    pause() {
        this.state = 'paused';
    }
    resume() {
        this.state = 'resumed';
    }
    input(e) {
        // Stop typing if paused or text complete
        if (this.state == 'paused' || this.hidden == this.typedText) return;
        // Remove symbol
        if (e.key == 'Backspace' && this.typedErrors > 0 && this.typedText) {
            this.inputRemove();
            return;
        }
        // If more errors than this.errorBuffer ignore input after this
        if (this.typedErrors >= this.errorBuffer) return;
        // Ignore input longer than 1 after this (Example: Shift)
        if (e.key.length != 1) return;
        // Incorrect symbol
        if (this.hidden[this.typedCorrect.length] != e.key) {
            this.inputIncorrect(e);
            return;
        }

        // If errors, ignore correct input after this
        if (this.typedErrors) return;

        // Mark word as typed (this.typedCorrectWords is used for indexing current word)
        if (e.key == ' ' && this.hidden[this.typedCorrect.length] == ' ') {
            this.inputNext(e);
            return;
        }

        // Correct symbol
        if (this.hidden[this.typedCorrect.length] == e.key) {
            this.inputCorrect(e);
            return;
        }
    }
    inputCorrect(e) {
        this.sentence.getElementsByClassName('word')[this.typedCorrectWords]
        .getElementsByClassName('letter')[this.typedCorrectLettersInWord].className = 'letter letterCorrect';

        // Add letter
        this.typedText += e.key;
        this.typedCorrect += e.key;
        this.typedCorrectLettersInWord++;
        // this.logger();
    }
    inputIncorrect(e) {
        if (this.sentence.getElementsByClassName('word')[this.typedCorrectWords].childElementCount > this.typedCorrectLettersInWord + this.typedErrors) {
            this.sentence.getElementsByClassName('word')[this.typedCorrectWords]
            .getElementsByClassName('letter')[this.typedCorrectLettersInWord + this.typedErrors].className = 'letter letterIncorrect';
        }
        if (this.sentence.getElementsByClassName('word')[this.typedCorrectWords].childElementCount <= this.typedCorrectLettersInWord + this.typedErrors) {

            var word = textSentence.getElementsByClassName('word')[this.typedCorrectWords];
            var tag = document.createElement('p');
            var text = document.createTextNode(e.key);
            tag.appendChild(text);
            tag.className = 'letter temporary letterIncorrect';
            word.appendChild(tag);
        }

        // Add letter
        this.typedText += e.key;
        // Add error
        this.typedErrors++;
        // this.logger();
    }
    inputNext(e) {
        this.typedText += e.key;
        this.typedCorrect += e.key;
        this.typedCorrectWords++;
        this.typedCorrectLettersInWord = 0;
        // this.logger();
    }
    inputRemove() {
        // Remove letter
        this.typedText = this.typedText.substring(0, this.typedText.length - 1);
        // Remove error
        this.typedErrors--;
        if (this.sentence.getElementsByClassName('word')[this.typedCorrectWords]
        .getElementsByClassName('letter')[this.typedCorrectLettersInWord + this.typedErrors]
        .classList.contains('temporary')) {
            this.sentence.getElementsByClassName('word')[this.typedCorrectWords]
            .getElementsByClassName('letter')[this.typedCorrectLettersInWord + this.typedErrors].remove()
        } else {
            this.sentence.getElementsByClassName('word')[this.typedCorrectWords]
            .getElementsByClassName('letter')[this.typedCorrectLettersInWord + this.typedErrors].className = 'letter';
        }
        // this.logger();
    }
    logger() {
        console.clear();
        console.log(`Next input: ${this.hidden[this.typedCorrect.length]}`);
        console.log(`Letters Typed (Correct, Typed, Total): ${this.typedCorrect.length} / ${this.typedText.length} / ${this.hidden.length}`);
        console.log(`Text typed: ${this.typedText}`);
        console.log(`Correct Letters In Word: ${this.typedCorrectLettersInWord}`);
        console.log(`Words: ${this.typedCorrectWords}`);
        console.log(`Errors: ${this.typedErrors}`);
    }
}
var typingText = new Typing();
document.addEventListener('keydown', function (e) { typingText.input(e) });
