const buttons = document.getElementsByClassName('list-group-item');

for (let i=0; i<buttons.length; i++) {
    buttons[i].addEventListener('click', () => {
        resetButtons();
        buttons[i].classList.add('active');
    })
}
 function resetButtons() {
    for (let i=0; i<buttons.length; i++) {
        buttons[i].classList.remove('active');
    }
 }
