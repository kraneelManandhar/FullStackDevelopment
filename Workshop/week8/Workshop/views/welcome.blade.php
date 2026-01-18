<!DOCTYPE html>
<html>
<head>
    <title>Blade is Working!</title>
    <style>
        body { font-family: Arial; padding: 40px; }
        h1 { color: green; }
        .box { background: #f0f0f0; padding: 20px; margin: 20px 0; }
    </style>
</head>
<body>
    <h1>✅ SUCCESS! Blade is Working!</h1>
    
    <div class="box">
        <h2>Test Results:</h2>
        <p><strong>Variable Test:</strong> Hello, {{ $name }}!</p>
        <p><strong>Date Test:</strong> Today is {{ date("Y-m-d") }}</p>
        <p><strong>Time Test:</strong> Current time: {{ date("H:i:s") }}</p>
        <p><strong>PHP Version:</strong> {{ phpversion() }}</p>
    </div>
    
    <div class="box">
        <h3>Loop Test:</h3>
        <ul>
        @for($i = 1; $i <= 3; $i++)
            <li>Item number {{ $i }}</li>
        @endfor
        </ul>
    </div>
    
    <div class="box">
        <h3>Conditional Test:</h3>
        @if($name == "Blade User")
            <p style="color: green;">✅ Name is correctly "Blade User"</p>
        @else
            <p>Name is: {{ $name }}</p>
        @endif
    </div>
    
    <div style="margin-top: 30px; padding: 15px; background: #d4edda; border-radius: 5px;">
        <h3>🎉 Congratulations!</h3>
        <p>Your Blade template engine is successfully installed and working!</p>
        <p>You can now create .blade.php files in the "views" folder.</p>
    </div>
</body>
</html>