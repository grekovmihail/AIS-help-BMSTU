<?php


   $html = "<h2> ����� �� �������� </h2><table border=1> <tr>

                            <th>��</th>
                            <th>��� ��</th>
                            <th>������</th>
                            <th>����� ��������</th>
                            <th>��. ��������</th>
                            <th>����. ��������</th>
                            <th>����� �������</th>
                            <th>������� �������</th>
                            <th>��������</th>
                        </tr><tr><td>��</td>
                            <td>��� ��</td>
                            <td>������</td>
                            <th>����� ��������</td>
                            <td>��. ��������</td>
                            <td>����. ��������</td>
                            <td>����� �������</td>
                            <td>������� �������</td>
                            <td>��������</td></tr></table>";


include("mpdf/mpdf.php");

$mpdf = new mPDF('utf-8', 'A4', '8', '', 10, 10, 7, 7, 10, 10); /*������ ������, ������� �.�.�.*/
$mpdf->charset_in = 'cp1251'; /*�� �������� ��� �������*/



$mpdf->list_indent_first_level = 0;
$mpdf->WriteHTML($html, 2); /*��������� pdf*/


$mpdf->Output('otchet.pdf', 'I');


?>