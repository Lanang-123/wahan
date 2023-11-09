/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/page.js":
/*!******************************!*\
  !*** ./resources/js/page.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _toConsumableArray(arr) {
  return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread();
}

function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance");
}

function _iterableToArray(iter) {
  if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter);
}

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) {
    for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) {
      arr2[i] = arr[i];
    }

    return arr2;
  }
} // $(function(){
//     $('.picker2').pickadate({
//         format: 'd mmm yyyy'
//         // formatSubmit: 'yyyy-mm-d'
//     });
// });


$(function () {
  $(".picker2").datepicker({
    format: "d M yyyy",
    orientation: "bottom left",
    todayHighlight: true,
    autoclose: true // formatSubmit: 'yyyy-mm-d'

  });
});
$(".alert-confirm").on("click", function (event) {
  event.preventDefault();
  var url = $(this).attr("href");
  swal({
    title: "Apakah Anda yakin?",
    text: "Anda ingin menghapus data ini",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#0CC27E",
    cancelButtonColor: "#FF586B",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Tidak",
    confirmButtonClass: "btn btn-lg btn-success mr-5",
    cancelButtonClass: "btn btn-lg btn-danger",
    buttonsStyling: false
  }).then(function (value) {
    if (value) {
      window.location.href = url;
    }
  }, function (dismiss) {
    console.log("dismis", dismiss);

    if (dismiss === "cancel") {
      return false;
    }
  });
});
$(".alert-cancel").on("click", function (event) {
  event.preventDefault();
  var url = $(this).attr("href");
  swal({
    title: "Apakah Anda yakin?",
    text: "<span class='text-danger'>Anda membatalkan transaksi ini</span>",
    type: "question",
    showCancelButton: true,
    confirmButtonColor: "#0CC27E",
    cancelButtonColor: "#FF586B",
    confirmButtonText: "Ya, batalkan!",
    cancelButtonText: "Kembali",
    confirmButtonClass: "btn btn-lg btn-danger mr-2",
    cancelButtonClass: "btn btn-lg btn-default",
    buttonsStyling: false
  }).then(function (value) {
    if (value) {
      window.location.href = url;
    }
  }, function (dismiss) {
    console.log("dismis", dismiss);

    if (dismiss === "cancel") {
      return false;
    }
  });
});
$(function () {
  var regencies = $("#address").data("regencies");
  var regencyArr = regencies ? Object.keys(regencies) : [];
  reloadRegency();
  reloadDistrict();
  reloadVilage();

  for (var index = 0; index < regencyArr.length; index++) {
    $("#regency").append("<option value=\"".concat(regencyArr[index], "\">").concat(regencyArr[index], "</option>"));
  }

  var regencySelected = $("#regency").data("selected");
  var districtSelected = $("#district").data("selected");
  var villageSelected = $("#village").data("selected");

  if (regencySelected) {
    $("#regency").val(regencySelected);
    var districtArr = Object.keys(regencies[regencySelected]);
    appendDistrict(districtArr);
  }

  if (districtSelected) {
    $("#district").val(districtSelected);
    var villageArr = regencies[regencySelected][districtSelected];
    appendVillage(villageArr);
  }

  if (villageSelected) {
    $("#village").val(villageSelected);
  }

  $("#regency").on("change", function () {
    reloadDistrict();
    reloadVilage();

    if (this.value) {
      var _districtArr = Object.keys(regencies[this.value]);

      appendDistrict(_districtArr);
    }
  });
  $("#district").on("change", function () {
    reloadVilage();
    var regencySelected = $("#regency").val();

    if (this.value != "") {
      var _villageArr = regencies[regencySelected][this.value];
      appendVillage(_villageArr);
    }
  });
});

function reloadRegency() {
  $("#regency").find("option").remove().end().append("<option value=\"\">-- Pilih Kabupaten --</option>").val("");
}

function reloadDistrict() {
  $("#district").find("option").remove().end().append("<option value=\"\">-- Pilih Kecamatan --</option>").val("");
}

function reloadVilage() {
  $("#village").find("option").remove().end().append("<option value=\"\">-- Pilih Desa --</option>").val("");
}

function appendDistrict(arr) {
  for (var i = 0; i < arr.length; i++) {
    $("#district").append("<option value=\"".concat(arr[i], "\">").concat(arr[i], "</option>"));
  }
}

function appendVillage(arr) {
  for (var i = 0; i < arr.length; i++) {
    $("#village").append("<option value=\"".concat(arr[i], "\">").concat(arr[i], "</option>"));
  }
}

$(".product-type").on("change", function () {
  var val = this.value;

  if (val == "ticket") {
    $("#ticket").show();
    $("#voucher").hide();
    $(".voucher").prop("checked", false);
  } else {
    $("#voucher").show();
    $("#ticket").hide();
    $(".ticket").prop("checked", false);
  }

  $(".choose-all").prop("checked", false);
});
$(".select-all").on("click", function () {
  $(this).select();
});
$(".menu").on("click", function () {
  var isChecked = $(this).is(":checked");
  var classChild = $(this).data("child");
  $("." + classChild).prop("checked", isChecked); // $('.' + classChild).prop('disabled', !isChecked);
});
$(".choose-all").on("click", function () {
  var isChecked = $(this).is(":checked");
  var classChild = $(this).data("child");
  $("." + classChild).prop("checked", isChecked); // $('.' + classChild).prop('disabled', !isChecked);
});

function formatCurrency(amount, decimalSeparator, thousandsSeparator, nDecimalDigits) {
  var num = parseFloat(amount); //convert to float
  //default values

  decimalSeparator = decimalSeparator || ".";
  thousandsSeparator = thousandsSeparator || ",";
  nDecimalDigits = nDecimalDigits == null ? 2 : nDecimalDigits;
  var fixed = num.toFixed(nDecimalDigits); //limit or add decimal digits
  //separate begin [$1], middle [$2] and decimal digits [$4]

  var parts = new RegExp("^(-?\\d{1,3})((?:\\d{3})+)(\\.(\\d{" + nDecimalDigits + "}))?$").exec(fixed);

  if (parts) {
    //num >= 1000 || num < = -1000
    return parts[1] + parts[2].replace(/\d{3}/g, thousandsSeparator + "$&") + (parts[4] ? decimalSeparator + parts[4] : "");
  } else {
    return fixed.replace(".", decimalSeparator);
  }
}

$(document).ready(function () {
  $(".js-autocomplete").select2();
  var selected = $(".js-autocomplete").data("selected");

  if (selected) {
    $(".js-autocomplete").val(selected).change();
  }

  $(".js-autocomplete1").select2();
  var selected1 = $(".js-autocomplete1").data("selected");

  if (selected1) {
    $(".js-autocomplete1").val(selected1).change();
  }

  $(".js-autocomplete2").select2();
  var selected2 = $(".js-autocomplete2").data("selected");

  if (selected2) {
    $(".js-autocomplete2").val(selected2).change();
  }

  $(".js-autocomplete3").select2();
  var selected2 = $(".js-autocomplete3").data("selected");

  if (selected2) {
    $(".js-autocomplete3").val(selected2).change();
  }

  $(".js-autocomplete4").select2();
  var selected2 = $(".js-autocomplete4").data("selected");

  if (selected2) {
    $(".js-autocomplete4").val(selected2).change();
  }

  $(".js-autocomplete5").select2();
  var selected2 = $(".js-autocomplete5").data("selected");

  if (selected2) {
    $(".js-autocomplete5").val(selected2).change();
  }
});
$(".currencyFormat").autoNumeric("init", {
  aSep: ".",
  aDec: ",",
  mDec: 2
});
$(".form").submit(function () {
  $("input").each(function (i) {
    var self = $(this);

    try {
      var v = self.autoNumeric("get");
      self.autoNumeric("destroy");
      self.val(v);
    } catch (err) {}
  });
  return true;
});
$(".js-car-type").on("change", function () {
  var id = $(this).val();
  var json = $(this).data("json");
  var price = 0;

  if (id) {
    price = json.find(function (val) {
      return val.id == id;
    }).price;
  }

  price = formatCurrency(Math.round(price), 0, ".", ",");
  $(".js-price").text("Rp " + price);
});
$(".js-ride").on("change", function () {
  var id = $(this).val();
  var json = $(this).data("json");
  var price = 0;

  if (id) {
    price = json.find(function (val) {
      return val.id == id;
    }).price;
  }

  price = formatCurrency(Math.round(price), 0, ".", ",");
  $(".js-price").text("Rp " + price);
});
$(document).ready(function () {
  var orderData = [];

  var ticket = _toConsumableArray(getTicket());

  var voucher = _toConsumableArray(getVoucher());

  $(".js-scan").keypress(function (e) {
    if (e.which == 13) {
      var code = $(this).val();
      var url = $("#orderForm").data("url");
      console.log("url", url);
      $.ajax({
        url: url + "/" + code,
        success: function success(result) {
          console.log(result);
          addItem(orderData, result.type, result.data);
        },
        error: function error(err) {
          alert(err.responseJSON.error);
        }
      });
      $(this).val("");
    }
  });
  $(".js-scan-with-parking").keypress(function (e) {
    if (e.which == 13) {
      var code = $(this).val();
      var url = $("#orderForm").data("url");
      var totalTicket = $("#orderForm").data("total-ticket");
      if (orderData.length >= totalTicket) return true;
      $.ajax({
        url: url + "/" + code,
        success: function success(result) {
          addItem(orderData, result.type, result.data);
        },
        error: function error(err) {
          alert(err.responseJSON.error);
        }
      });
      $(this).val("");
    }
  });
  $("#orderForm .add-item").on("click", function () {
    var productType = $("#orderForm .product-type").val();
    var productId = $("#orderForm .product-id").val();
    addItem(orderData, productType, productId);
    removeList(productType, productId);
  });
  $("#orderForm .product-type").on("change", function () {
    generateList();
  });
  $('input[name="use_guide"]').on("change", function () {
    var isChecked = $(this).is(":checked");

    if (isChecked) {
      $(".js-guide").show();
    } else {
      $(".js-guide").hide();
    }
  });
  $("#cart").on("click", ".remove-item", function () {
    var key = $(this).data("key");
    var type = $(this).data("type");
    var id = $(this).data("id"); // let ticketData = getTicket()
    // let voucherData = getVoucher()
    // let item = null
    // if (type == 'ticket') {
    //     item = ticketData.find((el) => (el.id == id))
    //     console.log('item', item)
    //     ticket.push(item)
    // } else if (type == 'voucher') {
    //     item = voucherData.find((el) => (el.id == id))
    //     voucher.push(item)
    // }
    // generateList()

    orderData.splice(key, 1);
    generateCart(orderData);
  });

  function generateList() {
    var type = $("#orderForm .product-type").val();
    var data = ticket;

    if (type == "voucher") {
      data = voucher;
    }

    $("#orderForm .product-id").empty().select2({
      data: data,
      width: "100%"
    });
  }

  function removeList(productType, productId) {
    var data = ticket;

    if (productType == "voucher") {
      data = voucher;
    }

    var index = data.findIndex(function (el) {
      return el.id == productId;
    });

    if (index != -1) {
      data.splice(index, 1);
    }

    $("#orderForm .product-id").empty().select2({
      data: data,
      width: "100%"
    });
  }
});

function checkIsAvailable(data, item) {
  var index = data.findIndex(function (el) {
    return el.id == item.id;
  });
  return index != -1 ? true : false;
}

function addItem(orderData, type, item) {
  var isAvailable = checkIsAvailable(orderData, item);

  if (!isAvailable) {
    orderData.push(item);
    generateCart(orderData);
  }
}

function generateCart(orderData) {
  $("#cart").find("tr.item").remove();
  var totalPrice = 0;
  var totalItem = 0;

  if (orderData && orderData.length > 0) {
    for (var index = 0; index < orderData.length; index++) {
      totalPrice += orderData[index].price;
      totalItem++;
      $("#cart tr:last").after('<tr class="item">' + '<input type="hidden" name="orders[' + index + '][type]" value="' + orderData[index].type + '"/>' + '<input type="hidden" name="orders[' + index + '][id]" value="' + orderData[index].id + '"/>' + "<td>" + (index + 1) + "</td>" + "<td>" + orderData[index].type + "</td>" + "<td>" + orderData[index].text + "</td>" + "<td>" + orderData[index].price_display + "</td>" + '<td><i data-key="' + index + '" data-type="' + orderData[index].type + '" data-id="' + orderData[index].id + '" class="remove-item text-danger text-hover h5 nav-icon i-Close-Window font-weight-bold"></i>' + "</td>" + "</tr>");
    }
  }

  $(".total-price").text(formatCurrency(Math.round(totalPrice), 0, ".", ","));
  $(".total-item").text(totalItem);
}

function getTicket() {
  var data = $("#orderForm .product-id").data("ticket-json");
  return !data ? [] : data;
}

function getVoucher() {
  var data = $("#orderForm .product-id").data("voucher-json");
  return !data ? [] : data;
}

$(".print-checkin-parking").on("click", function (params) {
  window.print();
});
$(".js-init-focus").focus();
var hasAlert = $("div").hasClass("alert");

if (hasAlert) {
  setTimeout(function () {
    $(".alert").hide();
  }, 1500);
}

$(".test").click(function () {
  console.log("ddd");
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!**************************************************************!*\
  !*** multi ./resources/js/page.js ./resources/sass/app.scss ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/mymacbook/Documents/Projects/wahana/web/resources/js/page.js */"./resources/js/page.js");
module.exports = __webpack_require__(/*! /Users/mymacbook/Documents/Projects/wahana/web/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });