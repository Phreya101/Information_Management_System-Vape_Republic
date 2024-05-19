$(document).ready(function () {
  $("#date").datepicker({
    format: "yyyy-mm-dd",
    endDate: "+infinity",
    maxViewMode: 0,
    orientation: "bottom right",
    keyboardNavigation: false,
    forceParse: false,
    todayHighlight: true,
    autoclose: true,
  });
});

$(document).ready(function () {
  $("#view").click(function () {
    var date = $("#report").serialize();
    console.log(date);
    $.ajax({
      type: "POST",
      url: "includes/Report/backend/process.php?action=view",
      data: date,
      success: function (view) {
        // var data = JSON.parse(data);
        $("#viewData").html(
          '<iframe src="' +
            view +
            '" style="width: 100%; height: 600px;"></iframe>'
        );
      },
    });
  });
});

$(document).ready(function () {
  $("#download").click(function () {
    // Serialize form data
    var formData = $("#report").serialize();

    // Set the URL for download
    var downloadUrl = "includes/Report/backend/pdf/download.php?" + formData;

    window.location.href = downloadUrl;
  });
});
