// i anazitisi na ginete me vasi eite epitheto eite onoma eite kai ta duo 
// na ftiaksw stin epeksergasia ta buttons
<!DOCTYPE html>
<html>
<head>
    <title>Αποτελέσματα Αναζήτησης</title>
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

        .error-message {
            color: red;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
        }

        .error-icon {
            color: red;
            font-size: 24px;
            margin-right: 10px;
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

        a, button {
            text-decoration: none;
            padding: 8px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        a:hover, button:hover {
            background-color: #2980b9;
        }

        .back-button {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Αποτελέσματα Αναζήτησης</h1>
    <div>
        @if($contacts->isEmpty())
            <p class="error-message">
                <span class="error-icon">❌</span>Δεν βρέθηκαν επαφές με αυτό το Επίθετο.
            </p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Επίθετο</th>
                        <th>Όνομα</th>
                        <th>Τηλέφωνο</th>
                        <th>Email</th>
                        <th>Ενέργειες</th>
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
                                    <button type="submit">Διαγραφή</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <div class="back-button">
    <a href="{{ route('contacts.index') }}">Επιστροφή</a>
    </div>
    </div>
</body>
</html>
