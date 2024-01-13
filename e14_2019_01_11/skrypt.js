function najechanie(id, img) {
    document.getElementById(id).src = img;
}

function opuszczenie(id, img) {
    document.getElementById(id).src = img;
}

function klikniecie(id, img) {
    opuszczenie(id, img)
    document.getElementById('zamiana').src = img;
}