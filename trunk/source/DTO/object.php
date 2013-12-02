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
	    var $image;
	    var $thumnail_1;
	    var $thumnail_2;
	    var $thumnail_3;
	    var $size;
	    var $material;
	    var $color;
	    var $description;
	}

?>