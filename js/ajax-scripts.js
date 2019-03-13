function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
$(document).ready(function () {
    let uri = window.location.search;
    let element = $('option[value="/category.php' + uri + '"]');
    element.attr('selected', 'selected');


    let id = getUrlVars()["id"];
    $.ajax({
        type: "POST",
        url: "../components/category.php",
        data: {id: id},
        success: function (result) {
            let countOfPages = Number(result);
            let element = $('.pagination');
            let page = parseInt(getUrlVars()["page"]);
            let sort = '';
            let order = '';
            if(getUrlVars()["sort"]){
                sort = '&sort=' + getUrlVars()["sort"];
                order = '&order=' + getUrlVars()["order"];
            }
            if(!page){
                page = 1;
            }
            if(page > 1){
                element.append('<li><a href="/category.php?id=' + id + sort + order + '&page=' + 1 + '"><<</a></li>');
                element.append('<li><a href="/category.php?id=' + id + sort + order + '&page=' + (page-1) + '"><</a></li>');
            }
            if(countOfPages > 1){
                for(let i = 1; i <= page+3; i++){
                    if(i > 0 && i <= countOfPages) {
                        if (i != page) {
                            element.append('<li><a href="/category.php?id=' + id + sort + order + '&page=' + i + '">' + i + '</a></li>')
                        }
                        else {
                            element.append('<li class="active"><span>' + i + '</span></li>')
                        }
                    }
                }
            }

            if(page != countOfPages){
                element.append('<li><a href="/category.php?id=' + id + sort + order + '&page=' + (page+1) + '">></a></li>');
                element.append('<li><a href="/category.php?id=' + id + sort + order + '&page=' + countOfPages + '">>></a></li>');
            }
        }
    })
});