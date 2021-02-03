function start(){
    document.getElementById("warning").style.display='none';
    var r = document.getElementById("result");
if("webkitSpeechRecognition" in window){
    var speechRecognizer = new webkitSpeechRecognition();
    speechRecognizer.continuous = true;
    speechRecognizer.interimResults = true;
    speechRecognizer.lang = "en-US";
    speechRecognizer.start();
    
    var finalTranscripts = "";
    speechRecognizer.onresult = function(event){
        var interimTranscripts = "";
        for(var i=event.resultIndex; i<event.results.length; i++){
            var transcript = event.results[i][0].transcript;
            transcript.replace("\n", "<br>");
            if(event.results[i].isFinal){
                finalTranscripts += transcript;
                M.toast({html: 'Suspicious Audio Detect'})
            }
            else{
                interimTranscripts += transcript;
            }
            r.innerHTML = finalTranscripts + '<span style="color: #999;">' + interimTranscripts + '</span>';
        }
    };
    speechRecognizer.onerror = function(event){
    };
}
else{
    r.innerHTML = "Your browser does not support that.";
}
}