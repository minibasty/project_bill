function confirm_print() {
  var y = confirm("ยืนยันการปริ้น");
  if (y == true) {
    console.log("come On !!!!!!")
    setInvoiceTotal();
  }
}

function confirm_swal2(ele) {

  var form = document.getElementById('form-service');
  var isValidForm = form.checkValidity();
  if (isValidForm === false) {
    console.log(isValidForm)
    Swal.fire({
      text: 'กรุณากรอกยอดเงิน',
      icon: 'error',
      // showCancelButton: true,
      confirmButtonColor: '#ff8080',
      confirmButtonText: 'ปิด'

    }).then((result) => {
      if (result.value) {
        setInvoiceTotal(ele.id);
      }
    });
  } else {
    Swal.fire({
      text: 'ยืนยันการปริ้น',
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ยินยันการปริ้น',
      cancelButtonText: 'ยกเลิก'

    }).then((result) => {
      if (result.value) {
        setInvoiceTotal(ele.id);
      }
    });
  }


}

function getAddressCus(value) {
  var id_value = value;
  // console.log(id_value);
  function getDataJson() {
    $.ajax({
      type: "POST",
      url: "invoice/model/model_customer.php",
      data: {
        param_id: id_value
      },
      success: function (data) {
        //   console.log(data);
        var result = JSON.parse(data);
        document.getElementById("cus_id").value = result.cus_id;
        document.getElementById("cus_address").innerHTML = result.cus_address;
        document.getElementById("cus_taxno").value = result.cus_taxno;
        document.getElementById("cus_company").value = result.cus_company;
        document.getElementById("cus_name").value = result.cus_name;
        document.getElementById("cus_tel").value = result.cus_tel;
        document.getElementById("cus_user").value = result.cus_user;
        document.getElementById("cus_mail").value = result.cus_mail;
      }
    });
  }
  getDataJson();
}

// change invoice number
function changeinvNumber(dateValue) {
  // alert("come");
  // var dateValue = document.getElementById("customer").value;
  var date = dateValue.split("-");
  var day = date[0];
  var month = date[1];
  var year = date[2] - 543;
  //   console.log(day + month + year);
  function getNumber() {
    //   alert("getnumber");
    $.ajax({
      type: "POST",
      url: "invoice/model/model_invoiceNumber.php",
      data: {
        day: day,
        month: month,
        year: year
      },
      // data: { param_id: id_value },
      success: function (data) {
        console.log(data);
        var inv_data = JSON.parse(data);
        document.getElementById("dateThai").value = inv_data.dateThai;
        document.getElementById("inv_date").value = inv_data.dateEng;
        document.getElementById("alert-show").innerHTML = inv_data.all;
        document.getElementById("numberBillShow").innerHTML = inv_data.all;
        document.getElementById("inv_prefix").value = inv_data.prefix;
        document.getElementById("inv_m").value = inv_data.month;
        document.getElementById("inv_y").value = inv_data.year;
        document.getElementById("inv_count").value = inv_data.count;
        document.getElementById("inv_all").value = inv_data.all;
      }
    });
  }
  getNumber();
}
// check Param get
checkurl();

function checkurl() {
  const getParam = getSearchParameters();
  // if have parameter name is inv
  if (getParam.inv) {
    // alert('have')

    document.getElementById("cus_address").readOnly = "true";
    document.getElementById("cus_taxno").readOnly = "true";
    document.getElementById("cus_company").readOnly = "true";
    document.getElementById("cus_name").readOnly = "true";
    document.getElementById("cus_tel").readOnly = "true";
    document.getElementById("cus_user").readOnly = "true";
    document.getElementById("cus_mail").readOnly = "true";

    // toggle button
    document.getElementById("ok_head").style.display = "none";
    document.getElementById("close_bill").style.display = "inline";
  }
}

function getSearchParameters() {
  var prmstr = window.location.search.substr(1);
  return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
}

function transformToAssocArray(prmstr) {
  var params = {};
  var prmarr = prmstr.split("&");
  for (var i = 0; i < prmarr.length; i++) {
    var tmparr = prmarr[i].split("=");
    params[tmparr[0]] = tmparr[1];
  }
  // console.log(params);
  return params;
}

function checkFrm() {
  const inv_id = document.inv_head.inv_id;
  //   console.log(inv_id);
  //   inv_id = 0 is create new HEad
  if (inv_id.value == 0) {
    const customerSelect = document.inv_head.customer;
    const billDate = document.inv_head.billDate;
    if (customerSelect.value === "") {
      customerSelect.focus();
      alert("กรุณาเลือกลูกค้าก่อนครับ");
      return false;
    } else if (billDate.value === "") {
      billDate.focus();
      alert("กรุณาเลือกวันที่ก่อนครับ");
      return false;
    } else {
      return true;
    }
  } else {
    return true;
  }

  // console.log(customerSelect);
}

function changeServiceDetail(id, data) {
  const eleOk = "okDetail" + id;

  function setDataDetail() {
    $.ajax({
      type: "POST",
      url: "invoice/model/model_changeService_detail.php",
      data: {
        id: id,
        detail: data
      },
      success: function (result) {
        const x = document.getElementById(eleOk);
        if (result == "ok") {
          x.style.display = "inline";
          setTimeout(function () {
            x.style.display = "none";
          }, 2000);
        }
      }
    });
  }

  if (data.trim() != "") {
    setDataDetail();
  }
}

function changeServiceTotal(id, data) {
  const eleOk = "okTotal" + id;

  function setDataTotal() {
    $.ajax({
      type: "POST",
      url: "invoice/model/model_changeService_total.php",
      data: {
        id: id,
        total: data
      },
      success: function (result) {
        const x = document.getElementById(eleOk);
        if (result == "ok") {
          x.style.display = "inline";
          setTimeout(function () {
            x.style.display = "none";
          }, 1000);
          updateTotalPrice();
        }
      }
    });
  }

  setDataTotal();
}

function changeInvoiceVat(ele) {
  const invId = document.getElementById("inv_id").value;
  var vatValue = ele.value;

  function setDataVat() {
    $.ajax({
      type: "POST",
      url: "invoice/model/model_changeInvoice_vat.php",
      data: {
        id: invId,
        vat: vatValue
      },
      success: function (result) {
        console.log(result);
        if (result == "ok") {
          updateTotalPrice();
        }
      }
    });
  }
  setDataVat();
}

function changeInvoiceWithholding(ele) {
  const invId = document.getElementById("inv_id").value;
  var withholding = ele;
  console.log(withholding);

  function setDatawithholding() {
    $.ajax({
      type: "POST",
      url: "invoice/model/model_changeInvoice_withholding.php",
      data: {
        id: invId,
        withholding: withholding
      },
      success: function (result) {
        console.log(result);
        if (result == "ok") {
          updateTotalPrice();
        }
      }
    });
  }
  setDatawithholding();
}

function setInvoiceTotal(eleId) {
  const invId = document.getElementById("inv_id").value;
  const totalPay = document.getElementById("totalPay").value;

  if (totalPay > 0) {
    setTotalInvoice();
  }

  function setTotalInvoice() {
    $.ajax({
      type: "POST",
      url: "invoice/model/model_changeInvoice_total.php",
      data: {
        id: invId,
        totalpay: totalPay
      },
      success: function (result) {
        console.log(result);
        if (result == "ok") {
          getPdf(eleId);
        }
      }
    });
  }

  function getPdf(filename) {
    window.open(filename + ".php?inv_id=" + invId, "_blank");
    showSuccessprint();
  }

  function showSuccessprint() {
    document.getElementById("printSuccess").style.display = "block";
  }
}

function updateTotalPrice() {
  var vatValue = 0;
  const invId = document.getElementById("inv_id").value;
  const vat = document.getElementById("value_vat");
  const withhodingValue = document.getElementById("value_withholding").value;
  if (vat.checked == true) {
    vatValue = 7;
  }
  // console.log(withhodingValue);
  $.ajax({
    type: "POST",
    url: "invoice/model/model_updateService_total.php",
    data: {
      inv_id: invId
    },
    success: function (result) {
      console.log(result);
      var data = JSON.parse(result);
      document.getElementById("totalPrice").value = data.price;
      document.getElementById("vat").value = data.vat;
      document.getElementById("priceNovatStr").value = data.priceNovat;
      document.getElementById("totalVat").value = data.priceSum;
      document.getElementById("withholding").value = data.withholding;
      document.getElementById("totalPay").value = data.totalPay;
      var thaibath = "(" + BAHTTEXT(data.priceSum) + ")";
      document.getElementById("bahtText").innerHTML = thaibath;
    }
  });
}

function fxprintInvoice() {
  // console.log("come");
  const inv_id = document.getElementById("inv_id").value;
  if (inv_id > 0) {
    getPdf();
  }
}

function chkNumber(ele) {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar < "0" || vchar > "9") && vchar != ".") return false;
  ele.onKeyPress = vchar;
}

function BAHTTEXT(num, suffix) {
  "use strict";

  if (typeof suffix === "undefined") {
    suffix = "บาทถ้วน";
  }

  num = num || 0;
  num = num.toString().replace(/[, ]/g, ""); // remove commas, spaces

  if (isNaN(num) || Math.round(parseFloat(num) * 100) / 100 === 0) {
    return "ศูนย์บาทถ้วน";
  } else {
    var t = ["", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน"],
      n = [
        "",
        "หนึ่ง",
        "สอง",
        "สาม",
        "สี่",
        "ห้า",
        "หก",
        "เจ็ด",
        "แปด",
        "เก้า"
      ],
      len,
      digit,
      text = "",
      parts,
      i;

    if (num.indexOf(".") > -1) {
      // have decimal

      /*
       * precision-hack
       * more accurate than parseFloat the whole number
       */

      parts = num.toString().split(".");

      num = parts[0];
      parts[1] = parseFloat("0." + parts[1]);
      parts[1] = (Math.round(parts[1] * 100) / 100).toString(); // more accurate than toFixed(2)
      parts = parts[1].split(".");

      if (parts.length > 1 && parts[1].length === 1) {
        parts[1] = parts[1].toString() + "0";
      }

      num = parseInt(num, 10) + parseInt(parts[0], 10);

      /*
       * end - precision-hack
       */
      text = num ? BAHTTEXT(num) : "";

      if (parseInt(parts[1], 10) > 0) {
        text = text.replace("ถ้วน", "") + BAHTTEXT(parts[1], "สตางค์");
      }

      return text;
    } else {
      if (num.length > 7) {
        // more than (or equal to) 10 millions

        var overflow = num.substring(0, num.length - 6);
        var remains = num.slice(-6);
        return (
          BAHTTEXT(overflow).replace("บาทถ้วน", "ล้าน") +
          BAHTTEXT(remains).replace("ศูนย์", "")
        );
      } else {
        len = num.length;
        for (i = 0; i < len; i = i + 1) {
          digit = parseInt(num.charAt(i), 10);
          if (digit > 0) {
            if (
              len > 2 &&
              i === len - 1 &&
              digit === 1 &&
              suffix !== "สตางค์"
            ) {
              text += "เอ็ด" + t[len - 1 - i];
            } else {
              text += n[digit] + t[len - 1 - i];
            }
          }
        }

        // grammar correction
        text = text.replace("หนึ่งสิบ", "สิบ");
        text = text.replace("สองสิบ", "ยี่สิบ");
        text = text.replace("สิบหนึ่ง", "สิบเอ็ด");

        return text + suffix;
      }
    }
  }
}

function setInvoiceData() {
  const invId = document.getElementById("inv_id").value;

  function setDataInvoice() {
    $.ajax({
      type: "POST",
      url: "invoice/invoice_pdf.php",
      data: {
        id: invId
      },
      success: function (result) {
        // console.log(result);
        alert(result);
      }
    });
  }
  setDataInvoice();
}

function editCustomer() {
  // console.log('come')
  // close readOnly
  document.getElementById("cus_address").readOnly = false;
  document.getElementById("cus_taxno").readOnly = false;
  document.getElementById("cus_company").readOnly = false;
  document.getElementById("cus_name").readOnly = false;
  document.getElementById("cus_tel").readOnly = false;
  //   document.getElementById("cus_user").readOnly = false;
  document.getElementById("cus_mail").readOnly = false;

  // hide service list
  document.getElementById("sevrice_list").style.display = "none";

  // toggle button
  document.getElementById("ok_head").style.display = "inline";
  document.getElementById("close_bill").style.display = "none";

  // hide edit_customer button
  document.getElementById("edit_cus").style.display = "none";
}

function swal2Success(url) {
  Swal.fire({
    icon: "success",
    text: "แก้ไขข้อมูลสำเร็จ",
    showConfirmButton: false,
    timer: 1500
  }).then(result => {
    window.location = url;
  });
}

function swal2Error(msg, url) {
  var msgArray = msg.split(" ");
  console.log(msgArray);
  if (msgArray["0"] == "Duplicate") {
    swal2Show("เพิ่มรายการไม่สำเร็จ", "รายการที่เลือกซ้ำ")
  } else {

  }

  function swal2Show(title, massage) {
    Swal.fire({
      icon: "error",
      title: title,
      text: massage,
      showConfirmButton: true,
      backdrop: `rgba(0,0,123,0.4)`
    });
  }
}