<!DOCTYPE html>
<html>
<head>
	@foreach ($items as $item)
	<p>{{ $item->name }}</p>
	<p>-{{ $categories->name }}</p>
	<p>-{{ $categories->description }}</p>
	<hr>
	@endforeach
</head>
<body>
</body>
</html>