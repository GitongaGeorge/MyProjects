<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style type="text/css">
        thead:before,
        thead:after {
            display: none;
        }

        tbody:before,
        tbody:after {
            display: none;
        }
    </style>
    <style>
.page-break {
    page-break-after: always;
}
</style>
    <title>Smart Irrigation Report</title>
</head>

<body>
    <div class="container-fluid">
        <h2> Smart Irrigation Full Report</h2>
        <table class="table table-sm">
            <tbody>
                <tr scope="row">
                    <td>Name</td>
                    <td>{{Session::get('username')}}</td>
                </tr>
                <tr>
                    <td>Report Type</td>
                    <td>Full Farm Report</td>
                </tr>
                <tr>
                    <td>Current Temperature</td>
                    <td>{{$data[1]->value}} Celsius</td>
                </tr>
                <tr>
                    <td>Current Humidity</td>
                    <td>{{$data[0]->value}}%</td>
                </tr>
                <tr>
                    <td>Current Soil Moisture</td>
                    <td>{{$data4[0]->value}}%</td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td>{{ date('Y-m-d H:i:s') }}</td>
                </tr>
            </tbody>
        </table>
        <h6><u>Section i : Overview</u></h6>
        <p>This section contains information about the Plantation and the expected Harvest
          time. It also highlights the current stage of the maize and the recommended Actions
          to take.
        </p>
        <table class="table table-sm">
            <tbody>
                <tr>
                    <td>Plantation Type</td>
                    <td>Maize Plantation</td>
                </tr>
                <tr>
                    <td>Plant Date</td>
                    <td>{{$data3[0]->date}}</td>
                </tr>
                <tr>
                    <td>Expected Harvest</td>
                    <td>{{$data3[13]->date}}</td>
                </tr>
                <tr>
                    <td>Crop Stage</td>
                    <td>R4</td>
                </tr>
                <tr>
                    <td>Recommended Actions</td>
                    <td>Check out for Stalkborer</td>
                </tr>

            </tbody>
        </table>
        <h6><u>Section ii : Temperature and Humidity</u></h6>
        <p>This section shows the latest Temperature and Humidity values.
          It also explains what the values imply.
        </p>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sensor</th>
                    <th scope="col">Value</th>
                    <th scope="col">Implication</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data as $row)
                    <td>{{$row->sensor}}</td>
                    <td>{{$row->value}}</td>
                    <td>{{$row->outcome}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h6><u>Section iii : Soil Moisture</u></h6>
        <p>This section shows the latest Soil Moisture Values.
          It also explains what the values imply.
        </p>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sensor</th>
                    <th scope="col">Value</th>
                    <th scope="col">Implication</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data4 as $row)
                    <td>{{$row->sensor}}</td>
                    <td>{{$row->value}}</td>
                    <td>{{$row->outcome}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h6><u>Section iv : Sunlight and Rain</u></h6>
        <p>This section shows the latest Sunlight and Rain Values.
          It also explains what the values imply.
        </p>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sensor</th>
                    <th scope="col">Value</th>
                    <th scope="col">Implication</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data2 as $row)
                    <td>{{$row->sensor}}</td>
                    <td>{{$row->value}}</td>
                    <td>{{$row->outcome}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="page-break"></div>
        <h6><u>Section v : Recommended actions for each stage</u></h6>
        <p>This section shows all the stages of development of the maize plant and
          the explanations for each stage.
        </p>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Stage</th>
                    <th scope="col">Description</th>
                    <th scope="col">Recommended Action</th>
                    <th scope="col">Due Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data3 as $row)
                    <td>{{$row->name}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->recommended}}</td>
                    <td>{{$row->date}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->



</body>

</html>
