function cleanErrors() {
    let input = document.querySelector('form');
    for (let index = 0; index < input.length; index++) {
        let element = input[index];
        let elements = document.getElementsByClassName(`valid-${element.id}`);
        if (elements[1]) {
            elements[1].innerHTML = ''
        }
        for (let index = 0; index < elements.length; index++) {
            elements[index].classList.remove(`valid-${element.id}-error`);
        }
    }
}

function invalid(item, key) {
    let input = document.getElementsByClassName(`valid-${key}`);
    if (input.length > 0) {
        for (let index = 0; index < input.length; index++) {
            let element = input[index];
            if (element.classList.contains(`valid-${key}-success`)) {
                element.classList.remove(`valid-${key}-success`);
            }
            element.classList.add(`valid-${key}-error`);
        }
        input[1].innerHTML = item[0];
    }
}
