<?php
$dom = new domDocument("1.0", "utf-8"); // Создаём XML-документ версии 1.0 с кодировкой utf-8
  $root = $dom->createElement("ФАЙЛ"); // Создаём корневой элемент
  $dom->appendChild($root);
$v_form = $_POST['VersForm'];
$v_prog = $_POST['VersProg'];
$id_file = $_POST['IdFile'];

$root->setAttribute("ВерсФорм", $v_form);
$root->setAttribute("ВерсПрог", $v_prog);
$root->setAttribute("ИдФайл", $id_file);

$doc = $dom->createElement("Документ"); // Создаём узел
$OKUD = $_POST['OKUD'];
$doc->setAttribute("ОКУД", $OKUD);
$root->appendChild($doc);

$sv_dov = $dom->createElement("СвДов");
$PrPered = $_POST['PrPered'];
$DataNach = $_POST['DataNach'];
$NomDover = $_POST['NomDover'];
$sv_dov->setAttribute("ПрПередов", $PrPered);
$sv_dov->setAttribute("ДатаНач", $DataNach);
$sv_dov->setAttribute("НомДовер", $NomDover);
$doc->appendChild($sv_dov);

$DatOkon = $_POST['DataOkon'];
$DataOkon = $dom->createElement("ДатаОкон", $DatOkon);
$sv_dov->appendChild($DataOkon);

$sv_syst = $_POST['SvedSistOtm'];
$SvedSistOtm = $dom->createElement("СведСистОтм", $sv_syst);
$sv_dov->appendChild($SvedSistOtm);

$sv_dover = $dom->createElement("СвДоверит");
$doc->appendChild($sv_dover);


//проверка на вид организации
//нужно вносить переменные, коорые пришли с отправки в условие(+/- одно и то же)
//ин организация, физ лицо 
//огрнип необязательное учловие
$sv_d = $dom->createElement($_POST['SvDover']);
if ($_POST['SvDover'] == 'РосОргДовер'){
	$AdrRF = $_POST['AdrRF'];
$ogrn = $_POST['OGRN'];
$kpp = $_POST['KPP1'];
$innyl = $_POST['INNYL1'];
$NaimOrg = $_POST['NaimOrg'];
	
	$sv_d->setAttribute("АдрРФ", $AdrRF);
	$sv_d->setAttribute("ОГРН", $ogrn);
	$sv_d->setAttribute("КПП", $kpp);
	$sv_d->setAttribute("ИННЮЛ", $innyl);
	$sv_d->setAttribute("НаимОрг", $NaimOrg);
	$l_bd = $dom->createElement("ЛицоБезДов");
	$sv_fl = $dom->createElement("СвФЛ");
	$snils=$_POST['SNILS1'];
	$sv_fl->setAttribute("СНИЛС", $snils);
	if (isset($_POST['INNFL1'])){
		$inn_fl=$_POST['INNFL1'];
		$sv_fl->setAttribute("ИННФЛ", $inn_fl);
	}
	if (isset($_POST['Dolghn'])){
		$Dolghn=$_POST['Dolghn'];
		$sv_fl->setAttribute("Должность", $Dolghn);
	}
	if (isset($_POST['Graghd'])){
		$Graghd=$_POST['Graghd'];
		$gr = $dom->createElement("Гражданство", $Graghd);
		$l_bd->appendChild($gr);
	}
	if (isset($_POST['DataRogd'])){
		$DataRogd=$_POST['DataRogd'];
		$dr = $dom->createElement("ДатаРожд", $DataRogd);
		$l_bd->appendChild($dr);
	}

	

	$l_bd->appendChild($sv_fl);
	$sv_d->appendChild($l_bd);
	}
	if ($_POST['SvDover'] == 'ИнОргДовер'){
		$NaimIO = $_POST['NaimIO'];
$StrReg = $_POST['StrReg'];
$NaimRegOrg = $_POST['NaimRegOrg'];
$RegNomer = $_POST['RegNomer'];
$AdrStrReg = $_POST['AdrStrReg'];
	$sv_d->setAttribute("НаимИО", $NaimIO);
	$sv_d->setAttribute("СтрРег", $StrReg);
	$sv_d->setAttribute("НаимРегОрг", $NaimRegOrg);
	$sv_d->setAttribute("РегНом", $RegNomer);
	$sv_d->setAttribute("АдрСтрРег", $AdrStrReg);
	if (isset($_POST['INNYL'])){
		$INNYL=$_POST['INNYL'];
		$sv_d->setAttribute("ИННЮЛ", $INNYL);
	}

	if (isset($_POST['KPP'])){
		$KPP=$_POST['KPP'];
		$sv_d->setAttribute("ИННЮЛ", $KPP);
	}

	$svrukop = $dom->createElement("СвРукОП");
	$Pol = $_POST['Pol'];
	$PrGragd = $_POST['PrGragd'];
	//добавить для ин гражд
	if (isset($_POST['INNFL'])){
		$INNFL=$_POST['INNFL'];
		$sv_d->setAttribute("ИННФЛ", $INNFL);
	}
	if (isset($_POST['DataRogdIF'])){
		$DataRogdIF=$_POST['DataRogdIF'];
		$sv_d->setAttribute("ДатаРожд", $DataRogdIF);
	}
	if (isset($_POST['MestoRogd'])){
		$MestoRogd=$_POST['MestoRogd'];
		$sv_d->setAttribute("МестоРожд", $MestoRogd);
	}
	if (isset($_POST['MestoRogd'])){
		$MestoRogd=$_POST['MestoRogd'];
		$sv_d->setAttribute("МестоРожд", $MestoRogd);
	}


	$svrukop->setAttribute("Пол", $Pol);
	$svrukop->setAttribute("ПрГражд", $PrGragd);

	$sv_d->appendChild($svrukop);
	}

	if ($_POST['SvDover'] == 'ФЛДовер'){
		$INNFLF = $_POST['INNFLF'];
	$SNILSFL = $_POST['SNILSFL'];
	$sv_d->setAttribute("ИННФЛ", $INNFLF);
	$sv_d->setAttribute("СНИЛСФЛ", $SNILSFL);

	if (isset($_POST['GraghdFL'])){
		$GraghdFL=$_POST['GraghdFL'];
		$sv_d->setAttribute("ГраждФЛ", $GraghdFL);
	}

	if (isset($_POST['DataRogdFL'])){
		$DataRogdFL=$_POST['DataRogdFL'];
		$sv_d->setAttribute("ДатаРождФЛ", $DataRogdFL);
	}

	
	}

	if ($_POST['SvDover'] == 'ИПДовер'){
		$INNIP = $_POST['INNIP'];
	$SNILSIP = $_POST['SNILSIP'];
	$OGRNIP = $_POST['OGRNIP'];
	$sv_d->setAttribute("ИННФЛ", $INNIP);
	$sv_d->setAttribute("СНИЛСФЛ", $SNILSIP);
	$sv_d->setAttribute("ОГРНИП", $OGRNIP);
	if (isset($_POST['GraghdIP'])){
		$GraghdIP=$_POST['GraghdIP'];
		$sv_d->setAttribute("ГраждФЛ", $GraghdIP);
	}

	if (isset($_POST['DataRogdIP'])){
		$DataRogdFL=$_POST['DataRogdIP'];
		$sv_d->setAttribute("ДатаРождФЛ", $DataRogdIP);
	}

	
	}
	
	
	
	$sv_dover->appendChild($sv_d);







$IdPoln=$_POST['IdPoln'];
$sv_uppr = $dom->createElement("СвУпПред");
$doc->appendChild($sv_uppr);
$problpoln = $dom->createElement("ПрОблПолн", $IdPoln);
$sv_uppr->appendChild($problpoln);

$sv_pr = $dom->createElement("СвПред");
$sv_uppr->appendChild($sv_pr);

$sved_dov = $dom->createElement("СведФизЛ");
$SNILSP = $_POST['SNILSP'];
$INNP = $_POST['INNP'];
$DataRogdP = $_POST['DataRogdP'];
$sved_dov->setAttribute("СНИЛС", $SNILSP);
$sved_dov->setAttribute("ИННФЛ", $INNP);
$sved_dov->setAttribute("ДатаРожд", $DataRogdP);
$sv_pr->appendChild($sved_dov);

$im_p = $_POST['Ima_p'];
$famil_p = $_POST['Famil_p'];
$otch_p = $_POST['Otch_p'];

$fio = $dom->createElement("ФИО");
$fio->setAttribute("Отчество", $otch_p);
$fio->setAttribute("Имя", $im_p);
$fio->setAttribute("Фамилия", $famil_p);
$sved_dov->appendChild($fio);

$data_doc = $_POST['DataDoc'];
$ser_nom_doc = $_POST['SerNomDoc'];
$cod_vid_doc = $_POST['CodVidDoc'];

$ud_l = $dom->createElement("УдЛичн");
$ud_l->setAttribute("ДатаДок", $data_doc);
$ud_l->setAttribute("СерНомДок", $ser_nom_doc);
$ud_l->setAttribute("КодВидДок", $cod_vid_doc);
$sved_dov->appendChild($ud_l);

$podp = $dom->createElement("Подписант"); // Создаём узел
if ($_POST['SvDover'] == 'РосОргДовер'){
$familD = $_POST['Famil_y'];
$imaD = $_POST['Ima_y'];
if (isset($_POST['Otch_y'])){
		$otchD=$_POST['Otch_y'];
	}

}
if ($_POST['SvDover'] == 'ИнОргДовер'){
$familD = $_POST['Famil_yio'];
$imaD = $_POST['Ima_yio'];
if (isset($_POST['Otch_yio'])){
		$otchD=$_POST['Otch_yio'];
	}

}

if ($_POST['SvDover'] == 'ФЛДовер'){
$familD = $_POST['Famil_yfl'];
$imaD = $_POST['Ima_yfl'];
if (isset($_POST['Otch_yfl'])){
		$otchD=$_POST['Otch_yfl'];
	}

}

if ($_POST['SvDover'] == 'ИПДовер'){
$familD = $_POST['Famil_yip'];
$imaD = $_POST['Ima_yip'];
if (isset($_POST['Otch_yip'])){
		$otchD=$_POST['Otch_yip'];
	}

}

$podp->setAttribute("Фамилия", $familD);
$podp->setAttribute("Имя", $imaD);
if (isset($otchD)){
$podp->setAttribute("Отчество", $otchD);
}

$doc->appendChild($podp);


$file = $id_file.".xml";
$path_file = '/var/www/html/project.local/m4d/xml/'.$file;
$dom->save($path_file);

if (isset($path_file)){
	header('Content-Type: text/xml');
header('Content-Disposition: attachment; filename='.basename($file));
readfile($path_file);
}



            ?>

          