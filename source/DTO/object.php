<?php

	class Category{
		var $id;
		var $name;
		var $description;
	}

	class SubCategory{
		var $id;
		var $cateId;
		var $name;
		var $description;
	}

	class Admin{
	    var $id;
	    var $name;
	    var $email;
	}

	class Product{
	    var $id;
	    var $subcateId;
    	var $name;
	    var $price;
	    var $promotion_price;
	    var $image_1;
	    var $image_2;
	    var $image_3;
	    var $size;
	    var $material;
	    var $color;
	    var $description;
	}

?>