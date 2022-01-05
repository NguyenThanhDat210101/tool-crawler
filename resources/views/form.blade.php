<!doctype html>
<html lang="en">

<head>
    <title>Form Crawler</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="card">
        <div class="card-header text-center">
            <h1 style="color: red">C#, PHP IN DA NANG</h1>
        </div>
        <div class="card-body ">
            <form action="/post" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="url_id">Website (URL)</label>
                    <select id="url_id" class="form-control" name="url_web" onchange="function_imei()">
                        <option value="0">Chọn Trang</option>
                        @foreach ($url as $item)
                            <option value="{{ $item->url }}??{{ $item->id }}">{{ $item->url }}</option>

                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="card">Card</label>
                    <select id="card" class="form-control" name="card_web">
                        <option>Chọn Trang</option>
                    </select>
                </div>

                <button class="btn btn-outline-success">Crawler</button>
                <a href="/stats" class="btn btn-outline-dark">Stats</a>

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
                        @if (!empty($stats))
                            @foreach ($stats as $item)
                                <tr>
                                    <td scope="row">{{ $index++ }}</td>
                                    <td><a href="{{ $item->data_link }}">{{ $item->data_name }}</a></td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        function  function_imei(){
        //  var selected_imei = document.getElementById('url_id').value;
         var x = document.getElementById("url_id").value;
            id = x.split('??')[1];
          $.ajax({
              url:'/api/card-data/' + id,
              type: 'get',
              data: {},
              success: function(data) {
               console.log('data', data);
               $("#card option").remove();
                    var i;
                    for (i = 0; i < data.length; ++i) {
                        $('#card').append('<option value="' + data[i]['card'] + '">' + data[i]['card'] +
                            '</option>');

                    }
           }
           });
        }
        </script>
</body>

</html>
