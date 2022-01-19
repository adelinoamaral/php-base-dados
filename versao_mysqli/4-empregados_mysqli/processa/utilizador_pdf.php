<?php
  
    define("FPDF_PATH", "../fpdf/fpdf.php");    // define uma constante para o caminho do ficheiro fpdf.php

    require FPDF_PATH;

    require_once "../ligaDB.php";

    if(isset($_GET['id'])) $id = $_GET['id'];
    
    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Logo
            $this->Image('../imagens/urso.jpg',15,10,30);   // Image(path, x, y, w)
            $this->SetFont('Arial','B',15); // Arial bold 15
            $this->Cell(60);    // Move para a direita
            $this->Cell(80,10,'Detalhes do Empregado',0,0,'C');   // Cell(w,h,texto,border,posição, alinhamento)
            $this->Ln(20);  // Line break
        }

        // Page footer
        function Footer()
        {
            $this->SetY(-15);   // Position at 1.5 cm from bottom
            $this->SetFont('Arial','I',8);  // Arial italic 8
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');    // Page number
        }
    }


    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    $pdf->setXY(40,50); // o mesmo que SetY(40) e SetX(50);
    
    $sql = "SELECT user_apelido, user_nome, DATE_FORMAT(user_dataregisto, '%d/%m/%Y') AS dr, user_id ";
    $sql .= "FROM utilizadores WHERE user_id='$id' LIMIT 1";

    // Executa a query
    $result = $con->query ($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(50,6,'Nome',1,0,'C',1);
        $pdf->SetX(91);
        $pdf->Cell(50,6,'Apelido',1,0,'C',1);
        $pdf->SetX(142);
        $pdf->Cell(30,6,'Data Registo',1,0,'C',1);
        $pdf->Ln();

        $pdf->SetY(58);
        $pdf->SetX(40);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20,6, $row['user_nome']);
        $pdf->SetX(92);
        $pdf->Cell(20,6, $row['user_apelido']);
        $pdf->SetX(143);
        $pdf->Cell(10,5,$row['dr']);

        $result->free_result (); // Liberta a memória associada ao resultado
        $con->close();
    }

    $pdf->Output();
?>