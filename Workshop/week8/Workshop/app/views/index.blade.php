<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Database</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <h1>Welcome to Students Database</h1>
    
    {{-- Include your navigation/links --}}
    <nav>
        <a href="/">Home</a> |
        <a href="/students">Students</a> |
        <a href="/add">Add Student</a>
    </nav>
    
    {{-- Display students data if available --}}
    @if(isset($students) && count($students) > 0)
        <h2>Students List:</h2>
        <ul>
            @foreach($students as $student)
                <li>{{ $student['name'] ?? $student->name }} - {{ $student['email'] ?? $student->email }}</li>
            @endforeach
        </ul>
    @else
        <p>No students found.</p>
    @endif
    
</body>
</html>