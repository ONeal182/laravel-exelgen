<?php

namespace App\Http\Controllers;

use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Worksheet_PageSetup;
use PHPExcel_Style_Border;
use PHPExcel_Style_Alignment;
use Illuminate\Http\Request;

class ExelGen extends Controller
{

    public $objPHPExcel;
    public $i;
    public function __construct()
    {
        $this->objPHPExcel = new PHPExcel();
    }

    public function formRequest(Request $request)
    {
        //Данные из формы

        //$request->input данные при отправки формы
        //Оформление АОСР
        $projectName = $request->input('projectName'); // Наименование проектной документации
        $projectAddres = $request->input('projectAddres'); //Почтовый или строительный адрес объекта капитального строительства
        // Юридическое лицо
        $builderName = $request->input('builderName'); //Наименование
        $builderAddres = $request->input('builderAddres'); //Адрес
        $builderORGN = $request->input('builderORGN'); // ОГРН
        $builderINN = $request->input('builderINN'); // ИНН
        $builderPhone = $request->input('builderPhone'); //Телефон
        //Заполните информацию о застройщике (технический заказчик, эксплуатирующая организация или региональный оператор)
        $builderNameOrg = $request->input('builderNameOrg'); //Наименование
        $builderOrgORG = $request->input('builderOrgORG'); // ОРГН
        $builderOrgINN = $request->input('builderOrgINN'); // ИНН
        //Заполните информацию о лице  осуществляющем строительство.
        $contractorName = $request->input('contractorName'); //Наименование
        $contractorAddres = $request->input('contractorAddres'); // Адрес
        $contractorORGN = $request->input('contractorORGN'); // ОРГН
        $contractorINN = $request->input('contractorINN'); // ИНН
        $contractorPhone = $request->input('contractorPhone'); //Телефон
        //Саморегулируемая организация
        $contractorOrgName = $request->input('contractorOrgName'); //Наименование
        $contractorOrgORGN = $request->input('contractorOrgORGN'); // ОРГН
        $contractorOrgINN = $request->input('contractorOrgINN'); //ИНН
        //Заполните информацию о лице, осуществляющем подготовку проектной документации
        //Юридическое лицо
        $preparationName = $request->input('preparationName'); //Наименование
        $preparationAddres = $request->input('preparationAddres'); //Адрес
        $preparationORGN = $request->input('preparationORGN'); // ОРГН
        $preparationINN = $request->input('preparationINN'); //ИНН
        $preparationPhone = $request->input('preparationPhone'); // Телефон
        //Саморегулируемая организация
        $preparationOrgName = $request->input('preparationOrgName'); // Наименование
        $preparationOrgORGN = $request->input('preparationOrgORGN'); // ОРГН
        $preparationOrgINN = $request->input('preparationOrgINN'); // ИНН
        //Заполните информацию о представителе застройщика (технического заказчика, эксплуатирующей организации или региональный оператора) по вопросам строительного контроля
        $representativeBuilderPosition = $request->input('representativeBuilderPosition'); // Должность
        $representativeBuilderFIO = $request->input('representativeBuilderFIO'); // ФИО
        $representativeBuilderRequisites = $request->input('representativeBuilderRequisites'); // Реквизиты
        $representativeBuilderDate = $request->input('representativeBuilderDate'); // Дата распорядительного документа
        $representativeBuilderId = $request->input('representativeBuilderId'); // Идентификационный номер
        $representativeBuilderDateGet = $request->input('representativeBuilderDateGet'); //Дата выдачи номера
        $representativeBuilderORGN = $request->input('representativeBuilderORGN'); //ОРГН
        $representativeBuilderINN = $request->input('representativeBuilderINN'); // ИНН
        $representativeBuilderAddres = $request->input('representativeBuilderAddres'); //Местонахождение юр.Лица
        //Заполните информацию о представителе лица осуществляющего строительство
        $representativeContractorPosition = $request->input('representativeContractorPosition'); //Должность
        $representativeContractorFIO = $request->input('representativeContractorFIO'); // ФИО
        $representativeContractorRequisites = $request->input('representativeContractorRequisites'); //Реквизиты распорядительного документа, подтверждающего полномочия
        $representativeContractorDate = $request->input('representativeContractorDate'); //Дата выдачи документа
        //Заполните информацию о представителе лица осуществляющего строительство, по вопросам строительного контроля (специалист по организации строительства)
        $memberBuilderPosition = $request->input('memberBuilderPosition'); // Должность
        $memberBuilderFIO = $request->input('memberBuilderFIO'); //ФИО
        $memberBuilderId = $request->input('memberBuilderId'); // в национальном реестре специалистов в области строительства
        $memberBuilderDateId = $request->input('memberBuilderDateId'); // Дата выдачи номера
        $memberBuilderRequisites = $request->input('memberBuilderRequisites'); // Реквизиты распорядительного документа, подтверждающего полномочия
        $memberBuilderDate = $request->input('memberBuilderDate'); // Дата выдачи документа
        // Заполнить информацию о представителе лица осуществляющего подготовку проектной документации
        $preparationPosition = $request->input('preparationPosition'); // Должность
        $preparationFIO = $request->input('preparationFIO'); // ФИО
        $preparationREQ = $request->input('preparationREQ'); // Реквизиты распорядительного документа, подтверждающего полномочия
        $preparationDateId = $request->input('preparationDateId'); // Дата выдачи номера
        $preparationYurName = $request->input('preparationYurName'); // Наименование юридического лица
        $preparationYurAddres = $request->input('preparationYurAddres'); // Место нахождения юридического лица
        $preparationORGN = $request->input('preparationORGN'); // ОРГН
        $preparationINN = $request->input('preparationINN'); //ИНН
        $preparationPhone = $request->input('preparationPhone'); // Телефон
        //Заполните информацию о представителе лица выполнившего работы, подлежащие освидетельствованию
        $complitePosition = $request->input('complitePosition'); //Должность
        $compliteFIO = $request->input('compliteFIO'); // ФИО
        $compliteREQ = $request->input('compliteREQ'); // Реквизиты распорядительного документа, подтверждающего полномочия
        $compliteDateId = $request->input('compliteDateId'); // Дата выдачи номера
        $compliteNameYUR = $request->input('compliteNameYUR'); // Наименование юридического лица
        $compliteYURaddres = $request->input('compliteYURaddres'); // Место нахождения юридического лица
        $compliteORGN = $request->input('compliteORGN'); // ОРГН
        $compliteINN = $request->input('compliteINN'); //ИНН
        $complitePhone = $request->input('complitePhone'); // Телефон
        //Заполните информацию об иных лицах, участвующих в освидетельствовании.
        $anotherPosition = $request->input('anotherPosition'); //Должность
        $anotherFIO = $request->input('anotherFIO'); // ФИО
        $anotherREQ = $request->input('anotherREQ'); // Реквизиты распорядительного документа, подтверждающего полномочия
        $anotherDate_Id = $request->input('anotherDate_Id'); // Дата выдачи номера
        $anotherNameYur = $request->input('anotherNameYur'); // Наименование юридического лица
        //Произвели осмотр работ, выполненных
        $checkName = $request->input('checkName'); //Наименование юридического лица, выполнившего работы, подлежащие освидетельствованию
        //Укажите информацию о предъявленных работах
        $workDo = $request->input('workDo'); //Введите информацию о предъявленной работе
        //Заполните  информацию о проектной документации 
        $anotherDocs = $request->input('anotherDocs'); // Номер, другие реквизиты чертежа, наименование проектной документации и/или рабочей документации, сведения о лицах, осуществляющих подготовку раздела проектной и/или рабочей документации
        //Заполните информацию о строительном материале
        $materialName = $request->input('materialName'); // Наименование материала
        $sertificate = $request->input('sertificate'); // Сертификат соответсвия
        $sertificatefrom = $request->input('sertificatefrom'); // Действителен с
        $sertificateBy = $request->input('sertificateBy'); // Действителен по
        $sertificateQuality = $request->input('sertificateQuality'); // "Документ подтверждающий качество
        $sertificateDate = $request->input('sertificateDate'); // Дата сертификата
        //Заполните информацию о документах подтверждающие соответствие работ предъявляемым к ним требованиям
        //Исполнительные схемы и чертежи, результаты экспертиз, обследований, лабораторных и иных испытаний выполненных работ, проведенных в процессе строительного контроля
        $doc = $request->input('doc'); // Документ
        $docDate = $request->input('docDate'); //Дата документа
        //Заполните информацию о датах производства работ
        $dateBeginWork = $request->input('dateBeginWork'); // Дата начала работ
        $dateEndWork = $request->input('dateEndWork'); // Дата окончания работ
        //Работы выполнены в соответствии с
        $RegName = $request->input('RegName'); // Наименования и структурные единицы технических регламентов, иных нормативных правовых актов
        $razdeDoc = $request->input('razdeDoc'); // Разделы проектной и/или рабочей документации
        //Какие последующие работы разрешаются
        $nameWorkCostruct = $request->input('nameWorkCostruct'); // Наименование работ, конструкций, участков сетей инженерно-технического обеспечения
        //Дополнительные сведения
        $moreInfo = $request->input('moreInfo'); // Внесите дополнительные сведения:
        //Номер акта, дата, количество экземпляров
        $numberAct = $request->input('numberAct'); // Номер акта
        $dateAOSR = $request->input('dateAOSR'); // Дата составления АОСР
        $countAOSR = $request->input('countAOSR'); // Колличество документов

        //Массив данных формы

        $dataForm = [
            'projectName' => $projectName,
            'projectAddres' => $projectAddres,
            'builderName' => $builderName,
            'builderAddres' => $builderAddres,
            'builderORGN' => $builderORGN,
            'builderINN' => $builderINN,
            'builderINN' => $builderINN,
            'builderPhone' => $builderPhone,
            'builderNameOrg' => $builderNameOrg,
            'builderOrgORG' => $builderOrgORG,
            'builderOrgINN' => $builderOrgINN,
            'contractorName' => $contractorName,
            'contractorAddres' => $contractorAddres,
            'contractorORGN' => $contractorORGN,
            'contractorINN' => $contractorINN,
            'contractorPhone' => $contractorPhone,
            'contractorOrgName' => $contractorOrgName,
            'contractorOrgORGN' => $contractorOrgORGN,
            'contractorOrgINN' => $contractorOrgINN,
            'preparationName' => $preparationName,
            'preparationAddres' => $preparationAddres,
            'preparationORGN' => $preparationORGN,
            'preparationINN' => $preparationINN,
            'preparationPhone' => $preparationPhone,
            'preparationOrgName' => $preparationOrgName,
            'preparationOrgORGN' => $preparationOrgORGN,
            'preparationOrgINN' => $preparationOrgINN,
            'representativeBuilderPosition' => $representativeBuilderPosition,
            'representativeBuilderFIO' => $representativeBuilderFIO,
            'representativeBuilderRequisites' => $representativeBuilderRequisites,
            'representativeBuilderDate' => $representativeBuilderDate,
            'representativeBuilderId' => $representativeBuilderId,
            'representativeBuilderDateGet' => $representativeBuilderDateGet,
            'representativeBuilderORGN' => $representativeBuilderORGN,
            'representativeBuilderINN' => $representativeBuilderINN,
            'representativeBuilderAddres' => $representativeBuilderAddres,
            'representativeContractorPosition' => $representativeContractorPosition,
            'representativeContractorFIO' => $representativeContractorFIO,
            'representativeContractorRequisites' => $representativeContractorRequisites,
            'representativeContractorDate' => $representativeContractorDate,
            'memberBuilderPosition' => $memberBuilderPosition,
            'memberBuilderFIO' => $memberBuilderFIO,
            'memberBuilderId' => $memberBuilderId,
            'memberBuilderDateId' => $memberBuilderDateId,
            'memberBuilderRequisites' => $memberBuilderRequisites,
            'memberBuilderDate' => $memberBuilderDate,
            'preparationPosition' => $preparationPosition,
            'preparationFIO' => $preparationFIO,
            'preparationREQ' => $preparationREQ,
            'preparationDateId' => $preparationDateId,
            'preparationYurName' => $preparationYurName,
            'preparationYurAddres' => $preparationYurAddres,
            'preparationORGN' => $preparationORGN,
            'preparationINN' => $preparationINN,
            'preparationPhone' => $preparationPhone,
            'complitePosition' => $complitePosition,
            'compliteFIO' => $compliteFIO,
            'compliteREQ' => $compliteREQ,
            'compliteDateId' => $compliteDateId,
            'compliteNameYUR' => $compliteNameYUR,
            'compliteYURaddres' => $compliteYURaddres,
            'compliteORGN' => $compliteORGN,
            'compliteINN' => $compliteINN,
            'complitePhone' => $complitePhone,
            'anotherPosition' => $anotherPosition,
            'anotherFIO' => $anotherFIO,
            'anotherREQ' => $anotherREQ,
            'anotherDate_Id' => $anotherDate_Id,
            'anotherNameYur' => $anotherNameYur,
            'checkName' => $checkName,
            'workDo' => $workDo,
            'anotherDocs' => $anotherDocs,
            'materialName' => $materialName,
            'sertificate' => $sertificate,
            'sertificatefrom' => $sertificatefrom,
            'sertificateBy' => $sertificateBy,
            'sertificateQuality' => $sertificateQuality,
            'sertificateDate' => $sertificateDate,
            'doc' => $doc,
            'docDate' => $docDate,
            'dateBeginWork' => $dateBeginWork,
            'dateEndWork' => $dateEndWork,
            'RegName' => $RegName,
            'razdeDoc' => $razdeDoc,
            'nameWorkCostruct' => $nameWorkCostruct,
            'moreInfo' => $moreInfo,
            'numberAct' => $numberAct,
            'dateAOSR' => $dateAOSR,
            'countAOSR' => $countAOSR

        ];

        return $dataForm;
    }

    public function wordBreak($text, $count)
    {
        //Берём текст и разбиваем его на строки
        $newtext = wordwrap($text, $count, "\n", false);
        //Получаем массив строк
        $textWrap = explode("\n", $newtext);

        return $textWrap;
    }

    public function styleSettings($type)
    {
        //Прописываем стили пока стандартные
        if ($type == 'bold') {
            $style = array(
                'font' => array(
                    'bold' => true,
                )
            );
        } else if ($type = 'italic') {
            $style = array(
                'font' => array(
                    'italic' => true,
                ),
                'borders' => array(
                    //внешняя рамка
                    'bottom' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                    ),
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )

            );
        } else if ($type == 'bottom') {
            $style = array(
                'font' => array(
                    'italic' => true,
                    'size' => 8
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );
        }

        return $style;
    }

    public function settings($title, $rowMarg = ['top', 'right', 'left', 'bottom'], $style = ['fonts', 'size'], $rowWidth = [])
    {
        $this->objPHPExcel->setActiveSheetIndex(0);
        $active_sheet = $this->objPHPExcel->getActiveSheet();
        //Ориентация страницы и  размер листа
        $active_sheet->getPageSetup()
            ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
        $active_sheet->getPageSetup()
            ->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
        //Поля документа
        $active_sheet->getPageMargins()->setTop($rowMarg['top']);
        $active_sheet->getPageMargins()->setRight($rowMarg['right']);
        $active_sheet->getPageMargins()->setLeft($rowMarg['left']);
        $active_sheet->getPageMargins()->setBottom($rowMarg['bottom']);
        //Название листа
        $active_sheet->setTitle($title);
        //Настройки шрифта 'Times New Roman'
        $this->objPHPExcel->getDefaultStyle()->getFont()->setName($style['fonts']);
        $this->objPHPExcel->getDefaultStyle()->getFont()->setSize($style['size']);
        //НАстройка ширины и колличество строк
        foreach ($rowWidth as $key => $value) {
            $active_sheet->getColumnDimension($key)->setWidth($value / 8);
        }
    }

    public function creatRow($rowData = [])
    {
        foreach ($rowData as $key => $value) {
            $active_sheet = $this->objPHPExcel->getActiveSheet();
            //Соединяем строки
            $active_sheet->mergeCells($value['row']);
            //Получаем первый элемент
            $firstRow = explode(':', $value['row']);
            $firstRow = $firstRow[0];
            //Вставляем в первую строку текст
            $active_sheet->setCellValue($firstRow, $value['text']);
            //Тобовляем стили
            $active_sheet->getStyle($value['row'])->applyFromArray($value['style']);
        }
    }

    public function generateExcel(Request $request)
    {
        //Получаем данные из формы
        $date = $this->formRequest($request);
        $title = 'Название документа';
        $rowMarg = ['top' => 1, 'left' => 2, 'right' => 1, 'bottom' => 1];
        $styleDefault =
            [
                'fonts' => 'Times New Roman',
                'size' => 11
            ];
        $rowWidth =
            [
                'A' => 60,
                'B' => 75,
                'C' => 62,
                'D' => 91,
                'E' => 53,
                'F' => 58,
                'G' => 62,
                'H' => 131,
                'I' => 324
            ];
        $this->settings($title, $rowMarg, $styleDefault, $rowWidth);

        $styleBottom = [
            'font' => [
                'italic' => true,
                'size' => 8
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ]
        ];
        //Оформление АОСР
        //Объект капитального строительства
        foreach ($this->wordBreak($date['projectName'], 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':D' . $this->i . '', 'text' => $text, 'style' => $this->styleSettings('bold')]
                ]
            );
        }
        //Почтовый или строительный адрес объекта капитального строительства
        foreach ($this->wordBreak($date['projectAddres'], 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $this->styleSettings('italic')]
                ]
            );
        }
        //Объект капитального строительства подпись
        foreach ($this->wordBreak('(наименование проектной документации, почтовый или строительный адрес объекта капитального строительства)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        //Заполните информацию о застройщике (технический заказчик, эксплуатирующая организация или региональный оператор)
        //Юридическое лицо
        $builderName = $date['builderName'];
        $builderAddres = $date['builderAddres'];
        $builderORGN = $date['builderORGN'];
        $builderINN = $date['builderINN'];
        $builderPhone = $date['builderPhone'];
        //Саморегулируемая организация
        $builderNameOrg = $date['builderNameOrg'];
        $builderOrgORG = $date['builderOrgORG'];
        $builderOrgINN = $date['builderOrgINN'];
        foreach ($this->wordBreak('Застройщик (технический заказчик, эксплуатирующая организация или региональный оператор)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $this->styleSettings('bold')]
                ]
            );
        }
        foreach ($this->wordBreak($builderName . ', ОРГН ' . $builderORGN . ' ИНН ' . $builderINN . ' ' . $builderAddres . ' тел. ' . $builderPhone, 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $this->styleSettings('italic')]
                ]
            );
        }
        foreach ($this->wordBreak('(фамилия, имя, отчество, адрес места жительства, ОГРНИП, ИНН индивидуального предпринимателя,', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }

        $objPHPExcel = $this->objPHPExcel->createSheet();
        header("Content-Type:application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=simple.xls");

        $objWriter = PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
}
