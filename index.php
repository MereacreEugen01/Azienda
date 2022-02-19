<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azienda</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <form action="query.php" method="POST" ><br>
        Query da eseguire<br>
        <select name= "query_scelta">
			<option value="q1" selected>Q1</option>
			<option value="q2" selected>Q2</option>
            <option value="q3" selected>Q3</option>
            <option value="q4" selected>Q4</option>
            <option value="q5" selected>Q5</option>
            <option value="q6" selected>Q6</option>
    	</select>
        <input type="submit" value="Esegui">
    </form>
    <br><br>Elenco Query disponibili:
    <p>Q1 Matricola, nominativo e stipendio degli impiegati di ogni 
        dipartimento in ordine crescente di provincia e nell’ambito 
        della provincia in ordine discendente di stipendio
    </p>
    <br>
    <p>Q2 Il nome di tutti i prodotti che usano solo i componenti C003 e C005</p>
    <br>
    <p>Q3 Prezzo minimo, massimo e medio di vendita dei prodotti di ogni dipartimento</p>
    <br>
    <p>Q4 Codice, nome di ogni dipartimento e numero dei componenti utilizzati da esso</p>
    <br>
    <p>Q5 Codice, nome e costo unitario di produzione di ogni prodotto ( costo calcolato 
    come somma del costo unitario di ogni componente moltiplicato la quantità utilizzata del singolo prodotto)</p>
    <br>
    <p>Q6 Codice, nome dei prodotti che impiegano almeno 5 componenti distinti</p>
    <br>


</body>
</html>