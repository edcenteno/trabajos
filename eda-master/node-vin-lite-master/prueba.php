<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<title>Edmunds API Example</title>
</head>
<body>
	<div id="results-body"></div>
	<script>
	  	window.sdkAsyncInit = function() {
	    	// Instantiate the SDK
			var res = new EDMUNDSAPI('YOUR API KEY');
			// Optional parameters
			var options = {
				"manufacturerCode": "3548"
			};
			// Callback function to be called when the API response is returned
			function success(res) {
				var body = document.getElementById('results-body');
				body.innerHTML = "The car make is: " + res.styleHolder[0].makeName;
			}
			// Oops, Houston we have a problem!
			function fail(data) {
				console.log(data);
			}
			// Fire the API call
			res.api('/api/vehicle/v2/vins/4T1BK1EB6DU056165', options, success, fail);
		    // Additional initialization code such as adding Event Listeners goes here
	  };
	  // Load the SDK asynchronously
	  (function(d, s, id){
	     	var js, sdkjs = d.getElementsByTagName(s)[0];
	     	if (d.getElementById(id)) {return;}
	     	js = d.createElement(s); js.id = id;
	     	js.src = "path/to/sdk/file";
	     	sdkjs.parentNode.insertBefore(js, sdkjs);
	   }(document, 'script', 'edmunds-jssdk'));
	</script>
</body>
</html>