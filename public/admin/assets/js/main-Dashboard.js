let sidebarBtn = document.querySelector(".toggle-sidebar-btn");
let sidebar = document.getElementById("sidebar");

sidebarBtn.addEventListener("click", () => {
    document.body.classList.toggle("toggle-sidebar");
});

// image view-------------------------------------------------//
// -----------------------------------------------------------//

// Bootstrap Toast initialization
let toastElement = document.getElementById("error-toast");
let toast = new bootstrap.Toast(toastElement);

let input1 = document.getElementById("file1");

let imgDisplay = document.querySelectorAll(".imgDisplay");

let ImagePreview0 = document.querySelectorAll(".ImagePreview0");
let ImagePreview1 = document.querySelectorAll(".ImagePreview1");
let ImagePreview2 = document.querySelectorAll(".ImagePreview2");
let ImagePreview3 = document.querySelectorAll(".ImagePreview3");

let inputDiv = document.querySelector(".uploadDiv");

let addSubImageBtn = document.getElementById("addSubImageBtn");

ImageArray = [];

input1.addEventListener("change", () => {
    if (ImageArray.length < 4) {
        const files = input1.files;
        let isValid = true;
        for (let i = 0; i < files.length; i++) {
            const fileType = files[i].type;
            if (!fileType.match("image.*")) {
                isValid = false;
                displayToastErrorMessage("Only image files are allowed.");
                break;
            }
        }
        if (isValid) {
            clearToastErrorMessage();
            for (let i = 0; i < files.length; i++) {
                ImageArray.push(files[i]);
            }
            input1.disabled = true;
            input1.style.cursor = "not-allowed";
            inputDiv.style.backgroundColor = "lightgray";
        }
        displayQueuedImage();
        uploadImages();
    } else {
        displayToastErrorMessage("You can't upload more than 4 images.");
    }
});

inputDiv.addEventListener("drop", (e) => {
    if (ImageArray.length < 4) {
        e.preventDefault();
        const files = e.dataTransfer.files;
        let isValid = true;
        for (let i = 0; i < files.length; i++) {
            const fileType = files[i].type;
            if (!fileType.match("image.*")) {
                isValid = false;
                displayToastErrorMessage("Only image files are allowed.");
                break;
            }
        }
        if (isValid) {
            clearToastErrorMessage();
            for (let i = 0; i < files.length; i++) {
                if (ImageArray.every((image) => image.name !== files[i].name)) {
                    ImageArray.push(files[i]);
                }
            }
            input1.disabled = true;
            input1.style.cursor = "not-allowed";
            inputDiv.style.backgroundColor = "lightgray";
        }
        displayQueuedImage();
        uploadImages();
    } else {}
});

addSubImageBtn.addEventListener("click", () => {
    if (ImageArray.length < 4) {
        input1.disabled = false;
        input1.style.cursor = "pointer";
        inputDiv.style.backgroundColor = "transparent";
        displayQueuedImage();
    } else {
        displayToastErrorMessage("You can't upload more than 4 images.");
    }
});

function displayQueuedImage() {
    // if (ImageArray.length === 0) return;
    // if (ImageArray.length === 1) {

    //   return;
    // }
    // if (ImageArray.length === 2) {
    //   imgDisplay.src = URL.createObjectURL(ImageArray[0]);
    //   imgDisplay2.src = URL.createObjectURL(ImageArray[1]);
    //   return;
    // }
    // if (ImageArray.length === 3) {
    //   imgDisplay.src = URL.createObjectURL(ImageArray[0]);
    //   imgDisplay2.src = URL.createObjectURL(ImageArray[1]);
    //   imgDisplay3.src = URL.createObjectURL(ImageArray[2]);
    //   return;
    // }
    // if (ImageArray.length === 4) {
    //   imgDisplay.src = URL.createObjectURL(ImageArray[0]);
    //   imgDisplay2.src = URL.createObjectURL(ImageArray[1]);
    //   imgDisplay3.src = URL.createObjectURL(ImageArray[2]);
    //   imgDisplay4.src = URL.createObjectURL(ImageArray[3]);
    // }
    for (let i = 0; i < ImageArray.length; i++) {
        imgDisplay[i].src = URL.createObjectURL(ImageArray[i]);
    }
    if (ImageArray.length === 1) {
        for (let i = 0; i < ImagePreview0.length; i++) {
            ImagePreview0[i].src = URL.createObjectURL(ImageArray[0]);
        }
    }
    if (ImageArray.length === 2) {
        for (let i = 0; i < ImagePreview0.length; i++) {
            ImagePreview0[i].src = URL.createObjectURL(ImageArray[0]);
        }
        ImagePreview1[0].src = URL.createObjectURL(ImageArray[1]);
    }
    if (ImageArray.length === 3) {
        for (let i = 0; i < ImagePreview0.length; i++) {
            ImagePreview0[i].src = URL.createObjectURL(ImageArray[0]);
        }
        ImagePreview1[0].src = URL.createObjectURL(ImageArray[1]);
        ImagePreview2[0].src = URL.createObjectURL(ImageArray[2]);
    }
    if (ImageArray.length === 4) {
        for (let i = 0; i < ImagePreview0.length; i++) {
            ImagePreview0[i].src = URL.createObjectURL(ImageArray[0]);
        }
        ImagePreview1[0].src = URL.createObjectURL(ImageArray[1]);
        ImagePreview2[0].src = URL.createObjectURL(ImageArray[2]);
        ImagePreview3[0].src = URL.createObjectURL(ImageArray[3]);
    }

}

function uploadImages() {
    const formData = new FormData();

    // Append each file in ImageArray to the formData
    ImageArray.forEach((file, index) => {
        formData.append(`images[${index}]`, file);
    });
}

function displayToastErrorMessage(message) {
    let toastBody = document.querySelector("#error-toast .toast-body");
    toastBody.innerText = message;
    toast.show();
}

// Optional: Function to clear any existing error messages from the toast
function clearToastErrorMessage() {
    let toastBody = document.querySelector("#error-toast .toast-body");
    toastBody.innerText = "";
}

// ///////////////////////////

// let addSubImageBtn = document.querySelector(".addSubImageBtn");
// let addSubImageContainer = document.getElementById("addSubImageContainer");

// addSubImageBtn.addEventListener("click", (e) => {
//   e.preventDefault();
//   addSubImageContainer.innerHTML += `<div class="mb-3">
//                                          <label for="Image" class="form-label">Upload Image ${ID +1}</label>
//                                             <div class="uploadDiv d-flex align-items-center justify-content-center flex-column form-control">
//                                                 <i class='bx bx-image fs-1'></i>
//                                                 <p class="mb-0">Drop your imager here, or browse</p>
//                                                 <p>Images are allowed</p>
//                                                 <input type="file" multiple="multiple" id="file"
//                                                             accept="image/png, image/jpeg, image/jpg">
//                                                 </div>
//                                                 <div class="w-100 mt-3 d-flex justify-content-end">
//                                                     <button id="addSubImageBtn" class="view-order py-2 px-2 border-0 d-flex align-items-center gap-2">
//                                                             Add sub Image <i class='bx bx-image'></i>
//                                                     </button>
//                                                 </div>
//                                     </div>`;

//   // Add event listeners for the new input
//   let newInput = newUploadDiv.querySelector('input[type="file"]');
//   newInput.addEventListener("change", () => {
//     const files = newInput.files;
//     handleFileUpload(files, newInput);
//   });

//   newUploadDiv.addEventListener("drop", (e) => {
//     e.preventDefault();
//     const files = e.dataTransfer.files;
//     handleFileUpload(files, newInput);
//   });
// });

// card view--------------------------------------------------//
// -----------------------------------------------------------//

let productNameInput = document.getElementById("productName");
let productNameCard = document.getElementById("productNameCard");
let productNameCard2 = document.getElementById("productNameCard2");

let DescriptionInput = document.getElementById("Description");
let DescriptionCard = document.getElementById("DescriptionCard");
let DescriptionCard2 = document.getElementById("DescriptionCard2");

let SalePriceInput = document.getElementById("SalePrice");
let SalePriceCard = document.getElementById("SalePriceCard");
let SalePriceCard2 = document.getElementById("SalePriceCard2");

let RegularPriceInput = document.getElementById("RegularPrice");
let RegularPriceCard = document.getElementById("RegularPriceCard");

function replaceProductName() {
    if (productNameInput.value != "") {
        productNameCard.innerText = productNameInput.value;
        productNameCard2.innerText = productNameInput.value;
    } else {
        productNameCard.innerText = "Product Name";
    }
}
productNameInput.addEventListener("keyup", replaceProductName);

function replaceDescription() {
    if (DescriptionInput.value != "") {
        DescriptionCard.innerText = DescriptionInput.value;
        DescriptionCard2.innerText = DescriptionInput.value;
    } else {
        DescriptionCard.innerText = "Description";
    }
}
DescriptionInput.addEventListener("keyup", replaceDescription);

function replaceSalePrice() {
    if (SalePriceInput.value != "") {
        SalePriceCard.innerText = SalePriceInput.value;
        SalePriceCard2.innerText = SalePriceInput.value;
    } 
    // else {
    //     SalePriceCard.innerText = "Sale Price";
    //     SalePriceCard2.innerText = "Sale Price";
    // }
}
SalePriceInput.addEventListener("keyup", replaceSalePrice);
SalePriceInput.addEventListener("change", replaceSalePrice);

function replaceRegularPrice() {
    if (RegularPriceInput.value != "") {
        RegularPriceCard.innerText = RegularPriceInput.value;
    }
    //  else {
    //     RegularPriceCard.innerText = "Sale Price";
    // }
}
RegularPriceInput.addEventListener("keyup", replaceRegularPrice);
RegularPriceInput.addEventListener("change", replaceRegularPrice);