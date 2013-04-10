/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * */

var name = "#floatMenu";
var menuYloc = null;
$(document).ready(function(){
    menuYloc = parseInt($(name).css("top").substring(0,$(name).css("top").indexOf("px")))
    $(window).scroll(function () { 
        offset = menuYloc+$(document).scrollTop()+"px";
        $(name).animate({
            top:offset
        },{
            duration:500,
            queue:false
        });
    });
}); 