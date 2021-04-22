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
        $builderFax = $request->input('builderFax'); //Факс
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
        $contractorFax  = $request->input('contractorFax'); //Факс
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
        $preparationFax = $request->input('preparationFax'); // Факс
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
        $actTest = $request->input('actTest');
        $countSuppl = $request->input('countSuppl');
        $fontTitle = $request->input('fontTitle');
        $fontText = $request->input('fontText');
        $fontTextBottom = $request->input('fontTextBottom');
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
            'builderFax' => $builderFax,
            'builderNameOrg' => $builderNameOrg,
            'builderOrgORG' => $builderOrgORG,
            'builderOrgINN' => $builderOrgINN,
            'contractorName' => $contractorName,
            'contractorAddres' => $contractorAddres,
            'contractorORGN' => $contractorORGN,
            'contractorINN' => $contractorINN,
            'contractorPhone' => $contractorPhone,
            'contractorFax' => $contractorFax,
            'contractorOrgName' => $contractorOrgName,
            'contractorOrgORGN' => $contractorOrgORGN,
            'contractorOrgINN' => $contractorOrgINN,
            'preparationName' => $preparationName,
            'preparationAddres' => $preparationAddres,
            'preparationORGN' => $preparationORGN,
            'preparationINN' => $preparationINN,
            'preparationPhone' => $preparationPhone,
            'preparationFax' => $preparationFax,
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
            'countAOSR' => $countAOSR,
            'actTest' => $actTest,
            'countSuppl' => $countSuppl,
            'fontTitle' => $fontTitle,
            'fontText' => $fontText,
            'fontTextBottom' => $fontTextBottom

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
    public function formatDate($data)
    {
        $_monthsList = array(
            ".01." => "января",
            ".02." => "февраля",
            ".03." => "марта",
            ".04." => "апреля",
            ".05." => "мая",
            ".06." => "июня",
            ".07." => "июля",
            ".08." => "августа",
            ".09." => "сентября",
            ".10." => "октября",
            ".11." => "ноября",
            ".12." => "декабря"
        );
        $_mD = date(".m.", strtotime($data));
        $data = str_replace($_mD, " " . $_monthsList[$_mD] . " ", $data);
        return $data;
    }
    public function styleSettings($type)
    {
        // $date = $this->formRequest($request);
        //Прописываем стили пока стандартные
        if ($type == 'bold') {
            $style = array(
                'font' => array(
                    'bold' => true,
                    // 'size' => $date['fontTitle']
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
    public function createRow()
    {
    }
    public function generateExcel(Request $request)
    {
        //Получаем данные из формы
        $date = $this->formRequest($request);
        $title = 'Название документа';
        $rowMarg = ['top' => 1.5, 'left' => 1, 'right' => 0.5, 'bottom' => 1.5];
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
        $styleTitle = [
            'font' => [
                'bold' => true,
                'size' => $date['fontTitle']
            ]
        ];
        $styleText = [
            'font' => [
                'italic' => true,
                'size' => $date['fontText']
            ],
            'borders' => [
                //внешняя рамка
                'bottom' => [
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ],
            ]

        ];
        $styleBottom = [
            'font' => [
                'italic' => true,
                'size' => $date['fontTextBottom']
            ],
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ]
        ];
        //Оформление АОСР
        //Объект капитального строительства
        foreach ($this->wordBreak('Объект капитального строительства', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':D' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        //Почтовый или строительный адрес объекта капитального строительства
        foreach ($this->wordBreak($date['projectName'] . ' ' . $date['projectAddres'], 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
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
        $builderFax = $date['builderFax'];
        //Саморегулируемая организация
        $builderNameOrg = $date['builderNameOrg'];
        $builderOrgORG = $date['builderOrgORG'];
        $builderOrgINN = $date['builderOrgINN'];
        foreach ($this->wordBreak('Застройщик (технический заказчик, эксплуатирующая организация или региональный оператор)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        foreach ($this->wordBreak($builderName . ', ОРГН ' . $builderORGN . ' ИНН ' . $builderINN . ' ' . $builderAddres . ' тел. ' . $builderPhone . ' факс. ' . $builderFax, 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
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
        foreach ($this->wordBreak($builderNameOrg, 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }

        foreach ($this->wordBreak('(наименование, ОГРН, ИНН саморегулируемой организации, членом которой является - для индивидуальных предпринимателей и юридических лиц),', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }

        foreach ($this->wordBreak('ОРГН ' . $builderOrgORG . ' ИНН ' . $builderOrgINN, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }

        foreach ($this->wordBreak('(фамилия, имя, отчество, паспортные данные, адрес места жительства, телефон/факс - для физических лиц, не являющихся индивидуальным предпринимателями)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        //Лицо, осуществляющее строительство  
        foreach ($this->wordBreak('Лицо, осуществляющее строительство', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $contractorName = $date['contractorName'];
        $contractorAddres = $date['contractorAddres'];
        $contractorORGN = $date['contractorORGN'];
        $contractorINN = $date['contractorINN'];
        $contractorPhone = $date['contractorPhone'];
        $contractorFax = $date['contractorFax'];
        $contractorOrgName = $date['contractorOrgName'];
        $contractorOrgORGN = $date['contractorOrgORGN'];
        $contractorOrgINN = $date['contractorOrgINN'];
        foreach ($this->wordBreak($contractorName . ' ОРГН ' . $contractorORGN . ' ИНН ' . $contractorINN . ' ' . $contractorAddres . ' тел. ' . $contractorPhone . ' факс. ' . $contractorFax, 170) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }

        foreach ($this->wordBreak('( фамилия, имя, отчество, адрес места жительства, ОГРНИП, ИНН индивидуального предпринимателя,наименование, ОГРН, ИНН, место нахождения юридического лица, телефон/факс)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }

        foreach ($this->wordBreak($contractorOrgName . ' ОРГН ' . $contractorOrgORGN . ' ИНН ' . $contractorOrgINN, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(наименование, ОГРН, ИНН саморегулируемой организации, членом которой является))', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }


        // Лицо, осуществляющее подготовку проектной документации								
        $preparationName = $date['preparationName'];
        $preparationAddres = $date['preparationAddres'];
        $preparationORGN = $date['preparationORGN'];
        $preparationINN = $date['preparationINN'];
        $preparationPhone = $date['preparationPhone'];
        $preparationFax = $date['preparationFax'];
        $preparationOrgName = $date['preparationOrgName'];
        $preparationOrgORGN = $date['preparationOrgORGN'];
        $preparationOrgINN = $date['preparationOrgINN'];
        foreach ($this->wordBreak('Лицо, осуществляющее подготовку проектной документации', 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        foreach ($this->wordBreak($preparationName . ' ОРГН ' . $preparationORGN . ' ИНН ' . $preparationINN . ' ' . $preparationAddres . ' тел. ' . $preparationPhone . ' факс ' . $preparationFax, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }

        foreach ($this->wordBreak('( (фамилия, имя, отчество, адрес места жительства, ОГРНИП, ИНН индивидуального предпринимателя, наименование, ОГРН, ИНН, место нахождения юридического лица, телефон/факс)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak($preparationOrgName . ' ОРГН ' . $preparationOrgORGN . ' ИНН ' . $preparationOrgINN, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(наименование, ОГРН, ИНН саморегулируемой организации, членом которой является)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak(' ', 200) as $text) {
            $this->i++;
            $i2 = $this->i + 1;
            $this->creatRow(
                [
                    [
                        'row' => 'A' . $this->i . ':I' . $i2 . '', 'text' => $text, 'style' =>
                        [
                            'font' => [
                                'bold' => true,
                            ],
                            'alignment' => [
                                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                            ]
                        ]
                    ]
                ]
            );
            $this->i++;
        }
        foreach ($this->wordBreak('АКТ', 200) as $text) {
            $this->i++;
            $i2 = $this->i + 1;
            $this->creatRow(
                [
                    [
                        'row' => 'A' . $this->i . ':I' . $i2 . '', 'text' => $text, 'style' => [
                            'font' => [
                                'bold' => true,
                            ],
                            'alignment' => [
                                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                            ]
                        ]
                    ]
                ]
            );
            $this->i++;
        }
        foreach ($this->wordBreak('освидетельствования скрытых работ', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    [
                        'row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' =>
                        [
                            'font' => [
                                'bold' => true,
                            ],
                            'alignment' => [
                                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                            ]
                        ]
                    ]
                ]
            );
        }

        foreach ($this->wordBreak('№ТК2-В2', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    [
                        'row' => 'A' . $this->i . ':D' . $this->i . '', 'text' => $text, 'style' =>
                        [
                            'font' => [
                                'italic' => true,
                                'size' => 12
                            ],
                            'alignment' => [
                                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                            ],
                            'borders' => [
                                'bottom' => [
                                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                                ]
                            ]
                        ]
                    ]
                ]
            );
        }
        $dateAOSR = $date['dateAOSR'];
        $dateAOSR = $this->formatDate($dateAOSR);

        foreach ($this->wordBreak($dateAOSR . ' г.', 200) as $text) {
            $this->creatRow(
                [
                    [
                        'row' => 'I' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' =>
                        [
                            'font' => [
                                'italic' => true,
                                'size' => 12
                            ],
                            'alignment' => [
                                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                            ],
                            'borders' => [
                                'bottom' => [
                                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                                ]
                            ]
                        ]
                    ]
                ]
            );
        }
        foreach ($this->wordBreak('(дата составления акта)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'I' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak(' ', 200) as $text) {
            $this->i++;
            $i2 = $this->i + 3;
            $this->creatRow(
                [
                    [
                        'row' => 'A' . $this->i . ':I' . $i2  . '', 'text' => $text, 'style' =>
                        [
                            'font' => [
                                'bold' => true,
                            ],
                            'alignment' => [
                                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                            ]
                        ]
                    ]
                ]
            );
            $this->i++;
            $this->i++;
            $this->i++;
        }
        foreach ($this->wordBreak('Представитель  застройщика (технического заказчика, эксплуатирующей организации или регионального', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        foreach ($this->wordBreak('оператора) по вопросам строительного контроля', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $representativeBuilderPosition = $date['representativeBuilderPosition'];
        $representativeBuilderFIO = $date['representativeBuilderFIO'];
        $representativeBuilderRequisites = $date['representativeBuilderRequisites'];
        $representativeBuilderDate = $date['representativeBuilderDate'];
        $representativeBuilderId = $date['representativeBuilderId'];
        $representativeBuilderORGN = $date['representativeBuilderORGN'];
        $representativeBuilderINN = $date['representativeBuilderINN'];
        $representativeBuilderAddres = $date['representativeBuilderAddres'];
        $representativeBuilderDateGet = $date['representativeBuilderDateGet'];

        foreach ($this->wordBreak(
            $representativeBuilderPosition . ' ' . $representativeBuilderFIO,
            175
        ) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(должность, фамилия, инициалы, идентификационный номер в национальном реестре специалистов)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak(
            'индификационный № ' . $representativeBuilderId . ' от ' . $representativeBuilderDate . ' № ' . $representativeBuilderRequisites . ' от ' . $representativeBuilderDateGet . ' ',
            175
        ) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(в области строительства, реквизиты распорядительного документа, подтверждающего полномочия)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('ОРГН ' . $representativeBuilderORGN . ' ИНН ' . $representativeBuilderINN . ' ' . $representativeBuilderAddres, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(с указанием наименования, ОГРН, ИНН, места нахождения юридического лица)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('оператора) по вопросам строительного контроля', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        // Заполните информацию о представителе лица осуществляющего строительство
        foreach ($this->wordBreak('Представитель лица, осуществляющего строительство', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $representativeContractorPosition = $date['representativeContractorPosition'];
        $representativeContractorFIO = $date['representativeContractorFIO'];
        $representativeContractorRequisites = $date['representativeContractorRequisites'];
        $representativeContractorDate = $date['representativeContractorDate'];
        foreach ($this->wordBreak($representativeContractorPosition . ' ' . $representativeContractorFIO . ' №' . $representativeContractorRequisites . ' от ' . $representativeContractorDate, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(должность, фамилия, инициалы,  реквизиты распорядительного документа, подтверждающего полномочия) ', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        //Заполните информацию о представителе лица осуществляющего строительство, по вопросам строительного контроля (специалист по организации строительства)
        foreach ($this->wordBreak('Представитель лица, осуществляющего строительство, по вопросам строительного контроля (специалист по организации строительства)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }

        $memberBuilderPosition = $date['memberBuilderPosition'];
        $memberBuilderFIO = $date['memberBuilderFIO'];
        $memberBuilderId = $date['memberBuilderId'];
        $memberBuilderDateId = $date['memberBuilderDateId'];
        $memberBuilderRequisites = $date['memberBuilderRequisites'];
        $memberBuilderDate = $date['memberBuilderDate'];
        foreach ($this->wordBreak($memberBuilderPosition . ' ' .  $memberBuilderFIO . ' идентификационный № ' . $memberBuilderId . ' № ' . $memberBuilderRequisites . ' от ' . $memberBuilderDate, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(должность, фамилия, инициалы, идентификационный номер в национальном реестре специалистов в области строительства, реквизиты распорядительного документа, подтверждающего полномочия) ', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        //Заполните информацию об иных лицах, участвующих в освидетельствовании.
        foreach ($this->wordBreak('Представитель лица, осуществляющего подготовку проектной документации', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }

        $preparationPosition = $date['preparationPosition'];
        $preparationFIO = $date['preparationFIO'];
        $preparationREQ = $date['preparationREQ'];
        $preparationDateId = $date['preparationDateId'];
        $preparationYurName = $date['preparationYurName'];
        $preparationYurAddres = $date['preparationYurAddres'];
        $preparationORGN = $date['preparationORGN'];
        $preparationINN = $date['preparationINN'];
        foreach ($this->wordBreak($preparationPosition . ' ' . $preparationFIO . ' №' . $preparationREQ . ' от ' . $preparationDateId . ', ' . $preparationYurName . ' ОРГН ' . $preparationORGN . ' ИНН ' . $preparationINN . ' ' . $preparationYurAddres, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(должность, фамилия, инициалы, реквизиты распорядительного документа, подтверждающего полномочия, с указанием наименования, ОГРН, ИНН, места нахождения юридического лица, фамилии, имени, отчества, адреса места жительства, ОГРНИП, ИНН индивидуального предпринимателя)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('Представитель лица, выполнившего работы, подлежащие освидетельствованию', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $complitePosition = $date['complitePosition'];
        $compliteFIO = $date['compliteFIO'];
        $compliteREQ = $date['compliteREQ'];
        $compliteDateId = $date['compliteDateId'];
        $compliteNameYUR = $date['compliteNameYUR'];
        $compliteYURaddres = $date['compliteYURaddres'];
        $compliteORGN = $date['compliteORGN'];
        $compliteINN = $date['compliteINN'];

        foreach ($this->wordBreak($complitePosition . ' ' . $compliteFIO . ' № ' . $compliteREQ . ' от ' . $compliteDateId . ' ' . $compliteNameYUR . ' ОРГН ' . $compliteORGN . ' ИНН ' . $compliteINN . ' ' . $compliteYURaddres, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(должность, фамилия, инициалы, реквизиты распорядительного документа, подтверждающего полномочия, с указанием наименования, ОГРН, ИНН, места нахождения юридического лица, фамилии, имени, отчества, адреса места жительства, ОГРНИП, ИНН индивидуального предпринимателя)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('а также иные представители лиц, участвующих в освидетельствовании:', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $anotherPosition = $date['anotherPosition'];
        $anotherFIO = $date['anotherFIO'];
        $anotherREQ = $date['anotherREQ'];
        $anotherDate_Id = $date['anotherDate_Id'];
        $anotherNameYur = $date['anotherNameYur'];
        $objPHPExcel = $this->objPHPExcel->createSheet();
        foreach ($this->wordBreak($anotherPosition . ' ' . $anotherNameYur . ' ' . $anotherFIO . '  распоряжение №' . $anotherREQ . ' от ' . $anotherDate_Id, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(должность, фамилия, инициалы, реквизиты распорядительного документа, подтверждающего полномочия)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('произвели осмотр работ, выполненных', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':F' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $checkName = $date['checkName'];
        foreach ($this->wordBreak($checkName, 175) as $text) {

            $this->creatRow(
                [
                    ['row' => 'G' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(наименование лица, выполнившего работы, подлежащие освидетельствованию)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'G' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('и составили настоящий акт о нижеследующем:', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':F' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        foreach ($this->wordBreak('1. К освидетельствованию предъявлены следующие работы:', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $this->i++;
        $workDo = $date['workDo'];
        foreach ($this->wordBreak($workDo, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(наименование скрытых работ)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('2. Работы выполнены по проектной документации:', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':F' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }

        $anotherDocs = $date['anotherDocs'];
        foreach ($this->wordBreak($anotherDocs, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(номер, другие реквизиты чертежа, наименование проектной и/или рабочей документации, сведения о лицах, осуществляющих подготовку раздела проектной и/или рабочей документации)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('3. При выполнении работ применены:', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':F' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $materialName = $date['materialName'];
        $sertificate = $date['sertificate'];
        $sertificatefrom = ($date['sertificatefrom']) ? 'das' : 'dasdas';
        $sertificateBy = $date['sertificateBy'];
        $sertificateQuality =  $date['sertificateQuality'];
        $sertificateDate = $date['sertificateDate'];
        foreach ($this->wordBreak($materialName . ' ' . $sertificate . ' №' . $sertificateQuality . (!empty($sertificatefrom)) ? ' от ' . $sertificatefrom : '', 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(наименование строительных материалов, (изделий), реквизиты сертификатов и/или других документов, подтверждающих их качество и безопасность)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('4. Предъявлены документы, подтверждающие соответствие работ предъявляемым к ним требованиям ', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $doc = $date['doc'];
        $docDate = $date['docDate'];
        foreach ($this->wordBreak('Согласно реестру № ' . $doc . ' от ' . $docDate, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(исполнительные схемы и чертежи, результаты экспертиз, обследований, лабораторных и иных испытаний выполненных работ, проведенных в процессе строительного контроля)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('5. Даты:  начала работ', 200) as $text) {
            $this->i++;

            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':C' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $dateBeginWork = $date['dateBeginWork'];
        $dateEndWork = $date['dateEndWork'];
        foreach ($this->wordBreak($this->formatDate($dateBeginWork), 175) as $text) {

            $this->creatRow(
                [
                    ['row' => 'E' . $this->i  . ':G' . $this->i  . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('окончания работ', 200) as $text) {
            $this->i++;

            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':C' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }

        foreach ($this->wordBreak($this->formatDate($dateEndWork), 175) as $text) {
            $this->creatRow(
                [
                    ['row' => 'E' . $this->i . ':G' . $this->i  . '', 'text' => $text, 'style' => $styleText]
                ]
            );
            // $this->i++;

        }
        foreach ($this->wordBreak('6. Работы выполнены в соответствии с', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $razdeDoc = $date['razdeDoc'];
        $RegName = $date['RegName'];
        foreach ($this->wordBreak($razdeDoc . ' ' . $RegName, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i  . ':I' . $this->i  . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(наименования  и структурные единицы технических регламентов,иных нормативных правовых актов, разделы проектной и/или рабочей документации)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('7. Разрешается производство последующих работ ', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }

        $nameWorkCostruct = $date['nameWorkCostruct'];
        foreach ($this->wordBreak($nameWorkCostruct, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i  . ':I' . $this->i  . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }

        foreach ($this->wordBreak('(наименование работ, конструкций, участков сетей инженерно-технического обеспечения)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }

        // foreach ($this->wordBreak('Представитель застройщика (технического заказчика, эксплуатирующей организации или регионального оператора) по вопросам строительного контроля', 200) as $text) {
        //     $this->i++;
        //     $this->creatRow(
        //         [
        //             ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleText]
        //         ]
        //     );
        // }

        foreach ($this->wordBreak('Дополнительные сведения', 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':D' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $moreInfo = $date['moreInfo'];
        foreach ($this->wordBreak($moreInfo, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i  . ':I' . $this->i  . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        $this->i++;
        foreach ($this->wordBreak('Акт составлен в ', 200) as $text) {

            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':B' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $countAOSR = $date['countAOSR'];
        foreach ($this->wordBreak($countAOSR, 175) as $text) {

            $this->creatRow(
                [
                    ['row' => 'C' . $this->i  . ':C' . $this->i  . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak(' экземплярах.', 200) as $text) {

            $this->creatRow(
                [
                    ['row' => 'D' . $this->i . ':E' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        foreach ($this->wordBreak('Приложения:', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        $numberAct = $date['numberAct'];
        $dateAOSR = $date['dateAOSR'];
        $countSuppl = $date['countSuppl'];
        foreach ($this->wordBreak($countSuppl, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i  . ':I' . $this->i  . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }

        foreach ($this->wordBreak('Представитель застройщика (технического заказчика, эксплуатирующей организации или регионального оператора) по вопросам строительного контроля', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        foreach ($this->wordBreak($representativeBuilderFIO, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i  . ':I' . $this->i  . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(фамилия, инициалы, подпись)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('Представитель лица, осуществляющего строительство', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        foreach ($this->wordBreak($representativeContractorFIO, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i  . ':I' . $this->i  . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(фамилия, инициалы, подпись)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('Представитель лица, осуществляющего строительство, по вопросам строительного контроля (специалист по организации строительства)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        foreach ($this->wordBreak($memberBuilderFIO, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i  . ':I' . $this->i  . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(фамилия, инициалы, подпись)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('Представитель лица,  осуществляющего подготовку проектной документации', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        foreach ($this->wordBreak($preparationFIO, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i  . ':I' . $this->i  . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(фамилия, инициалы, подпись)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('Представитель лица, выполнившего работы, подлежащие освидетельствованию', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        foreach ($this->wordBreak($compliteFIO, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i  . ':I' . $this->i  . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(фамилия, инициалы, подпись)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        foreach ($this->wordBreak('Представители иных лиц ', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleTitle]
                ]
            );
        }
        foreach ($this->wordBreak($anotherFIO, 175) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i  . ':I' . $this->i  . '', 'text' => $text, 'style' => $styleText]
                ]
            );
        }
        foreach ($this->wordBreak('(фамилия, инициалы, подпись)', 200) as $text) {
            $this->i++;
            $this->creatRow(
                [
                    ['row' => 'A' . $this->i . ':I' . $this->i . '', 'text' => $text, 'style' => $styleBottom]
                ]
            );
        }
        // Акт составлен в   4   экземплярах.

        $objWriter = PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'Excel5');
        $filename = 'Content-Disposition:АОСР №' . $numberAct . ' от ' . $dateAOSR . '.xls';
        header("Content-Type:application/vnd.ms-excel; charset=utf-8");
        iconv('UTF-8', "windows-1251", $filename);
        header($filename);
        header('Cache-Control: max-age=0');


        $objWriter->save('php://output');
    }
}
