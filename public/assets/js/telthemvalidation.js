function isVisaCardNumber(cardNumber) {
  const visaRegex = /^4[0-9]{12}(?:[0-9]{3})?$/;
  return visaRegex.test(cardNumber);
}

function isMastercard(creditCardNumber) {
  const mastercardRegex = /^(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))$/;

  return mastercardRegex.test(creditCardNumber);
}

function tocheckAccountNumber() {
  var accountnumber = document.getElementById("accountnumber")
  var accountnumberlength = document.getElementById("accountnumberlength")
  accountnumber.addEventListener('input', () => {
    var accountnumbervalue = accountnumber.value;
    accountnumberlength.innerHTML = accountnumbervalue.length;
  });
}



function isValidCVV(cvv) {
  return /^[0-9]{3,4}$/.test(cvv);
}

function getStringLength(str) {
  return str.length;
}

function checkExpiryDate(expiryDate) {
  const currentDate = new Date();
  const parsedExpiryDate = new Date(expiryDate);

  return parsedExpiryDate >= currentDate;
}

function formatDate(dateString) {
  const date = new Date(dateString);
  const month = date.getMonth() + 1;
  const year = date.getFullYear().toString().substr(-2);
  return `${month}/${year}`;
}

function formatCardNumber(cardNumberContainer, cardNumber) {
  var groups = cardNumber.match(/.{1,4}/g);
  var sections = groups.map(function (group) {
    var section = document.createElement('div');
    section.classList.add('section');
    section.textContent = group;
    return section;
  });
  sections.forEach(function (section) {
    cardNumberContainer.appendChild(section);
  })
  return cardNumberContainer;
}

function isValidcardDate(input) {
  var regex = /^(0[1-9]|1[0-2])\/\d{2}$/;
  return regex.test(input);
}
function tocheckNumberofCreditcard() {
  var ac_number = document.getElementById("ac_number")
  var cardnumberlength = document.getElementById("cardnumberlength")
  ac_number.addEventListener('input', () => {
    var ac_numbervalue = ac_number.value;
    cardnumberlength.innerHTML = ac_numbervalue.length;
  });
}
function detectCardType() {
  var result = '';
  var card_type = byId('card_type')
  var cardNumber = byId('cardnumber');
  var isvisa = isVisaCardNumber(cardNumber.value)
  var ismastercard = isMastercard(cardNumber.value)
    if (isvisa == true) {

      result = "Visa";

    } else if (ismastercard == true) {
      result = "Mastercard";

    } else {
      result = "Unknown card type";
    }
    card_type.value = result
    console.log()
  
}
