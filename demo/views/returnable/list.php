<?php echo CHtml::link('Back to start',array('index')) ?>

<h1>List view</h1>
<p>Demo page that for example shows a user list with links to <tt>edit</tt> 
and <tt>delete</tt> a user.</p>

<table border="1" width="60%" cellpadding="0" cellspacing="0">
	<tr>
		<th>Name</th>
		<th>Action</th>
	</tr>
	<tr>
		<td>John</td>
		<td>
			<?php echo CHtml::link('Edit',
				$this->createReturnableUrl('returnable/edit',array('id'=>123))
			) ?>
			<?php echo CHtml::linkButton('Delete', array (
				'submit' => $this->createReturnableUrl('returnable/delete'),
				'params' => array('id'=>123),
				'confirm'=>'Are you sure?'
			)) ?>
		</td>
	</tr>

	<tr>
		<td>Peter</td>
		<td>
			<?php echo CHtml::link('Edit',
				$this->createReturnableUrl('returnable/edit',array('id'=>124))
			) ?>
			<?php echo CHtml::linkButton('Delete', array (
				'submit' => $this->createReturnableUrl('returnable/delete'),
				'params' => array('id'=>124),
				'confirm'=>'Are you sure?'
			)) ?>
		</td>
	</tr>
</table>

<h2>Link creation</h2>
<p>The above links where created with <tt>createReturnableUrl()</tt> as we want 
to be able to return to <b>this page</b> after the <tt>edit</tt> or <tt>delete</tt> 
was performed or <tt>cancel</tt> was clicked.</p>

        <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP')) ?>
		echo CHtml::link('Edit',
			$this->createReturnableUrl('returnable/edit',array('id'=>123))
		);
		echo CHtml::linkButton('Delete', array (
			'submit' => $this->createReturnableUrl('returnable/delete'),
			'params' => array('id'=>123),
			'confirm'=>'Are you sure?'
		));
        <?php $this->endWidget(); ?>

<p>These links will contain the encoded return stack and thus enable to return here.</p>

<h2>Check return stack</h2>
<p>We can use <tt>getReturnUrl()</tt> to check if this page's URL also contains
return information:

        <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP')) ?>
		if (($url=$this->getReturnUrl())!==null)
			echo "We have a return URL: ".echo CHtml::link('Back',$url);
		else
			echo "There's no return URL.";
        <?php $this->endWidget(); ?>

</p>
<b>Current status:</b>
<?php if (($url=$this->getReturnUrl())!==null): ?>
	<p>We currently have a return URL:
	<?php echo CHtml::link('Back',$url) ?>
	</p>
<?php else: ?>
	<p>There's no return URL. Try example 2 on the index page.</p>
<?php endif; ?>
