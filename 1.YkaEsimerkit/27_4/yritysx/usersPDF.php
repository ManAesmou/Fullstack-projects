<?php
/**
 *  file:   usersPDF.php
 *  desc:   Tekee käyttäjälistan PDF-dokumenttina
 */
include('fpdf/fpdf.php');  //otetaan käyttöön fpdf.php -luokka

class PDF extends FPDF{
    function Header(){
        //Jokaisen sivun otsakemäärittelyt
        $this->SetFont('Arial', 'B', 15);
        $this->SetFillColor(230,247,247);
        $this->SetTextColor(26,106,156);
        $title=iconv('UTF-8','windows-1252','Yritys X - Käyttäjälista');
        $this->Cell(0,25,$title,0,1,'C',true);
        $this->Image('images/logo.png',10,10);
        $this->Ln(5); //5 tyhjää riviä
        $this->Cell(20,10, 'userID',0,0,'C');
        $this->Cell(30,10, 'Etunimi', 0,0, 'L');
        $this->Cell(30,10, 'Sukunimi', 0,0, 'L');
        $this->Cell(60,10, 'Email', 0,0, 'L');
        $this->Cell(30,10, 'Rooli', 0,1, 'L');
        $this->Cell(0,1,'','B',1);
        $this->Ln(5);

    }
    function Footer(){
        //Jokaisen sivun footerimäärittelyt
        $this->SetFont('Arial','',8);
        $this->SetY(-15); //sivun alareunasta ylöspäin
        $this->Cell(0,2,'','B',1); //viiva
        $this->Cell(0,5,'Sivu '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
//pdf-dokumentin
$pdf=new PDF();
$pdf->AliasNbPages(); //sivunumerointi
$pdf->AddPage();        //lisätään sivu
//tähän väliin esim tietokantajutut eli sivulle tulevan sisällön tekeminen
$pdf->SetFont('Arial','',10);
include('dbConnect.php');
$sql="SELECT userID, Etunimi, Sukunimi, Email, profiilikuva, userRole FROM users ORDER by Sukunimi, Etunimi";
$tulos=$conn->query($sql);
$lkm=0; //rivien lukumäärä
$rivilaskuri=0;
while($rivi=$tulos->fetch_assoc()){
    $pdf->Cell(20,10, $rivi['userID'],0,0,'C');
    $etunimi=iconv('UTF-8','windows-1252',$rivi['Etunimi']);
    $pdf->Cell(30,10, $etunimi, 0,0, 'L');
    $sukunimi=iconv('UTF-8','windows-1252',$rivi['Sukunimi']);
    $pdf->Cell(30,10, $sukunimi, 0,0, 'L');
    $pdf->Cell(60,10, $rivi['Email'], 0,0, 'L');
    $pdf->Cell(30,10, $rivi['userRole'], 0,1, 'L');
    $lkm++;
    $rivilaskuri++;
    if($rivilaskuri==5){
        $pdf->Addpage();
        $rivilaskuri=0;
    }
}
//tulostetaan yhteenveto
$pdf->Ln(5);
$pdf->Cell(0,1,'',1);
$otsikko=iconv('UTF-8','windows-1252','Käyttäjiä tietokannassa yhteensä: ').$lkm;
$pdf->Cell(0,10,$otsikko,0,1,'R');
//sivun näyttäminen/tallentaminen
$pdf->Output(); //tulostaa selaimelle
//talletus tiedostona
$lista='users_'.date('Y-m-d').'.pdf';
$pdf->Output('files/'.$lista,'F');
?>