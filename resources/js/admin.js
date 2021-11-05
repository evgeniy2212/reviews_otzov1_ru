(function($) {
    $( document ).ready(function() {
        $( ".admin-filter-select" ).change(function() {
            let slug = $(this).attr('name');
            let item = $(this).children("option:selected").val();
            var str = window.location.search;
            str = replaceQueryParam(slug, item, str);
            str = replaceQueryParam('page', 1, str);
            window.location = window.location.pathname + str
        });

        $( ".admin-complain" ).click(function() {
            let slug = $(this).attr('name');
            let item = $(this).attr('value');
            var str = window.location.search;
            str = replaceQueryParam(slug, item, str);
            str = replaceQueryParam('page', 1, str);
            window.location = window.location.pathname + str
        });

        var minDate = $("#adminDatepickerDifMinRange").length > 0 ? $("#adminDatepickerDifMinRange").val() : 0;
        var maxDate = $("#adminDatepickerDifMaxRange").length > 0 ? $("#adminDatepickerDifMaxRange").val() : 0;
        $( function() {
            $( ".adminReviewdatepicker" ).datepicker({
                minDate: -minDate,
                maxDate: maxDate
            });
        } );

        $(".adminFilterButton").click(function (event) {
            var str = window.location.search;
            str = replaceQueryParam(
                $(".adminFilters .select").attr('name'),
                $(".adminFilters .select").val(),
                str
            );
            str = replaceQueryParam(
                'from',
                $(".adminFilterDatepicker [name='from']").val(),
                str
            );
            str = replaceQueryParam(
                'to',
                $(".adminFilterDatepicker [name='to']").val(),
                str
            );
            str = replaceQueryParam('page', 1, str);
            window.location = window.location.pathname + str
        });

        $( ".admin-data-filter-select" ).change(function() {
            let slug = $(this).attr('name');
            let item = $(this).children("option:selected").val();
            var str = window.location.search;
            str = replaceQueryParam(slug, item, str);
            window.location = window.location.pathname + str
        });

        $('.deleteLogo').click(function(){
            let id = $(this).data("logoId");
            let name = $(this).data("reviewName");
            let categoryName = $(this).data("reviewCategoryName");
            let url =  $("#deleteLogoForm").data('action');
            url = url.replace(':id', id);
            console.log(id, name, categoryName, url);
            $("#deleteLogoForm").attr('action', url);
            $("#reviewName").text(name);
            $("#reviewCategoryName").text(categoryName);
        });
        $('select[id^="bannerType"]' ).change(function() {
            let bannerId = $(this).data('bannerId');
            let banner = $('#banner-' + bannerId);
            if($(this).val() == window.banner_types.text){
                banner.find('#bannerImagePreview').hide();
                banner.find('#title').hide();
                banner.find('#link').hide();
                banner.find('#uploadBannerContainer').hide();
                banner.find('#bannerTextPreview').show();
            } else {
                banner.find('#bannerTextPreview').hide();
                banner.find('#title').show();
                banner.find('#link').show();
                banner.find('#uploadBannerContainer').show();
                banner.find('#bannerImagePreview').show();
            }
        });
    });

    function replaceQueryParam(param, newval, search) {
        var regex = new RegExp("([?;&])" + param + "[^&;]*[;&]?");
        var query = search.replace(regex, "$1").replace(/&$/, '');

        return (query.length > 2 ? query + "&" : "?") + (newval ? param + "=" + newval : '');
    }
})(jQuery);
