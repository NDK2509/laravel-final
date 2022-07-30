<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>
    <!-- Bootstrap core CSS -->
    <link href="/source/assets/dest/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/source/assets/dest/css/jumbotron-narrow.css" rel="stylesheet">
    <script src="/source/assets/dest/js/jquery.js"></script>
</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">VNPAY RESULT</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>

                <label><?php echo $data['vnp_TxnRef']; ?></label>
            </div>
            <div class="form-group">

                <label>Số tiền:</label>
                <label><?php echo $data['vnp_Amount']; ?></label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label><?php echo $data['vnp_OrderInfo']; ?></label>
            </div>
            <div class="form-group">
                <label>Mã phản hồi (vnp_ResponseCode):</label>
                <label><?php echo $data['vnp_ResponseCode']; ?></label>
            </div>
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label><?php echo $data['vnp_TransactionNo']; ?></label>
            </div>
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label><?php echo $data['vnp_BankCode']; ?></label>
            </div>
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label><?php echo $data['vnp_PayDate']; ?></label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label>

                    @if ($data['vnp_ResponseCode'] == '00')
                        <span style='color:blue'>GD Thanh cong</span>
                    @else
                        <span style='color:red'>GD Khong thanh cong</span>
                    @endif
                </label>
            </div>
        </div>
        <p>
            &nbsp;
        </p>
        <a href="/">Trở về trang chủ</a>
        <footer class="footer">
            <p>&copy; VNPAY {{date('Y')}} </p>
        </footer>
    </div>
</body>

</html>
