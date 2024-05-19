$(document).ready(function () {
  $(".editBranch").click(function () {
    var BranchId = $(this).data("branch");
    $.ajax({
      type: "POST",
      url: "components/class.php?action=editModal",
      data: { id: BranchId },
      success: function (content) {
        $("#editBranchForm").html(content);
      },
    });
  });
});

$(document).ready(function () {
  $("#editBranch").click(function () {
    $("#editBranchForm").submit();
  });

  $("#editBranchForm").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "components/class.php?action=edit-branch",
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
  $("#removeBranch").click(function () {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#6c757d",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, remove it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $("#editBranchForm").submit();
      }
    });
  });

  $("#editBranchForm").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "components/class.php?action=delete-branch",
      data: formData,
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
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  });
});
