$(document).ready(function () {

  // Ajax call to load products.
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
        if (response != "") {
          $("#products").append(response);
        }
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.log(error);
      },
    });
  });
  $("#cart").click(function () {
    // Array to store the values of checked checkboxes under products
    var checkedValues = [];

    // Select checkboxes under products and get their values
    $("#products")
      .find(".checkbox:checked")
      .each(function () {
        checkedValues.push($(this).val());
      });
    $.ajax({
      url: "/ajax",
      method: "POST",
      data: {
        action: "cart",
        products: checkedValues,
      },
      success: function (response) {
        if (response != "") {

        }
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.log(error);
      },
    });
  });

});
