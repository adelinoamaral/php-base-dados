<?php
    /*
        Ficheiro ?
        Date: 2017-11-16
        Update: 2018-11-27
    */

    require_once("config.php");

    /*
        O processo a aplicar envolve duas fases ou etapas: prepare e execute.
        
        Prepared statements also provide strong protection against SQL injection, 
        because parameter values are not embedded directly inside the SQL query string. 
        The parameter values are sent to the database server separately from the query 
        using a different protocol and thus cannot interfere with it. 
        The server uses these values directly at the point of execution, after the 
        statement template is parsed. That's why the prepared statements are less 
        error-prone, and thus considered as one of the most critical element in database security.
    */


    // Prepare an insert statement
    // a sentença SQL será preparada recorrendo à utilização de palceholders(?)
    $sql = "INSERT INTO persons (first_name, last_name, email) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql); // $stmt - manipulador da sentença preparda

    /*
        Foi enviada a sentença SQL, já preparada, para o servidor. O servidor analisa e optimiza a sentença,
        e guarda-a para uso posterior. 
        Este método devolve um manipulador da sentença SQL que poderá ser utilizado várias vezes, com
        diferentes valores.
    */

    if($stmt)
    {
        
        /* 
            Bind variables to the prepared statement as parameters 
            Os placeholders (?) serão substituídos pelos valores das variáveis em tempo de execução.
            
            Definição de tipos, na string, para especificar o tipo de dados correspondente às
            variáveis ligadas.
            b — binary (such as image, PDF file, etc.), blob
            d — double (floating point number)
            i — integer (whole number)
            s — string (text)
            
            O número de variáveis ligadas e o número de caracteres na definição de tipo 
            devem ser iguais ao número palceholders (?) na setença SQL.
        */
        
        // Associa/liga as variáveis, à sentença preparada, aos placeholders
        $stmt->bind_param("sss", $first_name, $last_name, $email);

        
        // Atribui os valores às variáveis e executa o comando.
        // A definição
        $first_name = "Lídia";
        $last_name = "Machado";
        $email = "lidia@mail.com";
        $stmt->execute();
        
        /*
            Como podes ver, preparou-se sentença uma vez, depois poderá ser executada N vezes.
            Aumenta a eficiência
        */
        
        $first_name = "Ramon";
        $last_name = "Leily";
        $email = "raley@mail.com";
        $stmt->execute();
        
        echo "Os registos foram inseridos com sucesso.";
        
    } else{
        echo "ERROR: Query não prparada: $sql. " . $mysqli->error;
    }
    
    // Close statement
    $stmt->close();
    
    // Close connection
    $mysqli->close();
?>