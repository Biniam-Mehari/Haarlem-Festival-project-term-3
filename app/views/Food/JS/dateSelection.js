const selectedDate = document.getElementById("selectDate");
const form = document.getElementById("form");
const restaurantID = document.getElementById("restaurantID");
const selectedTime = document.getElementById("selectTime");


function getTimesByDateForRestaurantID() {
    const date = selectedDate.value.trim()
    const id = restaurantID.value.trim(); 
 

    fetch("API/food.php", {
        body: JSON.stringify({
            "restaurantID": document.getElementById("restaurantID").value,
            "startDate": document.getElementById("selectedDate").value
        }),
        method: "POST"
    })
    .then(result => result.json())
    .then(data => {

        if (data.result === "NoData") {
            selectedTime.innerHTML = "NO TIMES EXIST FOR THIS DATE"
        }
        else {
            selectedTime.innerHTML = "";
            for(var i in data) {
                selectedTime.innerHTML += data[i];
            }
        }
    })
}


function getSliderData() {
    fetch('/hf/culinary/fetchSliderdata')
      .then(result => result.json())
      .then(restaurants => {
        elements = restaurants;
        fillCarousel();
      })
      .catch(error => console.log(error));
  }