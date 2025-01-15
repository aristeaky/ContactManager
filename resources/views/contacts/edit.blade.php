
<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επεξεργασία Επαφής</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(115, 162, 233);
            color: #333;
            margin: 0;
            display: flex;
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
        }

        .container {
            text-align: center;
            background: rgb(235, 231, 231);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;
            height: 100%;
            max-height: 600px; 
        }

        h1 {
            color: rgb(4, 6, 7);
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-weight: bold;
            margin: 10px 0 5px;
        }

        input {
            padding: 10px;
            font-size: 16px;
            width: 80%;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        a, button {
            padding: 12px 20px;
            font-size: 16px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        a:hover, button:hover {
            background-color: #2980b9;
        }

        .back-button {
            display: block;
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Επεξεργασία Επαφής</h1>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="surname">Επίθετο</label>
            <input type="text" name="surname" id="surname" required value="{{ old('surname', $contact->surname) }}">
            @error('surname') <span style="color:red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="name">Όνομα</label>
            <input type="text" name="name" id="name" required value="{{ old('name', $contact->name) }}">
            @error('name') <span style="color:red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="phone">Τηλέφωνο</label>
            <input type="text" name="phone" id="phone" required value="{{ old('phone', $contact->phone) }}">
            @error('phone') <span style="color:red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email">Ηλεκτρονικό Ταχυδρομείο</label>
            <input type="email" name="email" id="email" value="{{ old('email', $contact->email) }}">
            @error('email') <span style="color:red;">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Αποθήκευση Αλλαγών</button>
    </form>
      <div class="back-button">
    <a href="{{ route('contacts.showAll') }}">Επιστροφή στις Επαφές</a>
    </div>
    </div>
</body>
</html>
