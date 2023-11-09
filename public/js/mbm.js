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

/***/ "./resources/js/mbm.js":
/*!*****************************!*\
  !*** ./resources/js/mbm.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

// $(function(){
//     $('.picker2').pickadate({
//         format: 'd mmm yyyy'
//         // formatSubmit: 'yyyy-mm-d'
//     });
// });
$(function () {
  $('.picker2').datepicker({
    format: 'd M yyyy',
    orientation: 'bottom left',
    todayHighlight: true,
    autoclose: true // formatSubmit: 'yyyy-mm-d'

  });
});
$('.alert-confirm').on('click', function (event) {
  event.preventDefault();
  var url = $(this).attr('href');
  swal({
    title: 'Apakah Anda yakin?',
    text: "Anda ingin menghapus data ini",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#0CC27E',
    cancelButtonColor: '#FF586B',
    confirmButtonText: 'Ya, hapus!',
    cancelButtonText: 'Tidak',
    confirmButtonClass: 'btn btn-lg btn-success mr-5',
    cancelButtonClass: 'btn btn-lg btn-danger',
    buttonsStyling: false
  }).then(function (value) {
    if (value) {
      window.location.href = url;
    }
  }, function (dismiss) {
    console.log('dismis', dismiss);

    if (dismiss === 'cancel') {
      return false;
    }
  });
});
$('.alert-approve').on('click', function (event) {
  event.preventDefault();
  swal({
    title: 'Apakah Anda yakin?',
    text: "<span class='text-success'>Anda menyetujui pinjaman ini</span>",
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#0CC27E',
    cancelButtonColor: '#FF586B',
    confirmButtonText: 'Ya, setuju!',
    cancelButtonText: 'Batal',
    confirmButtonClass: 'btn btn-lg btn-success mr-5',
    cancelButtonClass: 'btn btn-lg btn-danger',
    buttonsStyling: false
  }).then(function (value) {
    if (value) {
      $('.approve-form').submit();
    }
  }, function (dismiss) {
    console.log('dismis', dismiss);

    if (dismiss === 'cancel') {
      return false;
    }
  });
});
$('.alert-reject').on('click', function (event) {
  event.preventDefault();
  swal({
    title: 'Apakah Anda yakin?',
    text: "<span class='text-danger'>Anda tidak menyetujui pinjaman ini</span>",
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#0CC27E',
    cancelButtonColor: '#FF586B',
    confirmButtonText: 'Ya, tidak setuju!',
    cancelButtonText: 'Batal',
    confirmButtonClass: 'btn btn-lg btn-success mr-5',
    cancelButtonClass: 'btn btn-lg btn-danger',
    buttonsStyling: false
  }).then(function (value) {
    if (value) {
      window.location.href = url;
    }
  }, function (dismiss) {
    console.log('dismis', dismiss);

    if (dismiss === 'cancel') {
      return false;
    }
  });
});
$('.alert-realize').on('click', function (event) {
  event.preventDefault();
  swal({
    title: 'Apakah Anda yakin?',
    text: "<span class='text-success'>Anda merealisasikan pinjaman ini</span>",
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#0CC27E',
    cancelButtonColor: '#FF586B',
    confirmButtonText: 'Ya, realisasikan!',
    cancelButtonText: 'Batal',
    confirmButtonClass: 'btn btn-lg btn-success mr-5',
    cancelButtonClass: 'btn btn-lg btn-danger',
    buttonsStyling: false
  }).then(function (value) {
    if (value) {
      $('.realize-form').submit();
    }
  }, function (dismiss) {
    console.log('dismis', dismiss);

    if (dismiss === 'cancel') {
      return false;
    }
  });
});
$(function () {
  var regencies = $('#address').data('regencies');
  var regencyArr = regencies ? Object.keys(regencies) : [];
  reloadRegency();
  reloadDistrict();
  reloadVilage();

  for (var index = 0; index < regencyArr.length; index++) {
    $('#regency').append("<option value=\"".concat(regencyArr[index], "\">").concat(regencyArr[index], "</option>"));
  }

  var regencySelected = $('#regency').data('selected');
  var districtSelected = $('#district').data('selected');
  var villageSelected = $('#village').data('selected');

  if (regencySelected) {
    $('#regency').val(regencySelected);
    var districtArr = Object.keys(regencies[regencySelected]);
    appendDistrict(districtArr);
  }

  if (districtSelected) {
    $('#district').val(districtSelected);
    var villageArr = regencies[regencySelected][districtSelected];
    appendVillage(villageArr);
  }

  if (villageSelected) {
    $('#village').val(villageSelected);
  }

  $('#regency').on('change', function () {
    reloadDistrict();
    reloadVilage();

    if (this.value) {
      var _districtArr = Object.keys(regencies[this.value]);

      appendDistrict(_districtArr);
    }
  });
  $('#district').on('change', function () {
    reloadVilage();
    var regencySelected = $('#regency').val();

    if (this.value != '') {
      var _villageArr = regencies[regencySelected][this.value];
      appendVillage(_villageArr);
    }
  });
});

function reloadRegency() {
  $('#regency').find('option').remove().end().append("<option value=\"\">-- Pilih Kabupaten --</option>").val('');
}

function reloadDistrict() {
  $('#district').find('option').remove().end().append("<option value=\"\">-- Pilih Kecamatan --</option>").val('');
}

function reloadVilage() {
  $('#village').find('option').remove().end().append("<option value=\"\">-- Pilih Desa --</option>").val('');
}

function appendDistrict(arr) {
  for (var i = 0; i < arr.length; i++) {
    $('#district').append("<option value=\"".concat(arr[i], "\">").concat(arr[i], "</option>"));
  }
}

function appendVillage(arr) {
  for (var i = 0; i < arr.length; i++) {
    $('#village').append("<option value=\"".concat(arr[i], "\">").concat(arr[i], "</option>"));
  }
} //loan application


$('.show-loan-system').on('click', function () {
  var loanSystems = $('#loanSystem').data('loan-systems');
  var idSelected = $('#loanSystemSelected').val();

  if (idSelected) {
    $('#loanSystemModal').modal('toggle');
    var loanSelected = loanSystems.find(function (item) {
      return item.id == idSelected;
    });
    $('#interest').text(loanSelected.interest);
    $('#type').text(loanSelected.type);
    $('#tenor').text(loanSelected.tenor);
    $('#gracePeriod').text(loanSelected.grace_period);
    $('#principalPaymentTime').text(loanSelected.principal_payment_time);
    $('#servicePaymentTime').text(loanSelected.service_payment_time);
    $('#isGuarantee').text(loanSelected.is_guarantee ? 'Ya' : 'Tidak');
    $('#fine').text(loanSelected.fine);
  }
});
$('.loan-source').on('change', function () {
  var val = this.value;

  if (val == 'mbm-saving') {
    $('.all-loan-source').show();
  } else {
    $('.all-loan-source').hide();
  }
});
$('.select-all').on('click', function () {
  $(this).select();
});
$('.menu').on('click', function () {
  var isChecked = $(this).is(':checked');
  var classChild = $(this).data('child');
  $('.' + classChild).prop('checked', isChecked); // $('.' + classChild).prop('disabled', !isChecked);
});
$('.include-interest').on('click', function () {
  installmentCalculate();
});
$('.include-fine').on('click', function () {
  installmentCalculate();
});
$('.main-amount').on('change', function () {
  installmentCalculate();
});

function formatCurrency(amount, decimalSeparator, thousandsSeparator, nDecimalDigits) {
  var num = parseFloat(amount); //convert to float  
  //default values  

  decimalSeparator = decimalSeparator || '.';
  thousandsSeparator = thousandsSeparator || ',';
  nDecimalDigits = nDecimalDigits == null ? 2 : nDecimalDigits;
  var fixed = num.toFixed(nDecimalDigits); //limit or add decimal digits  
  //separate begin [$1], middle [$2] and decimal digits [$4]  

  var parts = new RegExp('^(-?\\d{1,3})((?:\\d{3})+)(\\.(\\d{' + nDecimalDigits + '}))?$').exec(fixed);

  if (parts) {
    //num >= 1000 || num < = -1000  
    return parts[1] + parts[2].replace(/\d{3}/g, thousandsSeparator + '$&') + (parts[4] ? decimalSeparator + parts[4] : '');
  } else {
    return fixed.replace('.', decimalSeparator);
  }
}

function installmentCalculate() {
  var amounts = $('.installment-payment').data('amounts');
  var mainAmount = $('.main-amount').autoNumeric('get');
  var amount = isNaN(parseFloat(mainAmount)) ? 0 : parseFloat(mainAmount);
  var isInterestChecked = $('.include-interest').is(':checked');
  var isFineChecked = $('.include-fine').is(':checked');

  if (isInterestChecked) {
    amount += amounts['interest'];
  }

  if (isFineChecked) {
    amount += amounts['fine'];
  }

  amount = formatCurrency(Math.round(amount), 0, ".", ",");
  $('.payment-amount').text(amount);
}

$(document).ready(function () {
  $('.js-autocomplete').select2();
  var selected = $('.js-autocomplete').data('selected');

  if (selected) {
    $('.js-autocomplete').val(selected).change();
  }

  $('.js-autocomplete1').select2();
  var selected1 = $('.js-autocomplete1').data('selected');

  if (selected1) {
    $('.js-autocomplete1').val(selected1).change();
  }

  $('.js-autocomplete2').select2();
  var selected2 = $('.js-autocomplete2').data('selected');

  if (selected2) {
    $('.js-autocomplete2').val(selected2).change();
  }

  $('.js-autocomplete3').select2();
  var selected2 = $('.js-autocomplete3').data('selected');

  if (selected2) {
    $('.js-autocomplete3').val(selected2).change();
  }

  $('.js-autocomplete4').select2();
  var selected2 = $('.js-autocomplete4').data('selected');

  if (selected2) {
    $('.js-autocomplete4').val(selected2).change();
  }

  $('.js-autocomplete5').select2();
  var selected2 = $('.js-autocomplete5').data('selected');

  if (selected2) {
    $('.js-autocomplete5').val(selected2).change();
  }
});
$('.currencyFormat').autoNumeric("init", {
  aSep: '.',
  aDec: ',',
  mDec: 2
});
$('.form').submit(function () {
  $('input').each(function (i) {
    var self = $(this);

    try {
      var v = self.autoNumeric('get');
      self.autoNumeric('destroy');
      self.val(v);
    } catch (err) {}
  });
  return true;
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
/*!*************************************************************!*\
  !*** multi ./resources/js/mbm.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/mymacbook/Documents/Projects/koprasi/web/resources/js/mbm.js */"./resources/js/mbm.js");
module.exports = __webpack_require__(/*! /Users/mymacbook/Documents/Projects/koprasi/web/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });