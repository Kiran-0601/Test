<html>

<head>
    <title>Employee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        background-color: lightcyan;
        margin: 50px;
    }

    h1 {
        text-align: center;

    }
</style>

<body>
    <div class="container">
        <form action="{{ route('store') }}" method="POST">
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
                <label for="Select country">Select Country</label>
                <select name="country" required class="form-control">
                    <option> Select Country</option>
                    <option>India</option>
                </select><br>
            </div>
            <div class="form-group">
                <label for="Select state">Select state</label>
                <select name="state" required class="form-control">

                    <option> Select state </option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Maharashtra">Maharashtra</option>
                </select><br>
            </div>
            <label for="Select city">Select city</label>
            <select name="city" required class="form-control">
                <option> Select state </option>
                <option value="Dahod">Dahod</option>
                <option value="Vadodara">Vadodara</option>

            </select><br>
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
            <td>{{ $emp->profile_image }}</td>
            <td><a href="{{ route('edit',$emp->id)}}">Edit</a></td>
            <td><a href="{{ route('delete', $emp->id)}}">Delete</a></td>
        </tr>
        @endforeach

    </table>
</body>

</html>