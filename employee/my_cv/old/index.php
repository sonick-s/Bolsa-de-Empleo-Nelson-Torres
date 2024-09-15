<?php
ob_start(); // Inicia el almacenamiento en búfer de salida

require('html_table.php');
require '../../../constants/db_config.php';
require '../../../constants/check-login.php';

if ($user_online == "true") {
    if ($myrole == "employee") {
        // Inicializa las variables
        $myid = ''; // Inicializar ID
        $mygender = ''; // Inicializar género
        $myemail = '';  // Inicializar correo electrónico
        $mycountry = ''; // Inicializar país
        $mycity = ''; // Inicializar ciudad
        $mystreet = ''; // Inicializar calle
        $myzip = ''; // Inicializar código postal
        $myfname = ''; // Inicializar primer nombre
        $mylname = ''; // Inicializar apellido
        $mytitle = ''; // Inicializar título
        $mydesc = '';  // Inicializar descripción

        // Obtener ID del usuario desde la sesión o la solicitud
        $myid = $_SESSION['myid'] ?? ''; // O cómo obtengas $myid

        // Conexión a la base de datos
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener datos del usuario
        $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE member_no = :myid");
        $stmt->bindParam(':myid', $myid);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $row) {
            $mygender = $row['gender'];
            $myemail = $row['email'];
            $mycountry = $row['country'];
            $mycity = $row['city'];
            $mystreet = $row['street'];
            $myzip = $row['zip'];
            $myfname = $row['first_name']; // Asumiendo que estas columnas existen
            $mylname = $row['last_name'];  // Asumiendo que estas columnas existen
            $mytitle = $row['title'];       // Asumiendo que esta columna existe
            // $mydesc = $row['description'];  // Asumiendo que esta columna existe
        }

        // Generación del PDF
        $pdf = new PDF_HTML_Table();
        $pdf->AddPage();
        $pdf->SetTitle('' . $myfname . ' ' . $mylname . ' CV');
        $pdf->SetFont('Arial', 'B', 25);
        $pdf->SetDrawColor(79, 129, 188);
        $pdf->SetFillColor(79, 129, 188);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(0, 9, '' . $myfname . ' ' . $mylname . '', 1, 1, 'C', true);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 9, '' . $mytitle . '', 1, 1, 'C', true);

        $pdf->Ln(4);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetDrawColor(79, 129, 188);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 9, '' . $mygender . ', ' . $myemail . ', ' . $mycountry . ',' . $mycity . ',' . $mystreet . ',' . $myzip . '', 1, 1, 'C', true);

        $pdf->Ln(4);

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetDrawColor(184, 204, 229);
        $pdf->SetFillColor(184, 204, 229);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(80, 9, 'Resumen Profesional', 1, 1, 'L', true);
        $pdf->SetFont('Arial', '', 11);
        $pdf->MultiCell(0, 10, "$mydesc"); // Utiliza MultiCell si WriteHTML no está disponible

        // Experiencia Laboral
        $pdf->Ln(4);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetDrawColor(184, 204, 229);
        $pdf->SetFillColor(184, 204, 229);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(80, 9, 'Experiencia Laboral', 1, 1, 'L', true);
        $pdf->SetDrawColor(255, 255, 255);
        $pdf->SetFillColor(255, 255, 255);

        $stmt = $conn->prepare("SELECT * FROM tbl_experience WHERE member_no = :myid");
        $stmt->bindParam(':myid', $myid);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $row) {
            $exptitle = $row['title'];
            $institution = $row['institution'];
            $start_date = $row['start_date'];
            $end_date = $row['end_date'];
            $duties = $row['duties'];

            $pdf->SetFont('Arial', 'i', 12);
            $pdf->Cell(80, 9, $institution, 1, 1, 'L', true);
            $pdf->SetFont('Arial', '', 11);
            $pdf->MultiCell(0, 10, "<b>$exptitle - </b>($start_date to $end_date) <br>$duties<br>");
        }

        // Entrenamiento y Taller
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetDrawColor(184, 204, 229);
        $pdf->SetFillColor(184, 204, 229);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(80, 9, 'Entrenamiento y Taller', 1, 1, 'L', true);
        $pdf->SetDrawColor(255, 255, 255);
        $pdf->SetFillColor(255, 255, 255);

        $stmt = $conn->prepare("SELECT * FROM tbl_training WHERE member_no = :myid");
        $stmt->bindParam(':myid', $myid);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $row) {
            $exptitle = $row['training'];
            $institution = $row['institution'];
            $timeframe = $row['timeframe'];

            $pdf->SetFont('Arial', 'i', 12);
            $pdf->Cell(80, 9, $institution, 1, 1, 'L', true);
            $pdf->SetFont('Arial', '', 11);
            $pdf->MultiCell(0, 10, "<b>$exptitle</b> - ($timeframe)<br>");
        }

        // Dominio del Idioma
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetDrawColor(184, 204, 229);
        $pdf->SetFillColor(184, 204, 229);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(80, 9, 'Dominio del Idioma', 1, 1, 'L', true);
        $pdf->SetDrawColor(255, 255, 255);
        $pdf->SetFillColor(255, 255, 255);

        $stmt = $conn->prepare("SELECT * FROM tbl_language WHERE member_no = :myid");
        $stmt->bindParam(':myid', $myid);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $row) {
            $language = $row['language'];
            $speak = $row['speak'];
            $read = $row['reading'];
            $write = $row['writing'];

            $pdf->SetFont('Arial', 'i', 12);
            $pdf->Cell(80, 9, $language, 1, 1, 'L', true);
            $pdf->SetFont('Arial', '', 11);
            $pdf->MultiCell(0, 10, "Hablado: $speak<br>Lectura: $read<br>Escritura: $write<br>");
        }

        // Enviar el PDF para descarga
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="CV_' . $myfname . '_' . $mylname . '.pdf"');
        $pdf->Output('D');
        ob_end_flush(); // Enviar el contenido del búfer de salida
    } else {
        header('Location: ../../../login.php');
        exit;
    }
} else {
    header('Location: ../../../login.php');
    exit;
}
?>
