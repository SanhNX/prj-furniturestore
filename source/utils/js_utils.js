function addCommas(str) {
    var amount = new String(str);
    amount = amount.split("").reverse();

    var output = "";
    for (var i = 0; i <= amount.length - 1; i++) {
        output = amount[i] + output;
        if ((i + 1) % 3 == 0 && (amount.length - 1) !== i) output = ',' + output;
    }
    return output;
}
function getURLParameter(name) {
    return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [, ""])[1].replace(/\+/g, '%20')) || null;
}
function createTable(pageIndex, data){
    if(!data){
        return;
    }
    var productListHTML = "";
    index = (pageIndex * numPerPage) - numPerPage;
    for (var i = index; i <= (pageIndex*numPerPage) - 1; i++) {
        if(data[i]){
            // var img = data[i].image_1 ? data[i].image_1 : (data[i].image_2 ? data[i].image_2 : data[i].image_3);
            var itemHTML = '<div class="grid-item">'+
                '<a href="detail.php?id='+ data[i].id +'">'+
                    '<div class="grid-item-img-wrap">'+
                        '<div class="grid-item-img" style="background-image: url('+ (data[i].image_1.replace("../","")) +')"></div>'+
                    '</div>'+
                    '<div class="grid-item-label">'+ data[i].name +'</div>'+
                    '<div class="grid-item-price">'+ addCommas(data[i].price) +' VND</div>'+
                '</a>'+
            '</div>';
            productListHTML += itemHTML;
        }
    };
    
    $("#productContentPanel")[0].innerHTML = productListHTML;
};
function loadPaging(pageIndex){
    createTable(parseInt(pageIndex, 10), data);
    for(var i = 1; i <= $(".grid-num").length; i++){
        if(i == parseInt(pageIndex, 10))
            $("#paging_" + i).addClass("active");
        else
            $("#paging_" + i).removeClass("active");
    }
    if(!getURLParameter("id")){
	    var body = $("body");
	    body.animate({scrollTop: 0}, 2000);
    }
};
function createPaging(list){
    if(list){
        var totalPage = 0;
        var tempPage = list.length/numPerPage;
        totalPage = tempPage > Math.round(tempPage) ? Math.floor(tempPage) + 1 : Math.round(tempPage);
        $("#grid-paging")[0].innerHTML = "";
        $("#messagePanel").addClass("undisplayed");
        if(totalPage === 1){
            return;
        }
        $("#grid-paging")[0].innerHTML += '<div class="grid-num grid-prev"></div>'; // class="disabled"
        for (var i = 1; i <= totalPage; i++) {
            var item = "<div id='paging_"+ i +"' class='grid-num' onclick='loadPaging(" + '"' + i + '"' + ")'>"+ i +"</div>";
            if(i == 1){
                var item = "<div id='paging_"+ i +"' class='grid-num active' onclick='loadPaging(" + '"' + i + '"' + ")'>"+ i +"</div>";
            }
            $("#grid-paging")[0].innerHTML += item; 
        };
        $("#grid-paging")[0].innerHTML += '<div class="grid-num grid-next"></div>';
    } else {
        $("#messagePanel").removeClass("undisplayed");
    }
};
function onloadIndex () {
    var str_string = 'flag=loadLeftMenu';
    $.ajax({
        type: "POST",
        url: "services/service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var items = JSON.parse(dto);
            var menuListHTML = "";
            for (var i = 0; i < items.length; i++) {
                var title = '<div class="title highlight">'+ items[i][items[i].length - 1] +'</div>';
                menuListHTML += title + '<ul class="menu-list">';
                for (var j = 0; j < items[i].length - 1; j++) {
                    var item = items[i];
                    var menuItem = '<li id="'+ item[j].id +'" class="menu-item">'+ item[j].name +'</li>';
                    menuListHTML += menuItem;
                };
                menuListHTML += '</ul>';
            };
            $("#menuList")[0].innerHTML = menuListHTML;
            $.getScript('js/effect.js', function() {
                $('.menu-item').click(function (e) {
                    // alert($(this).attr("id"));  
                    window.location.href = 'product.php?subCateId=' + $(this).attr("id");              
                });
            });
        }
    });
}
$(document).ready(function() {
    // Ẩn hiện icon go-top
	$(window).scroll(function(){
		if( $(window).scrollTop() == 0 ) {
			$('#go_top').stop(false,true).fadeOut(600);
		}else{
			$('#go_top').stop(false,true).fadeIn(600);
		}
	});
	
	// Cuộn trang lên với scrollTop
	$('#go_top').click(function(){
		$('body,html').animate({scrollTop:0},400);
		return false;
	})
});
