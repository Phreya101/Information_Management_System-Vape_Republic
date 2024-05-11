$(document).ready(function () {
  function getSale() {
    $.ajax({
      type: "get",
      url: "includes/Home/backend/list.php?action=getList",
      success: function (list) {
        $("#saleList").html(list);
      },
    });
  }
  getSale();
});

$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "includes/Home/backend/process.php?action=getItems",
    success: function (list) {
      var list = JSON.parse(list);
      $("#items").selectize({
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
          $("#prc").val(selectedItem.price);
          $("#price").val(selectedItem.price);
          $("#stock").val(selectedItem.stock);
        },
      });
    },
  });

  $("#addTransaction").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "includes/Home/backend/process.php?action=addTransaction",
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
            window.location = "index.php?path=Dashboard";
          }, 1500);
          $("#addTransaction")[0].reset();
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
  $("#saleList").on("click", ".refund", function () {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#6c757d",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, replace it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var stock = $(this).data("stock");
        var userId = $(this).data("id");
        var price = $(this).data("qty");
        $.ajax({
          type: "POST",
          url: "includes/Home/backend/process.php?action=refund",
          data: {
            price: price,
            stock: stock,
            id: userId,
          },
          success: function (response) {
            var data = JSON.parse(response);
            if (data.success) {
              Swal.fire({
                title: "Replaced!",
                text: data.message,
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
              });
              setTimeout(function () {
                window.location = "index.php?path=Dashboard";
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
      }
    });
  });
});

$(document).ready(function () {
  function getChart() {
    $.ajax({
      type: "get",
      url: "includes/Home/backend/process.php?action=getChartData",
      success: function (data) {
        try {
          data = JSON.parse(data);
          let labels = [];
          let dataset1Data = [];

          data.forEach(function (item) {
            labels.push(item.date);
            dataset1Data.push(item.total_income);
          });

          let ctx = document.getElementById("DailyChart").getContext("2d");
          let myLineChart = new Chart(ctx, {
            type: "line",
            data: {
              labels: labels,
              datasets: [
                {
                  label: "Daily Income",
                  data: dataset1Data,
                  borderColor: "blue",
                  borderWidth: 2,
                  fill: false,
                },
              ],
            },
            options: {
              responsive: true,
            },
          });
        } catch (error) {
          console.error("Error:", error);
        }
      },
      error: function (xhr, status, error) {
        // Handle error
        console.error("AJAX error:", error);
      },
    });
  }
  getChart();
});
