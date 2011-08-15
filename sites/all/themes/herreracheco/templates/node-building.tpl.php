<?php require dirname(__FILE__).'/../../../../../includes/paths.php';?>
<div class="building">
 
    <h4 class="building-title"><?php echo $node->field_building_title[0]['safe'];?></h4><img src="<?php echo $paths->images;?>/building/buildingTitleCorner.png"/>
    <table class="hidden">
        <tr>
            <td class="bold building-apt-header">Apto.</td>
            <td class="bold building-apt-header">mts.</td>
            <td class="bold building-apt-header">Precio de venta</td>
         </tr>
       
             <?php foreach($node->field_building_apts as $apt):?>
                <?php $apt = node_load($apt['nid']);?>
          
               <tr>
                   <td><?php echo $apt->field_apt_number[0]['value'];?></td>
                   <td><?php echo $apt->field_apt_construction[0]['value'];?></td>
                   <td><?php echo $apt->field_apt_price[0]['value'];?></td>
                   <?php var_dump($apt);?>
               </tr>
            <?php endforeach;?>
         
            
        
        
    </table>
    
</div>