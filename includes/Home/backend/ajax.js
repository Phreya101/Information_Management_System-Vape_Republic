$(document).ready(function () {
  $("#addTransaction").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "backend.php",
      data: formData,
      success: function (response) {
        alert("Added");
      },
    });
  });
});
