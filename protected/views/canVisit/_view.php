<?php
/* @var $this CanVisitController */
/* @var $data CanVisit */
?>

<div class="view">
    <div class="row">
        <div class="col-lg-8">
            <?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
            <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('rn')); ?>:</b>
            <?php echo CHtml::encode($data->rn); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('hn')); ?>:</b>
            <?php echo CHtml::encode($data->hn); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('vn')); ?>:</b>
            <?php echo CHtml::encode($data->vn); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('date_in')); ?>:</b>
            <?php echo CHtml::encode($data->date_in); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('code_rtx')); ?>:</b>
            <?php echo CHtml::encode($data->code_rtx); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('nhso')); ?>:</b>
            <?php echo CHtml::encode($data->nhso); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
            <?php echo CHtml::encode($data->price); ?>
        </div>
        <div class="col-lg-4">
            <img data-src="holder.js/100%x200" alt="100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjkyLjQ2MDkzNzUiIHk9IjEwMCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMXB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjI0MngyMDA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
        </div>
    </div>


    <div class='row'>
        <div class='span12'><hr/></div>            
    </div>
    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('doc_id')); ?>:</b>
      <?php echo CHtml::encode($data->doc_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
      <?php echo CHtml::encode($data->update_date); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
      <?php echo CHtml::encode($data->create_date); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
      <?php echo CHtml::encode($data->user_id); ?>
      <br />

     */ ?>

</div>