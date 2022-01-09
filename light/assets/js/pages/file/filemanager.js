$(function() {
    "use strict";
    
    setTimeout(function(){
        $(document).ready(function(){
            var chart = c3.generate({
                bindto: '#c3chart-file-reports', // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        ['data1', 11,8,15,18,19,17,12,52,32,14,24,22],
                        ['data2', 7,7,5,7,9,12,17,12,16,20,21,19],
                        ['data3', 9,12,17,12,7,7,20,21,5,7,16,19]
                    ],
                    type: 'bar', // default type of chart
                    groups: [
                        [ 'data1', 'data2', 'data3']
                    ],
                    colors: {
                        'data1': '#ff9e47',
                        'data2': '#7e6990',
                        'data3': '#72c2ff',
                    },
                    names: {
                        // name of each serie
                        'data1': 'Documents',
                        'data2': 'Media',
                        'data3': 'Images',
                    }
                },
                axis: {
                    x: {
                        type: 'category',
                        // name of each category
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']
                    },
                },
                bar: {
                    width: 30,
                },
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
        });
    }, 100);
});