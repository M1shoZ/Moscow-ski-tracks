$(document).ready(function () {
    function updateDataAndPagination(page, perPage) {
        $.ajax({
            type: "POST",
            url: "tracks.php",
            data: $("#filterForm").serialize() + "&page=" + page + "&per_page=" + perPage,
            success: function (response) {
                $("#recordsTable tbody").html(response); // Замена содержимого tbody результатами
                var totalCount = parseInt($(".total-count").text());
                updatePagination(page, perPage, totalCount);
                updatePageNavigation(page, perPage, totalCount);
            }
        });
    }

    function updatePagination(currentPage, perPage, totalCount) {
        var totalPages = Math.ceil(totalCount / perPage);
        var paginationHtml = "";

        for (var i = 1; i <= totalPages; i++) {
            paginationHtml += '<li class="page-item' + (i === currentPage ? ' active' : '') + '"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
        }

        $(".pagination").html(paginationHtml);

        $(".pagination a").on("click", function (e) {
            e.preventDefault();
            var clickedPage = $(this).data("page");
            updateDataAndPagination(clickedPage, perPage);
        });
    }

    function updatePageNavigation(currentPage, perPage, totalCount) {
        var totalPages = Math.ceil(totalCount / perPage);
        var $paginationInfo = $(".pagination-info");

        $paginationInfo.find(".current-interval-start").text((currentPage - 1) * perPage + 1);
        $paginationInfo.find(".current-interval-end").text(Math.min(currentPage * perPage, totalCount));
        $paginationInfo.find(".total-count").text(totalCount);

        if (totalPages > 1) {
            var prevPage = (currentPage > 1) ? (currentPage - 1) : 1;
            var nextPage = (currentPage < totalPages) ? (currentPage + 1) : totalPages;

            var navigationHtml = '<li class="page-item"><a class="page-link" href="#" data-page="' + prevPage + '">Предыдущая</a></li>' +
                '<li class="page-item"><span class="page-link current-page">' + currentPage + '</span></li>' +
                '<li class="page-item"><a class="page-link" href="#" data-page="' + nextPage + '">Следующая</a></li>';

            $(".pagination").prepend(navigationHtml);

            $(".pagination a").on("click", function (e) {
                e.preventDefault();
                var clickedPage = $(this).data("page");
                updateDataAndPagination(clickedPage, perPage);
            });
        } else {
            $(".pagination").html(""); // Очистка навигации, если всего одна страница
        }
    }

    $(document).on("submit", "#filterForm", function (e) {
        e.preventDefault();
        var currentPage = 1;
        var perPage = parseInt($(".per-page-btn").val());
        updateDataAndPagination(currentPage, perPage);
    });

    $(document).on("change", ".per-page-btn", function () {
        var perPage = parseInt($(this).val());
        var currentPage = 1;
        updateDataAndPagination(currentPage, perPage);
    });

    $(document).on("click", ".pagination a", function (e) {
        e.preventDefault();
        var clickedPage = $(this).data("page");
        updateDataAndPagination(clickedPage, perPage);
    });
});
