const possibleEmojis = [
    '🐀','🐁','🐭','🐹','🐂','🐃','🐄','🐮','🐅','🐆','🐯','🐇','🐐','🐑','🐏','🐴',
    '🐎','🐱','🐈','🐰','🐓','🐔','🐤','🐣','🐥','🐦','🐧','🐘','🐩','🐕','🐷','🐖',
    '🐗','🐫','🐪','🐶','🐺','🐻','🐨','🐼','🐵','🙈','🙉','🙊','🐒','🐉','🐲','🐊',
    '🐍','🐢','🐸','🐋','🐳','🐬','🐙','🐟','🐠','🐡','🐚','🐌','🐛','🐜','🐝','🐞',
];

function randomEmoji() {
  var randomIndex = Math.floor(Math.random() * possibleEmojis.length);
  return possibleEmojis[randomIndex];
}

const emoji = randomEmoji();
if (!location.hash) {
  	location.hash = Math.floor(Math.random() * 0xFFFFFF).toString(16);
}

const chatHash = location.hash.substring(1);
const drone = new ScaleDrone('yiS12Ts5RdNhebyM');
const roomName = 'observable-' + chatHash;
let room;

const configuration = {
    iceServers: [{
      	url: 'stun:stun.l.google.com:19302'
    }]
};

let pc;
let dataChannel;
if(drone) {
	drone.on('open', error => {
		if (error) {
		    return console.error(error);
		}
		room = drone.subscribe(roomName);
		room.on('open', error => {
		    if (error) {
		      return console.error(error);
		    }
		    console.log('Connected to signaling server');
		});
		room.on('members', members => {
		    if (members.length >= 3) return alert('The room is full');
		    const isOfferer = members.length === 2;
		    startWebRTC(isOfferer);
		});
	});

	function sendSignalingMessage(message) {
	  	drone.publish({
		    room: roomName,
		    message
	  	});
	}

	function startWebRTC(isOfferer) {
		console.log('Starting WebRTC in as', isOfferer ? 'offerer' : 'waiter');
		pc = new RTCPeerConnection(configuration);
		pc.onicecandidate = event => {
		    if (event.candidate) {
		      	sendSignalingMessage({'candidate': event.candidate});
		    }
		};


		if (isOfferer) {
		    pc.onnegotiationneeded = () => {
		        pc.createOffer(localDescCreated, error => console.error(error));
		    }
		    dataChannel = pc.createDataChannel('chat');
		    setupDataChannel();
		} else {
		    pc.ondatachannel = event => {
		        dataChannel = event.channel;
		        setupDataChannel();
		    }
		}

	  	startListentingToSignals();
	}

	function startListentingToSignals() {
	  // Listen to signaling data from Scaledrone
	    room.on('data', (message, client) => {
	        // Message was sent by us
		    if (client.id === drone.clientId) {
		      	return;
		    }
		    if (message.sdp) {
		      	// This is called after receiving an offer or answer from another peer
		        pc.setRemoteDescription(new RTCSessionDescription(message.sdp), () => {
		        console.log('pc.remoteDescription.type', pc.remoteDescription.type);
			        // When receiving an offer lets answer it
			        if (pc.remoteDescription.type === 'offer') {
			          	console.log('Answering offer');
			          	pc.createAnswer(localDescCreated, error => console.error(error));
			        }
		      	}, error => console.error(error));
		    } else if (message.candidate) {
		      	// Add the new ICE candidate to our connections remote description
		      	pc.addIceCandidate(new RTCIceCandidate(message.candidate));
		    }
	    });
	}

	function localDescCreated(desc) {
	  	pc.setLocalDescription(desc, () => sendSignalingMessage({'sdp': pc.localDescription}),
	    	error => console.error(error)
	  	);
	}

	// Hook up data channel event handlers
	function setupDataChannel() {
	  	checkDataChannelState();
	  	dataChannel.onopen = checkDataChannelState;
	  	dataChannel.onclose = checkDataChannelState;
	  	dataChannel.onmessage = event => insertMessageToDOM(JSON.parse(event.data), false);
	}

	function checkDataChannelState() {
	  	console.log('WebRTC channel state is:', dataChannel.readyState);
	  	console.log(dataChannel.readyState);
	  	if (dataChannel.readyState === 'open') {
	    	insertMessageToDOM({content: 'WebRTC data channel is now open'});
	  	}
	}

	function insertMessageToDOM(options, isFromMe) {
		const template = document.querySelector('template[data-template="message"]');
		if (template) {
			const nameEl = template.content.querySelector('.message__name');
			if (options.emoji || options.name) {
			    nameEl.innerText = options.emoji + ' ' + options.name;
			}
			template.content.querySelector('.message__bubble').innerText = options.content;
			const clone = document.importNode(template.content, true);
			const messageEl = clone.querySelector('.message');
			if (isFromMe) {
			    messageEl.classList.add('message--mine');
			} else {
			    messageEl.classList.add('message--theirs');
			}

			const messagesEl = document.querySelector('.messages');
			messagesEl.appendChild(clone);
			messagesEl.scrollTop = messagesEl.scrollHeight - messagesEl.clientHeight;
		}
			
	}

	const chatForm = document.querySelector('chat-form');
	if (chatForm) {
		chatForm.addEventListener('submit', () => {
		  	const input = document.querySelector('.chat-input');
		  	if (input) {
		  		const value = input.value;
			  	input.value = '';

			  	const data = {
				    name,
				    content: value,
				    emoji,
			  	};

			  	dataChannel.send(JSON.stringify(data));
			  	insertMessageToDOM(data, true);
		  	}
			  	
		});
	}
		
	insertMessageToDOM({content: 'Chat URL is ' + location.href + '. Share link with a fan and start your Chat.'});
}