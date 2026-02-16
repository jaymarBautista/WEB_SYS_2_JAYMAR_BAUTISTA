<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Evaluation System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Student Academic Evaluation</h2>

        <form action="/evaluation" method="GET" class="space-y-4">
            <div>
                <label class="block font-semibold">Student Name:</label>
                <input type="text" name="name" value="{{ request('name') }}" required class="w-full border p-2 rounded">
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block font-semibold">Prelim:</label>
                    <input type="number" name="prelim" value="{{ request('prelim') }}"  required class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-semibold">Midterm:</label>
                    <input type="number" name="midterm" value="{{ request('midterm') }}"  required class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-semibold">Final:</label>
                    <input type="number" name="final" value="{{ request('final') }}"  required class="w-full border p-2 rounded">
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded hover:bg-blue-600 transition">
                Evaluate Performance
            </button>
        </form>

        <hr class="my-8">


        @if(request()->filled(['name', 'prelim', 'midterm', 'final']))
            @php
               
                $p = request('prelim');
                $m = request('midterm');
                $f = request('final');
                $average = ($p + $m + $f) / 3;
            @endphp


            <div class="bg-gray-50 p-6 rounded border border-gray-200">
                <h3 class="text-lg font-bold mb-4 border-b pb-2">Evaluation Results</h3>
                <p><strong>Name:</strong> {{ request('name') }}</p>
                <p><strong>Average:</strong> {{ $average }}</p>

                <p><strong>Letter Grade:</strong> 
                    @if($average >= 90) A
                    @elseif($average >= 80) B
                    @elseif($average >= 70) C
                    @elseif($average >= 60) D
                    @else F
                    @endif
                </p>

                <p><strong>Remarks:</strong> 
                    <span class="{{ $average >= 75 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $average >= 75 ? 'Passed' : 'Failed' }}
                    </span>
                </p>

                <p><strong>Award:</strong> 
                    @if($average >= 98) With Highest Honors
                    @elseif($average >= 95) With High Honors
                    @elseif($average >= 90) With Honors
                    @else No Award
                    @endif
                </p>
            </div>
        @endif
    </div>
</body>
</html>