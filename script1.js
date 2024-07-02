// Vezetéknév
let firstNameInput = document.getElementById("first-name-input");
let firstNameError = document.getElementById("first-name-error");
let emptyFirstNameError = document.getElementById("empty-first-name");

// Keresztnév
let lastNameInput = document.getElementById("last-name-input");
let lastNameError = document.getElementById("last-name-error");
let emptyLastNameError = document.getElementById("empty-last-name");

let phoneInput = document.getElementById("phone");
let phoneError = document.getElementById("phone-error");
let emptyPhoneError = document.getElementById("empty-phone");

let emailInput = document.getElementById("email");
let emailError = document.getElementById("email-error");
let emptyEmailError = document.getElementById("empty-email");

let passwordInput = document.getElementById("password");
let passwordError = document.getElementById("password-error");
let emptyPasswordError = document.getElementById("empty-password");

let verifyPasswordInput = document.getElementById("verify-password");
let verifyPasswordError = document.getElementById("verify-password-error");
let emptyVerifyPasswordError = document.getElementById("empty-verify-password");

let submitButton = document.getElementById("submit-button");

let validClasses = document.getElementsByClassName("valid");
let invalidClasses = document.getElementsByClassName("error");

const passwordVerify = (password) => {
  return password.length >= 8 && /[A-Z]/.test(password);
};

const textVerify = (text) => {
  const regex = /^[a-zA-Z]{3,}$/;
  return regex.test(text);
};


const emailVerify = (input) => {
  const regex = /^[a-z0-9_]+@[a-z]{3,}\.[a-z\.]{3,}$/;
  return regex.test(input);
};
const phoneVerify = (number) => {
  const regex = /^[0-9]{10}$/;
  return regex.test(number);
};

const emptyUpdate = (inputReference, emptyErrorReference, otherErrorReference) => {
  if (!inputReference.value) {
    emptyErrorReference.classList.remove("hide");
    otherErrorReference.classList.add("hide");
    inputReference.classList.add("error");
  } else {
    emptyErrorReference.classList.add("hide");
  }
};

const errorUpdate = (inputReference, errorReference) => {
  errorReference.classList.remove("hide");
  inputReference.classList.remove("valid");
  inputReference.classList.add("error");
};

const validInput = (inputReference) => {
  inputReference.classList.remove("error");
  inputReference.classList.add("valid");
};


firstNameInput.addEventListener("input", () => {
  if (textVerify(firstNameInput.value)) {
    firstNameError.classList.add("hide");
    validInput(firstNameInput);
  } else {
    errorUpdate(firstNameInput, firstNameError);
    emptyUpdate(firstNameInput, emptyFirstNameError, firstNameError);
  }
});

lastNameInput.addEventListener("input", () => {
  if (textVerify(lastNameInput.value)) {
    lastNameError.classList.add("hide");
    validInput(lastNameInput);
  } else {
    errorUpdate(lastNameInput, lastNameError);
    emptyUpdate(lastNameInput, emptyLastNameError, lastNameError);
  }
});

phoneInput.addEventListener("input", () => {
  if (phoneVerify(phoneInput.value)) {
    phoneError.classList.add("hide");
    validInput(phoneInput);
  } else {
    errorUpdate(phoneInput, phoneError);
    emptyUpdate(phoneInput, emptyPhoneError, phoneError);
  }
});


emailInput.addEventListener("input", () => {
  if (emailVerify(emailInput.value)) {
    emailError.classList.add("hide");
    validInput(emailInput);
  } else {
    errorUpdate(emailInput, emailError);
    emptyUpdate(emailInput, emptyEmailError, emailError);
  }
});

passwordInput.addEventListener("input", () => {
  if (passwordVerify(passwordInput.value)) {
    passwordError.classList.add("hide");
    validInput(passwordInput);
  } else {
    errorUpdate(passwordInput, passwordError);
    emptyUpdate(passwordInput, emptyPasswordError, passwordError);
  }
});

verifyPasswordInput.addEventListener("input", () => {
  if (verifyPasswordInput.value === passwordInput.value) {
    verifyPasswordError.classList.add("hide");
    validInput(verifyPasswordInput);
  } else {
    errorUpdate(verifyPasswordInput, verifyPasswordError);
    emptyUpdate(verifyPasswordInput, emptyVerifyPasswordError, verifyPasswordError);
  }
});

//let featuredSpeakerDropdown = document.getElementById("featured-speaker");

// featuredSpeakerDropdown.addEventListener("change", () => {
//   // You can add validation logic here if needed
//   console.log("Selected value:", featuredSpeakerDropdown.value);
// });

// let featuredSpeakerDropdown = document.getElementById("featured-speaker");
// let selectedValue = featuredSpeakerDropdown.options[featuredSpeakerDropdown.selectedIndex].value;


submitButton.addEventListener("click", () => {
  if (validClasses.length === 6 && invalidClasses.length === 0) {
    alert("Sikeres jelentkezés");
  } else {
    alert("Sikertelen jelentkezés");
  }
});


// submitButton.addEventListener("click", () => {
//   if (validClasses.length === 9 && invalidClasses.length === 0) {
//     alert("Sikeres jelentkezés");
//   } else {
//     alert("Sikertelen jelentkezés");
//   }
// });

/*---------------------------------------MODOSITAS-------------------------------------------------*/
// let instituteNameInput = document.getElementById("institution-name-input");
// let instituteNameError = document.getElementById("institute-name-error");
// let emptyInstituteNameError = document.getElementById("institute-last-name");

// instituteNameInput.addEventListener("input", () => {
//   if (textVerify(instituteNameInput.value)) {
//     instituteNameError.classList.add("hide");
//     validInput(instituteNameInput);
//   } else {
//     errorUpdate(instituteNameInput, instituteNameError);
//     emptyUpdate(instituteNameInput, emptyInstituteNameError, instituteNameError);
//   }
// });


// Country Name Input
// let countryNameInput = document.getElementById("country-name-input");
// let countryNameError = document.getElementById("country-name-error");
// let emptyCountryNameError = document.getElementById("empty11-last-name");

// countryNameInput.addEventListener("input", () => {
//   if (textVerify(countryNameInput.value)) {
//     countryNameError.classList.add("hide");
//     validInput(countryNameInput);
//   } else {
//     errorUpdate(countryNameInput, countryNameError);
//     emptyUpdate(countryNameInput, emptyCountryNameError, countryNameError);
//   }
// });

// // Title Name Input
// let titleNameInput = document.getElementById("title-name-input");
// let titleNameError = document.getElementById("title-name-error");
// let emptyTitleNameError = document.getElementById("title-last-name");

// titleNameInput.addEventListener("input", () => {
//   if (textVerify(titleNameInput.value)) {
//     titleNameError.classList.add("hide");
//     validInput(titleNameInput);
//   } else {
//     errorUpdate(titleNameInput, titleNameError);
//     emptyUpdate(titleNameInput, emptyTitleNameError, titleNameError);
//   }
// });

// //Website
// let websiteInput = document.getElementById("website");
// let websiteError = document.getElementById("website-error");
// let websiteNameError = document.getElementById("website-name");

// websiteInput.addEventListener("input", () => {
//   if (textVerify(websiteInput.value)) {
//     websiteError.classList.add("hide");
//     validInput(websiteInput);
//   } else {
//     errorUpdate(websiteInput, websiteError);
//     emptyUpdate(websiteInput, websiteNameError, websiteError);
//   }
// });

// submitButton.addEventListener("click", (event) => {
//   // Ellenőrizze, hogy a "Kiemelt előadó" opciót kiválasztották-e
//   //let selectedValue = featuredSpeakerDropdown.value;
//   let selectedValue = featuredSpeakerDropdown.options[featuredSpeakerDropdown.selectedIndex].value;
//   if (selectedValue === "--Válassza ki, hogy miként szeretne résztvenni kiemeltként vagy nem!--") {
//     document.getElementById("featured-speaker-error").classList.remove("hide");
//     event.preventDefault(); // Megakadályozza a form küldését
//   } else {
//     // További validációk és logika...
//     if (validClasses.length === 9 && invalidClasses.length === 0) 
//     {
      
//       alert("Sikeres jelentkezés");
//       //console.log("Sikeres jelentkezés");
//     } else {
//       //console.log("Sikertelen jelentkezés, hibák:", invalidClasses);
//       alert("Sikertelen jelentkezés");
//     }
//   }
// });






///////////////////////////////

/////////////////////

// Vezetéknév
// let firstNameInput = document.getElementById("first-name-input");
// let firstNameError = document.getElementById("first-name-error");
// let emptyFirstNameError = document.getElementById("empty-first-name");

// // Keresztnév
// let lastNameInput = document.getElementById("last-name-input");
// let lastNameError = document.getElementById("last-name-error");
// let emptyLastNameError = document.getElementById("empty-last-name");

// // let phoneInput = document.getElementById("phone");
// // let phoneError = document.getElementById("phone-error");
// // let emptyPhoneError = document.getElementById("empty-phone");

// let emailInput = document.getElementById("email");
// let emailError = document.getElementById("email-error");
// let emptyEmailError = document.getElementById("empty-email");

// let passwordInput = document.getElementById("password");
// let passwordError = document.getElementById("password-error");
// let emptyPasswordError = document.getElementById("empty-password");

// let verifyPasswordInput = document.getElementById("verify-password");
// let verifyPasswordError = document.getElementById("verify-password-error");
// let emptyVerifyPasswordError = document.getElementById("verify-empty-password");

// let instituteNameInput = document.getElementById("institution-name-input");
// let instituteNameError = document.getElementById("institute-name-error");
// let emptyInstituteNameError = document.getElementById("institute-last-name");

// let submitButton = document.getElementById("submit-button");

// let validClasses = document.getElementsByClassName("valid");
// let invalidClasses = document.getElementsByClassName("error");

// const passwordVerify = (password) => {
//   return password.length >= 8 && /[A-Z]/.test(password);
// };

// const textVerify = (text) => {
//   const regex = /^[a-zA-Z]{3,}$/;
//   return regex.test(text);
// };

// // const phoneVerify = (number) => {
// //   const regex = /^[0-9]{10}$/;
// //   return regex.test(number);
// // };

// const emailVerify = (input) => {
//   const regex = /^[a-z0-9_]+@[a-z]{3,}\.[a-z\.]{3,}$/;
//   return regex.test(input);
// };


// const emptyUpdate = (inputReference, emptyErrorReference, otherErrorReference) => {
//   if (!inputReference.value) {
//     emptyErrorReference.classList.remove("hide");
//     otherErrorReference.classList.add("hide");
//     inputReference.classList.add("error");
//   } else {
//     emptyErrorReference.classList.add("hide");
//   }
// };

// const errorUpdate = (inputReference, errorReference) => {
//   errorReference.classList.remove("hide");
//   inputReference.classList.remove("valid");
//   inputReference.classList.add("error");
// };

// const validInput = (inputReference) => {
//   inputReference.classList.remove("error");
//   inputReference.classList.add("valid");
// };

// // Eseménykezelők

// firstNameInput.addEventListener("input", () => {
//   if (textVerify(firstNameInput.value)) {
//     firstNameError.classList.add("hide");
//     validInput(firstNameInput);
//   } else {
//     errorUpdate(firstNameInput, firstNameError);
//     emptyUpdate(firstNameInput, emptyFirstNameError, firstNameError);
//   }
// });

// lastNameInput.addEventListener("input", () => {
//   if (textVerify(lastNameInput.value)) {
//     lastNameError.classList.add("hide");
//     validInput(lastNameInput);
//   } else {
//     errorUpdate(lastNameInput, lastNameError);
//     emptyUpdate(lastNameInput, emptyLastNameError, lastNameError);
//   }
// });

// // phoneInput.addEventListener("input", () => {
// //   if (phoneVerify(phoneInput.value)) {
// //     phoneError.classList.add("hide");
// //     validInput(phoneInput);
// //   } else {
// //     errorUpdate(phoneInput, phoneError);
// //     emptyUpdate(phoneInput, emptyPhoneError, phoneError);
// //   }
// // });

// emailInput.addEventListener("input", () => {
//   if (emailVerify(emailInput.value)) {
//     emailError.classList.add("hide");
//     validInput(emailInput);
//   } else {
//     errorUpdate(emailInput, emailError);
//     emptyUpdate(emailInput, emptyEmailError, emailError);
//   }
// });

// passwordInput.addEventListener("input", () => {
//   if (passwordVerify(passwordInput.value)) {
//     passwordError.classList.add("hide");
//     validInput(passwordInput);
//   } else {
//     errorUpdate(passwordInput, passwordError);
//     emptyUpdate(passwordInput, emptyPasswordError, passwordError);
//   }
// });

// verifyPasswordInput.addEventListener("input", () => {
//   if (verifyPasswordInput.value === passwordInput.value) {
//     verifyPasswordError.classList.add("hide");
//     validInput(verifyPasswordInput);
//   } else {
//     errorUpdate(verifyPasswordInput, verifyPasswordError);
//     emptyUpdate(verifyPasswordInput, emptyVerifyPasswordError, verifyPasswordError);
//   }
// });

// instituteNameInput.addEventListener("input", () => {
//   if (textVerify(instituteNameInput.value)) {
//     instituteNameError.classList.add("hide");
//     validInput(instituteNameInput);
//   } else {
//     errorUpdate(instituteNameInput, instituteNameError);
//     emptyUpdate(instituteNameInput, emptyInstituteNameError, instituteNameError);
//   }
// });

// submitButton.addEventListener("click", () => {
//   if (validClasses.length === 6 && invalidClasses.length === 0) {
//     alert("Sikeres jelentkezés");
//   } else {
//     alert("Sikertelen jelentkezés");
//   }
// });
