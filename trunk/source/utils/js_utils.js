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
            $(".left-menu")[0].innerHTML = menuListHTML;
            $.getScript('js/effect.js', function() {
                $('.menu-item').click(function (e) {
                    // alert($(this).attr("id"));  
                    window.location.href = 'product.php?subCateId=' + $(this).attr("id");              
                });
            });
        }
    });
}