# OOHTML
Set of classes for Object Oriented HTML

The content class is simply a Base class that forces the generateHTML function of its children to be generated.

PlainText is used for adding text to the page => new PlainText('This is some text');

ContentlessElement is for elements which have attributes but no sub elements ie img:
$img = new ContentlessElement('img');
$img->src = 'picture.jpg';

Element is extended from ContentlessElement to allow sub elements:
$row = new Element('div');
$row->class = 'row';

$col = $row->createElement('div');
$col->class = 'col-xs-6';

Attribute setting is done using the magic set functionality as shown above
Element objects can create sub elements by using the functions:
createElement($tagName); and
createContentlessElement($tagname);

Elements can also be added to an Element object by using the addElement function
$col = new Element('div');
$col->class = 'col-xs-6';

$row->addElement($col);

The View class isn't actually a part of the OOHTML library but is good template for a MVC framework if you are so inclined.

Example (Using bootstrap):
$row = new Element('div');
$row->class = 'row';

$col = $row->createElement('div');
$col->class = 'col-xs-6';

$img = $col->createContentlessElement('img');
$img->src = 'picture.jpg';
$img->alt = 'This is a poorly named picture';

$col = $row->createElement('div');
$col->class = 'col-xs-6';

$p = $col->createElement('p');
$p->class = 'center-text';
$p->addElement(new PlainText('There is a picture to the left of this text'));

Always happy to get pointers and suggestions :)
