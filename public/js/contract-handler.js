

// Global object to manage web3
App = {
	host: "http://159.203.0.218:8545",

	Web3: require('web3'),
	web3: new Web3(),
	balance: new BigNumber('131242344353464564564574574567456'),
	
	//////////////////////////////////////////////////////////////////
	init: function() 
	{
		if (typeof App.web3 !== 'undefined') {
		  App.web3 = new Web3(new Web3.providers.HttpProvider(App.host));
		  console.log('new');
		} else {
		  console.log('setting provider');
		  // set the provider you want from Web3.providers
		  App.web3 = new Web3(new Web3.providers.HttpProvider(App.host));
		}

		if(!App.web3.isConnected()) {
		   // show some dialog to ask the user to start a node
		   console.log('no esta conectado')
		} else {
		   console.log('conectado!!')
		   App.getBlockchainInfo()
		}
	},

	//////////////////////////////////////////////////////////////////
	getBlockchainInfo: function() 
	{
		console.log("Blockchain is listen: " + App.web3.net.listening)
		var data = "";

		data += "<strong>Network: </strong> "+App.web3.version.network+" <br/>";
		data += "<strong>Ethereum version: </strong> "+App.web3.version.ethereum+" <br/>";
		data += "<strong>Is listenig: </strong> "+App.web3.net.listening+" <br/>";
		data += "<strong>Connectes peers: </strong> "+App.web3.net.peerCount+" <br/>";
		data += "<strong>Ethereum default account: </strong> "+App.web3.eth.defaultAccount+" <br/>"
		data += "<strong>Ethereum default block: </strong> "+App.web3.eth.defaultBlock+" <br/>";
		data += "<strong>Ethereum sync: </strong> "+App.web3.eth.syncing+" <br/>";
		data += "<strong>Ethereum coinbase: </strong> "+App.web3.eth.coinbase+" <br/>";
		data += "<strong>Ethereum is mining: </strong> "+App.web3.eth.mining+" <br/>";
		data += "<strong>Ethereum gas price: </strong> "+App.web3.eth.gasPrice+" <br/><br/>";

		data += "<strong>Ethereum accounts: </strong>  <br/>";
		App.web3.eth.accounts.forEach(function(item){
			data += " "+ item + "<br/>"
		})

		data += "<br/><strong>Ethereum methods: </strong> (check console) F12 <br/>";
		data += "<br/><strong>Web3 object: </strong> (check console) F12 <br/>";

		console.log("Ethereum methods >>>>")
		console.log((App.web3.eth))
		console.log("Web3 object >>>>")
		console.log((App.web3))

		$('#blockchain_info').html(data);
	},
} // App end

App.init();