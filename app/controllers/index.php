<?php


   $html = "<h2> Отчет по движению </h2><table border=1> <tr>

                            <th>ТС</th>
                            <th>Тип ТС</th>
                            <th>Пробег</th>
                            <th>Время движения</th>
                            <th>Ср. скорость</th>
                            <th>Макс. скорость</th>
                            <th>Время простоя</th>
                            <th>Наличие проблем</th>
                            <th>Водитель</th>
                        </tr><tr><td>ТС</td>
                            <td>Тип ТС</td>
                            <td>Пробег</td>
                            <th>Время движения</td>
                            <td>Ср. скорость</td>
                            <td>Макс. скорость</td>
                            <td>Время простоя</td>
                            <td>Наличие проблем</td>
                            <td>Водитель</td></tr></table>";


include("mpdf/mpdf.php");

$mpdf = new mPDF('utf-8', 'A4', '8', '', 10, 10, 7, 7, 10, 10); /*задаем формат, отступы и.т.д.*/
$mpdf->charset_in = 'cp1251'; /*не забываем про русский*/



$mpdf->list_indent_first_level = 0;
$mpdf->WriteHTML($html, 2); /*формируем pdf*/


$mpdf->Output('otchet.pdf', 'I');


?>