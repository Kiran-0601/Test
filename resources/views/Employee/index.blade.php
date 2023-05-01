<html>

<head>
    <title>Employee</title>
</head>
<style>
    body {
        background-color: lightcyan;
    }

    h1 {
        text-align: center;

    }
</style>

<body>
<form action="{{ route('store') }}" method="POST">
        @csrf
        <h1>Employee Registration</h1>
        <label for="name">Name</label>
        <input type="text" name="name" required /><br>
        <label for="cname">Company Name</label>
        <input type="text" name="company_name" required /><br>
        <label for="dob">Enter Date of Birth</label>
        <input type="date" name="dob" required /><br>
        <label for="address">Enter Address</label>
        <textarea name="adress" required></textarea><br>
        <label for="Select country">Select Country</label>
        <select name="country" required>
            <option> Select Country</option>
            <option>India</option>
        </select><br>
        <label for="Select state">Select state</label>
        <select name="state" required>
            <option> Select state </option>
            <option value="Gujarat">Gujarat</option>
            <option value="Maharashtra">Maharashtra</option>
        </select><br>
        <label for="Select city">Select city</label>
        <select name="city" required>
            <option> Select state </option>
            <option value="Dahod">Dahod</option>
            <option value="Vadodara">Vadodara</option>

        </select><br>
        <label for="profile_pic">Upload Profile Photo</label>
        <input type="file" name="profile_image" />

        <button type="submit">Submit</button>
    </form>
</body>

</html>