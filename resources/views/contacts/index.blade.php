<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eπαφές</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(115, 162, 233);}
        table {
            width: 100%;
            border-collapse: collapse; 
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px; 
            text-align: left; }
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
                            <button type="submit">Διαγραφή</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('contacts.index') }}">Επιστροφή στην Αρχική Σελίδα</a>
</body>
</html>