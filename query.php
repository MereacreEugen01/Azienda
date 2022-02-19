<link rel="stylesheet" href="style.css">
<?php
switch ($_POST['query_scelta']) {
    case 'q1':
        echo "È stata eseguita la query 1";
        $connection = new mysqli("localhost","root","","azienda");
        /*
        Q1 Matricola, nominativo e stipendio degli impiegati di ogni 
        dipartimento in ordine crescente di provincia e nell’ambito 
        della provincia in ordine discendente di stipendio
        */
        $query = "SELECT matricola, nominativo, stipendio 
        from personale 
        join dipartimenti on personale.id_dip = dipartimenti.id_dip 
        order by (provincia) asc, (stipendio) desc";
        $result = $connection->query($query);
        if ($result->num_rows != 0) {
            echo "<table border id = \"tabella\">";
            echo "<tr>";
            echo "<th>Matricola</th>";
            echo "<th>Nominativo</th>";
            echo "<th>Stipendio</th>";
            echo "</tr>";
            while ($row = $result->fetch_array()){
                echo "<tr>";
                echo "<td>$row[matricola]</td>";
                echo "<td>$row[nominativo]</td>";
                echo "<td>$row[stipendio]</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        $result->free();
        $connection->close();
        echo "È stato richiesto di sapere Matricola, nominativo e stipendio degli impiegati di ogni 
        dipartimento in ordine crescente di provincia e nell’ambito 
        della provincia in ordine discendente di stipendio";
        break;
    case 'q2':
        echo "È stata eseguita la query 2";
        $connection = new mysqli("localhost","root","","azienda");
        /*
        Q2 Il nome di tutti i prodotti che usano solo i componenti C003 e C005
        */
        $query = "SELECT distinct nome_prodotto
        from Prodotti 
        join Composizione on Prodotti.id_prod = Composizione.id_prod 
        WHERE composizione.id_prod NOT IN (Select id_prod From composizione
        WHERE composizione.id_comp <> 'C003' and composizione.id_comp <> 'C005')";
        $result = $connection->query($query);
        if ($result->num_rows != 0) {
            echo "<table border id = \"tabella\">";
            echo "<tr>";
            echo "<th>Nome</th>";

            echo "</tr>";
            while ($row = $result->fetch_array()){
                echo "<tr>";
                echo "<td>$row[nome_prodotto]</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        $result->free();
        $connection->close();
        echo "È stato richiesto di sapere Il nome di tutti i prodotti 
        che usano solo i componenti C003 e C005";
        break;
    case 'q3':
        echo "È stata eseguita la query 3";
        $connection = new mysqli("localhost","root","","azienda");
        /*
            Q3 Prezzo minimo, massimo e medio di vendita dei prodotti di ogni dipartimento
        */
        $query = "SELECT Dipartimenti. id_dip, min(prodotti.prezzo) as Prezzo_Minimo, 
        max(prodotti.prezzo) as Prezzo_Massimo, avg(prodotti.prezzo) as Prezzo_Medio 
        from prodotti join Dipartimenti on (prodotti.id_dip = Dipartimenti.id_dip) 
        GROUP by (Dipartimenti.id_dip)";
        $result = $connection->query($query);
        if ($result->num_rows != 0) {
            echo "<table border id = \"tabella\">";
            echo "<tr>";
            echo "<th>ID Dipartimento</th>";
            echo "<th>Prezzo Minimo</th>";
            echo "<th>Prezzo Massimo</th>";
            echo "<th>Prezzo Medio</th>";
            echo "</tr>";
            while ($row = $result->fetch_array()){
                echo "<tr>";
                echo "<td>$row[id_dip]</td>";
                echo "<td>$row[Prezzo_Minimo]</td>";
                echo "<td>$row[Prezzo_Massimo]</td>";
                echo "<td>$row[Prezzo_Medio]</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        $result->free();
        $connection->close();
        echo "È stato richiesto di sapere Prezzo minimo, 
        massimo e medio di vendita dei prodotti 
        di ogni dipartimento";
        break;
   case 'q4':
    echo "È stata eseguita la query 4";
    $connection = new mysqli("localhost","root","","azienda");
        /*
        Q4 Codice, nome di ogni dipartimento e numero dei componenti utilizzati da esso
        */
        $query = "SELECT dipartimenti.id_dip as Codice, dipartimenti.nome_dipartimento as Nome_dipartimento, 
        COUNT( DISTINCT    composizione.id_comp) AS Componenti_utilizzati
        from dipartimenti, prodotti, composizione 
        where dipartimenti.id_dip = prodotti.id_dip and prodotti.id_prod = composizione.id_prod 
        GROUP by (dipartimenti.id_dip)";
        /*
        SELECT dipartimenti.id_dip as Codice, nome_dipartimento, 
        COUNT( DISTINCT    composizione.id_comp) 
        AS N_componenti FROM dipartimenti,prodotti,composizione 
        WHERE prodotti.id_prod = composizione.id_prod AND dipartimenti.id_dip = prodotti.id_dip 
        GROUP BY dipartimenti.id_dip,nome_dipartimento;
        */

        $result = $connection->query($query);
        if ($result->num_rows != 0) {
            echo "<table border id = \"tabella\">";
            echo "<tr>";
            echo "<th>ID Dipartimento</th>";
            echo "<th>Nome Dipartimento</th>";
            echo "<th>Componenti Utilizzati</th>";
            echo "</tr>";
            while ($row = $result->fetch_array()){
                echo "<tr>";
                echo "<td>$row[Codice]</td>";
                echo "<td>$row[Nome_dipartimento]</td>";
                echo "<td>$row[Componenti_utilizzati]</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        $result->free();
        $connection->close();
        echo "È stato richiesto di sapere Codice, nome di ogni dipartimento e numero dei componenti utilizzati da esso";
        break;
    case 'q5':
        echo "È stata eseguita la query 5";
        $connection = new mysqli("localhost","root","","azienda");
        /*
        Q5 Codice, nome e costo unitario di produzione di ogni prodotto ( costo calcolato 
        come somma del costo unitario di ogni componente moltiplicato la quantità utilizzata del singolo prodotto)
         */
        $query = "SELECT prodotti.id_prod as Codice, 
        prodotti.nome_prodotto as Nome_Prodotto, 
        sum((componenti.costo_unitario * composizione.unita_comp)) as Costo_prodotto_calcolato 
        from prodotti, composizione, componenti 
        where prodotti.id_prod = composizione.id_prod and componenti.id_comp = composizione.id_comp 
        GROUP by (prodotti.id_prod)";
        $result = $connection->query($query);
        if ($result->num_rows != 0) {
            echo "<table border id = \"tabella\">";
            echo "<tr>";
            echo "<th>Codice Prodotto</th>";
            echo "<th>Nome Prodotto</th>";
            echo "<th>Costo Prodotto Calcolato in €</th>";
            echo "</tr>";
            while ($row = $result->fetch_array()){
                echo "<tr>";
                echo "<td>$row[Codice]</td>";
                echo "<td>$row[Nome_Prodotto]</td>";
                echo "<td>$row[Costo_prodotto_calcolato]</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        $result->free();
        $connection->close();
        echo "È stato richiesto di sapere Codice, nome e costo unitario di produzione 
        di ogni prodotto (costo calcolato come somma del costo unitario di ogni componente 
        moltiplicato la quantità utilizzata del singolo prodotto)";
        break;
    case 'q6':
        echo "È stata eseguita la query 6";
        $connection = new mysqli("localhost","root","","azienda");
        /*
        Codice, nome dei prodotti che impiegano almeno 5 componenti distinti
        */
        $query = "SELECT prodotti.id_prod as Codice, prodotti.nome_prodotto as Nome_Prodotto 
        from prodotti 
        join composizione on ( prodotti.id_prod = composizione.id_prod) 
        GROUP by (prodotti.id_prod) 
        HAVING COUNT(composizione.unita_comp) > 5";
        $result = $connection->query($query);
        if ($result->num_rows != 0) {
            echo "<table border id = \"tabella\">";
            echo "<tr>";
            echo "<th>Codice Prodotto</th>";
            echo "<th>Nome Prodotto</th>";
            echo "</tr>";
            while ($row = $result->fetch_array()){
                echo "<tr>";
                echo "<td>$row[Codice]</td>";
                echo "<td>$row[Nome_Prodotto]</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        $result->free();
        $connection->close();
        echo "È stato richiesto di sapere Codice, nome dei prodotti che impiegano almeno 5 componenti distinti";
        break;
}
?>
</br></br><a href="http://localhost/progetti/azienda/index.php">Torna alla pagina precedene</a>