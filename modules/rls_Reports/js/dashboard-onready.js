$(function () {
    // Initializing Tabs
    Dashboard.Tabs.init();

    // Binds the action for Add Tab button
    $('#dashboard_add_tab a')
        .click(function (e) {
            if (!$(this).parent().hasClass('ui-state-disabled')) {
                Dashboard.Tabs.addEmpty();
            } else {
                alert('Maximal count of tabs has been reached.');
            }
        });

    // Binds the action for Add Dashlet button
    $(document)
        .on('click', '.dashboard_add_dashlet', function () {
            var jqueryUI_version = $.ui.version.split('.');
            if (Number(jqueryUI_version[0]) == 1 && Number(jqueryUI_version[1]) < 10) {
                Dashboard.Dashlets.addEmptyDashlet($('.ui-tabs-selected').attr('alt'));
            } else {
                Dashboard.Dashlets.addEmptyDashlet($('.ui-tabs-active').attr('alt'));
            }

        });

    // Binds dropdown for changing layout
    $(document)
        .on('change', '#tabs .dashboard_page_layout', function () {
            Dashboard.Layout.set({
                tab_guid: $('.ui-tabs-selected').attr('alt'),
                layout_type: $(this).val()
            });
        });

    // bind changing the name of the tab
    $(document)
        .on('dblclick', '#tabs ul li a', function () {
            Dashboard.Tabs.setInputForName(
                $(this).parent().attr('alt'),
                $(this).text()
            );
        });

    // close icon: removing the tab on click
    // note: closable tabs gonna be an option in the future - see http://dev.jqueryui.com/ticket/3924
    $(document)
        .on('click', "#tabs span.ui-icon-close", function (e) {
            Dashboard.Tabs.removeTab($(this).parent());
        });
});