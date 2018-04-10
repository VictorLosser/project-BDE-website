<!DOCTYPE html>
<html>
<head>
	<title>LES TACHES</title>
</head>
<body>
	<h1>WELCOME <?= $firstname; ?> <?=  $lastname; ?> to the <?= $site ?></h1>


	<ul>

		@foreach ($tasks as $tasks)

		<a href='/task/{{ $tasks->id }}'>
			<li>{{ $tasks->title }}</li>
		</a>

		@endforeach

	</ul>
</body>
</html>