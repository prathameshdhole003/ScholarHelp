<?php
session_start();

include('config.php');

$email = $_SESSION['SESSION_EMAIL'];

$sql = mysqli_query($conn, "select * from users where email = '$email'");
$row = mysqli_fetch_array($sql);
$id = $row['id'];

$query = mysqli_query($conn, "select * from details where user_id = {$id}");
$row1 = mysqli_fetch_array($query);
$category = $row1['cat'];
$incomeVal = $row1['inc'];

// Start
//End
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</head>

<style>
    .heading {
        color: black;
    }

    .heading h1 {
        text-align: center;
        margin-top: 10px;
    }

    .btn_div{
        display: flex;
        justify-content: center;
    }

    #btn{
        background-color: blue;
        width: 120px;
        height: 45px;
        font-size: 1rem;
        color: white;
        border: none;
        border-radius: 10px;
    }

    #btn:hover{
        cursor: pointer;
    }

    #btn1{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 20px;
        background-color: blue;
        width: 120px;
        height: 45px;
        font-size: 1rem;
        color: white;
        border: none;
        border-radius: 10px;
    }

    #btn1 a{
        text-decoration: none;
        color: white;
    }
    #btn1:hover{
        cursor: pointer;
    }

</style>

<body>

    <div class="heading">
        <h1>Eligible Scholarships </h1>
    </div>
    <div>
        <table class="tableclass" id="simple_table">
            <thead>
                <tr>
                    <th>Sr no.</th>
                    <th>Scholarship</th>
                    <th>Authority</th>
                    <th>State</th>
                    <th>Cutoff</th>
                    <th>Category</th>
                    <th>Income Limit</th>
                    <th>Benefit</th>
                    <th>Documents Required</th>
                    <th>Apply Link</th>
                </tr>
            </thead>
            <tbody id="data-output">
            </tbody>
        </table>
    </div>

    <script id="select">
        fetch("sch.json")
            .then(function(response) {
                return response.json();
            })
            .then(function(schs) {
                let placeholder = document.querySelector("#data-output");
                let out = "";
                var cat = "<?= $category ?>";
                var inc = "<?= $incomeVal ?>";
                for (let sch of schs) {
                    if ((sch.category === cat || sch.category === 'All') && sch.incomelimit >= inc) {
                        out += `
                        <tr>
                            <td> ${sch.id}</td>
                            <td> ${sch.sname}</td>
                            <td> ${sch.aname}</td>
                            <td> ${sch.state}</td>
                            <td> ${sch.cutoff}</td>
                            <td> ${sch.category}</td>
                            <td> ${sch.incomelimit}</td>
                            <td> ${sch.benefit}</td>
                            <td> ${sch.docrequired}</td>
                            <td> 
                            <a href="${sch.link}">${sch.link}</a>
                            </td>
                        </tr>
                        `;
                    }
                }
                placeholder.innerHTML = out;
            })

        'use strict';

        jQuery.noConflict();
        jQuery(document).ready(function($) {

            // usage: 2
            $('#myForm').formToJson('.result-json-output');

        });
    </script>

    <script id="tablescript">
        function generate() {
            var doc = new jsPDF('p', 'pt', 'letter');
            var htmlstring = '';
            var tempVarToCheckPageHeight = 0;
            var pageHeight = 0;
            pageHeight = doc.internal.pageSize.height;
            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector  
                '#bypassme': function(element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"  
                    return true
                }
            };
            margins = {
                top: 150,
                bottom: 60,
                left: 40,
                right: 40,
                width: 600
            };
            var y = 20;
            doc.setLineWidth(2);
            doc.text(200, y = y + 30, "Eligible Scholarships");
            doc.autoTable({
                html: '#simple_table',
                startY: 70,
                theme: 'grid',
                columnStyles: {
                    0: {
                        cellWidth: 20,
                    },
                    1: {
                        cellWidth: 50,
                    },
                    2: {
                        cellWidth: 50,
                    },
                    3: {
                        cellWidth: 50,
                    },
                    4: {
                        cellWidth: 50,
                    },
                    5: {
                        cellWidth: 50,
                    },
                    6: {
                        cellWidth: 50,
                    },
                    7: {
                        cellWidth: 50,
                    },
                    8: {
                        cellWidth: 80,
                    },
                    9: {
                        cellWidth: 80,
                    },
                },
                styles: {
                    minCellHeight: 40
                }
            })
            doc.save('Eligible_Scholarships.pdf');
        }
    </script>

    <div class="btn_div">
        <input type="button" id="btn" onclick="generate()" value="Generate PDF" />
        <div id="btn1"><a href="pdf.php">Send Mail</a></div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
</body>

</html>