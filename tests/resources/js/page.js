// $(function(){
//     $('.picker2').pickadate({
//         format: 'd mmm yyyy'
//         // formatSubmit: 'yyyy-mm-d'
//     });
// });

$(function() {
    $(".picker2").datepicker({
        format: "d M yyyy",
        orientation: "bottom left",
        todayHighlight: true,
        autoclose: true
        // formatSubmit: 'yyyy-mm-d'
    });
});

$(".alert-confirm").on("click", function(event) {
    event.preventDefault();
    const url = $(this).attr("href");
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
    }).then(
        function(value) {
            if (value) {
                window.location.href = url;
            }
        },
        function(dismiss) {
            console.log("dismis", dismiss);
            if (dismiss === "cancel") {
                return false;
            }
        }
    );
});

$(".alert-cancel").on("click", function(event) {
    event.preventDefault();
    const url = $(this).attr("href");
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
    }).then(
        function(value) {
            if (value) {
                window.location.href = url;
            }
        },
        function(dismiss) {
            console.log("dismis", dismiss);
            if (dismiss === "cancel") {
                return false;
            }
        }
    );
});

$(function() {
    let regencies = $("#address").data("regencies");
    let regencyArr = regencies ? Object.keys(regencies) : [];

    reloadRegency();
    reloadDistrict();
    reloadVilage();

    for (let index = 0; index < regencyArr.length; index++) {
        $("#regency").append(
            `<option value="${regencyArr[index]}">${regencyArr[index]}</option>`
        );
    }
    let regencySelected = $("#regency").data("selected");
    let districtSelected = $("#district").data("selected");
    let villageSelected = $("#village").data("selected");

    if (regencySelected) {
        $("#regency").val(regencySelected);
        let districtArr = Object.keys(regencies[regencySelected]);
        appendDistrict(districtArr);
    }
    if (districtSelected) {
        $("#district").val(districtSelected);
        let villageArr = regencies[regencySelected][districtSelected];
        appendVillage(villageArr);
    }

    if (villageSelected) {
        $("#village").val(villageSelected);
    }

    $("#regency").on("change", function() {
        reloadDistrict();
        reloadVilage();
        if (this.value) {
            let districtArr = Object.keys(regencies[this.value]);
            appendDistrict(districtArr);
        }
    });

    $("#district").on("change", function() {
        reloadVilage();
        let regencySelected = $("#regency").val();
        if (this.value != "") {
            let villageArr = regencies[regencySelected][this.value];
            appendVillage(villageArr);
        }
    });
});

function reloadRegency() {
    $("#regency")
        .find("option")
        .remove()
        .end()
        .append(`<option value="">-- Pilih Kabupaten --</option>`)
        .val("");
}
function reloadDistrict() {
    $("#district")
        .find("option")
        .remove()
        .end()
        .append(`<option value="">-- Pilih Kecamatan --</option>`)
        .val("");
}
function reloadVilage() {
    $("#village")
        .find("option")
        .remove()
        .end()
        .append(`<option value="">-- Pilih Desa --</option>`)
        .val("");
}

function appendDistrict(arr) {
    for (let i = 0; i < arr.length; i++) {
        $("#district").append(`<option value="${arr[i]}">${arr[i]}</option>`);
    }
}
function appendVillage(arr) {
    for (let i = 0; i < arr.length; i++) {
        $("#village").append(`<option value="${arr[i]}">${arr[i]}</option>`);
    }
}

$(".product-type").on("change", function() {
    let val = this.value;
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

$(".select-all").on("click", function() {
    $(this).select();
});

$(".menu").on("click", function() {
    let isChecked = $(this).is(":checked");
    let classChild = $(this).data("child");
    $("." + classChild).prop("checked", isChecked);
    // $('.' + classChild).prop('disabled', !isChecked);
});

$(".choose-all").on("click", function() {
    let isChecked = $(this).is(":checked");
    let classChild = $(this).data("child");
    $("." + classChild).prop("checked", isChecked);
    // $('.' + classChild).prop('disabled', !isChecked);
});

function formatCurrency(
    amount,
    decimalSeparator,
    thousandsSeparator,
    nDecimalDigits
) {
    var num = parseFloat(amount); //convert to float
    //default values
    decimalSeparator = decimalSeparator || ".";
    thousandsSeparator = thousandsSeparator || ",";
    nDecimalDigits = nDecimalDigits == null ? 2 : nDecimalDigits;

    var fixed = num.toFixed(nDecimalDigits); //limit or add decimal digits
    //separate begin [$1], middle [$2] and decimal digits [$4]
    var parts = new RegExp(
        "^(-?\\d{1,3})((?:\\d{3})+)(\\.(\\d{" + nDecimalDigits + "}))?$"
    ).exec(fixed);

    if (parts) {
        //num >= 1000 || num < = -1000
        return (
            parts[1] +
            parts[2].replace(/\d{3}/g, thousandsSeparator + "$&") +
            (parts[4] ? decimalSeparator + parts[4] : "")
        );
    } else {
        return fixed.replace(".", decimalSeparator);
    }
}

$(document).ready(function() {
    $(".js-autocomplete").select2();
    var selected = $(".js-autocomplete").data("selected");
    if (selected) {
        $(".js-autocomplete")
            .val(selected)
            .change();
    }
    $(".js-autocomplete1").select2();
    var selected1 = $(".js-autocomplete1").data("selected");
    if (selected1) {
        $(".js-autocomplete1")
            .val(selected1)
            .change();
    }
    $(".js-autocomplete2").select2();
    var selected2 = $(".js-autocomplete2").data("selected");
    if (selected2) {
        $(".js-autocomplete2")
            .val(selected2)
            .change();
    }
    $(".js-autocomplete3").select2();
    var selected2 = $(".js-autocomplete3").data("selected");
    if (selected2) {
        $(".js-autocomplete3")
            .val(selected2)
            .change();
    }
    $(".js-autocomplete4").select2();
    var selected2 = $(".js-autocomplete4").data("selected");
    if (selected2) {
        $(".js-autocomplete4")
            .val(selected2)
            .change();
    }
    $(".js-autocomplete5").select2();
    var selected2 = $(".js-autocomplete5").data("selected");
    if (selected2) {
        $(".js-autocomplete5")
            .val(selected2)
            .change();
    }
});

$(".currencyFormat").autoNumeric("init", {
    aSep: ".",
    aDec: ",",
    mDec: 2
});

$(".form").submit(function() {
    $("input").each(function(i) {
        var self = $(this);
        try {
            var v = self.autoNumeric("get");
            self.autoNumeric("destroy");
            self.val(v);
        } catch (err) {}
    });
    return true;
});

$(".js-car-type").on("change", function() {
    let id = $(this).val();
    let json = $(this).data("json");
    let price = 0;
    if (id) {
        price = json.find(val => val.id == id).price;
    }

    price = formatCurrency(Math.round(price), 0, ".", ",");
    $(".js-price").text("Rp " + price);
});

$(".js-ride").on("change", function() {
    let id = $(this).val();
    let json = $(this).data("json");
    let price = 0;
    if (id) {
        price = json.find(val => val.id == id).price;
    }

    price = formatCurrency(Math.round(price), 0, ".", ",");
    $(".js-price").text("Rp " + price);
});

$(document).ready(function() {
    let orderData = [];
    let ticket = [...getTicket()];
    let voucher = [...getVoucher()];

    $(".js-scan").keypress(function(e) {
        if (e.which == 13) {
            let code = $(this).val();
            let url = $("#orderForm").data("url");
            console.log("url", url);

            $.ajax({
                url: url + "/" + code,
                success: function(result) {
                    console.log(result);
                    addItem(orderData, result.type, result.data);
                },
                error: function(err) {
                    alert(err.responseJSON.error);
                }
            });
            $(this).val("");
        }
    });

    $(".js-scan-with-parking").keypress(function(e) {
        if (e.which == 13) {
            let code = $(this).val();
            let url = $("#orderForm").data("url");
            let totalTicket = $("#orderForm").data("total-ticket");
            if (orderData.length >= totalTicket) return true;

            $.ajax({
                url: url + "/" + code,
                success: function(result) {
                    addItem(orderData, result.type, result.data);
                },
                error: function(err) {
                    alert(err.responseJSON.error);
                }
            });
            $(this).val("");
        }
    });

    $("#orderForm .add-item").on("click", function() {
        let productType = $("#orderForm .product-type").val();
        let productId = $("#orderForm .product-id").val();
        addItem(orderData, productType, productId);
        removeList(productType, productId);
    });

    $("#orderForm .product-type").on("change", function() {
        generateList();
    });

    $('input[name="use_guide"]').on("change", function() {
        let isChecked = $(this).is(":checked");
        if (isChecked) {
            $(".js-guide").show();
        } else {
            $(".js-guide").hide();
        }
    });
    $("#cart").on("click", ".remove-item", function() {
        let key = $(this).data("key");
        let type = $(this).data("type");
        let id = $(this).data("id");

        // let ticketData = getTicket()
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
        let type = $("#orderForm .product-type").val();
        let data = ticket;
        if (type == "voucher") {
            data = voucher;
        }

        $("#orderForm .product-id")
            .empty()
            .select2({
                data: data,
                width: "100%"
            });
    }

    function removeList(productType, productId) {
        let data = ticket;
        if (productType == "voucher") {
            data = voucher;
        }
        let index = data.findIndex(el => el.id == productId);
        if (index != -1) {
            data.splice(index, 1);
        }
        $("#orderForm .product-id")
            .empty()
            .select2({
                data: data,
                width: "100%"
            });
    }
});

function checkIsAvailable(data, item) {
    let index = data.findIndex(el => el.id == item.id);
    return index != -1 ? true : false;
}

function addItem(orderData, type, item) {
    let isAvailable = checkIsAvailable(orderData, item);
    if (!isAvailable) {
        orderData.push(item);
        generateCart(orderData);
    }
}

function generateCart(orderData) {
    $("#cart")
        .find("tr.item")
        .remove();
    let totalPrice = 0;
    let totalItem = 0;
    if (orderData && orderData.length > 0) {
        for (let index = 0; index < orderData.length; index++) {
            totalPrice += orderData[index].price;
            totalItem++;
            $("#cart tr:last").after(
                '<tr class="item">' +
                    '<input type="hidden" name="orders[' +
                    index +
                    '][type]" value="' +
                    orderData[index].type +
                    '"/>' +
                    '<input type="hidden" name="orders[' +
                    index +
                    '][id]" value="' +
                    orderData[index].id +
                    '"/>' +
                    "<td>" +
                    (index + 1) +
                    "</td>" +
                    "<td>" +
                    orderData[index].type +
                    "</td>" +
                    "<td>" +
                    orderData[index].text +
                    "</td>" +
                    "<td>" +
                    orderData[index].price_display +
                    "</td>" +
                    '<td><i data-key="' +
                    index +
                    '" data-type="' +
                    orderData[index].type +
                    '" data-id="' +
                    orderData[index].id +
                    '" class="remove-item text-danger text-hover h5 nav-icon i-Close-Window font-weight-bold"></i>' +
                    "</td>" +
                    "</tr>"
            );
        }
    }
    $(".total-price").text(formatCurrency(Math.round(totalPrice), 0, ".", ","));
    $(".total-item").text(totalItem);
}

function getTicket() {
    let data = $("#orderForm .product-id").data("ticket-json");
    return !data ? [] : data;
}

function getVoucher() {
    let data = $("#orderForm .product-id").data("voucher-json");
    return !data ? [] : data;
}

$(".print-checkin-parking").on("click", function(params) {
    window.print();
});

$(".js-init-focus").focus();

let hasAlert = $("div").hasClass("alert");
if (hasAlert) {
    setTimeout(() => {
        $(".alert").hide();
    }, 1500);
}

$(".test").click(function() {
    console.log("ddd");
});
