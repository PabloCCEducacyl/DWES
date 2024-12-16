<?php
    include "../../fpdf/fpdf.php";

    $pdf = new FPDF();

    class PDF extends FPDF {
        function Cabezera(){
            $this->Image('logo.png', 10, 4, 28);
            $this->SetFont('Arial','B',20);
            $this->Cell(160, 38, 'Pablo Campuzano Cuadrado', 0, 0, 'C');
            $this->Line(10, 34, 120, 34);
        }
        function Pie(){
            $this->SetY(275);
            $this->SetFont('Arial', 'I', 8);
            $this->Line(10, 272, 200, 272);
            $this->Image('pie.png', 10, 280, 190, 10);
            $this->Cell(0, 0, 'Pagina '.$this->PageNo(), 0, 0, 'C');
        }
        function IntroducirLista($lista){
            $this->AddPage();
            $this->Cabezera();
            $this->Ln(40);
            $this->SetFont('Arial', 'B', 12);
            foreach($lista as $linea){
                $this->Cell(0, 10, $linea, 0, 1, 'C');
            }
            $this->Pie();
        }


        function __construct(...$parametros){
            parent::__construct(...$parametros);
            $this->SetAuthor('Pablo Campuzano Cuadrado');
            $this->SetTitle('Listas');
        }

    }

    function crearArrayDeArchivo($archivo){
        $array = [];
        while(!feof($archivo)){
            $linea = fscanf($archivo, "%s %s");
            $lineaNueva = $linea[0].' '.$linea[1]; //esto solo funciona para esta lista que esta separada por comas sin espacios y luego un espacio entre los apellidos
            $array[] = mb_convert_encoding($lineaNueva, "ISO-8859-1", "UTF-8"); //lo pasa de UTF-8 a ISO-8859-1 que es lo que usan los pdfs
        }
        return $array;
    }

    $pdf = new PDF();
    $listaAlumnos = fopen('listado_alumnos.txt', 'r');
    $pdf->IntroducirLista(crearArrayDeArchivo($listaAlumnos));
    
    $listaPersonas = fopen('listado_personas.txt', 'r');
    $pdf->IntroducirLista(crearArrayDeArchivo($listaPersonas));
    
    fclose($listaAlumnos);
    fclose($listaPersonas);


    $pdf->Output('F', 'ficheroPDF.pdf');
    echo "<h1>Fichero PDF creado correctamente</h1>";
    echo "<a href='ficheroPDF.pdf'>Ver fichero</a>";
    


?>