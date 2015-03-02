var token = prompt("Please enter the id of the conversation", "123456789");
var ws = new WebSocket("ws://negly14.koding.io:7000/ws/"+token);
var configuration = {iceServers: [{ url: 'stun:negly14.koding.io:3478' }]};
var initiator;
var pc = new webkitRTCPeerConnection(configuration, {optional: [{RtpDataChannels: true}]});
var channel = pc.createDataChannel("chat"+token);
$("#btnSend").disabled = true;


function initiatorCtrl(event) {
    console.log(event.data);
    if (event.data == "fullhouse") {
        alert("full house");
    }
    if (event.data == "initiator") {
        initiator = false;
        init();
    }
    if (event.data == "not initiator") {
        initiator = true;
        init();
    }
}

ws.onmessage = initiatorCtrl;


function init() {
    var constraints = {
        audio: true,
        video: true
    };
    getUserMedia(constraints, connect, fail);
    pc.ondatachannel = function(evt){
        channel = evt.channel;
        channel.onopen = function () {
            $('#btnSend').disabled = false;
            $('#chatControls').disabled = false;
        }
    };
}


function connect(stream) {

    if (stream) {
        pc.addStream(stream);
        $('#local').attachStream(stream);
    }

    pc.onaddstream = function(event) {
        $('#remote').attachStream(event.stream);
        logStreaming(true);
    };
    pc.onicecandidate = function(event) {
        if (event.candidate) {
            ws.send(JSON.stringify(event.candidate));
        }
    };
    ws.onmessage = function (event) {
        var signal = JSON.parse(event.data);
        if (signal.sdp) {
            if (initiator) {
                receiveAnswer(signal);
            } else {
                receiveOffer(signal);
            }
        } else if (signal.candidate) {
            pc.addIceCandidate(new RTCIceCandidate(signal));
        }
    };

    if (initiator) {
        createOffer();
    } else {
        log('waiting for offer...');
    }
    logStreaming(false);
}


function createOffer() {
    log('creating offer...');
    pc.createOffer(function(offer) {
        log('created offer...');
        pc.setLocalDescription(offer, function() {
            log('sending to remote...');
            ws.send(JSON.stringify(offer));
        }, fail);
    }, fail);
}


function receiveOffer(offer) {
    log('received offer...');
    pc.setRemoteDescription(new RTCSessionDescription(offer), function() {
        log('creating answer...');
        pc.createAnswer(function(answer) {
            log('created answer...');
            pc.setLocalDescription(answer, function() {
                log('sent answer');
                ws.send(JSON.stringify(answer));
            }, fail);
        }, fail);
    }, fail);
}


function receiveAnswer(answer) {
    log('received answer');
    pc.setRemoteDescription(new RTCSessionDescription(answer));
    pc.Datachannel
}


function log() {
    $('#status').text(Array.prototype.join.call(arguments, ' '));
    console.log.apply(console, arguments);
}


function logStreaming(streaming) {
    $('#streaming').text(streaming ? '[streaming]' : '[..]');
}


function fail() {
    $('#status').text(Array.prototype.join.call(arguments, ' '));
    $('#status').addClass('error');
    console.error.apply(console, arguments);
}

function sendMessage(){
    $("#messages").innerHTML+="<br />"+$("#msg").value;
    channel.send($("#msg").value);
}


jQuery.fn.attachStream = function(stream) {
    this.each(function() {
        this.src = URL.createObjectURL(stream);
        this.play();
    });
};
