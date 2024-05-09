// Add Stock
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

// Stock List
$(document).ready(function () {
  function getList() {
    $.ajax({
      url: "includes/Stocks/backend/stockList.php",
      type: "GET",
      success: function (list) {
        $("#stockTable").html(list);
      },
    });
  }
  getList();
  //   setInterval(getList, 2000);
});

// Delete Stock
$(document).ready(function () {
  $("#stockTable").on("click", ".deleteStock", function () {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var userId = $(this).data("id");
        $.ajax({
          type: "post",
          url: "includes/Stocks/backend/process.php?action=deleteStock",
          data: {
            id: userId,
          },
          success: function (response) {
            var data = JSON.parse(response);
            if (data.success) {
              Swal.fire({
                title: "Deleted!",
                text: data.message,
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
              });
              setTimeout(function () {
                window.location = "index.php?path=Stock%20Management";
              }, 1500);
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
        });
      }
    });
  });
});

// Edit Stock
$(document).ready(function () {
  $("#stockTable").on("click", ".editStock", function () {
    var userId = $(this).data("id");
    $.ajax({
      type: "get",
      url: "includes/Stocks/backend/process.php?action=editStock",
      data: {
        id: userId,
      },
      success: function (content) {
        $("#modalContent").html(content);
        $("#editStock").modal("show");
      },
    });
  });
});

$(document).ready(function () {
  $("#modalContent").on("submit", "#editForm", function (e) {
    e.preventDefault();
    var formData = $(this).serialize();

    $.ajax({
      type: "post",
      url: "includes/Stocks/backend/process.php?action=updateStock",
      data: formData,
      success: function (response) {
        var data = JSON.parse(response);
        if (data.success) {
          Swal.fire({
            title: "Updated!",
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
