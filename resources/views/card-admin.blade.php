<!doctype html>
<html lang="en">

<head>
    <title>Form Crawler</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="card">
        <div class="card-header text-center">
            <h1 style="color: red">C#, PHP IN DA NANG</h1>
        </div>
        <div class="card-body ">
            <a href="/add-url-admin" class="btn btn-outline-primary">ADD URL</a>
            <form action="/admin" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for=""></label>
                    <select class="custom-select" name="url_web" id="">
                        @foreach ($url as $item)
                        <option value="{{ $item->url }}??{{ $item->id }}"> {{ $item->url }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="card">Card</label>
                      <input type="text" class="form-control" name="card_web" value="" id="" aria-describedby="helpId"
                        placeholder="div.class-form-1>a.class-form-2">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>

                <input type="submit" class="btn btn-outline-success" name="submit" value="Create">
                <input type="submit" class="btn btn-outline-primary" name="submit" value="Crawler">

            </form>
        </div>
        <div class="card-footer text-muted">
            Data:
            <div>
                @php
                    $index = 1;
                @endphp

                <table class="table">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($data))
                            @foreach ($data as $item)
                                <tr>
                                    <td scope="row">{{ $index++ }}</td>
                                    <td>{{ $item }}</td>
                                </tr>
                            @endforeach
                        @endif
x
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
