$(document).ready(function () {
  $count = 9;

  $(".book").on("click", ".add", function () {
    const listItem = $(this).closest("div");
    const taskId = listItem.data("id");

    $.ajax({
      url: "/ajax",
      method: "POST",
      data: {
        action: "add",
        id: taskId,
      },
      success: function (response) {
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.error("Error sending form data:", error);
      },
    });
    // var link = document.createElement("a");
    // link.href = '/';
    // document.body.appendChild(link);
    // link.click();
  });

  $("#load-more").on('click', function () {
    $.ajax({
      url: '/ajax',
      method: 'POST',
      data: {
        action: 'load',
        count: $count,
      },
      success: function (response) {
        if (response == '') {
          $("#load-more-msg").html("No more post");
        } else {
          $("#list").append(response);
          $count += 3;
        }
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.log(error);
      },
    });
  });


  $("#getValsBtn").click(function () {
    // Array to store the values of checked checkboxes
    var checkedValues = [];

    // Loop through each checked checkbox and push its value to the array
    $(".checkbox:checked").each(function () {
      checkedValues.push($(this).val());
    });
    $.ajax({
      url: "/ajax",
      method: "POST",
      data: {
        action: "load",
        catagory: checkedValues,
      },
      success: function (response) {
        if (response == "") {
          $("#load-more-msg").html("No more post");
        } else {
          $("#products").append(response);
        }
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.log(error);
      },
    });
  });


  // $("input:radio").change(function () {
  //   $catagory = $("input:radio").val();
  //   $.ajax({
  //     url: "/ajax",
  //     method: "POST",
  //     data: {
  //       action: "load",
  //       catagory: $catagory,
  //     },
  //     success: function (response) {
  //       if (response == "") {
  //         $("#load-more-msg").html("No more post");
  //       } else {
  //         $("#list").append(response);
  //         $count += 3;
  //       }
  //       console.log(response);
  //     },
  //     error: function (xhr, status, error) {
  //       console.log(error);
  //     },
  //   });
  // });


});
