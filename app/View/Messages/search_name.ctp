<style>
    .search{list-style: none;
       position:absolute;
       top:50px;
       left:-20px;
        z-index:22;

    }
    
    .search_name {
       padding:5px 20px 5px 2px;
       background: #cccccc; 
    }
    
/*    li{position:absolute;
       top:50px;
       left:17px;
       padding:5px 20px 5px 2px;
       z-index:22;
       
    background: #cccccc;}*/
</style>





<ul class="search">
<?php 
 foreach($names as $name){ ?>
     <li class="search_name" onclick="set_item('<?php echo $name['User']['username'] ?>')" style="cursor:pointer;"> <?php echo $name['User']['username'] ?></li>
<?php }

 ?>           
</ul>



 <?php 
//  if(!empty($names)) {
//  foreach ($names as $name) {
//// add new option
//    echo '<p style="cursor:pointer" onclick="set_item(\''.str_replace("'", "\'", $name['User']['id']).'\')">'.ucfirst($name['User']['username']).'</p>';
//  } 
//  
//  }else{
//
//      }
      
      ?>

   
