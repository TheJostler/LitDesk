import jsQR from 'jsqr'
if (import.meta.hot) {
  import.meta.hot.accept(({ jsQR }) => {
    cleanup();
    cleanup = module.initializeCounter();
  });
}

var video = document.createElement("video");
var canvasElement = document.getElementById("canvas");
var canvas = canvasElement.getContext("2d", { willReadFrequently: true });
var loadingMessage = document.getElementById("loadingMessage");
var formQty = document.getElementById('qtyFormField')
var formTitle = document.getElementById('formTitle');
var formBody = document.getElementById('formBody');
var formImg = document.getElementById('formImgField');
var formBox = document.getElementById('form-box-overlay');
var code = null;
var qr = null;

var wait = Date.now();

function drawLine(begin, end, color) {
  canvas.beginPath();
  canvas.moveTo(begin.x, begin.y);
  canvas.lineTo(end.x, end.y);
  canvas.lineWidth = 4;
  canvas.strokeStyle = color;
  canvas.stroke();
}

// Use facingMode: environment to attemt to get the front camera on phones
navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
  video.srcObject = stream;
  video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
  video.play();
  requestAnimationFrame(tick);
});

function tick() {
  loadingMessage.innerText = "⌛ Loading video..."
  if (video.readyState === video.HAVE_ENOUGH_DATA){
    loadingMessage.hidden = true;
    canvasElement.hidden = false;

    canvasElement.height = video.videoHeight;
    canvasElement.width = video.videoWidth;
    canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
    var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
    code = jsQR(imageData.data, imageData.width, imageData.height, {
      inversionAttempts: "dontInvert",
    });
    if (code) {
      if(code.data.includes('jw.org')) {
        qr=code.data;
        drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
        drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
        drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
        drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
        //Delay scans for 1 second and deal with QR data after 25 milies.
        if (wait < Date.now()) {
          wait = Date.now() + 1500;
          setTimeout(() => {
            queryServer();
            toggleForm();
          }, 25);
        }
      }
    } else {
    }
  }
  requestAnimationFrame(tick);
}

function toggleForm() {
  formBox.classList.toggle('hidden');
  alert('very nive');
}

function queryServer() {
  //Query the Server for info
  fetch(queryRoute).then(response => response.json()).then(data => {
    console.log(data);
    formTitle.innerText = "Add " + data.pub_name;
    formBody.innerText = "You are updating the inventory for " + data.pub_name;
    formImg.src = data.pub_img;
    formQty.value = Number(data.pub_qty) + 1;
  });
}

function saveItem() {
  //Query the Server for info
  fetch(queryRoute, {
    method: "POST",
    headers: {
      "X-CSRF-Token": csrf,
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      _token: csrf,
      name: 'josj',
      colour: 'blueish brown'
    }),
  }).then(response => response.json()).then(data => {
    console.log(data);
    formTitle.innerText = "Add " + data.pub_name;
    formBody.innerText = "You are updating the inventory for " + data.pub_name;
    formImg.src = data.pub_img;
    formQty.value = Number(data.pub_qty) + 1;
  });

  toggleForm();
}
