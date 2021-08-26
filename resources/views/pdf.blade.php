

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-family: "Courier New", "Courier New", monospace;
        }

        table {
            font-family: Georgia, serif;
            width: 100%;
            border-collapse: collapse;
        }
        
        td, th {
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .text_center {
            text-align: center;
            margin-top: -5px;
        }

        pre {
            font-size: 14px;
            margin-top: -7px;
        }

        .text_total {
            text-align: right;
            margin-right: 80px;
        }
    </style>
</head>
<body>
    <h1 class="text_center">COZA STORE</h1>


    <div class="text_center" style="font-size: 16px;">
        COZA STORE INC. <br>
        SM Megamall .EDSA corner J.Vargas Avenue <br>
        Mandalayoung City 1860 <br>
        Philippines <br>
        ------------------------------------------------------------------------------------------------------------------------------------ <br> <br>
    </div>

    <div>
        <pre>Cashier: 6142                    Shop: 601                     No: 156</pre>
        <pre>Date:    {{ Carbon\Carbon::now()->format('d.m.y') }}                Time: {{ Carbon\Carbon::now()->format('H:i') }}</pre>
        <pre>S/N:                59EY433551</pre>
        <pre>Permit no:          082014041000846000001</pre>
        <pre>VATreg TIN:         1525-3274-2579-3568</pre>
        <pre>Accr. no:           283-15726935-76912658-28567</pre>
        <pre>CAS Accr. no:</pre>
        <div class="text_center">
            ------------------------------------------------------------------------------------------------------------------------------------ <br> <br>
        </div>
    </div>

    <table>
        <tr>
            <th colspan="7">Name Item</th>
            <th colspan="2">Quantity</th>
            <th colspan="3">Price</th>
        </tr>

        @foreach ($items as $item)
            <tr>
                <td colspan="7">{{ $item->name }}</td>
                <td colspan="2">{{ Auth::user()->orders()->where('item_id',$item->id)->first()->pivot->quantity }}*</td>
                <td colspan="3">${{ $item->price * Auth::user()->orders()->where('item_id',$item->id)->first()->pivot->quantity }}</td>
            </tr>
        @endforeach


        <tr style="background-color: #ffff;">
            <td colspan="7"><h3>TOTAL</h3></td>
            <td colspan="2"></td>
            <td colspan="3">---------- <br>
                ${{ $total }}</td>
        </tr>
    </table>

    <div class="text_center" style="font-size: 16px; margin-top: 50px;">
        Refund & exchange within 30days with receipt & original price tag, no exchange & refund on accessories, bags, & watches.
        All card payment will be credited to COZA STORE merchandise card.
    </div>
</body>
</html>

