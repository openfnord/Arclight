<?php
session_start();
$_SESSION['username'] = "arclight";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Hello, world!</title>
</head>

<body>
    <form class="form" id="myform">
        <!-- <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name">
        </div> -->
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name">
        </div>
        <div class="mb-3">
            <label class="form-label">Gender</label>
            <input type="text" class="form-control" name="gender" id="gender">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="number" class="form-control" name="number" id="number">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script>
        // send form data to create user in endpoint localhost://api/arc in json
        var form = document.getElementById('myform');
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            //take first name from php session
            var first_name =  "<?php echo $_SESSION['username']; ?>";
            var last_name = document.getElementById('last_name').value;
            var gender = document.getElementById('gender').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var number = document.getElementById('number').value;

            //Fetch POST request
                fetch('https://3.111.98.248:3000/api/arc', {
                    method: 'POST',
                    body: JSON.stringify({
                        first_name: first_name,
                        last_name: last_name,
                        gender: gender,
                        email: email,
                        password: password,
                        number: number
                    }),
                    headers: {
                    Accept: 'application/json',
                    'Access-Control-Allow-Origin' : '*',
                    'Content-Type': 'application/json',
                    // Authorization: 'Bearer ' + token // if you use token
                }
        }).then(function (response) {
                    return response.json();
                }).then(function (data) {
                    console.log(data)
                })
        });

        // const thisForm = document.getElementById('myform');
        // thisForm.addEventListener('submit', async function (e) {
        //     e.preventDefault();
        //     const formData = new FormData(thisForm).entries()
        //     const response = await fetch('localhost:3001/api/arc', {
        //         method: 'POST',
        //         headers: {
        //             Accept: 'application/json',
        //             'Access-Control-Allow-Origin' : '*',
        //             'Content-Type': 'application/json',
        //             // Authorization: 'Bearer ' + token // if you use token
        //         },
        //         body: JSON.stringify(Object.fromEntries(formData))
        //     });

        //     const result = await response.json();
        //     console.log(result)
        // });


    </script>
</body>

</html>