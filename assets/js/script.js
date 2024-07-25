function ambilNamaDariURL() {
    const urlParams = new URLSearchParams(window.location.search);
    const nama = urlParams.get("untuk");
    return nama;
}

function gantiTeks() {
    const nama = ambilNamaDariURL();
    if (nama) {
        document.getElementById("namaTamu").textContent = nama;
    }
}

window.addEventListener("load", gantiTeks);

const musicPlayer = document.querySelector('.music-player');
const playButton = document.querySelector('.play-button');
const myaudio = document.querySelector('#my-audio');

let isPlaying = true;

playButton.addEventListener('click', () => {
    if (isPlaying) {
        pauseAudio();
    } else {
        playAudio();
    }
});

function playAudio() {
    isPlaying = true;
    musicPlayer.classList.add('playing');
    playButton.innerHTML = '<i class="bx bx-headphone"></i>';
    myaudio.play();
}

function pauseAudio() {
    isPlaying = false;
    musicPlayer.classList.remove('playing');
    playButton.innerHTML = '<i class="bx bx-caret-right"></i>';
    myaudio.pause();
}

myaudio.addEventListener('ended', () => {
    pauseAudio();
});

document.getElementById('salin_btn').addEventListener('click', function () {
    var noRekening = document.getElementById('no_rekening');
    var range = document.createRange();
    range.selectNodeContents(noRekening);
    var selection = window.getSelection();
    selection.removeAllRanges();
    selection.addRange(range);
    document.execCommand('copy');
    selection.removeAllRanges();
    document.getElementById('salin_btn').textContent = 'Nomor Rekening Tersalin!'
});