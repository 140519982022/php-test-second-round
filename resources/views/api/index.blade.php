<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>API Data</title>
</head>
<body>
    <h1>API Data</h1>
    <ul>
        <?php  // dd($data['TotalCasesCP']);
        ?>
        @if (!empty($data['TotalCasesCP']))
            @foreach($data['TotalCasesCP'] as $case)
       
                <li>
                    <strong>Case Title:</strong> {{ $case['speciality'] }}<br>
                    <strong>Admin Name:</strong> {{ $case['admin'] }}<br>
                    <strong>Case Image:</strong> <img src="{{ $case['image'] }}" alt="Case Image"><br>
                    <strong>Created Date:</strong> {{ $case['createdat'] }}<br><br>

                </li>
        
            @endforeach
            @else
            <h4 style="color:red">Data not available.</h4>
        @endif
    </ul>
</body>
</html>
