<?php

namespace BugDemo;

require(__DIR__ . '/../vendor/autoload.php');

$presentation = new \PhpOffice\PhpPresentation\PhpPresentation();
$presentation->getLayout()->setDocumentLayout(\PhpOffice\PhpPresentation\DocumentLayout::LAYOUT_A4, true);
$presentation->removeSlideByIndex(0);

for ($i = 1; $i <= 2; $i++) {

    $currentSlide = $presentation->createSlide();
    $shape = new \PhpOffice\PhpPresentation\Shape\Drawing\File();
    $shape->setPath(__DIR__ . sprintf('/../assets/some-image-%u.png', $i));
    $currentSlide->addShape($shape);
}

$writer = \PhpOffice\PhpPresentation\IOFactory::createWriter($presentation, 'PowerPoint2007');
$writer->save(__DIR__ . '/../tmp/minimal-bug-demo.pptx');
