/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function()
{
    /*
     * Datepicker
     */
    $('.datepicker').datepick({
        /*
        alignment: 'right',
        showOtherMonths: true,
        selectOtherMonths: true,
        */
        dateFormat:$.datepick.W3C
        /*
        renderer: {
            picker: '<div class="datepick block-border clearfix form"><div class="mini-calendar clearfix">' +
                    '{months}</div></div>',
            monthRow: '{months}', 
            month: '<div class="calendar-controls">' +
                        '{monthHeader:M yyyy}' +
                    '</div>' +
                    '<table cellspacing="0">' +
                        '<thead>{weekHeader}</thead>' +
                        '<tbody>{weeks}</tbody></table>', 
            weekHeader: '<tr>{days}</tr>', 
            dayHeader: '<th>{day}</th>', 
            week: '<tr>{days}</tr>', 
            day: '<td>{day}</td>', 
            monthSelector: '.month', 
            daySelector: 'td', 
            rtlClass: 'rtl', 
            multiClass: 'multi', 
            defaultClass: 'default', 
            selectedClass: 'selected', 
            highlightedClass: 'highlight', 
            todayClass: 'today', 
            otherMonthClass: 'other-month', 
            weekendClass: 'week-end', 
            commandClass: 'calendar', 
            commandLinkClass: 'button',
            disabledClass: 'unavailable'
        }
        */
    });
});