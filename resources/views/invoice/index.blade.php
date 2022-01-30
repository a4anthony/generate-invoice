<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Invoice Pdf</title>
	<style type="text/css">
        @page {
            margin: 30px 0;
        }

        body {
            margin: 0px;
        }

        * {
            color: black;
            font-family: Verdana, Arial, sans-serif;
            font-size: 12px;
        }

        a {
            color: black;
            text-decoration: none;
            display: block;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .text-light {
            opacity: 0.8;
        }

        table p {
            margin: 0.5em 0;
            /*line-height: 2;*/
        }

        table td, table td * {
            vertical-align: top;
        }

        h1 {
            font-size: 24px;
        }
		{!! $invoiceColors !!}
	</style>
</head>
<body>
<div style="margin:  10px 60px">
	<h1 class="text-{{$color}}" style="margin-bottom: 1px">Invoice</h1>
	<div class="bg-{{$color}}-light-3" style="height: 1px; width: 100%; margin: 10px 0;"></div>
	<div>
		<table style="width: 500px;">
			<tr>
				<th class="text-left uppercase text-{{$color}}-light-7">Invoice Number</th>
				<th class="text-left uppercase text-{{$color}}-light-7">Invoice Date</th>
			</tr>
			<tr>
				<td class="text-left text-light" style="width:250px"><p>0001</p></td>
				<td class="text-left text-light" style="width:250px"><p>00/00/00</p></td>
			</tr>
		</table>
	</div>
	<div style="margin-top: 10px">
		<table style="width: 500px;">
			<tr>
				<th class="text-left uppercase text-{{$color}}-light-7">Billed To</th>
				<th class="text-left uppercase text-{{$color}}-light-7">Billed By</th>
			</tr>
			<tr>
				<td class="text-left text-light" style="width:250px">
					<p>In Focus Europe</p>
					<p>12 Helmet Row, EC1V 3QJ London,
						United Kingdom</p>
				</td>
				<td class="text-left text-light" style="width:250px">
					<p>Anthony Akro</p>
					<p>No. 13 Okon Bassey Street
						Osong ama Estate, Akwa ibom,
						Nigeria.</p>
					<p><a href="#">+2347041282890</a></p>
					<p><a href="#">johndoe@email.com</a></p>
					<p><a href="#" class="text-blue-light-9">www.johndoe.com</a></p>
				</td>
			</tr>
		</table>
	</div>

</div>
<div class="bg-{{$color}}-light-1" style="padding:  20px 60px;height: 600px">
	<table style="width: 100%;">
		<tr>
			<th class="text-left uppercase text-{{$color}}-light-7">Description</th>
			<th class="text-right uppercase text-{{$color}}-light-7">Amount</th>
		</tr>
		@foreach([1,2,3,4,5,6,7,8] as $item)
			<tr>
				<td class="text-left text-light" style="width:80%">
					<p>Full-time coding and web
						development for ongoing project {{$item}}</p>
				</td>
				<td class="text-right text-light" style="width:20%">
					<p>$800</p>
				</td>
			</tr>
		@endforeach
	</table>
	<div class="bg-{{$color}}-light-3" style="height: 2px; width: 100%; margin: 20px 0;"></div>
	<table style="width: 100%;">
		<tr>
			<th class="text-left uppercase text-{{$color}}-light-7"></th>
			<th class="text-right uppercase text-{{$color}}-light-7">Invoice Total</th>
		</tr>
		<tr>
			<td class="text-left text-light" style="width:80%">
			</td>
			<td class="text-right text-light" style="width:20%">
				<p style="font-size: 28px; font-weight: 700">$80,000</p>
			</td>
		</tr>
	</table>
</div>
<div class="bg-{{$color}}-light-1" style="padding:  20px 60px; margin-top: 10px">
	<table style="width: 100%;">
		<tr>
			<th class="text-left uppercase text-{{$color}}-light-7"></th>
			<th class="text-right uppercase text-{{$color}}-light-7"></th>
		</tr>
		<tr>
			<td class="text-left text-light" style="width:20%">
			</td>
			<td class="text-right text-light" style="width:80%">
				<p>Generated using</p>
			</td>
		</tr>
	</table>
</div>

</body>
</html>
