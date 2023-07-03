function displayForm() {
  var selected_option = document.getElementById("sel").value;

  document.getElementById("part_time_form").classList.add("hidden");
  document.getElementById("estate_form").classList.add("hidden");
  document.getElementById("used_car_form").classList.add("hidden");
  document.getElementById("notice_form").classList.add("hidden");

  switch (selected_option) {
    case "part_time":
      document.getElementById("part_time_form").classList.remove("hidden");
      break;
    case "estate":
      document.getElementById("estate_form").classList.remove("hidden");
      break;
    case "car":
      document.getElementById("used_car_form").classList.remove("hidden");
      break;
    case "notice":
      document.getElementById("notice_form").classList.remove("hidden");
      break;
  }
}
