<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <style>
        .color-red{
            color:red;
        }
    </style>
</head>
<body>
    <form action="/save-user" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ isset($userData->id) && $userData->id ? $userData->id:'' }}">
        <div class="form-container">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ isset($userData->name) && $userData->name ? $userData->name:'' }}">
            <span class="color-red">{{$errors->first('name')}}</span>
        </div>
        <div class="form-container">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" value="{{ isset($userData->age) && $userData->age ? $userData->age:'' }}">
            <span class="color-red">{{$errors->first('age')}}</span>
        </div>
        <div class="form-container">
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="1" {{ isset($userData->gender) && $userData->gender == 1 ? 'selected':'' }}>Male</option>
                <option value="2" {{ isset($userData->gender) && $userData->gender == 2 ? 'selected':'' }}>Female</option>
                <option value="3" {{ isset($userData->gender) && $userData->gender == 3 ? 'selected':'' }}>Transgender</option>
            </select>
            <span class="color-red">{{$errors->first('gender')}}</span>
        </div>
        <div class="form-container">
             <label for="willing_to_work">Willing to Work</label>
             <input type="radio" name="willing_to_work" value="1" {{ isset($userData->willing_to_work) && $userData->willing_to_work == 1 ? 'checked':'' }}> Yes
             <input type="radio" name="willing_to_work" value="2" {{ isset($userData->willing_to_work) && $userData->willing_to_work == 2 ? 'checked':'' }}> No
            <span class="color-red">{{$errors->first('willing_to_work')}}</span>
        </div>
        <div class="form-container">
              @php
              @endphp
             <label for="languages">Languages</label>
             <input type="checkbox" name="languages[]" 
              value="English" {{ in_array('English', $languages) ? 'checked':'' }}> English
            <input type="checkbox"  name="languages[]" value="Hindi" {{ in_array('Hindi', $languages) ? 'checked':'' }}> Hindi
            <input type="checkbox"  name="languages[]" value="Kannada" {{ in_array('Kannada', $languages) ? 'checked':'' }}> Kannada
            <input type="checkbox"  name="languages[]" value="French" {{ in_array('French', $languages) ? 'checked':'' }}> French
            
            <span class="color-red">{{$errors->first('languages')}}</span>
        </div>
        <div class="form-action-container">
            <button type="submit">Save</button>
        </div>
    </form>
</body>
</html>