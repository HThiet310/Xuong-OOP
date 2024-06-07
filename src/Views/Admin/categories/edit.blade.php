<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cập nhật người dùng: {{ $catgory['name'] }}</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1>Cập nhật người dùng: {{ $category['name'] }}</h1>

	@if (!empty($_SESSION['errors']))
		<div class="alert alert-warning">
			<ul>
				@foreach ($_SESSION['errors'] as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>

			@php
				unset($_SESSION['errors']);
			@endphp
		</div>
	@endif

    <form action="{{ url("admin/catgories/{$category['id']}/update") }}" enctype="multipart/form-data" method="POST">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Tên danh mục:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $category['name'] }}" name="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="img_thumbnail" class="form-label">Ảnh danh mục:</label>
            <input type="file" class="form-control" id="img_thumbnail" placeholder="Chọn ảnh" name="img_thumbnail">
            <img src="{{ asset($category['img_thumbnail']) }}" alt="" width="100px">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>