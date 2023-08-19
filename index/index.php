<!DOCTYPE html>
<html>
<head>
    <title>Medewerkers App</title>
    <link rel="stylesheet" type="text/css" href="./styles.css?v=<?php echo time(); ?>">
    <script src="./scripts.js" defer></script>
</head>
<body>
    <header id="header">
        <h1><span>Fresh</span>Portal</h1>
        <button id="add">Nieuwe</button>
    </header>
    
    <table>
    <thead >
        <tr>
            <th>naam</th>
            <th>email</th>
            <th>adres</th>
            <th>geboortedatums</th>
            <th>acties</th>
        </tr>
    </thead>
    <tbody id="employeeTable">
     <tr style="height: 10px;"></tr>
    </tbody>
</table>


</body>
</html>
