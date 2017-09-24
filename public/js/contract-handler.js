

// Global object to manage web3
App = {
	host: "http://159.203.0.218:8545",

	contracts: {},

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

	createContract: function() {
		$.getJSON('contracts-artifacts/BallotProgramathon.json', function(data) {
			console.log(data);
			var _contract = App.web3.eth.contract(data.abi);
			console.log(_contract)
			console.log(App.web3.eth.coinbase)
			

			var contract = _contract.new({from: "0x1e80fcff0b8ce33c53755766e0483fb901eaf3d5", gas: 4600000, data: data.unlinked_binary},(err, res) => {
			    if (err) {
			        console.log(err);
			        return;
			    }
			    // Log the tx, you can explore status with eth.getTransaction()
			    console.log(res.transactionHash);
			    console.log(res);
			    // If we have an address property, the contract was deployed
			    if (res.address) {
			        console.log('Contract address: ' + res.address);
			        // Let's test the deployed contract
			        testContract(res, data);
			    }
			});

			///////////////////////////////////////////////////////////////////////
			function testContract(contr, data) {
				// console.log(contr.getWord.call());
				// contr.setContractTime.sendTransaction("1507252163991", "1508252163991", {from: "0x1e80fcff0b8ce33c53755766e0483fb901eaf3d5"})
				// contr.deploy({data: data.unlinked_binary, arguments: [10, 1, ["perro","gato"]]})
				// console.log(contr.getProgress.call())
				// console.log(contr.candidateList.call());

				// console.log(App.web3.eth.accounts.create());


				// contr.setWord.sendTransaction("hola!!!!!", {from: "0x584a104e03db1199be9d11c579d56c73bc0267af"});


				// var _new = App.web3.eth.contract(data.abi);
				// var __new = _new.at(contr.address);

				// console.log(__new)
				// __new.setWord.sendTransaction("Adios!!!!!", {from: "0x584a104e03db1199be9d11c579d56c73bc0267af"});
				// console.log(__new.getWord.call());
			}
		});
	},

	//////////////////////////////////////////////////////////////////
	getBlockchainInfo: function() 
	{
		// console.log("Blockchain is listen: " + App.web3.net.listening)
		// var data = "";

		// data += "<strong>Network: </strong> "+App.web3.version.network+" <br/>";
		// data += "<strong>Ethereum version: </strong> "+App.web3.version.ethereum+" <br/>";
		// data += "<strong>Is listenig: </strong> "+App.web3.net.listening+" <br/>";
		// data += "<strong>Connectes peers: </strong> "+App.web3.net.peerCount+" <br/>";
		// data += "<strong>Ethereum default account: </strong> "+App.web3.eth.defaultAccount+" <br/>"
		// data += "<strong>Ethereum default block: </strong> "+App.web3.eth.defaultBlock+" <br/>";
		// data += "<strong>Ethereum sync: </strong> "+App.web3.eth.syncing+" <br/>";
		// data += "<strong>Ethereum coinbase: </strong> "+App.web3.eth.coinbase+" <br/>";
		// data += "<strong>Ethereum is mining: </strong> "+App.web3.eth.mining+" <br/>";
		// data += "<strong>Ethereum gas price: </strong> "+App.web3.eth.gasPrice+" <br/><br/>";

		// data += "<strong>Ethereum accounts: </strong>  <br/>";
		// App.web3.eth.accounts.forEach(function(item){
		// 	data += " "+ item + "<br/>"
		// })

		// data += "<br/><strong>Ethereum methods: </strong> (check console) F12 <br/>";
		// data += "<br/><strong>Web3 object: </strong> (check console) F12 <br/>";

		// console.log("Ethereum methods >>>>")
		// console.log((App.web3.eth))
		// console.log("Web3 object >>>>")
		// console.log((App.web3))

		// $('#blockchain_info').html(data);
	},
} // App end

App.init();