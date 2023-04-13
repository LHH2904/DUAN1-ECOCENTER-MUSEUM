<div class="container col-12" style="height: 500px;"></div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    let text = '';
    new Morris.Area({
        // ID of the element in which to draw the chart.
        element: 'chart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [{
                year: '2008',
                order: 5,
                sales: 40000,
                'quantity': 20
            },
            {
                year: '2009',
                value: 10
            },
            {
                year: '2010',
                value: 5
            },
            {
                year: '2011',
                value: 5
            },
            {
                year: '2012',
                value: 20
            }
        ],
        // The name of the data record attribute that contains x-values.
        xkey: 'date',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['date', 'order', 'sales', 'quantity'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Đơn hàng', 'Doanh thu', 'Số lượng']
    });
    $('.select-date').change(function() {
        statistical();
        let time = $(this).val();
        if (time == '7day') {
            let text = "7 day ago"
        } else if (time == "30day") {
            let text = "30 day ago";
        } else if (time = "90day") {
            let text = "90 day ago";
        } else {
            let text = "365 day ago"
        }
        $.ajax({
            "url": "admin/statistical.php",
            "method": "POST",
            dataType: "JSON",
            data: {
                time: time
            },
            success: function(data) {
                char.setData(data)
                $('#text-date').text(text);
            }
        })
    });

    function statistical() {
        let text = "365 day ago";
        $('#text-date').text(text);
        $.ajax({
            "url": "admin/statistical.php",
            "method": "POST",
            dataType: "JSON",
            data: {
                time: time
            },
            success: function(data) {
                char.setData(data)
                $('#text-date').text(text);
            }
        })

    }
})
</script>


</main>
</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>

</html>