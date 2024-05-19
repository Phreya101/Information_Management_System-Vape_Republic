$(document).ready(function () {
  $("#see-pass").click(function () {
    $("#password").attr("type", "text");
    $("#see-pass").attr("hidden", "hidden");
    $("#hide-pass").removeAttr("hidden");
  });

  $("#hide-pass").click(function () {
    $("#password").attr("type", "password");
    $("#hide-pass").attr("hidden", "hidden");
    $("#see-pass").removeAttr("hidden");
  });
});

$(document).ready(function () {
  $("#save").click(function () {
    $("#update").submit();
  });

  $("#update").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "components/modals/class.php",
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
            window.location = "auth/logout.php";
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

$(document).ready(function () {
  $("#addBranch").click(function () {
    $("#addBranchForm").submit();
  });

  $("#addBranchForm").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "components/class.php?action=add-branch",
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
