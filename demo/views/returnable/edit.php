<h1>Edit a user</h1>
<p>This is just a dummy form which doesn't do anything for real. Just click
on the buttons and see where you end up.</p>

<?php echo CHtml::form() ?>
<div>
	<?php echo CHtml::label('Name','name') ?>
	<?php echo CHtml::textField('name') ?>
</div>
<div>
	<?php echo CHtml::submitButton('Save') ?>
	<?php echo CHtml::link('Cancel',$this->getReturnUrl()) ?>
	<?php echo CHtml::linkButton('Delete', array (
		'submit' => $this->createReturnStackUrl('returnable/delete'),
		'params' => array('id'=>123),
		'confirm'=>'Are you sure?'
	)) ?>
</div>
<?php echo CHtml::endForm() ?>

<h2>Get return URL</h2>
<p>We have two options to get the last page from the return stack:
<ul>
	<li>
		<tt>getReturnUrl()</tt> provides the link to the last page
		on the return stack. This is often used in <b>views</b>.
        <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP')) ?>
		echo CHtml::link('Cancel',$this->getReturnUrl());
        <?php $this->endWidget(); ?>
	</li>

	<li>
		In an <b>action</b> <tt>goBack()</tt> can be used to directly
		return to the last page on the stack:
        <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP')) ?>
		public function actionEdit() {
			if (Yii::app()->request->isPostRequest) {
				// Save ...

				if (!$this->goBack())
					$this->render('done');
			}
			$this->render('edit');
		}
        <?php $this->endWidget(); ?>
	</li>
</ul>
</p>

<h2>Create URL without current page</h2>
<p>For the delete link another method is used: <tt>createReturnStackUrl()</tt>
        <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP')) ?>
		echo CHtml::linkButton('Delete', array (
			'submit' => $this->createReturnStackUrl('returnable/delete'),
			'params' => array('id'=>123),
			'confirm'=>'Are you sure?'
		));
        <?php $this->endWidget(); ?>
It also creates a URL with the return stack appended but <b>doesn't add the current page
to the stack</b>. This is useful when we want to perform an action but don't want to return
to the current page after the action ended. Instead we return to the last page on the stack.
