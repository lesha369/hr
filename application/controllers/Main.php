<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// подключаем общую библиотеку + конфиг
require_once(APPPATH . 'hrconfig.php');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

        $this->load->library('form_validation');

        // переопределяем вывод ошибок
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        // наборы правил для применимаемых параметров
        $this->form_validation->set_rules('otdel', 'Отдел', 'trim|htmlspecialchars|required');
        $this->form_validation->set_rules('dolzhnost', 'Должность', 'trim|required|htmlspecialchars');
        $this->form_validation->set_rules('fio', 'ФИО', 'trim|required|htmlspecialchars');
        $this->form_validation->set_rules('tabel', 'Табельный номер', 'trim|required|htmlspecialchars|numeric');
        $this->form_validation->set_rules('time', 'Кол-во календарныйх дней', 'trim|required|htmlspecialchars|numeric');
        $this->form_validation->set_rules('date', 'Дата запланированная', 'trim|htmlspecialchars|required');
        $this->form_validation->set_rules('nomer', 'Номер уведомления', 'trim|htmlspecialchars');

        // переопределяем сообщения об ошибках
        $this->form_validation->set_message('required', 'Отсутстует обязательный параметр: %s');
        $this->form_validation->set_message('numeric', '%s не число');


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('header');
            $this->load->view('upload_list');
        }
        else
        {
            $otdel = $this->input->post('otdel');
            $dolzhnost = $this->input->post('dolzhnost');
            $fio = $this->input->post('fio');
            $tabel = $this->input->post('tabel');
            $time = $this->input->post('time');

            //$date = $this->input->post('date');
            $odate = date('d.m.Y', strtotime($this->input->post('date')));


            $nomer = $this->input->post('nomer');

            echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)">
	<META NAME="AUTHOR" CONTENT="Zhanna Reshetkina">
	<META NAME="CREATED" CONTENT="20180323;120100000000000">
	<META NAME="CHANGEDBY" CONTENT="Решеткина Жанна Юрьевна">
	<META NAME="CHANGED" CONTENT="20180323;120100000000000">
	<META NAME="AppVersion" CONTENT="15.0000">
	<META NAME="DocSecurity" CONTENT="0">
	<META NAME="HyperlinksChanged" CONTENT="false">
	<META NAME="LinksUpToDate" CONTENT="false">
	<META NAME="ScaleCrop" CONTENT="false">
	<META NAME="ShareDoc" CONTENT="false">
	<STYLE TYPE="text/css">
	<!--
		@page { margin-left: 1.18in; margin-right: 0.59in; margin-top: 0.79in; margin-bottom: 0.79in }
		P { margin-bottom: 0.08in; direction: ltr; widows: 2; orphans: 2 }
	-->
	</STYLE>
</HEAD>
<BODY LANG="ru-RU" DIR="LTR">
<TABLE WIDTH=650 CELLPADDING=0 CELLSPACING=0 >
	<COL WIDTH=197>
	<COL WIDTH=453>
	<TR>
		<TD WIDTH=197 STYLE="border: none; padding: 0in">
			<P ALIGN=CENTER STYLE="margin-top: 0.19in"><IMG SRC="'.WEB_SERVER.'/images/azur_logo.png" NAME="Рисунок 2" ALIGN=BOTTOM WIDTH=188 HEIGHT=62 BORDER=0></P>
		</TD>
		<TD WIDTH=453 STYLE="border: none; padding: 0in">
			<P ALIGN=CENTER STYLE="margin-right: 0.02in; margin-top: 0.19in; margin-bottom: 0in">
			<FONT COLOR="#000000"><FONT FACE="Arial, serif"><FONT SIZE=3>Общество
			с ограниченной ответственностью</FONT></FONT></FONT></P>
			<P ALIGN=CENTER STYLE="margin-left: 0.22in; text-indent: 0.02in; margin-top: 0.19in">
			<FONT COLOR="#000000"><FONT FACE="Arial, serif"><FONT SIZE=3>«АЗУР
			эйр»</FONT></FONT></FONT></P>
		</TD>
	</TR>
</TABLE>
<P STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%"><BR>
</P>
<P ALIGN=CENTER STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%">
<TABLE DIR="LTR" ALIGN=LEFT WIDTH=527 HSPACE=4 CELLPADDING=0 CELLSPACING=0>
	<COL WIDTH=322>
	<COL WIDTH=205>
	<TR VALIGN=TOP>
		<TD WIDTH=322 STYLE="border: none; padding: 0in">
			<P ALIGN=CENTER STYLE="margin-top: 0.19in"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=4 STYLE="font-size: 13pt"><B>Уведомление
			о начале отпуска №</B></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=205 STYLE="border-top: none; border-bottom: 1px solid #000001; border-left: none; border-right: none; padding: 0in">
			<P STYLE="margin-right: -0.08in; margin-top: 0.19in"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=4 STYLE="font-size: 13pt"><B>'.$nomer.'
			от '.date("d.m.Y").'г.</B></FONT></FONT></FONT></P>
		</TD>
	</TR>
</TABLE><BR>
</P>
<P ALIGN=CENTER STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P ALIGN=CENTER STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%">
<FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=4 STYLE="font-size: 13pt"><U><B>'.$otdel.'</B></U></FONT></FONT></FONT></P>
<P STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%"><BR>
</P>
<TABLE WIDTH=603 CELLPADDING=0 CELLSPACING=0>
	<COL WIDTH=104>
	<COL WIDTH=499>
	<TR VALIGN=TOP>
		<TD WIDTH=104 STYLE="border: none; padding: 0in">
			<P STYLE="margin-top: 0.19in"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=4 STYLE="font-size: 13pt">Уважаемый,</FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=499 STYLE="border-top: none; border-bottom: 1px solid #000001; border-left: none; border-right: none; padding: 0in">
			<P STYLE="margin-top: 0.19in"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=4 STYLE="font-size: 13pt">'.$fio.'</FONT></FONT></FONT></P>
		</TD>
	</TR>
</TABLE>
<P STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%"><BR>
</P>
<P STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=4 STYLE="font-size: 13pt">На
основании ст. 123 ТК РФ, в соответствии с
графиком отпусков на '.date("Y").'</FONT></FONT></FONT></P>
<P STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%"><BR>
</P>
<TABLE WIDTH=606 CELLPADDING=0 CELLSPACING=0>
	<COL WIDTH=471>
	<COL WIDTH=135>
	<TR VALIGN=TOP>
		<TD WIDTH=471 HEIGHT=4 STYLE="border: none; padding: 0in">
			<P STYLE="margin-top: 0.19in"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=4 STYLE="font-size: 13pt">год,
			Вам предоставляется отпуск
			продолжительностью</FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=135 STYLE="border-top: none; border-bottom: 1px solid #000001; border-left: none; border-right: none; padding: 0in">
			<P ALIGN=CENTER STYLE="margin-top: 0.19in"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=4 STYLE="font-size: 13pt">'.$time.'</FONT></FONT></FONT></P>
		</TD>
	</TR>
</TABLE>
<P STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%"><BR>
</P>
<TABLE WIDTH=508 CELLPADDING=0 CELLSPACING=0>
	<COL WIDTH=262>
	<COL WIDTH=246>
	<TR VALIGN=TOP>
		<TD WIDTH=262 HEIGHT=3 STYLE="border: none; padding: 0in">
			<P STYLE="margin-top: 0.19in"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=4 STYLE="font-size: 13pt">календарных
			дней в период с</FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=246 STYLE="border-top: none; border-bottom: 1px solid #000001; border-left: none; border-right: none; padding: 0in">
			<P ALIGN=CENTER STYLE="margin-top: 0.19in"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=4 STYLE="font-size: 13pt">'.$odate.'г.</FONT></FONT></FONT></P>
		</TD>
	</TR>
</TABLE>
<P ALIGN=CENTER STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%">
<BR>
</P>
<P STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%"><IMG SRC="'.WEB_SERVER.'/images/pechat.png" ALIGN=BOTTOM width="100%"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=2>'.date("d.m.Y").'г.</FONT></FONT></FONT></P>
<P STYLE="margin-top: 0.19in; margin-bottom: 0.17in; line-height: 0.16in">
<BR><BR>
</P>
<P STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><B><SPAN STYLE="background: #fbfbfb">С
уведомлением ознакомлен:
_______________________.</SPAN></B></FONT></FONT></P>
<P STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><SPAN STYLE="background: #fbfbfb">(согласен
/ не согласен)</SPAN></FONT></FONT></P>
<P STYLE="margin-top: 0.17in; margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=2><B><SPAN STYLE="background: #fbfbfb">«_____»_________________
'.date("Y").' г.</SPAN></B></FONT></FONT></FONT></P>
<P STYLE="margin-top: 0.17in; margin-bottom: 0in; line-height: 100%"><BR>
</P>
<P STYLE="margin-top: 0.19in; margin-bottom: 0in; line-height: 0.16in">
<FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=2><B><SPAN STYLE="background: #fbfbfb">___________________
/'.$fio.'</SPAN></B></FONT></FONT></FONT></P>
<P STYLE="margin-bottom: 0in; line-height: 100%"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT SIZE=4 STYLE="font-size: 13pt"><BR><BR><BR></FONT></FONT></FONT><BR>
</P>
</BODY>
</HTML>';
            //$this->load->view('get_list');
        }

	}


    public function do_upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'xls|xlsx';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {

            $this->load->view('header');

            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_excel', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            //print_r($this->upload->data('full_path'));
            $this->load->library('excel');


            // Открываем файл
            $xls = PHPExcel_IOFactory::load($this->upload->data('full_path'));
            // Устанавливаем индекс активного листа
            $xls->setActiveSheetIndex(0);
            // Получаем активный лист
            $sheet = $xls->getActiveSheet();


            echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)">
	<META NAME="AUTHOR" CONTENT="Zhanna Reshetkina">
	<META NAME="CREATED" CONTENT="20180323;120100000000000">
	<META NAME="CHANGEDBY" CONTENT="Решеткина Жанна Юрьевна">
	<META NAME="CHANGED" CONTENT="20180323;120100000000000">
	<META NAME="AppVersion" CONTENT="15.0000">
	<META NAME="DocSecurity" CONTENT="0">
	<META NAME="HyperlinksChanged" CONTENT="false">
	<META NAME="LinksUpToDate" CONTENT="false">
	<META NAME="ScaleCrop" CONTENT="false">
	<META NAME="ShareDoc" CONTENT="false">
	<STYLE TYPE="text/css">
	<!--
		
		body { margin-left: 1.18in; margin-right: 0.59in; margin-top: 0.2in; margin-bottom: 0.2in }
		
	-->
	</STYLE>
</HEAD>
<BODY LANG="ru-RU" DIR="LTR">';
            for ($i = 1; $i <= $sheet->getHighestRow(); $i++) {


                $nColumn = PHPExcel_Cell::columnIndexFromString(
                    $sheet->getHighestColumn());

                $fio = $sheet->getCellByColumnAndRow(2, $i)->getValue();
                if (empty($sheet->getCellByColumnAndRow(2, $i)->getValue()) and empty($sheet->getCellByColumnAndRow(2, $i-1)->getValue())){
                    $fio = $sheet->getCellByColumnAndRow(2, $i-2)->getValue();
                }
                if (empty($sheet->getCellByColumnAndRow(2, $i)->getValue()) and !empty($sheet->getCellByColumnAndRow(2, $i-1)->getValue())){
                    $fio = $sheet->getCellByColumnAndRow(2, $i-1)->getValue();
                }


                echo "
<TABLE WIDTH=653 CELLPADDING=0 CELLSPACING=0 >
	<COL WIDTH=200>
	<COL WIDTH=453>
	<TR>
		<TD WIDTH=200 STYLE=\"border: none; padding: 0in\">
			<P ALIGN=CENTER STYLE=\"margin-top: 0.19in\"><IMG SRC='".WEB_SERVER."/images/azur_logo.png' style='width: 100%; height: auto' NAME=\"Рисунок 2\" ALIGN=BOTTOM WIDTH=188 HEIGHT=62 BORDER=0></P>
		</TD>
		<TD WIDTH=453 STYLE=\"border: none; padding: 0in\">
			<P ALIGN=CENTER STYLE=\"margin-right: 0.02in; margin-top: 0.19in; margin-bottom: 0in\">
			<FONT COLOR=\"#000000\"><FONT FACE=\"Arial, serif\"><FONT SIZE=3>Общество
			с ограниченной ответственностью</FONT></FONT></FONT></P>
			<P ALIGN=CENTER STYLE=\"margin-left: 0.22in; text-indent: 0.02in; margin-top: 0.19in\">
			<FONT COLOR=\"#000000\"><FONT FACE=\"Arial, serif\"><FONT SIZE=3>«АЗУР
			эйр»</FONT></FONT></FONT></P>
		</TD>
	</TR>
</TABLE>
<P STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 100%\"><BR>
</P>
<P ALIGN=CENTER STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 100%\">
<TABLE DIR=\"LTR\" ALIGN=LEFT WIDTH=527 HSPACE=4 CELLPADDING=0 CELLSPACING=0>
	<COL WIDTH=322>
	<COL WIDTH=205>
	<TR VALIGN=TOP>
		<TD WIDTH=322 STYLE=\"border: none; padding: 0in\">
			<P ALIGN=CENTER STYLE=\"margin-top: 0.19in\"><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=4 STYLE=\"font-size: 13pt\"><B>Уведомление
			о начале отпуска №</B></FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=205 STYLE=\"border-top: none; border-bottom: 1px solid #000001; border-left: none; border-right: none; padding: 0in\">
			<P STYLE=\"margin-right: -0.08in; margin-top: 0.19in\"><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=4 STYLE=\"font-size: 13pt\"><B>".$sheet->getCellByColumnAndRow(6, $i)->getValue()."
			от ".date('d.m.Y')."г.</B></FONT></FONT></FONT></P>
		</TD>
	</TR>
</TABLE><BR>
</P>
<P ALIGN=CENTER STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 100%\">
<BR>
</P>
<P ALIGN=CENTER STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 100%\">
<FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=4 STYLE=\"font-size: 13pt\"><U><B>".$sheet->getCellByColumnAndRow(0, $i)->getValue()."</B></U></FONT></FONT></FONT></P>
<P STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 100%\"><BR>
</P>
<TABLE WIDTH=603 CELLPADDING=0 CELLSPACING=0>
	<COL WIDTH=104>
	<COL WIDTH=499>
	<TR VALIGN=TOP>
		<TD WIDTH=104 STYLE=\"border: none; padding: 0in\">
			<P STYLE=\"margin-top: 0.19in\"><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=4 STYLE=\"font-size: 13pt\">Уважаемый,</FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=499 STYLE=\"border-top: none; border-bottom: 1px solid #000001; border-left: none; border-right: none; padding: 0in\">
			<P STYLE=\"margin-top: 0.19in\"><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=4 STYLE=\"font-size: 13pt\">".$fio."</FONT></FONT></FONT></P>
		</TD>
	</TR>
</TABLE>
<P STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 100%\"><BR>
</P>
<P STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 100%\"><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=4 STYLE=\"font-size: 13pt\">На
основании ст. 123 ТК РФ, в соответствии с
графиком отпусков на ".date('Y')."</FONT></FONT></FONT></P>
<P STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 100%\"><BR>
</P>
<TABLE WIDTH=606 CELLPADDING=0 CELLSPACING=0>
	<COL WIDTH=471>
	<COL WIDTH=135>
	<TR VALIGN=TOP>
		<TD WIDTH=471 HEIGHT=4 STYLE=\"border: none; padding: 0in\">
			<P STYLE=\"margin-top: 0.19in\"><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=4 STYLE=\"font-size: 13pt\">год,
			Вам предоставляется отпуск
			продолжительностью</FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=135 STYLE=\"border-top: none; border-bottom: 1px solid #000001; border-left: none; border-right: none; padding: 0in\">
			<P ALIGN=CENTER STYLE=\"margin-top: 0.19in\"><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=4 STYLE=\"font-size: 13pt\">".$sheet->getCellByColumnAndRow(4, $i)->getValue()."</FONT></FONT></FONT></P>
		</TD>
	</TR>
</TABLE>
<P STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 100%\"><BR>
</P>
<TABLE WIDTH=508 CELLPADDING=0 CELLSPACING=0>
	<COL WIDTH=262>
	<COL WIDTH=246>
	<TR VALIGN=TOP>
		<TD WIDTH=262 HEIGHT=3 STYLE=\"border: none; padding: 0in\">
			<P STYLE=\"margin-top: 0.19in\"><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=4 STYLE=\"font-size: 13pt\">календарных
			дней в период с</FONT></FONT></FONT></P>
		</TD>
		<TD WIDTH=246 STYLE=\"border-top: none; border-bottom: 1px solid #000001; border-left: none; border-right: none; padding: 0in\">
			<P ALIGN=CENTER STYLE=\"margin-top: 0.19in\"><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=4 STYLE=\"font-size: 13pt\">".date('d.m.Y', mktime(0,0,0,1,$sheet->getCellByColumnAndRow(5, $i)->getValue()-1,1900))
                    ."г.</FONT></FONT></FONT></P>
		</TD>
	</TR>
</TABLE>
<P ALIGN=CENTER STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 100%\">
<BR>
</P>
<P STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 100%\"><IMG SRC='".WEB_SERVER."/images/pechat.png'  style='width: 100%; height: auto' ALIGN=BOTTOM><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=2>".date('d.m.Y')."г.</FONT></FONT></FONT></P>
<P STYLE=\"margin-top: 0.19in; margin-bottom: 0.17in; line-height: 0.16in\">
<BR><BR>
</P>
<P STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 100%\"><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><B><SPAN STYLE=\"background: #fbfbfb\">С
уведомлением ознакомлен:
_______________________.</SPAN></B></FONT></FONT></P>
<P STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 100%\"><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><SPAN STYLE=\"background: #fbfbfb\">(согласен
/ не согласен)</SPAN></FONT></FONT></P>
<P STYLE=\"margin-top: 0.17in; margin-bottom: 0in; line-height: 100%\"><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=2><B><SPAN STYLE=\"background: #fbfbfb\">«_____»_________________
".date('Y')." г.</SPAN></B></FONT></FONT></FONT></P>
<P STYLE=\"margin-top: 0.17in; margin-bottom: 0in; line-height: 100%\"><BR>
</P>
<P STYLE=\"margin-top: 0.19in; margin-bottom: 0in; line-height: 0.16in\">
<FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=2><B><SPAN STYLE=\"background: #fbfbfb\">___________________
/".$fio."</SPAN></B></FONT></FONT></FONT></P>
<P STYLE=\"margin-bottom: 0in; line-height: 100%\"><FONT COLOR=\"#000000\"><FONT FACE=\"Times New Roman, serif\"><FONT SIZE=4 STYLE=\"font-size: 13pt\"><BR><BR><BR></FONT></FONT></FONT><BR>
</P><br><br><br><br><br>";



            }
            echo '</BODY>
</HTML>';


            //$this->load->view('get_list', $data);
        }
    }

    public function print_lists(){

	    $this->load->view('header');
	    $this->load->view('print_list');

    }


}
