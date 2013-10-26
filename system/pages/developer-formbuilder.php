<?php

//include 'system/views/admin-start.php';

?>
<h1>Controller</h1>
<pre>
<?php
echo htmlentities('<?php')." 

namespace system\controllers;

use system\classes\BaseController;
use system\classes\FormBuilder;
use system\classes\DoctrineData;

class MyController extends BaseController
{
	public function indexAction()
	{
            \$".$entity." = new \\".ucfirst($entity)."();
            \$form = new FormBuilder(new DoctrineData(\$".$entity."));
            
            \$form";
foreach($fields as $colname => $type)
    echo "\n\t\t\t->add('" . $colname . "','" . $type . "')";
echo ";
            
            \$form->setCallback(\$this, 'validate');

            if(\$form->isValid())
            {
		\$".$entity." = \$form->save();

		\$this->em->persist(\$".$entity.");
		\$this->em->flush();
		
                \$data = array(
                       'pageTitle' => 'Clubzz - [MyPage]',
                );

                \$this->loadPage('[ready-page]', \$data);
                return;
            }
		
            \$data = array(
                'pageTitle' => 'Clubzz - MyPage',
                'form' => \$form,
                'errors' => \$form->getAllErrors()
            );

            \$this->loadPage('[form-page]', \$data);
	}
	
	public function validate(\$validator)
	{
            \$valid = true;
            
            // add your own validation rules here 			

            return \$valid;
	}
}
";
?>
</pre>
<h1>Page</h1>
<pre>
<?php
    echo "foreach(\$errors as \$error)
	echo '&lt;strong&gt;' . \$error . '&lt;/strong&gt;&lt;br&gt;';
        
echo \$form->start();\n";
    foreach($fields as $colname => $type)
        echo "echo \$form->render('" . $colname . "');\n";
    echo "echo \$form->end();\n";
?>
</pre>
<?php

include 'system/views/admin-end.php';

?>