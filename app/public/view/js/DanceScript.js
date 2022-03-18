function SwapToBuyScreen(DivTicketTitle, DivTicketDetail, DivTicketLeftBuy, DivTicketRightBuy) {

    div1 = document.getElementById(DivTicketTitle);
    div2 = document.getElementById(DivTicketDetail);
    div3 = document.getElementById(DivTicketLeftBuy);
    div4 = document.getElementById(DivTicketRightBuy);

    div1.style.display = "none";
    div2.style.display = "none";
    div3.style.display = "block";
    div4.style.display = "block";
}



function addTicket(minButton, input, addButton) {
    const minusButton = document.getElementById(minButton);
    const plusButton = document.getElementById(addButton);
    const inputField = document.getElementById(input);

    minusButton.addEventListener('click', event => {
        event.preventDefault();
        const currentValue = Number(inputField.value) || 0;
        inputField.value = currentValue - 1;
    });

    plusButton.addEventListener('click', event => {
        event.preventDefault();
        const currentValue = Number(inputField.value) || 0;
        inputField.value = currentValue + 1;
    });
}
function showBuyTicket(BuyTicket, TicketTitle){
    div1 = document.getElementById(BuyTicket).style.visibility="visible";
    div1 = document.getElementById(TicketTitle).style.backgroundColor="#11557C";
}