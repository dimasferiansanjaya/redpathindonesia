/**
 * DataTables Basic
 */

$(function () {
    'use strict';

    var dt_basic_table = $('.datatables-basic'),
        assetPath = $('body').attr('data-asset-path');

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
        var dt_basic = dt_basic_table.DataTable({
            ajax: assetPath + 'api/procedures',
            columns: [{
                    data: ''
                },
                {
                    data: 'id'
                }, // used for sorting so will hide this column
                {
                    data: 'title'
                },
                {
                    data: 'department'
                },
                {
                    data: 'submitter'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'status'
                },
                {
                    data: ''
                }
            ],
            columnDefs: [{
                    // For Responsive
                    className: 'control',
                    orderable: false,
                    responsivePriority: 2,
                    targets: 0,
                    render: function (data, type, full, meta) {
                        return '';
                    }
                },
                {
                    targets: 1,
                    visible: false
                },
                {
                    responsivePriority: 1,
                    targets: 2,
                    render: function (data, type, full, meta) {
                        var $title = full['title'];
                        console.log($title);
                        return '<span class="fw-bold">' + $title + '</span>';
                    }
                },
                {
                    responsivePriority: 3,
                    targets: 3
                },
                {
                    responsivePriority: 4,
                    targets: 4
                },
                {
                    responsivePriority: 5,
                    targets: 5
                },
                {
                    responsivePriority: 6,
                    targets: 6
                },
                {
                    // Actions
                    targets: -1,
                    title: 'Actions',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            '<div class="d-inline-flex">' +
                            '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                            feather.icons['more-vertical'].toSvg({
                                class: 'font-small-4'
                            }) +
                            '</a>' +
                            '<div class="dropdown-menu dropdown-menu-end">' +
                            '<a href="javascript:;" class="dropdown-item">' +
                            feather.icons['file-text'].toSvg({
                                class: 'font-small-4 me-50'
                            }) +
                            'Details</a>' +
                            '<a href="javascript:;" class="dropdown-item">' +
                            feather.icons['archive'].toSvg({
                                class: 'font-small-4 me-50'
                            }) +
                            'Archive</a>' +
                            '<a href="javascript:;" class="dropdown-item delete-record">' +
                            feather.icons['trash-2'].toSvg({
                                class: 'font-small-4 me-50'
                            }) +
                            'Delete</a>' +
                            '</div>' +
                            '</div>' +
                            '<a href="javascript:;" class="item-edit">' +
                            feather.icons['edit'].toSvg({
                                class: 'font-small-4'
                            }) +
                            '</a>'
                        );
                    }
                }
            ],
            order: [],
            dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            buttons: [{
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle me-2',
                    text: feather.icons['share'].toSvg({
                        class: 'font-small-4 me-50'
                    }) + 'Export',
                    buttons: [{
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Print',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'csv',
                            text: feather.icons['file-text'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Csv',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Excel',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'copy',
                            text: feather.icons['copy'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Copy',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7]
                            }
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },
                {
                    text: feather.icons['plus'].toSvg({
                        class: 'me-50 font-small-4'
                    }) + 'Add New SOP',
                    className: 'create-new btn btn-primary',
                    attr: {
                        'data-bs-toggle': 'modal',
                        'data-bs-target': '#modals-slide-in'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }
            ],
            displayLength: 10,
            lengthMenu: [10, 25, 50, 75, 100],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details of ' + data['title'];
                        }
                    }),
                    type: 'column',
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                ?
                                '<tr data-dt-row="' +
                                col.rowIdx +
                                '" data-dt-column="' +
                                col.columnIndex +
                                '">' +
                                '<td>' +
                                col.title +
                                ':' +
                                '</td> ' +
                                '<td>' +
                                col.data +
                                '</td>' +
                                '</tr>' :
                                '';
                        }).join('');

                        return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false;
                    }
                }
            },
            language: {
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            }
        });
        $('div.head-label').html('<h4 class="card-title">Search & Filter</h4>');
    }


    // Add New Sop
    // ? Remove/Update this code as per your requirements ?
    var count = 101;
    $('.data-submit').on('click', function () {
        var $new_name = $('.add-new-record .dt-full-name').val(),
            $new_post = $('.add-new-record .dt-post').val(),
            $new_email = $('.add-new-record .dt-email').val(),
            $new_date = $('.add-new-record .dt-date').val(),
            $new_salary = $('.add-new-record .dt-salary').val();

        if ($new_name != '') {
            dt_basic.row
                .add({
                    responsive_id: null,
                    id: count,
                    full_name: $new_name,
                    post: $new_post,
                    email: $new_email,
                    start_date: $new_date,
                    salary: '$' + $new_salary,
                    status: 5
                })
                .draw();
            count++;
            $('.modal').modal('hide');
        }
    });

    // Delete Record
    $('.datatables-basic tbody').on('click', '.delete-record', function () {
        dt_basic.row($(this).parents('tr')).remove().draw();
    });
});
