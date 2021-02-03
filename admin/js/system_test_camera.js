(function() {
      function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split('&');
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split('=');
            if (decodeURIComponent(pair[0]) == variable) {
                return decodeURIComponent(pair[1]);
            }
        }
        console.log('Query variable %s not found', variable);
    }
    var width = 320; // We will scale the photo width to this
    var height = 0; // This will be computed based on the input stream

    var streaming = false;

    var video = null;
    var canvas = null;
    var photo = null;
    var startbutton = null;
    navigator.mediaDevices.getUserMedia({ audio: true })
      .then(function(stream) {
        console.log('You let me use your mic!')
      })
      .catch(function(err) {
        console.log('No mic for you!')
      });

    // cloud added
    // document.getElementById("fileToUpload").addEventListener("change", function (event) {
    //     ProcessImage();
    //   }, false);

    // function DetectFaces(imageData) {
    //     AWS.region = "us-east-1";
    //     var rekognition = new AWS.Rekognition();
    //     var params = {
    //       Image: {
    //         Bytes: imageData
    //       },
    //       Attributes: [
    //         'ALL',
    //       ]
    //     };
    //     rekognition.detectFaces(params, function (err, data) {
    //       if (err) console.log(err, err.stack); // an error occurred
    //       else {
    //        var table = "<table><tr><th>Low</th><th>High</th></tr>";
    //         // show each face and build out estimated age table
    //         for (var i = 0; i < data.FaceDetails.length; i++) {
    //           table += '<tr><td>' + data.FaceDetails[i].AgeRange.Low +
    //             '</td><td>' + data.FaceDetails[i].AgeRange.High + '</td></tr>';
    //         }
    //         table += "</table>";
    //         document.getElementById("opResult").innerHTML = table;
    //       }
    //     });
    //   }
    //   function ProcessImage() {
    //     AnonLog();
    //     var control = document.getElementById("fileToUpload");
    //     var file = control.files[0];
    //     console.log(file)
    //     // Load base64 encoded image 
    //     var reader = new FileReader();
    //     reader.onload = (function (theFile) {
    //       return function (e) {
    //         var img = document.createElement('img');
    //         var image = null;
    //         img.src = e.target.result;
    //         var jpg = true;
    //         try {
    //           image = atob(e.target.result.split("data:image/jpeg;base64,")[1]);
    
    //         } catch (e) {
    //           jpg = false;
    //         }
    //         if (jpg == false) {
    //           try {
    //             image = atob(e.target.result.split("data:image/png;base64,")[1]);
    //           } catch (e) {
    //             alert("Not an image file Rekognition can process");
    //             return;
    //           }
    //         }
    //         //unencode image bytes for Rekognition DetectFaces API 
    //         var length = image.length;
    //         imageBytes = new ArrayBuffer(length);
    //         var ua = new Uint8Array(imageBytes);
    //         for (var i = 0; i < length; i++) {
    //           ua[i] = image.charCodeAt(i);
    //         }
    //         //Call Rekognition  
    //         DetectFaces(imageBytes);
    //       };
    //     })(file);
    //     reader.readAsDataURL(file);
    //   }
    //   //Provides anonymous log on to AWS services
    //   function AnonLog() {
        
    //     // Configure the credentials provider to use your identity pool
    //     AWS.config.region = 'us-east-1'; // Region
    //     AWS.config.credentials = new AWS.CognitoIdentityCredentials({
    //       IdentityPoolId: 'us-east-1:38b25e6c-1d39-476a-b25b-1db1e3e06f09',
    //     });
    //     // Make the call to obtain credentials
    //     AWS.config.credentials.get(function () {
    //       // Credentials will be available when this function is called.
    //       var accessKeyId = AWS.config.credentials.accessKeyId;
    //       var secretAccessKey = AWS.config.credentials.secretAccessKey;
    //       var sessionToken = AWS.config.credentials.sessionToken;
    //     });
    //   }




















    // cloud End


    function startup() {
        video = document.getElementById('video');
        canvas = document.getElementById('canvas');
        photo = document.getElementById('photo');
        startbutton = document.getElementById('startbutton');

        navigator.mediaDevices.getUserMedia({
                video: true,
                audio: false
            })
            .then(function(stream) {
                video.srcObject = stream;
                video.play();
            })
            .catch(function(err) {
                console.log("An error occurred: " + err);
            });

        video.addEventListener('canplay', function(ev) {
            if (!streaming) {
                height = video.videoHeight / (video.videoWidth / width);

                if (isNaN(height)) {
                    height = width / (4 / 3);
                }

                video.setAttribute('width', width);
                video.setAttribute('height', height);
                // canvas.setAttribute('width', width);
                // canvas.setAttribute('height', height);
                streaming = true;
            }
        }, false);

        // startbutton.addEventListener('click', function(ev) {
        //     takepicture();
        //     ev.preventDefault();
        // }, false);

        // clearphoto();
        setTimeout(function(){ takepicture(); }, 2000);
    }


    function clearphoto() {
        var context = canvas.getContext('2d');
        context.fillStyle = "#AAA";
        context.fillRect(0, 0, canvas.width, canvas.height);

        var data = canvas.toDataURL('image/png');
        // photo.setAttribute('src', data);
        console.log("clr called");
    }

    function takepicture() {
        var context = canvas.getContext('2d');
        if (width && height) {
            canvas.width = width;
            canvas.height = height;
            context.drawImage(video, 0, 0, width, height);

            var Data = canvas.toDataURL('image/png');
            // photo.setAttribute('src', data);
            Data = Data.split("base64,")[1];
            console.log(Data);
            // $.post("http://:5000/face_auth",
            //     {
            //     image: data
            //     },
            //     function(data,status){
            //     console.log("callback");
            //     alert("Data: " + data + "\nStatus: " + status);
            //     },{json});
            $.ajax({
                type:    "POST",
                url : "http://127.0.0.1:5000/process_image",
                dataType: "json",
                contentType: 'application/json; charset=utf-8',
                data: JSON.stringify({image: Data}),
                success: function(data) {
                      var result = JSON.parse(JSON.stringify(data)).result;
                      if(result == "True"){
                      M.toast({html: 'Face Verified System check done'})
                      window.location.href = "http://localhost/Asean/student/exam.php?test_type="+getQueryVariable("test_type");
                      }
                      else{
                        M.toast({html:"Retrying..."})
                      takepicture();
                      }

                },
                // vvv---- This is the new bit
                error:   function(jqXHR, textStatus, errorThrown) {
                      alert("Error, status = " + textStatus + ", " +
                            "error thrown: " + errorThrown
                      );
                }
              });




                console.log("after callback");
        } else {
            clearphoto();
        }
    }

    window.addEventListener('load', startup, false);
})();