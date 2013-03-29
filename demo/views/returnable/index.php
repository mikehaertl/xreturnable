<h1>XReturnable demo</h1>

<p><tt>XReturnable</tt> is a controller behavior. It allows to create
action URLs that contain the GET parameters of the current page. After
performing an action these parameters can be used to return to the
originating page.</p>

<p>As the return parameter are organized as a 
<a href="http://en.wikipedia.org/wiki/Stack_(data_structure)">stack</a>
multiple pages can be added and later be returned to.</p>

<h2>Setup</h2>

<p>Attach the behavior in the <tt>init()</tt> method of a controller:</p>
        <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP')) ?>
        public function init() {
            $this->attachBehavior('returnable','application.components.xreturnable.XReturnable');
        }
        <?php $this->endWidget(); ?>
</p>

<h2>Demo actions</h2>
<ul>
    <li><tt>returnable/index</tt> - This page</li>
    <li><tt>returnable/list</tt> - list view</li>
    <li><tt>returnable/edit</tt> - editing of an entry</li>
    <li><tt>returnable/delete</tt> - deletes an entry</li>
</ul>

<h2>Example</h2>

<ol>
    <li>
        <b>Base example</b>
        <p>First go to the list page using <?php echo CHtml::link('this standard link',array('returnable/list')) ?>
        and try to edit a user there. After you edit a user and click save, delete or cancel
        you get redirected to the list page again.</p>

        <p>Now directly go to the edit form using 
        <?php echo CHtml::link('this link',
            $this->createReturnableUrl('returnable/edit',array('id'=>124))
        ) ?>.</p>

        <p>It directly takes you to the edit form for a specific user.
        In difference to the first example we get redirected to this page again
        after the user was saved, deleted or edit canceled. This happens because
        the link above was created with:</p>

        <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP')) ?>
        echo CHtml::link('this link',
            $this->createReturnableUrl('returnable/edit',array('id'=>124))
        );
        <?php $this->endWidget(); ?>
    </li>

    <li>
        <b>Chained example</b>
        <p>We can also chain multiple pages we want to return to. That way we can first go the 
        <?php echo CHtml::link('list page',$this->createReturnableUrl('returnable/list')) ?>,
        from there to any edit page and in the end return 
        to this page again. Note the <b>Status</b> on the bottom of the list page</p>

        <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP')) ?>
        echo CHtml::link('list page',$this->createReturnableUrl('returnable/list'))
        <?php $this->endWidget(); ?>
    </li>
</ol>

