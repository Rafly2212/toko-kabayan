<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>Alamat</th>
            <th>No Handphone</th>
            <th>Tanggal Pembelian</th>
            <th>Status</th>
            <th>Ongkos Kirim</th>
            <th>Kurir</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pesanan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->User->name }}</td>
                <td>{{ $item->User->alamat }}</td>
                <td>{{ $item->User->nohp }}</td>
                <td>{{ date('d-M-Y', strtotime($item->tanggal)) }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ number_format($item->ongkir, 0, ',', '.') }}</td>
                <td>{{ $item->kurir }}</td>
                <td>Rp. {{ number_format($item->jumlah_harga, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>