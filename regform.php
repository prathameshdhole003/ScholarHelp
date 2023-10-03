<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <!-- CSS Bootstrap File -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="css/regstyle.css">
</head>

<body>
    <script>
        function ageCalculator() {
        var day = document.getElementById("dob").value;
        var DOB = new Date(day);
        var today = new Date();
        var Age = today.getTime() - DOB.getTime();
        Age = Math.floor(Age / (1000 * 60 * 60 * 24 * 365.25));
        document.getElementById("age").value = Age;
    }
    </script>
    <div class="container">
        <h2 id="heading">Registration Form</h2>
        <form action="connect.php" method="post">
            <div class="row">
                <h4>Personal Information </h4>
                
                <div class="col-md-6">

                    <div class="form-group mt-2">
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" placeholder="Enter Here" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="middleName">Middle Name</label>
                        <input type="text" name="middleName" placeholder="Enter Here" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" placeholder="Enter Here" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" id="dob" name="dob" placeholder="Enter Here" class="form-control" required>
                    </div>

                </div>

                <!-- Second Col -->
                <div class="col-md-6">

                    <div class="form-group mt-2">
                        <label for="contactField">Aadhar Number</label>
                        <input type="number" name="aadhar" placeholder="Enter Here" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="contactField">Contact Number</label>
                        <input type="number" name="contact" placeholder="Enter Here" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="address">Address</label>
                        <input type="text" name="address" required placeholder="Enter Here" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" name="age" onmousemove="ageCalculator()">
                    </div>
                </div>
            </div>

            <div class="row">
                <h4>Educational Details</h4>
                
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="firstName">Admission Year</label>
                        <input type="number" id="adYear" placeholder="Enter Here" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="istate">Institute State</label>
                        <input type="text" id="istate" placeholder="Enter Here" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="idistrict">Institute District</label>
                        <input type="text" id="idistrict" placeholder="Enter Here" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="college">College Name</label>
                        <input type="text" name="college" placeholder="Enter Here" class="form-control" required>
                    </div>

                </div>

                <!-- Second Col -->
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="contactField">Qualification Level</label><br>
                        <select name="qualification" class="selectValue">
                            <option value="cer">Certificate Course</option>
                            <option value="dip">Diploma Course</option>
                            <option value="under">Undergraduate Course</option>
                            <option value="post">Post Graduate Course</option>
                            <option value="voc">Vocational Course</option>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="stream">Stream</label><br>
                        <select name="qualification" class="selectValue">
                            <option value="eng">Engineering</option>
                            <option value="hsci">Health Science</option>
                            <option value="law">Law</option>
                            <option value="man">Management</option>
                            <option value="arts">Arts</option>
                            <option value="comm">Commerce</option>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="course">Course Name</label><br>
                        <select name="course" class="selectValue">
                            <option value="IT">B.Tech - Information Technology</option>
                            <option value="CE">B.Tech - Computer Engineering</option>
                            <option value="EXTC">B.Tech - Electronics and Telecommunication</option>
                            <option value="ELE">B.Tech - Electrical Engineering</option>
                            <option value="MEC">B.Tech - Mechanical Engineering</option>
                            <option value="CIV">B.Tech - Civil Engineering</option>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="ad">Admission ID</label>
                        <input type="number" class="form-control" id="age" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <h4>Caste Details</h4>
                
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="cat">Category</label>
                        <select name="category" id="category" class="selectValue">
                            <option value="gen">General</option>
                            <option value="obc">OBC</option>
                            <option value="sc">SC</option>
                            <option value="st">ST</option>
                            <option value="vjnt">VJNT</option>
                            <option value="sebc">SEBC</option>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="caste">Caste</label>
                        <select name="name" class="selectValue">
                            <option value="ksh">Kshatriya</option>
                            <option value="kun">Kunbi</option>
                            <option value="nha">Nhavi</option>
                            <option value="dho">Dhobi</option>
                            <option value="kac">Kachhi</option>
                        </select>
                    </div>
                </div>

                <!-- Second Col -->
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="cnumber">Caste Certificate Number</label>
                        <input type="number" id="cnumber" placeholder="Enter Here" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="cdistrict">Date Of Issue</label>
                        <input type="date" id="issuedate" placeholder="Enter Here" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <h4>Income Details</h4>
                
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="faminc">Annual Family Income</label>
                        <input type="number" name="income" placeholder="Enter Here" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="incno">Income Certificate Number</label>
                        <input type="number" id="incomeNo" placeholder="Enter Here" class="form-control" required>
                    </div>
                </div>

                <!-- Second Col -->
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="iauthority">Issuing Authority</label>
                        <select name="name" class="selectValue">
                            <option value="sdo">Sub Divisional Officer</option>
                            <option value="tah">Tahsildar</option>
                            <option value="exem">Executive Magistrate</option>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="dissue">Date Of Issue</label>
                        <input type="date" id="issuedate" placeholder="Enter Here" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <h4>Bank Details</h4>
                
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="cat">Bank Account Number</label>
                        <input type="number" id="accnumber" placeholder="Enter Here" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="cat">IFSC Code</label>
                        <input type="varchar" id="ifsc" placeholder="Enter Here" class="form-control" required>
                    </div>
                </div>

                <!-- Second Col -->
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="bname">Bank Name</label>
                        <input type="text" id="bname" placeholder="Enter Here" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="brname">Branch Name</label>
                        <input type="text" id="brname" placeholder="Enter Here" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="container text-center mt-3">
                <button class="btn btn-primary btn-lg">Submit</button>
            </div>

        </form>

    </div>

    <!-- JS Bootstrap File  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>

    <script src="script.js"></script>

</body>

</html>