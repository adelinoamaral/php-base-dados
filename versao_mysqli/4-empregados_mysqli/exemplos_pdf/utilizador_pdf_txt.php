<?php
  
    define("FPDF_PATH", "../fpdf/fpdf.php");

    require FPDF_PATH;

    
    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Logo
            $this->Image('../imagens/urso.jpg',15,10,30);   // Image(path, x, y, w)
            $this->SetFont('Arial','B',15); // Arial bold 15
            
            // Calcula o tamanho do texto e adiciona-lhe 16mm
            $w = $this->GetStringWidth($titulo)+16;
            // calcula o ponto central na linha onde irá colocar o texto
            $this->SetX((210-$w)/2; // a largura de uma folha A4 = 210mm

            $this->SetDrawColor(0, 80, 180);
            $this->SetFillColor(230, 230, 0);
            $this->SetTextColor(220, 50, 50);
            $this->SetLineWidth(1);
            $this->Cell($w, 9, $titulo, 1, 1, 'C', 1);
            $this->SetLineWidth(0.5);
            $this->SetDrawColor(0, 200, 100);
            $this->Line(10, 25, 200, 25);
            $this->Ln(10);
        }

        // Page footer
        function Footer()
        {
            $this->SetY(-15);   // Position at 1.5 cm from bottom
            $this->SetFont('Arial','I',8);  // Arial italic 8
            $this->SetTextColor(128);
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');    // Page number
        }
        
        function CorpoTexto($nomeFicheiro){
            $this->SetFillColor(200, 220, 255);
            $this->Cell(0, 9, "Listagem dos Empregados", 1, 1, 'C', 1);
            $this->Ln(10);
            $link = fopen($nomeFicheiro, "r");
            $texto = fread($link, filesize($nomeFicheiro));
            fclose($nomeFicheiro);
            $this->SetFont('Arial','',12);
            $this->MultiCell(0, 5, $texto, 0, 'L');
            $this->Ln();
            $this->SetFont('', 'I');
            $this->Cell(0, 5, '(fim do texto)');
        }
                        
        function Imprimir($nomeFicheiro){
            $this->AddPage();
            $this->open();
            CorpoTexto($nomeFicheiro);
        }
    }

    // Instanciation of inherited class
    $pdf = new PDF_E();
    $titulo = "Listagem dos empregados";
    $pdf->SetTitle($titulo);
    $pdf->SetFont('Arial','B',12);
    $pdf->SetAuthor('Adelino Amaral');
    $pdf->Imprimir('dados.txt');
    $pdf->Output();
?>