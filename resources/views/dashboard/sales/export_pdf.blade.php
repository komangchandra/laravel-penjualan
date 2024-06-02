<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sales Report</title>
  <style>
    /* Style untuk PDF */
    @page {
      size: landscape;
    }

    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <h2>Sales Report</h2>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Nama Pelanggan</th>
        <th>Nama Produk</th>
        <th>Tanggal</th>
        <th>Metode Pembayaran & Pengiriman</th>
        <th>Harga</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sales as $sale)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ optional($sale->user)->name }}</td>
          <td>{{ optional($sale->product)->product_name }}</td>
          <td>{{ \Carbon\Carbon::parse($sale->updated_at)->format('d-M-Y') }}</td>
          <td>{{ optional($sale->payment)->bank }} - {{ optional($sale->delivery)->delivery_name }}</td>
          <td>Rp {{ number_format(optional($sale->product)->price_discount, 0, ',', '.') }}</td>
          <td>{{ $sale->status }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
