
$(document).ready(function(){
    $('.card').find('.product-subtitle').hide();
    $('.card').hover(function(){
        $(this).find('.product-subtitle').show().addClass('subtitle-hover').stop(true,true).animate({height:"50px"});
        $(this).find('.product-subtitle').show().addClass('subtitle-hover').stop(true,true).animate({height:"115px"});
    },function(){
        $(this).find('.product-subtitle').stop(true,true).animate({height:"50px"});
    })
})

$(function(){
    var len = 48; // 超過48個字以"..."取代
    $(".explanation").each(function(i){
        if($(this).text().length>len){
            $(this).attr("title",$(this).text());
            var text=$(this).text().substring(0,len-1)+"...";
            $(this).text(text);
        }
    });
});

// products
function imgchange(index) {
    canchange.src = document.querySelectorAll(".clickChange")[index].src;
}

function decQuantity(index, price) {
    let obj = document.getElementsByClassName('num')[index];
    let num = obj.value;
    if (num > 1 && num < 21) {
        obj.value = parseInt(obj.value) - 1;
        $('#sum').text($('#sum').text() - 1);
        $('#total').text($('#total').text() - price);
    } else {
        obj.value = 1;
    }
}

function incQuantity(index, price) {
    let obj = document.getElementsByClassName('num')[index];
    let num = obj.value;
    if (num < 20 && num > 0) {
        obj.value = parseInt(obj.value) + 1;
        $('#sum').text(+$('#sum').text() + 1);
        $('#total').text(+$('#total').text() + price);
    } else {
        obj.value = 20;
    }
}

function search(q) {
    location.href='search.php?q='+q;
}

