<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Resume - Salman Patel</title>
    <style>
       
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            color: #333;
            display: flex;
            justify-content: center;
        }

        .resume-container {
            background-color: #fff;
            width: 850px; /* Standard A4ish width */
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

       
        .header {
            background-color: #005fa3; /* Professional Blue */
            color: white;
            display: flex;
            padding: 30px;
            align-items: center;
        }

        .photo-box {
            width: 150px;
            height: 180px;
            background-color: #ddd;
            margin-right: 30px;
            overflow: hidden;
            border: 2px solid #fff;
        }

        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .header-text h1 {
            margin: 0;
            font-size: 42px;
            font-weight: 500;
            letter-spacing: 1px;
        }

        .header-text h2 {
            margin: 5px 0 20px 0;
            font-weight: 300;
            font-size: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.3);
            display: inline-block;
            padding-bottom: 5px;
        }

      
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 40px;
            font-size: 13px;
        }

        .contact-item strong {
            display: inline-block;
            width: 80px;
        }

       
        .main-content {
            padding: 40px;
        }

        .summary {
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 30px;
        }


        h2.section-title {
            color: #005fa3;
            font-size: 20px;
            text-transform: uppercase;
            border-bottom: 2px solid #005fa3;
            margin-bottom: 20px;
            margin-top: 30px;
        }

       
        .row {
            display: flex;
            margin-bottom: 20px;
        }

        .year-col {
            flex: 0 0 150px;
            font-weight: bold;
            font-size: 14px;
        }

        .details-col {
            flex: 1;
        }

        .details-col strong {
            font-size: 16px;
        }

        .details-col p {
            margin: 5px 0;
            font-size: 14px;
        }

        ul {
            padding-left: 20px;
            margin-top: 10px;
        }

        li {
            margin-bottom: 5px;
            font-size: 14px;
        }

       
        .skills-list {
            list-style-type: disc;
            columns: 2;
            -webkit-columns: 2;
            -moz-columns: 2;
        }

    </style>
</head>
<body>

<div class="resume-container">
    <div class="header">
        <div class="photo-box">
            <img src="photos/jaymar.jpg" alt="Jaymar Valdez Bautista">
        </div>
        @php
        $name = "Jaymar Valdez Bautista";
        $career = "Mobile Developer";

        //details
        $phone = "09064790211";
        $address = "Alipangpang Pozorrubio Pangasinan";
        $email = "jaymarbautista623@gmail.com";
        $birthdate = "30 September 2004";
        $linked_in = "https://www.linkedin.com/in/jaymar-bautista-859574381/"; 
        $gender = "Male";
        $github = "https://github.com/jaymarBautista/WEB_SYS_2_JAYMAR_BAUTISTA.git";
        $nationality = "Filipino";
        $version = "";
        $age = 22;
        if ($age == 21){
        $version = "Dalawampu't isa";
        } elseif ($age == 22){
        $version = "Duapulo ket dua";
        } elseif($age == 23){
        $version = "Duapulo ket tallo";
        } elseif($age >= 24){
        $version = "Saray 24 ya taon paitas";
        }

        $description = " Highly skilled in developing and beta-testing mobile apps. Designed a mobile-centric app that slashed inventory management time by up to 70%. Eager to leverage native and cross-platform mobile coding skills to improve the quality of average user experience and help Sola Software grow exponentially.";
       
        $highschool_year = "2017-2022";
        $highschool = "Benigno V Aldana National Highschool";

        $college_year = "2023-Present";
        $course = "Bachelor of Information Technology";
        $school_address = "Pangasinan State University, Urdaneta Campus";
        $specialization = "Web and Mobile Technologies";

        $skills_1 = "Dart, Flutter";
        $skills_2 = "C#, Java";
        $skills_3 = "HTML, CSS, Javascript";
        $skills_4 = "Sqlite, Mysql, Realm, Shared Preferences";
        @endphp 

        <div class="header-text">
            <h1>{{$name}}</h1>
            <h2>{{ $career }}</h2>

            <div class="contact-grid">
                <div class="contact-item"><strong>Age:</strong> {{ $age }} | {{   $version }}</div>
                <div class="contact-item"><strong>Phone:</strong> {{ $phone }}</div>
                <div class="contact-item"><strong>Address:</strong> {{ $address }}</div>
                <div class="contact-item"><strong>Email:</strong>{{ $email }}</div>
                <div class="contact-item"><strong>Birth Date:</strong> {{ $birthdate }}</div>
                <div class="contact-item"><strong>LinkedIn:</strong> {{ $linked_in }}</div>
                <div class="contact-item"><strong>Gender:</strong> {{ $gender }}</div>
                <div class="contact-item"><strong>GitHub:</strong> {{ $github }}</div>
                
            </div>
        </div>
    </div>

    <div class="main-content">
        <p class="summary">
           {{ $description }}
        </p>
     
        <h2 class="section-title">Education</h2>
        <div class="row">
            <div class="year-col">{{ $highschool_year }}</div>
            <div class="details-col">
                <strong>{{ $highschool }}</strong>
                <p></p>
               
            </div>
        </div>
       
        <div class="row">
            <div class="year-col">{{ $college_year }}</div>
            <div class="details-col">
                <strong>{{ $course }}</strong>
                <p>{{ $school_address }}</p>
                <p><em>Specialization: {{ $specialization }} </em></p>
            </div>
        </div>
        
  

        <h2 class="section-title">Skills</h2>
        <ul class="skills-list">
            <li>{{ $skills_1 }}</li>
            <li>{{ $skills_2 }}</li>
            <li>{{ $skills_3 }}</li>
            <li>{{ $skills_4 }}</li>
        </ul>
    </div>
</div>

</body>
</html>