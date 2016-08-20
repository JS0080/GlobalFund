<div class="paging" style="  background: none repeat scroll 0 0 #60C8F2;
    float: right;
    padding: 0 10px;
    text-align: left;
    width: auto;">
<?php
$this->Paginator->options(array(
    'url' => array_merge(array(
        'controller' => $this->params['controller'],
        'action' => $this->params['action'],
    ) , $this->params['pass'], $this->params['named'])
));

echo $this->Paginator->prev('' . '' , array(
    'class' => 'prev',
    'escape' => false
) , null, array(
    'tag' => 'span',
    'escape' => false,
    'class' => 'prev'
)), "\n";
echo $this->Paginator->numbers(array(
    'modulus' => 2,
    'skip' => '',
    'separator' => " \n",
    'before' => null,
    'after' => null,
    'escape' => false
));
echo $this->Paginator->next('' . '', array(
    'class' => 'next',
    'escape' => false
) , null, array(
    'tag' => 'span',
    'escape' => false,
    'class' => 'next'
)), "\n";
?>
</div>
