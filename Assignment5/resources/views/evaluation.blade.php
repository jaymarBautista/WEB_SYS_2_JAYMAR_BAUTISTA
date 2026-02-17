<!DOCTYPE html>
<html>
<head>
    <title>Student Evaluation System</title>
    <style>
        body { font-family: sans-serif; margin: 50px; line-height: 1.6; }
        .result-box { border: 1px solid #ccc; padding: 20px; width: 300px; border-radius: 8px; }
        .passed { color: green; font-weight: bold; }
        .failed { color: red; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Student Evaluation</h2>
        @php
            $average = ($prelim + $midterm + $final) / 3;
        @endphp

        <div class="result-box">
            <p><strong>Name:</strong> {{ $name }}</p>
            <p><strong>Average:</strong> {{ number_format($average, 2) }}</p>

            <p><strong>Letter Grade:</strong> 
                @if($average >= 90) A
                @elseif($average >= 80) B
                @elseif($average >= 70) C
                @elseif($average >= 60) D
                @else F
                @endif
            </p>

            <p><strong>Remarks:</strong> 
                @if($average >= 75)
                    <span class="passed">Passed</span>
                @else
                    <span class="failed">Failed</span>
                @endif
            </p>

            <p><strong>Award:</strong> 
                @if($average >= 98 && $average <= 100)
                    With Highest Honors
                @elseif($average >= 95)
                    With High Honors
                @elseif($average >= 90)
                    With Honors
                @else
                    No Award
                @endif
            </p>
        </div>

 
    

</body>
</html>