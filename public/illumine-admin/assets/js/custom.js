/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(document).ready(function ($) {
    $('.daterange-cus').daterangepicker({
        locale: {format: 'YYYY-MM-DD'},
        drops: 'down',
        opens: 'right'
    }, function (start, end) {
        var searchParams = new URLSearchParams(window.location.search);
        if(searchParams.toString().length > 0)
        {
            if(searchParams.has('date')) {
                searchParams.delete('date');
            }
        }
        searchParams.append('date', [start.format('YYYY-MM-D'),end.format('YYYY-MM-D')]);
        var url= searchUrl +'?'+ searchParams.toString();
        window.location.replace(url);
    });

    // select2 filter
    $('.select2_filter')
        .select2({
            allowClear: true,
        })
        .on('select2:select', function (e) {
            var searchParams = new URLSearchParams(window.location.search);
            if(searchParams.toString().length > 0 || $(this).val().length == 0)
            {
                if(searchParams.has($(this).data('key'))) {
                    searchParams.delete($(this).data('key'));
                }
            }

            if ($(this).val().length > 0) {
                searchParams.append($(this).data('key'), $(this).val());
            }
            var url= searchUrl +'?'+ searchParams.toString();
            window.location.replace(url);
        });

    // Search Input
    $('.search_input').on('keyup', function(e) {
        if (e.keyCode === 13) {
            search($(this));
        }
    })

    $('.search_input_submit').click(function () {
        search($('.search_input'));
    });

    function  search(obj) {
        var searchParams = new URLSearchParams(window.location.search);
        if(searchParams.toString().length > 0 || obj.val().length === 0)
        {
            if(searchParams.has('query')) {
                searchParams.delete('query');
            }
        }

        if (obj.val().length > 0) {
            searchParams.append('query', obj.val());
        }
        var url= searchUrl +'?'+ searchParams.toString();
        window.location.replace(url);
    }
});
