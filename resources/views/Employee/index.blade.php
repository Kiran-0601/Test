<html>

<head>
    <title>Employee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
    body {
        background-color: lightcyan;
        margin: 50px;
    }

    h1 {
        text-align: center;

    }

    th,
    td {
        padding: 15px;
        text-align: left;
    }
</style>

<body>
    <div class="container">

        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>Employee Registration</h1>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" required /><br>
            </div>
            <div class="form-group">
                <label for="cname">Company Name</label>
                <input type="text" class="form-control" name="company_name" required />
            </div><br>
            <div class="form-group">
                <label for="dob">Enter Date of Birth</label>
                <input type="date" class="form-control" name="dob" required /><br>
            </div>
            <div class="form-group">
                <label for="address">Enter Address</label>
                <textarea name="adress" class="form-control" required></textarea><br>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" id="country-dropdown">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                    <option value="{{$country->id}}">
                        {{$country->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <select class="form-control" id="state-dropdown">
                </select>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <select class="form-control" id="city-dropdown">
                </select>
            </div>
            <label for="profile_pic">Upload Profile Photo</label>
            <input type="file" class="form-control" name="profile_image" />

            <button type="submit">Submit</button>

        </form>
    </div>
    <h1>Employee Data</h1>
    <table border="02" align="center">
        <tr>
            <td>Name</td>
            <td>Company Name</td>
            <td>Date Of Birth</td>
            <td>Address</td>
            <td>Country</td>
            <td>State</td>
            <td>City</td>
            <td>Profile Image</td>

        </tr>
        @foreach ($employee as $emp)
        <tr>
            <td>{{ $emp->name }}</td>
            <td>{{ $emp->company_name }}</td>
            <td>{{ $emp->dob }}</td>
            <td>{{ $emp->adress }}</td>
            <td>{{ $emp->country }}</td>
            <td>{{ $emp->state }}</td>
            <td>{{ $emp->city }}</td>
            <td><img src="{{ asset('storage/images/'.$emp->profile_image) }}" width="100px"></td>
            <td><a href="{{ route('edit',$emp->id)}}">Edit</a></td>
            <td>
            <form method="post" action="{{route('delete',$emp->id)}}">
                            @method('POST')
                            @csrf
                            <a>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button></a>
                        </form></td>
        </tr>
        @endforeach

    </table>

</body>
<script>
    $(document).ready(function() {
        $('#country-dropdown').on('change', function() {
            var country_id = this.value;
            $("#state-dropdown").html('');
            $.ajax({
                url: "{{url('get-states-by-country')}}",
                type: "POST",
                data: {
                    country_id: country_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#state-dropdown').html('<option value="">Select State</option>');
                    $.each(result.states, function(key, value) {
                        $("#state-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('#city-dropdown').html('<option value="">Select State First</option>');
                }
            });
        });
        $('#state-dropdown').on('change', function() {
            var state_id = this.value;
            $("#city-dropdown").html('');
            $.ajax({
                url: "{{url('get-cities-by-state')}}",
                type: "POST",
                data: {
                    state_id: state_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#city-dropdown').html('<option value="">Select City</option>');
                    $.each(result.cities, function(key, value) {
                        $("#city-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>

</html>