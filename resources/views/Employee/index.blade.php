<html>
    <head>
        <title>Employee</title>
    </head>
    <style>
        body{
            background-color: lightcyan;
        }
        h1{
            text-align: center;

        }
    </style>
    <body>
    <form method="post" action="">
        @csrf
        <h1>Employee Registration</h1>
        <label for="name">Name</label>
        <input type="text" name="name"/><br>
        <label for="cname">Company Name</label>
        <input type="text" name="cname"/><br>
        <label for="dob">Enter Date of Birth</label>
        <input type="date" name="dob"/><br>
        <label for="address">Enter Address</label>
        <textarea></textarea><br>
        <label for="Select country">Select Country</label>
        <select name="Country">Select Country</select><br>
        <label for="Select state">Select state</label>
        <select name="state">Select state</select><br>
        <label for="Select city">Select city</label>
        <select name="city">Select city</select><br>
    </form>
    </body>
</html>