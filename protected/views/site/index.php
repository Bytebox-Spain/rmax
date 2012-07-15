<?php $this->pageTitle=Yii::app()->name; ?>

<h2><i><?php echo CHtml::encode(Yii::app()->name); ?></i></h2>
<?php 
if (isset(Yii::app()->user->ultimo_login)){
    echo "Último login: " . date('d-m-Y H:i:s', Yii::app()->user->ultimo_login);
    echo Yii::app()->user->master_company_id;
}


