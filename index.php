
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UOB Student Nationality Data</title>
    <link rel="stylesheet" href="https://unpkg.com/pico.css">
    <style>
        body {
            background-color: #fffff5;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #335;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #CD5C5C;
            color: white;
        }
        tr:hover {
            background-color: #CD5C5C;
        }
        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            th {
                display: none;
            }
            tr {
                margin-bottom: 15px;
            }
            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            td:before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 45%;
                padding-left: 10px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <h1>University of Bahrain Students Enrollment by Nationality</h1>
    <table>
        <thead>
            <tr>
                <th>Year</th>
                <th>Semester</th>
                <th>Nationality</th>
                <th>Number of Students</th>
                <th>College</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
            $response = file_get_contents($URL);
            $result = json_decode($response, true);

            foreach ($result['results'] as $row) {
                echo "<tr>
                        <td data-label='Year'>{$row['year']}</td>
                        <td data-label='Semester'>{$row['semester']}</td>
                        <td data-label='Nationality'>{$row['nationality']}</td>
                        <td data-label='Number of Students'>{$row['number_of_students']}</td>
                        <td data-label='College'>{$row['colleges']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>