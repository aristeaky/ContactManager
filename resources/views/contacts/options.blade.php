<!DOCTYPE html>
<html>
<head>
    <title>Προσωπική Ατζέντα</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(115, 162, 233);
            color: #333;
            margin: 0;
            display: flex;
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
        }
        .container {
            text-align: center; 
            background:rgb(235, 231, 231);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: -90px;
        }
        h1 {
            color:rgb(56, 112, 168);
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
        }
        li:last-child {
            margin-top: 20px;
        }
        a, button {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        a:hover, button:hover {
            background-color: #2980b9;
        }
        form {
            margin-top: 20px;
        }
        input {
            padding: 10px;
            font-size: 16px;
            width: 250px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    
    </style>
</head>
<body>
<div class="container">
    <h1>"Καλωσήρθες στην Προσωπική σου Ατζέντα!"</h1>
    <p ><strong>Διαχειρίσου εύκολα και γρήγορα τις επαφές σου.</strong></p>
    <ul>
        <li><a href="{{ route('contacts.showAll') }}">Προβολή όλων των επαφών</a></li>
        <li>
            <form action="{{ route('contacts.search') }}" method="GET">
                <label for="query"><strong>Αναζήτηση Επαφής:</strong></label>
                <input type="text" id="query" name="query">
                <button type="submit">Αναζήτηση</button>
            </form>
            @if(!empty($message))
                <div style="color: red; font-weight: bold;">
                    {{ $message }}
                </div>
            @endif
        </li>
        <li> <a href="{{route("contacts.create")}}"class="add-contact">Προσθήκη νέας επαφής</a></li>
    </ul>
    </div>
</body>
</html>