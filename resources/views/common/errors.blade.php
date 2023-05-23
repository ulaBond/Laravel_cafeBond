<!--resourses/views/common/errors.blade.php-->
@if (count($errors) > 0)
	<!--Список ошибок формы-->
	<div class="alert alert-danger">
		<strong>Упс! Что-то пошло не так!</strong>
		<br><br>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
        <img src="img/image-41.webp" style="width:80%; padding: 10px 20px">		
	</div>
@endif