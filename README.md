yii-graphviz Extension
=====================

![Example Usage](http://i.imgur.com/IZmbXk4.png)

Yii Module to integrate the generation of graphviz graphs.
It contains the component Graphviz which provides an easy to use interface to the graphviz program
as well as the Graph Widget which comes with a convenient way to generate and display graphviz graphs.

Installation
============

1. Install the graphviz library http://www.graphviz.org/

2. Clone this repository to the extension folder of your yii app(myApp/protected/extensions)

3. Import the component and widget directory:  Yii::import("ext.yii-graphviz.components.*"); Yii::import("ext.yii-graphviz.widgets.*");

4. Use the widgets:

        <?php 
             $this->widget('ext.yii-graphviz.widgets.Graph', array(
                'configuration'=>$myGraphVizSyntax,
                'alt'=>"My Alt Text on image",
                'title'=>"My Image Title",
                'map'=>false, //True if my graphviz syntax features links and i want to have them clickable
            ));
        ?>

In case the dot executable of graphviz is not accessible, you can instantiate your own Graphviz Component instance
and configure the path to be used. For more info look into components/Graphviz.php

The widget then looks like this:

        <?php
             $this->widget('ext.yii-graphviz.widgets.Graph', array(
                'configuration'=>$myGraphVizSyntax,
                'alt'=>"My Alt Text on image",
                'title'=>"My Image Title",
                'map'=>false, //True if my graphviz syntax features links and i want to have them clickable
                'graphvizComponent'=>$myOwnGraphvizInstance,
            ));
        ?>

ChangeLog
---------

See https://github.com/ascendro/yii-graphviz for an incremental list of changes

Contact
-------

http://www.ascendro.de/