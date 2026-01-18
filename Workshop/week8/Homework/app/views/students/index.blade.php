
@extends('layouts.master')

@section('content')
<a href="index.php?page=create">Add Student</a>
<table>
    <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Options</th>
    </tr>
    @foreach($students as $student)
    <tr>
        <td>{{ $student['id'] }}</td>
        <td>{{ $student['name'] }}</td>
        <td>{{ $student['email'] }}</td>
        <td>{{ $student['course'] }}</td>
        <td>
            <a href="index.php?page=edit&id={{ $student['id'] }}">Edit</a>
            <a href="index.php?page=delete&id={{ $student['id'] }}">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
