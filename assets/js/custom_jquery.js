/*$('#addToCart-btn').click(function (e) ==== for 1 btn 
 $(document).on('click','#increment-btn', function (e) === for many btn*/

//jqDocReady
$(document).ready(function () {
  //---------------------------------increment-btn----------------------------------------
  //jqOn
  $(document).on("click", "#increment-btn", function (e) {
    e.preventDefault();
    /*//test
        var qty = $('#input-qty').val();
        alert(qty);
        */
    var qty = $(this).closest("#product_data").find("#input-qty").val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if (value < 10) {
      value++;
      $(this).closest("#product_data").find("#input-qty").val(value);
    }
  });

  //---------------------------------decrement-btn----------------------------------------
  $(document).on("click", "#decrement-btn", function (e) {
    e.preventDefault();

    var qty = $(this).closest("#product_data").find("#input-qty").val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
      value--;
      $(this).closest("#product_data").find("#input-qty").val(value);
    }
  });

  //---------------------------------addToCart-btn----------------------------------------
  $("#addToCart-btn").click(function (e) {
    e.preventDefault();

    var qty = $(this).closest("#product_data").find("#input-qty").val();
    var prod_id = $(this).val();
    //alert(prod_id)

    //jqAjax
    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data: {
        prod_id: prod_id,
        prod_qty: qty,
        scope: "add",
      },
      success: function (response) {
        if (response == 201) {
          alertify.success("Product Added to Cart Successfully");
        } else if (response == 501) {
          alertify.error("Warning! Product Already in Cart");
        } else if (response == 401) {
          alertify.error("Please, Login to Continue");
        } else if (response == 500) {
          alertify.error("Something went wrong");
        }
      },
    });
  });

  //---------------------------------updateQty----------------------------------------
  //JqOn
  $(document).on("click", ".updateQty", function () {
    var qty = $(this).closest("#product_data").find("#input-qty").val();
    var prod_id = $(this).closest("#product_data").find("#pordId").val();

    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data: {
        prod_id: prod_id,
        prod_qty: qty,
        scope: "update",
      },
      success: function (response) {
        if (response == 200) {
        } else if (response == 500) {
          alertify.error("Something went wrong");
        }
      },
    });
  });

  //---------------------------------deleteCart-btn----------------------------------------
  //jqOn
  $(document).on("click", "#deleteCart-btn", function () {
    var cart_id = $(this).val();

    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data: {
        cart_id: cart_id,
        scope: "delete",
      },
      success: function (response) {
        if (response == 200) {
          alertify.success("Cart Deleted Successfully");
          $("#myCart_autoReload").load(location.href + " #myCart_autoReload");
        } else if (response == 500) {
          alertify.error("Something went wrong");
        }
      },
    });
  });
});
