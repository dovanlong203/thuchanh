
<?php
require('./core/database.php');
require('./core/flash.php');
require('./core/cart.php');

$cart = new Cart;
$carts = $cart->all($db);
$total_amount = 0;
foreach ($carts as $value) {
    $total_amount = $total_amount + $value['sub_total'];
}

if (isset($_POST['submit'])) {
    $adress_str = $_POST['adress'] . ' - ' . $_POST['area'];
    $ship = $_POST['ship_money'];
    $mess2 = 'Phí Ship:' . ' ' . strval(number_format($ship)) . 'VNĐ';
    $user_id = 0;
    $data = [
        'user_id' => $user_id,
        'user_name' => $_POST['name'],
        'user_email' => $_POST['email'],
        'user_address' => $adress_str,
        'user_phone' => $_POST['phone'],
        'message' => $mess2,
        'amount' => $total_amount + $ship,
        'payment' => '',
    ];
    $kq = $db->create('transaction', $data);
    $transaction_id = $db->getLastId('transaction');
    foreach ($carts as $items) {
        $data = [
            'transaction_id' => $transaction_id['id'],
            'product_id' => $items['id'],
            'qty' => $items['quantity'],
            'amount' => $items['sub_total'],
            'size_id' => $items['size_id']
        ];
        $db->create('order', $data);

        //Cộng lượt mua
        $product = $db->getById('product', $items['id']);
        $sl = $product['buyed'] + intval($items['quantity']);
        $data4 = [
            'buyed' => $sl
        ];
        $db->update('product', $data4, $product['id']);

        //trừ số lượng
        $size_detail = $db->getFirst("select * from sizedetail where product_id = {$items['id']} and size_id = {$items['size_id']}");
        if ($size_detail) {
            $id_update_size = $size_detail['id'];
            $amount = $size_detail['quantity'] - $items['quantity'];
            if ($id_update_size != 0 && $amount > 0) {
                $data2 = [
                    'product_id' => $items['id'],
                    'size_id' => $items['size_id'],
                    'quantity' => $amount,
                ];
                $db->update('sizedetail', $data2, $id_update_size);
            } else if ($id_update_size != 0 && $amount == 0) {
                $db->delete('sizedetail', $id_update_size);
            }
        }
    }
    $cart->empty();
    Flash::set('message', "Đặt hàng thành công, chúng tôi sẽ liên hệ với bạn để giao hàng");
    echo '<script>';
    echo 'alert("Đặt hàng thành công, chúng tôi sẽ liên hệ với bạn để giao hàng");';
    echo 'window.location.href = "./index.php";';
    echo '</script>';
}

if (count($carts) == 0) {
    header('location: ./index.php');
}

$shipping = $db->getAll("select * from shipping order by id asc");

?>
<?php include('./layout/head.php') ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
       
        <?php include('./layout/sidebar.php') ?>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
                <ol class="breadcrumb">
                    <li><a href="./"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trang chủ</a></li>
                    <li class="active">Thanh toán</li>
                </ol>
                <div class="col-md-12 clearpadding">
                    <div class="panel panel-info">
                        <div class="panel-heading cus-color">
                            <h3 class="panel-title">Thông tin thanh toán</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
                                <form enctype="multipart/form-data" method="post">
                                    <table class="table" id="order_info">
                                        <tbody>
                                            <tr>
                                                <td style="width: 100px">Họ và tên</td>
                                                <td><input style="min-width: 200px" type="text" value="" name="name" required></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 100px">Email</td>
                                                <td><input style="min-width: 200px" type="email" value="" name="email" required></td>
                                            </tr>
                                            <tr>
                                                <td>Số điện thoại</td>
                                                <td><input style="min-width: 200px" name="phone" type="text" value="" required></td>
                                            </tr>
                                            <tr>
                                                <td>Tỉnh,ThànhPhố</td>
                                                <td>
                                                    <select class="form-control" name="province" id="province" style="max-width: 200px;padding: 5px" required>
                                                        <option value>--Chọn Tỉnh,Thành phố--</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Quận,Huyện</td>
                                                <td>
                                                    <select class="form-control" name="district" id="district" style="max-width: 200px;padding: 5px" required>
                                                        <option value>--Chọn Quận,Huyện--</option>
                                                    </select>
</td>
                                            </tr>
                                            <tr>
                                                <td>Phường, Xã</td>
                                                <td>
                                                    <select class="form-control" name="ward" id="ward" style="padding: 5px;max-width: 200px;" required>
                                                        <option value>--Chọn Phường,Xã--</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Địa chỉ cụ thể</td>
                                                <td><input style="min-width: 200px" name="area" type="text" value="" required></td>
                                                <td><input style="max-width: 200px" id="adress" name="adress" type="hidden" value=""></td>
                                            </tr>
                                            <tr>
                                                <td>Dịch vụ vận chuyển</td>
                                                <td>
                                                    <select class="form-control" name="ship" id="ship" style="max-width: 200px;padding: 5px">
                                                        <option value>--Chọn Dịch Vụ--</option>
                                                        <option value="53322">GHN_Đường bộ</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tổng tiền</td>
                                                <td>
                                                    <span class="money"><?php echo number_format($total_amount); ?></span>
                                                </td>
                                                <td>VNĐ</td>
                                            </tr>
                                            <tr>
                                                <td>Phí ship</td>
                                                <td>
                                                    <span id="ship_label"> 0<span />
                                                </td>
                                                <td>VNĐ<input style="max-width: 100px" type="hidden" name="ship_money" id="ship_money" value="0"></td>
                                            </tr>
                                            <tr>
                                                <td>Thành tiền</td>
                                                <td style="color: red;max-width: 50px">
                                                    <span id="total_amount"><?php echo number_format($total_amount); ?></span>
</td>
                                                <td>VNĐ</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="col-lg-8">
                                        <div class="col-lg-5">
                                            <image style="width: 100%; height: 100%" src="./public/images/van_chuyen.png" />
                                        </div>
                                        <div class="col-lg-5">Đơn vị vận chuyển<p>GHN - Giao hàng nhanh toàn quốc</p>
                                        </div>
                                    </div>
                                    <button style="min-width: 100px;float: right;margin-top: 50px" type="submit" name="submit" class="btn btn-success">Xác nhận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./layout/footer.php') ?>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/province',
            type: 'POST',
            dataType: 'json',
            headers: {
                'token': '464ef410-6fc8-11ec-9054-0a1729325323'
            },
            contentType: 'application/json; charset=utf-8',
            success: function(result) {
                // CallBack(result);
                $.each(result, function(key, value) {
                    if (key.includes("data")) {
                        $.each(value, function(key2, value2) {
                            $('<option>').val(value2.ProvinceID).text(value2.ProvinceName).appendTo('#province');
                        })
                    }
                })
            },
            error: function(error) {}
        });
    });
</script>
<script type="text/javascript">
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#province').change(function(envent) {
            var province = $('#province').val();
            province = parseInt(province);

            $('#district')
                .empty()
                .append('<option value>--Chọn Quận,Huyện--</option>');
            $('#ward')
                .empty()
                .append('<option value>--Chọn Phường,Xã--</option>');
            $('#ship')
.empty()
                .append('<option value>--Chọn Dịch Vụ--</option>');

            $('#ship_money').val('0');
            $('#ship_label').html('0');
            var total_count = <?php echo $total_amount ?>;
            $('#total_amount').html(formatNumber(total_count));


            $.ajax({
                url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/district',
                type: 'GET',
                dataType: 'json',
                headers: {
                    'token': '464ef410-6fc8-11ec-9054-0a1729325323',
                },
                data: {
                    province_id: province
                },
                contentType: 'application/json; charset=utf-8',
                success: function(result) {
                    // CallBack(result);
                    $.each(result, function(key, value) {
                        if (key.includes("data")) {
                            $.each(value, function(key2, value2) {
                                $('<option>').val(value2.DistrictID).text(value2.DistrictName).appendTo('#district');
                            })
                        }

                    })

                },
                error: function(error) {

                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#district').change(function(envent) {
            var district = $('#district').val();
            district = parseInt(district);
            $('#ward')
                .empty()
                .append('<option value>--Chọn Phường,Xã--</option>');
            $('#ship')
                .empty()
                .append('<option value>--Chọn Dịch Vụ Vận Chuyển--</option>');
            $('#ship_money').val('0');
            $('#ship_label').html('0');
            var total_count = <?php echo $total_amount ?>;
            $('#total_amount').html(formatNumber(total_count));
            $.ajax({
                url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/ward',
                type: 'GET',
                dataType: 'json',
                headers: {
                    'token': '464ef410-6fc8-11ec-9054-0a1729325323',
                },
                data: {
                    district_id: district
                },
                contentType: 'application/json; charset=utf-8',
                success: function(result) {
                    // CallBack(result);
                    $.each(result, function(key, value) {
                        if (key.includes("data")) {
                            $.each(value, function(key2, value2) {
                                $('<option>').val(value2.WardCode).text(value2.WardName).appendTo('#ward');
                            })
                        }
                    })
                },
                error: function(error) {}
            });
var dis = <?php echo $shipping[0]['id_district'] ?>;
            $.ajax({
                url: 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/available-services',
                type: 'GET',
                dataType: 'json',
                headers: {
                    'token': '464ef410-6fc8-11ec-9054-0a1729325323',
                },
                data: {
                    "shop_id": 2413002,
                    "from_district": dis,
                    "to_district": district
                },
                contentType: 'application/json; charset=utf-8',
                success: function(result) {
                    // CallBack(result);
                    $.each(result, function(key, value) {
                        if (key.includes("data")) {
                            $.each(value, function(key2, value2) {
                                $('<option>').val(value2.service_id).text("GHN_Đường bộ").appendTo('#ship');
                            })
                        }
                    })
                },
                error: function(error) {
                    alert("Không thể giao hàng đến Quận,Huyện này!");
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#ward').change(function(envent) {
            $('#ship')
                .empty()
                .append('<option value>--Chọn Dịch Vụ Vận Chuyển--</option>');
            $('#ship_money').val('0');
            $('#ship_label').html('0');
            var total_count = <?php echo $total_amount ?>;
            $('#total_amount').html(formatNumber(total_count));
            var district = $('#district').val();
            district = parseInt(district);
            var a = $("#province option:selected").text();
            var b = $("#district option:selected").text();
            var c = $("#ward option:selected").text();
            var str = a + ", " + b + ", " + c;
            $('#adress').val(str);
            var dis = <?php echo $shipping[0]['id_district'] ?>;
            $.ajax({
                url: 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/available-services',
                type: 'GET',
                dataType: 'json',
                headers: {
                    'token': '464ef410-6fc8-11ec-9054-0a1729325323',
                },
                data: {
                    "shop_id": 2413002,
                    "from_district": dis,
                    "to_district": district
                },
                contentType: 'application/json; charset=utf-8',
                success: function(result) {
                    // CallBack(result);
                    $.each(result, function(key, value) {
                        if (key.includes("data")) {
                            $.each(value, function(key2, value2) {
$('<option>').val(value2.service_id).text("GHN_Đường bộ").appendTo('#ship');
                            })
                        }
                    })
                },
                error: function(error) {
                    alert("Không thể giao hàng đến Quận,Huyện này!");
                }
            });
        });
    });
</script>
