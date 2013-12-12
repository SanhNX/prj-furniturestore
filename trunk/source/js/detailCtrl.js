/**
 * Created with IntelliJ IDEA.
 * User: macTin
 * Date: 12/11/13
 * Time: 8:15 AM
 * To change this template use File | Settings | File Templates.
 */
$(function () {
    init();
})
function init() {
    var id = getParam("id");
    var url = "url('../images/{0}.png')";
    $("#gallery-img-src").css({backgroundImage: ("url('images/resource/" + id + ".jpg')")});
}
function getParam(name) {
    if (name = (new RegExp('[?&]' + encodeURIComponent(name) + '=([^&]*)')).exec(location.search))
        return decodeURIComponent(name[1]);
}