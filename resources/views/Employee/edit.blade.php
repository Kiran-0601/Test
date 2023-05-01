<html>

<head>
    <title> Edit Employee</title>
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
    th,
    td {
        padding: 15px;
        text-align: left;
    }
</style>

<body>
    <div class="container">

        <form action="{{ route('update',$employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>Edit Employee</h1>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $employee->name }}" required /><br>
            </div>
            <div class="form-group">
                <label for="cname">Company Name</label>
                <input type="text" class="form-control" name="company_name" value="{{ $employee->company_name }}" required />
            </div><br>
            <div class="form-group">
                <label for="dob">Enter Date of Birth</label>
                <input type="date" class="form-control" name="dob" value="{{ $employee->dob }}" required /><br>
            </div>
            <div class="form-group">
                <label for="address">Enter Address</label>
                <textarea name="adress" class="form-control" required>{{ $employee->adress }}</textarea><br>
            </div>
            <div class="form-group">
                <label for="Select country">Select Country</label>
                <select name="country" required class="form-control">
                    <option value="{{ $employee->country }}" selected> {{ $employee->country }}</option>
                    <option> Select Country</option>
                    <option>India</option>
                </select><br>
            </div>
            <div class="form-group">
                <label for="Select state">Select state</label>
                <select name="state" required class="form-control">
                <option value="{{ $employee->state }}" selected> {{ $employee->state }}</option>
                    <option> Select state </option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Maharashtra">Maharashtra</option>
                </select><br>
            </div>
            <label for="Select city">Select city</label>
            <select name="city" required class="form-control">
            <option value="{{ $employee->city }}" selected> {{ $employee->city }}</option>
                <option> Select state </option>
                <option value="Dahod">Dahod</option>
                <option value="Vadodara">Vadodara</option>

            </select><br>
            <label for="profile_pic">Upload Profile Photo</label>
            <input type="file" class="form-control" name="profile_image" />
            <img src=""/>
            <button type="submit">Submit</button>
        </form>
</body>
</html>