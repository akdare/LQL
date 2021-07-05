/*
 * jQuery 
 * Copyright 2018 Aeipix
 * Contributing Author: Aeipix
 */

$(document).ready(function () {
    var $searchBox = $('#aei_query_top');
    var searchURL     = $('#searchbox').attr('data-search-controller-url');

    $.widget('prestashop.psBlockSearchAutocomplete', $.ui.autocomplete, {
        _renderItem: function (ul, product) {
            if(aeisearch_image){
            return $("<li>")               
                .append($("<a href= "+ product.product_link +">")
                    .append($('<img src="'+ product.ajaxsearchimage +'" alt="" />'))
                    .append($("<span>").html(product.pname).addClass("product"))
                ).appendTo(ul);
            }else{
                 return $("<li>")               
                .append($("<a href= "+ product.product_link +">")
                    .append($("<span>").html(product.pname).addClass("product"))
                ).appendTo(ul);
            }
        }
    });

    $searchBox.psBlockSearchAutocomplete({
        source: function (query, response) {
            $.post(
            searchURL, 
            {
                s: query.term,
                resultsPerPage: aeisearch_number,
                id_lang : id_lang,
                id_category: $('select[name=aeicats]').val()
            }, null, 'json')
            .then(function (resp) {
                response(resp.products);
            })
            .fail(response);
        },
        select: function (event, ui) {
            var url = ui.item.url;
            window.location.href = url;
        },
    });
});


