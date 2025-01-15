<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eπαφές</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #3498db;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            padding: 8px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        a:hover {
            background-color: #2980b9;
        }

        .back-button {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .delete-button {
        padding: 8px 15px;
        background-color: rgb(219, 24, 33); 
        color: white;
        border: none; 
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        outline: none !important;
        box-shadow: none !important
       }

      .delete-button:hover {
       background-color: rgb(192, 19, 27); 
      }
      .fas.fa-arrow-left {
            font-size: 22px; 
            margin-top: 8px; 
        }

    </style>
</head>
<body>
    <h1>Επαφές</h1>
    <a href="{{route("contacts.create")}}">Προσθήκη νέας επαφής</a>
    <table>
        <thead>
            <tr>
                <th>Επίθετο</th>
                <th>Όνομα</th>
                <th>Τηλέφωνο</th>
                <th>Email</th>
                <th>Ενέργειες</th>
                <th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->surname }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        
                        <a href="{{ route('contacts.edit', $contact->id) }}">Επεξεργασία</a>

                        
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"> <div class="delete-button">Διαγραφή</div></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="back-button">
    <a href="{{ route('contacts.index') }}"><i class="fas fa-arrow-left" style="color:rgb(3, 3, 3); margin-right: 8px;"></i>Επιστροφή στην Αρχική Σελίδα</a>
    </div>
</body>
</html>