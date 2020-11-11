// Sentence
var textSentence = document.getElementById('textSentence');
var textHidden = document.getElementById('textHidden');
// Text typed
var textTyped = '';
// Correct letters
var lettersTyped = 0;
// Correct words
var wordsTyped = 0;
// Typed letters in current word
var wordsTypedLetters = 0;
// Incorrect letters
var errorTyped = 0;
// Max incorrect letters allowed before stopping input
var errorBuffer = 3;

for (var i = 0; i < textSentence.getElementsByClassName('word').length; i++) {
    var word = textSentence.getElementsByClassName('word')[i];
    var tag = document.createElement('p');
    var text = document.createTextNode(' ');
    tag.appendChild(text);
    tag.className = 'letter';
    word.appendChild(tag);
}

// Do magic when you press buttons
document.addEventListener('keydown', function (e) {
    // Stop typing if complete
    if (textHidden.innerHTML == textTyped) return;
    // Remove symbol
    if (e.key == 'Backspace') {
        wordHandler(e, 'remove')
        return;
    }

    // If more errors than errorBuffer ignore input after this
    if (errorTyped >= errorBuffer) return;

    // Ignore input longer than 1 after this (Example: Shift)
    if (e.key.length != 1) return;
    // Incorrect symbol
    if (textHidden.innerHTML[lettersTyped] != e.key) {
        wordHandler(e, 'incorrect');
        return;
    }

    // If errors, ignore correct input after this
    if (errorTyped) return;

    // Mark word as typed (wordsTyped is used for indexing current word)
    if (e.key == ' ' && textHidden.innerHTML[lettersTyped] == ' ') {
        wordHandler(e, 'next');
        return;
    }

    // Correct symbol
    if (textHidden.innerHTML[lettersTyped] == e.key) {
        wordHandler(e, 'correct');
        return;
    }
})

// Handle what to do when you type
function wordHandler(e, param) {
    switch (param) {
        case 'correct':
            // Add letter
            textTyped += e.key;
            textSentence.getElementsByClassName('word')[wordsTyped]
            .getElementsByClassName('letter')[wordsTypedLetters].className = 'letter letterCorrect';
            lettersTyped++;
            wordsTypedLetters++;
            break;
        case 'incorrect':
            // Add letter
            textTyped += e.key;
            // Add error
            textSentence.getElementsByClassName('word')[wordsTyped]
            .getElementsByClassName('letter')[wordsTypedLetters + errorTyped].className = 'letter letterIncorrect';
            errorTyped++;
            break;
        case 'next':
            textTyped += e.key;
            textSentence.getElementsByClassName('word')[wordsTyped]
            .getElementsByClassName('letter')[wordsTypedLetters].innerHTML = ' ';
            lettersTyped++;
            wordsTyped++;
            wordsTypedLetters = 0;
            break;
        case 'remove':
            if (errorTyped == 0) return;
            if (!textTyped) return;
            textSentence.getElementsByClassName('word')[wordsTyped]
            .getElementsByClassName('letter')[wordsTypedLetters + errorTyped - 1].className = 'letter';
            // Remove letter
            textTyped = textTyped.substring(0, textTyped.length - 1);
            // Remove error
            errorTyped--;
            break;
    }
    console.clear();
    console.log('Next input: ' + textHidden.innerHTML[lettersTyped]);
    console.log('Letters Typed: ' + wordsTypedLetters);
    console.log('Total Letters: ' + lettersTyped);
    console.log('Text typed: ' + textTyped);
    console.log('Errors: ' + errorTyped);
    return;
}
