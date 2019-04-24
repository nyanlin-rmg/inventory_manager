<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Hello World</h1>
	<div id="app">
		{{ message }}
	</div>
	<script type="text/javascript">
		var app = new Vue({
			el: '#app',
			data: {
				message: 'Hello Vue'
			}
		})
	</script>
</body>
</html>