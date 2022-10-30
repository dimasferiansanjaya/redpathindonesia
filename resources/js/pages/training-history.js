import xlsx from "xlsx";
import { createIcons, icons } from "lucide";
import Tabulator from "tabulator-tables";

(function () {
    "use strict";

    // Tabulator
    if ($("#tabulator-training-history").length) {
        // Setup Tabulator
        let table = new Tabulator("#tabulator-training-history", {
            ajaxURL: "http://redpath.test/trainings",
            ajaxFiltering: true,
            filterMode: "remote",
            ajaxSorting: true,
            printAsHtml: true,
            printStyled: true,
            pagination: "remote",
            paginationSize: 10,
            paginationSizeSelector: [10, 20, 30, 40],
            layout: "fitColumns",
            responsiveLayout: "collapse",
            placeholder: "No matching records found",
            progressiveLoad: "load",
            columns: [
                {
                    formatter: "responsiveCollapse",
                    width: 40,
                    minWidth: 30,
                    hozAlign: "center",
                    resizable: false,
                    headerSort: false,
                },

                // For HTML table
                {
                    title: "Employee ID",
                    minWidth: 100,
                    responsive: 0,
                    field: "employee_id",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                },
                {
                    title: "Employee Name",
                    headerHozAlign: "left",
                    minWidth: 200,
                    field: "employee_name",
                    hozAlign: "left",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                },
                {
                    title: "Course ID",
                    headerHozAlign: "left",
                    minWidth: 200,
                    field: "course_id",
                    hozAlign: "left",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                },
                {
                    title: "Course Description",
                    headerHozAlign: "left",
                    minWidth: 200,
                    field: "course_desc",
                    hozAlign: "left",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                },
                {
                    title: "Course End",
                    minWidth: 200,
                    field: "course_end",
                    hozAlign: "center",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                },
                {
                    title: "Course Result",
                    headerHozAlign: "center",
                    minWidth: 200,
                    field: "course_result",
                    hozAlign: "center",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                },

                // For print format
                {
                    title: "Employee ID",
                    headerHozAlign: "left",
                    minWidth: 100,
                    responsive: 0,
                    field: "employee_id",
                    vertAlign: "middle",
                    visible: false,
                    print: true,
                    download: true,
                },
                {
                    title: "Employee Name",
                    field: "employee_name",
                    visible: false,
                    print: true,
                    download: true,
                },
                {
                    title: "Course ID",
                    field: "course_id",
                    visible: false,
                    print: true,
                    download: true,
                },
                {
                    title: "Course Desc",
                    field: "course_desc",
                    visible: false,
                    print: true,
                    download: true,
                },
                {
                    title: "Course End",
                    field: "course_end",
                    visible: false,
                    print: true,
                    download: true,
                },
                {
                    title: "Course Result",
                    field: "course_result",
                    visible: false,
                    print: true,
                    download: true,
                },
            ],
            renderComplete() {
                createIcons({
                    icons,
                    "stroke-width": 1.5,
                    nameAttr: "data-lucide",
                });
            },
        });

        // Redraw table onresize
        window.addEventListener("resize", () => {
            table.redraw();
            createIcons({
                icons,
                "stroke-width": 1.5,
                nameAttr: "data-lucide",
            });
        });

        // Filter function
        function filterHTMLForm() {
            let field = $("#tabulator-html-filter-field").val();
            let value = $("#tabulator-html-filter-value").val();
            table.setFilter(field, "like", value);
        }

        // On submit filter form
        $("#tabulator-html-filter-form")[0].addEventListener(
            "keypress",
            function (event) {
                let keycode = event.keyCode ? event.keyCode : event.which;
                if (keycode == "13") {
                    event.preventDefault();
                    filterHTMLForm();
                }
            }
        );

        // On click go button
        $("#tabulator-html-filter-go").on("click", function (event) {
            filterHTMLForm();
        });

        // On reset filter form
        $("#tabulator-html-filter-reset").on("click", function (event) {
            $("#tabulator-html-filter-field").val("employee_id");
            $("#tabulator-html-filter-value").val("");
            table.clearFilter();
        });

        // Export
        $("#tabulator-export-csv").on("click", function (event) {
            table.download("csv", "data.csv");
        });

        $("#tabulator-export-json").on("click", function (event) {
            table.download("json", "data.json");
        });

        $("#tabulator-export-xlsx").on("click", function (event) {
            window.XLSX = xlsx;
            table.download("xlsx", "data.xlsx", {
                sheetName: "Products",
            });
        });

        $("#tabulator-export-html").on("click", function (event) {
            table.download("html", "data.html", {
                style: true,
            });
        });

        // Print
        $("#tabulator-print").on("click", function (event) {
            table.print();
        });
    }
})();
