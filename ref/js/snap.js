(function (){
  navigator.getMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia);

  navigator.getMedia(
    //constaints when it loads
    {video:true, audio:false},

    function(stream){
      var video = document.getElementById('video');
      video.srcObject = stream;
      video.play();
    },

    function (error) {
      console.log(error);
    });

    document.getElementById('take').addEventListener("click", takeSnapshot);
})();

function takeSnapshot(){
  var canvas = document.getElementById('canvas');
  var video = document.getElementById('video');
  var image = document.getElementById('output');

  var width = video.videoWidth;
  var height = video.videoHeight;

  var context = canvas.getContext('2d');

  canvas.width = width;
  canvas.height = height;

  context.drawImage(video, 0, 0, width, height);

  var imageDataURL = canvas.toDataURL('image/png');
  image.setAttribute('src', imageDataURL);
  var test = document.getElementById('img_sub');
  // test.value = imageDataURL;
  //console.log(image);
  //console.log(test);
}

function uploadFile() {
  canvas.toBlob(function(blob) {
    // 1. Create a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();
    let form = new FormData();

    form.append('file', blob);
    form.append('post', 'Upload');
    // form.append('ajaxupload', 'true');
    // 2. Configure it: GET-request for the URL /article/.../load
    xhr.open('POST', './proccessForm.php');

    // 3. Send the request over the network
     xhr.send(form);


    // 4. This will be called after the response is received
    xhr.onload = function() {
      if (xhr.status != 200) { // analyze HTTP status of the response
        //alert(`Error ${xhr.status}: ${xhr.statusText}`); // e.g. 404: Not Found
        console.log('It Failed!');
      } else { // show the result
        //alert(`Done, got ${xhr.response.length} bytes`); // responseText is the server
        console.log(xhr.responseText);
      }
    };

    xhr.onerror = function() {
      alert("Request failed");
    };
  });
}

document.getElementById('upload').addEventListener('click', uploadFile);

// function upload_img()
// {
//     var image = document.getElementById('output');
//     var results = image.getAttribute("src");
//     if (results.length > 0)
//     {
//         var inp_img = document.getElementById('img_sub');
//         var canvas = document.getElementById('canvas');
//         inp_img.setAttribute('value', canvas.toDataURL('image/png'));
//
//     }
// }
