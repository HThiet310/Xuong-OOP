<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết danh mục: {{ $category['name'] }}</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1>Chi tiết danh mục: {{ $category['name'] }}</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Trường</th>
                <th>Giá trị</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($category as $field => $value)
                <tr>
                    <td>{{ $field }}</td>
                    <td> 
                        @if ($field === 'img_thumbnail')
                        <img src="{{ asset($value) }}" alt="Category Image" style="max-width: 100px;">
                        @else
                        {{ $value }}
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>