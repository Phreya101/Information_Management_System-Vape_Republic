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
            location.reload();
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
    var branch = $("#branch").val();
    $.ajax({
      url: "includes/Stocks/backend/stockList.php",
      type: "GET",
      data: { id: branch },

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
        var name = $(this).data("name");
        $.ajax({
          type: "post",
          url: "includes/Stocks/backend/process.php?action=deleteStock",
          data: {
            name: name,
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
                location.reload();
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
            location.reload();
          }, 1500);
          $("#addStock")[0].reset();
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
  function fetchLog() {
    $.ajax({
      url: "includes/Stocks/backend/log.php",
      type: "GET",
      success: function (content) {
        $("#log").html(content);
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  }
  fetchLog();
});

$(document).ready(function () {
  var branch = $("#branch").val();
  $.ajax({
    type: "GET",
    data: { id: branch },
    url: "includes/Stocks/backend/process.php?action=stockList",
    success: function (list) {
      var list = JSON.parse(list);
      $("#stock-list").selectize({
        maxItems: 1,
        valueField: "id",
        labelField: "product",
        searchField: "name",
        options: list,
        render: {
          item: function (item, escape) {
            return (
              "<div class='ms-2 text-capitalize'>" +
              escape(item.brand) +
              " - " +
              escape(item.product) +
              " (&#8369;" +
              escape(item.price) +
              ")" +
              "</div>"
            );
          },
          option: function (item, escape) {
            return (
              "<div class='ms-2 text-capitalize my-1'>" +
              escape(item.brand) +
              " - " +
              escape(item.product) +
              " (&#8369;" +
              escape(item.price) +
              ")" +
              "<span class='float-end me-2'>" +
              "stock - " +
              escape(item.stock) +
              "</span>" +
              "</div>"
            );
          },
        },
        create: false,
        onChange: function (value) {
          var selectedItem = this.options[value];
          $("#currentStock").val(selectedItem.stock);
        },
      });
    },
  });
});

$(document).ready(function () {
  $("#add-stock").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "post",
      url: "includes/Stocks/backend/process.php?action=addNewStock",
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
            location.reload();
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
