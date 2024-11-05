import DataTable from "datatables.net-dt";
import $ from "jquery";
import dt from "datatables.net-dt";

$(document).ready(function () {
    const table = $("#dt-table").DataTable({
        paging: true,
        searching: true,
        ordering: true,
        lengthMenu: [
            [10, 25, 50, 100],
            [10, 25, 50, 100],
        ],
        dom: "t",
    });

    const updatePagination = () => {
        var pageInfo = table.page.info();
        $("#page-number").text(`${pageInfo.page + 1} dari ${pageInfo.pages}`);
    };

    $("#prev-page").on("click", function () {
        if (table.page() > 0) {
            table.page("previous").draw("page");
            updatePagination();
        }
    });

    $("#next-page").on("click", function () {
        if (table.page() < table.page.info().pages - 1) {
            table.page("next").draw("page");
            updatePagination();
        }
    });
    updatePagination();

    // searching
    $("#dt-search").on("keyup", function () {
        table.search(this.value).draw();
        updatePagination();
    });

    // Custom length

    $("#custom-length").on("change", function () {
        var selectedValue = $(this).val();
        table.page.len(selectedValue).draw();
    });

    // date search

$("#dt-date-search").on("change", function () {
    let date = $(this).val();
    table.search(date).draw();
});
});
