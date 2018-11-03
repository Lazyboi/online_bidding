
	<?php
		


	$select_id = $_GET['select_id'];
	echo "<tr class='content_row'><td class = 'category2'>Category </td><td>
	<select name='content_id' id='content_id'>
	"
?>



<?php

       if ($select_id == "Motors"){
		   
	  
		echo '<option >Cars & Trucks</option>';
		echo '<option >Motorcycles</option>';
		echo '<option >Parts & Accesories</option>';
		echo '<option >Auto Tools & Supplies</option>';
		echo '<option >Vehicles</option>';
		
        
		 }
		 else if ($select_id=="Fashion") {
		echo '<option >Womens Clothing</option>';
		echo '<option >Mens Clothing</option>';
		echo '<option >Kids & Baby</option>';
		echo '<option >Jewelry</option>';
		echo '<option >HandBags & Accessories</option>';
		
		 }
		 
		 	 
		 else if ($select_id=="Electronics") {
		echo '<option >Cellphones & Accesories</option>';
		echo '<option >Camera & Photo</option>';
		echo '<option >Computers & Tables</option>';
		echo '<option >Video Games & Consoles</option>';
		echo '<option >Tv, Audio & Surveillance</option>';
		
		 }
		 
		 	
		 else if ($select_id=="Collectibles & Arts") {
		echo '<option >Collectibles</option>';
		echo '<option >Coins & Paper Money</option>';
		echo '<option >Sports Memorabilla</option>';
		echo '<option >Gallery Collective</option>';
		echo '<option >Antiquies</option>';
		
		 }

		 	
		 else if ($select_id=="Home & Garden") {
		echo '<option >Crafts</option>';
		echo '<option >Home Decor</option>';
		echo '<option >Pet Supplies</option>';
		echo '<option >Kitchen, Dining & Bar</option>';
		echo '<option >Yard, Garden & Outdoor</option>';
		
		 }
		 	 else if ($select_id=="Sporting Goods") {
		echo '<option >Cycling</option>';
		echo '<option >Golf</option>';
		echo '<option >Hunting</option>';
		echo '<option >Fitness & Running</option>';
		echo '<option >Fishing</option>';
		
		 }
		 	 else if ($select_id=="Toys & Hobbies") {
		echo '<option >Action Figures</option>';
		echo '<option >LEGO & Building Toys</option>';
		echo '<option >Railroads & Trains</option>';
		echo '<option >Radio Control Toys</option>';
		echo '<option >Preschool & Pretend Play</option>';
		
		 }



?>