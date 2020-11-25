<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Today Lift | Payment</title>
    <link href="/asset/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }

    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }

    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }

    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }

    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }

    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }

    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }

    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }

    .invoice-box table tr.details td{
        padding-bottom:20px;
    }

    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }

    .invoice-box table tr.item.last td{
        border-bottom:none;
    }

    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }

        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="/assets/img/logo1-default.png" style="width:100%; max-width:100px;">
                            </td>

                            <td>
                                Invoice #<br>
                                Created: {{ Carbon\Carbon::now()->toDayDateTimeString() }}<br>
                                Due: {{ Carbon\Carbon::now()->addDays(1)->toDayDateTimeString() }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                No. 25 Grand Street, <br />
                                Ikeja, Lagos, Nigeria. <br />
                                <a href="mailto:support@todaylift.com" class="">support@todaylift.com</a><br />
                                +2348167863189
                            </td>

                            <td style="font-size:14.5px;line-height:20px;">
                                {{ Auth::user()->name }}<br>
                                <span id="payer_email">{{ Auth::user()->email }}</span><br>
                                <span id="payer_phone">{{ preg_replace('/^0/', '+234', Auth::user()->phone) }}</span><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="alert alert-danger" style="display:none;">
                        <center>Transaction Error</center>
                    </div>
                    <div class="alert alert-success" style="display:none;">
                        <center>Payment Successful</center>
                    </div>
                </td>
            </tr>
            @if(!session('success-status'))
            <tr class="heading payment">
                <td>
                    Payment Method
                </td>

                <td>
                    Check #
                </td>
            </tr>

            <tr class="details payment">
                <td>
                    SimplePay(Mastercard/Verve/Visa)
                </td>

                <td>
                    <a class="btn btn-sm btn-primary" id="Pay-Now">Pay Now</a>
                    <form method="post" action="/process_payment" id="process-payment">
                      {{ csrf_field() }}
                      <input type="hidden" name="payment-token" id="token-field" />
                      <input type="hidden" name="amount" id="amount-field" value="{{ $amount }}" />
                    </form>
                </td>
            </tr>
            @endif
            <tr class="heading">
                <td>
                    Item
                </td>

                <td>
                    Price
                </td>
            </tr>

            <tr class="item">
                <td>
                    1 Month Subscription
                </td>

                <td>
                    &#8358;{{ number_format($amount) }}.00
                </td>
            </tr>
<!--
            <tr class="item">
                <td>
                    Hosting (3 months)
                </td>

                <td>
                    $75.00
                </td>
            </tr>

            <tr class="item last">
                <td>
                    Domain name (1 year)
                </td>

                <td>
                    $10.00
                </td>
            </tr>
-->
            <tr class="total">
                <td></td>

                <td>
                   Total: &#8358;{{ number_format($amount) }}.00
                </td>
            </tr>
        </table>
    </div>
    <br>
    <center><a class="btn btn-primary" href="#" onclick="window.print();">Print</a> <a class="btn btn-default" href="/dashboard">Back to Dashboard</a></center>
    <br>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://checkout.simplepay.ng/simplepay.js"></script>
    <script type="text/javascript" src="/asset/js/payment.js"></script>
</body>
</html>
