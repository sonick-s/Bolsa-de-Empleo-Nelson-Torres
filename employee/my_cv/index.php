<?php
require('fpdf.php');
require '../../constants/db_config.php';
require '../constants/check-login.php';

if ($user_online != "true" || $myrole != "employee") {
    header("location:../");
    exit();
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener información del usuario
    $stmt = $conn->prepare("SELECT about, gender, email, country, city, street, zip FROM tbl_users WHERE member_no = :member_no");
    $stmt->bindParam(':member_no', $myid);
    $stmt->execute();
    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtener datos del usuario
    $mygender = $userInfo['gender'];
    $myemail = $userInfo['email'];
    $mycountry = $userInfo['country'];
    $mycity = $userInfo['city'];
    $mystreet = $userInfo['street'];
    $myzip = $userInfo['zip'];
    $mydesc = $userInfo['about'];

    // Crear PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFillColor(255, 255, 255); // Blanco
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->Cell(0, 10, $myfname . ' ' . $mylname, 0, 1, 'C', true);

    $pdf->SetFont('Arial', 'I', 14);
    $pdf->Cell(0, 10, $mytitle, 0, 1, 'C', true);
    $pdf->Ln(5);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "$myemail | $mycountry | $mycity | $mystreet", 0, 1, 'C', true);
    $pdf->Ln(10);

    // Resumen Profesional
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetTextColor(239, 23, 24); // Rojo desvanecido
    $pdf->Cell(0, 10, 'Resumen Profesional', 0, 1, 'L', true);
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTextColor(0, 0, 0); // Negro
    $pdf->MultiCell(0, 10, $mydesc, 0, 'L', true);
    $pdf->Ln(5);

    // Experiencia Laboral
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetTextColor(239, 23, 24);
    $pdf->Cell(0, 10, 'Experiencia Laboral', 0, 1, 'L', true);
    $pdf->SetFont('Arial', '', 12);
    
    $stmt = $conn->prepare("SELECT * FROM tbl_experience WHERE member_no = :member_no");
    $stmt->bindParam(':member_no', $myid);
    $stmt->execute();
    $experiences = $stmt->fetchAll();

    foreach ($experiences as $row) {
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(0, 10, $row['institution'], 1, 1, 'L', true);
        $pdf->MultiCell(0, 10, "{$row['title']} - ({$row['start_date']} to {$row['end_date']}) - {$row['duties']}", 1, 'L', true);
        $pdf->Ln(5);
    }

    // Cursos y talleres
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetTextColor(239, 23, 24);
    $pdf->Cell(0, 10, 'Cursos y Talleres', 0, 1, 'L', true);
    
    $stmt = $conn->prepare("SELECT * FROM tbl_training WHERE member_no = :member_no");
    $stmt->bindParam(':member_no', $myid);
    $stmt->execute();
    $trainings = $stmt->fetchAll();

    foreach ($trainings as $row) {
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(0, 10, $row['institution'], 1, 1, 'L', true);
        $pdf->SetTextColor(0, 0, 0); // Negro
        $pdf->MultiCell(0, 10, "{$row['training']} - ({$row['timeframe']})", 1, 'L', true);
        $pdf->Ln(5);
    }

    // Dominio del Idioma
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetTextColor(239, 23, 24);
    $pdf->Cell(0, 10, 'Dominio del Idioma', 0, 1, 'L', true);
    
    $stmt = $conn->prepare("SELECT * FROM tbl_language WHERE member_no = :member_no");
    $stmt->bindParam(':member_no', $myid);
    $stmt->execute();
    $languages = $stmt->fetchAll();

    foreach ($languages as $row) {
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(0, 10, $row['language'], 1, 1, 'L', true);
        $pdf->SetTextColor(0, 0, 0); // Negro
        $pdf->MultiCell(0, 10, "Speaking: {$row['speak']}, Reading: {$row['reading']}, Writing: {$row['writing']}", 1, 'L', true);
        $pdf->Ln(5);
    }

    // Certificaciones
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetTextColor(239, 23, 24);
    $pdf->Cell(0, 10, 'Certificaciones', 0, 1, 'L', true);
    
    $stmt = $conn->prepare("SELECT * FROM tbl_professional_qualification WHERE member_no = :member_no");
    $stmt->bindParam(':member_no', $myid);
    $stmt->execute();
    $certifications = $stmt->fetchAll();

    foreach ($certifications as $row) {
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(0, 10, $row['institution'], 1, 1, 'L', true);
        $pdf->SetTextColor(0, 0, 0); // Negro
        $pdf->MultiCell(0, 10, "{$row['title']} - ({$row['timeframe']})", 1, 'L', true);
        $pdf->Ln(5);
    }

    // Estudios
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetTextColor(239, 23, 24);
    $pdf->Cell(0, 10, 'Estudios', 0, 1, 'L', true);
    
    $stmt = $conn->prepare("SELECT * FROM tbl_academic_qualification WHERE member_no = :member_no");
    $stmt->bindParam(':member_no', $myid);
    $stmt->execute();
    $studies = $stmt->fetchAll();

    foreach ($studies as $row) {
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(0, 10, $row['institution'], 1, 1, 'L', true);
        $pdf->SetTextColor(0, 0, 0); // Negro
        $pdf->MultiCell(0, 10, "{$row['course']} - ({$row['timeframe']}) {$row['level']} Level", 1, 'L', true);
        $pdf->Ln(5);
    }

    // Referencias
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetTextColor(239, 23, 24);
    $pdf->Cell(0, 10, 'Referencias', 0, 1, 'L', true);
    
    $stmt = $conn->prepare("SELECT * FROM tbl_referees WHERE member_no = :member_no");
    $stmt->bindParam(':member_no', $myid);
    $stmt->execute();
    $references = $stmt->fetchAll();

    foreach ($references as $row) {
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0); // Negro
        $pdf->MultiCell(0, 10, "{$row['ref_name']} | {$row['institution']} | {$row['ref_phone']} | {$row['ref_mail']}", 1, 'L', true);
        $pdf->Ln(5);
    }

    $pdf->Output($myfname . ' ' . $mylname . ' CV.pdf', 'D');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
