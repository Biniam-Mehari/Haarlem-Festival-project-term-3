const selectedDate = document.getElementById("selectDate");
const form = document.getElementById("form");
const restaurantID = document.getElementById("restaurantID");
const selectedTime = document.getElementById("selectTime");


selectedDate.addEventListener('select', () => {
    let dates = fetch("/food/fillSessionTime", {
        body: JSON.stringify({
            "restaurantID": document.getElementById("restaurantID").value,
            "startDate": document.getElementById("selectedDate").value
        }),
        method: "POST"
    })
    .then(result => result.json()).then(data => {
        if (data.result === "NoData") {
            selectedTime.innerHTML = "NO TIMES EXIST FOR THIS DATE"
        }
        else {
            selectedTime.innerHTML = dates;
            
        }
    })
})