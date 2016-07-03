
<?php

echo "<h1> Маршрут без сохранения </h1> <br>";

echo "Из <input type='text' name='A' />";

echo "в <input type='text' name='B' /> <br>";

interface UserImplementor
//IPrinter
{
    public function printHeader($textHeader);
    public function printBody($textBody);
}

class ConcreateImplementor//PdfPrinter 
implements UserImplementor
//IPrinter
{
    public function printHeader($textHeader) {
        echo 'This is your header (' . $textHeader. ') in the pdf file<br />';
    }

    public function printBody($textBody) {
        echo 'This is your text body (' . $textBody. ') in the pdf file<br />';
    }
}
/*
class ExcelPrinter implements IPrinter
{
    public function printHeader($textHeader) {
        echo 'This is your header (' . $textHeader. ') in the xls file<br />';
    }

    public function printBody($textBody) {
        echo 'This is your text body (' . $textBody. ') in the xls file<br />';
    }
}
*/
abstract class UserAbstraction //Report 
{
    protected $printer;

    public function __construct(ConcreateImplementor $printer) {
        $this->printer = $printer;
    }

    public function printHeader($textHeader) {
        $this->printer->printHeader($textHeader);
    }

    public function printBody($textBody) {
        $this->printer->printBody($textBody);
    }
}

class RefinedAbstraction//WeeklyReport 
extends UserAbstraction //Report
{
    public function printH(array $text) {
        $this->printHeader($text['header']);
        $this->printBody($text['body']);
    }
}
/*
$report = new RefinedAbstraction //WeeklyReport
(new ExcelPrinter());
$report->printH(['header' => 'my header for excel', 'body' => 'my body for excel']); // This is your header (my header for excel) in the xls file</ br>This is your text body (my body for excel) in the xls file<br /> */



$report = new RefinedAbstraction //WeeklyReport
( new ConcreateImplementor());
$report->printH(['header' => 'my header for pdf', 'body' => 'my body for pdf']); // This is your header (my header for pdf) in the pdf file</ br>This is your text body (my body for pdf) in the pdf file<br />

?>