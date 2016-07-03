<?php
echo "<h1> Расчет времени </h1> <br>";

echo "<form action='' method='get'> Из <input type='text' name='A' />";

echo "в <input type='text' name='B' /> <br>";
$time=15;
$A=$_GET["A"];
$B=$_GET["B"];
$A=($A-$A%100)/100;
$B=($B-$B%100)/100;
$B=abs($A-$B);
$B=$B*2;

echo "<input type='submit' value='Отправь меня'! />";
$textHeader=$B;

interface IPrinter
{
    public function printHeader($textHeader);
   // public function printBody($textBody);
}

class PPrinter implements IPrinter
{
    public function printHeader($textHeader) {
        echo ' Время в пути от вашего местоположения (' . $textHeader. ') минут <br />';
    }

  /*  public function printBody($textBody) {
        echo 'This is your text body (' . $textBody. ') in the pdf file<br />';
    }     */
}

class EPrinter implements IPrinter
{
    public function printHeader($textHeader) {
        echo 'Время в пути с первого этажа (' . $textHeader. ') минут<br />';
    }

  /*  public function printBody($textBody) {
        echo 'This is your text body (' . $textBody. ') in the xls file<br />';
    }  */
}

abstract class Report
{
    protected $printer;

    public function __construct(IPrinter $printer) {
        $this->printer = $printer;
    }

    public function printHeader($textHeader) {
        $this->printer->printHeader($textHeader);
    }

    public function printBody($textBody) {
        $this->printer->printBody($textBody);
    }
}

class WeeklyReport extends Report
{
    public function printH(array $text) {
        $this->printHeader($text['header']);

    }
}
if (empty($A)){
$report = new WeeklyReport(new EPrinter());
$report->printH(['header' => $B ]); // This is your header (my header for excel) in the xls file</ br>This is your text body (my body for excel) in the xls file<br />
}else {
$report = new WeeklyReport( new PPrinter());

$report->printH(['header' => $B ]); // This is your header (my header for pdf) in the pdf file</ br>This is your text body (my body for pdf) in the pdf file<br />
 }
?>