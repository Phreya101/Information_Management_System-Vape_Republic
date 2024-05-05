$(document).ready(function () {
  $("#addStock").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "includes/Stocks/backend/process.php?action=addStock",
      data: formData,
      success: function (response) {
        var data = JSON.parse(response);
        if (data.success) {
          Swal.fire({
            title: "Added!",
            text: data.message,
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            window.location = "index.php?path=Stock%20Management";
          }, 1500);
          $("#addStock")[0].reset();
          fetchData();
        } else {
          Swal.fire({
            title: "Failed!",
            text: data.message,
            icon: "error",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  });
});

$(document).ready(function () {
  function getList() {
    $.ajax({
      url: "includes/Stocks/backend/process.php",
      type: "GET",
      success: function (list) {
        $("#stockTable").html(list);
      },
    });
  }
  getList();
  //   setInterval(getList, 2000);
});
