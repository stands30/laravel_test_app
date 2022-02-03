<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
    <style>
        .p-20{
            padding: 20px;
        }
    </style>
</head>
<body>
    <H2>User List</H2>
    @if (\Session::has('message'))
        <div class="p-20">
            {!! \Session::get('message') !!}
        </div>
    @endif
    <a href="/add-user" class="p-20">Add User</a>
    <table>
        <thead>
            <tr>
                <td>Sr No.</td>
                <td>Name</td>
                <td>Age</td>
                <td>Gender</td>
                <td>Willing to Work</td>
                <td>Languages</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->getGender() }}</td>
                    <td>{{ $user->getWillingToWork() }}</td>
                    <td>{{ $user->languages }}</td>
                    <td><a href="/edit-user/{{ $user->id }}">Edit User</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
