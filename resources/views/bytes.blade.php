<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-4">
    <h1 style="margin-bottom: 0;display: inline">Двоичные числа</h1>
    <div style="display: inline;float: right;margin-bottom: 20;">
                        <form action="{{ route('importProcess') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <label for="file" class="col-md-3 control-label"></label>
                    <input type="file" name="file">
                    <button type="submit" class="btn btn-primary">Импорт</button>
                </form>
            </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Бит 0</th>
                <th>Бит 1</th>
                <th>Бит 2</th>
                <th>Бит 3</th>
                <th>Бит 4</th>
                <th>Бит 5</th>
                <th>Бит 6</th>
                <th>Бит 7</th>
                <th>Десятичное число</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bytes as $value)
                <tr>
                    <td><input numId="{{ $value->id }}" class="bytesChecked form-check-input" type="checkbox"></td>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->byte0?'1':'0'}}</td>
                    <td>{{ $value->byte1?'1':'0' }}</td>
                    <td>{{ $value->byte2 ?'1':'0'}}</td>
                    <td>{{ $value->byte3 ?'1':'0'}}</td>
                    <td>{{ $value->byte4 ?'1':'0'}}</td>
                    <td>{{ $value->byte5 ?'1':'0'}}</td>
                    <td>{{ $value->byte6 ?'1':'0'}}</td>
                    <td>{{ $value->byte7 ?'1':'0'}}</td>
                    <td class="decimal">{{ $value->decimal }}</td>
                    <td>
                        <button numId="{{ $value->id }}" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal">
                            <i class="fas fa-edit"></i> Изменить
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <nav>
        <div class="row">
            <div class="col-md-6">
                <button id="delete_button" type="button" style="" class="btn btn-danger">Удалить Выбранные</button>
                <button id="sum_button" type="button" class="btn btn-primary">Сложить</button>
                <button id="multiply_button" type="button" class="btn btn-primary">Умножить</button>
                <button id="create_button" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Создать</button>
                <button id="exelButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Импорт</button>
            </div>
        </div>
    </nav>
</div>
@include('model')
@include('script')
</body>
</html>
