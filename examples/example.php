<?php

// Include Composer Autoloader.
require_once __DIR__ . '/../vendor/autoload.php';

use ABGEO\HTMLGenerator\Document;
use ABGEO\HTMLGenerator\Element;
use ABGEO\HTMLGenerator\Exception\InvalidDocumentException;

$element = new Element();
$document = new Document();

try {
    $element
        ->add2Content(
            Element::createHeader(
                Element::createParagraph('I\'m Paragraph in Header')
            )
        )
        ->add2Content(
            Element::createLink(
                'Informatics.ge', 'https://informatics.ge',
                Element::TARGET_BLANK, ['class1', 'class1', 'class2'], 'id'
            )
        )
        ->add2Content(Element::createBreak())
        ->add2Content(Element::createBreak())
        ->add2Content(Element::createLine())
        ->add2Content(
            Element::createArticle(
                Element::createHeading('I\'m Article'), ['class1'], 'article'
            )
        )
        ->add2Content(Element::createBold('I\'m Bold text', [], 'bold'))
        ->add2Content(
            Element::createBlockquote(
                'I\'m Quote',
                'http://www.worldwildlife.org/who/index.html', [], 'quote'
            )
        )
        ->add2Content(
            Element::createDiv(
                Element::createParagraph('I\'m Paragraph in Div'), [], 'div'
            )
        )
        ->add2Content(Element::createHeading('H1'))
        ->add2Content(Element::createHeading('H3', 3))
        ->add2Content(Element::createHeading('H6', 6))
        ->add2Content(Element::createEm('I\'m Emphasized text'))
        ->add2Content(Element::createBreak())
        ->add2Content(Element::createBreak())
        ->add2Content(Element::createCode('print ("Hello. World")'))
        ->add2Content(Element::createI('I\'m alternate voice'))
        ->add2Content(Element::createImg('../images/code.jpg', 'Alternative text'))
        ->add2Content(
            Element::createList(
                ['item1', 'item2', 'item3'], Element::LIST_UNORDERED
            )
        )
        ->add2Content(
            Element::createNav(
                [
                    Element::createLink('link1', '#link1'),
                    Element::createLink('link2', '#link2'),
                    Element::createLink('link3', '#link3'),
                ],
                '|'
            )
        )
        ->add2Content(Element::createParagraph('I\'m Paragraph'))
        ->add2Content(Element::createPre('I\'m preformatted text'))
        ->add2Content(Element::createProgress(10))
        ->add2Content(
            Element::createSection(
                Element::concatenateElements(
                    Element::createHeading('I\'m Section heading'),
                    Element::createParagraph('I\'m Section paragraph')
                )
            )
        )
        ->add2Content(Element::createSpan('I\'m Span'))
        ->add2Content(Element::createBreak())
        ->add2Content(Element::createStrong('I\'m important text'))
        ->add2Content(
            Element::createParagraph(
                Element::concatenateElements(
                    'We are ',
                    Element::createSub('subscripted'), ' and ',
                    Element::createSup('superscripted'), ' texts'
                )
            )
        )
        ->add2Content(
            Element::createTable(
                [
                    ['h1', 'h2', 'h3'],
                    ['d1.1', 'd1.2', 'd1.3'],
                    ['d2.1', 'd2.2', 'd2.3'],
                    ['d3.1', 'd3.2', 'd3.3']
                ], ['table'], 'table1'
            )
        )
        ->add2Content(
            Element::createForm(
                Element::concatenateElements(
                    Element::createLabel('Username', 'username'),
                    Element::createInput(
                        Element::INPUT_TEXT, 'username', null,
                        'Enter your username', [], 'username'
                    ),
                    Element::createBreak(),
                    Element::createLabel('Password', 'pass'),
                    Element::createInput(
                        Element::INPUT_PASSWORD, 'password', null,
                        'Enter your password', [], 'pass'
                    ),
                    Element::createBreak(),
                    Element::createLabel('remember me', 'remember'),
                    Element::createInput(
                        Element::INPUT_CHECKBOX, 'remember', null,
                        null, [], 'remember'
                    ),
                    Element::createBreak(),
                    Element::createBreak(),
                    Element::createInput(Element::INPUT_RESET, null, 'Reset'),
                    Element::createInput(Element::INPUT_SUBMIT, null, 'Submit'),
                ),
                '/bootstrap.php'
            )
        )
        ->add2Content(
            Element::createSelect(
                [
                    'car1' => 'Mercedes',
                    'car2' => 'Audi',
                    'car3' => 'BMW',
                    'car4' => 'Tesla',
                ], 'car'
            )
        )
        ->add2Content(Element::createBreak())
        ->add2Content(
            Element::createTextarea(
                'textarea', 'Text about me', 'About me'
            )
        )
        ->add2Content(
            Element::createFooter(
                Element::createParagraph('I\'m Paragraph in Footer')
            )
        );

    $document
        ->setLanguage(Document::LANG_GEORGIAN)
        ->setTitle('Title')
        ->setCharset(Document::CHARSET_UTF_8)
        ->setDescription('description')
        ->setKeywords(['k1', 'k2', 'k3', 'k2'])
        ->addStyle('../css/theme.css')
        ->addStyle('../css/custom.css')
        ->setBody($element->getHtml())
        ->addScript('../js/scripts.js')
        ->addScript('../js/messages.js')
        ->addScript('../js/auth.js');

    echo $document->getDocument();
} catch (InvalidDocumentException $e) {
    die($e->getMessage());
} catch (ReflectionException $e) {
    die($e->getMessage());
}
