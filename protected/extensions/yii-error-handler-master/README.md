yii-error-handler
=================

Error handler for yii 1 with ability to open lines in IDE

By default it configured to work with PHPStorm. Required [remote call](http://plugins.jetbrains.com/plugin?pr=phpStorm&pluginId=6027) plugin.

You need to set up it in config:

```
'errorHandler'=>array(
	'class' => 'ext.yii-error-handler.ErrorHandler',
	//'fileLinkFormat' => 'myide://{file}:{line}',
	'errorAction'=>'site/error',
),
```
