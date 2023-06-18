function addCustomerAccountNumber() {
  var errormessage = ById("errormessage");
  var bank = ById("bank").value;
  var accountnumber = ById("accountnumber").value;
  var balance = ById("balance").value;
  var branchname = ById("branchname").value;
  var location = ById("location").value;
  var country = ById("country").value;
  var loading = byId("loading");
  if (getStringLength(accountnumber) < 13) {
    errormessage.innerHTML = `<div class="alert alert-success text-center" role="alert">
                Account Number should be 15 numbers
            </div>`;
    exit();
  }
  var fd = new FormData();
  fd.append("bank", bank);
  fd.append("accountnumber", accountnumber);
  fd.append("balance", balance);
  fd.append("branchname", branchname);
  fd.append("location", location);
  fd.append("country", country);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", BASEURL + "addaccount", true);
  loading.innerHTML = "Please Wailt";
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      loading.innerHTML = "Please Wailt";
      var resp = JSON.parse(this.responseText);
      if (resp.response == true) {
        errormessage.innerHTML = `<div class="alert alert-success text-center" role="alert">
                ${resp.success_message}
            </div>`;
        loading.innerHTML = "SUBMIT";
        setTimeout(function () {
          errormessage.style.display = "none";
        }, 5000);
      } else {
        errormessage.innerHTML = `<div class="alert alert-danger text-center" role="alert">
                ${resp.error_message}
            </div>`;
        loading.innerHTML = "SUBMIT";
        setTimeout(function () {
          errormessage.style.display = "none";
        }, 5000);
      }
    }
  };
  xhr.send(fd);
}
function viewaccountcard(accountid) {
  var accountnumberid = ById("accountnumberid");
  var account_Id = ById("account_Id");
  var cardtype = ById("cardtype");
  var cardnumber = ById("card-number");
  var enddate = ById("end-date");
  var cardholder = ById("card-holder");
  var ccv = ById("ccv");
  var terms = ById("terms");

  var xhr = new XMLHttpRequest();
  xhr.open("GET", BASEURL + "viewaccountcard/" + accountid, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      if (this.responseText != null) {
        var resp = JSON.parse(this.responseText);
        console.log(resp);
        accountnumberid.innerHTML = "Accoun Number# " + resp.accountnumber;
        account_Id.value = resp.accountid;
        cardtype.innerHTML = resp.cardtype;
        formatCardNumber(cardnumber, resp.cardnumber);
        enddate.innerHTML = formatDate(resp.enddate);
        cardholder.innerHTML = resp.cardholder;
        ccv.innerHTML = resp.ccv;
        terms.innerHTML = `<p>This card is property of ${resp.bank}. Misuse is criminal offence. If found, please return to ${resp.bank}. or to the nearest bank with ${resp.cardtype}. logo.</p>
                <p>Use of this card is subject to the credit card agreement.</p>`;
      }
    }
  };
  xhr.send();
}

function addCustomerCredit() {
  var crediterrormessage = ById("crediterrormessage");
  var loadingcre = ById("loadingcre");
  var account_Id = ById("account_Id").value;
  var name = ById("name").value;
  var ac_number = ById("ac_number").value;
  var cvv = ById("cvv").value;
  var expiry_date = ById("expiry_date").value;
  var pin = ById("pin").value;

  var isvisa = isVisaCardNumber(ac_number);
  var ismastercard = isMastercard(ac_number);
  var isvaliddateexpiry = isValidcardDate(expiry_date);
  var iscvv = isValidCVV(cvv);
  if (
    (isvisa == false && name == "VISA") ||
    (isvisa == false && name == "ECOBANK VISA") ||
    (isvisa == false && name == "STEWART VISA") ||
    (isvisa == false && name == "FBC VISA")
  ) {
    crediterrormessage.innerHTML = `<div class="alert alert-danger text-center" role="alert">
                Invalid VISA card number!!
            </div>`;
  } else if (
    (ismastercard == false && name == "MASTERCARD") ||
    (ismastercard == false && name == "BARCLAYS MASTERCARD")
  ) {
    crediterrormessage.innerHTML = `<div class="alert alert-danger text-center" role="alert">
                Invalid MASTERCARD card number!!
            </div>`;
  } else {
    if (iscvv == false) {
      crediterrormessage.innerHTML = `<div class="alert alert-danger text-center" role="alert">
                Invalid cvv number!!
            </div>`;
    }

    // if (isvaliddateexpiry == false) {
    //     crediterrormessage.innerHTML = `<div class="alert alert-danger text-center" role="alert">
    //         Expiry date of this credit card is less than current date. Please consult the Card Provider for renewal!!
    //     </div>`;
    // }

    var fd = new FormData();
    fd.append("account_Id", account_Id);
    fd.append("name", name);
    fd.append("ac_number", ac_number);
    fd.append("cvv", cvv);
    fd.append("expiry_date", expiry_date);
    fd.append("pin", pin);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", BASEURL + "addcreditcard", true);
    loadingcre.innerHTML = "Please Wailt";
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        loadingcre.innerHTML = "Please Wailt";
        var resp = JSON.parse(this.responseText);
        if (resp.response == true) {
          crediterrormessage.innerHTML = `<div class="alert alert-success text-center" role="alert">
                  ${resp.success_message}
              </div>`;
          loadingcre.innerHTML = "SUBMIT";
          setTimeout(function () {
            crediterrormessage.style.display = "none";
          }, 5000);
        } else {
          crediterrormessage.innerHTML = `<div class="alert alert-danger text-center" role="alert">
                  ${resp.error_message}
              </div>`;
          loadingcre.innerHTML = "SUBMIT";
          setTimeout(function () {
            crediterrormessage.style.display = "none";
          }, 5000);
        }
      }
    };
    xhr.send(fd);
  }
}

function makepayment(id) {
  var ordernumber = byId("ordernumber");
  var order_Id = byId("order_Id");
  var customer_Id = byId("customer_Id");
  var total_amt = byId("total_amt");

  var xhr = new XMLHttpRequest();
  xhr.open("GET", BASEURL + "order/" + id, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      if (this.responseText != null) {
        var resp = JSON.parse(this.responseText);
        ordernumber.innerHTML = resp["id"];
        order_Id.value = resp["id"];
        customer_Id.value = resp["customer_Id"];
        total_amt.value = resp["total_amt"];
      }
    }
  };
  xhr.send();
}

function finishpayment() {
  var errormessage = byId("errormessage");
  var cardnumber = byId("cardnumber").value;
  var order_Id = byId("order_Id").value;
  var customer_Id = byId("customer_Id").value;
  var card_type = byId("card_type").value;
  var total_amt = byId("total_amt").value;
  var card_cvc = byId("card_cvc").value;
  var card_expiry = byId("card_expiry").value;
  var loading = byId("loading");
  var datefomat = isValidcardDate(card_expiry);

  var iscvv = isValidCVV(card_cvc);
  if (iscvv == false) {
    errormessage.innerHTML = `<div class="alert alert-danger text-center" role="alert">
                   Invalid cvv number!!
               </div>`;
  }
  if (datefomat == false) {
    errormessage.innerHTML = `<div class="alert alert-danger text-center" role="alert">
        Expiry date is not in correct format MM/YY eg 12/34
    </div>`;
  } else {
    var fd = new FormData();
    fd.append("card_type", card_type);
    fd.append("order_Id", order_Id);
    fd.append("customer_Id", customer_Id);
    fd.append("total_amt", total_amt);
    fd.append("cardnumber", cardnumber);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", BASEURL + "order/payment", true);

    loading.innerHTML = "Please Wailt";
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        loading.innerHTML = "Please Wailt";
        console.log(this.responseText)
         var resp = JSON.parse(this.responseText);
        if(resp.error_message=="Fraud Detected!!"){
          alert("Fraud Detected!!");
        }
        else if(resp.error_message=="You have insufficient amount in your account"){
          alert("You have insufficient amount in your account");
        }
        else if (resp.response == true) {
          alert("Order has been paid successfully");
          setTimeout(function () {
            loading.innerHTML = "SUBMIT";
            window.history.back();
          }, 5000);

          setTimeout(function () {
            
          }, 100);
        } else if (resp.response == false) {
          alert(resp.error_message);
        } 
      }
    };
    xhr.send(fd);
  }
}

function loadchart() {
  var ctx = ById("myChart").getContext("2d");
  var xhr = new XMLHttpRequest();
  xhr.open("GET", BASEURL + "api/load", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      if (this.responseText != null) {
        var transactions = JSON.parse(this.responseText);

        const amountsByMonth = {};

        transactions.forEach((transaction) => {
          const month = new Date(transaction.created_at).toLocaleString(
            "default",
            { month: "long" }
          ); // extract full month name
          if (!amountsByMonth[month]) {
            amountsByMonth[month] = 0;
          }
          amountsByMonth[month] += transaction.amount;
        });
        const labels = Object.keys(amountsByMonth);
        const data = Object.values(amountsByMonth);

        console.log(labels);

        var myChart = new Chart(ctx, {
          type: "bar",
          data: {
            labels: labels,
            datasets: [
              {
                label: "My Transactions",
                data: data,
                backgroundColor: [
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(153, 102, 255, 0.2)",
                  "rgba(255, 159, 64, 0.2)",
                ],
                borderColor: [
                  "rgba(255,99,132,1)",
                  "rgba(54, 162, 235, 1)",
                  "rgba(255, 206, 86, 1)",
                  "rgba(75, 192, 192, 1)",
                  "rgba(153, 102, 255, 1)",
                  "rgba(255, 159, 64, 1)",
                ],
                borderWidth: 1,
              },
            ],
          },
          options: {
            scales: {
              yAxes: [
                {
                  ticks: {
                    beginAtZero: true,
                  },
                },
              ],
            },
          },
        });
        var ctx2 = ById("myPieChart").getContext("2d");
        var myPieChart = new Chart(ctx2, {
          type: "pie",
          data: {
            labels: labels,
            datasets: [
              {
                label: labels,
                data: data,
                backgroundColor: [
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                ],
                borderColor: [
                  "rgba(255,99,132,1)",
                  "rgba(54, 162, 235, 1)",
                  "rgba(255, 206, 86, 1)",
                ],
                borderWidth: 1,
              },
            ],
          },
          options: {
            cutoutPercentage: 50,
            animation: {
              animateScale: true,
            },
          },
        });
      }
    }
  };
  xhr.send();
}
