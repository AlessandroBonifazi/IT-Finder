window.addEventListener("DOMContentLoaded", () => {
    const form1 = document.querySelector("#form1");
    const form2 = document.querySelector("#form2");
    const form3 = document.querySelector("#form3");

    let formsList = [form1, form2, form3];

    let next1 = document.querySelector("#next1");
    let next2 = document.querySelector("#next2");

    let prev2 = document.querySelector("#prev2");
    let prev3 = document.querySelector("#prev3");

    let displayedForm = 1;
    displayForm(displayedForm);

    function displayForm(form) {
        switch (form) {
            case 1:
                form1.style.display = "block";
                form2.style.display = "none";
                form3.style.display = "none";
                break;
            case 2:
                form1.style.display = "none";
                form2.style.display = "block";
                form3.style.display = "none";
                break;
            case 3:
                form1.style.display = "none";
                form2.style.display = "none";
                form3.style.display = "block";
                break;
        }
    }

    function nextForm() {
        if (displayedForm < 3) {
            displayedForm++;
            displayForm(displayedForm);
        }
    }
    function previousForm() {
        if (displayedForm > 1) {
            displayedForm--;
            displayForm(displayedForm);
        }
    }

    next1.addEventListener("click", nextForm);
    next2.addEventListener("click", nextForm);
    prev2.addEventListener("click", previousForm);
    prev3.addEventListener("click", previousForm);
});

// function assignDOMElements() {
//     next1 = document.querySelector("#next1");
//     next2 = document.querySelector("#next2");
//     prev2 = document.querySelector("#prev2");
//     prev3 = document.querySelector("#prev3");
// }
